<?php 
include('admin.header.php'); 
include('../../includes/connection.php');

$id = $_GET['id'];
$outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE id = $id");
$outlet = mysqli_fetch_assoc($outlet_qry);
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 text-orange">Edit Outlet</h2>
    <hr />

    <?php if (!empty($_SESSION['outlet-error'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['outlet-error']; unset($_SESSION['outlet-error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['outlet-success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['outlet-success']; unset($_SESSION['outlet-success']); ?></div>
    <?php endif; ?>

    <div class="ps-5 pe-5">
        <form method="post" action="process.update.outlet.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $outlet['id']; ?>">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="store_name">Store Name :</label>
                    <input type="text" class="form-control" id="store_name" name="store_name" value="<?php echo htmlspecialchars($outlet['store_name']); ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label for="branch_code">Branch Code :</label>
                            <input type="text" class="form-control" id="branch_code" name="branch_code" value="<?php echo htmlspecialchars($outlet['branch_code']); ?>" required>
                        </div>
                    
                        <div class="col-md-12 mt-2">
                            <label for="outlet_code">Outlet Code :</label>
                            <input type="text" class="form-control" id="outlet_code" name="outlet_code" value="<?php echo htmlspecialchars($outlet['outlet_code']); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="service_options">Service Options :</label>
                    <?php
                    $service_options = unserialize($outlet['service_options']);
                    if ($service_options === false) {
                        $service_options = [];
                    }
                    $options = ["Dine-In", "Takeout", "Drive-Thru", "Delivery"];
                    foreach ($options as $option) {
                        $checked = in_array($option, $service_options) ? 'checked' : '';
                        echo '<div class="form-check">';
                        echo '<input class="form-check-input" type="checkbox" id="'.strtolower(str_replace(' ', '_', $option)).'" name="service_options[]" value="'.$option.'" '.$checked.'>';
                        echo '<label class="form-check-label" for="'.strtolower(str_replace(' ', '_', $option)).'">'.$option.'</label>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="shop_type">Shop Type :</label>
                    <select class="form-control" id="shop_type" name="shop_type" required>
                        <option value="a" <?php if ($outlet['shop_type'] == 'a') echo 'selected'; ?>>Type A</option>
                        <option value="b" <?php if ($outlet['shop_type'] == 'b') echo 'selected'; ?>>Type B</option>
                        <option value="c" <?php if ($outlet['shop_type'] == 'c') echo 'selected'; ?>>Type C</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="address">Address :</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($outlet['address']); ?>" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="status">Status :</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Active" <?php if ($outlet['status'] == 'Active') echo 'selected'; ?>>Active</option>
                        <option value="Closed" <?php if ($outlet['status'] == 'Closed') echo 'selected'; ?>>Closed</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="image">Upload New Image :</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <?php if (!empty($outlet['image_path'])) : ?>
                        <img src="<?php echo $outlet['image_path']; ?>" alt="Outlet Image" width="100" height="100">
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-3 text-center">
                <button class="btn btn-orange" type="submit" title="Update Outlet">Update Outlet</button>
            </div>
        </form>
    </div>
</div>

<?php include('admin.footer.php'); ?>