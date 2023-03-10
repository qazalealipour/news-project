<?php

use Auth\Auth;

session_start();

//config
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', currentDomain() . '/news-project');
define('DISPLAY_ERROR', true);
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'news');
//mail
define('MAIL_HOST', 'smtp.gmail.com');
define('SMTP_AUTH', true);
define('MAIL_USERNAME', 'phpemailtest26@gmail.com');
define('MAIL_PASSWORD', 'dxpiwjlqrafheltl');
define('MAIL_PORT', 587);
define('SENDER_MAIL', 'phpemailtest26@gmail.com');
define('SENDER_NAME', 'وب سایت خبری');

global $flashMessage;

displayError();
date_default_timezone_set('Asia/Tehran');

require_once 'database/Database.php';
require_once 'database/CreateDB.php';
require_once 'activities/Admin/Admin.php';
require_once 'activities/Admin/Category.php';
require_once 'activities/Admin/Post.php';
require_once 'activities/Admin/Banner.php';
require_once 'activities/Admin/User.php';
require_once 'activities/Admin/Comment.php';
require_once 'activities/Admin/Menu.php';
require_once 'activities/Admin/WebSetting.php';
require_once 'activities/Auth/Auth.php';
require_once 'activities/App/Home.php';

/*$createDB = new \database\CreateDB();
$createDB->run();*/

spl_autoload_register(function ($class) {
    $path = BASE_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;
    require_once $path . $class . '.php';
});

function uri($reservedUrl, $class, $method, $requestMethod = 'GET')
{
    //current url array
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
    $currentUrl = trim($currentUrl, '/');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

    //reserved url array
    $reservedUrl = trim($reservedUrl, '/');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);

    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || $requestMethod != methodField()) {
        return false;
    }

    $parameters = [];
    for ($key = 0; $key < count($currentUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == '{' && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == '}') {
            array_push($parameters, $currentUrlArray[$key]);
        } elseif ($reservedUrlArray[$key] != $currentUrlArray[$key]) {
            return false;
        }
    }

    if (methodField() == 'POST') {
        if (isset($_FILES)) {
            $request = array_merge($_POST, $_FILES);
        } else {
            $request = $_POST;
        }
        $parameters = array_merge([$request], $parameters);
    }

    $object = new $class;
    call_user_func_array([$object, $method], $parameters);
    exit;
}

//helpers
function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') ? 'https://' : 'http://';
}

function currentDomain()
{
    return protocol() . $_SERVER['HTTP_HOST'];
}

function asset($src)
{
    return trim(CURRENT_DOMAIN, '/ ') . '/' . trim($src, '/ ');
}

function url($url)
{
    return trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ ');
}

function currentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField()
{
    return $_SERVER['REQUEST_METHOD'];
}

function displayError()
{
    if (DISPLAY_ERROR) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }
}

if (isset($_SESSION['flash_message'])) {
    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}

function flash($name, $value = null)
{
    if ($value === null) {
        global $flashMessage;
        return isset($flashMessage[$name]) ? $flashMessage[$name] : '';
    } else {
        $_SESSION['flash_message'][$name] = $value;
    }
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}

function jalaliDate($date)
{
    return \Parsidev\Jalali\jDate::forge($date)->format('%A, %d %B %Y');
}

//admin-panel routes
//category
uri('admin/category', '\Admin\Category', 'index');
uri('admin/category/create', '\Admin\Category', 'create');
uri('admin/category/store', '\Admin\Category', 'store', 'POST');
uri('admin/category/edit/{id}', '\Admin\Category', 'edit');
uri('admin/category/update/{id}', '\Admin\Category', 'update', 'POST');
uri('admin/category/destroy/{id}', '\Admin\Category', 'destroy');
//post
uri('admin/post', '\Admin\Post', 'index');
uri('admin/post/create', '\Admin\Post', 'create');
uri('admin/post/store', '\Admin\Post', 'store', 'POST');
uri('admin/post/show/{id}', '\Admin\Post', 'show');
uri('admin/post/edit/{id}', '\Admin\Post', 'edit');
uri('admin/post/update/{id}', '\Admin\Post', 'update', 'POST');
uri('admin/post/destroy/{id}', '\Admin\Post', 'destroy');
uri('admin/post/breaking-news/{id}', '\Admin\Post', 'breakingNews');
uri('admin/post/selected/{id}', '\Admin\Post', 'selected');
//banner
uri('admin/banner', '\Admin\Banner', 'index');
uri('admin/banner/create', '\Admin\Banner', 'create');
uri('admin/banner/store', '\Admin\Banner', 'store', 'POST');
uri('admin/banner/edit/{id}', '\Admin\Banner', 'edit');
uri('admin/banner/update/{id}', '\Admin\Banner', 'update', 'POST');
uri('admin/banner/destroy/{id}', '\Admin\Banner', 'destroy');
//user
uri('admin/user', '\Admin\User', 'index');
uri('admin/user/destroy/{id}', '\Admin\User', 'destroy');
uri('admin/user/permission/{id}', '\Admin\User', 'permission');
//comment
uri('admin/comment', '\Admin\Comment', 'index');
uri('admin/comment/change-status/{$id}', '\Admin\Comment', 'changeStatus');
//menu
uri('admin/menu', '\Admin\Menu', 'index');
uri('admin/menu/create', '\Admin\Menu', 'create');
uri('admin/menu/store', '\Admin\Menu', 'store', 'POST');
uri('admin/menu/edit/{id}', '\Admin\Menu', 'edit');
uri('admin/menu/update/{id}', '\Admin\Menu', 'update', 'POST');
uri('admin/menu/destroy/{id}', '\Admin\Menu', 'destroy');
//websetting
uri('admin/websetting', '\Admin\WebSetting', 'index');
uri('admin/websetting/set', '\Admin\WebSetting', 'set');
uri('admin/websetting/store', '\Admin\WebSetting', 'store', 'POST');
//auth routes
uri('login', '\Auth\Auth', 'login');
uri('check-login', '\Auth\Auth', 'checkLogin', 'POST');
uri('register', '\Auth\Auth', 'register');
uri('register-store', '\Auth\Auth', 'registerStore', 'POST');
uri('activation/{verify_token}', '\Auth\Auth', 'activation');
uri('logout', '\Auth\Auth', 'logout');
uri('forgot-password', '\Auth\Auth', 'forgotPassword');
uri('forgot-password/request', '\Auth\Auth', 'forgotPasswordRequest', 'POST');
uri('reset-password-form/{forgot_token}', '\Auth\Auth', 'resetPasswordForm');
uri('reset-password/{forgot_token}', '\Auth\Auth', 'resetPassword', 'POST');
//app
uri('/', '\App\Home', 'index');
uri('/home', '\App\Home', 'index');
uri('show-category/{id}', '\App\Home', 'showCategory');
uri('show-post/{id}', '\App\Home', 'showPost');
uri('comment-store/{post_id}', '\App\Home', 'commentStore', 'POST');

include_once BASE_PATH . '/template/page-404.php';