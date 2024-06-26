<?php
include('../../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $store_name = trim($_POST['store_name']);
    $branch_code = trim($_POST['branch_code']);
    $outlet_code = trim($_POST['outlet_code']);
    $shop_type = trim($_POST['shop_type']);
    $address = trim($_POST['address']);
    $status = trim($_POST['status']);
    $service_options = isset($_POST['service_options']) ? serialize($_POST['service_options']) : serialize([]);
    $target_dir = "../../uploads/outlets/";
    $image = $_FILES['image']['name'];
    $image_path = '';
    $image_name = '';

    // Fetch the current outlet data
    $outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE id = $id");
    $outlet = mysqli_fetch_assoc($outlet_qry);
    $current_image_path = $outlet['image_path'];
    $current_image_name = $outlet['image_name'];

    // Check if a new image is uploaded
    if (!empty($image)) {
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Validate the image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            $_SESSION['outlet-error'] = "File is not an image.";
            header("Location: admin.edit.outlet.php?id=$id");
            exit();
        }
        if ($_FILES['image']['size'] > 5000000) {
            $_SESSION['outlet-error'] = "Sorry, your file is too large.";
            header("Location: admin.edit.outlet.php?id=$id");
            exit();
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['outlet-error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header("Location: admin.edit.outlet.php?id=$id");
            exit();
        }
        if (file_exists($target_file)) {
            $_SESSION['outlet-error'] = "Sorry, file already exists.";
            header("Location: admin.edit.outlet.php?id=$id");
            exit();
        }
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $_SESSION['outlet-error'] = "Sorry, there was an error uploading your file.";
            header("Location: admin.edit.outlet.php?id=$id");
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
        $sql = "UPDATE tbl_outlet SET store_name=?, branch_code=?, outlet_code=?, shop_type=?, address=?, status=?, service_options=?, image_path=?, image_name=?, updated=NOW() WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssi", $store_name, $branch_code, $outlet_code, $shop_type, $address, $status, $service_options, $image_path, $image_name, $id);
    } else {
        $sql = "UPDATE tbl_outlet SET store_name=?, branch_code=?, outlet_code=?, shop_type=?, address=?, status=?, service_options=?, updated=NOW() WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $store_name, $branch_code, $outlet_code, $shop_type, $address, $status, $service_options, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['outlet-success'] = "Outlet updated successfully.";
    } else {
        $_SESSION['outlet-error'] = "Failed to update outlet. Please try again.";
    }
    header("Location: admin.edit.outlet.php?id=$id");
    exit();
} else {
    $_SESSION['outlet-error'] = "Invalid request.";
    header("Location: admin.edit.outlet.php?id=$id");
    exit();
}
?>