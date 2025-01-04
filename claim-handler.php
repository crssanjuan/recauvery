<?php
include('dbcons.php');

if (isset($_POST['claim'])) {
    $lostitem_id = $_POST['lostitem_id'];
    $claimerName = $_POST['claimerName'];
    $claim_yearlevel = $_POST['claim_yearlevel'];
    $claim_strand = $_POST['claim_strand'];
    $claimDate = $_POST['claimDate'];
    $admin_approval = $_POST['adminApproval']; // Get selected admin's ID
    $target_dir = "uploads/proofs_claim/"; // Directory for claim proof uploads
    $proof_claim = ''; // Initialize proof claim image variable

    // Check if the upload directory exists, if not create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Create the directory with write permissions
    }

    // Handle image upload
    if (!empty($_FILES["proof_claim"]["name"])) {
        $target_file = $target_dir . basename($_FILES["proof_claim"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Check if the file is a valid image
        $check = getimagesize($_FILES["proof_claim"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $_SESSION['error'] = "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (limit: 5MB)
        if ($_FILES["proof_claim"]["size"] > 5000000) {
            $_SESSION['error'] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only specific file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, and PNG files are allowed.";
            $uploadOk = 0;
        }

        // Try to upload the file if no error
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["proof_claim"]["tmp_name"], $target_file)) {
                $proof_claim = basename($_FILES["proof_claim"]["name"]); // Get the file name to store in the database
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

    // Fetch the lost item details
    $stmt = $conn->query("SELECT lostitem_title, founder, datefound, description FROM lostitems WHERE lostitem_id = '$lostitem_id'");
    
    // Check if the lost item was found
    if ($lost_item = $stmt->fetch_assoc()) {
        // Insert into claimed_items table, including proof_claim and approved_by
        $insert_stmt = $conn->query("
            INSERT INTO claimed_items (lostitem_id, lostitem_title, founder, datefound, description, claimer_name, claim_date, approved_by, proof_claim, claim_yearlevel, claim_strand) 
            VALUES ('$lostitem_id', '{$lost_item['lostitem_title']}', '{$lost_item['founder']}', '{$lost_item['datefound']}', '{$lost_item['description']}', '$claimerName', 
                '$claimDate', '$admin_approval', 
                '$proof_claim', '$claim_yearlevel', '$claim_strand')");

        // Now update the status in lostitems
        if ($insert_stmt) {
            $conn->query("UPDATE lostitems SET status = 'Claimed' WHERE lostitem_id = '$lostitem_id'");
            // Redirect to claimed items page
            echo '<script>window.location = "claimed_items.php";</script>';
        } else {
            echo "Failed to move to claimed items.";
        }
    } else {
        echo "Lost item not found.";
    }
}
?>
