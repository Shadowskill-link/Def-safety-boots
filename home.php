<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM produtos  ORDER BY RAND() limit 30');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM produtos')->rowCount();

?>



<?= template_header('Home') ?>

    <section class="hero-area" id="hero-area">
        <div class="hero-slideshow owl-carousel">

            <!-- Single Slide -->
            <div class="single-slide">
                <!-- Background Image-->
                <div class="slide-bg-img bg-img" style="background-image: url(img/bg-img/7.png);"></div>
                <!-- Welcome Text -->
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="welcome-text">
                                <h2 data-animation="fadeInUp" data-delay="300ms">PERSONAL PROTECTIVE EQUIPMENT</h2>
                                <h4 data-animation="fadeInUp" data-delay="500ms"> <span>Established brand that sources
                                        high
                                        quality products worldwide</span></h4> <a href="#" class="btn pixel-btn mt-50"
                                    data-animation="fadeInUp" data-delay="700ms">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide -->
            <div class="single-slide">
                <!-- Background Image-->
                <div class="slide-bg-img bg-img" style="background-image: url(img/bg-img/53.png);"></div>
                <!-- Welcome Text -->
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text">
                                <h2 data-animation="fadeInUp" data-delay="300ms"> Quick turn around times as all items
                                    are
                                    stocked in country<br>of the year 2019 </h2> <a href="#" class="btn pixel-btn mt-50"
                                    data-animation="fadeInUp" data-delay="700ms">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <section class="info-hero section-padding-100 " style="background-image:url('img/bg-img/Prancheta2.png');">
        <div class="container">
            <h2 class="text-center wow fadeInUp" data-wow-delay="400ms" style="color: #006;">about us</h2>
            <p class="wow fadeInUp" style="color: #006;" data-wow-delay="1000ms">Lorem Ipsum is simply dummy text of the
                printing and
                typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged.
            </p>
        </div>
    </section>
    <section class="info-hero2 section-padding-100 ">
        <div class="">
            <h2 class="text-center wow fadeInUp" data-wow-delay="400ms">Some featured products </h2>
            <div class=" section-padding-100-0">

            </div>
            <div class="owl-carousel owl-theme container">
                <?php foreach ($recently_added_products as $product): ?>
                <form action="index.php?page=cart" method="post">
                    <div class="item">
                        <a href="index.php?page=product&id=<?= $product['id'] ?>"><img
                                src="img/<?= $product['imagem_produto'] ?>" alt=""></a>
                        <h4 class="text-muted mt-15">
                            <?= $product['nome_produto'] ?>
                        </h4>
                        <input type="hidden" class="form-control" name="quantity" value="1" min="1"
                            placeholder="Quantity" required>
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input class="btn pixel2-btn" type="submit" value="add to cart">
                        
                    </div>
                </form>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <style>
        .section-prancha h2 {
            position: relative;
            color: antiquewhite;
            font-size: larger;
        }
    </style>

    <section class="section-prancha" style="background-image:url('img/bg-img/Prancheta.png') ;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 wow fadeInLeft" data-wow-delay="600ms">
                    <img class="image-fluid" src="img/bg-img/activo.png" width="950">
                </div>
                <div class="col-md-6 py-4 mt-70">
                    <h2 class="text-center wow fadeInRight" data-wow-delay="600ms"
                        style="font-size:60px; font-weight:800px; text-transform: capitalize; color: #000; ;">Quick turn
                        around times as all items are stocked in country
                    </h2>
                    <div class="button mt-50 justify-content-center text-center" style="z-index: 99999; ;"><a href="#"
                            class="btn pixel-btn wow fadeInUp" data-delay="700ms">Find a Distributor</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ##### Newsletter Area Start ###### -->
    <section class="nl-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-9">
                    <div class="nl-form mb-100">
                        <h4>Stay in touch with us</h4>
                        <form action="#" method="post"> <input type="email" name="nl-email" id="nlEmail"
                                placeholder="Email Address ..."> <button type="submit" class="d-none"></button></form>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="view-projects-btn text-right mb-100"><a href="#" class="btn pixel-btn">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ###### -->


    <section>
        <div class="parallax2 col-md-12">
            <div class=" col-md-6 texto">
                <h2 class="title">SAFETY BOOTS</h2>
                <div class="icones justify-content-center">
                    <div class="icon-item"><img src="img/core-img/200-Joules-black.png" data-toggle="tooltip"
                            data-placement="top" title="Composite ToeCap">
                    </div>
                    <div class="icon-item"><img src="img/core-img/Anti-static-black-copy.png" data-toggle="tooltip"
                            data-placement="top" title="Anti-Static">
                    </div>
                    <div class="icon-item"><img src="img/core-img/Leather-black.png" data-toggle="tooltip"
                            data-placement="top" title="Genuine    Leather Upper">
                    </div>
                    <div class="icon-item"><img src="img/core-img/Oil-Resistant-black.png" data-toggle="tooltip"
                            data-placement="top" title="Oil    Resistant">
                    </div>
                    <div class="icon-item"><img src="img/core-img/Reflective-black.png" data-toggle="tooltip"
                            data-placement="top" title="Water    Repellant Upper">
                    </div>
                    <div class="icon-item"><img src="img/core-img/Shock-Absorbant-black.png" data-toggle="tooltip"
                            data-placement="top" title="Energy    Absorbing Heal">
                    </div>
                    <div class="icon-item"><img src="img/core-img/Slip-Resistant-black.png" data-toggle="tooltip"
                            data-placement="top" title="Anti-slip    Sole">
                    </div>
                </div>
                <div class="button">
                    <a href="#" class="btn pixel-btn">Explore IT</a>
                </div>
            </div>
    </section>7

    <!-- ##### Team Area Start ##### -->
    <section class="team-member-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2><strong style="color: #006;">OUR PRODUCTS KEEPS YOU SAFETY</strong></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum quis sem sed pharetra.
                            Morbi
                            tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et
                            malesuada fames ac turpis egestas.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Team Member -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member mb-100"><img src="img/bg-img/8.png" alt=""><!-- Hover Text -->
                        <div class="hover-text d-flex align-items-end justify-content-center text-center">
                            <div class="hover--">
                                <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, illum minus. Iste
                                    quas.
                                </h6>
                                <div class="social-info"> <a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-md-6 col-lg-3 mt-70">
                    <div class="single-team-member mb-100"><img src="img/bg-img/89.png" alt=""><!-- Hover Text -->
                        <div class="hover-text d-flex align-items-end justify-content-center text-center">
                            <div class="hover--">
                                <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, illum minus. Iste
                                    quas.
                                </h6>
                                <div class="social-info"> <a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-md-6 col-lg-3 ">
                    <div class="single-team-member mb-100">
                        <a href="#"> <img src="img/bg-img/20.png" alt=""></a><!-- Hover Text -->
                        <div class="hover-text d-flex align-items-end justify-content-center text-center">
                            <div class="hover--">
                                <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, illum minus. Iste
                                    quas.
                                </h6>
                                <div class="social-info"> <a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-md-6 col-lg-3 mt-70">
                    <div class="single-team-member mb-100"><img src="img/bg-img/4.png" alt=""><!-- Hover Text -->
                        <div class="hover-text d-flex align-items-end justify-content-center text-center">
                            <div class="hover--">
                                <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, illum minus. Iste
                                    quas.
                                </h6>
                                <div class="social-info"> <a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Team Area End ##### -->

    <!-- ##### Contact Area Start #####-->
    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <!-- Contact Form -->
                    <div class="contact-form-area text-center">
                        <form action="#" method="post"> <input type="text" name="name" class="form-control wow fadeInUp"
                                data-wow-delay="100ms" placeholder="Name"> <input type="email" name="email"
                                class="form-control wow fadeInUp" data-wow-delay="300ms" placeholder="E-mail"> <input
                                type="text" name="subject" class="form-control wow fadeInUp" data-wow-delay="500ms"
                                placeholder="Subject"> <textarea name="message" class="form-control wow fadeInUp"
                                data-wow-delay="700ms" placeholder="Message"></textarea> <button type="submit"
                                class="btn pixel-btn wow fadeInUp" data-wow-delay="900ms">Send Message</button></form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Contact Area End #####-->

    <?= template_footer() ?>