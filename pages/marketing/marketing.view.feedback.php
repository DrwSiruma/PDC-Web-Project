<?php
include('marketing.header.php');
session_start();

$id = $_SESSION['id'];

// Check if id and status are set in the query string
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    // Validate the status value
    if ($status !== 'Read' && $status !== 'Unread') {
        $_SESSION['feedback-error'] = "Invalid status value.";
        header("Location: marketing.feedback.php");
        exit();
    } else {
        // Update the image status in the database
        $sql = "UPDATE tbl_feedback SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
    }

} else {
    $_SESSION['feedback-error'] = "Invalid request.";
    header("Location: marketing.feedback.php");
    exit();
}
?>
