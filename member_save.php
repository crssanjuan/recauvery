<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$id_no=$_POST['id_no'];
$course=$_POST['course'];
$year=$_POST['year'];
$sec=$_POST['sec'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$type=$_POST['type'];
$status=$_POST['status'];



								
mysqli_query($conn,"insert into users(firstname,lastname,id_no,course,year,sec,contact,email,type,status) values('$firstname','$lastname','$id_no','$course','$year','$sec','$contact','$email','$type','$status')")or die(mysqli_error());
 
 
header('location:member.php');
}
?>	