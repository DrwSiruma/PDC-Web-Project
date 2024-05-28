<?php include('admin.header.php'); ?>
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Add New User</h2>
                <hr />

                <div class="d-flex justify-content-center align-contents-center">
                    <div class="register-form">
                        <div class="logo text-center mb-4">
                            <img src="../../assets/img/PDC-white.png" alt="Logo">
                        </div>
                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form action="process-register.php" method="post">
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                <select class="form-control" name="role" required>
                                    <option value="" hidden>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="support">Support</option>
                                </select>
                            </div>
                            <button type="submit" class="btn w-100 mb-3 btn-primary btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
<?php include('admin.footer.php'); ?>