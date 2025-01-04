<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$conn = new mysqli('localhost','root','','aulfms','3306');
if ($conn ->connect_error){
	die('Connection Failed : '.$conn ->connect_error);
}
else{
	$stmt = $conn->prepare("INSERT INTO users(firstname,lastname,username,password,role) values(?,?,?,?,?)");
	$stmt->bind_param("sssss",$firstname,$lastname,$username,$password,$role);
	$stmt->execute();
	header("Location: login.php");
	$stmt->close();
	$conn->close();
}
?>