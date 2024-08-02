<?php include('header.php'); ?>

    <section id="banner" style="background: #F9F3EC; padding: 0px;">
        <div class="container">
            <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                    <?php
                        $hero_qry = mysqli_query($conn, "SELECT * FROM tbl_home_hero WHERE `status` = 'Published' ORDER BY created DESC;");
                        while($rows = mysqli_fetch_array($hero_qry)) {
                    ?>

                    <div class="swiper-slide py-5">
                        <div class="row banner-content align-items-center">
                            <div class="img-wrapper col-md-5">
                                <img src="../uploads/home/<?php echo $rows['image_name']; ?>" class="img-fluid">
                            </div>
                            <div class="content-wrapper col-md-7 p-5 mb-5">
                                <h2 class="banner-title display-1 fw-normal"><?php echo $rows['title']; ?></h2>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

            <div class="row">
            <div class="col-lg-9 text-center text-lg-start">
                <h3>What is PDC?</h3>
                <p>Panda Development Corporation, founded on August 3, 1978, initially focused on real estate before expanding into the restaurant and fast-food sectors on June 4, 1994. Currently, it specializes in manufacturing and retailing doughnuts as a Dunkin’ franchisee in Muntinlupa, Parañaque, Las Piñas, and Quezon province. The company's main office is at Building 2-A, Philcrest Compound, Km. 23, West Service Road, Bo. Cupang, Muntinlupa City, with a satellite office at Maharlika Highway, Brgy. Isabang, Tayabas City.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
                <a href="about.php" class="cta-btn align-middle">Learn More</a>
            </div>
            </div>

        </div>
    </section>
    <!-- ======= End Cta Section ======= -->

    <!-- ======= News Section ======= -->
    <section id="news" class="news">
        <div class="container">
            <div class="section-title">
                <h2>Latest News</h2>
            </div>

            <div class="row">
            <?php
                $news_qry = mysqli_query($conn, "SELECT * FROM tbl_news WHERE `status` = 'Posted' ORDER BY date_posted DESC;");
                if (mysqli_num_rows($news_qry) > 0) {
                    while($news_res = mysqli_fetch_array($news_qry)) {
            ?>

                        <div class="col-md-4 mb-3">
                            <div class="card shadow-sm">
                                <img src="../uploads/news/<?php echo $news_res['img_name']; ?>" class="card-img-top" alt="news image">
                                <div class="card-body">
                                    <p class="card-text mb-1 text-secondary">
                                        <?php
                                            $original_date = $news_res['date_posted'];
                                            $formatted_date = date("F d, Y", strtotime($original_date));
                                            echo $formatted_date;
                                        ?>
                                    </p>
                                    <h5 class="card-title mb-0 text-center text-orange"><?php echo $news_res['headline']; ?></h5>
                                </div>
                            </div>
                        </div>

            <?php
                    }
                } else {
            ?>
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            No news is available right now.
                        </div>
                    </div>
            <?php
                }
            ?>
            </div>
        </div>
    </section>
    <!-- ======= End Outlets Section ======= -->

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
                            <div id="carouselSlides" class="carousel slide h-100 promo-carousel" data-bs-ride="carousel">
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
                <!-- <p style="font-weight: bold;">View all <a href="#" class="text-orange">Future Dunkin' Outlets</a></p> -->
            </div>
            <div class="outlet-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <?php
                        $outlet_qry = mysqli_query($conn, "SELECT * FROM tbl_outlet WHERE `status` = 'Active' ORDER BY store_name ASC;");

                        while($outlet_row = mysqli_fetch_array($outlet_qry)) { 
                    ?>
                        <div class="swiper-slide">
                            <div class="card shadow-sm">
                                <img src="../uploads/outlets/<?php echo $outlet_row['image_name']; ?>" class="card-img-top" alt="">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-orange"><?php echo $outlet_row['store_name']; ?></h5>
                                    <a href="outlet.details.php?id=<?php echo $outlet_row['id']; ?>" class="btn btn-sm btn-orange mt-2" style="font-size: .75rem;">Store details <i class="fas fa-external-link-alt"></i></a>
                                </div>
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
                <div class="col-lg-3 join-btn-container text-center">
                    <img src="../assets/img/team/we_are_hiring.png" style="width: 100%;" class="img-liquid">
                </div>
                <div class="col-lg-9 text-center text-lg-start">
                    <h1>WE ARE HIRING!!!</h1>
                    <h3>Step into your future – exciting opportunities ahead!</h3>
                    <div class="join-btn-container text-center">
                        <a href="careers.php" class="join-btn align-middle">Apply Here</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ======= End Join-main Section ======= -->

<?php include('footer.php'); ?>