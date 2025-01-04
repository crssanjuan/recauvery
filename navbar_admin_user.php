<?php include('dbcon.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RecAUvery</title>

	<!-- for navbar -->

		<link rel="stylesheet" type="text/css" href="css/navbar_all.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
     	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.2/iconfont/material-icons.min.css" media="screen">
     	 <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" media="screen">
      	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
<body>

	<header class="unique-header">
   <nav class="unique-navbar">
      <span class="unique-open-menu">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16">
            <g fill="#252a32" fill-rule="evenodd">
               <path d="M0 0h24v2H0zM0 7h24v2H0zM0 14h24v2H0z" />
            </g>
         </svg>
      </span>
      <h1><a href="#" class="unique-brand"><img src="img/arellano_logo.png" alt="Arellano Logo"></a></h1>
      <div class="unique-menu-wrapper">
         <ul class="unique-menu">
            <li class="unique-menu-item">
               <span class="unique-close-menu">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                     <path fill="#252a32" fill-rule="evenodd" d="M17.778.808l1.414 1.414L11.414 10l7.778 7.778-1.414 1.414L10 11.414l-7.778 7.778-1.414-1.414L8.586 10 .808 2.222 2.222.808 10 8.586 17.778.808z" />
                  </svg>
               </span>
            </li>
            <li class="unique-menu-link-item"><a href="home.php" class="unique-menu-link">Home</a></li>
            <li class="unique-menu-link-item"><a href="admin_user.php" class="unique-menu-link">Users</a></li>
            <li class="unique-menu-link-item"><a href="#" class="unique-menu-link">Profiles</a></li>
            <li class="unique-menu-link-item"><a href="#" class="unique-menu-link">Lost Items</a></li>
            <li class="unique-menu-link-item"><a href="#" class="unique-menu-link">Claimed Items</a></li>
            <li class="unique-menu-link-item"><a href="#" class="unique-menu-link">About Us</a></li>
            <li class="unique-menu-link-item"><a href="#" class="unique-menu-link">Contact Us</a></li>
            <li class="unique-menu-link-item unique-has-submenu">
               <a href="#"><span></span>WELCOME: &nbsp;<?=$_SESSION['firstname']?> </a>
               <ul class="unique-submenu">
                  
                  <?php 
        $user_id = $_SESSION["id"];
        $user_query=mysqli_query($conn,"select * from users where user_id = $user_id")or die(mysqli_error());
                        while($row=mysqli_fetch_array($user_query)){
                        $user_id=$row['user_id']; }?>
                  <li class="unique-submenu-item"><a href="logout.php">Logout</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </nav>
</header>


      <!-- header section end -->

      <script src="js/navbar_user-home.js"></script>


</body>
</html>
 