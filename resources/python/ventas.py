import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns

# Cargar los datos
file_path = 'datos_entrenados.json'
data = pd.read_json(file_path)

# Visualizar las primeras filas
print(data.head())

# Asegurarse de que no hay valores nulos
data = data.dropna()
#EDA ANALISIS EXPLORATORIO

# Contar oportunidades ganadas y perdidas
estado_counts = data['estado_oportunidad'].value_counts()
# Ventas por sector y estado de oportunidad
plt.figure(figsize=(12, 8))
sns.countplot(data=data, x="sector_cliente", hue="estado_oportunidad", palette="coolwarm")
plt.title("Estado de Oportunidad por Sector del Cliente")
plt.xlabel("Sector del Cliente")
plt.ylabel("Cantidad de Oportunidades")
plt.xticks(rotation=45)
plt.show()

# Ventas por canal de contacto y estado de oportunidad
plt.figure(figsize=(10, 6))
sns.countplot(data=data, x="canal_contacto", hue="estado_oportunidad", palette="coolwarm")
plt.title("Estado de Oportunidad por Canal de Contacto")
plt.xlabel("Canal de Contacto")
plt.ylabel("Cantidad de Oportunidades")
plt.show()






