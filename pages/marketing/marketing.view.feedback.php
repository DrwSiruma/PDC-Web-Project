<?php
include('marketing.header.php');

$id = $_SESSION['id'];

// Check if id and status are set in the query string
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    // Validate the status value
    if ($status !== 'Read' && $status !== 'Unread') {
        $_SESSION['feedback-error'] = "Invalid status value.";
        header("Location: marketing.feedback.php");
        exit();
    } else {
        // Update the image status in the database
        $sql = "UPDATE tbl_feedback SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
    }

} else {
    $_SESSION['feedback-error'] = "Invalid request.";
    header("Location: marketing.feedback.php");
    exit();
}

$feedback_qry = mysqli_query($conn, "SELECT * FROM `tbl_feedback` WHERE id = $id;");
$feedback_row=mysqli_fetch_array($feedback_qry)
?>
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Feedback</h2>
        <hr />

        <div class="container">
            <div class="card bg-dark mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="d-flex flex-column align-items-center p-3 py-5">
                                <h4 class="text-right mb-3"><i class="fas fa-envelope"></i>&nbsp;Information:</h4>
                                <span class="font-weight-bold">From: <span class="text-orange"><?php echo $feedback_row['f_name']; ?></span></span>
                                <span class="font-weight-bold">Company: <span class="text-orange"><?php echo $feedback_row['company']; ?></span></span>
                                <span class="font-weight-bold">E-mail: <span class="text-orange"><?php echo $feedback_row['email']; ?></span></span>
                                <span class="font-weight-bold">Contact #: <span class="text-orange"><?php echo $feedback_row['contact']; ?></span></span>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right"><i class="fas fa-envelope"></i>&nbsp;Message:</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <p><?php echo $feedback_row['message']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('marketing.footer.php'); ?>