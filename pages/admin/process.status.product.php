<?php
include('../../includes/connection.php');
session_start();

// Check if id and status are set in the query string
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    // Validate the status value
    if ($status !== 'Active' && $status !== 'Inactive') {
        $_SESSION['error'] = "Invalid status value.";
        header("Location: admin.products.php");
        exit();
    }

    // Update the product status in the database
    $sql = "UPDATE tbl_product SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Product status updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update product status. Please try again.";
    }

    // Redirect back to the products page
    header("Location: admin.products.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: admin.products.php");
    exit();
}
?>