<?php
include 'dbconn.php';

if (isset($_POST['appointment-submit'])) {
    // Collect form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $id_no = $_POST['id_no'];
    $password = $_POST['password']; // No hashing applied here
    $role = $_POST['role'];
    $school_id = $_FILES['school_id']; // Handling the file input (school ID picture)

    // Validate if all fields are filled in
    if (empty($firstname) || empty($lastname) || empty($email) || empty($id_no) || empty($password) || empty($role) || empty($school_id['name'])) {
        header("location: signup.php?stats=error&message=All fields, including the file, are required.");
        die();
    }

    // Handle file upload
    $uploadDir = 'uploads/schoolid/';

    // Check if the upload folder is writable
    if (is_writable($uploadDir)) {
        echo "The uploads folder is writable.";
    } else {
        echo "The uploads folder is NOT writable. Please check the permissions.";
    }

    $fileName = basename($school_id['name']);
    $filePath = $uploadDir . $fileName;

    // Move the uploaded file to the uploads directory
    if (!move_uploaded_file($school_id['tmp_name'], $filePath)) {
        header("location: signup.php?stats=error&message=File upload failed.");
        die();
    }

    // Insert user details into the database without password hashing
    if (insertRegister($firstname, $lastname, $email, $id_no, $password, $role, $filePath)) {
        header('location: signup.php?stats=success&message=Account creation successful.');
        die();
    } else {
        header('location: signup.php?stats=failed&message=Account creation failed.');
        die();
    }
}

function insertRegister($firstname, $lastname, $email, $id_no, $password, $role, $filePath) {
    $firstname = mysqlentities_fix_string($firstname);
    $lastname = mysqlentities_fix_string($lastname);
    $email = mysqlentities_fix_string($email);
    $id_no = mysqlentities_fix_string($id_no);
    $password = mysqlentities_fix_string($password); // No hashing applied here
    $role = mysqlentities_fix_string($role);
    $filePath = mysqlentities_fix_string($filePath); // Sanitize file path

    $con = connect();
    $insertSQL = "INSERT INTO users (firstname, lastname, email, id_no, password, role, school_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($insertSQL);
    $stmt->bind_param('sssssss', $firstname, $lastname, $email, $id_no, $password, $role, $filePath);

    if (!$stmt->execute()) {
        echo "Error: " . $con->errno . " " . $con->error;
        return false;
    }

    return true;
}

function mysqlentities_fix_string($string) {
    $string = strip_tags($string);
    return htmlentities($string);
}
?>
