<?php 
include('hr.header.php');

// Check if an ID is provided
if (!isset($_GET['id'])) {
    echo "Invalid Request!";
    exit;
}

$id = intval($_GET['id']);

// Fetch the current details of the career section item
$query = "SELECT * FROM tbl_opportunities WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "No record found!";
    exit;
}

$career = mysqli_fetch_assoc($result);
?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Edit Career</h2>
        <hr />

        <div class="container">
            <?php if (!empty($_SESSION['career-error'])) : ?>
                <div class="alert alert-danger"><?php echo $_SESSION['career-error']; unset($_SESSION['career-error']); ?></div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['career-success'])) : ?>
                <div class="alert alert-success"><?php echo $_SESSION['career-success']; unset($_SESSION['career-success']); ?></div>
            <?php endif; ?>

            <form method="post" action="process.edit.career.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $career['id']; ?>">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="title">Job Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($career['name']); ?>" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($career['description']); ?></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="type1">Job Type 1:</label>
                        <select class="form-control" id="type1" name="type1" required>
                            <option value="On Site" <?php if ($career['type1'] == 'On site') echo 'selected'; ?>>On Site</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="type2">Job Type 2:</label>
                        <select class="form-control" id="type2" name="type2" required>
                            <option value="Full-time" <?php if ($career['type2'] == 'Full-time') echo 'selected'; ?>>Full-time</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Posted" <?php if ($career['status'] == 'Posted') echo 'selected'; ?>>Posted</option>
                            <option value="Unposted" <?php if ($career['status'] == 'Unposted') echo 'selected'; ?>>Unposted</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-orange" type="submit" title="Update">Update</button>
                </div>
            </form>
        </div>
    </div>

<?php include('hr.footer.php'); ?>