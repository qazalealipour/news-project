<?php 

namespace Auth;

use database\Database;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Auth 
{
    public function login()
    {
        require_once BASE_PATH . '/template/auth/login.php';
    }

    public function checkLogin($request)
    {
        if (empty($request['email']) || empty($request['password'])) {
            flash('login_error', 'تمامی فیلدها الزامی می باشند');
            $this->back();
        } elseif (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash('login_error', 'ایمیل نامعتبر است');
            $this->back();
        } else {
            $db = new Database();
            $user = $db->select("SELECT * FROM users WHERE email = ?", [$request['email']])->fetch();
            if ($user) {
                if (password_verify($request['password'], $user->password)) {
                    if ($user->is_active == 1) {
                        $_SESSION['user'] = $user->id;
                        $this->redirect('/');
                    } else {
                        flash('login_error', 'دسترسی غیرمجاز');
                        $this->back();
                    }
                } else {
                    flash('login_error', 'رمز عبور صحیح نمی باشد');
                    $this->back();
                }
            } else {
                flash('login_error', 'کاربری با این مشخصات یافت نشد');
                $this->back();
            }
        }
    }

    public function checkAdmin()
    {
        if (isset($_SESSION['user'])) {
            $db = new Database();
            $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();
            if ($user) {
                if ($user->permission != 'admin') {
                    flash('login_error', 'دسترسی غیرمجاز');
                    $this->redirect('login');
                }
            } else {
                flash('login_error', 'کاربری با این مشخصات یافت نشد');
                $this->redirect('login');
            }
        } else {
            $this->redirect('login');
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirect('login');
    }

    public function register()
    {
        require_once BASE_PATH . '/template/auth/register.php';
    }

    public function registerStore($request)
    {
        if (empty($request['username']) || empty($request['email']) || empty($request['password'])) {
            flash('register_error', 'تمامی فیلدها الزامی می باشند');
            $this->back();
        } elseif (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash('register_error', 'ایمیل نامعتبر است');
            $this->back();
        } elseif (strlen($request['password']) < 8) {
            flash('register_error', 'رمز عبور باید حداقل 8 کاراکتر باشد');
            $this->back(); 
        } else {
            $db = new Database();
            $user = $db->select("SELECT * FROM users WHERE email = ?", [$request['email']])->fetch();
            if ($user) {
                flash('register_error', 'کاربر از قبل در سیستم وجود دارد');
                $this->back();
            } else {
                $randomToken = $this->random();
                $activationEmail = $this->activationEmail($request['username'], $randomToken);
                $result = $this->sendEmail($request['email'], 'فعال سازی حساب کاربری', $activationEmail);
                if ($result) {
                    $request['verify_token'] = $randomToken;
                    $request['password'] = $this->hash($request['password']);
                    $db->insert('users', array_keys($request), $request);
                    $this->redirect('login');
                } else {
                    flash('register_error', 'ارسال ایمیل با خطا مواجه شد');
                    $this->back();
                }
                
            }
        }
    }

    public function forgotPassword() 
    {
        require_once BASE_PATH . '/template/auth/forgot-password.php';
    }

    public function forgotPasswordRequest($request) 
    {
        if (empty($request['email'])) {
            flash('forgot_error', 'فیلد ایمیل الزامی است');
            $this->back();
        } elseif (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash('forgot_error', 'ایمیل نامعتبر است');
            $this->back();
        } else {
            $db = new Database();
            $user = $db->select("SELECT * FROM users WHERE email = ?", [$request['email']])->fetch();
            if ($user) {
                $forgotToken = $this->random();
                $forgotMessage = $this->forgotPasswordEmail($user->username, $forgotToken);
                $result = $this->sendEmail($request['email'], 'فراموشی رمز عبور', $forgotMessage);
                if ($result) {
                    $request['forgot_token'] = $forgotToken;
                    $request['forgot_token_expire'] = date('Y-m-d H:i:s', strtotime('+15 minutes'));
                    $db->update('users', array_keys($request), $request, $user->id);
                    flash('forgot_success', 'ایمیل تغییر رمز عبور به ایمیل شما ارسال شد');
                    $this->back();
                } else {
                    flash('forgot_error', 'ارسال ایمیل با خطا مواجه شد');
                    $this->back();
                }
            } else {
                flash('forgot_error', 'کاربری با این مشخصات یافت نشد');
                $this->back();
            }
        }
    }

    public function resetPasswordForm($forgotToken)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE forgot_token = ?", [$forgotToken])->fetch();
        require_once BASE_PATH . '/template/auth/reset-password.php';
    }

    public function resetPassword($request, $forgotToken)
    {
        if (empty($request['password'])){
            flash('reset_password_error', 'رمز عبور الزامی است');
            $this->back();
        } elseif (strlen($request['password']) < 8) {
            flash('reset_password_error', 'طول رمز عبور باید حداقل 8 کاراکتر باشد');
            $this->back();
        } else {
            $db = new Database();
            $user = $db->select("SELECT * FROM users WHERE forgot_token = ?", [$forgotToken])->fetch();
            if ($user) {
                if ($user->forgot_token_expire < date('Y-m-d H:i:s')) {
                    flash('reset_password_error', 'توکن ارسال شده منقضی شده است');
                    $this->back();
                } else {
                    $request['password'] = $this->hash($request['password']);
                    $db->update('users', ['password'], [$request['password']], $user->id);
                    flash('reset_password_success', 'تغییر رمز عبور با موفقیت انجام شد');
                    $this->back();
                }
            } else {
                flash('reset_password_error', 'کاربری با این مشخصات یافت نشد');
                $this->back();
            }
        }
    }

    public function activation($verifyToken)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE verify_token = ? AND is_active = 0", [$verifyToken])->fetch();
        if ($user) {
            $db->update('users', ['is_active'], [1], $user->id);
            $this->redirect('login');
        } else {
            $this->back();
        }
    }

    protected function redirect($url)
    {
        header("Location: " . trim(CURRENT_DOMAIN, '/ ') . "/" . trim($url, '/'));
        exit;
    }

    protected function back()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    private function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function random()
    {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }

    private function activationEmail($username, $verifyToken)
    {
        $emailContent = '
            <h1>فعال سازی حساب کاربری</h1>
            <div>' . $username . ' عزیز</div>
            <p>برای فعال سازی حساب کاربری خود روی لینک زیر کلیک کنید با تشکر</p>
            <div>
                <a href="' . url('activation/' . $verifyToken) . '">فعال کردن حساب کاربری</a>
            </div>
        ';
        return $emailContent;
    }

    private function forgotPasswordEmail($username, $forgotToken)
    {
        $emailContent = '
            <h1>فراموشی رمز عبور</h1>
            <div>' . $username . ' عزیز</div>
            <p>برای تغییر رمز عبور حساب کاربری خود روی لینک زیر کلیک کنید با تشکر</p>
            <div>
                <a href="' . url('reset-password-form/' . $forgotToken) . '">تغییر رمز عبور</a>
            </div>
        ';
        return $emailContent;
    }

    private function sendEmail($emailAddress, $subject, $body)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;//Enable verbose debug output
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();//Send using SMTP
        $mail->Host = MAIL_HOST;//Set the SMTP server to send through
        $mail->SMTPAuth = SMTP_AUTH;//Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;//SMTP username
        $mail->Password = MAIL_PASSWORD;//SMTP password
        $mail->SMTPSecure = 'tls';//Enable implicit TLS encryption
        $mail->Port = MAIL_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom(SENDER_MAIL, SENDER_NAME);
        $mail->addAddress($emailAddress);
        //Content
        $mail->isHTML(true);//Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send();
        echo 'Message has been sent';
        return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}