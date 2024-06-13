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
        <form method="post" action="process.add.outlet.php" enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="store_name">Outlet Name :</label>
                    <input type="text" class="form-control" id="store_name" name="store_name" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="branch_code">Branch Code :</label>
                    <input type="text" class="form-control" id="branch_code" name="branch_code" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="outlet_code">Outlet Code :</label>
                    <input type="text" class="form-control" id="outlet_code" name="outlet_code" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="shop_type">Shop Type :</label>
                    <select class="form-control" id="shop_type" name="shop_type" required>
                        <option value="" selected hidden></option>
                        <option value="a">Type A</option>
                        <option value="b">Type B</option>
                        <option value="c">Type C</option>
                    </select>
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