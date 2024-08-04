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
    $category_name = trim($_POST['category_name']);
    $status = trim($_POST['status']);

    // Image upload handling
    $target_dir = "../../uploads/product_category/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $_SESSION['pcategory-error'] = "File is not an image.";
        header("Location: admin.add.pcategory.php");
        exit();
    }

    // Check file size (5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['pcategory-error'] = "Sorry, your file is too large.";
        header("Location: admin.add.pcategory.php");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['pcategory-error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: admin.add.pcategory.php");
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['pcategory-error'] = "Sorry, file already exists.";
        header("Location: admin.add.pcategory.php");
        exit();
    }

    if (empty($image) || empty($category_name) || empty($status)) {
        $_SESSION['pcategory-error'] = "All fields are required.";
        header("Location: admin.add.pcategory.php");
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $_SESSION['pcategory-error'] = "Sorry, there was an error uploading your file.";
        header("Location: admin.add.pcategory.php");
        exit();
    }

    // Insert new product into the database
    $sql = "INSERT INTO tbl_product_category (img_name, file_path, name, status, post_date) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $image, $target_file, $category_name, $status);

    if ($stmt->execute()) {
        $new_pcategory_id = $stmt->insert_id;

        $admin_id = $_SESSION['id'];
        log_activity($conn, $admin_id, "Added new product category: $category_name, id: #$new_pcategory_id", "Category");

        $_SESSION['pcategory-success'] = "Product Category added successfully.";
    } else {
        $_SESSION['pcategory-error'] = "Failed to add product category. Please try again.";
    }
    header("Location: admin.add.pcategory.php");
    exit();
} else {
    $_SESSION['pcategory-error'] = "Invalid request.";
    header("Location: admin.add.pcategory.php");
    exit();
}
?>