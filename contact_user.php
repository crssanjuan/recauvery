<?php include
	"navbar_lostitem.php";
?>
<?php 
   include "dbcon.php";
   if (isset($_SESSION['firstname']) && isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SintaBibliotheca</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link href="css/font-awesome.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/tooplate-style.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contact.css"> 
</head>
<body>
	
    <div class="container1">
		<section class="contact">
			<div class="content">
				<h3 style="font-size: 36px; margin: 0;">Contact Us</h3>
				<p>Any problem with the website? Message us below.</p>
			</div>
			<div class="container2">
				<div class="contact-info">
					<div class="box">
						<div class="icon"><i class="icon-map-marker icon-large"></i></div>
						<div class="text">
							<h5 style="font-weight: bold; margin: 0;">Address</h5>
							Gen. Kalentong<br>Mandaluyong City
						</div>
					</div>
				<div class="box">
					<div class="icon"><i class="icon-phone icon-large"></i></div>
						<div class="text">
							<h5 style="font-weight: bold; margin: 0;">Phone</h5>
							09123456789
						</div>
					</div>
				<div class="box">
					<div class="icon"><i class="icon-envelope icon-medium"></i></div>
						<div class="text">
							<h5 style="font-weight: bold; margin: 0;">Email</h5>
							emailus@gmail.com
						</div>
					</div>
				</div>
				<div class="contactform">
					<form action="cont.php" method="post">
						<h2>Send Message</h2>
						<div class="inputBox">
							<input type="text" name="name" required>
							<span>Full Name</span>
						</div>
						<div class="inputBox">
							<input type="text" name="email" required>
							<span>Email</span>
						</div>
						<div class="inputBox">
							<textarea name="message" required></textarea>
							<span>Type Your Message....</span>
						</div>
						<div class="inputBox">
							<input type="submit" name="send" value="Send">
						</div>
					</form>
				</div>
			</div>
	</section>
</div>


<?php include ('footer.php'); ?>


<!-- load JS files -->
<script src="js/jquery-1.11.3.min.js"></script>         <!-- jQuery (https://jquery.com/download/) -->
<script src="js/popper.min.js"></script>                <!-- Popper (https://popper.js.org/) -->
<script src="js/bootstrap.min.js"></script>             <!-- Bootstrap (https://getbootstrap.com/) -->
<script src="js/navbar.js"></script>
<script>     
	$(document).ready(function(){
      // Update the current year in copyright
       $('.tm-current-year').text(new Date().getFullYear());
    });
</script> 
</body>
</html>
<?php } ?>    