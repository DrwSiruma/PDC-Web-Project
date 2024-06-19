<?php 
include('admin.header.php'); 
include('../../includes/connection.php');

$id = $_GET['id'];
$product_qry = mysqli_query($conn, "SELECT * FROM tbl_product WHERE id = $id");
$product = mysqli_fetch_assoc($product_qry);
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 text-orange">Edit Product</h2>
    <hr />

    <?php if (!empty($_SESSION['product-error'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['product-error']; unset($_SESSION['product-error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['product-success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['product-success']; unset($_SESSION['product-success']); ?></div>
    <?php endif; ?>

    <div class="ps-5 pe-5">
        <form method="post" action="process.update.product.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="product_name">Product Name :</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="category">Category :</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="Bakery" <?php if ($product['category'] == 'Bakery') echo 'selected'; ?>>Bakery</option>
                        <option value="Beverage" <?php if ($product['category'] == 'Beverage') echo 'selected'; ?>>Beverage</option>
                        <option value="Donut" <?php if ($product['category'] == 'Donut') echo 'selected'; ?>>Donut</option>
                        <option value="Savory" <?php if ($product['category'] == 'Savory') echo 'selected'; ?>>Savory</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="status">Status :</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Active" <?php if ($product['status'] == 'Active') echo 'selected'; ?>>Active</option>
                        <option value="Inactive" <?php if ($product['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="image">Upload New Image :</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <?php if (!empty($product['image_name'])) : ?>
                        <img src="../../uploads/product/<?php echo $product['image_name']; ?>" alt="product Image" width="100" height="100">
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-3 text-center">
                <button class="btn btn-orange" type="submit" title="Update Product">Update Product</button>
            </div>
        </form>
    </div>
</div>

<?php include('admin.footer.php'); ?>