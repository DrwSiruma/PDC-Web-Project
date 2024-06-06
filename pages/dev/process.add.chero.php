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
        // Handle the error appropriately in a real application
        error_log("Failed to prepare statement for logging activity: " . $conn->error);
    }
}

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $status = trim($_POST['status']);

    // Image upload handling
    $target_dir = "../../uploads/careers/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $_SESSION['chero-error'] = "File is not an image.";
        header("Location: dev.add.chero.php");
        exit();
    }

    // Check file size (5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['chero-error'] = "Sorry, your file is too large.";
        header("Location: dev.add.chero.php");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['chero-error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: dev.add.chero.php");
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['chero-error'] = "Sorry, file already exists.";
        header("Location: dev.add.chero.php");
        exit();
    }

    if (empty($image) || empty($title) || empty($status)) {
        $_SESSION['chero-error'] = "All fields are required.";
        header("Location: dev.add.chero.php");
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $_SESSION['chero-error'] = "Sorry, there was an error uploading your file.";
        header("Location: dev.add.chero.php");
        exit();
    }

    // Insert new hero into the database
    $sql = "INSERT INTO tbl_careers_hero (image_name, file_path, title, status, updated, modified_by) VALUES (?, ?, ?, ?, NOW(), ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        error_log("Failed to prepare statement for inserting hero: " . $conn->error);
        $_SESSION['chero-error'] = "Failed to prepare the database statement. Please try again.";
        header("Location: dev.add.chero.php");
        exit();
    }

    $stmt->bind_param("sssss", $image, $target_file, $title, $status, $id);

    if ($stmt->execute()) {
        log_activity($conn, $id, "Added new image: ".basename($image)." titled: $title in careers hero section", "Content");
        
        $_SESSION['chero-success'] = "Image added successfully.";
    } else {
        $_SESSION['chero-error'] = "Failed to add Image. Please try again.";
    }
    header("Location: dev.add.chero.php");
    exit();
} else {
    $_SESSION['chero-error'] = "Invalid request.";
    header("Location: dev.add.chero.php");
    exit();
}
?>