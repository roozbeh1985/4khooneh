<?php
/*
Template Name: register
*/
session_start();
$_SESSION = array();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}
global $user_ID, $user_identity, $user_level, $registerSuccess;
$registerSuccess = "";
global $redux_demo;
$classieraEmailVerify = $redux_demo['registor-email-verify'];
if (!$user_ID) {
    if ($_POST) {
        $username = $wpdb->escape($_POST['username']);
        $email = $wpdb->escape($_POST['mobile'].'@gmail.com');
        $mobile=$wpdb->escape($_POST['mobile']);
        $password = $wpdb->escape($_POST['pwd']);
        $reshte_tahsili=$wpdb->escape($_POST['reshte_tahsili']);
        $maghta_tahsili=$wpdb->escape($_POST['maghta_tahsili']);
        $confirm_password = $wpdb->escape($_POST['confirm']);
        $remember = 1;
        $registerSuccess = 1;
        $user_kind=$_POST['user_kind'];
        $message = "";
        if (empty($username)) {
            $message = 'نام کاربری نباید خالی باشد';
            $registerSuccess = 0;
        }
        if (isset($email)) {
            if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
                wp_update_user(array('ID' => $user_ID, 'user_email' => $email));

            } else {
                $message = esc_html__('Please enter a valid email.', 'classiera');
            }
            $registerSuccess = 0;
        }
        if ($password) {
            if (strlen($password) < 5 || strlen($password) > 15) {

                $message = "رمز عبور میبایست بین 5 تا 15 حرف انگلیسی باشد";
                $registerSuccess = 0;

            } elseif (isset($password) && $password != $confirm_password) {

                $message = esc_html__('Password Mismatch', 'classiera');

                $registerSuccess = 0;

            } elseif (isset($password) && !empty($password)) {

                $update = wp_set_password($password, $user_ID);
                $message = "ثبت نام با موفقیت انجام شد";
                $registerSuccess = 1;
                //  wp_redirect("پروفایل");
                //   exit;

            }

        }
        if ($registerSuccess == 1) {
            $status = wp_create_user($username, $password, $email);
        }
        if (is_wp_error($status)) {
            $registerSuccess = 0;
            $message = "این نام کاربری وجود دارد، لطفا به حسابتان وارد شوید";
        } else {
            $registerSuccess = 1;
        }

//        if ( $_SESSION['captcha'][code]!= $_POST['capcha']) {
//            $message = 'کد امنیتی اشتباه است';
//            $registerSuccess = 0;
//        }
        if ($registerSuccess == 1) {
            $login_data = array();
            $login_data['user_login'] = $username;
            $login_data['user_password'] = $password;
            $user_verify = wp_signon($login_data, false);
            global $redux_demo;
            $profile = $redux_demo['profile'];
            $user_id = $status;
            add_user_meta($user_id, 'user_kind', "$user_kind");
            add_user_meta($user_id, 'billing_phone', $mobile);
            add_user_meta($user_id, 'mobile', $mobile);
            add_user_meta($user_id, 'reshte_tahsili', $reshte_tahsili);
            add_user_meta($user_id, 'maghta_tahsili', $maghta_tahsili);
            wp_redirect("پروفایل");

            exit;
        } elseif ($registerSuccess == 1) {
            $message = esc_html__('Check Your Inbox for User Name And Password', 'classiera');
        }
    }
}
include("header.php") ?>
    <div>
        <div>
            <div class="ck-page-container ">

                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">

                        </div>
                        <article class="ck-page-article">

                            <div class="">
                                <div class="ry-article container-fluid">
                                    <article class="ry-article-content">

                                        <div class="container ry-register-content">

                                            <div class="col-lg-7 ry-login-content">

                                                <div class="ry-login-header">
                                                    <h3 class="text-center">ثبت نام در چهارخونه</h3>
                                                    <p class="text-center">در سایت چهارخونه ثبت نام نمایید و وارد پنل
                                                        کاربری خود بشوید</p>
                                                </div>
                                                <form data-abide id="myform" action="" method="POST"
                                                      enctype="multipart/form-data"
                                                      class="form-group ry-register-form">
                                                    <div class="ry-padding">
                                                        <div class="clear"></div>
                                                        <h3 class="ry-error-register"><?php echo $message; ?></h3>
                                                        <div id="one">
                                                            <div class="ry-form-group col-lg-12">
                                                                <label class="float-right">نام کاربری(انگلیسی)</label>
                                                                <input id="username" class="float-left form-control"
                                                                       type="text" name="username" required>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="clear"></div>

                                                            <div class="clear"></div>
                                                            <div class="ry-form-group col-lg-12">
                                                                <label class="float-right">موبایل</label>
                                                                <input class="float-left form-control" type="tel"
                                                                       id="mobile" name="mobile" required>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div id="three">
                                                            <div class="ry-form-group col-lg-12">
                                                                <label class="float-right">ثبت نام به عنوان</label>
                                                                <select name="user_kind" id="user_kind" class="float-left form-control">
                                                                    <option value="student">دانش آموز</option>
                                                                    <option value="teacher">استاد</option>
                                                                </select>
                                                            </div>
                                                            <div class="ry-form-group col-lg-12">
                                                                <label class="float-right">رشته تحصیلی</label>
                                                                <select name="reshte_tahsili" id="reshte_tahsili" class="float-left form-control">
                                                                    <option >شبکه و نرم افزار رایانه</option>
                                                                    <option>حسابداری</option>
                                                                    <option>معماری</option>
                                                                    <option>الکتروتکنیک</option>
                                                                    <option>مکانیک خودرو</option>
                                                                    <option>تربیت بدنی</option>
                                                                    <option>گرافیک</option>
                                                                    <option>تاسیسات</option>
                                                                    <option>الکترونیک</option>
                                                                    <option>صنایع غذای</option>
                                                                    <option>متالورژی</option>
                                                                    <option>صنایع فلزی</option>
                                                                    <option>طراحی دوخت</option>
                                                                    <option>چاپ</option>
                                                                    <option>ساختمان</option>
                                                                    <option>صنایع چوب</option>
                                                                    <option>سایر</option>
                                                                </select>
                                                            </div>
                                                            <div class="ry-form-group col-lg-12">
                                                                <label class="float-right">پایه تحصیلی</label>
                                                                <select name="maghta_tahsili" id="maghta_tahsili" class="float-left form-control">
                                                                    <option >دهم</option>
                                                                    <option>یازدهم</option>
                                                                    <option>دوازدهم</option>
                                                                    <option>کاردانی به کارشناسی</option>
                                                                    <option>سایر</option>

                                                                </select>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="ry-form-group col-lg-12">
                                                                <label class="float-right">رمز عبور</label>
                                                                <input id="password" class="float-left form-control"
                                                                       type="password" name="pwd" required>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="ry-form-group col-lg-12">
                                                                <label class="float-right">تکرار رمز عبور</label>
                                                                <input id="confirm" class="float-left form-control"
                                                                       type="password" name="confirm" required>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="clear"></div>
                                                            <div class="ry-form-group col-lg-12 ry-padding-0">
                                                                <div class="d-none ry-form-group col-lg-12 ry-capcha">
                                                                    <div class="col-8 float-right">
                                                                        <label class="float-right">کد امنیتی</label>
                                                                        <input class=" form-control" type="text"
                                                                               id="cap" name="capcha" required>
                                                                    </div>
                                                                    <div class="col-4 float-right">
                                                                        <?php echo '<img src="' . get_home_url() . '' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="col-lg-12  ry-padding-0">
                                                                    <input id="ry-submit" type="button"
                                                                           class="ry-btn-submit" value="ثبت">
                                                                    <script>
                                                                        $("#ry-submit").click(function () {
                                                                            var username = $("#username").val();
                                                                            var familyname = $("#familyname").val();
                                                                            var telephone = $("#telephone").val();
                                                                            var mobile = $("#mobile").val();
                                                                            var password = $("#password").val();
                                                                            var confirm = $("#confirm").val();
                                                                            if (username.length < 5) {
                                                                                $(".ry-error-register").html("نام کاربری با طول مناسب انتخاب نمایید")
                                                                            }
                                                                            else if (password.length < 5) {
                                                                                $(".ry-error-register").html("رمز عبور میبایست بین 5 تا 15 کاراکتر باشد")
                                                                            }
                                                                            else if (password != confirm) {
                                                                                $(".ry-error-register").html("تکرار رمز عبور صحیح نمی باشد")
                                                                            }
                                                                            else {
                                                                                $("#myform").submit();
                                                                            }
                                                                        });
                                                                    </script>
                                                                </div>

                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                    <div class="ry-login-header text-center">
                                                        <div class="ry-login-footer">
                                                            <p class="text-center float-right">اگر کاربر چهارخونه
                                                                هستید </p>
                                                            <p class="float-right"><a
                                                                        href="<?php bloginfo("url") ?>/ورود">وارد سایت
                                                                    شوید</a></p>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <script>
                                                    $(".marhale1").click(function () {
                                                        var username = $("#username").val();
                                                        var familyname = $("#familyname").val();
                                                        var telephone = $("#telephone").val();
                                                        var email = $("#email").val();
                                                        if (username.length < 5) {
                                                            $(".ry-error-register").html("نام کاربری با طول مناسب انتخاب نمایید")
                                                        }
                                                        else if (familyname.length < 4) {
                                                            $(".ry-error-register").html("نام و نام خانواگی را صحیح انتخاب نمایید")
                                                        }
                                                        else if (email.length < 4) {
                                                            $(".ry-error-register").html("ایمیل صحیح وارد نمایید")
                                                        }
                                                        else {
                                                            $(".ry-error-register").html("");
                                                            $("#one").slideUp();
                                                            $("#two").slideDown();
                                                            $(".ry-secend").addClass("ry-progress-active");
                                                        }
                                                    });
                                                    $(".marhale2").click(function () {
                                                        var khadamatname = $("#khadamatname").val();
                                                        var province = $("#province").val();

                                                        if (province == "0") {
                                                            $(".ry-error-register").html("استان و شهر خود را وارد نمایید");
                                                        }
                                                        else {
                                                            $(".ry-error-register").html("");
                                                            $("#two").slideUp();
                                                            $("#three").slideDown();
                                                            $(".ry-thierd").addClass("ry-progress-active");
                                                        }
                                                    });
                                                    $(".ghabl1").click(function () {
                                                        $(".ry-error-register").html("");
                                                        $("#two").slideUp();
                                                        $("#one").slideDown();
                                                        $(".ry-secend").removeClass("ry-progress-active");
                                                    });
                                                </script>
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