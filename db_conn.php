<?php 

// Server name
$sName = "localhost";
// User name
$uName = "root";
// Password
$pass = "";

// Database name
$db_name = "aulfms";

// Custom port
$port = "3308";

try {
    // Creating a database connection using PDO with custom port
    $conn = new PDO("mysql:host=$sName;port=$port;dbname=$db_name;", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
