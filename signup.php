<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Sign Up Page</title>
    <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
   <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="logo.jpg" alt="logo picture">
        <div class="text"></div>
      </div>
      <div class="back">
        <img src="logo.jpg" alt="logo picture">
      </div>
    </div>
  <div class="forms">
    <div class="form-content">
    <div class="signup-form">
          <div class="title">Sign-up</div>
        <form action="actions.php" method="POST" enctype="multipart/form-data">
           <?php
            if (isset($_GET['stats'])) {
                $stats  = $_GET['stats'];
                $message = $_GET['message'];
                echo "<script>alert('$message')</script>";
                if ($stats == 'success') { ?>
                        <div class="alert alert-success" role="alert" style="color: #468847;background-color: #dff0d8; border-color: #d6e9c6;">
                        <?=$_GET['message']?>
                        </div>
                <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                        <?=$_GET['message']?>
                        </div>
                 <?php } ?>
            <?php } ?>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" id="inputEmail" name="firstname"  placeholder="Firstname" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" id="inputPassword" name="lastname"  placeholder="Lastname" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" id="email" placeholder="Email" required>
              </div>
               <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" id="inputPassword" name="id_no"  placeholder="School ID Number" required>
              </div>

              <div class="input-box">
                <i class="fas fa-image"></i>
                <label for="inputSchoolId" style="padding-left: 25px;">School ID Picture</label>
                <input type="file" id="inputSchoolId" name="school_id" accept="image/*" required>
              </div>

              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
              </div>
        <div class="input-box">
          <i class="fas fa-user"></i>
         <select name="role">
          <option selected value="Select User Type" disabled>Select User Type</option>
          <option value="Student">Student</option>
          <option value="Admin" disabled>Admin</option>
        </select>
        </div>
              <div class="button input-box">
                <input type="submit" name="appointment-submit" value="Register">
              </div>
              <div class="text sign-up-text">Already have an account? 
                <a href="login.php" class="sign">Login now</a></div>
            </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
