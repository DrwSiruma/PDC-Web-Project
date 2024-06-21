<?php include('header.php'); ?>
    <!-- ======= Hero ======= -->
    <section id="hero" class="hero" style="display: none;">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <?php
                    $hero_qry = mysqli_query($conn, "SELECT * FROM tbl_promo_hero WHERE `status` = 'Published' ORDER BY created DESC;");
                    $firstItem = true; // Flag to check the first item

                    while($rows = mysqli_fetch_array($hero_qry)) { 
                ?>

                    <!-- Slide -->
                    <div class="carousel-item <?php echo $firstItem ? 'active' : '' ?>" style="background-image: url(../uploads/promo/<?php echo $rows['image_name'] ?>)">
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

    <section id="promo" class="promo">
        <div class="container">
            <div class="section-title">
                <h2>Promos</h2>
            </div>

            <?php
                function format_promo_date($from, $to) {
                    $from_date = new DateTime($from);
                    $to_date = new DateTime($to);
                
                    $from_day = $from_date->format('j');
                    $from_month = $from_date->format('F');
                    $from_year = $from_date->format('Y');
                
                    $to_day = $to_date->format('j');
                    $to_month = $to_date->format('F');
                    $to_year = $to_date->format('Y');
                
                    if ($from_year != $to_year) {
                        return "$from_month $from_day, $from_year - $to_month $to_day, $to_year";
                    } elseif ($from_month != $to_month) {
                        return "$from_month $from_day - $to_month $to_day, $from_year";
                    } elseif ($from_day != $to_day) {
                        return "$from_month $from_day-$to_day, $from_year";
                    } else {
                        return "$from_month $from_day, $from_year";
                    }
                }

                $promo_qry = mysqli_query($conn, "SELECT * FROM tbl_promo WHERE `status` = 'Posted' ORDER BY created ASC;");

                while($promo_row = mysqli_fetch_array($promo_qry)) { 
            ?>

                <div class="card shadow promo-card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-5">
                                <img src="../uploads/promo/<?php echo $promo_row['image_name']; ?>" class="d-block w-100" alt="image">
                            </div>

                            <div class="col-md-7">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <h2 class="p-2"><?php echo $promo_row['title']; ?></h2>
                                        <div class="promo-text"><?php echo nl2br($promo_row['description']); ?></div>
                                        <div class="promo-runs">Promo runs until&nbsp;<?php echo format_promo_date($promo_row["promo_from"], $promo_row["promo_to"]); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <?php } ?>
        </div>
    </section>
<?php include('footer.php'); ?>