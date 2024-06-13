<?php
include('../../includes/connection.php');
session_start();

function log_activity($conn, $user_id, $activity, $type) {
    $sql = "INSERT INTO tbl_activity (user_id, activity, type, date_posted) VALUES (?, ?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iss", $user_id, $activity, $type); // Corrected type specifiers
        $stmt->execute();
        $stmt->close();
    } else {
        // Handle the error appropriately in a real application
        error_log("Failed to prepare statement for logging activity: " . $conn->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $store_name = trim($_POST['store_name']);
    $branch_code = trim($_POST['branch_code']);
    $outlet_code = trim($_POST['outlet_code']);
    $shop_type = trim($_POST['shop_type']);
    $address = trim($_POST['address']);
    $status = trim($_POST['status']);

    // Image upload handling
    $target_dir = "../../uploads/outlets/";
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

    if (empty($image) || empty($store_name) || empty($branch_code) || empty($outlet_code) || empty($shop_type) || empty($address) || empty($status)) {
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
    $sql = "INSERT INTO tbl_outlet (store_name, branch_code, outlet_code, shop_type, address, status, image_path, image_name, created, updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $store_name, $branch_code, $outlet_code, $shop_type, $address, $status, $target_file, $image);

    if ($stmt->execute()) {
        $new_outlet_id = $stmt->insert_id;

        $admin_id = $_SESSION['id'];
        log_activity($conn, $admin_id, "Added new outlet: $store_name, id: #$new_outlet_id", "Outlet");

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