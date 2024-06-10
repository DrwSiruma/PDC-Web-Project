<?php include('hr.header.php'); ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-orange">Add new Career</h2>
        <hr />

        <?php if (!empty($_SESSION['career-error'])) : ?>
            <div class="alert alert-danger"><?php echo $_SESSION['career-error']; unset($_SESSION['career-error']); ?></div>
        <?php endif; ?>
        <?php if (!empty($_SESSION['career-success'])) : ?>
            <div class="alert alert-success"><?php echo $_SESSION['career-success']; unset($_SESSION['career-success']); ?></div>
        <?php endif; ?>

        <div class="ps-5 pe-5">
            <form method="post" action="process.add.career.php" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="title">Job Title :</label>
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
                    <div class="col-md-6">
                        <label for="type_1">Job type 1 :</label>
                        <select class="form-control" id="type_1" name="type_1" required>
                            <option value="On site" selected>On site</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="type_2">Job type 2 :</label>
                        <select class="form-control" id="type_2" name="type_2" required>
                            <option value="Full-time" selected>Full-time</option>
                        </select>
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
                <div class="mt-3 text-center">
                    <button class="btn btn-orange" type="submit" title="Add Career">Add Career</button>
                </div>
            </form>
        </div>
    </div>

<?php include('hr.footer.php'); ?>