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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $title = $_POST['title'];
    $status = $_POST['status'];
    $modified_by = $_SESSION['id'];
    $file_path = '';

    // Fetch the current file path and image name
    $query = "SELECT file_path, image_name FROM tbl_about_hero WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $file_path = $row['file_path'];
        $current_image_name = $row['image_name'];
    }

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../../uploads/about/';
        $new_image_name = basename($_FILES['image']['name']);
        $uploadFile = $uploadDir . $new_image_name;

        // Delete the old image
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $file_path = $uploadFile;

            // Update image name in the database if it's different
            if ($current_image_name !== $new_image_name) {
                $updateImageNameQuery = "UPDATE tbl_about_hero SET image_name = '$new_image_name' WHERE id = '$id'";
                mysqli_query($conn, $updateImageNameQuery);
            }
        } else {
            $_SESSION['ahero-error'] = "File upload failed!";
            header('Location: dev.edit.ahero.php?id=' . $id);
            exit;
        }
    }

    // Update the record
    $updateQuery = "UPDATE tbl_about_hero SET title = '$title', file_path = '$file_path', status = '$status', updated = NOW(), modified_by = '$modified_by' WHERE id = '$id'";
    if (mysqli_query($conn, $updateQuery)) {
        // Log the activity
        log_activity($conn, $modified_by, "Updated hero section in About page with ID $id", "Content");
        $_SESSION['ahero-success'] = "Hero section updated successfully!";
    } else {
        $_SESSION['ahero-error'] = "Failed to update hero section!";
    }

    header('Location: dev.edit.ahero.php?id=' . $id);
    exit;
} else {
    echo "Invalid Request!";
}
?>