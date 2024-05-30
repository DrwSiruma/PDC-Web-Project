<?php include('admin.header.php'); ?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Dashboard</h2>
                <hr />
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="card py-2 bg-dark">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-0">
                                        <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">Total Accounts</div>
                                        <div class="h6 mb-0">
                                            <?php
                                                $acc_qry = "SELECT COUNT(*) FROM tbl_user WHERE status='Active'";
                                                $result = mysqli_query($conn, $acc_qry) or die(mysqli_error($db));
                                                while ($row = mysqli_fetch_array($result)) {
                                                    if($row[0] <= 0) {
                                                        echo "0";
                                                    }
                                                    else {
                                                        echo "$row[0]";
                                                    }
                                                    
                                                }
                                            ?>&nbsp;Account(s)
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="card py-2 bg-dark">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-0">
                                        <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">Total Uploaded Files</div>
                                        <div class="h6 mb-0">
                                            <?php
                                                // $query = "SELECT COUNT(*) FROM userinfo WHERE status='1'";
                                                // $result = mysqli_query($connection, $query) or die(mysqli_error($db));
                                                // while ($row = mysqli_fetch_array($result)) {
                                                //     echo "$row[0]";
                                                // }
                                            ?>0&nbsp;File(s)
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-upload fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="card py-2 bg-dark">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-0">
                                        <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">Total Messages</div>
                                        <div class="h6 mb-0">
                                            <?php
                                                // $query = "SELECT COUNT(*) FROM userinfo WHERE status='1'";
                                                // $result = mysqli_query($connection, $query) or die(mysqli_error($db));
                                                // while ($row = mysqli_fetch_array($result)) {
                                                //     echo "$row[0]";
                                                // }
                                            ?>0&nbsp;Message(s)
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-dark">
                    <div class="card-header">
                        <h3><i class="fas fa-history"></i> Activty Log</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark table-sm w-100" id="al_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Activity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#2632</td>
                                        <td>panda_dev</td>
                                        <td>signed in</td>
                                        <td>Jul 31, 2024</td>
                                    </tr>
                                    <tr class="highlight">
                                        <td>#2633</td>
                                        <td>panda_support</td>
                                        <td>added img_123456.jpg to local Promo section</td>
                                        <td>Aug 01, 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
<?php include('admin.footer.php'); ?>