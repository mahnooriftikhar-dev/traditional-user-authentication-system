<?php
// Database configuration
$host = "localhost";      // Host name
$port = 5222;             // Your MySQL port
$user = "root";           // MySQL username
$password = "";           // MySQL password (empty if none)
$database = "user_db";    // Database name

// Create connection
$conn = new mysqli($host, $user, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

// Optional: set charset
$conn->set_charset("utf8mb4");
?>