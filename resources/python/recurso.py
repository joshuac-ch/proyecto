# Importar las librerías necesarias
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error, r2_score

# Cargar los datos desde el JSON si es necesario
df = pd.read_json('path_to_your_json_file')  # Ajusta la ruta al archivo JSON

# Definir características (features) y objetivo (target)
# Cambia 'monto_oportunidad' si deseas predecir otra variable
features = df[['tiempo_oportunidad_dias', 'numero_interacciones', 'sector_cliente', 'productos_ofrecidos']]
target = df['monto_oportunidad']  # El valor que quieres predecir

# Realizar el One-Hot Encoding para variables categóricas
features = pd.get_dummies(features, columns=['sector_cliente', 'productos_ofrecidos'])

# Dividir los datos en entrenamiento y prueba
X_train, X_test, y_train, y_test = train_test_split(features, target, test_size=0.2, random_state=42)

# Inicializar el modelo de regresión lineal
model = LinearRegression()

# Entrenar el modelo
model.fit(X_train, y_train)

# Hacer predicciones
y_pred = model.predict(X_test)

# Evaluar el modelo
mse = mean_squared_error(y_test, y_pred)
r2 = r2_score(y_test, y_pred)

print(f"Mean Squared Error: {mse:.2f}")
print(f"R^2 Score: {r2:.2f}")

# Mostrar las primeras predicciones junto con los valores reales para comparar
predicciones = pd.DataFrame({'Real': y_test, 'Predicción': y_pred})
print(predicciones.head(10))
