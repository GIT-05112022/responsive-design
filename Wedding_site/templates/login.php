<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "new_table";

$connection = new mysqli($host, $username, $password);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM new_table.users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password']; // Retrieve the stored plain text password

        // Verify the password
        if ($password === $storedPassword) {
            // Password is correct - perform actions or display a message
            echo "Login successful. You are now logged in!";
            // You can add further actions here, such as setting session variables.

            // If you don't want to redirect, you can add additional content or forms here.
        } else {
            // Password is incorrect
            echo "Incorrect password";
        }
    } else {
        // User not found
        echo "User not found";
    }
}

?>
