<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$lostitem_title=$_POST['lostitem_title'];
$founder=$_POST['founder'];
$description=$_POST['description'];
$datefound=$_POST['datefound'];
$upload_lost=$_POST['upload_lost'];





								
mysqli_query($conn,"insert into lostitems (lostitem_title,founder,description,datefound,upload_lost)
 values('$lostitem_title','$founder','$description','$datefound','$upload_lost',',NOW())")or die(mysqli_error());
 
 
header('location:lostitems.php');
}
?>	