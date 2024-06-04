<?php include('dev.header.php'); ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Dashboard</h2>
        <hr />
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h3><i class="fas fa-history"></i> Activty Log</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark table-sm w-100" id="al_table">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Activity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $activity_qry = mysqli_query($conn, "SELECT a.*, u.id as userid, u.username FROM tbl_activity a INNER JOIN tbl_user u ON a.user_id = u.id WHERE type = 'Content' ORDER BY date_posted DESC");
                                        while($rows=mysqli_fetch_array($activity_qry)){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $rows["username"]; ?></td>
                                            <td><?php echo $rows["activity"]; ?></td>
                                            <td><?php echo $rows["date_posted"]; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                        <div class="card py-2 bg-dark">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-0">
                                        <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">HOME PAGE</div>
                                        <div class="h6 mb-0">
                                            <?php
                                                $directory = '../../uploads/home/';
                                                $totalFiles  = getFileCount($directory);
                                                echo $totalFiles;
                                            ?>
                                            &nbsp;File(s)
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-hdd fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                        <div class="card py-2 bg-dark">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-0">
                                        <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">ABOUT PAGE</div>
                                        <div class="h6 mb-0">
                                            <?php
                                                $directory = '../../uploads/about/';
                                                $totalFiles  = getFileCount($directory);
                                                echo $totalFiles;
                                            ?>
                                            &nbsp;File(s)
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-hdd fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                        <div class="card py-2 bg-dark">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-0">
                                        <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">CAREERS PAGE</div>
                                        <div class="h6 mb-0">
                                            <?php
                                                $directory = '../../uploads/careers/';
                                                $totalFiles  = getFileCount($directory);
                                                echo $totalFiles;
                                            ?>
                                            &nbsp;File(s)
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-hdd fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                        <div class="card py-2 bg-dark">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-0">
                                        <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">PROMO PAGE</div>
                                        <div class="h6 mb-0">
                                            <?php
                                                $directory = '../../uploads/promo/';
                                                $totalFiles  = getFileCount($directory);
                                                echo $totalFiles;
                                            ?>
                                            &nbsp;File(s)
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-hdd fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('dev.footer.php'); ?>