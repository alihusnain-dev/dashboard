<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "dashboard";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Debugging: Check if the SQL query is valid
    $sql = "SELECT name, password FROM signup WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($name, $hashed_password);
        $stmt->fetch();
        // $stmt->bind_result($name);

        if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $name;
            // Bind result variables
            echo "<script>alert('Welcome! $username');</script>";
            // echo "<script>alert('Welcome, $name!');</script>";
            header("Location: dash.html");
            exit();
        } else {
            echo "<script>alert('User ID and password not found. Please try again.');</script>";
            echo "<script>window.location.href = 'index.html';</script>";
            // header("location: dash.html");
        }

        $stmt->close();
    } else {
        // header("Location: error.html");
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
