<?php
include('../../includes/connection.php');
session_start();

$user_id = $_SESSION['id'];

// Check if id and status are set in the query string
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    // Validate the status value
    if ($status !== 'Posted' && $status !== 'Unposted') {
        $_SESSION['promo-error'] = "Invalid status value.";
        header("Location: dev.promo.php");
        exit();
    }

    // Update the image status in the database
    $sql = "UPDATE tbl_promo SET status = ?, updated = NOW(), modified_by = $user_id WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        $_SESSION['promo-success'] = "Promo status updated successfully.";
    } else {
        $_SESSION['promo-error'] = "Failed to update Content status. Please try again.";
    }

    // Redirect back to the promo page
    header("Location: dev.promo.php");
    exit();
} else {
    $_SESSION['promo-error'] = "Invalid request.";
    header("Location: dev.promo.php");
    exit();
}
?>