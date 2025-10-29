from lime.lime_tabular import LimeTabularExplainer

# Crear el explicador
explainer = LimeTabularExplainer(
    X_train.values, 
    feature_names=X_train.columns, 
    class_names=['No', 'Sí'], 
    mode='classification'
)

# Generar la explicación para una predicción específica
explicacion = explainer.explain_instance(X_test.iloc[0], model.predict_proba)

# Mostrar explicación
explicacion.show_in_notebook()  # Visualización en Jupyter
