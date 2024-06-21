<?php
include('header.php');

$id = $_GET['id'];
?>

    <section id="donut-section" class="donut-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="outlet.details.php?id=<?php echo $id; ?>" class="link-orange">Outlet</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Beverages</li>
                </ol>
            </nav>
            <div class="section-title">
                <h2>Beverages</h2>
            </div>
            <div class="row">
                <?php
                    $product_qry = mysqli_query($conn, "SELECT tom.id AS outlet_menu_id, tom.product_id, tom.outlet_id, tbo.id AS outlet_id, tbo.store_name, tp.id AS product_id, tp.name AS product_name, tp.category AS product_category, tp.image_name FROM tbl_outlet tbo LEFT JOIN tbl_outlet_menu tom ON tbo.id = tom.outlet_id LEFT JOIN tbl_product tp ON tom.product_id = tp.id WHERE tp.category = 'Beverage' AND tom.outlet_id = $id;");

                    while($product_row = mysqli_fetch_array($product_qry)) {
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="../uploads/product/<?php echo $product_row['image_name']; ?>" alt="<?php echo htmlspecialchars($product_row['product_name']); ?>" class="img-fluid">
                            </div>
                            <div class="product-name"><?php echo htmlspecialchars($product_row['product_name']); ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

<?php include('footer.php'); ?>