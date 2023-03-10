                    <div class="col-lg-4">
                        <div class="sidebars-area">
                            <?php if (isset($topSelectedPosts[0])) { ?>
                            <div class="single-sidebar-widget editors-pick-widget">
                                <h6 class="title">انتخاب سردبیر</h6>
                                <div class="editors-pick-post">
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="<?= asset($topSelectedPosts[0]->image); ?>" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="<?= url('show-category/' . $topSelectedPosts[0]->cat_id); ?>"><?= $topSelectedPosts[0]->categoryName; ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <a href="<?= url('show-post/' . $topSelectedPosts[0]->id); ?>">
                                            <h4><?= $topSelectedPosts[0]->title; ?></h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPosts[0]->userName; ?></a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span><?= jalaliDate($topSelectedPosts[0]->published_at); ?></a></li>
                                            <li><a href="#"><?= $topSelectedPosts[0]->commentCount ?><span class="lnr lnr-bubble"></span></a></li>
                                        </ul>
                                        <p class="excert"></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            if (isset($banners[1])) {
                            ?>
                            <div class="single-sidebar-widget ads-widget">
                                <a href="<?= $banners[1]->url; ?>">
                                    <img class="img-fluid" src="<?= asset($banners[1]->image); ?>" alt="">
                                </a>
                            </div>
                            <?php } ?>
                            <div class="single-sidebar-widget most-popular-widget">
                                <h6 class="title">پر بحث ترین ها</h6>
                                <?php foreach ($mostCommentPosts as $item) { ?>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="<?= asset($item->image); ?>" alt="" style="width: 120px; height: 80px">
                                    </div>
                                    <div class="details">
                                        <a href="<?= url('show-post/' . $item->id); ?>">
                                            <h4><?= $item->title; ?></h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span><?= jalaliDate($item->published_at); ?></a></li>
                                            <li><a href="#"><?= $item->commentCount ?><span class="lnr lnr-bubble"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>