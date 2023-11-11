<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "new_table";

// Establish a connection to the database
//$conn = new mysqli($host, $username, $password, $database);
$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact_number'];
    $address = $_POST['address'];
    $email = $_POST['email_address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize the data to prevent SQL injection
    $name = $conn->real_escape_string($name);
    $surname = $conn->real_escape_string($surname);
    $age = $conn->real_escape_string($age);
    $gender = $conn->real_escape_string($gender);
    $contact = $conn->real_escape_string($contact);
    $address = $conn->real_escape_string($address);
    $email = $conn->real_escape_string($email);
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Create an SQL query to insert data into the database
    $sql = "INSERT INTO new_table.users (name, surname, age, gender, contact, email, username, password)
            VALUES ('$name', '$surname', '$age', '$gender', '$contact', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
