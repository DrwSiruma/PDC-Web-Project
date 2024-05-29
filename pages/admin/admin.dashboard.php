<?php include('admin.header.php'); ?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Dashboard</h2>
                <hr />

                <div class="card bg-dark">
                    <div class="card-header">
                        <h3><i class="fas fa-history"></i> Activty Log</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark table-sm w-100" id="al_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Activity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#2632</td>
                                        <td>panda_dev</td>
                                        <td>signed in</td>
                                        <td>Jul 31, 2024</td>
                                    </tr>
                                    <tr class="highlight">
                                        <td>#2633</td>
                                        <td>panda_support</td>
                                        <td>added img_123456.jpg to local Promo section</td>
                                        <td>Aug 01, 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
<?php include('admin.footer.php'); ?>