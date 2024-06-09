<?php
session_start();
include('../../includes/connection.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'hr') {
    header("Location: ../index/login.php");
    exit();
}

// Retrieve any error message from the session
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
// Retrieve any success message from the session
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
unset($_SESSION['success']);
// Get the current script name
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>HR - Panda Development Corp.</title>

        <!-- Favicons -->
        <link href="../../assets/img/favicon.png" rel="icon">
        <link href="../../assets/img/favicon.png" rel="apple-touch-icon">

        <!-- VENDOR CSS -->
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../../assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="../../assets/vendor/datatables/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- MAIN CSS -->
        <link href="../../assets/css/main.style.css" rel="stylesheet">
        
    </head>
    <body>
        
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn btn-orange">
                    </button>
                </div>
                <div class="img bg-wrap text-center py-4" style="background-image: url(../../assets/img/wallpaper.jpg);">
                    <div class="user-logo">
                        <div class="img" style="background-image: url(../../assets/img/PDC-square.png);"></div>
                        <h3><?php echo $_SESSION['username']; ?></h3>
                    </div>
                </div>
                <ul class="list-unstyled components mb-5">
                    <li class="<?php echo ($current_page == 'hr.dashboard.php') ? 'active' : ''; ?>">
                        <a href="hr.dashboard.php"><span class="fas fa-home mr-3"></span>&nbsp;Dashboard</a>
                    </li>
                    <li class="<?php echo ($current_page == 'hr.careers.php') ? 'active' : ''; ?>">
                        <a href="hr.careers.php"><span class="fas fa-briefcase mr-3"></span>&nbsp;Careers</a>
                    </li>
                    <li class="<?php echo ($current_page == 'hr.add.career.php') ? 'active' : ''; ?>">
                        <a href="hr.add.career.php"><span class="fas fa-home mr-3"></span>&nbsp;Add New Career</a>
                    </li>
                    <li>
                        <a href="../../includes/logout.php"><span class="fas fa-sign-out-alt mr-3"></span>&nbsp;Sign Out</a>
                    </li>
                </ul>
            </nav>