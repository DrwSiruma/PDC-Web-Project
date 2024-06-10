<?php
include('../../includes/connection.php');
session_start();

function log_activity($conn, $user_id, $activity, $type) {
    $sql = "INSERT INTO tbl_activity (user_id, activity, type, date_posted) VALUES (?, ?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iss", $user_id, $activity, $type);
        $stmt->execute();
        $stmt->close();
    } else {
        // Handle the error appropriately in a real application
        error_log("Failed to prepare statement for logging activity: " . $conn->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type1 = $_POST['type1'];
    $type2 = $_POST['type2'];
    $status = $_POST['status'];
    $modified_by = $_SESSION['id'];

    // Update the record
    $updateQuery = "UPDATE tbl_opportunities SET name = ?, description = ?, type1 = ?, type2 = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('sssssi', $title, $description, $type1, $type2, $status, $id);
    if ($stmt->execute()) {
        // Log the activity
        log_activity($conn, $modified_by, "Updated career ID $id", "Career");
        $_SESSION['career-success'] = "Career updated successfully!";
    } else {
        $_SESSION['career-error'] = "Failed to update Career!";
    }
    $stmt->close();

    header('Location: hr.edit.career.php?id=' . $id);
    exit;
} else {
    echo "Invalid Request!";
}
?>