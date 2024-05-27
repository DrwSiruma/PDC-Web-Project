<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetching data from the form
    $userId = isset($_POST['userId']) ? trim($_POST['userId']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    if (empty($userId) || empty($password)) {
        $_SESSION['error'] = "User ID and Password are required.";
        header("Location: index.php");
        exit();
    } else {
        // Validate user credentials
        $sql = "SELECT * FROM tbl_user WHERE username = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    header("Location: dashboard.php"); // Redirect to dashboard
                    exit();
                } else {
                    $_SESSION['error'] = "Incorrect password.";
                }
            } else {
                $_SESSION['error'] = "User ID not found.";
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = "Failed to prepare the SQL statement.";
        }

        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}