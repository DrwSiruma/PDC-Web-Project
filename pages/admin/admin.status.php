<?php
include('../../includes/connection.php');
session_start();

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = $_GET['status'];

    if ($status == 'Active' || $status == 'Inactive') {
        // Update user status in the database
        $sql = "UPDATE tbl_user SET status = ?, updated = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "User status updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update user status. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Invalid status value.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

header("Location: admin.accounts.php");
exit();
?>