<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <!-- Stylesheet -->
    <!-- Font Iran licence -->
    <link rel="stylesheet" href="<?= asset('public/admin/assets/css/fontiran.css'); ?>">

    <link rel="stylesheet" href="<?= asset('public/admin/assets/vendors/css/base/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= asset('public/admin/assets/vendors/css/base/seenboard-1.0.css'); ?>">
    <link rel="stylesheet" href="<?= asset('public/admin/assets/css/owl-carousel/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= asset('public/admin/assets/css/owl-carousel/owl.theme.min.css'); ?>">
    <link rel="stylesheet" href="<?= asset('public/admin/assets/jalalidatepicker/persian-datepicker.min.css'); ?>">
    <script src="<?= asset('public/ckeditor/ckeditor.js'); ?>"></script>
    <style>
        #showInfo:hover {
            background-color: #999999;
        }
    </style>
</head>
<body id="page-top">
<div class="page">
    <!-- Begin Header -->
    <header class="header">
        <nav class="navbar fixed-top">
            <!-- Begin Topbar -->
            <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                <!-- Begin Logo -->
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">
                        <div class="brand-image brand-big">
                            <img src="<?= asset('public/admin/assets/img/white.png'); ?>" alt="logo" class="logo-big">
                        </div>
                        <div class="brand-image brand-small">
                            <img src="<?= asset('public/admin/assets/img/logo-white.png'); ?>" alt="logo" class="logo-small">
                        </div>
                    </a>
                    <!-- Toggle Button -->
                    <a id="toggle-btn" href="#" class="menu-btn active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <!-- End Toggle -->
                </div>
                <!-- End Logo -->
                <!-- Begin Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                    <!-- User -->
                    <li class="nav-item dropdown">
                        <a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="ion ion-person"></i></a>
                        <ul aria-labelledby="user" class="user-size dropdown-menu">
                            <br>
                            <li>
                                <a href="<?= url('logout'); ?>" class="dropdown-item">
                                    خروج از حساب کاربری
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item"></a>
                            </li>
                        </ul>
                    </li>
                    <!-- End User -->
                    <!-- Begin Quick Actions -->
                    <li class="nav-item"><a href="#" class="open-sidebar"><i></i></a></li>
                    <!-- End Quick Actions -->
                </ul>
                <!-- End Navbar Menu -->
            </div>
            <!-- End Topbar -->
        </nav>
    </header>
    <!-- End Header -->
    <!-- Begin Page Content -->
    <div class="page-content d-flex align-items-stretch">
        <div class="default-sidebar">
            <!-- Begin Side Navbar -->
            <nav class="side-navbar box-scroll sidebar-scroll">
                <!-- Begin Main Navigation -->
                <ul class="list-unstyled">
                    <li><a href="<?= url('admin/user'); ?>"><i class="la la-user"></i><span>کاربران</span></a></li>
                    <li><a href="<?= url('admin/category'); ?>"><i class="la la-list-alt"></i><span>دسته بندی ها</span></a></li>
                    <li><a href="<?= url('admin/post'); ?>"><i class="la la-file-text"></i><span>پست ها</span></a></li>
                    <li><a href="<?= url('admin/banner'); ?>"><i class="la la-photo"></i><span>بنر ها</span></a></li>
                    <li><a href="<?= url('admin/websetting'); ?>"><i class="la la-cog"></i><span>تنظیمات کلی</span></a></li>
                    <li><a href="<?= url('admin/menu'); ?>"><i class="la la-bars"></i><span>منو ها</span></a></li>
                    <li><a href="<?= url('admin/comment'); ?>"><i class="la la-comments"></i><span>کامنت ها</span></a></li>
                </ul>
                <!-- End Main Navigation -->
            </nav>
            <!-- End Side Navbar -->
        </div>
        <!-- End Left Sidebar -->
        <div class="content-inner">
            <div class="container-fluid">