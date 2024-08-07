<?php 
include('admin.header.php'); 
include('../../includes/connection.php');

$id = $_GET['id'];
$product_qry = mysqli_query($conn, "SELECT * FROM tbl_product_category WHERE id = $id");
$product = mysqli_fetch_assoc($product_qry);
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 text-orange">Edit Product</h2>
    <hr />

    <?php if (!empty($_SESSION['pcategory-error'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['pcategory-error']; unset($_SESSION['pcategory-error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['pcategory-success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['pcategory-success']; unset($_SESSION['pcategory-success']); ?></div>
    <?php endif; ?>

    <div class="ps-5 pe-5">
        <form method="post" action="process.edit.pcategory.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="category_name">Category Name :</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="status">Status :</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Posted" <?php if ($product['status'] == 'Posted') echo 'selected'; ?>>Posted</option>
                        <option value="Unposted" <?php if ($product['status'] == 'Unposted') echo 'selected'; ?>>Unposted</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="image">Upload New Image :</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <?php if (!empty($product['img_name'])) : ?>
                        <img src="../../uploads/product_category/<?php echo $product['img_name']; ?>" alt="Image" width="100" height="100">
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-3 text-center">
                <button class="btn btn-orange" type="submit" title="Update Category">Update Category</button>
            </div>
        </form>
    </div>
</div>

<?php include('admin.footer.php'); ?>