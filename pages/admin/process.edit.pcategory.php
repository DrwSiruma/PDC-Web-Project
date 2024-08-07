<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $category_name = trim($_POST['category_name']);
    $status = trim($_POST['status']);
    $target_dir = "../../uploads/product_category/";
    $image = $_FILES['image']['name'];
    $image_path = '';
    $image_name = '';

    // Fetch the current product data
    $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product_category WHERE id = $id");
    $product = mysqli_fetch_assoc($product_qry);
    $current_image_path = $product['file_path'];
    $current_image_name = $product['img_name'];

    // Check if a new image is uploaded
    if (!empty($image)) {
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Validate the image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            $_SESSION['pcategory-error'] = "File is not an image.";
            header("Location: admin.edit.pcategory.php?id=$id");
            exit();
        }
        if ($_FILES['image']['size'] > 5000000) {
            $_SESSION['pcategory-error'] = "Sorry, your file is too large.";
            header("Location: admin.edit.pcategory.php?id=$id");
            exit();
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['pcategory-error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header("Location: admin.edit.pcategory.php?id=$id");
            exit();
        }
        if (file_exists($target_file)) {
            $_SESSION['pcategory-error'] = "Sorry, file already exists.";
            header("Location: admin.edit.pcategory.php?id=$id");
            exit();
        }
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $_SESSION['pcategory-error'] = "Sorry, there was an error uploading your file.";
            header("Location: admin.edit.pcategory.php?id=$id");
            exit();
        }
        $image_path = $target_file;
        $image_name = $image;

        // Delete the old image if a new one is uploaded
        if (!empty($current_image_path) && file_exists($current_image_path)) {
            unlink($current_image_path);
        }
    }

    // Update the outlet in the database
    if (!empty($image_path)) {
        $sql = "UPDATE tbl_product_category SET img_name=?, file_path=?, name=?, status=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $image_name, $image_path, $category_name, $status, $id);
    } else {
        $sql = "UPDATE tbl_product_category SET name=?, status=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $category_name, $status, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['pcategory-success'] = "Product Category updated successfully.";
    } else {
        $_SESSION['pcategory-error'] = "Failed to update product category. Please try again.";
    }
    header("Location: admin.edit.pcategory.php?id=$id");
    exit();
} else {
    $_SESSION['pcategory-error'] = "Invalid request.";
    header("Location: admin.edit.pcategory.php?id=$id");
    exit();
}
?>