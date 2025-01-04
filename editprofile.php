<?php include ('navbar_lostitem.php') ?>
<?php 
   

if (isset($_SESSION['firstname']) && isset($_SESSION['id'])) { 
    if (!isset($_GET['user_id'])) {
        #Redirect to admin.php page
        header("Location: profile.php");
        exit;
    }

    $user_id = $_GET['user_id'];

    # Database Connection File
    include "db_conn.php";

    # User helper function
    include "php/func-user.php";
    $user = get_user($conn, $user_id);
    
    # If the ID is invalid
    if ($user == 0) {
        #Redirect to admin.php page
        header("Location: profile.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SintaBibliotheca</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link href="css/font-awesome.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/tooplate-style.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_viewprofile.css">
    <link rel="stylesheet" href="css/style-user.css">  
</head>
<body>
 
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link" href="profile.php" >Profile</a>
        <a class="nav-link active2 ms-0" href="editprofile.php" style="color:#751816; border-color:#751816;" >Edit Profile</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header"style="background-color:#751816; color: white;">Profile Picture </div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="uploads/profile/<?=$user['profile']?>"  alt="">
                    <!-- Profile picture help block-->
                    <div class="medium mb-2">
                        <?php 

                            echo ("<label style:'color:black;'>Name: " .$user['firstname']." ".$user['lastname']."</label>");
                            echo ("<label style:'color:black;'>Email: " .$user['email']."</label> <br>");
                            
                     ?>
                    </div>
                </div>
            </div>
            <div class="card mb-4 mb-xl-0" style="margin-top: 20px;">
                <div class="card-header"style="background-color:#751816; color: white;">School ID </div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile " src="uploads/school_id/<?=$user['school_id']?>"  alt="" style="width: 365px; height:200px">
                    <a href="uploads/school_id/<?=$user['school_id']?>"
                       class="link-dark" style="margin-right: 20px;">Current School Id</a>
                    <!-- Profile picture help block-->
                    <div class="medium mb-2">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header"style="background-color:#751816; color: white;">Account Details</div>
                <div class="card-body">
                   <form class="form-horizontal" method="POST" action="php/edit-user.php" enctype="multipart/form-data">
                   <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert" style="height:50px;">
              <?=htmlspecialchars($_GET['error']); ?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
              <?=htmlspecialchars($_GET['success']); ?>
          </div>
        <?php } ?>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name:</label>
                                <input class="form-control" name="firstname"  placeholder="Firstname" type="text" value="<?=$user['firstname']?>">
                                <input type="hidden" id="inputEmail" name="user_id" value="<?=$user['user_id']?>" placeholder="Firstname" required>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name:</label>
                                <input class="form-control" name="lastname"  placeholder="Lastname" type="text" value="<?=$user['lastname']?>">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Id No.:</label>
                                <input class="form-control" name="id_no" placeholder="XXXX-XXXXX-XX-X" type="text"value="<?=$user['id_no']?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Academic Level::</label>
                                <input class="form-control" name="course"  placeholder="Academic Level" type="text" value="<?=$user['course']?>">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Year Level:</label>
                                <input class="form-control" name="year"  placeholder="Year" type="text" value="<?=$user['year']?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Section:</label>
                                <input class="form-control" name="sec"  placeholder="Section" type="text"value="<?=$user['sec']?>">
                            </div>
                        </div>

                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address:</label>
                            <input class="form-control" name="email"  placeholder="Email Address" type="email"value="<?=$user['email']?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number:</label>
                                <input class="form-control" name="contact" value="<?=$user['contact']?>" placeholder="Phone Number"  autocomplete="off"  maxlength="11"  type="tel" pattern="[0-9]{11,11}">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Type:</label>
                                <select name = "type" tabindex="1" data-placeholder="Select Type" class="form-control" style="height: 45px;">
                                    <option value="<?=$user['type']?>"><?=$user['type']?></option>
                                    <option value="Student" >Student</option>
                                    <option value="Teacher">Faculty</option>
                                </select>
                            </div> 
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Status:</label>
                                <select name = "status" tabindex="1" data-placeholder="Select Status" class="form-control"style="height: 45px;">
                                    <option value="<?=$user['status']?>"><?=$user['status']?></option>
                                    <option value="Active" selected>Active</option>
                                    <option value="Banned" disabled select>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Password:</label>
                                <input class="form-control" name="password" id="myInput" placeholder="password" type="password"value="<?=$user['password']?>">
                                <input type="checkbox" onclick="myFunction()"><label class="small mb-1">Show Password</label>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                         <div class="col-md-6">
                            <label class="small mb-1" for="inputOrgName">Profile Picture: <span style="color: red;">(1X1 PIC W/ WHITE BACKGROUND)</span></label>
                                <input class="form-control" name="pic"  placeholder="" type="file">
                                <input type="hidden"  value="<?=$user['profile']?>"  name="current_profile">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">School Id: <span style="color: red;">(PNG, JPEG, JPG ONLY)</span></label>
                                <input class="form-control" name="pic2"  placeholder="" type="file">
                                <input type="hidden"  value="<?=$user['school_id']?>"  name="current_id">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" name="submit" style="float: right;" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
Copyright &copy; <span class="tm-current-year"></span>  
                
CY & FRIENDS
</footer>    
        
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
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
<?php }else{
  header("Location: login.php");
  exit;
} ?>