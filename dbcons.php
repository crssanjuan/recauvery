<?php 

// Server name
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "aulfms";
$port = "3308";

// Create a MySQLi connection
$conn = new mysqli($sName, $uName, $pass, $db_name, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
