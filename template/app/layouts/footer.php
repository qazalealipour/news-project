    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 single-footer-widget">
                    <h4>خبرهای پربازدید</h4>
                    <ul>
                        <?php foreach ($popularPosts as $popularPost) { ?>
                        <li><a href="<?= url('show-post/' . $popularPost->id); ?>"><?= $popularPost->title; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>لینک های سریع</h4>
                    <ul>
                        <?php foreach ($menus as $menu) { ?>
                        <li><a href="<?= $menu->url; ?>"><?= $menu->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->
    <script src="<?= asset('public/app/js/vendor/jquery-2.2.4.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?= asset('public/app/js/vendor/bootstrap.min.js'); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="<?= asset('public/app/js/easing.min.js'); ?>"></script>
    <script src="<?= asset('public/app/js/hoverIntent.js'); ?>"></script>
    <script src="<?= asset('public/app/js/superfish.min.js'); ?>"></script>
    <script src="<?= asset('public/app/js/jquery.ajaxchimp.min.js'); ?>"></script>
    <script src="<?= asset('public/app/js/jquery.magnific-popup.min.js'); ?>"></script>
    <script src="<?= asset('public/app/js/mn-accordion.js'); ?>"></script>
    <script src="<?= asset('public/app/js/jquery-ui.js'); ?>"></script>
    <script src="<?= asset('public/app/js/jquery.nice-select.min.js'); ?>"></script>
    <script src="<?= asset('public/app/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?= asset('public/app/js/mail-script.js'); ?>"></script>
    <script src="<?= asset('public/app/js/main.js'); ?>"></script>
</body>
</html>