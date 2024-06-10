<?php include('hr.header.php'); ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Dashboard</h2>
        <hr />

        <div class="card bg-dark mb-3">
            <div class="card-header">
                <h3><i class="fas fa-users"></i> Applicants</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($_SESSION['applicant-error'])) : ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['applicant-error']; unset($_SESSION['applicant-error']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['applicant-success'])) : ?>
                    <div class="alert alert-success"><?php echo $_SESSION['applicant-success']; unset($_SESSION['applicant-success']); ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="applicant_table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $applicant_qry = mysqli_query($conn, "SELECT * FROM tbl_applicants");
                                while($applicant_row=mysqli_fetch_array($applicant_qry)){ 
                            ?>
                                <tr>
                                    <td><?php echo $applicant_row["id"]; ?></td>
                                    <td><?php echo $applicant_row["fullname"]; ?></td>
                                    <td>
                                        <span class="badge <?php echo $applicant_row["status"] == 'Pending' ? 'bg-warning' : 'bg-info'; ?>">
                                            <?php echo ucfirst($applicant_row["status"]); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $applicant_row["date_applied"]; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-light" href="process.status.applicant.php?id=<?php echo $applicant_row['id']; ?>&status=Viewed" title="View"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include('hr.footer.php'); ?>