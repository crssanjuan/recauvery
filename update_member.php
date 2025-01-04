<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$id=$_POST['id'];
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

mysqli_query($conn,"update users set firstname='$firstname',lastname='$lastname',id_no='$id_no',course='$course',year = '$year',sec='$sec',contact = '$contact',email='$email',type = '$type',status = '$status' where id='$id'")or die(mysqli_error());
								
								
header('location:member.php');
}
?>	