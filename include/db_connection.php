<?php
$db_host = "localhost";
$db_name = "pasti_nyala_db";
$db_user = "root";
$db_password = "";

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Make $conn a global variable
global $conn;
// global $pdo;
?>
