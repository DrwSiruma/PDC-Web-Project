<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index/login.php");
    exit();
}

$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panda Development Corp.</title>

        <!-- Favicons -->
        <link href="../../assets/img/favicon.png" rel="icon">
        <link href="../../assets/img/favicon.png" rel="apple-touch-icon">

        <!-- VENDOR CSS -->
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../../assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <!-- MAIN CSS -->
        <link href="../../assets/css/register.style.css" rel="stylesheet">
    </head>
    <body>

    
    <div class="register-form">
        <div class="logo text-center mb-4">
            <img src="../../assets/img/PDC-white.png" alt="Logo">
        </div>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="process-register.php" method="post">
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                <select class="form-control" name="role" required>
                    <option value="" hidden>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="support">Support</option>
                </select>
            </div>
            <button type="submit" class="btn w-100 mb-3 btn-primary btn-block">Register</button>
        </form>
    </div>

    </body>
    <!-- VENDOR JS -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- MAIN JS -->
    <script src="../../assets/js/login.js"></script>
</html>