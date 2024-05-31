<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = trim($_POST['current_password']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);
    $id = $_SESSION['id'];

    // Check if any field is empty
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $_SESSION['pass-error'] = "All fields are required.";
        header("Location: admin.settings.php");
        exit();
    }

    // Check if new password and confirm password match
    if ($new_password !== $confirm_password) {
        $_SESSION['pass-error'] = "New password and confirm password do not match.";
        header("Location: admin.settings.php");
        exit();
    }

    // Fetch the current password hash from the database
    $sql = "SELECT password FROM tbl_user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify the current password
    if (!password_verify($current_password, $hashed_password)) {
        $_SESSION['pass-error'] = "Current password is incorrect.";
        header("Location: admin.settings.php");
        exit();
    }

    // Hash the new password
    $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Update the password in the database
    $sql = "UPDATE tbl_user SET password = ?, updated = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_hashed_password, $id);

    if ($stmt->execute()) {
        $_SESSION['pass-success'] = "Password updated successfully.";
        header("Location: admin.settings.php");
        exit();
    } else {
        $_SESSION['pass-error'] = "Failed to update password. Please try again.";
        header("Location: admin.settings.php");
        exit();
    }
}
?>