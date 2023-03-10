<?php
require_once BASE_PATH . "/template/admin/layouts/header.php";
?>
<div class="row flex-row">
                            <div class="col-xl-4 col-md-6">
                                <!-- Begin Widget 04 -->
                                <div class="widget widget-04 has-shadow">
                                    <!-- Begin Widget Header -->
                                    <div class="widget-header bordered d-flex align-items-center">
                                        <h2>پست</h2>
                                        <div class="widget-options">
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-check"></i>پست معتبر
                                                    </a>
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-edit"></i>ویرایش ابزارک
                                                    </a>
                                                    <a href="faq.html" class="dropdown-item faq"> 
                                                        <i class="la la-question-circle"></i>پرسش و پاسخ
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Widget Header -->
                                    <!-- Begin Widget Body -->
                                    <div class="widget-body p-0">
                                        <div class="post-container">
                                            <div class="media mb-3">
                                                <div class="media-left align-self-center user">
                                                    <a href="pages-profile.html"><img src="assets/img/avatar/avatar-01.jpg" class="rounded-circle" alt="..."></a>
                                                </div>
                                                <div class="media-body align-self-center ml-3">
                                                    <div class="title">
                                                        <span class="username">مرتضی رضایی</span> یک تصویر ارسال کرد
                                                    </div>
                                                    <div class="time">42 دقیقه قبل</div>
                                                </div>
                                            </div>
                                            <img src="assets/img/background/01.jpg" alt="..." class="img-fluid">
                                            <div class="col no-padding d-flex justify-content-end mt-3">
                                                <div class="meta">
                                                    <ul>
                                                        <li><a href="#"><i class="la la-comment"></i><span class="numb">38</span></a></li>
                                                        <li><a href="#"><i class="la la-heart"></i><span class="numb">94</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Begin Write Comment -->
                                        <div class="input-group mt-5">
                                            <input type="text" class="form-control pr-0" placeholder="نظر خود را بنویسید...">
                                            <span class="input-group-addon">
                                                <button class="btn" type="button">
                                                    <i class="la la-smile-o la-2x"></i>
                                                </button>
                                            </span>
                                            <span class="input-group-addon">
                                                <button class="btn pr-3" type="button">
                                                    <i class="la la-pencil la-2x"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <!-- End Write Comment -->
                                    </div>
                                    <!-- End Widget Body -->
                                </div>
                                <!-- End Widget 04 -->
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <!-- Begin Widget 05 -->
                                <div class="widget widget-05 has-shadow">
                                    <!-- Begin Widget Header -->
                                    <div class="widget-header bordered d-flex align-items-center">
                                        <h2>نویسنده های برتر</h2>
                                        <div class="widget-options">
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-edit"></i>ویرایش ابزارک
                                                    </a>
                                                    <a href="#" class="dropdown-item faq"> 
                                                        <i class="la la-question-circle"></i>پرسش و پاسخ
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Widget Header -->
                                    <!-- Begin Widget Body -->
                                    <div class="widget-body no-padding hidden">
                                        <div class="author-avatar">
                                            <span class="badge-pulse-green"></span>
                                            <img src="assets/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle">
                                        </div>
                                        <div class="author-name">
                                            محمد نوری
                                            <span>طراح گرافیک</span>
                                        </div>
                                        <div class="chart">
                                            <div class="row no-margin justify-content-center">
                                                <div class="col-12 col-xl-8 col-md-8 col-sm-8">
                                                    <div class="row no-margin align-items-center">
                                                        <!-- Begin Chart -->
                                                        <div class="col-9 no-padding">
                                                            <div class="chart-graph">
                                                                <div class="chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                                    <canvas id="sales-stats" width="77" height="38" style="display: block; width: 77px; height: 38px;" class="chartjs-render-monitor"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 no-padding text-center">
                                                            <div class="chart-text">
                                                                <span class="heading">فروش ها</span>
                                                                <span class="number">564</span>
                                                                <span class="cxg text-green">+35%</span>
                                                            </div>
                                                        </div>
                                                        <!-- End Chart -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="social-stats">
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-4 text-center">
                                                    <i class="la la-users followers"></i>
                                                    <div class="counter">+124</div>
                                                    <div class="heading">دنبال کننده</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-dribbble dribbble"></i>
                                                    <div class="counter">+657</div>
                                                    <div class="heading">لایک</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-behance behance"></i>
                                                    <div class="counter">+98</div>
                                                    <div class="heading">دنبال کننده</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="actions text-center">
                                            <a href="pages-profile.html" class="btn btn-gradient-01">مشاهده پروفایل</a>
                                        </div>
                                    </div>
                                    <!-- End Widget Body -->
                                </div>
                                <!-- End Widget 05 -->
                            </div>
                            <div class="col-xl-4">
                                <!-- Begin Widget 06 -->
                                <div class="widget widget-06 has-shadow">
                                    <!-- Begin Widget Header -->
                                    <div class="widget-header bordered d-flex align-items-center">
                                        <h2>نظرات</h2>
                                        <div class="widget-options">
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-edit"></i>ویرایش ابزارک
                                                    </a>
                                                    <a href="#" class="dropdown-item faq"> 
                                                        <i class="la la-question-circle"></i>پرسش و پاسخ
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Widget Header -->
                                    <!-- Begin Widget Body -->
                                    <div class="widget-body p-0">
                                        <div id="list-group" class="widget-scroll" style="max-height: 490px; overflow: hidden; outline: none;" tabindex="2">
                                            <ul class="reviews list-group w-100">
                                                <!-- 01 -->
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-start">
                                                            <img src="assets/img/avatar/avatar-01.jpg" class="user-img rounded-circle" alt="...">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <div class="username">
                                                                <h4>مرتضی رضائی</h4>
                                                            </div>
                                                            <div class="msg">
                                                                <div class="stars">
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star-half-empty"></i>
                                                                </div>
                                                                <p>
                                                                    کار فوق العاده
                                                                </p>
                                                            </div>
                                                            <div class="meta">
                                                                <span class="mr-3">30 دقیقه قبل - 1 پاسخ</span>
                                                                <a href="#">پاسخ</a>
                                                            </div>
                                                        </div>
                                                        <div class="media-right pr-3 align-self-center">
                                                            <div class="like text-center">
                                                                <i class="ion-heart"></i>
                                                                <span>15</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End 01 -->
                                                <!-- 02 -->
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-start">
                                                            <img src="assets/img/avatar/avatar-03.jpg" class="user-img rounded-circle" alt="...">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <div class="username">
                                                                <h4>محمد نوری</h4>
                                                            </div>
                                                            <div class="msg">
                                                                <div class="stars">
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                </div>
                                                                <p>
                                                                    بسیار زیبا! کارهاتون رو به همین زیبایی ادامه بدین!
                                                                </p>
                                                            </div>
                                                            <div class="meta">
                                                                <span class="mr-3">2 ساعت قبل</span>
                                                                <a href="#">پاسخ</a>
                                                            </div>
                                                        </div>
                                                        <div class="media-right pr-3 align-self-center">
                                                            <div class="like text-center">
                                                                <i class="ion-heart"></i>
                                                                <span>40</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End 02 -->
                                                <!-- 03 -->
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-start">
                                                            <img src="assets/img/avatar/avatar-04.jpg" class="user-img rounded-circle" alt="...">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <div class="username">
                                                                <h4>علی نیکو</h4>
                                                            </div>
                                                            <div class="msg">
                                                                <div class="stars">
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                </div>
                                                                <p>
                                                                    کار خوب! طراحی عالی!
                                                                </p>
                                                            </div>
                                                            <div class="meta">
                                                                <span class="mr-3">4 ساعت قبل</span>
                                                                <a href="#">پاسخ</a>
                                                            </div>
                                                        </div>
                                                        <div class="media-right pr-3 align-self-center">
                                                            <div class="like text-center">
                                                                <i class="ion-heart"></i>
                                                                <span>32</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End 03 -->
                                                <!-- 04 -->
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-start">
                                                            <img src="assets/img/avatar/avatar-09.jpg" class="user-img rounded-circle" alt="...">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <div class="username">
                                                                <h4>مازیار عزیزی</h4>
                                                            </div>
                                                            <div class="msg">
                                                                <div class="stars">
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star"></i>
                                                                    <i class="la la-star-half-empty"></i>
                                                                </div>
                                                                <p>
                                                                    بسیار عالی! با قدرت ادامه بدید.
                                                                </p>
                                                            </div>
                                                            <div class="meta">
                                                                <span class="mr-3">5 ساعت قبل - 2 پاسخ</span>
                                                                <a href="#">پاسخ</a>
                                                            </div>
                                                        </div>
                                                        <div class="media-right pr-3 align-self-center">
                                                            <div class="like text-center">
                                                                <i class="ion-heart"></i>
                                                                <span>2</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End 04 -->
                                            </ul>
                                        </div>
                                        <!-- End List -->
                                    </div>
                                    <!-- End Widget Body -->
                                </div>
                                <!-- End Widget 06 -->
                            </div>
                        </div>
<?php
require_once BASE_PATH . "/template/admin/layouts/footer.php";
?>