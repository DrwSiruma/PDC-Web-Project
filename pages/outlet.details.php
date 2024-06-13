<?php
include('header.php');

$outlet_id = isset($_GET['id']) ? $_GET['id'] : '';

$outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE id = '$outlet_id' AND status = 'Active'");
$outlet_row=mysqli_fetch_array($outlet_qry)
?>

    <section id="outlet_details" class="outlet_details">
        <div class="row p-0">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="container">
                    <div class="outlet_info_container">
                        <h3>Dunkin'</h3>
                        <h5><?php echo $outlet_row['store_name']; ?></h5>
                        <p class="text-pink m-0"><i class="fas fa-map-marker-alt"></i>&nbsp;<?php echo $outlet_row['address']; ?></p>
                        <div class="info-wrapper">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="../uploads/outlets/<?php echo $outlet_row['image_name']; ?>" class="img-fluid outlet-image" alt="Outlet Image" />
            </div>
        </div>
    </section>

<?php include('footer.php'); ?>