<?php
// reset_password.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $token = $_GET['token'];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "aulfms", 3308);

    // Check for database connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the token is valid
    $result = $conn->query("SELECT id, token_expires FROM users WHERE reset_token = '$token'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if token has expired
        if (new DateTime() > new DateTime($row['token_expires'])) {
            echo "The password reset link has expired.";
        } else {
            // Check if passwords match
            if ($password == $confirm_password) {
                // Hash the new password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Update the password in the database
                $conn->query("UPDATE users SET password = '$hashed_password', reset_token = NULL, token_expires = NULL WHERE reset_token = '$token'");

                echo "Your password has been successfully reset.";
            } else {
                echo "Passwords do not match.";
            }
        }
    } else {
        echo "Invalid token.";
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
                  <form method="POST" action="reset_password.php?token=<?php echo $_GET['token']; ?>">
                    <div class="row gy-3 overflow-hidden">
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password" required>
                          <label for="password" class="form-label">Enter new password:</label>
                        </div>
                      </div>
                      <div class="row gy-3 overflow-hidden">
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm new password" required>
                          <label for="password" class="form-label">Confirm new password:</label>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
