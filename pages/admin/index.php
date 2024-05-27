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
        <link href="../../assets/css/login.css" rel="stylesheet">
    </head>
    <body>

    
    <div class="login-form">
        <div class="logo text-center mb-4">
            <img src="../../assets/img/PDC-white.png" alt="Logo">
        </div>
        <div class="mb-3 input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" id="userId" placeholder="User ID">
        </div>
        <div class="mb-3 input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" id="password" placeholder="Password">
            <span class="input-group-text" id="togglePassword"><i class="far fa-eye"></i></span>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <button type="submit" class="btn w-100 mb-3 btn-primary btn-block">Login</button>
        <!-- <p class="mt-3 text-center">
            <a href="#">Forgot your password?</a> | <a href="#">Create an account</a>
        </p> -->
    </div>

    </body>
    <!-- VENDOR JS -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- MAIN JS -->
    <script src="../../assets/js/login.js"></script>
</html>