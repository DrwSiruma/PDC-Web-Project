<?php include('marketing.header.php'); ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Feedback</h2>
        <hr />

        <div class="card bg-dark mb-3">
            <div class="card-body">
                <?php if (!empty($_SESSION['promo-error'])) : ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['promo-error']; unset($_SESSION['promo-error']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['promo-success'])) : ?>
                    <div class="alert alert-success"><?php echo $_SESSION['promo-success']; unset($_SESSION['promo-success']); ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="feedback_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Date</th>
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
                                    <td></td>
                                    <td></td>
                                    <td class="wrap"></td>
                                    <td>
                                        <span class="badge <?php echo $promo_row["status"] == 'Posted' ? 'bg-success' : 'bg-secondary'; ?>">
                                            <?php echo ucfirst($promo_row["status"]); ?>
                                        </span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-light" href="xmarketing.edit.promo.php?id=<?php echo $promo_row['id']; ?>" title="Edit"><i class="fas fa-pen"></i></a>
                                        <?php if ($promo_row['status'] == 'Posted') { ?>
                                            <a class="btn btn-sm btn-outline-light" href="xprocess.status.promo.php?id=<?php echo $promo_row['id']; ?>&status=Unposted" title="Unposted">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-outline-light" href="xprocess.status.promo.php?id=<?php echo $promo_row['id']; ?>&status=Posted" title="post">
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