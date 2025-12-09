<!DOCTYPE html>
<html lang="fa-IR">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-85TD7Y1BB7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-85TD7Y1BB7');
    </script>
    <meta charset="UTF-8">
    <title><?php wp_title(''); ?></title>
    <meta name="author" content="roozbeh yeganeh 09125871319" />
    <meta name="Resource-type" content="Document" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ck-menustyle.css?v=1.0.0.4">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/examples.css?v=1.0.0.2" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css?v=1.9.4.083">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/swiper/css/swiper.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.lazy.min.js"></script>
    <link rel="icon" type="image/x-icon" href="https://4khooneh.org/favicon.ico">

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TW9C7H4M');</script>
    <!-- End Google Tag Manager -->
    <script>
        !function (t, e, n) {
            t.yektanetAnalyticsObject = n, t[n] = t[n] || function () {
                t[n].q.push(arguments)
            }, t[n].q = t[n].q || [];
            var a = new Date, r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(),
                c = e.getElementsByTagName("script")[0], s = e.createElement("script");
            s.id = "ua-script-OcDGDnhw"; s.dataset.analyticsobject = n; s.async = 1; s.type = "text/javascript";
            s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v3/OcDGDnhw/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c)
        }(window, document, "yektanet");
    </script>
    <!--[if IE]>
    <script type="text/javascript">
        var console = {
            log: function () {
            }
        };
    </script>
    <![endif]-->


    <?php wp_head(); ?>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/risponsive.css?v=1.3.1.56">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111352272-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-111352272-1');
    </script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TW9C7H4M"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->
    <header class="ck-header">

        <input type="text" class="d-none" id="ry-locate" value="<?php bloginfo('url') ?>">
        <div class="menubar" id="menu">
            <div class="menu-wrapper">
                <ul class="nav">
                    <li style="margin-top: 7px; margin-left: 11px;height: 37px; cursor: pointer" class="ck-active-menu">
                        <i class="fa fa-home ck-home" aria-hidden="true"></i>
                    </li>
                    <?php
                    $menu = "menu";
                    $menu_item = array();
                    $menu1 = array();
                    $sub_menu1 = array();
                    $menu_item = wp_get_menu_array($menu);
                    $i = 0;
                    $n = 0;
                    $z = 0;
                    $l = 0;
                    foreach ($menu_item as $x => $x_value) {
                        $menu1[$i] = $x;
                        ?>
                        <?php if ($menu_item[$menu1[$i]]["title"]) { ?>
                            <li>
                                <a
                                    href="<?php echo $menu_item[$menu1[$i]]["url"]; ?>"><?php echo $menu_item[$menu1[$i]]["title"]; ?></a>
                                <div class="layer2" <?php
                                if (($menu_item[$menu1[$i]]["title"] == "هنرستان") || ($menu_item[$menu1[$i]]["title"] == "آزمون استخدامی") || ($menu_item[$menu1[$i]]["title"] == "دانشگاه فرهنگیان") || ($menu_item[$menu1[$i]]["title"] == "آزمون آنلاین")) {
                                    ?> id="ck-big-menu" <?php
                                }
                                ?>>
                                    <div class="nav-column">
                                        <ul class="nav inner">
                                            <?php
                                            foreach ($menu_item[$x]["children"] as $y => $y_value) {
                                                $sub_menu1[$n] = $y;
                                                ?>
                                                <li>
                                                    <?php $ssm = ($menu_item[$x]["children"][$y]["ID"]); ?>
                                                    <a
                                                        href="<?php echo ($menu_item[$x]["children"][$y]["url"]); ?>"><?php echo ($menu_item[$x]["children"][$y]["title"]); ?></a>
                                                    <?php if (($menu_item[$menu1[$i]]["title"] == "هنرستان") || ($menu_item[$menu1[$i]]["title"] == "کارشناسی ناپیوسته") || ($menu_item[$menu1[$i]]["title"] == "آزمون آنلاین")) { ?>
                                                        <?php if ($menu_item[$ssm]["children"]) { ?>
                                                            <?php foreach ($menu_item[$ssm]["children"] as $y2 => $y2_value) {
                                                                $sub_sub_menu1[$z] = $y2; ?>
                                                                <ul>
                                                                    <li>
                                                                        <a
                                                                            href="<?php echo ($menu_item[$ssm]["children"][$y2]["url"]); ?>"><?php echo ($menu_item[$ssm]["children"][$y2]["title"]); ?></a>
                                                                    </li>
                                                                </ul>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </li>

                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="ck-mobile-menu">
                <i style="font-size: 33px; color: black;" class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="ck-logo">
                <a href="<?php bloginfo('url'); ?>"> <img alt="4khooneh"
                        src="<?php bloginfo('url'); ?>/img/ck-logo.png"></a>
            </div>
            <div class="ck-left-header col-lg-3">
                <ul>
                    <li><a style="color: red" href="<?php bloginfo('url'); ?>/سوالات-متداول">سوالات متداول</a></li>

                    <li><a href="<?php bloginfo('url'); ?>/مشاوره-های-هنرستان/">مشاوره</a></li>
                    <li><a href="<?php bloginfo('url'); ?>/نمایندگی-های-فروش">نمایندگی‌ها</a></li>
                </ul>
            </div>
            <?php
            if ($live = get_post_meta(747, 'live', true)) {
                $live = unserialize($live);

                ?>

                <a href="<?php bloginfo('url') ?>/<?php echo $live[1] ?>">
                    <div class="ry-liveee">
                        <div class="img-container-live">
                            <img src="<?php bloginfo('url') ?>/<?php echo $live[0] ?>">
                        </div>
                        <div class="ry-live-text">
                            زنده
                        </div>
                    </div>
                </a>
                <?php
            }
            ?>

            <div class="ck-basket-content">
                <div class="ck-seach">
                    <a href="<?php bloginfo('url'); ?>/cart" class="ry-sabad-kharid float-left">
                        <i class="fas fa-shopping-cart float-right"></i>
                        <span id="total-basket"
                            class="float-right"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        <div class="clear"></div>
                    </a>
                </div>
                <div class="ck-in-baskets ry-register-info">
                    <div class="ry-login">
                        <?php
                        if (is_user_logged_in()) {
                            ?>
                            <a href="<?php echo wp_logout_url(home_url()); ?>">
                                <button class="ry-btn-login">خروج از حساب</button>
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php bloginfo('url') ?>/ورود-به-سایت/?login=true">
                                <button class="ry-btn-login">ورود پنل کاربری</button>
                            </a>
                            <span>کاربر جدید هستید؟</span>
                            <a href="<?php bloginfo('url') ?>/ثبت-نام" class="ry-register-a">ثبت نام</a>
                            <?php
                        }
                        ?>
                        <?php
                        if (is_user_logged_in()) {
                            ?>
                            <div class="ry-profile-btn text-right"><i class="fa fa-user"></i>
                                <a href="<?php bloginfo('url') ?>/پروفایل/">پروفایل من</a>
                            </div>
                            <div class="ry-profile-btn text-right"><i class="fa fa-chalkboard-teacher"></i>
                                <a href="<?php bloginfo('url') ?>/کلاس-های-من/">کلاس های آنلاین من</a>
                            </div>
                            <div class="ry-profile-btn text-right"><i class="fa fa-download"></i>
                                <a href="<?php bloginfo('url') ?>/my-account/downloads/">دانلود های من</a>
                            </div>
                            <div class="ry-profile-btn text-right"><i class="fa fa-shopping-basket"></i>
                                <a href="<?php bloginfo('url') ?>/my-account/orders/">سفارش های من</a>
                            </div>
                            <div class="ry-profile-btn text-right"><i class="fa fa-pen"></i>
                                <a href="<?php bloginfo('url') ?>/my-account/edit-account/">ویرایش مشخصات</a>
                            </div>
                            <div class="ry-profile-btn text-right"><i class="fa fa-location-arrow"></i>
                                <a href="<?php bloginfo('url') ?>/my-account/edit-address/">ویرایش آدرس</a>
                            </div>
                            <div class="ry-profile-btn text-right"><i class="fa fa-image"></i>
                                <a href="<?php bloginfo('url') ?>/تغییر-تصویر/">ویرایش تصویر</a>
                            </div>

                            <?php
                        } else {
                            ?>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="ck-seach-container">
                <div class="ck-seach">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <div class="ck-search-form">
                    <input id="ry-key"
                        class="form-control ry-search-input float-right ry-search-form-header form-control" type="text"
                        placeholder="خدمات یا محصولات مورد نظر خود را جستجو کنید ...">
                    <div id="ry-search-show"></div>
                    <span class="ry-search-button ry-search-button float-right"><i class="fa fa-search"></i></span>
                    <div class="clear"></div>
                </div>
                <script type="text/javascript">
                    $('#ry-key').keyup(function () {
                        if (this.value.length < 3) return;
                        /* code to run below */
                        $("#ry-search-show").slideDown("fast");
                        fetchrz();
                        $('#output').val(this.value);
                    });

                    function fetchrz() {
                        jQuery.ajax({
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            type: 'post',
                            data: { action: 'data_fetch', keyword: jQuery('#ry-key').val() },
                            beforeSend: function () {
                                $('#ry-search-show').html(' <i class="fa fa-spinner ry-spin"></i>');
                            },
                            success: function (data) {
                                jQuery('#ry-search-show').html(data);
                            }
                        });
                    }

                    $(".fa-search").click(function () {
                        $("#ry-search-show").slideUp("fast");
                    });
                </script>
            </div>
            <script>
                //-------------------------search div----------------------
                $(".fa-search").click(function () {
                    var disp = $(".ck-seach-container").find(".ck-search-form").css("display");
                    // alert (disp);
                    if (disp === "none") {
                        $(".ck-seach-container").find(".ck-search-form").slideDown();
                    }
                    else {
                        $(".ck-seach-container").find(".ck-search-form").slideUp();
                    }
                })
            </script>
            <div class="clear"></div>
        </div>
        <div class="ck-moblie-item">
            <!-----------menu level 2--------->
            <?php
            if (is_user_logged_in()) {
                ?>
            <a href="<?php bloginfo('url') ?>/پروفایل/">
                <button class="ry-btn-login ry-green">مشاهده پروفایل</button>
            </a>
            <a href="<?php echo wp_logout_url(home_url()); ?>">
                <button class="ry-btn-login ry-exit">خروج از حساب</button>
            </a>
            <?php
            } else {
                ?>
            <a href="<?php bloginfo('url') ?>/ورود-به-سایت/?login=true">
                <button class="ry-btn-login">ورود به پنل کاربری</button>
            </a>
            <?php
            }
            ?>

            <ul class="ck-mobile-item-container">
                <?php
                $menu = "menu";
                $menu_item = array();
                $menu1 = array();
                $sub_menu1 = array();
                $menu_item = wp_get_menu_array($menu);
                // echo "<pre style='direction: ltr'>";
                //print_r($menu_item);
                //  echo"</pre>";
                $i = 1;
                ?>


                <?php

                foreach ($menu_item as $x => $x_value) {
                    $menu1[$i] = $x;
                    ?>
                <?php if ($menu_item[$menu1[$i]]["title"]) { ?>
                <li class="ck-first"><a href="#"><i class="fa fa-angle-down ck-halat ck-<?php echo $i; ?>"
                            aria-hidden="true"></i>
                        <?php echo $menu_item[$menu1[$i]]["title"]; ?>
                        <i class="fa fa-circle ck-<?php echo $i; ?>" aria-hidden="true"></i>
                    </a>
                    <ul class="ck-menu-level2-container">
                        <?php
                        foreach ($menu_item[$x]["children"] as $y => $y_value) {
                            $sub_menu1[$n] = $y;
                            ?>
                        <li class="ck-menu-level2"><a href="<?php echo ($menu_item[$x]["children"][$y]["url"]); ?>">
                                <?php echo ($menu_item[$x]["children"][$y]["title"]); ?>
                                <i class="fa fa-circle ck-<?php echo $i; ?>" aria-hidden="true"></i>
                            </a></li>
                        <?php $ssm = ($menu_item[$x]["children"][$y]["ID"]); ?>
                        <?php if (($menu_item[$menu1[$i]]["title"] == "هنرستان") || ($menu_item[$menu1[$i]]["title"] == "کارشناسی ناپیوسته")) { ?>

                        <?php if ($menu_item[$ssm]["children"]) { ?>
                        <?php foreach ($menu_item[$ssm]["children"] as $y2 => $y2_value) {
                            $sub_sub_menu1[$z] = $y2; ?>
                        <ul class="ck-">
                            <li>
                                <a href="<?php echo ($menu_item[$ssm]["children"][$y2]["url"]); ?>">
                                    <?php echo ($menu_item[$ssm]["children"][$y2]["title"]); ?>
                                    <i class="fa fa-circle ck-<?php echo $i; ?>" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </li>

                <?php } ?>
                <?php $i++;
                } ?>
                <li class="ck-first"><a href="<?php bloginfo('url') ?>/هنرستان/پایه-دهم/فیلم-آموزشی-پایه-دهم/">
                        فیلم های آموزشی
                        <i class="fa fa-circle ck-6" aria-hidden="true"></i></a>
                </li>


                <li class="ck-first"><a href="<?php bloginfo('url') ?>/سوالات-متداول/">
                        سوالات متداول
                        <i class="fa fa-circle ck-6" aria-hidden="true"></i></a>
                </li>




                <li class="ck-first"><a href="<?php bloginfo('url') ?>/فیلم-آموزش-راهنمای-خرید-اینترنتی/">
                        راهنمای خرید
                        <i class="fa fa-circle ck-2" aria-hidden="true"></i></a>
                </li>

                <li class="ck-first"><a href="<?php bloginfo('url') ?>/تماس-با-ما">
                        تماس با ما
                        <i class="fa fa-circle ck-5" aria-hidden="true"></i></a>
                </li>

                <?php
                if (is_user_logged_in()) {
                    ?>
                <li class="ck-first"><a href="<?php bloginfo('url') ?>/my-account/downloads/">
                        <i class="fa fa-angle-down ck-halat ck-4" aria-hidden="true"></i>دانلود های من
                        <i class="fa fa-circle ck-3" aria-hidden="true"></i></a>
                </li>
                <li class="ck-first"><a href="<?php bloginfo('url') ?>/my-account/orders/">
                        <i class="fa fa-angle-down ck-halat ck-4" aria-hidden="true"></i>سفارش های من
                        <i class="fa fa-circle ck-3" aria-hidden="true"></i></a>
                </li>
                <li class="ck-first"><a href="<?php bloginfo('url') ?>/my-account/edit-account/">
                        <i class="fa fa-angle-down ck-halat ck-4" aria-hidden="true"></i>ویرایش مشخصات
                        <i class="fa fa-circle ck-3" aria-hidden="true"></i></a>
                </li>
                <li class="ck-first"><a href="<?php bloginfo('url') ?>/my-account/edit-address/">
                        <i class="fa fa-angle-down ck-halat ck-4" aria-hidden="true"></i>ویرایش آدرس
                        <i class="fa fa-circle ck-3" aria-hidden="true"></i></a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="ck-moblie-display">
        </div>
        <div class="ck-logo-shadow"></div>

    </header>