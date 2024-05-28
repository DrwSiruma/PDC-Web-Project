<?php include('admin.header.php'); ?>

            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4 text-orange">Dashboard</h2>
                <hr />

                <div>
                    <h3>Activity Log</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-dark table-sm">
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
                                    <td>31 Jul 2020</td>
                                </tr>
                                <tr class="highlight">
                                    <td>#2633</td>
                                    <td>panda_support</td>
                                    <td>added img_123456.jpg to local Promo section</td>
                                    <td>01 Aug 2020</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php include('admin.footer.php'); ?>