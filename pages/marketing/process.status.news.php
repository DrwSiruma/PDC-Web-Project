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
        $_SESSION['news-error'] = "Invalid status value.";
        header("Location: marketing.news.php");
        exit();
    }

    // Update the image status in the database
    $sql = "UPDATE tbl_news SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        $_SESSION['news-success'] = "News status updated successfully.";
    } else {
        $_SESSION['news-error'] = "Failed to update Content status. Please try again.";
    }

    // Redirect back to the news page
    header("Location: marketing.news.php");
    exit();
} else {
    $_SESSION['news-error'] = "Invalid request.";
    header("Location: marketing.news.php");
    exit();
}
?>