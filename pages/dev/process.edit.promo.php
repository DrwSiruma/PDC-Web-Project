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
    $description = $_POST['description'];
    $promo_from = $_POST['promo_from'];
    $promo_to = $_POST['promo_to'];
    $status = $_POST['status'];
    $modified_by = $_SESSION['id'];
    $file_path = '';

    // Fetch the current file path and image name
    $query = "SELECT file_path, image_name FROM tbl_promo WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($file_path, $current_image_name);
    $stmt->fetch();
    $stmt->close();

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../../uploads/promo/';
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
                $updateImageNameQuery = "UPDATE tbl_promo SET image_name = ? WHERE id = ?";
                $stmt = $conn->prepare($updateImageNameQuery);
                $stmt->bind_param('si', $new_image_name, $id);
                $stmt->execute();
                $stmt->close();
            }
        } else {
            $_SESSION['promo-error'] = "File upload failed!";
            header('Location: dev.edit.promo.php?id=' . $id);
            exit;
        }
    }

    // Update the record
    $updateQuery = "UPDATE tbl_promo SET title = ?, description = ?, promo_from = ?, promo_to = ?, file_path = ?, status = ?, updated = NOW(), modified_by = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ssssssii', $title, $description, $promo_from, $promo_to, $file_path, $status, $modified_by, $id);
    if ($stmt->execute()) {
        // Log the activity
        log_activity($conn, $modified_by, "Updated promo page with ID $id", "Content");
        $_SESSION['promo-success'] = "Promo updated successfully!";
    } else {
        $_SESSION['promo-error'] = "Failed to update Promo!";
    }
    $stmt->close();

    header('Location: dev.edit.promo.php?id=' . $id);
    exit;
} else {
    echo "Invalid Request!";
}
?>