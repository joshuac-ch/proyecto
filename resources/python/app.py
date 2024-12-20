from flask import Flask, request, jsonify
import joblib
import pandas as pd

app = Flask(__name__)

# Cargar el modelo
model = joblib.load('modelo_prediccion_ventas.pkl')

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json

    # Convertir datos a DataFrame
    df = pd.DataFrame([data])

    # Realizar One-Hot Encoding como en tu modelo original
    df_encoded = pd.get_dummies(df)

    # Asegurarse de que las columnas coincidan con las del modelo
    # Aquí deberías tener en cuenta las columnas que usaste en el entrenamiento
    # Supongamos que tienes una lista de columnas `X_train_columns`
    X_train_columns = [...]  # Completa con tus columnas de entrenamiento
    df_encoded = df_encoded.reindex(columns=X_train_columns, fill_value=0)

    # Hacer predicción
    prediccion = model.predict(df_encoded)

    return jsonify(prediccion[0])

if __name__ == '__main__':
    app.run(debug=True,port=50001)
