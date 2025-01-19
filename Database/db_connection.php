<?php
// Database connection settings
$host = 'localhost'; // Hostname or IP address of the database server
$dbname = 'dog_adoption'; // Name of your database
$username = 'root'; // Database username
$password = ''; // Database password

// Create a MySQLi connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Optional: Set the character set to UTF-8 for consistent encoding
mysqli_set_charset($conn, "utf8");
?>
