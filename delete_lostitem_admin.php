<?php
include "dbcon.php";

// Check if lostitem_id is set in the GET request
if (isset($_GET['lostitem_id'])) {
    $lostitem_id = $_GET['lostitem_id'];

    // Step 1: Delete rows from 'accepted_items' that reference the lostitem_id
    $sql_delete_accepted = "DELETE FROM accepted_items WHERE lostitem_id = ?";
    $stmt = $conn->prepare($sql_delete_accepted);
    $stmt->bind_param("i", $lostitem_id);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "<script type='text/javascript'>alert('Associated accepted items deleted successfully.')</script>";
    } else {
        echo "No associated accepted items found.<br>";
    }

    // Step 2: Now delete the lost item
    $sql_delete_lostitem = "DELETE FROM lostitems WHERE lostitem_id = ?";
    $stmt = $conn->prepare($sql_delete_lostitem);
    $stmt->bind_param("i", $lostitem_id);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "<script type='text/javascript'>alert('Lost item deleted successfully.')</script>";
        echo "<script type='text/javascript'>window.location = 'lostitems_admin.php'</script>";
    } else {
        echo "Lost item not found.";
    }
} else {
    echo "No lost item ID provided.";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
