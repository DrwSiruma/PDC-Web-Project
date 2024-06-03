<?php include('admin.header.php'); ?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Manage Accounts</h2>
                <hr />

                <div class="card bg-dark">
                    <div class="card-header">
                        <h3><i class="fas fa-user"></i> Accounts</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($success)) : ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark table-sm w-100" id="acc_table">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
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
                                        $user_qry = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id != '1'");
                                        while($rows=mysqli_fetch_array($user_qry)){ 
                                    ?>
                                        <tr>
                                            <td>#<?php echo $rows["id"]; ?></td>
                                            <td><?php echo $rows["username"]; ?></td>
                                            <td><?php echo $rows["role"]; ?></td>
                                            <td><?php echo $rows["created"]; ?></td>
                                            <td><?php echo $rows["updated"]; ?></td>
                                            <td>
                                                <span class="badge <?php echo $rows["status"] == 'Active' ? 'bg-success' : 'bg-secondary'; ?>">
                                                    <?php echo ucfirst($rows["status"]); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-light" href="admin.user.php?id=<?php echo $rows['id']; ?>" title="Edit User"><i class="fas fa-user-edit"></i></a>
                                                <?php if ($rows['status'] == 'Active') { ?>
                                                    <a class="btn btn-sm btn-outline-light" href="admin.status.php?id=<?php echo $rows['id']; ?>&status=Inactive" title="Deactivate User">
                                                        <i class="fas fa-user-times"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a class="btn btn-sm btn-outline-light" href="admin.status.php?id=<?php echo $rows['id']; ?>&status=Active" title="Activate User">
                                                        <i class="fas fa-user-check"></i>
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