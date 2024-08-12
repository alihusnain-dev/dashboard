<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dashboard";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variables from form submission
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
// $password = $_POST['password'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Example of inserting data into a table (assuming you have a 'users' table)
$sql = "INSERT INTO signup (name, email,mobile,  password)
        VALUES ('$name', '$email', '$mobile', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('User ID and password not found. Please try again.');</script>";
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("location: error.html");
}

$conn->close();
