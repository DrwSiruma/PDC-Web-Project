<?php include('admin.header.php'); ?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Manage Accounts</h2>
                <hr />

                <div class="card bg-dark">
                    <div class="card-header">
                        <h3><i class="fas fa-user"></i> Accounts</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark table-sm w-100" id="acc_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $user_qry = mysqli_query($conn, "SELECT * FROM tbl_user");
                                        while($rows=mysqli_fetch_array($user_qry)){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $rows["id"]; ?></td>
                                            <td><?php echo $rows["username"]; ?></td>
                                            <td><?php echo $rows["role"]; ?></td>
                                            <td><?php echo $rows["created"]; ?></td>
                                            <td><?php echo $rows["updated"]; ?></td>
                                            <td><span class="badge bg-success"><?php echo $rows["status"]; ?></span></td>
                                            <td><button class="btn btn-sm btn-outline-light"><i class="fas fa-cog"></i></button></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
<?php include('admin.footer.php'); ?>