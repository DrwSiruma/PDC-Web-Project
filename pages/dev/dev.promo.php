<?php include('dev.header.php'); ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Promo Page Content Management</h2>
        <hr />

        <div class="card bg-dark">
            <div class="card-header">
                <h3><i class="fas fa-images"></i> Hero Section <a href="dev.add.phero.php" class="btn btn-sm btn-orange"><i class="fas fa-plus"></i></a></h3>
            </div>
            <div class="card-body">
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="phero_table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Uploaded By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $hero_qry = mysqli_query($conn, "
                                    SELECT 
                                    h.*, 
                                    u1.id as uploaded_by_userid, 
                                    u1.username as uploaded_by_username,
                                    u2.id as modified_by_userid, 
                                    u2.username as modified_by_username
                                    FROM tbl_promo_hero h
                                    LEFT JOIN tbl_user u1 ON h.uploaded_by = u1.id
                                    LEFT JOIN tbl_user u2 ON h.modified_by = u2.id
                                    ORDER BY h.created DESC;
                                ");
                                while($rows=mysqli_fetch_array($hero_qry)){ 
                            ?>
                                <tr>
                                    <td><img src="<?php echo $rows["file_path"]; ?>" style="width: 60px; height: auto;" /></td>
                                    <td><?php echo $rows["image_name"]; ?></td>
                                    <td><?php echo $rows["title"]; ?></td>
                                    <td>
                                        <span class="badge <?php echo $rows["status"] == 'Published' ? 'bg-success' : 'bg-secondary'; ?>">
                                            <?php echo ucfirst($rows["status"]); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $rows["created"]; ?></td>
                                    <td><?php echo $rows["uploaded_by_username"]; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-light" href="dev.edit.phero.php?id=<?php echo $rows['id']; ?>" title="Edit"><i class="fas fa-pen"></i></a>
                                        <?php if ($rows['status'] == 'Published') { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.phero.php?id=<?php echo $rows['id']; ?>&status=Unpublish" title="Unpublish">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.phero.php?id=<?php echo $rows['id']; ?>&status=Published" title="publish">
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

<?php include('dev.footer.php'); ?>