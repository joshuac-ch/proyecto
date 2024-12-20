import joblib
import pandas as pd
import json

# Cargar el modelo entrenado
model = joblib.load('modelo_prediccion_ventas.pkl')

# Cargar datos de entrada de un archivo JSON (creado desde el sistema)
with open('entrada_prediccion.json', 'r') as file:
    nuevo_dato = json.load(file)

# Convertir el nuevo dato en un DataFrame
nuevo_dato_df = pd.DataFrame([{
     
    "monto_oportunidad": nuevo_dato["monto_oportunidad"],
    "tiempo_oportunidad_dias": nuevo_dato["tiempo_oportunidad_dias"],
    "numero_interacciones": nuevo_dato["numero_interacciones"],
    "sector_cliente": nuevo_dato["sector_cliente"],
    "productos_ofrecidos": nuevo_dato["productos_ofrecidos"],
    "region_cliente": nuevo_dato["region_cliente"],
    "canal_contacto": nuevo_dato["canal_contacto"],
    "interacciones_previas": nuevo_dato["interacciones_previas"],
    "presupuesto_cliente": nuevo_dato["presupuesto_cliente"]
}])

# Datos anteriores para contexto (podrías modificar estos datos según tu preferencia)
datos_existentes = pd.DataFrame({
    "monto_oportunidad": [900, 1500, 200, 800, 1100],
    "tiempo_oportunidad_dias": [30, 45, 6, 25, 35],
    "numero_interacciones": [6, 10, 1, 4, 5],
    "sector_cliente": ["Telecomunicaciones", "Tecnología", "Retail", "Salud", "Educación"],
    "productos_ofrecidos": ["producto1", "producto2", "producto1", "producto3", "producto2"],
    "region_cliente": ["Lima", "Arequipa", "Trujillo", "Cusco", "Lima"],
    "canal_contacto": ["Email", "Teléfono", "Reunión", "Email", "Teléfono"],
    "interacciones_previas": [3, 5, 3, 1, 4],
    "presupuesto_cliente": [950, 1600, 300, 700, 1200]
})

# Combinar los datos existentes con el nuevo dato
nuevos_datos = pd.concat([datos_existentes, nuevo_dato_df], ignore_index=True)

# Realizar el mismo procesamiento que se hizo al entrenar el modelo (One-Hot Encoding)
nuevos_datos_encoded = pd.get_dummies(nuevos_datos)
nuevos_datos_encoded = nuevos_datos_encoded.reindex(columns=model.feature_names_in_, fill_value=0)

# Hacer predicciones
predicciones = model.predict(nuevos_datos_encoded)

# Agregar las predicciones al DataFrame
nuevos_datos['prediccion'] = predicciones

# Guardar los resultados en un archivo JSON
resultados_json = nuevos_datos.to_dict(orient='records')
with open('predicciones.json', 'w') as file:
    json.dump(resultados_json, file, indent=4)

print("Predicciones guardadas en predicciones.json")
'''
import joblib
import pandas as pd
import json

# Cargar el modelo entrenado
#ESTO VIENTE DEL MODELO DE TRABAJO2.PY AGREGAR ESTO AL FINAL
## Guardar el modelo
#joblib.dump(model, 'modelo_prediccion_ventas.pkl')
# Hacer predicciones y evaluar el modelo (opcional)
#y_pred = model.predict(X_test) 

model = joblib.load('modelo_prediccion_ventas.pkl')

# Supongamos que tienes datos de clientes para predecir (aquí están algunos datos de ejemplo)
nuevos_datos = pd.DataFrame({
    "monto_oportunidad": [900, 1500, 200, 800, 1100],
    "tiempo_oportunidad_dias": [30, 45, 6, 25, 35],
    "numero_interacciones": [6, 10, 1, 4, 5],
    "sector_cliente": ["Telecomunicaciones", "Tecnología", "Retail", "Salud", "Educación"],
    "productos_ofrecidos": ["producto1", "producto2", "producto1", "producto3", "producto2"],
    "region_cliente": ["Lima", "Arequipa", "Trujillo", "Cusco", "Lima"],
    "canal_contacto": ["Email", "Teléfono", "Reunión", "Email", "Teléfono"],
    "interacciones_previas": [3, 5, 3, 1, 4],
    "presupuesto_cliente": [950, 1600, 300, 700, 1200]
})

# Realizar el mismo procesamiento que se hizo al entrenar el modelo (One-Hot Encoding)
nuevos_datos_encoded = pd.get_dummies(nuevos_datos)
nuevos_datos_encoded = nuevos_datos_encoded.reindex(columns=model.feature_names_in_, fill_value=0)

# Hacer predicciones
predicciones = model.predict(nuevos_datos_encoded)

# Combinar los datos de entrada con las predicciones
nuevos_datos['prediccion'] = predicciones

# Guardar los resultados en un archivo JSON
resultados_json = nuevos_datos.to_dict(orient='records')
with open('predicciones.json', 'w') as file:
    json.dump(resultados_json, file, indent=4)

print("Predicciones guardadas en predicciones.json")

import joblib
import pandas as pd
import json

# Cargar el modelo entrenado
model = joblib.load('modelo_prediccion_ventas.pkl')

# Leer los datos de entrada desde el JSON
with open('entrada_prediccion.json', 'r') as file:
    data = json.load(file)

# Convertir los datos a un DataFrame
nuevos_datos = pd.DataFrame([data])

# Realizar el procesamiento (One-Hot Encoding)
nuevos_datos_encoded = pd.get_dummies(nuevos_datos)
nuevos_datos_encoded = nuevos_datos_encoded.reindex(columns=model.feature_names_in_, fill_value=0)

# Hacer la predicción
predicciones = model.predict(nuevos_datos_encoded)

# Añadir la predicción a los datos de entrada
nuevos_datos['prediccion'] = predicciones

# Guardar el resultado en un archivo JSON
resultados_json = nuevos_datos.to_dict(orient='records')
with open('predicciones.json', 'w') as file:
    json.dump(resultados_json, file, indent=4)
    '''