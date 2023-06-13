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
        genres = response["Genre"].split(", ")
        print(f"{title}: {genres}")
        
        # Insert genres into Genre table and get the genre IDs
        genre_ids = []
        for genre in genres:
            # Check if genre already exists in Genre table
            cursor.execute("SELECT id_genre FROM Genre WHERE nom=?", genre)
            genre_row = cursor.fetchone()
            
            # If genre doesn't exist, insert it into Genre table
            if genre_row is None:
                cursor.execute("INSERT INTO Genre (nom) VALUES (?)", genre)
                conn.commit()
                genre_id = cursor.execute("SELECT SCOPE_IDENTITY()").fetchone()[0]
            # If genre already exists, get the genre ID from the row
            else:
                genre_id = genre_row[0]
                
            genre_ids.append(genre_id)
        
        # Get the ID of the current series
        cursor.execute("SELECT id_serie FROM Serie WHERE nom=?", title)
        serie_id = cursor.fetchone()[0]
        
        # Insert genre IDs and series ID into Genre_of_Serie table
        for genre_id in genre_ids:
            cursor.execute('INSERT INTO Genre_of_Serie (id_genre, id_serie) VALUES (?, ?)', (genre_id, serie_id))

            conn.commit()
    
    except KeyError:
        print("Skipping result: Title or Genre key not found in response")
        continue
    except Exception as e:
        print(e)
        continue
    

print(i)

# Close the connection
cursor.close()
conn.close()
