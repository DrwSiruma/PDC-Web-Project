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
    $headline = $_POST['headline'];
    $status = $_POST['status'];
    $modified_by = $_SESSION['id'];
    $file_path = '';

    // Fetch the current file path and image name
    $query = "SELECT img_name, file_path FROM tbl_news WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($current_image_name, $file_path);
    $stmt->fetch();
    $stmt->close();

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../../uploads/news/';
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
                $updateImageNameQuery = "UPDATE tbl_news SET img_name = ? WHERE id = ?";
                $stmt = $conn->prepare($updateImageNameQuery);
                $stmt->bind_param('si', $new_image_name, $id);
                $stmt->execute();
                $stmt->close();
            }
        } else {
            $_SESSION['news-error'] = "File upload failed!";
            header('Location: marketing.edit.news.php?id=' . $id);
            exit;
        }
    }

    // Update the record
    $updateQuery = "UPDATE tbl_news SET file_path = ?, headline = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('sssi', $file_path, $headline, $status, $id);
    if ($stmt->execute()) {
        // Log the activity
        log_activity($conn, $modified_by, "Updated new page with ID $id", "Content");
        $_SESSION['news-success'] = "News updated successfully!";
    } else {
        $_SESSION['news-error'] = "Failed to update News!";
    }
    $stmt->close();

    header('Location: marketing.edit.news.php?id=' . $id);
    exit;
} else {
    echo "Invalid Request!";
}
?>