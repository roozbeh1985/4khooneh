<?php
/*
Template Name: loginpage
*/
if (is_user_logged_in()) {
    global $redux_demo;
    $profile = $redux_demo['profile'];
    wp_redirect(home_url());
    exit;
}
global $user_ID, $username, $password, $remember;
//We shall SQL escape all inputs
$username = esc_sql(isset($_REQUEST['username']) ? $_REQUEST['username'] : '');
$password = esc_sql(isset($_REQUEST['password']) ? $_REQUEST['password'] : '');
$remember = esc_sql(isset($_REQUEST['rememberme']) ? $_REQUEST['rememberme'] : '');
if ($remember) $remember = "true";
else $remember = "false";
$login_data = array();
$login_data['user_login'] = $username;
$login_data['user_password'] = $password;
$login_data['remember'] = $remember;
$user_verify = wp_signon($login_data, false);
if (is_wp_error($user_verify)) {
    $error_string = $user_verify->get_error_message();
    $UserError = esc_html__('نام کاربری اشتباه است');
} else {
    global $redux_demo;
    wp_redirect(home_url()."/پروفایل/");
    exit;
}
global $redux_demo;
$login = $redux_demo['login'];
$rand1 = rand(0, 9);
$rand2 = rand(0, 9);
$rand_answer = $rand1 + $rand2;
global $resetSuccess;
if (!$user_ID) {
    if (isset($_POST['submit'])) {
        // First, make sure the email address is set
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            // Next, sanitize the data
            $email_addr = trim(strip_tags(stripslashes($_POST['email'])));
            $user = get_user_by('email', $email_addr);
            $user_ID = $user->ID;
            if (!empty($user_ID)) {
                $new_password = wp_generate_password(12, false);
                if (isset($new_password)) {
                    wp_set_password($new_password, $user_ID);
                    $message = esc_html__('Check your email for new password.', 'classiera');
                    $from = get_option('admin_email');
                    $headers = 'From: ' . $from . "\r\n";
                    $subject = "Password reset!";
                    $msg = "Reset password.\nYour login details\nNew Password: $new_password";
                    wp_mail($email_addr, $subject, $msg, $headers);
                    $resetSuccess = 1;
                }
            } else {
                $message = esc_html__('There is no user available for this email.', 'classiera');
            } // end if/else
        } else {
            $message = esc_html__('Email should not be empty.', 'classiera');
        }
    }
}
?>
<?php include("header.php") ?>

    <div>
        <div>
            <div class="ck-page-container ">

                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                        </div>
                        <article class="ck-page-article">

                            <div class="">
                                <div class="ry-article container">
                                    <article class="ry-article-content">
                                        <div class="container ry-register-content text-right">
                                            <div class="col-lg-7 ry-login-content">
                                                <div class="ry-login-header">
                                                    <h3 class="text-center">ورود به سایت انتشارات چهارخونه</h3>
                                                    <p class="text-center">به سایت انتشارات چهارخونه وارد بشوید و وارد پنل کاربری خود بشوید</p>
                                                </div>
                                                <form class="form-group ry-register-form" action="" id="myform" method="POST"
                                                      enctype="multipart/form-data" data-abide>
                                                    <div class="ry-padding">
                                                        <h3 class="ry-error-register"><?php echo $error_string; ?></h3>
                                                        <div class="ry-form-group col-lg-12">
                                                            <label class="">نام کاربری یا ایمیل</label>
                                                            <input class=" form-control" type="text" name="username">
                                                        </div>
                                                        <div class="ry-form-group col-lg-12">
                                                            <label class="">رمز عبور</label>
                                                            <input class=" form-control" type="password" name="password">
                                                        </div>
                                                        <div class="ry-form-group col-lg-12 ry-padding-0 ry-form-group">
                                                            <div class="col-lg-12 float-right ry-padding-0 ">
                                                                <input type="submit" class="ry-btn-submit" value="ورود">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="ry-login-header">
                                                        <p class="text-center"><span>اگر رمز عبور خود را فراموش کردید</span><span><a href="<?php bloginfo('url') ?>/my-account/lost-password/">رمز عبورتان را بازنشانی نمایید</a></span></p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </article>
                        <div class="clear"></div>
                        <?php include("ck-footer-pages.php"); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php include("footer.php") ?>