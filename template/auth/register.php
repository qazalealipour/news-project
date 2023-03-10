<!DOCTYPE html>
<html lang="fa">
<head>
    <title>ثبت نام</title>
    <?php 
    require_once BASE_PATH . '/template/auth/layouts/head-tag.php';
    ?>
</head>
<body class="bg-fixed-02">
    <!-- Begin Container -->
    <div class="container-fluid h-100 overflow-y">
        <div class="row flex-row h-100">
            <div class="col-12 my-auto">
                <div class="password-form mx-auto">
                    <div class="logo-centered"></div>
                    <?php 
                    $message = flash('register_error');
                    if (!empty($message)) {
                    ?>
                    <div class="alert alert-danger alert-dissmissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong><?= $message; ?></strong>
                    </div>
                    <?php } ?>
                    <br>
                    <h3>ثبت نام</h3>
                    <br>
                    <form action="<?= url('register-store'); ?>" method="post">
                        <div class="group material-input">
                            <input type="text" name="username" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>نام و نام خانوادگی</label>
                        </div>
                        <div class="group material-input">
                            <input type="email" name="email" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>ایمیل</label>
                        </div>
                        <div class="group material-input">
                            <input type="password" name="password" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>رمز عبور</label>
                        </div>
                        <div class="button text-center">
                            <button type="submit" class="btn btn-lg btn-gradient-01">ثبت نام</button>
                        </div>
                    </form>
                    <div class="register">
                        آیا شما حساب کاربری دارید؟
                        <br>
                        <a href="<?= url('login'); ?>">ورود</a>
                    </div>
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->
<?php 
require_once BASE_PATH . '/template/auth/layouts/scripts.php';
?>

</body>
</html>