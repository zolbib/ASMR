import os

directory = 'C:/Users/reda6/OneDrive/Desktop/sous-titres test'  # replace with the path to your repository

# delete files that contain "VF" in their name and have the ".srt" extension
for root, dirs, files in os.walk(directory):
    for filename in files:
        if ( filename.endswith('.zip')):
            filepath = os.path.join(root, filename)
            print(f"Deleting {filepath}")
            os.remove(filepath)
