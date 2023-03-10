<!DOCTYPE html>
<html lang="fa">
<head>
    <title>ورود</title>
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
                    $message = flash('login_error');
                    if (!empty($message)) {
                    ?>
                    <div class="alert alert-danger alert-dissmissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong><?= $message; ?></strong>
                    </div>
                    <?php } ?>
                    <br>
                    <h3>ورود به حساب کاربری</h3>
                    <br>
                    <form action="<?= url('check-login'); ?>" method="post">
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
                            <button type="submit" class="btn btn-lg btn-gradient-01">ورود</button>
                        </div>
                    </form>
                    <div class="register">
                        <a href="<?= url('forgot-password'); ?>">فراموشی رمز عبور</a>
                    </div>
                    <div class="register">
                        اگر شما حساب کاربری ندارید؟
                        <br>
                        <a href="<?= url('register'); ?>">ساخت حساب کاربری</a>
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