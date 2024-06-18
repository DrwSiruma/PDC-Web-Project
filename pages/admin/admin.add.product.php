<?php include('admin.header.php'); ?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 text-orange">Add Product</h2>
    <hr />

    <?php if (!empty($_SESSION['product-error'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['product-error']; unset($_SESSION['product-error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['product-success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['product-success']; unset($_SESSION['product-success']); ?></div>
    <?php endif; ?>

    <div class="ps-5 pe-5">
        <form method="post" action="process.add.product.php" enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="product_name">Product Name :</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="category">Category :</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="" selected hidden></option>
                        <option value="Bakery">Bakery</option>
                        <option value="Beverage">Beverage</option>
                        <option value="Donut">Donut</option>
                        <option value="Savory">Savory</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="status">Status :</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
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
                <button class="btn btn-orange" type="submit" title="Add Product">Add Product</button>
            </div>
        </form>
    </div>
</div>

<?php include('admin.footer.php'); ?>