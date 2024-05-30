<?php include('admin.header.php'); ?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Account Settings</h2>
                <hr />
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="mt-5 mb-2" width="150px" src="../../assets/img/PDC-square.png">
                            <span class="font-weight-bold"><?php echo $_SESSION['username']; ?></span>
                            <span class="text-black-50"><?php echo $_SESSION['role']; ?></span>
                        </div>
                    </div>

                    <div class="col-md-5 border-right">
                        <form method="post" action="admin.profile.php">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right text-pink">Profile Settings</h4>
                                </div>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label class="labels">Username:</label>
                                        <input type="text" class="form-control border border-primary" placeholder="Enter Username" name="uname" value="<?php echo $_SESSION['username']; ?>">
                                    </div>
                                </div>

                                <div class="mt-3 text-center"><button class="btn btn-orange profile-button" type="submit" title="Update">Update Profile</button></div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4 border-right">
                        <form method="post" action="admin.password.php">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right text-pink">Security Settings</h4>
                                </div>
                                <?php if (!empty($_SESSION['pass-error'])) : ?>
                                    <div class="alert alert-danger"><?php echo $_SESSION['pass-error']; unset($_SESSION['pass-error']); ?></div>
                                <?php endif; ?>
                                <?php if (!empty($_SESSION['success'])) : ?>
                                    <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
                                <?php endif; ?>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label class="labels">Current Password:</label>
                                        <input type="password" class="form-control border border-primary" name="current_password" id="current_password" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">New Password:</label>
                                        <input type="password" class="form-control border border-primary" name="new_password" id="new_password" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">Confirm Password:</label>
                                        <input type="password" class="form-control border border-primary" name="confirm_password" id="confirm_password" required>
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button class="btn btn-orange profile-button" type="submit" title="Update">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<?php include('admin.footer.php'); ?>