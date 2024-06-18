<?php include('admin.header.php'); ?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Products&nbsp;<a href="admin.add.product.php" class="btn btn-orange"><i class="fas fa-plus"></i></a></h2>
                <hr />

                <div class="card bg-dark">
                    <!-- <div class="card-header">
                        <h3><i class="fas fa-store"></i> Products</h3>
                    </div> -->
                    <div class="card-body">
                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($success)) : ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark table-sm w-100" id="product_table">
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
                                        $product_qry = mysqli_query($conn, "SELECT * FROM tbl_product");
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

<?php include('admin.footer.php'); ?>