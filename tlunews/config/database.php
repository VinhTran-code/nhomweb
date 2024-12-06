<?php
$host = 'localhost'; // Your database host
$dbname = 'tintuc'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // Stop execution if the connection fails
}
?>
