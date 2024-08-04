<?php include('admin.header.php'); ?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 text-orange">Add Product Category</h2>
    <hr />

    <?php if (!empty($_SESSION['pcategory-error'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['pcategory-error']; unset($_SESSION['pcategory-error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['pcategory-success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['pcategory-success']; unset($_SESSION['pcategory-success']); ?></div>
    <?php endif; ?>

    <div class="ps-5 pe-5">
        <form method="post" action="process.add.pcategory.php" enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="category_name">New Category :</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="status">Status :</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Posted">Posted</option>
                        <option value="Unposted">Unposted</option>
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
                <button class="btn btn-orange" type="submit" title="Add Category">Add Category</button>
            </div>
        </form>
    </div>
</div>

<?php include('admin.footer.php'); ?>