<?php
// Database configuration
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];
$carOptions = implode(", ", $_POST["car_options"]);

// Prepare and execute SQL query to insert data into a table named 'form_responses'
$sql = "INSERT INTO form_responses (name, phone, email, address, car_options) 
        VALUES ('$name', '$phone', '$email', '$address', '$carOptions')";

if ($conn->query($sql) === TRUE) {
    echo "Form response stored successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
