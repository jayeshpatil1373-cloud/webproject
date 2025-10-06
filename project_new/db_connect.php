<?php
// Database connection details
$host = "localhost"; 
$user = "root";       // Your MySQL username
$pass = "";           // Your MySQL password (often empty for local development)
$db   = "tours_travels"; // ✅ CORRECTED to match your SQL script

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
// Connection successful
?>