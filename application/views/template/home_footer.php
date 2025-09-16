<!-- Start Footer Area -->
<footer class="footer-top-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <?php foreach ($contact as $c) : ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-widget">
                        <img src="<?= base_url('front-end/assets/img/contact/') . $c['image']; ?>" alt="Image">


                        <ul class="social-wrap">
                            <li>
                                <a href="<?= $c['tw'] ?>" target="_blank">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                            </li>

                            <li>
                                <a href="<?= $c['ig'] ?>" target="_blank">
                                    <i class="bx bxl-instagram"></i>
                                </a>
                            </li>

                            <li>
                                <a href="<?= $c['fb'] ?>" target="_blank">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                            </li>

                            <li>
                                <a href="<?= $c['yt'] ?>" target="_blank">
                                    <i class="bx bxl-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php foreach ($contact as $c) : ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-widget">
                        <h3>Contact Us</h3>

                        <ul class="address">
                            <li>
                                <i class="flaticon-pin"></i>
                                <?= $c['alamat'] ?>
                            </li>

                            <li>
                                <i class="flaticon-email-1"></i>
                                <a href="mailto:<?= $c['email'] ?>">
                                    <?= $c['email'] ?>
                                </a>
                            </li>

                            <li>
                                <i class="flaticon-phone-call"></i>
                                <a href="#">
                                    <?= $c['nope'] ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="col-lg-3 col-md-6">
                <div class="single-widget">
                    <h3>Quick Links</h3>

                    <ul class="additional-link">
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Team</a>
                        </li>
                        <li>
                            <a href="#">Help (FAQ)</a>
                        </li>
                        <li>
                            <a href="#">Contacts</a>
                        </li>
                    </ul>
                </div>
            </div>

            <?php foreach ($contact as $c) : ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-widget">
                        <iframe src="<?= $c['maps'] ?>" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</footer>
<!-- End Footer Area -->

<!-- Start Footer Bottom Area -->
<footer class="footer-bottom-area">
    <div class="container">
        <div class="copyright-wrap">
            <p>Copyright @2020 vidnext. Designed By <a href="#" target="blank">SerdaduCoding</a></p>
        </div>
    </div>
</footer>
<!-- End Footer Bottom Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class='bx bx-chevrons-up'></i>
    <i class='bx bx-chevrons-up'></i>
</div>
<!-- End Go Top Area -->


<!-- Jquery-3.5.1.Slim.Min.JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
<!-- Popper JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/bootstrap.min.js"></script>
<!-- Meanmenu JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/jquery.meanmenu.js"></script>
<!-- Wow JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/wow.min.js"></script>
<!-- Owl Carousel JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/owl.carousel.js"></script>
<!-- Carousel Thumbs JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/carousel-thumbs.js"></script>
<!-- Owl Magnific JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/jquery.magnific-popup.min.js"></script>
<!-- Nice Select JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/jquery.nice-select.min.js"></script>
<!-- Parallax JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/parallax.min.js"></script>
<!-- Mixitup JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/jquery.mixitup.min.js"></script>
<!-- Appear JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/jquery.appear.js"></script>
<!-- Odometer JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/odometer.min.js"></script>
<!-- Form Validator JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/form-validator.min.js"></script>
<!-- Contact JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/contact-form-script.js"></script>
<!-- Ajaxchimp JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/jquery.ajaxchimp.min.js"></script>
<!-- Custom JS -->
<script src="<?= base_url('front-end/'); ?>assets/js/custom.js"></script>
</body>


</html>