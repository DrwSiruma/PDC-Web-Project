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

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $type_1 = trim($_POST['type_1']);
    $type_2 = trim($_POST['type_2']);
    $status = trim($_POST['status']);

    // Insert new career into the database
    $sql = "INSERT INTO tbl_opportunities (name, description, type1, type2, status, created) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        error_log("Failed to prepare statement for inserting data: " . $conn->error);
        $_SESSION['career-error'] = "Failed to prepare the database statement. Please try again.";
        header("Location: hr.add.career.php");
        exit();
    }

    $stmt->bind_param("sssss", $title, $description, $type_1, $type_2, $status);

    if ($stmt->execute()) {
        log_activity($conn, $id, "Added $title as new career", "Career");
        
        $_SESSION['career-success'] = "Career added successfully.";
    } else {
        $_SESSION['career-error'] = "Failed to add career. Please try again.";
    }
    header("Location: hr.add.career.php");
    exit();
} else {
    $_SESSION['career-error'] = "Invalid request.";
    header("Location: hr.add.career.php");
    exit();
}
?>