<?php include('hr.header.php'); ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Dashboard</h2>
        <hr />

        <div class="card bg-dark mb-3">
            <div class="card-header">
                <h3><i class="fas fa-users"></i> Applicants</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($_SESSION['wylwwu-error'])) : ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['wylwwu-error']; unset($_SESSION['wylwwu-error']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['wylwwu-success'])) : ?>
                    <div class="alert alert-success"><?php echo $_SESSION['wylwwu-success']; unset($_SESSION['wylwwu-success']); ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="wylwwu_table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $wylwwu_qry = mysqli_query($conn, "
                                    SELECT 
                                    h.*,
                                    u2.id as modified_by_userid, 
                                    u2.username as modified_by_username
                                    FROM tbl_careers_wylwwu h
                                    LEFT JOIN tbl_user u2 ON h.modified_by = u2.id
                                    ORDER BY h.updated DESC;
                                ");
                                while($wylwwu_row=mysqli_fetch_array($wylwwu_qry)){ 
                            ?>
                                <tr>
                                    <td><img src="<?php echo $wylwwu_row["file_path"]; ?>" style="width: 60px; height: auto;" /></td>
                                    <td><?php echo $wylwwu_row["image_name"]; ?></td>
                                    <td><?php echo $wylwwu_row["title"]; ?></td>
                                    <td><?php echo $wylwwu_row["description"]; ?></td>
                                    <td>
                                        <span class="badge <?php echo $wylwwu_row["status"] == 'Published' ? 'bg-success' : 'bg-secondary'; ?>">
                                            <?php echo ucfirst($wylwwu_row["status"]); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $wylwwu_row["updated"]; ?></td>
                                    <td><?php echo $wylwwu_row["modified_by_username"]; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-light" href="dev.edit.wylwwu.php?id=<?php echo $wylwwu_row['id']; ?>" title="Edit"><i class="fas fa-pen"></i></a>
                                        <?php if ($wylwwu_row['status'] == 'Published') { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.wylwwu.php?id=<?php echo $wylwwu_row['id']; ?>&status=Unpublish" title="Unpublish">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.wylwwu.php?id=<?php echo $wylwwu_row['id']; ?>&status=Published" title="publish">
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