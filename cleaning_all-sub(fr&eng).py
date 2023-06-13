import os
import nltk
from nltk.corpus import stopwords

# Download the stopwords corpus if not already downloaded
nltk.download('stopwords')

# Define the path to the input directory and output directory
input_dir_path = 'C:/Users/reda6/OneDrive/Desktop/sous-titres'
output_dir_path = 'C:/Users/reda6/OneDrive/Desktop/all cleaned'

# Create the output directory if it does not exist
if not os.path.exists(output_dir_path):
    os.makedirs(output_dir_path)

# Define the set of stop words
stop_words = set(stopwords.words('english'))

# Loop over all the files in the input directory
for show_folder in os.listdir(input_dir_path):
    show_folder_path = os.path.join(input_dir_path, show_folder)
    if not os.path.isdir(show_folder_path):
        continue
    show_output_folder_path = os.path.join(output_dir_path, show_folder)
    if not os.path.exists(show_output_folder_path):
        os.makedirs(show_output_folder_path)
    for root, dirs, files in os.walk(show_folder_path):
        for file_name in files:
            if not file_name.endswith('.srt'):
                continue
            input_file_path = os.path.join(root, file_name)
            output_file_path = os.path.join(show_output_folder_path, file_name[:-4] + '.txt')

            # Load the input file
            with open(input_file_path, 'r', encoding='ISO-8859-1') as f:
                text = f.read()

            # Split the text into individual words
            words = nltk.word_tokenize(text)

            # Remove the stop words, numbers, and symbols from the list of words
            words = [word for word in words if word.lower() not in stop_words and word.isalpha()]

            # Join the remaining words back into a string
            cleaned_text = ' '.join(words)

            # Save the cleaned text to the output file
            with open(output_file_path, 'w') as f:
                f.write(cleaned_text)
