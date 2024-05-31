<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['uname']);
    $id = $_SESSION['id']; // Use session id for update

    if (empty($username)) {
        $_SESSION['profile-error'] = "All fields are required.";
        header("Location: admin.settings.php");
        exit();
    } else {
        // Check if the username already exists
        $sql = "SELECT * FROM tbl_user WHERE username = ? AND id != ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $username, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['profile-error'] = "Username already exists.";
            header("Location: admin.settings.php");
            exit();
        } else {
            // Update user in the database
            $sql = "UPDATE tbl_user SET username = ?, updated = NOW() WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $username, $id);

            if ($stmt->execute()) {
                $_SESSION['username'] = $username; // Update session username
                $_SESSION['profile-success'] = "Changed Successfully.";
                header("Location: admin.settings.php");
                exit();
            } else {
                $_SESSION['profile-error'] = "Failed to update information. Please try again.";
                header("Location: admin.settings.php");
                exit();
            }
        }
    }

} else {
    header("Location: admin.settings.php");
    exit();
}
?>