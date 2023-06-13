import os
import requests
import time
import pyodbc
import json

# Set up the connection string
server = 'DESKTOP-NC7577R'
database = 'ASMR'
username = 'reda'
password = 'reda1234'
connection_string = f'DRIVER={{ODBC Driver 17 for SQL Server}};SERVER={server};DATABASE={database};UID={username};PWD={password}'

# Connect to the database
conn = pyodbc.connect(connection_string)

# Create a cursor
cursor = conn.cursor()

# Execute SQL query
cursor.execute('SELECT nom FROM Serie')

# Fetch the results
results = cursor.fetchall()

# Set your OMDb API key here
OMDB_API_KEY = '8fd5c8d0'

i = 0
"""
for result in results:
    i += 1
    
    result_clean = str(result).strip('()')
    result_clean = str(result_clean).replace("'", "")
    result_clean = str(result_clean).strip(',')
    
    
    request = f"https://www.omdbapi.com/?apikey=8fd5c8d0&t={result_clean}&plot=full"
    print(request)
    
    r = requests.get(request)
        
    if r.status_code != 200:
        continue
    
    try:
        response = json.loads(r.text)
        value_str = str({response["Title"] }).strip('{}')
        print(value_str.strip("''"))
        plot = str(response['Plot']).replace("'", "''")
        sql = f"update Serie set description = '{plot}' where nom = {value_str}"
        print (sql)
        cursor.execute(sql)
        cursor.commit()
    except KeyError:
        print("Skipping result: Title key not found in response")
        continue
    except Exception as e:
        print(e)
        continue
    

print(i)
"""
# Close the connection
cursor.close()
conn.close()
