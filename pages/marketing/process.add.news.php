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
    $headline = trim($_POST['headline']);
    $status = trim($_POST['status']);

    // Image upload handling
    $target_dir = "../../uploads/news/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $_SESSION['news-error'] = "File is not an image.";
        header("Location: marketing.add.news.php");
        exit();
    }

    // Check file size (5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['news-error'] = "Sorry, your file is too large.";
        header("Location: marketing.add.news.php");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['news-error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: marketing.add.news.php");
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['news-error'] = "Sorry, file already exists.";
        header("Location: marketing.add.news.php");
        exit();
    }

    if (empty($image) || empty($headline) || empty($status)) {
        $_SESSION['news-error'] = "All fields are required.";
        header("Location: marketing.add.news.php");
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $_SESSION['news-error'] = "Sorry, there was an error uploading your file.";
        header("Location: marketing.add.news.php");
        exit();
    }

    // Insert new news into the database
    $sql = "INSERT INTO tbl_news (img_name, file_path, headline, status, date_posted) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        error_log("Failed to prepare statement for inserting data: " . $conn->error);
        $_SESSION['news-error'] = "Failed to prepare the database statement. Please try again.";
        header("Location: marketing.add.news.php");
        exit();
    }

    $stmt->bind_param("ssss", $image, $target_file, $headline, $status);

    if ($stmt->execute()) {
        log_activity($conn, $id, "Added new image: ".basename($image)." file", "Content");
        
        $_SESSION['news-success'] = "Image added successfully.";
    } else {
        $_SESSION['news-error'] = "Failed to add Image. Please try again.";
    }
    header("Location: marketing.add.news.php");
    exit();
} else {
    $_SESSION['news-error'] = "Invalid request.";
    header("Location: marketing.add.news.php");
    exit();
}
?>