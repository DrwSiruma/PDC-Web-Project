<?php
include('header.php');

$outlet_id = isset($_GET['id']) ? $_GET['id'] : '';

// Fetch outlet details
$outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE id = '$outlet_id' AND status = 'Active'");
$outlet_row = mysqli_fetch_array($outlet_qry);

if (!$outlet_row) {
    // Handle case where no outlet is found
    echo "<div class='alert alert-warning text-center' role='alert'>Outlet not found or inactive.</div>";
    include('footer.php');
    exit();
}
?>

<section id="outlet_details" class="outlet_details">
    <div class="container">
        <div class="row p-0">
            <div class="col-lg-6 order-2 order-lg-1 mb-2">
                <div class="outlet_info_container">
                    <h3>Dunkin<span class="text-pink">'</span></h3>
                    <h5><?php echo htmlspecialchars($outlet_row['store_name']); ?></h5>
                    <p class="text-pink m-0"><i class="fas fa-map-marker-alt"></i>&nbsp;<?php echo htmlspecialchars($outlet_row['address']); ?></p>
                    <div class="info-wrapper">
                        <div class="info-header">Service Options</div>
                        <p class="info-content m-0">
                            <?php
                                $service_options = unserialize($outlet_row['service_options']);
                                if (is_array($service_options) && !empty($service_options)) {
                                    foreach ($service_options as $option) {
                                        echo "&middot;&nbsp;" . htmlspecialchars($option) . "&nbsp;";
                                    }
                                } else {
                                    echo "No service options selected";
                                }
                            ?>
                        </p>
                    </div>
                    <div class="info-wrapper">
                        <div class="info-header">We Accept:</div>
                        <div class="info-content m-0">
                            <div class="row">
                                <?php
                                    $payment_options = unserialize($outlet_row['payment_type']);
                                    if (is_array($payment_options) && !empty($payment_options)) {
                                        foreach ($payment_options as $payment) {
                                            switch ($payment) {
                                                case "01":
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/gcash_logo.png' class='img-fluid' /></div>";
                                                    break;
                                                case "02":
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/paymaya_logo.png' class='img-fluid' /></div>";
                                                    break;
                                                case "03":
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/mc_logo.png' class='img-fluid' /></div>";
                                                    break;
                                                case "04":
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/visa_logo.png' class='img-fluid' /></div>";
                                                    break;
                                                case "05":
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/qrph_logo.png' class='img-fluid' /></div>";
                                                    break;
                                            }
                                        }
                                    } else {
                                        echo "<div class='alert alert-warning text-center' role='alert'>No payment options selected.</div>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="info-wrapper">
                        <div class="info-header">Our Menu Categories</div>
                        <?php
                            $outlet_qry2 = mysqli_query($conn, "
                                SELECT 
                                    tomc.id AS outlet_categ_id, 
                                    tomc.category_id, 
                                    tomc.outlet_id, 
                                    tpc.id AS category_id, 
                                    tpc.name AS product_name, 
                                    tpc.img_name AS img_categ 
                                FROM 
                                    tbl_outlet_pcategory tomc 
                                    JOIN tbl_product_category tpc ON tomc.category_id = tpc.id 
                                WHERE 
                                    tomc.outlet_id = '$outlet_id'
                            ");

                            if (mysqli_num_rows($outlet_qry2) > 0) {
                        ?>
                        <div class="categ-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <?php
                                    while ($outlet_row2 = mysqli_fetch_array($outlet_qry2)) {
                                ?>
                                <div class="swiper-slide">
                                    <div class="card shadow-sm">
                                        <img src="../uploads/product_category/<?php echo htmlspecialchars($outlet_row2['img_categ']); ?>" class="card-img-top" alt="">
                                        <div class="card-body text-center">
                                            <div class="card-title menu-title m-0"><?php echo htmlspecialchars($outlet_row2['product_name']); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- Navigation buttons -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <?php
                            } else {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-warning text-center" role="alert">
                                    No available products.
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 mb-2">
                <img src="../uploads/outlets/<?php echo htmlspecialchars($outlet_row['image_name']); ?>" class="img-fluid outlet-image" alt="Outlet Image" />
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>