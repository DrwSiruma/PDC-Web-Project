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
                                        // include('../includes/connection.php');
                                        // $stud_qry = mysqli_query($connection, "SELECT * FROM activity_log ORDER BY post_date DESC");
                                        // while($rows=mysqli_fetch_array($stud_qry)){ 
                                    ?>
                                        <tr>
                                            <!-- <td scope="row"><?php //echo $rows["activity"]; ?></td>
                                            <td scope="row"><?php //echo $rows["post_date"]; ?></td> -->
                                        
                                            <td>#2632 </td>
                                            <td>panda_dev</td>
                                            <td>support</td>
                                            <td>31 Jul 2020</td>
                                            <td>31 Jul 2020</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td><button class="btn btn-sm btn-outline-light"><i class="fas fa-cog"></i></button></td>
                                        </tr>
                                    <?php //} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
<?php include('admin.footer.php'); ?>