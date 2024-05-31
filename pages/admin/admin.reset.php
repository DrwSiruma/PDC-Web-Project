<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['pid']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($new_password) || empty($confirm_password)) {
        $_SESSION['password-error'] = "All fields are required.";
        header("Location: admin.user.php?id=$id");
        exit();
    }

    if ($new_password !== $confirm_password) {
        $_SESSION['password-error'] = "Passwords do not match.";
        header("Location: admin.user.php?id=$id");
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $sql = "UPDATE tbl_user SET password = ?, updated = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashed_password, $id);

    if ($stmt->execute()) {
        $_SESSION['password-success'] = "Password reset successfully.";
    } else {
        $_SESSION['password-error'] = "Failed to reset password. Please try again.";
    }
    header("Location: admin.user.php?id=$id");
    exit();
} else {
    $_SESSION['password-error'] = "Invalid request.";
    header("Location: admin.settings.php");
    exit();
}
?>