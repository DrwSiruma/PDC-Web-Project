<?php
include('header.php');

$outlet_id = isset($_GET['id']) ? $_GET['id'] : '';

$outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE id = '$outlet_id' AND status = 'Active'");
$outlet_row=mysqli_fetch_array($outlet_qry);
?>

    <section id="outlet_details" class="outlet_details">
        <div class="container">
            <div class="row p-0">
                <div class="col-lg-6 order-2 order-lg-1 mb-2">
                    <div class="outlet_info_container">
                        <h3>Dunkin<span class="text-pink">'</span></h3>
                        <h5><?php echo $outlet_row['store_name']; ?></h5>
                        <p class="text-pink m-0"><i class="fas fa-map-marker-alt"></i>&nbsp;<?php echo $outlet_row['address']; ?></p>
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
                                                if($payment === "01") {
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/gcash_logo.png' class='img-fluid' /></div>";
                                                } elseif($payment === "02") {
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/paymaya_logo.png' class='img-fluid' /></div>";
                                                } elseif($payment === "03") {
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/mc_logo.png' class='img-fluid' /></div>";
                                                } elseif($payment === "04") {
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/visa_logo.png' class='img-fluid' /></div>";
                                                } elseif($payment === "05") {
                                                    echo "<div class='col-2 mb-1'><img src='../assets/img/payment/qrph_logo.png' class='img-fluid' /></div>";
                                                }
                                            }
                                        } else {
                                            echo "No payment options selected";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="info-wrapper">
                            <div class="info-header">Our Menu Categories</div>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <a href="menu.donuts.php?id=<?php echo $outlet_id; ?>" target="_blank">
                                        <div class="card shadow-sm">
                                            <img src="../assets/img/menu/donuts.jpg" class="card-img-top" alt="">
                                            <div class="card-body text-center">
                                                <div class="card-title menu-title m-0">Donuts <i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <a href="menu.beverages.php?id=<?php echo $outlet_id; ?>" target="_blank">
                                        <div class="card shadow-sm">
                                            <img src="../assets/img/menu/beverages.jpg" class="card-img-top" alt="">
                                            <div class="card-body text-center">
                                                <div class="card-title menu-title m-0">Beverages <i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <a href="menu.savory.php?id=<?php echo $outlet_id; ?>" target="_blank">
                                        <div class="card shadow-sm">
                                            <img src="../assets/img/menu/savory.jpg" class="card-img-top" alt="">
                                            <div class="card-body text-center">
                                                <div class="card-title menu-title m-0">Savory <i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <a href="menu.bakery.php?id=<?php echo $outlet_id; ?>" target="_blank">
                                        <div class="card shadow-sm">
                                            <img src="../assets/img/menu/bundles.jpg" class="card-img-top" alt="">
                                            <div class="card-body text-center">
                                                <div class="card-title menu-title m-0">Bakery <i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 mb-2">
                    <img src="../uploads/outlets/<?php echo $outlet_row['image_name']; ?>" class="img-fluid outlet-image" alt="Outlet Image" />
                </div>
            </div>
        </div>
    </section>

<?php include('footer.php'); ?>