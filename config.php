<?php
// Database connection parameters
$hostName = "localhost"; // Replace with your host name
$dbName = "tms"; // Replace with your database name
$dbUsername = "root"; // Replace with your database username
$dbPassword = ""; // Replace with your database password

$db_connection_successful = false; // Flag to check if the database connection is successful
$db_connection_message = ''; // Variable to store the database connection message

// Attempt to establish a database connection
try {
    $pdo = new PDO("mysql:host=$hostName;dbname=$dbName", $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_connection_successful = true; // Set flag to true if connection is successful
    $db_connection_message = 'Database connection successful!';
} catch (PDOException $e) {
    $db_connection_message = 'Connection failed: ' . $e->getMessage();
}
?>
