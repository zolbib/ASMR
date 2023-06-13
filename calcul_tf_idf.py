import os
import pickle
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.svm import SVC
from sklearn.metrics import accuracy_score

# path to the directory containing the preprocessed subtitle files
directory = "C:/Users/reda6/OneDrive/Desktop/cleaned 2/24/24.s1"

# list all the preprocessed subtitle files in the directory
files = os.listdir(directory)

# initialize an empty list to store the content of each file
corpus = []

# initialize an empty list to store the categories of each file
categories = []

# loop through each file and add its content and category to the corresponding lists
for file in files:
    with open(os.path.join(directory, file), "r") as f:
        content = f.read()
        corpus.append(content)
        categories.append(file.split('.')[0])

# create a TF-IDF vectorizer
vectorizer = TfidfVectorizer()

# calculate the TF-IDF matrix
tfidf_matrix = vectorizer.fit_transform(corpus)

# train a support vector machine (SVM) classifier
model = SVC(kernel='linear', C=1)
model.fit(tfidf_matrix, categories)

# save the trained model to a file
with open('model.pkl', 'wb') as f:
    pickle.dump(model, f)

# calculate the accuracy of the model on the training data
predicted_categories = model.predict(tfidf_matrix)
accuracy = accuracy_score(categories, predicted_categories)
print(f'Training accuracy: {accuracy}')
