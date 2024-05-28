<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'support') {
    header("Location: ../index/login.php");
    exit();
}

// Support specific content here
echo "Welcome, Support " . $_SESSION['username'];
?>

<a href="../../includes/logout.php">Logout</a>
