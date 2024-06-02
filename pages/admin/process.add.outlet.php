<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $store_name = trim($_POST['store_name']);
    $short_name = trim($_POST['short_name']);
    $address = trim($_POST['address']);
    $status = trim($_POST['status']);

    // Image upload handling
    $target_dir = "../../uploads/outlets";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $_SESSION['outlet-error'] = "File is not an image.";
        header("Location: admin.add.outlet.php");
        exit();
    }

    // Check file size (5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['outlet-error'] = "Sorry, your file is too large.";
        header("Location: admin.add.outlet.php");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['outlet-error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: admin.add.outlet.php");
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['outlet-error'] = "Sorry, file already exists.";
        header("Location: admin.add.outlet.php");
        exit();
    }

    if (empty($store_name) || empty($short_name) || empty($address) || empty($status)) {
        $_SESSION['outlet-error'] = "All fields are required.";
        header("Location: admin.add.outlet.php");
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $_SESSION['outlet-error'] = "Sorry, there was an error uploading your file.";
        header("Location: admin.add.outlet.php");
        exit();
    }

    // Insert new outlet into the database
    $sql = "INSERT INTO tbl_outlet (store_name, short_name, address, status, image_path, created, updated) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $store_name, $short_name, $address, $status, $target_file);

    if ($stmt->execute()) {
        $_SESSION['outlet-success'] = "Outlet added successfully.";
    } else {
        $_SESSION['outlet-error'] = "Failed to add outlet. Please try again.";
    }
    header("Location: admin.add.outlet.php");
    exit();
} else {
    $_SESSION['outlet-error'] = "Invalid request.";
    header("Location: admin.add.outlet.php");
    exit();
}
?>