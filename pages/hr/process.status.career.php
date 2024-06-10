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
        $_SESSION['career-error'] = "Invalid status value.";
        header("Location: hr.careers.php");
        exit();
    }

    $sql = "UPDATE tbl_opportunities SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        $_SESSION['career-success'] = "career status updated successfully.";
    } else {
        $_SESSION['career-error'] = "Failed to update career status. Please try again.";
    }

    // Redirect back to the career page
    header("Location: hr.careers.php");
    exit();
} else {
    $_SESSION['career-error'] = "Invalid request.";
    header("Location: hr.careers.php");
    exit();
}
?>