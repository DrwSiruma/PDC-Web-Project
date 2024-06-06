<?php
include('../../includes/connection.php');
session_start();

$user_id = $_SESSION['id'];

// Check if id and status are set in the query string
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    // Validate the status value
    if ($status !== 'Published' && $status !== 'Unpublish') {
        $_SESSION['error'] = "Invalid status value.";
        header("Location: dev.careers.php");
        exit();
    }

    // Update the hero status in the database
    $sql = "UPDATE tbl_careers_hero SET status = ?, updated = NOW(), modified_by = $user_id WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Image status updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update Hero Image status. Please try again.";
    }

    // Redirect back to the careers page
    header("Location: dev.careers.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: dev.careers.php");
    exit();
}
?>