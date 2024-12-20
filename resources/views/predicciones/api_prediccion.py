import pickle
from flask import Flask, request, jsonify

app = Flask(__name__)

# Cargar el modelo
with open('modelo_prediccion_ventas.pkl', 'rb') as f:
    modelo = pickle.load(f)

@app.route('/prediccion', methods=['POST'])
def prediccion():
    data = request.json
    # Extrae los valores para cada característica
    features = [
        data['monto_oportunidad'],
        data['tiempo_oportunidad_dias'],
        data['numero_interacciones'],
        data['sector_cliente'],
        data['productos_ofrecidos'],
        data['region_cliente'],
        data['canal_contacto'],
        data['interacciones_previas'],
        data['presupuesto_cliente']
    ]
    # Realiza la predicción (ajusta según tu modelo)
    resultado = modelo.predict([features])[0]
    return jsonify({'prediccion': resultado})

if __name__ == '__main__':
    app.run(port=5000, debug=True)
