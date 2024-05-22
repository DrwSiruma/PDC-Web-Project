<?php
    // Get the current script name
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<! DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panda Development Corp.</title>

        <!-- VENDOR CSS -->
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="../assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <!-- MAIN CSS -->
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- ======= Top Bar ======= -->
        <section id="topbar" class="d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-hourglass-split"></i> Office Hours&nbsp;<b>Mon - Fri: 9:00 am - 6:00 pm</b>
                </div>
                <div class="social-links d-none d-md-block">
                    
                    <a href="mailto:pdc_email@sample.com"><i class="bi bi-envelope-fill"></i></a>
                    <a href="https://www.facebook.com/" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                    
                </div>
            </div>
        </section>
        <!-- ======= End Top Bar ======= -->

        <!-- ======= Navigation ======= -->
        <header class="header">
            <div class="container d-flex align-items-center">
                <a href="index.php" class="logo me-auto"><img src="../assets/img/PDC-Logo.png" alt="logo" class="img-fluid"></a>
                
                <nav id="navbar" class="navbar"><ul>
                    <li><a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a></li>
                    <li><a class="nav-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>" href="about.php">About</a></li>
                    <li><a class="nav-link <?php echo ($current_page == 'careers.php') ? 'active' : ''; ?>" href="careers.php">Careers</a></li>
                    <li><a class="nav-link <?php echo ($current_page == 'promos.php') ? 'active' : ''; ?>" href="promos.php">Promos</a></li>
                    <li><a class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>" href="contact.php">Contact Us</a></li>
                </ul><i class="bi bi-list mobile-nav-toggle"></i></nav>
            </div>
        </header>
        <!-- ======= End Navigation ======= -->