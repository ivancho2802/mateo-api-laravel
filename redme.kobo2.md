"source": "https://kobo2.actioncontrelafaim.org/api/v2/assets/a77H3KUkhPkjdk4zJ2aqnj/",
      "fields_from_all_versions": "true",
      "group_sep": "/",
      "hierarchy_in_labels": "true",
      "lang": "English (en)",
      "multiple_select": "both",
      "type": "geojson",
      "fields": ["field_1", "field_2"],
      "flatten": "true"



      
      import requests
import json

# Endpoint de la API para enviar datos
url = "https://kf.kobotoolbox.org/api/v2/assets/YOUR_FORM_UID/submissions/"

# Datos que deseas enviar
data = {
    "field_1": "valor_1",
    "field_2": "valor_2"
}
    # Añade más campos según tu formulario

# Credenciales de autenticación
username = 'YOUR_USERNAME'
password = 'YOUR_PASSWORD'

# Encabezados de la solicitud
headers = {
    "Content-Type": "application/json"
}

# Enviar la solicitud POST con autenticación básica
response = requests.post(url, auth=(username, password), headers=headers, data=json.dumps(data))

# Verificar la respuesta
if response.status_code == 201:
    print("Datos enviados exitosamente")
else:
    print(f"Error al enviar datos: {response.status_code}")
    print(response.text)



