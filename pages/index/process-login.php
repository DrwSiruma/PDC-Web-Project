<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and Password are required.";
        header("Location: login.php");
        exit();
    } else {
        $sql = "SELECT * FROM tbl_user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['username'] = $user['username'];

                    if ($user['role'] === 'admin') {
                        header("Location: ../admin/admin.dashboard.php");
                    } elseif ($user['role'] === 'support') {
                        header("Location: ../support/support.dashboard.php");
                    }
                    exit();
                } else {
                    $_SESSION['error'] = "Incorrect password.";
                }
            } else {
                $_SESSION['error'] = "Username not found.";
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = "Database error: " . $conn->error;
        }

        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}