<?php
include('admin.header.php'); 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = $conn->prepare("SELECT * FROM tbl_user WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $user = $result->fetch_assoc();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: admin.accounts.php");
    exit();
}
?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange"><a href="admin.accounts.php"><i class="fas fa-backward text-pink"></i></a>&nbsp;Edit User</h2>
                <hr />

                <div class="row">
                    <div class="col-md-6">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right text-pink"><i class="fas fa-user-edit"></i>&nbsp;Profile Settings</h4>
                            </div>
                            <?php if (!empty($_SESSION['profile-error'])) : ?>
                                <div class="alert alert-danger"><?php echo $_SESSION['profile-error']; unset($_SESSION['profile-error']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($_SESSION['profile-success'])) : ?>
                                <div class="alert alert-success"><?php echo $_SESSION['profile-success']; unset($_SESSION['profile-success']); ?></div>
                            <?php endif; ?>
                            <form method="post" action="admin.edit.php">
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label for="username">Username :</label>
                                        <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label for="role">Role :</label>
                                        <select class="form-control" id="role" name="role" onchange="toggleBranchSelection()">
                                            <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                            <option value="support" <?php if ($user['role'] == 'support') echo 'selected'; ?>>Support</option>
                                            <option value="dev" <?php if ($user['role'] == 'dev') echo 'selected'; ?>>Dev</option>
                                            <option value="marketing" <?php if ($user['role'] == 'marketing') echo 'selected'; ?>>Marketing</option>
                                            <option value="hr" <?php if ($user['role'] == 'hr') echo 'selected'; ?>>HR</option>
                                            <option value="outlet" <?php if ($user['role'] == 'outlet') echo 'selected'; ?> disabled>Outlet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2" id="branch-section" style="display: none;">
                                    <div class="col-md-12">
                                        <label for="branch">Branch :</label>
                                        <select class="form-control" id="branch" name="branch">
                                            <option value="" <?php if ($user['branch'] == '') echo 'selected'; ?> hidden>Select Branch</option>
                                            <?php
                                                $outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE `status` = 'Active'");
                                                while($rows=mysqli_fetch_array($outlet_qry)){ 
                                            ?>
                                                <option value="<?php echo $rows['short_name']; ?>" <?php if ($user['branch'] == $rows['short_name']) echo 'selected'; ?>><?php echo $rows['store_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="Active" <?php if ($user['status'] == 'Active') echo 'selected'; ?>>Active</option>
                                            <option value="Inactive" <?php if ($user['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3 text-center"><button class="btn btn-orange" type="submit" title="Update">Update Profile</button></div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right text-pink"><i class="fas fa-shield-alt"></i>&nbsp;Reset Password</h4>
                            </div>
                            <?php if (!empty($_SESSION['password-error'])) : ?>
                                <div class="alert alert-danger"><?php echo $_SESSION['password-error']; unset($_SESSION['password-error']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($_SESSION['password-success'])) : ?>
                                <div class="alert alert-success"><?php echo $_SESSION['password-success']; unset($_SESSION['password-success']); ?></div>
                            <?php endif; ?>
                            <form method="post" action="admin.reset.php">
                                <input type="hidden" name="pid" value="<?php echo $user['id']; ?>">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label class="labels">New Password:</label>
                                        <input type="password" class="form-control" name="new_password" id="new_password">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">Confirm Password:</label>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button class="btn btn-orange profile-button" type="submit" title="Reset Password">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

<?php include('admin.footer.php'); ?>