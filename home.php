<?php 
   session_start();
   include "dbcon.php";
   if (isset($_SESSION['firstname']) && isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
      <?php if ($_SESSION['role'] == 'Admin') {?>
        <!-- For Admin -->
            <?php include 'dashboard_admin.php'; ?>
      <?php } else { ?>
        <!-- FOR USERS -->
            <?php include 'index_user.php'; }?>
</body>
</html>
<?php } else{
    header("Location: login.php");
} ?>