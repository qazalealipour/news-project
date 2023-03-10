<?php 
require_once BASE_PATH . '/template/app/layouts/header.php';
?>


<div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-nav-area">
                            <h1 class="text-white">اخبار دسته بندی <?= $category->name; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start latest-post Area -->
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">آخرین اخبار</h4>
                            <?php foreach ($categoryPosts as $categoryPost) { ?>
                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= asset($categoryPost->image); ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="<?= url('show-post/' . $categoryPost->id); ?>">
                                        <h4><?= $categoryPost->title; ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $categoryPost->userName; ?></a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span><?= jalaliDate($categoryPost->published_at); ?></a></li>
                                        <li><a href="#"> <?= $categoryPost->commentCount; ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert"></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- End latest-post Area -->
                        <!-- Start banner-ads Area -->
                        <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                            <img class="img-fluid" src="img/banner-ad.jpg" alt="">
                        </div>
                        <!-- End banner-ads Area -->
                        <!-- Start popular-post Area -->
                        <div class="popular-post-wrap">
                            <h4 class="title">اخبار پربازدید</h4>
                            <?php if (isset($popularPosts[0])) { ?>
                                <div class="feature-post relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= asset($popularPosts[0]->image); ?>" alt="">
                                    </div>
                                    <div class="details">
                                        <ul class="tags">
                                            <li><a href="<?= url('show-category/' . $popularPosts[0]->cat_id); ?>"><?= $popularPosts[0]->categoryName; ?></a></li>
                                        </ul>
                                        <a href="<?= url('show-post/' . $popularPosts[0]->id); ?>">
                                            <h3><?= $popularPosts[0]->title; ?></h3>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[0]->userName; ?></a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span><?= jalaliDate($popularPosts[0]->published_at); ?></a></li>
                                            <li><a href="#"><?= $popularPosts[0]->commentCount; ?><span class="lnr lnr-bubble"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row mt-20 medium-gutters">
                                <?php if (isset($popularPosts[1])) { ?>
                                    <div class="col-lg-6 single-popular-post">
                                        <div class="feature-img-wrap relative">
                                            <div class="feature-img relative">
                                                <div class="overlay overlay-bg"></div>
                                                <img class="img-fluid" src="<?= asset($popularPosts[1]->image); ?>" alt="">
                                            </div>
                                            <ul class="tags">
                                                <li><a href="<?= url('show-category/' . $popularPosts[1]->cat_id); ?>"><?= $popularPosts[1]->categoryName; ?></a></li>
                                            </ul>
                                        </div>
                                        <div class="details">
                                            <a href="<?= url('show-post/' . $popularPosts[1]->id); ?>">
                                                <h4><?= $popularPosts[1]->title; ?></h4>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[1]->userName; ?></a></li>
                                                <li><a href="#"><span class="lnr lnr-calendar-full"></span><?= jalaliDate($popularPosts[1]->published_at); ?></a></li>
                                                <li><a href="#"><?= $popularPosts[1]->commentCount; ?><span class="lnr lnr-bubble"></span></a></li>
                                            </ul>
                                            <p class="excert"></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if (isset($popularPosts[2])) {
                                    ?>
                                    <div class="col-lg-6 single-popular-post">
                                        <div class="feature-img-wrap relative">
                                            <div class="feature-img relative">
                                                <div class="overlay overlay-bg"></div>
                                                <img class="img-fluid" src="<?= asset($popularPosts[2]->image); ?>" alt="">
                                            </div>
                                            <ul class="tags">
                                                <li><a href="<?= url('show-category/' . $popularPosts[2]->cat_id); ?>"><?= $popularPosts[2]->categoryName; ?></a></li>
                                            </ul>
                                        </div>
                                        <div class="details">
                                            <a href="<?= url('show-post/' . $popularPosts[2]->id); ?>">
                                                <h4><?= $popularPosts[2]->title; ?></h4>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[2]->userName; ?></a></li>
                                                <li><a href="#"><span class="lnr lnr-calendar-full"></span><?= jalaliDate($popularPosts[2]->published_at); ?></a></li>
                                                <li><a href="#"><?= $popularPosts[2]->commentCount; ?><span class="lnr lnr-bubble"></span></a></li>
                                            </ul>
                                            <p class="excert"></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- End popular-post Area -->
                    </div>
                    <?php 
                    require_once BASE_PATH . '/template/app/layouts/sidebar.php';
                    ?>
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>


<?php 
require_once BASE_PATH . '/template/app/layouts/footer.php';
?>