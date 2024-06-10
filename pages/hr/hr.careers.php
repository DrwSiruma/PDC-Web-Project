<?php include('hr.header.php'); ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Careers</h2>
        <hr />

        <div class="card bg-dark mb-3">
            <div class="card-header">
                <h3><i class="fas fa-briefcase"></i> Manage Career Table</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($_SESSION['career-error'])) : ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['career-error']; unset($_SESSION['career-error']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['career-success'])) : ?>
                    <div class="alert alert-success"><?php echo $_SESSION['career-success']; unset($_SESSION['career-success']); ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="career_table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Type 1</th>
                                <th>Type 2</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $career_qry = mysqli_query($conn, "SELECT * FROM tbl_opportunities;");
                                while($career_row=mysqli_fetch_array($career_qry)){ 
                            ?>
                                <tr>
                                    <td><?php echo $career_row["name"]; ?></td>
                                    <td><?php echo $career_row["description"]; ?></td>
                                    <td><?php echo $career_row["type1"]; ?></td>
                                    <td><?php echo $career_row["type2"]; ?></td>
                                    <td>
                                        <span class="badge <?php echo $career_row["status"] == 'Posted' ? 'bg-success' : 'bg-secondary'; ?>">
                                            <?php echo ucfirst($career_row["status"]); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $career_row["created"]; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-light" href="hr.edit.career.php?id=<?php echo $career_row['id']; ?>" title="Edit"><i class="fas fa-pen"></i></a>
                                        <?php if ($career_row['status'] == 'Posted') { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.career.php?id=<?php echo $career_row['id']; ?>&status=Unposted" title="Unposted">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.career.php?id=<?php echo $career_row['id']; ?>&status=Posted" title="Posted">
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

<?php include('hr.footer.php'); ?>