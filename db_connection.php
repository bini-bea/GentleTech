<?php
// Database connection parameters
$host = "localhost"; // Database server (use 'localhost' for local server or an IP address/domain for remote server)
$dbname = "appointment_system"; // Replace with your database name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment the line below if you want to confirm a successful connection during testing
 echo "Connected successfully!";
?>
