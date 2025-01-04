<?php
include('dbcons.php'); // Include your database connection file
session_start();

if (isset($_POST['accept'])) {
    $lostitem_id = $_POST['lostitem_id'];
    $admin_name = $_POST['adminName']; // Admin name from the form
    $acceptance_date = date('Y-m-d H:i:s'); // Current date and time

    // Handle image upload
    $target_dir = "uploads/proofs/";
    $uploaded_image = '';

    // Check if the upload directory exists, if not create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Create the directory with write permissions
    }

    if (!empty($_FILES["upload_image"]["name"])) {
        $target_file = $target_dir . basename($_FILES["upload_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Check if the file is a valid image
        $check = getimagesize($_FILES["upload_image"]["tmp_name"]);
        if ($check === false) {
            $_SESSION['error'] = "File is not a valid image.";
            $uploadOk = 0;
        }

        // Check file size (limit: 5MB)
        if ($_FILES["upload_image"]["size"] > 5000000) {
            $_SESSION['error'] = "Sorry, your file is too large (max 5MB).";
            $uploadOk = 0;
        }

        // Allow only specific file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, and PNG files are allowed.";
            $uploadOk = 0;
        }

        // Try to upload the file if there are no errors
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], $target_file)) {
                $uploaded_image = basename($_FILES["upload_image"]["name"]); // Store the file name to save in the database
            } else {
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                header("Location: lostitems_admin.php");
                exit();
            }
        } else {
            header("Location: lostitems_admin.php");
            exit();
        }
    }

    // Insert the accepted item into the accepted_items table
    $query = "INSERT INTO accepted_items (lostitem_id, admin_name, acceptance_date, upload_proof) 
              VALUES ('$lostitem_id', '$admin_name', '$acceptance_date', '$uploaded_image')";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Item accepted successfully!";
    } else {
        $_SESSION['error'] = "Error accepting item: " . mysqli_error($conn);
    }

    // Redirect back to the lost items page
    header("Location: lostitems_admin.php");
    exit();
}
?>
