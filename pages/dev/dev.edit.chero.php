<?php 
include('dev.header.php');

// Check if an ID is provided
if (!isset($_GET['id'])) {
    echo "Invalid Request!";
    exit;
}

$id = intval($_GET['id']);

// Fetch the current details of the hero section item
$query = "SELECT * FROM tbl_careers_hero WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "No record found!";
    exit;
}

$hero = mysqli_fetch_assoc($result);
?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Edit Hero Section</h2>
        <hr />

        <div class="container">
            <?php if (!empty($_SESSION['chero-error'])) : ?>
                <div class="alert alert-danger"><?php echo $_SESSION['chero-error']; unset($_SESSION['chero-error']); ?></div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['chero-success'])) : ?>
                <div class="alert alert-success"><?php echo $_SESSION['chero-success']; unset($_SESSION['chero-success']); ?></div>
            <?php endif; ?>

            <form method="post" action="process.edit.chero.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $hero['id']; ?>">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($hero['title']); ?>" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Published" <?php if ($hero['status'] == 'Published') echo 'selected'; ?>>Published</option>
                            <option value="Unpublish" <?php if ($hero['status'] == 'Unpublish') echo 'selected'; ?>>Unpublish</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Current image: <a href="<?php echo $hero['file_path']; ?>" target="_blank"><?php echo basename($hero['file_path']); ?></a></small>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-orange" type="submit" title="Update">Update</button>
                </div>
            </form>
        </div>
    </div>

<?php include('dev.footer.php'); ?>