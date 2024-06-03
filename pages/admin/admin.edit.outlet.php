<?php 
include('admin.header.php'); 
include('../../includes/connection.php');

$id = $_GET['id'];
$outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE id = $id");
$outlet = mysqli_fetch_assoc($outlet_qry);
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 text-orange">Edit Outlet</h2>
    <hr />

    <?php if (!empty($_SESSION['outlet-error'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['outlet-error']; unset($_SESSION['outlet-error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['outlet-success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['outlet-success']; unset($_SESSION['outlet-success']); ?></div>
    <?php endif; ?>

    <div class="ps-5 pe-5">
        <form method="post" action="process.update.outlet.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $outlet['id']; ?>">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="store_name">Store Name :</label>
                    <input type="text" class="form-control" id="store_name" name="store_name" value="<?php echo htmlspecialchars($outlet['store_name']); ?>" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="short_name">Short Name :</label>
                    <input type="text" class="form-control" id="short_name" name="short_name" value="<?php echo htmlspecialchars($outlet['short_name']); ?>" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="address">Address :</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($outlet['address']); ?>" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="status">Status :</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Active" <?php if ($outlet['status'] == 'Active') echo 'selected'; ?>>Active</option>
                        <option value="Closed" <?php if ($outlet['status'] == 'Closed') echo 'selected'; ?>>Closed</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="image">Upload New Image :</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <?php if (!empty($outlet['image_path'])) : ?>
                        <img src="<?php echo $outlet['image_path']; ?>" alt="Outlet Image" width="100" height="100">
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-3 text-center">
                <button class="btn btn-orange" type="submit" title="Update Outlet">Update Outlet</button>
            </div>
        </form>
    </div>
</div>

<?php include('admin.footer.php'); ?>