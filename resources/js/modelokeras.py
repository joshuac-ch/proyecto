import pandas as pd
import json
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense
from tensorflow.keras.optimizers import Adam
from tensorflow.keras.callbacks import EarlyStopping

# Cargar datos desde archivo JSON
file_path = 'datos_entrenados.json'
with open(file_path, 'r') as file:
    data = json.load(file)

df = pd.DataFrame(data)
df['estado_binario'] = df['estado_oportunidad'].apply(lambda x: 1 if x == 'Ganado' else 0)

# Seleccionar características y objetivo
features = df[['monto_oportunidad', 'tiempo_oportunidad_dias', 'numero_interacciones', 
               'sector_cliente', 'productos_ofrecidos', 'region_cliente', 
               'canal_contacto', 'interacciones_previas', 'presupuesto_cliente']]
target = df['estado_binario']

# One-Hot Encoding para columnas categóricas y otras preprocesamientos
df_exploded = df.explode('productos_ofrecidos')
productos_ofrecidos_encoded = pd.get_dummies(df_exploded['productos_ofrecidos'], prefix='producto')
productos_ofrecidos_encoded = productos_ofrecidos_encoded.groupby(df_exploded.index).max()
features = pd.concat([features.drop(columns=['productos_ofrecidos']), productos_ofrecidos_encoded], axis=1)
features = pd.get_dummies(features, columns=['sector_cliente', 'region_cliente', 'canal_contacto'])

# Dividir los datos en conjunto de entrenamiento y prueba
X_train, X_test, y_train, y_test = train_test_split(features, target, test_size=0.2, random_state=42)

# Normalizar características
scaler = StandardScaler()
X_train = scaler.fit_transform(X_train)
X_test = scaler.transform(X_test)

# Construir modelo de red neuronal en Keras
model = Sequential()
model.add(Dense(64, input_shape=(X_train.shape[1],), activation='relu'))
model.add(Dense(32, activation='relu'))
model.add(Dense(1, activation='sigmoid'))

# Compilar el modelo
model.compile(optimizer=Adam(learning_rate=0.001), loss='binary_crossentropy', metrics=['accuracy'])

# Entrenar el modelo con Early Stopping
early_stopping = EarlyStopping(monitor='val_loss', patience=5, restore_best_weights=True)
model.fit(X_train, y_train, epochs=100, batch_size=16, validation_split=0.2, callbacks=[early_stopping])

# Evaluar el modelo en el conjunto de prueba
loss, accuracy = model.evaluate(X_test, y_test)
print(f"Exactitud del modelo: {accuracy:.2f}")

# Guardar el modelo en formato .h5
model.save('modelo_prediccion_ventas.h5')
print("Modelo guardado como 'modelo_prediccion_ventas.h5'")