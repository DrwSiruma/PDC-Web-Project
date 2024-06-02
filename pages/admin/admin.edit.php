<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $username = trim($_POST['username']);
    $role = trim($_POST['role']);
    $branch = isset($_POST['branch']) ? trim($_POST['branch']) : null;
    $status = trim($_POST['status']);

    if (empty($username) || empty($role) || empty($status)) {
        $_SESSION['profile-error'] = "All fields are required.";
        header("Location: admin.user.php?id=$id");
        exit();
    } else {
        // Check if the username already exists (excluding the current user)
        $sql = "SELECT * FROM tbl_user WHERE username = ? AND id != ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $username, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['profile-error'] = "Username already exists.";
            header("Location: admin.user.php?id=$id");
            exit();
        } else {
            // Update user in the database
            $sql = "UPDATE tbl_user SET username = ?, role = ?, branch = ?, status = ?, updated = NOW() WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $username, $role, $branch, $status, $id);

            if ($stmt->execute()) {
                $_SESSION['profile-success'] = "User updated successfully.";
                header("Location: admin.user.php?id=$id");
                exit();
            } else {
                $_SESSION['profile-error'] = "Failed to update user. Please try again.";
            }
            header("Location: admin.user.php?id=$id");
            exit();
        }
    }
} else {
    $_SESSION['profile-error'] = "Invalid request.";
    header("Location: admin.settings.php");
    exit();
}
?>