<?php 
include('marketing.header.php');

// Check if an ID is provided
if (!isset($_GET['id'])) {
    echo "Invalid Request!";
    exit;
}

$id = intval($_GET['id']);

// Fetch the current details of the news section item
$query = "SELECT * FROM tbl_news WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "No record found!";
    exit;
}

$news = mysqli_fetch_assoc($result);
?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Edit News</h2>
        <hr />

        <div class="container">
            <?php if (!empty($_SESSION['news-error'])) : ?>
                <div class="alert alert-danger"><?php echo $_SESSION['news-error']; unset($_SESSION['news-error']); ?></div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['news-success'])) : ?>
                <div class="alert alert-success"><?php echo $_SESSION['news-success']; unset($_SESSION['news-success']); ?></div>
            <?php endif; ?>

            <form method="post" action="process.edit.news.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="headline">Headline:</label>
                        <input type="text" class="form-control" id="headline" name="headline" value="<?php echo htmlspecialchars($news['headline']); ?>" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Posted" <?php if ($news['status'] == 'Posted') echo 'selected'; ?>>Posted</option>
                            <option value="Unposted" <?php if ($news['status'] == 'Unposted') echo 'selected'; ?>>Unposted</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Current image: <a href="../../uploads/news/<?php echo $news['img_name']; ?>" target="_blank"><?php echo $news['img_name']; ?></a></small>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-orange" type="submit" title="Update">Update</button>
                </div>
            </form>
        </div>
    </div>

<?php include('marketing.footer.php'); ?>