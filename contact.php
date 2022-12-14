<?= template_header('Contact') ?>


    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/60.png);">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    
    <!-- ##### Google Maps ##### -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3588.125722658945!2d32.588037515024446!3d-25.93109638356021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ee69baea1e99c83%3A0x39d692faf9876b9a!2sNorco%20Mozambique%20lda!5e0!3m2!1spt-PT!2smz!4v1666662205597!5m2!1spt-PT!2smz" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0" id="contact">
        <div class="container">
            <div class="row">

                <!-- Single Contact Area -->
                <div class="col-12 col-lg-4">
                    <!-- Contact Content -->
                    <div class="contact-content mb-100">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <h2>Where?</h2>
                            <h6>Our Address</h6>
                        </div>

                        <!-- Single Contact Content -->
                        <div class="single-contact-content d-flex">
                            <div class="icon">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <h6>Address</h6>
                                <p>1815 Av. das For??as Populares de Libera????o de Mo??ambique<br> , Maputo  Mo??ambique</p>
                            </div>
                        </div>

                        <!-- Single Contact Content -->
                        <div class="single-contact-content d-flex">
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="text">
                                <h6>Email</h6>
                                <p>info@defsafety.com <br> j</p>
                            </div>
                        </div>

                        <!-- Single Contact Content -->
                        <div class="single-contact-content d-flex">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="text">
                                <h6>Phone</h6>
                                <p>+258 84 389 4365<br></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Contact Area -->
                <div class="col-12 col-lg-8">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Get In Touch</h2>
                        <h6>Drop us a few lines</h6>
                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form-area mb-100">
                        <form action="#" method="post">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                            <textarea name="message" class="form-control" placeholder="Message"></textarea>
                            <button type="submit" class="btn pixel-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ##### Contact Area End ##### -->
    <?= template_footer() ?>