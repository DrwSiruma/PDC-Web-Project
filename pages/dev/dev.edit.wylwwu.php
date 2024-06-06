<?php 
include('dev.header.php');

// Check if an ID is provided
if (!isset($_GET['id'])) {
    echo "Invalid Request!";
    exit;
}

$id = intval($_GET['id']);

// Fetch the current details of the wylwwu section item
$query = "SELECT * FROM tbl_careers_wylwwu WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "No record found!";
    exit;
}

$wylwwu = mysqli_fetch_assoc($result);
?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Edit Hero Section</h2>
        <hr />

        <div class="container">
            <?php if (!empty($_SESSION['wylwwu-error'])) : ?>
                <div class="alert alert-danger"><?php echo $_SESSION['wylwwu-error']; unset($_SESSION['wylwwu-error']); ?></div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['wylwwu-success'])) : ?>
                <div class="alert alert-success"><?php echo $_SESSION['wylwwu-success']; unset($_SESSION['wylwwu-success']); ?></div>
            <?php endif; ?>

            <form method="post" action="process.edit.wylwwu.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $wylwwu['id']; ?>">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($wylwwu['title']); ?>" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($wylwwu['description']); ?></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Published" <?php if ($wylwwu['status'] == 'Published') echo 'selected'; ?>>Published</option>
                            <option value="Unpublish" <?php if ($wylwwu['status'] == 'Unpublish') echo 'selected'; ?>>Unpublish</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Current image: <a href="<?php echo $wylwwu['file_path']; ?>" target="_blank"><?php echo basename($wylwwu['file_path']); ?></a></small>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-orange" type="submit" title="Update">Update</button>
                </div>
            </form>
        </div>
    </div>

<?php include('dev.footer.php'); ?>