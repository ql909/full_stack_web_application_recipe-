<?php
$host = 'localhost';
$dbname = 'recipe_database';
$dbusername = 'root';
$dbpassword = '';

try {
    // Connect to MySQL and select the specific database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle the error appropriately
    error_log("Connection failed: " . $e->getMessage());
    // Optionally, redirect to an error page or provide a user-friendly error message
}

?>
