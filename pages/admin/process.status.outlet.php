<?php
include('../../includes/connection.php');
session_start();

// Check if id and status are set in the query string
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    // Validate the status value
    if ($status !== 'Active' && $status !== 'Closed') {
        $_SESSION['status-error'] = "Invalid status value.";
        header("Location: admin.outlet.php");
        exit();
    }

    // Update the outlet status in the database
    $sql = "UPDATE tbl_outlet SET status = ?, updated = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        $_SESSION['status-success'] = "Outlet status updated successfully.";
    } else {
        $_SESSION['status-error'] = "Failed to update outlet status. Please try again.";
    }

    // Redirect back to the outlets page
    header("Location: admin.outlet.php");
    exit();
} else {
    $_SESSION['status-error'] = "Invalid request.";
    header("Location: admin.outlet.php");
    exit();
}
?>