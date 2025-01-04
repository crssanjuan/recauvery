<?php
// forgot_password.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "aulfms", 3308);

    // Check for database connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize email input
    $email = $conn->real_escape_string($email);

    // Check if email exists in the database
    $result = $conn->query("SELECT id FROM users WHERE email = '$email'");

    if ($result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        
        // Store the token in the database with an expiration time
        $conn->query("UPDATE users SET reset_token = '$token', token_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = '$email'");

        // Send the reset link via email
        $reset_link = "http://yourdomain.com/reset_password.php?token=$token";
        mail($email, "Password Reset Request", "Click the link to reset your password: $reset_link");

        echo "A password reset link has been sent to your email.";
    } else {
        echo "No account found with that email address.";
    }

    $conn->close();
}
?>

<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<!-- Password Reset 8 - Bootstrap Brain Component -->
<section class="bg-light p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-xxl-11">
        <div class="card border-light-subtle shadow-sm">
          <div class="row g-0">
            <div class="col-12 col-md-6">
              <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="logo.jpg" alt="Welcome back you've been missed!">
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-5">
                        <div class="text-center mb-4">
                          
                        </div>
                        <h2 class="h4 text-center">Password Reset</h2>
                        <h3 class="fs-6 fw-normal text-secondary text-center m-0">Provide the email address associated with your account to recover your password.</h3>
                      </div>
                    </div>
                  </div>
                  <form method="POST" action="forgot_password.php">
                    <div class="row gy-3 overflow-hidden">
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                          <label for="email" class="form-label">Email</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                        <a href="login.php" class="link-secondary text-decoration-none">Login</a>
                        <a href="signup.php" class="link-secondary text-decoration-none">Register</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
