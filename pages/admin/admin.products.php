<?php include('admin.header.php'); ?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Products&nbsp;<a href="admin.add.product.php" class="btn btn-orange"><i class="fas fa-plus"></i></a></h2>
                <hr />

                <div class="card bg-dark">
                    <div class="card-body">
                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($success)) : ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

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
                            <!-- Donut Category Table -->
                            <div class="tab-pane fade show active" id="pills-donut" role="tabpanel" aria-labelledby="pills-donut-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="donut_table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product WHERE category = 'Donut'");
                                                while($rows=mysqli_fetch_array($product_qry)){ 
                                            ?>
                                                <tr>
                                                    <td><img src="../../uploads/product/<?php echo $rows["image_name"]; ?>" style="width: 60px; height: auto;" /></td>
                                                    <td><?php echo $rows["name"]; ?></td>
                                                    <td>
                                                        <span class="badge <?php echo $rows["status"] == 'Active' ? 'bg-success' : 'bg-secondary'; ?>">
                                                            <?php echo ucfirst($rows["status"]); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-outline-light" href="admin.edit.product.php?id=<?php echo $rows['id']; ?>" title="Edit product"><i class="fas fa-pen"></i></a>
                                                        <?php if ($rows['status'] == 'Active') { ?>
                                                            <a class="btn btn-sm btn-outline-light" href="process.status.product.php?id=<?php echo $rows['id']; ?>&status=Inactive" title="Inactive">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-sm btn-outline-light" href="process.status.product.php?id=<?php echo $rows['id']; ?>&status=Active" title="Active">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Beverages Category Table -->
                            <div class="tab-pane fade" id="pills-beverage" role="tabpanel" aria-labelledby="pills-beverage-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="beverage_table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product WHERE category = 'Beverage'");
                                                while($rows=mysqli_fetch_array($product_qry)){ 
                                            ?>
                                                <tr>
                                                    <td><img src="../../uploads/product/<?php echo $rows["image_name"]; ?>" style="width: 60px; height: auto;" /></td>
                                                    <td><?php echo $rows["name"]; ?></td>
                                                    <td>
                                                        <span class="badge <?php echo $rows["status"] == 'Active' ? 'bg-success' : 'bg-secondary'; ?>">
                                                            <?php echo ucfirst($rows["status"]); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-outline-light" href="admin.edit.product.php?id=<?php echo $rows['id']; ?>" title="Edit product"><i class="fas fa-pen"></i></a>
                                                        <?php if ($rows['status'] == 'Active') { ?>
                                                            <a class="btn btn-sm btn-outline-light" href="process.status.product.php?id=<?php echo $rows['id']; ?>&status=Inactive" title="Inactive">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-sm btn-outline-light" href="process.status.product.php?id=<?php echo $rows['id']; ?>&status=Active" title="Active">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Bakery Category Table -->
                            <div class="tab-pane fade" id="pills-bakery" role="tabpanel" aria-labelledby="pills-bakery-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="bakery_table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product WHERE category = 'Bakery'");
                                                while($rows=mysqli_fetch_array($product_qry)){ 
                                            ?>
                                                <tr>
                                                    <td><img src="../../uploads/product/<?php echo $rows["image_name"]; ?>" style="width: 60px; height: auto;" /></td>
                                                    <td><?php echo $rows["name"]; ?></td>
                                                    <td>
                                                        <span class="badge <?php echo $rows["status"] == 'Active' ? 'bg-success' : 'bg-secondary'; ?>">
                                                            <?php echo ucfirst($rows["status"]); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-outline-light" href="admin.edit.product.php?id=<?php echo $rows['id']; ?>" title="Edit product"><i class="fas fa-pen"></i></a>
                                                        <?php if ($rows['status'] == 'Active') { ?>
                                                            <a class="btn btn-sm btn-outline-light" href="process.status.product.php?id=<?php echo $rows['id']; ?>&status=Inactive" title="Inactive">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-sm btn-outline-light" href="process.status.product.php?id=<?php echo $rows['id']; ?>&status=Active" title="Active">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Savory Category Table -->
                            <div class="tab-pane fade" id="pills-savory" role="tabpanel" aria-labelledby="pills-savory-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="savory_table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product WHERE category = 'Savory'");
                                                while($rows=mysqli_fetch_array($product_qry)){ 
                                            ?>
                                                <tr>
                                                    <td><img src="../../uploads/product/<?php echo $rows["image_name"]; ?>" style="width: 60px; height: auto;" /></td>
                                                    <td><?php echo $rows["name"]; ?></td>
                                                    <td>
                                                        <span class="badge <?php echo $rows["status"] == 'Active' ? 'bg-success' : 'bg-secondary'; ?>">
                                                            <?php echo ucfirst($rows["status"]); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-outline-light" href="admin.edit.product.php?id=<?php echo $rows['id']; ?>" title="Edit product"><i class="fas fa-pen"></i></a>
                                                        <?php if ($rows['status'] == 'Active') { ?>
                                                            <a class="btn btn-sm btn-outline-light" href="process.status.product.php?id=<?php echo $rows['id']; ?>&status=Inactive" title="Inactive">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-sm btn-outline-light" href="process.status.product.php?id=<?php echo $rows['id']; ?>&status=Active" title="Active">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include('admin.footer.php'); ?>