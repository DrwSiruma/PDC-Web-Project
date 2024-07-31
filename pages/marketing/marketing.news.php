<?php
    include('marketing.header.php');
?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Latest News&nbsp;<a href="marketing.add.news.php" class="btn btn-orange"><i class="fas fa-plus"></i></a></h2>
        <hr />

        <div class="card bg-dark mb-3">
            <div class="card-header">
                <h3><i class="fas fa-newspaper"></i> News Table</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($_SESSION['news-error'])) : ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['news-error']; unset($_SESSION['news-error']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['news-success'])) : ?>
                    <div class="alert alert-success"><?php echo $_SESSION['news-success']; unset($_SESSION['news-success']); ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-dark table-sm w-100" id="news_table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Headline</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $news_qry = mysqli_query($conn, "SELECT * FROM tbl_news ORDER BY date_posted ASC");
                                while($news_row=mysqli_fetch_array($news_qry)) {
                            ?>
                                <tr>
                                    <td><img src="../../uploads/outlets/<?php echo $news_row["img_name"]; ?>" style="width: 60px; height: auto;" /></td>
                                    <td><?php echo $news_row["headline"]; ?></td>
                                    <td><?php echo $news_row["date_posted"]; ?></td>
                                    <td>
                                        <span class="badge <?php echo $news_row["status"] == 'Posted' ? 'bg-success' : 'bg-secondary'; ?>">
                                            <?php echo ucfirst($news_row["status"]); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-light" href="marketing.edit.news.php?id=<?php echo $news_row['id']; ?>" title="Edit"><i class="fas fa-pen"></i></a>
                                        <?php if ($news_row['status'] == 'Posted') { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.news.php?id=<?php echo $news_row['id']; ?>&status=Unposted" title="Unposted">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-outline-light" href="process.status.news.php?id=<?php echo $news_row['id']; ?>&status=Posted" title="post">
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