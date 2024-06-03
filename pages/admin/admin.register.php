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
                        <?php if (!empty($success)) : ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>
                        <form action="process.register.php" method="post">
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
                                <select class="form-control" id="role" name="role" onchange="toggleBranchSelection()" required>
                                    <option value="" hidden>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="support">Support</option>
                                    <option value="dev">Dev</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="hr">HR</option>
                                    <option value="outlet" disabled>Outlet</option>
                                </select>
                            </div>
                            <div class="mb-3 input-group" id="branch-section" style="display: none;">
                                <span class="input-group-text"><i class="fas fa-store"></i></span>
                                <select class="form-control" id="branch" name="branch">
                                    <option value="" hidden>Select Branch</option>
                                    <?php
                                        $outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE `status` = 'Active'");
                                        while($rows=mysqli_fetch_array($outlet_qry)){ 
                                    ?>
                                        <option value="<?php echo $rows['short_name']; ?>"><?php echo $rows['store_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn w-100 mb-3 btn-primary btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
<?php include('admin.footer.php'); ?>