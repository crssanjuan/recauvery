<?php
include('dbcon.php');
$id=$_GET['id'];
mysqli_query($conn,"delete from contact where id='$id'")or die(mysqli_error());
header('location:contact.php');
?>