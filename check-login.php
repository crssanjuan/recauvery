<?php  
session_start();
include "dbconn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    if (empty($email)) {
        header("Location: login.php?error=Email is Required");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=Password is Required");
        exit();
    } else {
        $con = connect();
        // Fetch the user data based on email
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            // Verify the password (if using plain text passwords, consider hashing them)
            if ($row['password'] === $password) {
                // Store user info in session
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['email'] = $row['email'];

                // Redirect based on user role
                if ($row['role'] === 'Student') {
                    header("Location: index_user.php");
                    exit();
                } elseif ($row['role'] === 'Admin') {
                    header("Location: dashboard_admin.php");
                    exit();
                }
            } else {
                header("Location: login.php?error=Incorrect Email or Password");
                exit();
            }
        } else {
            header("Location: login.php?error=No user found with this email");
            exit();
        }
    }

} else {
    header("Location: login.php");
    exit();
}
