<?php
$servername = "localhost";
$username = "root";  // Default user in MAMP
$password = "root";  // Default password in MAMP
$dbname = "user_system"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
