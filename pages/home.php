<?php include('header.php'); ?>

    <!-- ======= Hero ======= -->
    <section id="hero" class="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

            <?php
                $hero_qry = mysqli_query($conn, "SELECT * FROM tbl_home_hero WHERE `status` = 'Published' ORDER BY created DESC;");
                $firstItem = true; // Flag to check the first item

                while($rows = mysqli_fetch_array($hero_qry)) { 
            ?>

                <!-- Slide -->
                <div class="carousel-item <?php echo $firstItem ? 'active' : '' ?>" style="background-image: url(../uploads/home/<?php echo $rows['image_name'] ?>)">
                </div>

            <?php
                    $firstItem = false; // Set the flag to false after the first iteration
                }
            ?>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section>
    <!-- ======= End Hero ======= -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

            <div class="row">
            <div class="col-lg-9 text-center text-lg-start">
                <h3>Who are we?</h3>
                <p>Panda Development Corporation, founded on August 3, 1978, initially focused on real estate before expanding into the restaurant and fast-food sectors on June 4, 1994. Currently, it specializes in manufacturing and retailing doughnuts as a Dunkin’ franchisee in Muntinlupa, Parañaque, Las Piñas, and Quezon province. The company's main office is at Building 2-A, Philcrest Compound, Km. 23, West Service Road, Bo. Cupang, Muntinlupa City, with a satellite office at Maharlika Highway, Brgy. Isabang, Tayabas City.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
                <a href="about.php" class="cta-btn align-middle">Learn More</a>
            </div>
            </div>

        </div>
    </section>
    <!-- ======= End Cta Section ======= -->

    <!-- ======= Promo Section ======= -->
    <section id="promo-main" class="promo-main">
        <div class="container">
            <div class="card shadow promo-main-card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <h2>See Our Promos</h2>
                                    <div class="promo-text">
                                        <p>Check out our exciting promotions at our Dunkin’ outlets! Enjoy exclusive deals on your favorite Dunkin’ doughnuts and beverages at our locations in Muntinlupa, Parañaque, Las Piñas, and Quezon province. Whether you're craving a classic glazed doughnut or a refreshing iced coffee, our promotions offer something for everyone. Visit our stores or our website to stay updated on the latest offers and indulge in delicious savings. Don't miss out—treat yourself today!</p>
                                    </div>
                                    <a href="promos.php" class="btn btn-orange mb-3">See More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div id="carouselSlides" class="carousel slide h-100" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                        $promo_qry = mysqli_query($conn, "SELECT * FROM tbl_promo WHERE `status` = 'Posted' ORDER BY created ASC;");
                                        $firstItem2 = true; // Flag to check the first item
                                        $slideIndex = 0; // Counter for the slide index
                                        while ($promo_row = mysqli_fetch_array($promo_qry)) {
                                    ?>
                                        <div class="carousel-item <?php echo $firstItem2 ? 'active' : '' ?>">
                                            <img src="../uploads/promo/<?php echo $promo_row['image_name']; ?>" class="d-block w-100" alt="image">
                                        </div>
                                    <?php
                                            $firstItem2 = false;
                                            $slideIndex++;
                                        }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlides" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselSlides" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php
                                        for ($i = 0; $i < $slideIndex; $i++) {
                                    ?>
                                        <li data-bs-target="#carouselSlides" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>"></li>
                                    <?php
                                        }
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Promo Section ======= -->

    <!-- ======= Outlets Section ======= -->
    <section id="outlet-main" class="outlet-main">
        <div class="container">
            <div class="section-title">
                <h2>See Our Outlets</h2>
            </div>
            <div class="outlet-slider swiper">
                <div class="swiper-wrapper align-items-center">

                <?php
                    $outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE `status` = 'Active' ORDER BY store_name ASC;");

                    while($outlet_row = mysqli_fetch_array($outlet_qry)) { 
                ?>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../uploads/outlets/<?php echo $outlet_row['image_name']; ?>" class="img-fluid" alt="">
                            <h4><?php echo $outlet_row['store_name']; ?></h4>
                            <span class="text-primary"><?php echo $outlet_row['address']; ?></span>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- ======= End Outlets Section ======= -->

    <!-- ======= Join-main Section ======= -->
    <section id="join-main" class="join-main">
        <div class="container">

            <div class="row">
            <div class="col-lg-9 text-center text-lg-start">
                <h3>Want to join our team?</h3>
                <p> Are you passionate about delicious doughnuts and exceptional customer service? Join our team at Panda Development Corporation's Dunkin’ outlets! We're looking for enthusiastic, dedicated individuals to be part of our growing family in Muntinlupa, Parañaque, Las Piñas, and Quezon province. Enjoy a dynamic work environment, opportunities for growth, and the chance to bring smiles to our customers every day. Visit our website to explore current job openings and apply today. Become a part of the Dunkin’ experience with Panda Development Corporation!</p>
            </div>
            <div class="col-lg-3 join-btn-container text-center">
                <a href="careers.php" class="join-btn align-middle">Apply Here</a>
            </div>
            </div>

        </div>
    </section>
    <!-- ======= End Join-main Section ======= -->

<?php include('footer.php'); ?>