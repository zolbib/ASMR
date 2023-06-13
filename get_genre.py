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

# Execute SQL query to select all genres from the Genre table
cursor.execute('SELECT nom FROM Genre')

# Fetch the results
genres = [row.nom for row in cursor.fetchall()]

# Execute SQL query to select all TV series names from the Serie table
cursor.execute('SELECT nom FROM Serie')

# Fetch the results
results = cursor.fetchall()

# Set your OMDb API key here
OMDB_API_KEY = '8fd5c8d0'

i = 0

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
        title = response["Title"]
        genre_list = response["Genre"].split(", ")
        
        # Insert new genres into the Genre table if they don't already exist
        for genre in genre_list:
            if genre not in genres:
                cursor.execute("INSERT INTO Genre (nom) VALUES (?)", (genre,))
                genres.append(genre)
                
        # Print the title and genres of the TV series
        genre_str = ", ".join(genre_list)
        print(f"{title}: {genre_str}")
    except KeyError:
        print("Skipping result: Title or Genre key not found in response")
        continue
    except Exception as e:
        print(e)
        continue
    

print(i)

# Commit the changes to the database
conn.commit()

# Close the connection
cursor.close()
conn.close()
