<?php include('header.php'); ?>
    <!-- ======= Hero ======= -->
    <?php
        $careers_qry = mysqli_query($conn, "SELECT * FROM tbl_careers_hero WHERE id = '14' AND status = 'Published'");
        $rows=mysqli_fetch_array($careers_qry)
    ?>
    <section id="hero" class="hero d-flex align-items-center careers-hero" style="background-image: url('../uploads/careers/<?php echo $rows['image_name']; ?>');">
        <div class="container text-center position-relative" data-aos="fade-in">
            <h2 class="animate__animated animate__fadeInDown">Panda Development Corporation</h2>
            <p class="animate__animated animate__fadeInUp">
                At Panda Development Corporation, we are committed to creating exceptional experiences and fostering growth through innovation, quality, and collaboration. Join us as we pave the way for a brighter, more successful tomorrow.
            </p>
        </div>
    </section>
    <!-- ======= End Hero ======= -->

    <!-- ======= Join Section ======= -->
    <section id="join" class="join">
        <div class="container">

            <div class="row">
            <div class="col-lg-9 text-center text-lg-start">
                <h3>Want to join us today?</h3>
                <p> Are you passionate about delicious doughnuts and exceptional customer service? Join our team at Panda Development Corporation's Dunkin’ outlets! We're looking for enthusiastic, dedicated individuals to be part of our growing family in Muntinlupa, Parañaque, Las Piñas, and Quezon province. Enjoy a dynamic work environment, opportunities for growth, and the chance to bring smiles to our customers every day. Visit our website to explore current job openings and apply today. Become a part of the Dunkin’ experience with Panda Development Corporation!</p>
            </div>
            <div class="col-lg-3 join-btn-container text-center">
                <a href="application-form.php" class="join-btn align-middle">Apply Now</a>
            </div>
            </div>

        </div>
    </section>
    <!-- ======= End Join Section ======= -->

    <!-- ======= WYLWWU Section ======= -->
    <section id="wylwwu" class="wylwwu">
        <div class="container">
            <div class="section-title">
                <h2>Why You Love Working With Us</h2>
            </div>

            <div class="row">
                <?php
                    $wylwwu_qry = mysqli_query($conn, "SELECT * FROM tbl_careers_wylwwu WHERE `status` = 'Published';");

                    while($wylwwu_row = mysqli_fetch_array($wylwwu_qry)) { 
                ?>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <img src="../uploads/careers/<?php echo $wylwwu_row['image_name']; ?>" class="card-img-top" alt="Image 1">
                        <div class="card-body">
                            <h5 class="card-title text-center text-orange"><?php echo $wylwwu_row['title']; ?></h5>
                            <p class="card-text"><?php echo $wylwwu_row['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ======= End WYLWWU Section ======= -->

    <!-- ======= Careers Section ======= -->
    <section id="careers" class="careers">
        <div class="container">
            <div class="text-center mb-4">
                <h1>Be part of us.</h1>
                <p>We're looking for passionate people to join us on our mission. We value flat hierarchies, clear communication, and full ownership and responsibility</p>
            </div>

            <div class="job-card">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <div class="job-title">IT Specialist</div>
                        <p>We're looking for an experienced IT Specialist to join our team.</p>
                        <div class="mb-2">
                            <span class="badge bg-light border border-dark border-2 text-dark rounded-pill"><i class="bi bi-geo-alt"></i> On site</span>
                            <span class="badge bg-light border border-dark border-2 text-dark rounded-pill"><i class="bi bi-clock"></i> Full-time</span>
                        </div>
                    </div>
                    <div class="col-md-2 text-md-end text-center">
                        <a href="application-form.php?id=1" class="apply-btn rounded-pill">Apply Now&nbsp;<i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
            </div>

            <div class="job-card">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <div class="job-title">Store Manager</div>
                        <p>We're looking for a Store Manager to join our team.</p>
                        <div class="mb-2">
                            <span class="badge bg-light border border-dark border-2 text-dark rounded-pill"><i class="bi bi-geo-alt"></i> On site</span>
                            <span class="badge bg-light border border-dark border-2 text-dark rounded-pill"><i class="bi bi-clock"></i> Full-time</span>
                        </div>
                    </div>
                    <div class="col-md-2 text-md-end text-center">
                        <a href="application-form.php?id=2" class="apply-btn rounded-pill">Apply Now&nbsp;<i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
            </div>

            <div class="job-card">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <div class="job-title">Service Crew</div>
                        <p>We're looking for a Service Crew to join our team.</p>
                        <div class="mb-2">
                            <span class="badge bg-light border border-dark border-2 text-dark rounded-pill"><i class="bi bi-geo-alt"></i> On site</span>
                            <span class="badge bg-light border border-dark border-2 text-dark rounded-pill"><i class="bi bi-clock"></i> Full-time</span>
                        </div>
                    </div>
                    <div class="col-md-2 text-md-end text-center">
                        <a href="application-form.php?id=3" class="apply-btn rounded-pill">Apply Now&nbsp;<i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
            </div>

            <div class="job-card">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <div class="job-title">Marketing Staff</div>
                        <p>We're looking for a Marketing Staff to join our team.</p>
                        <div class="mb-2">
                            <span class="badge bg-light border border-dark border-2 text-dark rounded-pill"><i class="bi bi-geo-alt"></i> On site</span>
                            <span class="badge bg-light border border-dark border-2 text-dark rounded-pill"><i class="bi bi-clock"></i> Full-time</span>
                        </div>
                    </div>
                    <div class="col-md-2 text-md-end text-center">
                        <a href="application-form.php?id=4" class="apply-btn rounded-pill">Apply Now&nbsp;<i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Careers Section ======= -->
<?php include('footer.php'); ?>