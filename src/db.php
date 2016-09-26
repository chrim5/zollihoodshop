<?php
$servername = $_ENV["MYSQL_PORT_3306_TCP_ADDR"];
$username = "root";
$password = $_ENV["MYSQL_ENV_MYSQL_ROOT_PASSWORD"];

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>

