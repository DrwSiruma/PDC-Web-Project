<?php include('admin.header.php'); ?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Outlets&nbsp;<a href="admin.add.outlet.php" class="btn btn-orange"><i class="fas fa-plus"></i></a></h2>
                <hr />

                <div class="card bg-dark">
                    <div class="card-header">
                        <h3><i class="fas fa-store"></i> Stores</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($success)) : ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark table-sm w-100" id="store_table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Store</th>
                                        <th>Store Code</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <!-- <th>Created</th> -->
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet");
                                        while($rows=mysqli_fetch_array($outlet_qry)){ 
                                    ?>
                                        <tr>
                                            <td><img src="<?php echo $rows["image_path"]; ?>" style="width: 60px; height: auto;" /></td>
                                            <td><?php echo $rows["store_name"]; ?></td>
                                            <td><?php echo $rows["short_name"]; ?></td>
                                            <td><?php echo $rows["address"]; ?></td>
                                            <td>
                                                <span class="badge <?php echo $rows["status"] == 'Active' ? 'bg-success' : 'bg-secondary'; ?>">
                                                    <?php echo ucfirst($rows["status"]); ?>
                                                </span>
                                            </td>
                                            <!-- <td><?php //echo $rows["created"]; ?></td> -->
                                            <td><?php echo $rows["updated"]; ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-light" href="admin.edit.outlet.php?id=<?php echo $rows['id']; ?>" title="Edit Outlet"><i class="fas fa-pen"></i></a>
                                                <?php if ($rows['status'] == 'Active') { ?>
                                                    <a class="btn btn-sm btn-outline-light" href="process.status.outlet.php?id=<?php echo $rows['id']; ?>&status=Closed" title="Close Store">
                                                        <i class="fas fa-lock"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a class="btn btn-sm btn-outline-light" href="process.status.outlet.php?id=<?php echo $rows['id']; ?>&status=Active" title="Open Store">
                                                        <i class="fas fa-lock-open"></i>
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