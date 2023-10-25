<?php
$host = "localhost";
$username = "root";
$password = "AA@#yu12";
$database = "new_schema";
echo "beginning \n";
// Establish a connection to the database
$conn = new mysqli($host, $username, $password, $database);
echo "before first if ";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "before secoind if ";
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
    $sql = "INSERT INTO new_table (name, surname, age, gender, contact, address, email, username, password)
            VALUES ('$name', '$surname', '$age', '$gender', '$contact', '$address', '$email', '$username', '$password')";
echo "before third if ";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

