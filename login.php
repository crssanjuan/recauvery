<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login Page</title>
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
      </div>

      <div class="back">
        <img src="logo.jpg" alt="logo picture">
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Log-in Here</div>
            <form action="check-login.php" method="POST">
              <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
              <?php } ?>
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="button input-box">
                  <input type="submit" name="login" value="Login">
                </div>
                <div class="text sign-up-text"> 
                  <a href="forgot_password.php" class="sign">Forgot Password?</a>
                </div>
              </div>
              <div class="text sign-up-text">Don't have an account? 
                <a href="signup.php" class="sign">Sign up now</a>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</body>
</html>
