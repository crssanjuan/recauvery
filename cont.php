<?php
include('dbcon.php');
if (isset($_POST['send']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$query="insert into contact (name,email,message) values('$name','$email','$message')";

if($conn->query($query) === TRUE){
echo "<script type='text/javascript'>alert('Message Sent Successfully!')</script>";
echo "<script type='text/javascript'>window.location = 'contact_user.php'</script>";

}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
  }
  }                              
?>              