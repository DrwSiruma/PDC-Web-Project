<?php
    include('marketing.header.php');
    function format_promo_date($from, $to) {
        $from_date = new DateTime($from);
        $to_date = new DateTime($to);
    
        $from_day = $from_date->format('j');
        $from_month = $from_date->format('F');
        $from_year = $from_date->format('Y');
    
        $to_day = $to_date->format('j');
        $to_month = $to_date->format('F');
        $to_year = $to_date->format('Y');
    
        if ($from_year != $to_year) {
            return "$from_month $from_day, $from_year - $to_month $to_day, $to_year";
        } elseif ($from_month != $to_month) {
            return "$from_month $from_day - $to_month $to_day, $from_year";
        } elseif ($from_day != $to_day) {
            return "$from_month $from_day-$to_day, $from_year";
        } else {
            return "$from_month $from_day, $from_year";
        }
    }
?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Promo&nbsp;<a href="marketing.add.promo.php" class="btn btn-orange"><i class="fas fa-plus"></i></a></h2>
        <hr />

        <div class="card bg-dark mb-3">
            <div class="card-header">
                <h3><i class="fas fa-users"></i> Promo Table</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($_SESSION['promo-error'])) : ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['promo-error']; unset($_SESSION['promo-error']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['promo-success'])) : ?>
                    <div class="alert alert-success"><?php echo $_SESSION['promo-success']; unset($_SESSION['promo-success']); ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="mpromo_table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Promo Date</th>
                                <th>Status</th>
                                <th>Uploaded Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $promo_qry = mysqli_query($conn, "
                                    SELECT 
                                    h.*, 
                                    u1.id as uploaded_by_userid, 
                                    u1.username as uploaded_by_username,
                                    u2.id as modified_by_userid, 
                                    u2.username as modified_by_username
                                    FROM tbl_promo h
                                    LEFT JOIN tbl_user u1 ON h.uploaded_by = u1.id
                                    LEFT JOIN tbl_user u2 ON h.modified_by = u2.id
                                    ORDER BY h.created DESC;
                                ");
                                while($promo_row=mysqli_fetch_array($promo_qry)){ 
                            ?>
                                <tr>
                                    <td><img src="<?php echo $promo_row["file_path"]; ?>" style="width: 60px; height: auto;" /></td>
                                    <td><?php echo $promo_row["title"]; ?></td>
                                    <td class="wrap"><?php echo $promo_row["description"]; ?></td>
                                    <td><?php echo format_promo_date($promo_row["promo_from"], $promo_row["promo_to"]); ?></td>
                                    <td>
                                        <span class="badge <?php echo $promo_row["status"] == 'Posted' ? 'bg-success' : 'bg-secondary'; ?>">
                                            <?php echo ucfirst($promo_row["status"]); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $promo_row["created"]; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-light" href="marketing.edit.promo.php?id=<?php echo $promo_row['id']; ?>" title="Edit"><i class="fas fa-pen"></i></a>
                                        <?php if ($promo_row['status'] == 'Posted') { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.promo.php?id=<?php echo $promo_row['id']; ?>&status=Unposted" title="Unposted">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.promo.php?id=<?php echo $promo_row['id']; ?>&status=Posted" title="post">
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

<?php include('marketing.footer.php'); ?>