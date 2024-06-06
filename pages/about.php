<?php include('header.php'); ?>
    <!-- ======= Hero ======= -->
    <?php
        $about_qry = mysqli_query($conn, "SELECT * FROM tbl_about_hero WHERE id = '13' AND status = 'Published'");
        $rows=mysqli_fetch_array($about_qry)
    ?>
    <section id="hero" class="hero d-flex align-items-center about-hero" style="background-image: url('../uploads/about/<?php echo $rows['image_name']; ?>');">
        <div class="container text-center position-relative" data-aos="fade-in">
            <h2 class="animate__animated animate__fadeInDown">Panda Development Corporation</h2>
            <p class="animate__animated animate__fadeInUp"><i>Above and Beyond.</i></p>
            <a href="#cprofile" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
    </section>
    <!-- ======= End Hero ======= -->

    <!-- ======= Company Profile Section ======= -->
    <section id="cprofile" class="cprofile">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="text-orange">Company Profile</h2>
                    <p>
                        Panda Development Corporation was founded on August 03, 1978 with the initial purpose of venturing into real estate business. Later, on June 04, 1994, it expanded its scope to include restaurants, cafes and fastfood centers.
                        <br /><br />
                        Presently, its primary focus is on manufacturing and retailing of doughnuts as a franchisee of DUNKIN’ in Muntinlupa, Parañaque, Las Piñas and Quezon province.
                        <br /><br />
                        Panda Developpent Corporation’s principal office is located at Building 2-A, Philcrest Compound, Km. 23, West Service Road, Bo. Cupang, Muntinlupa City while its satellite office is located at Maharlika Highway, Brgy. Isabang, Tayabas City.
                    </p>
                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-custom">
                                <h3 class="profile-title text-orange">Mission</h2>
                                <p>We exist to exceed guests’ expectations, making them our loyal clients, by consistently serving supreme quality coffee and donuts, exceptional service in a clean, safe and friendly atmosphere.</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card card-custom">
                                <h3 class="profile-title text-orange">Vision</h2>
                                <p>To be the top of mind coffee & donut chain that consistently provides a delightful experience to everyone.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Company Profile Section ======= -->

    <!-- ======= Our Core Values Section ======= -->
    <section id="core" class="core">
        <div class="container">
            <div class="section-title">
                <h2>Our Core Values</h2>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-4 col-md-6 content-item">
                    <h4>Result Driven</h4>
                    <p>
                        • We are serious about our goals. We proactively MAKE THINGS HAPPEN.
                        <br />
                        • We have a strong PASSION TO EXCEL. We commit to be BETTER THAN OUR BEST every day.
                        <br />
                        • We are CRITICAL THINKERS. The results we produce are products of a well-thought-out actions.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item">
                    <h4>Synergy</h4>
                    <p>
                        • We have more to WIN. We believe our individual efforts makes up our success.
                        <br />
                        • We are self-disciplined. We believe success begins with each team member’s initiative.
                        <br />
                        • We are humble. We collaborate with each team member with utmost respect.
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 content-item">
                    <h4>Guest-Focused</h4>
                    <p>
                        • We treat each customer as a very important Guest, ensuring that they receive the right value for their money.
                        <br />
                        • We understand that guests expect the highest quality product and service, along with a commitment to total cleanliness.
                        <br />
                        • Every action taken from the back end is to support the sales frontlines in exceeding guests’ expectations.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Our Core Values Section ======= -->

    <!-- ======= Achievements and Awards Section ======= -->
    <section id="awards" class="awards">
        <div class="container">
            <div class="section-title">
                <h2>Achievements and Awards</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-yellow w-100">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                            </svg>
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h4><a href="">Award Title 1</a></h4>
                        <p>This is a short description for the award.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-yellow w-100">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                            </svg>
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h4><a href="">Award Title 2</a></h4>
                        <p>This is a short description for the award.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-yellow w-100">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                            </svg>
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h4><a href="">Award Title 3</a></h4>
                        <p>This is a short description for the award.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-yellow w-100">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                            </svg>
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h4><a href="">Award Title 4</a></h4>
                        <p>This is a short description for the award.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-yellow w-100">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                            </svg>
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h4><a href="">Award Title 5</a></h4>
                        <p>This is a short description for the award.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-yellow w-100">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                            </svg>
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h4><a href="">Award Title 6</a></h4>
                        <p>This is a short description for the award.</p>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <!-- ======= End Achievements and Awards Section ======= -->
    
<?php include('footer.php'); ?>