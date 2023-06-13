import os
import requests
import time

# Set your OMDb API key here
OMDB_API_KEY = '8fd5c8d0'

# Set the path to the directory containing movie names
DIRECTORY_PATH = 'C:/Users/reda6/OneDrive/Desktop/the covers'

i=0
# Iterate over each file in the directory
for file_name in os.listdir(DIRECTORY_PATH):
    sql = "INSERT INTO Serie (nom, cover) VALUES ('"+file_name.replace('.jpg','')+"', 'C:/Users/reda6/OneDrive/Desktop/the covers/"+file_name+"');"
    print(sql)
    