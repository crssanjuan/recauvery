<?php  
session_start();

// If the admin is logged in
if (isset($_SESSION['firstname']) && isset($_SESSION['id'])) {

    // Database Connection File
    include "../db_conn.php";

    // Validation helper function
    include "func-validation.php";

    // File Upload helper function
    include "func-file-upload.php";

    // If all input fields are filled
    if (isset($_POST['lostitem_id']) && isset($_POST['lostitem_title']) &&
        isset($_POST['founder']) && isset($_POST['yearlevel']) && isset($_POST['strand']) &&
        isset($_POST['datefound']) &&
        isset($_POST['description']) && isset($_FILES['upload_lost']) &&
        isset($_POST['current_upload_lost'])) {

        // Get data from POST request and store them in variables
        $lostitem_id = $_POST['lostitem_id'];
        $lostitem_title = $_POST['lostitem_title'];
        $founder = $_POST['founder'];
        $yearlevel = $_POST['yearlevel'];
        $strand = $_POST['strand'];
        $datefound = $_POST['datefound'];
        $description = $_POST['description'];
        $current_upload_lost = $_POST['current_upload_lost'];

        // Simple form validation
        $text = "Lost Item Title";
        $location = "../edit-lostitem.php";
        $ms = "lostitem_id=$lostitem_id&error";
        is_empty($lostitem_title, $text, $location, $ms, "");

        $text = "Founder";
        $ms = "lostitem_id=$lostitem_id&error"; // Corrected typo here
        is_empty($founder, $text, $location, $ms, "");

        $text = "Year Level";
        $ms = "lostitem_id=$lostitem_id&error"; // Corrected typo here
        is_empty($yearlevel, $text, $location, $ms, "");

        $text = "Strand";
        $ms = "lostitem_id=$lostitem_id&error"; // Corrected typo here
        is_empty($strand, $text, $location, $ms, "");

        $text = "Description";
        $ms = "lostitem_id=$lostitem_id&error"; // Corrected typo here
        is_empty($description, $text, $location, $ms, "");

        $text = "Date Found";
        $ms = "lostitem_id=$lostitem_id&error"; // Corrected typo here
        is_empty($datefound, $text, $location, $ms, "");

        // Handle file upload and update
        $upload_lost_URL = $current_upload_lost; // Default to current if no new upload

        if (!empty($_FILES['upload_lost']['name'])) {
            // If the admin tries to update the book cover
            $allowed_image_exs = array("jpg", "jpeg", "png");
            $path = "lostpic";
            $upload_lost = upload_file($_FILES['upload_lost'], $allowed_image_exs, $path);

            // Check for upload errors
            if ($upload_lost['status'] == "error") {
                $em = $upload_lost['data'];
                header("Location: ../edit-lostitem.php?error=$em&id=$lostitem_id");
                exit;
            } else {
                // Delete old cover if new upload is successful
                $c_p_upload_lost = "../uploads/lostpic/$current_upload_lost";
                if (file_exists($c_p_upload_lost)) {
                    unlink($c_p_upload_lost);
                }
                $upload_lost_URL = $upload_lost['data']; // Update the URL with the new file
            }
        }

        // Prepare and execute the update query
        $sql = "UPDATE lostitems SET lostitem_title=?, founder=?, yearlevel=?, strand=?, 
        description=?, datefound=?, upload_lost=? WHERE lostitem_id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$lostitem_title, $founder, $yearlevel, $strand, $description, $datefound, $upload_lost_URL, $lostitem_id]);

        // Check the result of the update
        if ($res) {
            $sm = "Successfully updated!";
            header("Location: ../edit-lostitem.php?success=$sm&id=$lostitem_id");
        } else {
            $em = "Unknown Error Occurred!";
            header("Location: ../edit-lostitem.php?error=$em&id=$lostitem_id");
        }
        exit;

    } else {
        header("Location: ../lostitems_admin.php");
        exit;
    }

} else {
    header("Location: ../lostitems_admin.php");
    exit;
}
?>
