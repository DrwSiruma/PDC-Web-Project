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
        $sql = "UPDATE tbl_applicants SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
    }

} else {
    $_SESSION['applicant-error'] = "Invalid request.";
    header("Location: hr.dashboard.php");
    exit();
}

$applicant_qry = mysqli_query($conn, "SELECT a.*, o.name FROM tbl_applicants a JOIN tbl_opportunities o ON a.position = o.id WHERE a.id = $id;");
$applicant_row=mysqli_fetch_array($applicant_qry);

$dateString = $applicant_row['date_applied'];
$date = new DateTime($dateString);
$formattedDate = $date->format('F d, Y g:i A');
?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Applicant Details</h2>
        <hr />

        <div class="container">
            <div class="card bg-dark mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right"><i class="fas fa-info"></i>&nbsp;Information:</h4>
                                </div>
                                <div class="row mt-2">
                                    <span class="font-weight-bold">Name: <span class="text-orange"><?php echo $applicant_row['fullname']; ?></span></span>
                                    <span class="font-weight-bold">Email: <span class="text-orange"><?php echo $applicant_row['email']; ?></span></span>
                                    <span class="font-weight-bold">Contact: <span class="text-orange"><?php echo $applicant_row['contact']; ?></span></span>
                                    <span class="font-weight-bold">Desired Position: <span class="text-orange"><?php echo $applicant_row['name']; ?></span></span>
                                    <span class="font-weight-bold">Date Applied: <span class="text-orange"><?php echo $formattedDate; ?></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right"><i class="fas fa-envelope"></i>&nbsp;Cover Letter:</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <p><?php echo $applicant_row['cover']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right"><i class="fas fa-file"></i>&nbsp;Resume:</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <canvas id="pdf-preview"></canvas>
                                        <?php
                                            $pdfFileName = "../../uploads/resumes/" . $applicant_row['doc'];
                                            echo '<a href="' . $pdfFileName . '" download="' . $pdfFileName . '" class="btn btn-primary mt-3">Download Resume</a>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        // URL of the PDF from PHP
        var url = '<?php echo $pdfFileName; ?>';

        // Asynchronous download of PDF
        var loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(function(pdf) {
            // Fetch the first page
            pdf.getPage(1).then(function(page) {
                var scale = 1.5;
                var viewport = page.getViewport({scale: scale});

                // Prepare canvas using PDF page dimensions
                var canvas = document.getElementById('pdf-preview');
                var context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }, function (reason) {
            // PDF loading error
            console.error(reason);
        });
    </script>

<?php include('hr.footer.php'); ?>