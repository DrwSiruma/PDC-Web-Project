<?php include('marketing.header.php'); ?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 text-orange">Add New Latest News</h2>
    <hr />

    <?php if (!empty($_SESSION['news-error'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['news-error']; unset($_SESSION['news-error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['news-success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['news-success']; unset($_SESSION['news-success']); ?></div>
    <?php endif; ?>

    <div class="ps-5 pe-5">
        <form method="post" action="process.add.news.php" enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="headline">Headline :</label>
                    <input type="text" class="form-control" id="headline" name="headline" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="status">Status :</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Posted">Posted</option>
                        <option value="Unposted">Unposted</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="image">Upload Image (747 x 419 img resolution) :</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
            </div>
            <div class="mt-3 text-center">
                <button class="btn btn-orange" type="submit" title="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php include('marketing.footer.php'); ?>