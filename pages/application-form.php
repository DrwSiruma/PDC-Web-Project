<?php
    // Retrieve the 'id' from the URL if it exists
    $selected_position = isset($_GET['id']) ? $_GET['id'] : '';

    include('header.php');
    session_start() 
?>
    <div class="container">
        <div class="application-form">
            <h2 class="text-center mb-4">Application Form</h2>
            <?php if (isset($_SESSION['application-error'])) : ?>
                <div class="alert alert-danger"><?php echo $_SESSION['application-error']; unset($_SESSION['application-error']); ?></div>
            <?php endif; ?>
            <?php if (isset($_SESSION['application-success'])) : ?>
                <div class="alert alert-success"><?php echo $_SESSION['application-success']; unset($_SESSION['application-success']); ?></div>
            <?php endif; ?>
            <form action="submit_application.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Position</label>
                    <select class="form-control" id="position" name="position" required>
                        <option selected hidden></option>
                        <?php
                            $career_qry = mysqli_query($conn, "SELECT * FROM tbl_opportunities WHERE `status` = 'Posted';");

                            while($career_row = mysqli_fetch_array($career_qry)) { 
                        ?>
                            <option value="<?php echo $career_row['id']; ?>" <?php echo ($selected_position == $career_row["id"]) ? 'selected' : ''; ?>><?php echo $career_row['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cover_letter" class="form-label">Cover Letter</label>
                    <textarea class="form-control" id="cover_letter" name="cover_letter" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="resume" class="form-label">Upload Resume (PDF, JPEG)</label>
                    <input class="form-control" type="file" id="resume" name="resume" accept=".pdf,.docx,.jpg,.jpeg,.png" required>
                </div>
                <button type="submit" class="btn btn-orange w-100">Submit Application</button>
            </form>
        </div>
    </div>
<?php include('footer.php'); ?>