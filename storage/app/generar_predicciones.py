import pandas as pd
import joblib
import json

# Cargar el modelo entrenado
#model = joblib.load('modelo_prediccion_ventas.pkl')
model = joblib.load('C:/www/Apache24/htdocs/c403laravel/storage/app/modelo_prediccion_ventas.pkl')

# Cargar datos de entrada de un archivo JSON (creado desde el sistema)
with open('C:/www/Apache24/htdocs/c403laravel/storage/app/entrada_prediccion.json', 'r') as file:
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

# Realizar el mismo procesamiento que se hizo al entrenar el modelo (One-Hot Encoding)
nuevos_datos_encoded = pd.get_dummies(nuevo_dato_df)
nuevos_datos_encoded = nuevos_datos_encoded.reindex(columns=model.feature_names_in_, fill_value=0)

# Obtener las probabilidades de predicción
probabilidades = model.predict_proba(nuevos_datos_encoded)

# Extraer la probabilidad de éxito (la segunda columna de cada fila, probabilidad de "Ganado")
probabilidad_exito = probabilidades[:, 1]

# Agregar el porcentaje de probabilidad de éxito al DataFrame
nuevo_dato_df['probabilidad_exito'] = probabilidad_exito * 100  # Convertir a porcentaje

# Guardar los resultados en un archivo JSON
resultados_json = nuevo_dato_df.to_dict(orient='records')
with open('C:/www/Apache24/htdocs/c403laravel/storage/app/predicciones.json', 'w') as file:
    json.dump(resultados_json, file, indent=4)

print("Predicciones guardadas en predicciones.json")
