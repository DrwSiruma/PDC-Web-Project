<?php
include('../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $position = trim($_POST['position']);
    $cover_letter = trim($_POST['cover_letter']);

    // File upload handling
    $target_dir = "../uploads/resumes/";
    $resume = $_FILES['resume']['name'];
    
    // Generate a unique identifier and append it to the filename
    $unique_id = uniqid();
    $file_extension = pathinfo($resume, PATHINFO_EXTENSION);
    $file_name = pathinfo($resume, PATHINFO_FILENAME);
    $new_filename = $unique_id . '_' . $file_name . '.' . $file_extension;
    $target_file = $target_dir . $new_filename;
    
    $resumeFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a valid format
    $allowed_extensions = array("pdf", "docx", "jpg", "jpeg", "png");
    if (!in_array($resumeFileType, $allowed_extensions)) {
        $_SESSION['application-error'] = "Sorry, only PDF, DOCX, JPG, JPEG, and PNG files are allowed.";
        header("Location: application-form.php");
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['application-error'] = "Sorry, file already exists.";
        header("Location: application-form.php");
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['resume']['tmp_name'], $target_file)) {
        $_SESSION['application-error'] = "Sorry, there was an error uploading your file.";
        header("Location: application-form.php");
        exit();
    }

    // Insert new application into the database
    $sql = "INSERT INTO tbl_applicants (fullname, email, contact, cover, status, doc, date_applied) VALUES (?, ?, ?, ?, 'Pending', ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $cover_letter, $new_filename);

    if ($stmt->execute()) {
        $_SESSION['application-success'] = "Application submitted successfully.";
    } else {
        $_SESSION['application-error'] = "Failed to submit application. Please try again.";
    }

    $stmt->close();
    $conn->close();

    header("Location: application-form.php");
    exit();
} else {
    $_SESSION['application-error'] = "Invalid request.";
    header("Location: application-form.php");
    exit();
}
?>