<?php
    // Retrieve the 'id' from the URL if it exists
    $selected_position = isset($_GET['id']) ? $_GET['id'] : '';

    include('header.php'); 
?>
    <div class="container">
        <div class="application-form">
            <h2 class="text-center mb-4">Application Form</h2>
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
                        <option value="1" <?php echo ($selected_position == '1') ? 'selected' : ''; ?>>IT Specialist</option>
                        <option value="2" <?php echo ($selected_position == '2') ? 'selected' : ''; ?>>Store Manager</option>
                        <option value="3" <?php echo ($selected_position == '3') ? 'selected' : ''; ?>>Service Crew</option>
                        <option value="4" <?php echo ($selected_position == '4') ? 'selected' : ''; ?>>Marketing Staff</option>
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