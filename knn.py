import mysql.connector
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.neighbors import KNeighborsClassifier
import sys


# Get user input from the command line
user_input = sys.argv[1:]

# Join the user input into a single string
text = ' '.join(user_input)

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="klasifikasi"
)
dokumen = []
label = []

mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM dokumen")
myresult = mycursor.fetchall()

for x in myresult:
    
    dokumen.append(x[1])
    label.append(x[2])



# Membuat objek TfidfVectorizer
vectorizer = TfidfVectorizer()

# Menghitung fitur dokumen menggunakan TfidfVectorizer
X = vectorizer.fit_transform(dokumen)

# Membuat objek KNeighborsClassifier
classifier = KNeighborsClassifier(n_neighbors=3)

# Memasukkan data latih ke dalam classifier
classifier.fit(X, label)

# Memprediksi klasifikasi untuk dokumen D5
prediction = classifier.predict(vectorizer.transform([text]))
print(prediction[0])