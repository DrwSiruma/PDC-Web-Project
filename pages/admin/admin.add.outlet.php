<?php include('admin.header.php'); ?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 text-orange">Add New Outlet</h2>
    <hr />

    <?php if (!empty($_SESSION['outlet-error'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['outlet-error']; unset($_SESSION['outlet-error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['outlet-success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['outlet-success']; unset($_SESSION['outlet-success']); ?></div>
    <?php endif; ?>

    <div class="ps-5 pe-5">
        <form method="post" action="admin.add.outlet.php" enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="store_name">Store Name :</label>
                    <input type="text" class="form-control" id="store_name" name="store_name" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="short_name">Short Name :</label>
                    <input type="text" class="form-control" id="short_name" name="short_name" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="address">Address :</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="status">Status :</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Active">Active</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="image">Upload Image :</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
            </div>
            <div class="mt-3 text-center">
                <button class="btn btn-orange" type="submit" title="Add Outlet">Add Outlet</button>
            </div>
        </form>
    </div>
</div>

<?php include('admin.footer.php'); ?>