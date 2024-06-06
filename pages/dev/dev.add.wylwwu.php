<?php include('dev.header.php'); ?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 text-orange">Add New WYLWWU Section</h2>
    <hr />

    <?php if (!empty($_SESSION['wylwwu-error'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['wylwwu-error']; unset($_SESSION['wylwwu-error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['wylwwu-success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['wylwwu-success']; unset($_SESSION['wylwwu-success']); ?></div>
    <?php endif; ?>

    <div class="ps-5 pe-5">
        <form method="post" action="process.add.wylwwu.php" enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="title">Title :</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="description">Description :</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="status">Status :</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Published">Published</option>
                        <option value="Unpublish">Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="image">Upload Image :</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
            </div>
            <div class="mt-3 text-center">
                <button class="btn btn-orange" type="submit" title="Add Image">Add Image</button>
            </div>
        </form>
    </div>
</div>

<?php include('dev.footer.php'); ?>