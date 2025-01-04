<?php 
include "navbar_lostitem.php";   
include "dbcon.php";
if (isset($_SESSION['firstname']) && isset($_SESSION['id'])) {  
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>RecAUvery</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link href="css/font-awesome.css" rel="stylesheet" media="screen">
   <link rel="stylesheet" href="css/tooplate-style.css">   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>
   <div class="tm-main-content no-pad-b">
 <?php
$x = $_GET['id'];
$user_query = mysqli_query($conn, "
    SELECT li.*, 
           ai.admin_name AS accepted_admin_name,  -- Fetch admin name from accepted_items table
           ci.claimer_name, 
           ci.approved_by AS approved_admin_id, 
           u.firstname AS admin_firstname, 
           u.lastname AS admin_lastname
    FROM lostitems li
    LEFT JOIN accepted_items ai ON li.lostitem_id = ai.lostitem_id  -- Get the admin's name who accepted the lost item
    LEFT JOIN claimed_items ci ON li.lostitem_id = ci.lostitem_id  -- Check if the item was claimed
    LEFT JOIN users u ON ci.approved_by = u.user_id  -- Fetch the name of the admin who approved the claim
    WHERE li.lostitem_id = '$x'
") or die(mysqli_error($conn));
    
 while ($row = mysqli_fetch_array($user_query)) {
    $lostitemid = $row['lostitem_id'];
    $lostitem_title = $row['lostitem_title'];
    $founder = $row['founder'];
    $yearlevel = $row['yearlevel'];
    $strand = $row['strand'];
    $description = $row['description'];
    $datefound = $row['datefound'];
    $upload_lost = $row['upload_lost'];
    $status = $row['status'];
    $claimer_name = $row['claimer_name'];
    
    // Fetch the admin who accepted the item from the accepted_items table
    $accepted_admin_name = !empty($row['accepted_admin_name']) ? htmlspecialchars($row['accepted_admin_name']) : null;

    // Fetch the admin who approved the claim from claimed_items
    $approved_admin_name = !empty($row['admin_firstname']) && !empty($row['admin_lastname'])
        ? htmlspecialchars($row['admin_firstname'] . ' ' . $row['admin_lastname'])
        : null;

    // Determine the message based on the status
    if ($claimer_name) {
        $message = "This item has already been claimed by $claimer_name.";
    } else {
        $message = "Please proceed to the OSA if you want to claim this item. Please bring proof of ownership if necessary.";
    }
?>
        <section class="row tm-item-preview">
        <div class="col-md-6 col-sm-12 mb-md-0 mb-5">
            <img src="uploads/lostpic/<?php echo $upload_lost ?>" alt="Image" class="img-fluid tm-img-center-sm" style="width: 300px; height: 300px; margin-left: 150px;">
        </div>
        <div class="col-md-6 col-sm-12">
            <h2 class="tm-blue-text tm-margin-b-p"><?php echo $lostitem_title ?></h2>
            <p class="tm-blue-text tm-margin-b-s">Found by: <?php echo $founder ?></p>
            <p class="tm-blue-text tm-margin-b-s">Year Level: <?php echo $yearlevel ?></p>
            <p class="tm-blue-text tm-margin-b-s">Course/Strand: <?php echo $strand ?></p>
            <p class="tm-blue-text tm-margin-b-s">Date Found: <?php echo $datefound ?></p>
            <p class="tm-margin-b-p">Description: <?php echo $description ?></p>
            <p class="tm-margin-b-p"><?php echo $message; ?></p>
            
            <?php if ($accepted_admin_name): ?>
                <p class="tm-margin-b-p">Lost Item Accepted by admin: <?php echo $accepted_admin_name; ?></p>
            <?php endif; ?>
            
            <?php if ($approved_admin_name): ?>
                <p class="tm-margin-b-p">Admin who released the lost item: <?php echo $approved_admin_name; ?></p>
            <?php endif; ?>
        </div>
    </section>

    </div>
    <?php } ?>

<!-- load JS files -->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/navbar.js"></script>
<script>     
    $(document).ready(function(){
      $('.tm-current-year').text(new Date().getFullYear());
    });
</script> 
<?php } ?>
