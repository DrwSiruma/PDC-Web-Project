<?php
include('hr.header.php');

$id = $_SESSION['id'];

// Check if id and status are set in the query string
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    // Validate the status value
    if ($status !== 'Viewed') {
        $_SESSION['applicant-error'] = "Invalid status value.";
        header("Location: hr.dashboard.php");
        exit();
    } else {
        // Update the image status in the database
        $sql = "UPDATE tbl_opportunities SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
    }

} else {
    $_SESSION['applicant-error'] = "Invalid request.";
    header("Location: hr.dashboard.php");
    exit();
}

$feedback_qry = mysqli_query($conn, "SELECT * FROM `tbl_feedback` WHERE id = $id;");
$feedback_row=mysqli_fetch_array($feedback_qry);

$dateString = $feedback_row['post_date'];
$date = new DateTime($dateString);
$formattedDate = $date->format('F d, Y g:i A');
?>