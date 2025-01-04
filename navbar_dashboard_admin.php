<?php 
include('dbcon.php');
session_start(); // Start the session to access session variables

// Check if the session variables are set, otherwise handle it gracefully
if (!isset($_SESSION['firstname'])) {
    // If the user is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecAUvery</title>

    <!-- for navbar -->
    <link rel="stylesheet" type="text/css" href="css/navbar_user-home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.2/iconfont/material-icons.min.css" media="screen">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" media="screen">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <header class="header">
        <nav class="navbar">
            <span class="open-menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16">
                    <g fill="#252a32" fill-rule="evenodd">
                        <path d="M0 0h24v2H0zM0 7h24v2H0zM0 14h24v2H0z" />
                    </g>
                </svg>
            </span>
            <h1><a href="#" class="brand"><img src="img/arellano_logo.png"></a></h1>
            <div class="menu-wrapper">
                <ul class="menu">
                    <li class="menu-block">
                        <span class="close-menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                <path fill="#252a32" fill-rule="evenodd" d="M17.778.808l1.414 1.414L11.414 10l7.778 7.778-1.414 1.414L10 11.414l-7.778 7.778-1.414-1.414L8.586 10 .808 2.222 2.222.808 10 8.586 17.778.808z" />
                            </svg>
                        </span>
                    </li>
                    <li class="menu-item"><a href="home.php" class="menu-link">Home</a></li>
                    <li class="menu-item"><a href="admin_user.php" class="menu-link">Users</a></li>
                    <li class="menu-item"><a href="member.php" class="menu-link">Profiles</a></li>
                    <li class="menu-item"><a href="lostitems_admin.php" class="menu-link">Lost Items</a></li>
                    <li class="menu-item"><a href="claimed_items.php" class="menu-link">Claimed Items</a></li>
                    <li class="menu-item"><a href="contact.php" class="menu-link">Feedbacks</a></li>
                    <li class="menu-item has-collapsible">
                        <a href="#"><span></span>WELCOME: &nbsp;<?=$_SESSION['firstname']?> </a>
                        <ul class="menu-child">
                            <li class="menu-child-item"><a href="logout.php">Logout</a></li>
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
