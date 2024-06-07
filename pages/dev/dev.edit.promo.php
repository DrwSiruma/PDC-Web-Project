<?php 
include('dev.header.php');

// Check if an ID is provided
if (!isset($_GET['id'])) {
    echo "Invalid Request!";
    exit;
}

$id = intval($_GET['id']);

// Fetch the current details of the promo section item
$query = "SELECT * FROM tbl_promo WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "No record found!";
    exit;
}

$promo = mysqli_fetch_assoc($result);
?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Edit Promo</h2>
        <hr />

        <div class="container">
            <?php if (!empty($_SESSION['promo-error'])) : ?>
                <div class="alert alert-danger"><?php echo $_SESSION['promo-error']; unset($_SESSION['promo-error']); ?></div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['promo-success'])) : ?>
                <div class="alert alert-success"><?php echo $_SESSION['promo-success']; unset($_SESSION['promo-success']); ?></div>
            <?php endif; ?>

            <form method="post" action="process.edit.promo.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $promo['id']; ?>">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($promo['title']); ?>" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($promo['description']); ?></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="promo_from">Promo From:</label>
                        <input type="date" class="form-control" id="promo_from" name="promo_from" value="<?php echo htmlspecialchars($promo['promo_from']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="promo_to">Promo To:</label>
                        <input type="date" class="form-control" id="promo_to" name="promo_to" value="<?php echo htmlspecialchars($promo['promo_to']); ?>" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Posted" <?php if ($promo['status'] == 'Posted') echo 'selected'; ?>>Posted</option>
                            <option value="Unposted" <?php if ($promo['status'] == 'Unposted') echo 'selected'; ?>>Unposted</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Current image: <a href="<?php echo $promo['file_path']; ?>" target="_blank"><?php echo basename($promo['file_path']); ?></a></small>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-orange" type="submit" title="Update">Update</button>
                </div>
            </form>
        </div>
    </div>

<?php include('dev.footer.php'); ?>