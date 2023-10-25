from flask import Flask, render_template, request, redirect, url_for
import pymysql

app = Flask(__name__)

# Replace these with your actual database credentials
db_host = "your_db_host"
db_user = "your_db_user"
db_password = "your_db_password"
db_name = "your_db_name"

@app.route('/')
def index():
    return render_template('registration.html')

@app.route('/register', methods=['POST'])
def register():
    name = request.form['name']
    surname = request.form['surname']
    contact = request.form['contact']
    username = request.form['username']
    gender = request.form['gender']
    address = request.form['address']
    email = request.form['email']
    password = request.form['password']

    conn = pymysql.connect(host=db_host, user=db_user, password=db_password, database=db_name)
    cursor = conn.cursor()

    sql = "INSERT INTO your_table_name (name, surname, contact_number, username, gender, address, email_address, password) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
    values = (name, surname, contact, username, gender, address, email, password)

    try:
        cursor.execute(sql, values)
        conn.commit()
        return "Registration successful!"
    except Exception as e:
        conn.rollback()
        return f"Error: {e}"

    conn.close()

if __name__ == '__main__':
    app.run(debug=True)

