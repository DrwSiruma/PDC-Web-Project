<?php
include('../../includes/connection.php');
session_start();

function log_activity($conn, $user_id, $activity, $type) {
    $sql = "INSERT INTO tbl_activity (user_id, activity, type, date_posted) VALUES (?, ?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iss", $user_id, $activity, $type);
        $stmt->execute();
        $stmt->close();
    } else {
        error_log("Failed to prepare statement for logging activity: " . $conn->error);
    }
}

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $promo_from = trim($_POST['promo_from']);
    $promo_to = trim($_POST['promo_to']);
    $status = trim($_POST['status']);

    // Image upload handling
    $target_dir = "../../uploads/promo/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $_SESSION['promo-error'] = "File is not an image.";
        header("Location: dev.add.promo.php");
        exit();
    }

    // Check file size (5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['promo-error'] = "Sorry, your file is too large.";
        header("Location: dev.add.promo.php");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['promo-error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: dev.add.promo.php");
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['promo-error'] = "Sorry, file already exists.";
        header("Location: dev.add.promo.php");
        exit();
    }

    if (empty($image) || empty($title) || empty($status) || empty($promo_from) || empty($promo_to)) {
        $_SESSION['promo-error'] = "All fields are required.";
        header("Location: dev.add.promo.php");
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $_SESSION['promo-error'] = "Sorry, there was an error uploading your file.";
        header("Location: dev.add.promo.php");
        exit();
    }

    // Insert new promo into the database
    $sql = "INSERT INTO tbl_promo (image_name, file_path, title, description, promo_from, promo_to, status, created, uploaded_by, updated, modified_by) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?, NOW(), ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        error_log("Failed to prepare statement for inserting data: " . $conn->error);
        $_SESSION['promo-error'] = "Failed to prepare the database statement. Please try again.";
        header("Location: dev.add.promo.php");
        exit();
    }

    $stmt->bind_param("sssssssss", $image, $target_file, $title, $description, $promo_from, $promo_to, $status, $id, $id);

    if ($stmt->execute()) {
        log_activity($conn, $id, "Added new image: ".basename($image)." title: $title in promo", "Content");
        
        $_SESSION['promo-success'] = "Image added successfully.";
    } else {
        $_SESSION['promo-error'] = "Failed to add Image. Please try again.";
    }
    header("Location: dev.add.promo.php");
    exit();
} else {
    $_SESSION['promo-error'] = "Invalid request.";
    header("Location: dev.add.promo.php");
    exit();
}
?>