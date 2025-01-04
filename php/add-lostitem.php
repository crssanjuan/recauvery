<?php

include('../dbcon.php'); // Database connection file

// File Upload helper function
include "func-file-upload.php";
include "func-validation.php";

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $lostitem_title = $_POST['lostitem_title'];
    $founder = $_POST['founder'];
    $yearlevel = $_POST['yearlevel'];
    $strand = $_POST['strand'];
    $description = $_POST['textareaDescription'];
    $datefound = $_POST['datefound'];

    // Validate form data
    $user_input = 'lostitem_title=' . urlencode($lostitem_title) . '&founder=' . urlencode($founder) . '&description=' . urlencode($description) . '&datefound=' . urlencode($datefound) . '&yearlevel=' . urlencode($yearlevel) . '&strand=' . urlencode($strand);

    // Form Validation
    $text = "Lost Item Title";
    $location = "../add_lostitem.php";
    $ms = "error";
    is_empty($lostitem_title, $text, $location, $ms, $user_input);

    $text = "Founder";
    is_empty($founder, $text, $location, $ms, $user_input);

    $text = "Year Level";
    is_empty($yearlevel, $text, $location, $ms, $user_input);

    $text = "Strand";
    is_empty($strand, $text, $location, $ms, $user_input);

    $text = "Description";
    is_empty($description, $text, $location, $ms, $user_input);

    $text = "Date Found";
    is_empty($datefound, $text, $location, $ms, $user_input);

    // File Upload
    $allowed_image_exs = array("jpg", "jpeg", "png", "jfif");
    $path = "lostpic";
    $upload_lost = upload_file($_FILES['upload_lost'], $allowed_image_exs, $path);

    // Check if upload was successful
    if ($upload_lost['status'] == "error") {
        $em = $upload_lost['data'];
        header("Location: ../add_lostitem.php?error=$em&$user_input");
        exit;
    } 

    // Get the URL of the uploaded file
    $upload_lost_URL = $upload_lost['data'];

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO lostitems (lostitem_title, founder, yearlevel, strand, description, datefound, upload_lost) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $lostitem_title, $founder, $yearlevel, $strand, $description, $datefound, $upload_lost_URL);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Redirect to success page
    header("Location: ../add_lostitem.php?success=Item added successfully. Please go to the Lost Items tab.");
    exit;
} else {
    // Redirect to form page if not submitted
    header("Location: ../add_lostitem.php");
    exit;
}
?>
