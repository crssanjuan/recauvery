<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$email=$_POST['email'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$password=$_POST['password'];
$role=$_POST['role'];


	
mysqli_query($conn,"insert into users (email,firstname,lastname,password,role) values('$email','$firstname','$lastname','$password','$role')")or die(mysqli_error());
	}
				
header('location:admin_user.php');

?>	