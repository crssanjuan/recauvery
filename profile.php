<?php 
    include "navbar_lostitem.php";
   include "dbcon.php";
   if (isset($_SESSION['firstname']) && isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecAUvery</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link href="css/font-awesome.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/tooplate-style.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_viewprofile.css">
    <link rel="stylesheet" type="text/css" href="css/style-user.css"> 
</head>
<body>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active2 ms-0" href="profile.php" style="color:#751816;border-color:#751816;">Profile</a>
        <?php 
        $user_id = $_SESSION["id"];
        $user_query=mysqli_query($conn,"select * from users where user_id = $user_id")or die(mysqli_error());
                        while($row=mysqli_fetch_array($user_query)){
                        $user_id=$row['user_id']; ?>
        <a class="nav-link" id="e<?php echo $user_id; ?>" href="editprofile.php<?php echo '?user_id='.$user_id; ?>" >Edit Profile</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header" style="background-color:#751816; color: white;">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="uploads/profile/<?php echo $row['profile']?>"  alt="">
                    <!-- Profile picture help block-->
                    <div class="medium mb-2">
                        <?php 
                        $user_id = $_SESSION["id"];
                        $user_query=mysqli_query($conn,"select * from users where user_id = $user_id")or die(mysqli_error());
                        while($row=mysqli_fetch_array($user_query)){
                            echo ("<label style:'color:black;'>Name: " .$row['firstname']." ".$row['lastname']."</label><br>"); 
                            echo ("<label style:'color:black;'>Email: " .$row['email']."</label> <br>");
                            
                        } ?>
                    </div>
                </div>
            </div>
             <div class="card mb-4 mb-xl-0" style="margin-top: 20px;">
                <div class="card-header"style="background-color:#751816; color: white;">School ID </div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <?php 
                        $user_id = $_SESSION["id"];
                        $user_query=mysqli_query($conn,"select * from users where user_id = $user_id")or die(mysqli_error());
                        while($row=mysqli_fetch_array($user_query)){?>
                    <img class="img-account-profile " src="uploads/school_id/<?php echo $row['school_id']; ?>"  alt="" style="width: 365px; height:200px">
                    <!-- Profile picture help block-->
                    <div class="medium mb-2">
                        <?php} ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header" style="background-color:#751816; color: white;">Account Details</div>
                <div class="card-body">
                    <form method="POST">
                        <!-- Form Row-->
                        <?php 
                        $user_id = $_SESSION["id"];
                        $user_query=mysqli_query($conn,"select * from users where user_id = $user_id")or die(mysqli_error());
                        while($row=mysqli_fetch_array($user_query)){
        
        ?>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name:</label>
                                <input class="form-control" name="firstname"  placeholder="Firstname" type="text" value="<?php echo $row['firstname']; ?>" readonly>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name:</label>
                                <input class="form-control" name="lastname"  placeholder="Lastname" type="text" value="<?php echo $row['lastname']; ?>"readonly>
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Id No.:</label>
                                <input class="form-control" name="id_no" placeholder="Id No." type="text" value="<?php echo $row['id_no']; ?>"readonly>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Academic Level:</label>
                                <input class="form-control" name="course"  placeholder="Course" type="text" value="<?php echo $row['course']; ?>"readonly>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Year Level:</label>
                                <input class="form-control" name="year"  placeholder="Year" type="text" value="<?php echo $row['year']; ?>"readonly>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Section:</label>
                                <input class="form-control" name="sec"  placeholder="Section" type="text"value="<?php echo $row['sec']; ?>"readonly>
                            </div>
                        </div>

                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address:</label>
                            <input class="form-control" name="email"  placeholder="Email Address" type="email"value="<?php echo $row['email']; ?>"readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number:</label>
                                <input class="form-control" name="contact" value="<?php echo $row['contact']; ?>" placeholder="Phone Number"  autocomplete="off"  maxlength="11"  type="tel" pattern="[0-9]{11,11}"readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Type:</label>
                                <input class="form-control" name="type"  placeholder="Type" type="text"value="<?php echo $row['type']; ?>"readonly>
                            </div>
                            
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Status:</label>
                                <input class="form-control" name="status"  placeholder="status" type="text"value="<?php echo $row['status']; ?>"readonly>
                            </div>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('footer.php') ?>  
        
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
<?php } ?>
<?php } ?>