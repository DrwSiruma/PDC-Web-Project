<?php include('header.php'); ?>

    <!-- ======= Hero ======= -->
    <section id="hero" class="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(../assets/img/slides/slide-1.jpg)">
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(../assets/img/slides/slide-2.jpg)">
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url(../assets/img/slides/slide-3.jpg)">
                </div>

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
                                    <h2>See Our Local Promos</h2>
                                    <div class="promo-text">
                                        <p>Check out our exciting local promotions at our Dunkin’ outlets! Enjoy exclusive deals on your favorite Dunkin’ doughnuts and beverages at our locations in Muntinlupa, Parañaque, Las Piñas, and Quezon province. Whether you're craving a classic glazed doughnut or a refreshing iced coffee, our promotions offer something for everyone. Visit our stores or our website to stay updated on the latest offers and indulge in delicious savings. Don't miss out—treat yourself today!</p>
                                    </div>
                                    <a href="promos.php" class="btn btn-orange mb-3">See More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div id="carouseSlides" class="carousel slide h-100" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="../assets/img/promo/BEARY IN LOVE.png" class="d-block w-100" alt="image">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/img/promo/EASTER MUNCHKIN DEAL.png" class="d-block w-100" alt="image">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/img/promo/SUMMER DELIGHT PROMO.png" class="d-block w-100" alt="image">
                                    </div>
                                    <!-- Add more slides as needed -->
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouseSlides" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouseSlides" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselSlides" data-bs-slide-to="0" class="active"></li>
                                    <li data-bs-target="#carouselSlides" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselSlides" data-bs-slide-to="2"></li>
                                    <!-- Add more indicators for additional slides -->
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
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/atc.png" class="img-fluid" alt="">
                            <h4>ATC</h4>
                            <span class="text-primary">Alabang Town Center - Ground Level, Alabang Town Center, Alabang-Zapote Road, Alabang, Muntinlupa, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/dunkin_store_clipart.png" class="img-fluid" alt="">
                            <h4>CASIMIRO</h4>
                            <span class="text-primary">Ground Floor Casimiro Commercial Center Building Baragay Talon Uno, Las Piñas City, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/dunkin_store_clipart.png" class="img-fluid" alt="">
                            <h4>CENTRO</h4>
                            <span class="text-primary">Spectrum Midway, Alabang, Muntinlupa, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/dona_isabel.png" class="img-fluid" alt="">
                            <h4>DOÑA ISABEL</h4>
                            <span class="text-primary">#232 Doña Isabel Bldg. National rd. Bayanan, Muntinlupa, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/dona_manuela.png" class="img-fluid" alt="">
                            <h4>DOÑA MANUELA</h4>
                            <span class="text-primary">Doña Manuela Food Street, Alabang-Zapote Road Pamplona Tres, Las Pinas City, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/manila_times.png" class="img-fluid" alt="">
                            <h4>MANILA TIMES</h4>
                            <span class="text-primary">Aria, Talon Uno, Las Piñas City, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/moonwalk.png" class="img-fluid" alt="">
                            <h4>MOONWALK</h4>
                            <span class="text-primary">432 Alarang, Alabang–Zapote Rd, Talon 1, Las Piñas, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/naia.png" class="img-fluid" alt="">
                            <h4>NAIA</h4>
                            <span class="text-primary">Arry Plaza, 2142 Airport Rd, Ballaran, Parañaque, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/northgate.png" class="img-fluid" alt="">
                            <h4>NORTHGATE</h4>
                            <span class="text-primary">Northgate Ave, Fastbytes Northgate, Alabang, Muntinlupa, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/dunkin_store_clipart.png" class="img-fluid" alt="">
                            <h4>PITX</h4>
                            <span class="text-primary">PITX, 8344 E3, Tambo, Parañaque, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/poblacion.png" class="img-fluid" alt="">
                            <h4>POBLACION</h4>
                            <span class="text-primary">National Road, Poblacion, Muntinlupa, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/dunkin_store_clipart.png" class="img-fluid" alt="">
                            <h4>SF PILAR</h4>
                            <span class="text-primary">101 Lexicor Building Alabang Zapote Road Corner San Francisco Sreet Almanza Road Almanza Uno Lone District, Las Piñas, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/dunkin_store_clipart.png" class="img-fluid" alt="">
                            <h4>SOUTH STATION</h4>
                            <span class="text-primary">Green Bldg LS1-26, Alabang-South Station Ramp, Muntinlupa, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/southville.png" class="img-fluid" alt="">
                            <h4>SOUTHVILLE</h4>
                            <span class="text-primary">Lot 1-A-A The Edge Building CAA Road (J. Aguilar Avenue) Pulang Lupa 2 1st District, Las Piñas, Metro Manila.</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="outlet-card">
                            <img src="../assets/img/outlets/verdant.png" class="img-fluid" alt="">
                            <h4>VERDANT</h4>
                            <span class="text-primary">Unit Door A8 Santiagel Building Verdant Avenue Corner Alabang Zapote Road Barangay Pamplona Tres, Las Piñas, Metro Manila.</span>
                        </div>
                    </div>
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