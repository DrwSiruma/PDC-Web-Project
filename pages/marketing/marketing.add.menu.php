<?php
include('marketing.header.php');

$id = $_GET['id'];
$id = intval($id); // Sanitize the input

$outlet_qry = mysqli_query($conn, "SELECT 
            tomc.id AS outlet_categ_id,
            tomc.category_id,
            tomc.outlet_id,
            tbo.id AS outlet_id,
            tbo.store_name,
            tpc.id AS category_id,
            tpc.name AS product_name
        FROM 
            tbl_outlet tbo
        LEFT JOIN 
            tbl_outlet_pcategory tomc ON tbo.id = tomc.outlet_id
        LEFT JOIN 
            tbl_product_category tpc ON tomc.category_id = tpc.id
        WHERE tbo.id = $id");

// Fetch all matching products
$outlet_products = [];
while ($row = mysqli_fetch_assoc($outlet_qry)) {
    $outlet_products[] = $row['category_id'];
    $store_name = $row['store_name'];
}

?>

<div id="content" class="p-4 p-md-5 pt-5">
    <form action="process.add.menu.php?id=<?php echo $id; ?>" method="post">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-orange"><?php echo $store_name; ?>&nbsp;Menu</h2>
            <button type="submit" class="btn btn-orange">Save</button>
        </div>
        <hr />

        <div class="container">
            <?php if (!empty($_SESSION['menu-error'])) : ?>
                <div class="alert alert-danger"><?php echo $_SESSION['menu-error']; unset($_SESSION['menu-error']); ?></div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['menu-success'])) : ?>
                <div class="alert alert-success"><?php echo $_SESSION['menu-success']; unset($_SESSION['menu-success']); ?></div>
            <?php endif; ?>
            
            <div class="row">
                <?php
                $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product_category WHERE status = 'Posted'");
                $cnt = 1;
                while ($rows = mysqli_fetch_array($product_qry)) {
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-card">
                            <input type="checkbox" class="product-checkbox" value="<?php echo $rows['id']; ?>" name="pcategory<?php echo $cnt; ?>" id="pcategory<?php echo $cnt; ?>" <?php if (in_array($rows['id'], $outlet_products)) echo 'checked'; ?>>
                            <label for="pcategory<?php echo $cnt; ?>" class="product-image">
                                <img src="../../uploads/product_category/<?php echo $rows['img_name']; ?>" alt="<?php echo htmlspecialchars($rows['name']); ?>" class="img-fluid">
                            </label>
                            <div class="product-name"><?php echo htmlspecialchars($rows['name']); ?></div>
                        </div>
                    </div>
                <?php
                    $cnt++;
                }
                ?>
            </div>
        </div>
    </form>
</div>

<?php include('marketing.footer.php'); ?>