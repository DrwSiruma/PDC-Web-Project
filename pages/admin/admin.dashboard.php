<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index/login.php");
    exit();
}

// Admin specific content here
echo "Welcome, Admin " . $_SESSION['username'];
?>

<a href="../../includes/logout.php">Logout</a>