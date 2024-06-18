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
    $product_name = trim($_POST['product_name']);
    $category = trim($_POST['category']);
    $status = trim($_POST['status']);

    // Image upload handling
    $target_dir = "../../uploads/product/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $_SESSION['product-error'] = "File is not an image.";
        header("Location: admin.add.product.php");
        exit();
    }

    // Check file size (5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['product-error'] = "Sorry, your file is too large.";
        header("Location: admin.add.product.php");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['product-error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: admin.add.product.php");
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['product-error'] = "Sorry, file already exists.";
        header("Location: admin.add.product.php");
        exit();
    }

    if (empty($image) || empty($product_name) || empty($branch_code) || empty($product_code) || empty($shop_type) || empty($address) || empty($status)) {
        $_SESSION['product-error'] = "All fields are required.";
        header("Location: admin.add.product.php");
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $_SESSION['product-error'] = "Sorry, there was an error uploading your file.";
        header("Location: admin.add.product.php");
        exit();
    }

    // Insert new product into the database
    $sql = "INSERT INTO tbl_product (store_name, branch_code, product_code, shop_type, address, status, service_options, image_path, image_name, created, updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $store_name, $branch_code, $product_code, $shop_type, $address, $status, $service_options_serialized, $target_file, $image);

    if ($stmt->execute()) {
        $new_product_id = $stmt->insert_id;

        $admin_id = $_SESSION['id'];
        log_activity($conn, $admin_id, "Added new product: $store_name, id: #$new_product_id", "product");

        $_SESSION['product-success'] = "product added successfully.";
    } else {
        $_SESSION['product-error'] = "Failed to add product. Please try again.";
    }
    header("Location: admin.add.product.php");
    exit();
} else {
    $_SESSION['product-error'] = "Invalid request.";
    header("Location: admin.add.product.php");
    exit();
}
?>