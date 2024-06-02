<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);
    $branch = isset($_POST['branch']) ? trim($_POST['branch']) : null;

    if (empty($username) || empty($password) || empty($role)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: admin.register.php");
        exit();
    } else {
        // Check if the username already exists
        $sql = "SELECT * FROM tbl_user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Username already exists.";
            header("Location: admin.register.php");
            exit();
        } else {
            // Encrypt the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into the database
            $sql = "INSERT INTO tbl_user (username, password, role, branch) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $hashedPassword, $role, $branch);

            if ($stmt->execute()) {
                $_SESSION['success'] = "User added successfully.";
                header("Location: admin.register.php");
                exit();
            } else {
                $_SESSION['error'] = "Failed to register. Please try again.";
                header("Location: admin.register.php");
                exit();
            }
        }
    }
} else {
    header("Location: admin.register.php");
    exit();
}