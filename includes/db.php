<?php
// Database configuration
$host = 'localhost';
$dbname = 'mymvc';
$username = 'root';
$password = '';

// Establish database connection
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set UTF-8 character set to ensure proper encoding
    $db->exec("SET NAMES utf8mb4");
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

