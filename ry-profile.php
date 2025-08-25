<?php
/*
Template Name: ry-profile
*/
global $user_ID;
$user_id = get_current_user_id();
if (!is_user_logged_in()) {
    wp_redirect('ثبت-نام');
    exit;
}
if (isset($_POST['rysubmit'])) {
    if (!update_user_meta($user_id, 'instagram', $_POST['instagram'])) {
        add_user_meta($user_id, 'instagram', $_POST['instagram']);
    }
    if (!update_user_meta($user_id, 'aparat', $_POST['aparat'])) {
        add_user_meta($user_id, 'aparat', $_POST['aparat']);
    }
    if (!update_user_meta($user_id, 'telegram', $_POST['telegram'])) {
        add_user_meta($user_id, 'telegram', $_POST['telegram']);
    }
    if (!update_user_meta($user_id, 'website', $_POST['website'])) {
        add_user_meta($user_id, 'website', $_POST['website']);
    }
    if (!update_user_meta($user_id, 'phone', $_POST['phone'])) {
        add_user_meta($user_id, 'phone', $_POST['phone']);
    }
    if (!update_user_meta($user_id, 'mobile', $_POST['mobile'])) {
        add_user_meta($user_id, 'mobile', $_POST['mobile']);
    }
    if (!update_user_meta($user_id, 'telephone', $_POST['telephone'])) {
        add_user_meta($user_id, 'telephone', $_POST['telephone']);
    }
    if (!update_user_meta($user_id, 'nickname', $_POST['nickname'])) {
        add_user_meta($user_id, 'nickname', $_POST['nickname']);
    }
    if (!update_user_meta($user_id, 'about-us', $_POST['about-us'])) {
        add_user_meta($user_id, 'about-us', $_POST['about-us']);
    }
    if (!update_user_meta($user_id, 'reshte_tahsili', $_POST['reshte_tahsili'])) {
        add_user_meta($user_id, 'reshte_tahsili', $_POST['reshte_tahsili']);
    }
    if (!update_user_meta($user_id, 'maghta_tahsili', $_POST['maghta_tahsili'])) {
        add_user_meta($user_id, 'maghta_tahsili', $_POST['maghta_tahsili']);
    }
    if (!update_user_meta($user_id, 'madrese', $_POST['madrese'])) {
        add_user_meta($user_id, 'madrese', $_POST['madrese']);
    }
    if (!update_user_meta($user_id, 'ostan', $_POST['ostan'])) {
        add_user_meta($user_id, 'ostan', $_POST['ostan']);
    }
    if (!update_user_meta($user_id, 'shahr', $_POST['shahr'])) {
        add_user_meta($user_id, 'shahr', $_POST['shahr']);
    }
}
include("header.php") ?>
    <div>
        <div>
            <div class="ck-page-container ry-proffile">

                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <?php include("sidbar-profile.php") ?>
                        </div>
                        <article class="ck-page-article ry-prof">

                            <div class="container">

                                <div class="col-lg-12 ">
                                    <form class="" data-abide id="myform" action="" method="POST"
                                          enctype="multipart/form-data">
                                        <div class="col-lg-12 ry-chanel">
                                            <h4 class="text-right">اطلاعات من</h4>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-12 ry-khadamatdahande-social float-right">
                                                <div class="col-lg-12">
                                                    <i class="fa fa-user float-right"></i>
                                                    <input id="instagram" name="nickname" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="نام مستعار" <?php if ($instaaa = get_user_meta($user_id, 'nickname', true)) echo "value='$instaaa'" ?> >
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-12 ry-khadamatdahande-social float-right">
                                                <div class="col-lg-12">
                                                    <i class="fa fa-layer-group float-right"></i>
                                                    <?php
                                                    $reshte_tahsili[0] = 'no';
                                                    if (get_user_meta($user_id, 'reshte_tahsili', true)) {
                                                        $reshte_tahsili = get_user_meta($user_id, 'reshte_tahsili', true);
                                                    }
                                                    ?>

                                                    <select name="reshte_tahsili" id="reshte_tahsili"
                                                            class="float-left form-control">
                                                        <option <?php if ($reshte_tahsili == 'no') echo 'selected="selected"'; ?> >
                                                            لطفا رشته خود را وارد نمایید
                                                        </option>
                                                        <option <?php if ($reshte_tahsili== 'شبکه و نرم افزار رایانه') echo 'selected="selected"' ;?> >
                                                            شبکه و نرم افزار رایانه
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'حسابداری') echo 'selected="selected"'; ?>>
                                                            حسابداری
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'معماری') echo 'selected="selected"'; ?>>
                                                            معماری
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'الکتروتکنیک') echo 'selected="selected"' ;?>>
                                                            الکتروتکنیک
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'مکانیک خودرو') echo 'selected="selected"'; ?>>
                                                            مکانیک خودرو
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'تربیت بدنی') echo 'selected="selected"' ;?>>
                                                            تربیت بدنی
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'گرافیک') echo 'selected="selected"' ;?>>
                                                            گرافیک
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'تاسیسات') echo 'selected="selected"'; ?>>
                                                            تاسیسات
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'الکترونیک') echo 'selected="selected"'; ?>>
                                                            الکترونیک
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'صنایع غذای') echo 'selected="selected"'; ?>>
                                                            صنایع غذای
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'متالورژی') echo 'selected="selected"'; ?>>
                                                            متالورژی
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'صنایع فلزی') echo 'selected="selected"' ;?>>
                                                            صنایع فلزی
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'طراحی دوخت') echo 'selected="selected"' ;?>>
                                                            طراحی دوخت
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'چاپ') echo 'selected="selected"' ;?>>
                                                            چاپ
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'ساختمان') echo 'selected="selected"' ;?>>
                                                            ساختمان
                                                        </option>
                                                        <option <?php if ($reshte_tahsili == 'صنایع چوب') echo 'selected="selected"'; ?>>
                                                            صنایع چوب
                                                        </option>
                                                        <option <?php if ($reshte_tahsili== 'سایر') echo 'selected="selected"' ;?>>
                                                            سایر
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-12 ry-khadamatdahande-social float-right">
                                                <div class="col-lg-12">
                                                    <i class="fa fa-book float-right"></i>
                                                    <?php
                                                    $maghta_tahsili[0] = 'no';
                                                    if (get_user_meta($user_id, 'maghta_tahsili', true)) {
                                                        $maghta_tahsili = get_user_meta($user_id, 'maghta_tahsili', true);
                                                    }
                                                    ?>

                                                    <select name="maghta_tahsili" id="reshte_tahsili"
                                                            class="float-left form-control">
                                                        <option <?php if ($maghta_tahsili == 'no') echo 'selected="selected"'; ?>>مقطع تحصیلی خود را انتخاب نمایید</option>
                                                        <option <?php if ($maghta_tahsili == 'دهم') echo 'selected="selected"'; ?>>دهم</option>
                                                        <option <?php if ($maghta_tahsili == 'یازدهم') echo 'selected="selected"'; ?>>یازدهم</option>
                                                        <option <?php if ($maghta_tahsili == 'دوازدهم') echo 'selected="selected"'; ?>>دوازدهم</option>
                                                        <option <?php if ($maghta_tahsili == 'کاردانی به کارشناسی') echo 'selected="selected"'; ?>>کاردانی به کارشناسی</option>
                                                        <option <?php if ($maghta_tahsili == 'سایر') echo 'selected="selected"'; ?>>سایر</option>
                                                    </select>
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-12 ry-khadamatdahande-social float-right">
                                                <div class="col-lg-12">
                                                    <i class="fa fa-school float-right"></i>
                                                    <input id="madrese" name="madrese" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="نام مدرسه" <?php if ($instaaa = get_user_meta($user_id, 'madrese', true)) echo "value='$instaaa'" ?> >
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-12 ry-khadamatdahande-social float-right">
                                                <div class="col-lg-12">
                                                    <i class="fa fa-globe float-right"></i>
                                                    <input id="ostan" name="ostan" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="استان خود را بنویسید" <?php if ($instaaa = get_user_meta($user_id, 'ostan', true)) echo "value='$instaaa'" ?> >
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-12 ry-khadamatdahande-social float-right">
                                                <div class="col-lg-12">
                                                    <i class="fa fa-city float-right"></i>
                                                    <input id="shahr" name="shahr" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="شهر خود را بنویسید" <?php if ($instaaa = get_user_meta($user_id, 'shahr', true)) echo "value='$instaaa'" ?> >
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="clear"></div>
                                        </div>

                                        <div class="col-lg-12 ry-chanel">
                                            <h4 class="text-right">کانال های ارتباطی</h4>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-6 ry-khadamatdahande-social float-right">
                                                <div class="col-lg-12">
                                                    <i class="fab fa-instagram float-right"></i>

                                                    <input id="instagram" name="instagram" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="اینستاگرام" <?php if ($instaaa = get_user_meta($user_id, 'instagram', true)) echo "value='$instaaa'" ?> >
                                                </div>
                                                <div class="clear"></div>
                                                <div class="col-lg-12">
                                                    <img src="<?php bloginfo('template_url'); ?>/img/aparat.png"
                                                         class="float-right">
                                                    <input id="aparat" name="aparat" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="آپارات" <?php if ($apar = get_user_meta($user_id, 'aparat', true)) echo "value='$apar'" ?>>
                                                </div>
                                                <div class="clear"></div>
                                                <div class="col-lg-12">
                                                    <i class="fab fa-telegram float-right"></i>
                                                    <input id="telegram" name="telegram" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="تلگرام" <?php if ($tel = get_user_meta($user_id, 'telegram', true)) echo "value='$tel'" ?> >
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="col-lg-6 ry-khadamatdahande-social float-right">
                                                <div class="col-lg-12">
                                                    <label class="float-right">وب سایت</label>
                                                    <input id="website" name="website" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="وب سایت" <?php if ($webb = get_user_meta($user_id, 'website', true)) echo "value='$webb'" ?> >
                                                </div>
                                                <div class="clear"></div>
                                                <div class="col-lg-12">
                                                    <label class="float-right">تلفن ثابت</label>
                                                    <input id="telephone" name="telephone" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="تلفن ثابت"
                                                           value="<?php echo get_user_meta($user_id, "telephone", 0)[0]; ?>">
                                                </div>
                                                <div class="clear"></div>
                                                <div class="col-lg-12">
                                                    <label class="float-right">تلفن همراه</label>
                                                    <input id="mobile" name="mobile" type="text"
                                                           class="form-control float-left text-right"
                                                           placeholder="تلفن همراه"
                                                           value="<?php echo get_user_meta($user_id, "mobile", 0)[0]; ?>">
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-12 ry-chanel">
                                            <h4 class="text-right">درباره من</h4>
                                        </div>

                                        <div class=" col-lg-12 ry-abouus-edit-text">
            <textarea dir="rtl" id="about-us" name="about-us" class="text-right froala-editor form-control"
                      placeholder="در این قسمت هرچه میخواهید در مورد خودتان بنویسید"><?php if ($instaaa = get_user_meta($user_id, 'about-us', true)) echo $instaaa ?></textarea>
                                        </div>
                                        <div class="col-lg-12 ">
                                            <div class="col-lg-2">
                                                <input type="submit" class="ry-btn-submit" id="ry-profile-submit"
                                                       value="ثبت" name="rysubmit">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="clear"></div>
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