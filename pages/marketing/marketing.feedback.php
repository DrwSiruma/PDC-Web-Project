<?php include('marketing.header.php'); ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Feedback</h2>
        <hr />

        <div class="card bg-dark mb-3">
            <div class="card-body">
                <?php if (!empty($_SESSION['feedback-error'])) : ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['feedback-error']; unset($_SESSION['feedback-error']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['feedback-success'])) : ?>
                    <div class="alert alert-success"><?php echo $_SESSION['feedback-success']; unset($_SESSION['feedback-success']); ?></div>
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
                                $feedback_qry = mysqli_query($conn, "SELECT * FROM `tbl_feedback` ORDER BY post_date DESC;
                                ");
                                while($feedback_row=mysqli_fetch_array($feedback_qry)){ 
                            ?>
                                <tr>
                                    <td><?php echo $feedback_row["f_name"]; ?></td>
                                    <td><?php echo $feedback_row["email"]; ?></td>
                                    <td class="wrap"><?php echo $feedback_row["message"]; ?></td>
                                    <td>
                                        <span class="badge <?php echo $feedback_row["status"] == 'Unread' ? 'bg-info' : 'bg-secondary'; ?>">
                                            <?php echo ucfirst($feedback_row["status"]); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $feedback_row["post_date"]; ?></td>
                                    <td>
                                        <?php if ($feedback_row['status'] == 'Unread') { ?>
                                            <a class="btn btn-sm btn-outline-light" href="marketing.view.feedback.php?id=<?php echo $feedback_row['id']; ?>&status=Read" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-outline-light" href="marketing.view.feedback.php?id=<?php echo $feedback_row['id']; ?>&status=Read" title="View">
                                                <i class="fas fa-eye"></i>
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