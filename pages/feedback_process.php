<?php
include('../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = trim($_POST['name']);
    $company = trim($_POST['company']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $contact = trim($_POST['contact']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($company) || empty($email) || empty($address) || empty($contact) || empty($message)) {
        $_SESSION['message-error'] = "All fields are required.";
        header("Location: contact.php");
        exit();
    }

    // Insert feedback into the database
    $sql = "INSERT INTO tbl_feedback (f_name, company, email, address, contact, message, status, post_date) VALUES (?, ?, ?, ?, ?, ?, 'Unread', NOW(6))";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $company, $email, $address, $contact, $message);

    if ($stmt->execute()) {
        $_SESSION['message-success'] = "Message submitted successfully.";
    } else {
        $_SESSION['message-error'] = "Failed to submit message. Please try again.";
    }

    $stmt->close();
    $conn->close();

    header("Location: contact.php");
    exit();
} else {
    $_SESSION['message-error'] = "Invalid request.";
    header("Location: contact.php");
    exit();
}
?>