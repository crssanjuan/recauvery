<?php
include('dbcon.php');

$user_id=$_GET['user_id'];

mysqli_query($conn,"delete from users where user_id='$user_id'") or die(mysqli_error());

header('location:admin_user.php');
?>