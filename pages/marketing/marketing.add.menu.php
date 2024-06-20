<?php
    include('marketing.header.php');

    $id = $_GET['id'];
    $outlet_qry = mysqli_query($conn, "SELECT 
                tom.id AS outlet_menu_id,
                tom.product_id,
                tom.outlet_id,
                tom.status AS outlet_menu_status,
                tom.post_date,
                tbo.id AS outlet_id,
                tbo.store_name,
                tbo.branch_code,
                tbo.outlet_code,
                tbo.shop_type,
                tbo.address,
                tbo.status AS outlet_status,
                tbo.service_options,
                tbo.updated,
                tbo.created AS outlet_created,
                tbo.image_path AS outlet_image_path,
                tbo.image_name AS outlet_image_name,
                tp.id AS product_id,
                tp.name AS product_name,
                tp.image_path AS product_image_path,
                tp.image_name AS product_image_name,
                tp.category AS product_category,
                tp.status AS product_status,
                tp.created AS product_created
            FROM 
                tbl_outlet tbo
            LEFT JOIN 
                tbl_outlet_menu tom ON tbo.id = tom.outlet_id
            LEFT JOIN 
                tbl_product tp ON tom.product_id = tp.id
            WHERE tbo.id = $id");
    $outlet = mysqli_fetch_assoc($outlet_qry);
?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange"><?php echo $outlet['store_name']; ?>&nbsp;Menu</h2>
        <hr />

        <div class="container">
            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-donut-tab" data-bs-toggle="pill" data-bs-target="#pills-donut" type="button" role="tab" aria-controls="pills-donut" aria-selected="true">Donut</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-beverage-tab" data-bs-toggle="pill" data-bs-target="#pills-beverage" type="button" role="tab" aria-controls="pills-beverage" aria-selected="false">Beverages</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-bakery-tab" data-bs-toggle="pill" data-bs-target="#pills-bakery" type="button" role="tab" aria-controls="pills-bakery" aria-selected="false">Bakery</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-savory-tab" data-bs-toggle="pill" data-bs-target="#pills-savory" type="button" role="tab" aria-controls="pills-savory" aria-selected="false">Savory</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-donut" role="tabpanel" aria-labelledby="pills-donut-tab">
                    <div class="row">
                        <?php
                            $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product WHERE category = 'Donut'");
                            $cnt = 1;
                            while($rows=mysqli_fetch_array($product_qry)){ 
                        ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="product-card">
                                    <input type="checkbox" class="product-checkbox" value="<?php echo $rows['id']; ?>" name="donut<?php echo $cnt; ?>" id="donut<?php echo $cnt; ?>" <?php if ($outlet['product_id'] == $rows['id']) echo 'checked'; ?>>
                                    <label for="donut<?php echo $cnt; ?>" class="product-image">
                                        <img src="../../uploads/product/<?php echo $rows['image_name']; ?>" alt="<?php echo $rows['name']; ?>" class="img-fluid">
                                    </label>
                                    <div class="product-name"><?php echo $rows['name']; ?></div>
                                </div>
                            </div>
                        <?php 
                                $cnt++; 
                            }
                        ?>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-beverage" role="tabpanel" aria-labelledby="pills-beverage-tab">
                    <div class="row">
                        <?php
                            $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product WHERE category = 'Beverage'");
                            $cnt = 1;
                            while($rows=mysqli_fetch_array($product_qry)){ 
                        ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="product-card">
                                    <input type="checkbox" class="product-checkbox" value="<?php echo $rows['id']; ?>" name="beverage<?php echo $cnt; ?>" id="beverage<?php echo $cnt; ?>" <?php if ($outlet['product_id'] == $rows['id']) echo 'checked'; ?>>
                                    <label for="beverage<?php echo $cnt; ?>" class="product-image">
                                        <img src="../../uploads/product/<?php echo $rows['image_name']; ?>" alt="<?php echo $rows['name']; ?>" class="img-fluid">
                                    </label>
                                    <div class="product-name"><?php echo $rows['name']; ?></div>
                                </div>
                            </div>
                        <?php 
                                $cnt++; 
                            }
                        ?>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-bakery" role="tabpanel" aria-labelledby="pills-bakery-tab">
                    <div class="row">
                        <?php
                            $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product WHERE category = 'Bakery'");
                            $cnt = 1;
                            while($rows=mysqli_fetch_array($product_qry)){ 
                        ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="product-card">
                                    <input type="checkbox" class="product-checkbox" value="<?php echo $rows['id']; ?>" name="bakery<?php echo $cnt; ?>" id="bakery<?php echo $cnt; ?>" <?php if ($outlet['product_id'] == $rows['id']) echo 'checked'; ?>>
                                    <label for="bakery<?php echo $cnt; ?>" class="product-image">
                                        <img src="../../uploads/product/<?php echo $rows['image_name']; ?>" alt="<?php echo $rows['name']; ?>" class="img-fluid">
                                    </label>
                                    <div class="product-name"><?php echo $rows['name']; ?></div>
                                </div>
                            </div>
                        <?php 
                                $cnt++; 
                            }
                        ?>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-savory" role="tabpanel" aria-labelledby="pills-savory-tab">
                    <div class="row">
                        <?php
                            $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product WHERE category = 'Savory'");
                            $cnt = 1;
                            while($rows=mysqli_fetch_array($product_qry)){ 
                        ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="product-card">
                                    <input type="checkbox" class="product-checkbox" value="<?php echo $rows['id']; ?>" name="savory<?php echo $cnt; ?>" id="savory<?php echo $cnt; ?>" <?php if ($outlet['product_id'] == $rows['id']) echo 'checked'; ?>>
                                    <label for="savory<?php echo $cnt; ?>" class="product-image">
                                        <img src="../../uploads/product/<?php echo $rows['image_name']; ?>" alt="<?php echo $rows['name']; ?>" class="img-fluid">
                                    </label>
                                    <div class="product-name"><?php echo $rows['name']; ?></div>
                                </div>
                            </div>
                        <?php 
                                $cnt++; 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('marketing.footer.php'); ?>