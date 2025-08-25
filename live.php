<?php
/*
Template Name: live
*/
include('header.php');
setPostViews(get_the_ID());
global $post;
$user_id = get_current_user_id();
$kind = get_user_meta($user_id, "user_kind", 0)[0];
$email = get_user_meta($user_id, "billing_email", 0)[0];
$customer_email = $email;
$product_ids = get_post_meta($post->ID, 'کد محصول', true);
$product_ids2 = get_post_meta($post->ID, 'کد محصول2', true);
$is_ketab_darsi = 'no';
if (current_user_can('administrator')) {

} elseif (!is_user_logged_in() || $kind != "student") {

} elseif (!wc_customer_bought_product($customer_email, $user_id, $product_ids)) {

}
global $post, $product;
$title = $post->post_title;
//$teache_live_page_id = get_post_meta($post->ID, "صفحه لایو", true);
$teache_live_page_id = $post->ID;
$live_home = get_post_meta($teache_live_page_id, "آدرس ذخیره سازی", true);
//$userNameT = get_user_meta(get_current_user_id(), "billing_first_name", true) . " " . get_user_meta(get_current_user_id(), "billing_last_name", true);
$userNameT = get_user_meta(get_current_user_id(), "nickname", true);

global $wpdb;
?>
    <style>
        @media (min-width: 768px) {
            header, footer {
                display: none;
            }

            main#main {
                background: #4645458a;
                padding-bottom: 10%;
            }
        }

        .ry-right-side {
            border-radius: 0 !important;
        }

        main#main {
            background: #4645458a;
        }

        .ry-right-side {
            padding-bottom: 30%;
            background-color: #464545;
        }

        .ry-right-side .ry-iii i {
            color: #d4af70 !important;
        }

        .sidebars-right .active p, .sidebars-right .active i {
            color: #d19129 !important;
        }

        .float-right {
            float: right !important;
        }

        .ry-f-title {
            font-size: 27px;
            color: #d4af73;
            background: #464545;
            border-radius: 0;
            padding: 11px;
            margin: auto;
            font-weight: bold;
        }

        html {
            margin-top: 0 !important;
        }

        .ry-examss {
            display: none;
        }

        .ry-chat-std {
            background-color: #9b9a9a !important;
            border-radius: 0 !important;
            height: 52px !important;
            margin-bottom: 0px !important;
            padding-right: 0 !important;
            padding-bottom: 0 !important;
        }

        #std-com {
            height: 35px !important;
            width: 100% !important;
        }

        .ry-comments {
            background-color: #464545 !important;
            padding: 0px 7px !important;
            overflow-x: hidden !important;
        }

        .ry-chat-container {
            border: 2px solid #dedede !important;
            background-color: #f1f1f1 !important;
            padding: 3px 0 !important;
            border-radius: 4px !important;
            margin: 10px 0 !important;
        }

        .ry-chat-container img.right {
            float: right: !important;
            margin-left: 20px !important;
            margin-right: 0 !important;
            width: 40px !important;
            height: 40px !important;
            max-width: 60px !important;
            border-radius: 50% !important;
        }

        #animated {
            position: absolute;
            animation: bounce 400s ease-in-out infinite;
            color: #7a7a7a;

        }

        @keyframes bounce {
            0% {
                left: 0;
            }
            50% {
                left: calc(100% - 50px);
            }
            100% {
                left: 0;
            }
        }

        #menu {
            display: none;
        }

        .ryQuality {
            width: 100%;
            font-size: 15px;
            text-align: right;
            margin-top: 2px;
            cursor: pointer;
        }

        .allQuality {
            display: none;
            position: absolute;
            background-color: #1e242c85;
            right: 0;
            bottom: 32px;
            padding: 0;
            text-align: center;
            width: 136px;
        }

        .qualityy {
            cursor: pointer;
        }

        .qualityy {
            cursor: pointer;
        }

        .qualityy:hover {
            background: #7fffd48c;
        }

        .Qactive {
            background: #7fffd48c;
        }

        @media only screen and (max-width: 769px) {
            .video-js .vjs-tech {
                height: auto !important;
            }

            .ry-chat-std {
                border-radius: 0;
                height: 47px;
                margin-bottom: 6px;
                padding-right: 0;
                padding-bottom: 0;

            }

            .ry-commenting-container {
                padding: 0 !important;
            }

            .ry-inp {
                padding-right: 3px;
            }

            .ry-send-btn {
                padding: 1px 21px 0 0 !important;
            }
        }

        #main {

            padding-bottom: 35% !important;
        }
    </style>

    <script>
        var roozbeh;
        var correct = 0;
        var time = 0;

    </script>
    <input type="text" class="d-none" id="ry-locate" value="<?php bloginfo('url') ?>">
    <main id="main" class="pt-0">
        <div class="container-fluid sidebars-right p-0">

            <div class="col-lg-12 col-md-12 p-0 float-right livecontent">
                <article class="col-lg-12 p-0">
                    <div class="col-lg-9 float-right ry-record-teacher text-right p-sm-0">
                        <h3 class="text-center ry-f-title w-100"><?php the_title() ?></h3>
                        <?php if (!is_user_logged_in()) {
                            ?>
                            <div class="col-lg-12 ry-no-log">
                                <p>برای حضور در کلاس میبایست حتما به سایت وارد بشوید</p>
                                <label>اگر در سایت عضو هستید به حساب خود وارد بشوید</label>
                                <a href="<?php bloginfo('url') ?>/ورود-به-سایت">
                                    <button class="btn btn-primary">ورودبه سایت</button>
                                </a><br>
                                <label>اگر در سایت ثبت نام نکرده اید ابتدا ثبت نام نمایید</label>
                                <a href="<?php bloginfo('url') ?>/ثبت-نام">
                                    <button class="btn btn-danger">ثبت نام در سایت</button>
                                </a>
                            </div>
                        <?php
                        } else {
                        $product = wc_get_product($product_ids);
                        $pageId = $post->ID;
                        $user_id = get_current_user_id();
                        $date = date("Y-m-d H:I");

                        $wpdb->get_results("INSERT INTO `atended_student` (`id`, `student_name`, `class_name`, `date`, `pageid`, `user_id`) VALUES (NULL, '$userNameT', '$title', '$date', '$pageId', '$user_id');");

                        $price = $product->get_price();
                        if (!(wc_customer_bought_product($customer_email, $user_id, $product_ids)) && ($price != 0)) {
                        ?>
                            <div class="ck-book-content ry-class-shop">
                                <div class="col-lg-12 float-left ry-p-d-l">
                                    <?php if ($product->is_in_stock()) {
                                        ?>

                                        <div class="ry-p-st <?php if ($is_ketab_darsi == 'ok') echo 'd-none' ?>">
                                            موجود در انبار
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="ry-p-st ry-reed <?php if ($is_ketab_darsi == 'ok') echo 'd-none' ?>">
                                            در انبار موجود نیست
                                        </div>
                                        <?php
                                    } ?>
                                    <div class="col-lg-12 ry-product-detail">
                                        <div class=" ry-p-i text-center">
                                            <h1><?php echo $product->get_title() ?></h1>
                                        </div>
                                        <div class=" text-center col-lg-12 ry-m1  ry-22-mm">
                                            <div class="col-lg-12  float-right">
                                                <a target="_blank ck-pdf">
                                                    <div class="ry-show-content col-lg-12 text-right  ry-fir-d">
                                                        برای شرکت در کلاس نیاز است ابتدا کلاس را خریداری
                                                        نمایید.
                                                    </div>
                                                </a>
                                            </div>
                                            <?php if ($product->get_attribute('tarikh-akharin-chap')) { ?>
                                                <div class="col-lg-4  float-right">
                                                    <div class="ry-show-content col-lg-12 text-right  ry-sec-d">
                                                        <span>تاریخ نشر:</span><span><?php echo $product->get_attribute('tarikh-akharin-chap') ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($product->get_attribute('ghate-ketab')) { ?>
                                                <div class="col-lg-4  float-right">
                                                    <div class="ry-show-content col-lg-12 text-right  ry-th-d">
                                                        <span>قطع کتاب:</span><span><?php echo $product->get_attribute('ghate-ketab') ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($product->get_attribute('paye') && $is_ketab_darsi == "ok") { ?>
                                                <div class="col-lg-4  float-right">
                                                    <div class="ry-show-content col-lg-12 text-right  ry-th-d">
                                                        <span><?php echo $product->get_attribute('paye') ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($product->get_attribute('link-film')) { ?>
                                                <div class="col-lg-12  float-right">
                                                    <a target="_blank ck-pdf"
                                                       href="<?php bloginfo('url') ?>/<?php echo $product->get_attribute('link-film') ?>">
                                                        <div class="ry-show-content col-lg-12 text-right  ry-fir-d">
                                                            مشاهده چند قسمت از فیلم به صورت رایگان
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php } ?>
                                            <div class="clear"></div>
                                        </div>
                                        <?php
                                        if ($is_ketab_darsi != "ok") {
                                            ?>
                                            <div class="col-lg-12 text-right ry-m1">
                                                <span class="float-right ry-v-111">تعداد:</span>
                                                <input type="number" <?php
                                                if ($product->is_sold_individually()) {
                                                    echo 'disabled';
                                                } ?>
                                                       class="form-control float-right col-lg-1  col-3 text-center"
                                                       value="1"
                                                       id="product-number">
                                                <div class="ck-book-image float-left buy_class">
                                                    <!--<img class="lazy" data-src="<?php bloginfo('url'); ?>/img/books/tizhoshan.png"-->
                                                    <div class="ck-frame ry--ry-items">
                                                        <div class="ck-cover back"></div>
                                                        <?php
                                                        $image_id = $product->get_image_id();
                                                        $image_attributes = wp_get_attachment_image_src($image_id);
                                                        $image_attributes[0] = substr($image_attributes[0], 0, strlen($image_attributes[0]) - 12);
                                                        $image_product = $image_attributes[0] . ".jpg";
                                                        $image_link = array();
                                                        $i = 0;
                                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'medium');
                                                        ?>
                                                        <div class="ck-cover ck-itemeees">
                                                            <img id="ry-coovv" class="lazy"
                                                                 alt="<?php the_title(); ?>"
                                                                 src="<?php echo $image[0]; ?>">
                                                        </div>
                                                    </div>
                                                    <script>
                                                        var href = "<?php bloginfo('url') ?>/<?php echo $product->get_attribute('adress-file') ?>";
                                                        $(".ck-frame").find(".page").click(function () {
                                                            // var href = $(".ck-book-content").find(".ck-pdf").attr('href');

                                                            window.open(href);
                                                        });
                                                    </script>
                                                </div>
                                                <div class="clear"></div>

                                            </div>
                                        <?php } else {
                                            ?>
                                            <div class="col-lg-12 text-right ry-m1  ry-mmmm-h"></div>
                                            <span class="ry-v-111">مناسب برای رشته های:</span><br>
                                            <?php
                                            if ($reshte_monaseb = get_post_meta($post->ID, 'مناسب برای رشته ها', true)) {
                                                ?>
                                                <p class="ry-heiiighttt"><?php echo $reshte_monaseb ?></p>
                                                <?php
                                            }

                                        } ?>

                                        <div class="clear"></div>
                                        <hr>
                                        <?php
                                        if ($is_ketab_darsi != "ok") {
                                            ?>

                                            <?php
                                            if ($product->is_type('variable')) {
                                                $d_p = array();
                                                $ii = 0;
                                                $v_id = array();
                                                $r_p = array();
                                            foreach ($product->get_available_variations() as $variation) {
                                                // Variation ID
                                                $variation_id = $variation['variation_id'];
                                                $v_id[$ii] = $variation_id = $variation['variation_id'];
                                                $d_p[$ii] = $variation_display_price = $variation['display_price'];
                                                $r_p[$ii] = $variation_regular_price = $variation['display_regular_price'];
                                                $variation_title = get_the_title($variation['variation_id']);
                                                ?>
                                                <div class="col-lg-12 ry-m1 ry-rrrrr-mmm">
                                                    <p class="col-lg-12 ry-title-buyy">
                                                        <?php

                                                        $tt = "";
                                                        if (strpos($variation_title, "دانلود")) {
                                                            $tt = "دریافت از طریق دانلود";
                                                        } else {
                                                            $tt = "دریافت dvd درب منزل (سه روز کاری)";
                                                        }
                                                        echo $tt;
                                                        ?>
                                                    </p>
                                                    <div class="ry-check float-right">
                                                        <i class="fa fa-check-square"></i>
                                                    </div>
                                                    <div class="ry-check float-right"><i
                                                                class="fa fa-chevron-left"></i>
                                                    </div>
                                                    <div class="ry-price float-right">
                                                        <p class="text-right ry-t1">قیمت:</p>
                                                        <p>
                                                            <span class="ry-p-n"><?php echo number_format($r_p[$ii]) ?></span><span
                                                                    class="ry-p-t">تومان</span>
                                                        </p>
                                                    </div>
                                                    <?php if ((1 - ($product->get_price() / $product->get_regular_price())) != 0) {
                                                        ?>
                                                        <div class="ry-price ry-bargains float-right">
                                                            <p class="text-right ry-t1">تخفیف:</p>

                                                            <p><span class="ry-p-n ry-redd">%</span>
                                                                <span class="ry-p-n ry-redd"><?php echo intval((1 - ((int)($d_p[$ii]) / (int)($r_p[$ii]))) * 100) ?></span>
                                                            </p>
                                                        </div>
                                                        <?php
                                                    } ?>


                                                    <div class="ry-check float-right ry-f-mmmm">
                                                        <i class="fa fa-chevron-left"></i>
                                                    </div>
                                                    <div class="ry-price ry-last-price float-left">
                                                        <p class="text-right ry-t1">قیمت نهایی:</p>

                                                        <p>
                                                            <span class="ry-p-n ry-lp"><?php echo number_format($d_p[$ii]) ?></span>
                                                            <span class="ry-p-t ry-lp">تومان</span>
                                                        </p>

                                                    </div>
                                                    <div class="clear"></div>
                                                    <?php if ($product->is_in_stock()) {
                                                        ?>

                                                        <div class="col-lg-6 float-left ry-addddd text-right">
                                                            <?php
                                                            if ($is_ketab_darsi != "ok") {
                                                                $assest_product = wc_get_product($variation_id);

                                                                ?>
                                                                <!-- injaaaaa -->

                                                                <a href="<?php bloginfo('url') ?>/cart?add-to-cart=<?php echo $product->get_id() ?>">
                                                                    <div class="col-lg-12 ry-m1 ry-btn-add-to-cart ">
                                                                        <span> <i class="fa fa-cart-arrow-down"></i><span
                                                                                    class="ry-a-t-c-t">افزودن به سبد خرید</span> </span>
                                                                    </div>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a href="">
                                                                    <button class=" ry-m1 add-to-cart ry-download-file"
                                                                            onclick="window.open(href);">
                                                            <span> <i class="fa fa-cart-arrow-down"></i><span
                                                                        class="ry-a-t-c-t">دانلود فایل کتاب</span> </span>
                                                                    </button>
                                                                </a>
                                                            <?php } ?>
                                                            <!-- Modal -->
                                                            <div dir="rtl" class="modal fade"
                                                                 id="exampleModalCenter"
                                                                 tabindex="-1" role="dialog"
                                                                 aria-labelledby="exampleModalCenterTitle"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                     role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLongTitle">
                                                                                محصول مورد نظر شما با موفقیت
                                                                                به
                                                                                سبد
                                                                                خریدتان وارد
                                                                                شد.</h5>
                                                                            <button type="button"
                                                                                    class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            آیا میخواهید سبد خرید را مشاهده
                                                                            کنید
                                                                            و خرید
                                                                            را تکمیل
                                                                            نمایید؟
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">خیر
                                                                            </button>
                                                                            <button onclick="setTimeout( delay, 1500 );"
                                                                                    type="button"
                                                                                    class="btn btn-primary">
                                                                                رفتن
                                                                                به سبد خرید
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function delay() {
                                                                    window.location.replace('https://4khooneh.org/cart');
                                                                }
                                                            </script>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="ry-addddd text-right">
                                                            <div class="col-lg-12 ry-m1 ry-btn-add-to-cart ry-disable ">
                                    <span> <i class="fa fa-cart-arrow-down"></i>
                                        <span class="ry-a-t-c-t">غیر موجود</span>
                                    </span>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    } ?>
                                                    <?php
                                                    if ($ii == 0) {
                                                        ?>
                                                        <hr>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                                $ii++;
                                            }
                                                ?>
                                            <input class="d-none" id="product_id" name="product_id"
                                                   value="<?php echo $v_id[0]; ?>">
                                            <?php

                                            } else {
                                            ?>
                                                <div class="col-lg-12 ry-m1">
                                                    <div class="ry-check float-right"><i
                                                                class="fa fa-check-square"></i>
                                                    </div>
                                                    <div class="ry-check float-right"><i
                                                                class="fa fa-chevron-left"></i>
                                                    </div>
                                                    <div class="ry-price float-right">
                                                        <p class="text-right ry-t1">قیمت:</p>
                                                        <?php
                                                        if ($product->is_type('variable')) {
                                                            $d_p = array();
                                                            $ii = 0;
                                                            $r_p = array();
                                                            foreach ($product->get_available_variations() as $variation) {
                                                                // Variation ID
                                                                $variation_id = $variation['variation_id'];
                                                                $d_p[$ii] = $variation_display_price = $variation['display_price'];
                                                                $r_p[$ii] = $variation_regular_price = $variation['display_regular_price'];
                                                                $variation_title = get_the_title($variation['variation_id']);

                                                                $ii++;
                                                            }
                                                            ?>
                                                            <p>
                                                                <span class="ry-p-n"><?php echo number_format($r_p[0]) ?></span><span
                                                                        class="ry-p-t">تومان</span>
                                                            </p>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p>
                                                                <span class="ry-p-n"><?php echo number_format($product->get_regular_price()) ?></span><span
                                                                        class="ry-p-t">تومان</span>
                                                            </p>
                                                        <?php } ?>
                                                    </div>
                                                    <?php if ((1 - ($product->get_price() / $product->get_regular_price())) != 0) {
                                                        ?>
                                                        <div class="ry-price ry-bargains float-right">
                                                            <p class="text-right ry-t1">تخفیف:</p>
                                                            <?php
                                                            if ($product->is_type('variable')) {
                                                                $d_p = array();
                                                                $ii = 0;
                                                                $r_p = array();
                                                                foreach ($product->get_available_variations() as $variation) {
                                                                    // Variation ID
                                                                    $variation_id = $variation['variation_id'];
                                                                    $d_p[$ii] = $variation_display_price = $variation['display_price'];
                                                                    $r_p[$ii] = $variation_regular_price = $variation['display_regular_price'];
                                                                    $variation_title = get_the_title($variation['variation_id']);

                                                                    $ii++;
                                                                }
                                                                ?>
                                                                <p>
                                                                    <span class="ry-p-n ry-redd">%</span><span
                                                                            class="ry-p-n ry-redd"><?php echo intval((1 - ((int)($d_p[0]) / (int)($r_p[0]))) * 100) ?></span>
                                                                </p>

                                                                <?php
                                                            } else {
                                                                ?>
                                                                <p>
                                                                    <span class="ry-p-n ry-redd">%</span><span
                                                                            class="ry-p-n ry-redd"><?php echo intval((1 - ((int)($product->get_price()) / (int)($product->get_regular_price()))) * 100) ?></span>
                                                                </p>
                                                            <?php } ?>

                                                        </div>
                                                        <?php
                                                    } ?>


                                                    <div class="ry-check float-right ry-f-mmmm">
                                                        <i class="fa fa-chevron-left"></i>
                                                    </div>
                                                    <div class="ry-price ry-last-price float-left">
                                                        <p class="text-right ry-t1">قیمت نهایی:</p>

                                                        <p>
                                                            <span class="ry-p-n ry-lp"><?php echo number_format($product->get_price()) ?></span>
                                                            <span class="ry-p-t ry-lp">تومان</span>
                                                        </p>

                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <!-- -->
                                                <div class="clear"></div>
                                            <?php
                                            if ($is_ketab_darsi != "ok") {
                                            ?>
                                            <hr>
                                            <?php } ?>
                                            <?php if ($product->get_attribute('adress-file')) { ?>
                                            <?php
                                            if ($is_ketab_darsi != "ok") {
                                            ?>
                                                <div class="col-lg-6 float-right">
                                                    <p class="author"><i
                                                                class="fa fa-user-edit"></i><span>نویسنده:</span>
                                                        <span><?php echo $product->get_attribute('نویسنده') ?></span>
                                                    </p>
                                                    <div class="author">
                                                        <i class="fa fa-book float-right"></i>
                                                        <span class="float-right">شابک:</span>
                                                        <p class="float-right"><?php echo $product->get_attribute('شابک') ?></p>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            <?php }
                                            } ?>
                                            <?php if ($product->is_in_stock()) {
                                            ?>
                                            <?php
                                            if ($product->is_type('variable')) {
                                            ?>
                                                <div class="col-lg-6 float-right ry-downloa-or-buy ">
                                                    <p class="text-right">نحوه دریافت محصول:</p>
                                                    <select class="form-control" id="download_select">
                                                        <?php
                                                        foreach ($product->get_available_variations() as $variation) {
                                                            // Variation ID
                                                            $variation_id = $variation['variation_id'];
                                                            $variation_display_price = $variation['display_price'];
                                                            $variation_regular_price = $variation['display_regular_price'];
                                                            $variation_title = get_the_title($variation['variation_id']);
                                                            $tt = "";
                                                            if (strpos($variation_title, "دانلود")) {
                                                                $tt = "دریافت از طریق دانلود";
                                                            } else {
                                                                $tt = "دریافت dvd درب منزل (سه روز کاری)";
                                                            }
                                                            echo '<option value="' . $variation_id . '">' . $tt . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <script>
                                                        $("#download_select").change(function () {
                                                            var product_select = $(this).val();
                                                            $('input[name=product_id]').val(product_select);
                                                        });
                                                    </script>
                                                </div>
                                                <?php
                                            }
                                                ?>
                                                <div class="col-lg-6 float-left ry-addddd text-right">
                                                    <?php
                                                    if ($is_ketab_darsi != "ok") {
                                                        ?>

                                                        <a href="<?php bloginfo('url') ?>/cart?add-to-cart=<?php echo $product->get_id() ?>">
                                                            <div class="col-lg-12 ry-m1 ry-btn-add-to-cart ">
                                                                <span> <i class="fa fa-cart-arrow-down"></i><span
                                                                            class="ry-a-t-c-t">افزودن به سبد خرید</span> </span>
                                                            </div>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="">
                                                            <button class=" ry-m1  add-to-cart ry-download-file"
                                                                    onclick="window.open(href);">
                                                            <span> <i class="fa fa-cart-arrow-down"></i><span
                                                                        class="ry-a-t-c-t">دانلود فایل کتاب</span> </span>
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                    <!-- Modal -->
                                                </div>
                                                <div class="clear"></div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="ry-addddd text-right">
                                                    <div class="col-lg-12 ry-m1 ry-btn-add-to-cart ry-disable ">
                                    <span> <i class="fa fa-cart-arrow-down"></i>
                                        <span class="ry-a-t-c-t">غیر موجود</span>
                                    </span>
                                                    </div>
                                                </div>
                                            <?php
                                            } ?>

                                            <?php
                                            if ($product->is_type('variable')) {
                                            $d_p = array();
                                            $ii = 0;
                                            $r_p = array();
                                            $v_id = array();
                                            foreach ($product->get_available_variations() as $variation) {
                                                // Variation ID
                                                $v_id[$ii] = $variation_id = $variation['variation_id'];
                                                $d_p[$ii] = $variation_display_price = $variation['display_price'];
                                                $r_p[$ii] = $variation_regular_price = $variation['display_regular_price'];
                                                $variation_title = get_the_title($variation['variation_id']);

                                                $ii++;
                                            }
                                            ?>
                                            <input class="d-none" id="product_id" name="product_id"
                                                   value="<?php echo $v_id[0]; ?>">

                                            <?php
                                            } else {
                                            ?>
                                                <div dir="rtl" class="modal fade" id="exampleModalCenter"
                                                     tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalCenterTitle"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered"
                                                         role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="exampleModalLongTitle">
                                                                    محصول مورد نظر شما با موفقیت به سبد
                                                                    خریدتان وارد
                                                                    شد.</h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                آیا میخواهید سبد خرید را مشاهده کنید و خرید
                                                                را تکمیل
                                                                نمایید؟
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">خیر
                                                                </button>
                                                                <button onclick="setTimeout( delay, 1500 );"
                                                                        type="button"
                                                                        class="btn btn-primary">رفتن
                                                                    به سبد خرید
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    function delay() {
                                                        window.location.replace('https://4khooneh.org/cart');
                                                    }
                                                </script>
                                            <input class="d-none" id="product_id" name="product_id"
                                                   value="<?php echo $product->get_id(); ?>">
                                            <?php } ?>
                                            <?php } ?>

                                        <?php } ?>
                                        <!--injaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->


                                        <script src='<?php bloginfo('template_url') ?>/js/jq/jquery-ui.min.js'></script>
                                        <script src="<?php bloginfo('template_url') ?>/js/add.js?v=1.0.2.6"></script>

                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <?php
                        if (get_post_meta($teache_live_page_id, 'وضعیت شروع', true) == 'no') {
                        ?>
                            <div class="col-lg-12 ry-no-ready p-0">
                                <link rel="stylesheet"
                                      href="<?php bloginfo('template_url') ?>/flip/flip.min.css">
                                <div dir="ltr" class="tick"
                                     data-did-init="handleTickInit">
                                    <div data-repeat="true"
                                         data-layout="horizontal center fit"
                                         data-transform="preset(d, h, m, s) -> delay">
                                        <div class="tick-group">
                                            <div data-key="value"
                                                 data-repeat="true"
                                                 data-transform="pad(00) -> split -> delay">
                                                <span data-view="flip"></span>
                                            </div>
                                            <span data-key="label"
                                                  data-view="text"
                                                  class="tick-label"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $timer = "Jun 9, 2021 15:0:0";
                                if (get_post_meta($teache_live_page_id, "ساعت", true)) {
                                    $timer = get_post_meta($teache_live_page_id, "ساعت", true);
                                }
                                ?>
                                <input class="d-none" id="ttt" value="<?php echo $timer ?>">
                            </div>
                            <script>
                                var time = $("#ttt").val();

                                time = new Date(time.valueOf() + 1000 * 3600 * 4.5);

                                function handleTickInit(tick) {
                                    var nextYear = (new Date((new Date()).valueOf() + 1000 * 3600 * 4.5)).getFullYear() + 1;
                                    Tick.count.down(time).onupdate = function (value) {
                                        tick.value = value;
                                    };
                                }
                            </script>
                            <script src="<?php bloginfo('template_url') ?>/flip/flip.min.js"></script>
                        <?php
                        }
                        }
                        elseif (get_post_meta($teache_live_page_id, 'وضعیت شروع', true) == 'no') {
                        if ($roffline = get_post_meta($teache_live_page_id, 'آفلاین', true)) {
                        ?>
                            <div class="alert alert-success p-5 text-center mb-0 text-success font-weight-bold"
                                 style="font-size: 15px" role="alert">
                                <a class="text-success" href="<?php echo $roffline ?>">جهت مشاهده نسخه آفلاین جلسه گذشته
                                    روی این لینک کلیک نمایید</a>
                            </div>
                        <?php
                        }
                        ?>
                            <div class="col-lg-12 ry-no-ready p-0">
                                <img src="<?php bloginfo('template_url') ?>/img/waiting.jpg">
                                <link rel="stylesheet"
                                      href="<?php bloginfo('template_url') ?>/flip/flip.min.css">
                                <div dir="ltr" class="tick"
                                     data-did-init="handleTickInit">
                                    <div data-repeat="true"
                                         data-layout="horizontal center fit"
                                         data-transform="preset(d, h, m, s) -> delay">
                                        <div class="tick-group">
                                            <div data-key="value"
                                                 data-repeat="true"
                                                 data-transform="pad(00) -> split -> delay">
                                                <span data-view="flip"></span>
                                            </div>
                                            <span data-key="label"
                                                  data-view="text"
                                                  class="tick-label"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $timer = "Jun 9, 2021 15:0:0";
                                if (get_post_meta($teache_live_page_id, "ساعت", true)) {
                                    $timer = get_post_meta($teache_live_page_id, "ساعت", true);
                                }
                                ?>
                                <input class="d-none" id="ttt" value="<?php echo $timer ?>">
                            </div>
                            <script>
                                var time = $("#ttt").val();
                                time = new Date(time.valueOf() + 1000 * 3600 * 4.5);

                                function handleTickInit(tick) {
                                    var nextYear = (new Date((new Date()).valueOf() + 1000 * 3600 * 4.5)).getFullYear() + 1;
                                    Tick.count.down(time).onupdate = function (value) {
                                        tick.value = value;
                                    };
                                }
                            </script>
                            <script src="<?php bloginfo('template_url') ?>/flip/flip.min.js"></script>
                        <?php
                        }
                        elseif ($offline = get_post_meta($post->ID, 'سیآفلاین', true)){
                        ?>
                            <div class="col-lg-12 position-relative" id="test_video">
                                <link rel="stylesheet" type="text/css"
                                      href="<?php bloginfo('template_url') ?>/plyrio/plyr.css"/>

                                <video preload="auto" controls crossorigin playsinline autoplay id="player"></video>
                                <script
                                        type="text/javascript"
                                        src="<?php bloginfo('template_url') ?>/plyrio/polyfill.min.js"
                                        crossorigin="anonymous"></script>
                                <script type="text/javascript"
                                        src="<?php bloginfo('template_url') ?>/plyrio/plyr.js"></script>
                                <script type="text/javascript"
                                        src="<?php bloginfo('template_url') ?>/plyrio/hls.js@latest"></script>
                                <script>
                                    const player = new Plyr('#player', {
                                        invertTime: false,
                                        autoPlay: true,
                                    });
                                    player.source = {
                                        type: 'video',
                                        title: 'Example title',
                                        tooltips: {controls: true, seek: true},
                                        seekTime: 10,
                                        disableContextMenu: true,
                                        sources: [
                                            {
                                                src: '<?php bloginfo('url') ?>/<?php echo $offline?>',
                                                type: 'video/mp4',
                                                size: 720,
                                            }
                                        ],
                                        controls: ['play-large', 'seek', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen']
                                    };
                                </script>
                            </div>
                        <?php
                        }
                        else {
                        ?>

                            <div class="col-lg-12 position-relative" id="test_video">
                                <?php if ($mob = get_user_meta($user_id, "billing_phone", true)) {
                                    //echo "<p style='z-index: 9;top: 10px;right: 5px;color: white;position: absolute' class='position-absolute'>$mob</p>";
                                    ?>
                                    <input style="display: none" type="text"
                                           value="<?php echo $userNameT . " " . $mob ?>" id="ryMob">
                                    <?php
                                } ?>

                                <link rel="stylesheet" type="text/css"
                                      href="<?php bloginfo('template_url') ?>/plyrio/plyr.css"/>
                                <input class="d-none" id="os"
                                       value="<?php echo get_post_meta($teache_live_page_id, 'نام دوره', true) ?>">
                                <input class="d-none" id="ke"
                                       value="<?php echo get_post_meta($teache_live_page_id, 'شماره جلسه', true) ?>">

                                <link href="<?php bloginfo('template_url') ?>/vjs/video-js.css" rel="stylesheet">


                                <!-- HTML -->
                                <style>
                                    .vjs-play-control, .vjs-mute-control, .vjs-live-display, .vjs-control {
                                        font-size: 10px !important;
                                    }
                                </style>


                                <video id='hls-example' class="video-js vjs-default-skin autoplay w-100"
                                       style="max-height: 100%" controls>
                                    <source type="application/x-mpegURL"
                                            src="https://stream.4khooneh.org/<?php echo get_post_meta($teache_live_page_id, 'نام دوره', true) ?>/<?php echo get_post_meta($teache_live_page_id, 'شماره جلسه', true) ?>.m3u8">

                                </video>
                                <input type="text" class="d-none" id="doreName"
                                       value="<?php echo get_post_meta($teache_live_page_id, 'نام دوره', true) ?>">
                                <input type="text" class="d-none" id="jalaseName"
                                       value="<?php echo get_post_meta($teache_live_page_id, 'شماره جلسه', true) ?>">
                                <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
                                <script src="<?php bloginfo('template_url') ?>/vjs/videojs-contrib-hls.js"></script>
                                <script src="<?php bloginfo('template_url') ?>/vjs/video.js"></script>
                                <script>
                                    let player = videojs('hls-example', {autoplay: true});
                                    player.play();
                                    setInterval(() => {
                                        // checkUserIsLogin();
                                        if ((document.readyState === 'complete') && (jQuery('#animated').length !== 1 || jQuery('#animated').css('display') !== 'block' || jQuery('#animated').text().length < 13)) {


                                        }
                                    }, 20000);
                                    removeUser = () => {
                                        alert('شما قوانین را نقض کرده اید در صورت تکرار حذف خواهید شد');
                                        document.getElementById('hls-example_html5_api').remove();
                                    };

                                </script>


                            </div>
                            <?php
                        } ?>
                            <?php
                        } ?>
                    </div>

                    <?php
                    $product = wc_get_product($product_ids);

                    $price = $product->get_price();
                    if (is_user_logged_in() && get_post_meta($teache_live_page_id, 'وضعیت شروع', true) == "ok"
                        && ((wc_customer_bought_product($customer_email, $user_id, $product_ids)) || ($price == 0))
                    ) {
                        ?>
                        <div class="col-lg-3 ry-no-paa  float-right">
                            <div class="col-12 pt-2 pb-0 ry-commenting-container">
                                <div class="col-lg-12 ry-chat-std pt-2">
                                    <div class="col-10 float-right ry-inp">
                                        <input class="form-control" id="std-com" type="text"
                                               placeholder="متن خود را وارد نمایید">

                                    </div>
                                    <div class="col-2 float-right ry-send-btn" onclick="send_mess()">
                                        <input class="d-none" id="ry-root"
                                               value="<?php echo get_post_meta($teache_live_page_id, "آدرس ذخیره سازی", true) ?>">
                                        <i id="ry-microphoneh" class="fa fa-paper-plane"></i>
                                        <script src="<?php bloginfo('template_url') ?>/uploadaudio/recorder.js"></script>
                                        <script>
                                            URL = window.URL || window.webkitURL;
                                            var gumStream;
                                            var rec;
                                            var input;
                                            var stop_btn_status = true;
                                            var address = $("#ry-root").val();
                                            var AudioContext = window.AudioContext || window.webkitAudioContext;
                                            var audioContext;//audio context to help us record
                                            var counter_voice = 1;
                                            var ry_rec_audio = document.getElementById("ry-microphone");
                                            ry_rec_audio.addEventListener("click", sts_check);

                                            function sts_check() {
                                                if (stop_btn_status) {
                                                    startRecording();
                                                    stop_btn_status = false;
                                                }
                                                else {
                                                    stopRecording();
                                                    stop_btn_status = true;
                                                }
                                            }

                                            function startRecording() {
                                                console.log("recordButton clicked");
                                                var constraints = {audio: true, video: false};
                                                navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
                                                    console.log("getUserMedia() success, stream created, initializing Recorder.js ...");
                                                    audioContext = new AudioContext();
                                                    gumStream = stream;
                                                    input = audioContext.createMediaStreamSource(stream);
                                                    rec = new Recorder(input, {numChannels: 1});
                                                    rec.record();
                                                    console.log("Recording started");

                                                }).catch(function (err) {
                                                });
                                            }

                                            function pauseRecording() {
                                                console.log("pauseButton clicked rec.recording=", rec.recording);
                                                if (rec.recording) {
                                                    rec.stop();
                                                } else {
                                                    rec.record();
                                                }
                                            }

                                            function stopRecording() {
                                                console.log("stopButton clicked");
                                                rec.stop();
                                                gumStream.getAudioTracks()[0].stop();

                                                rec.exportWAV(createDownloadLink);
                                            }

                                            function createDownloadLink(blob) {
                                                var url = URL.createObjectURL(blob);
                                                var au = document.createElement('audio');
                                                var li = document.createElement('li');
                                                var link = document.createElement('a');
                                                //name of .wav file to use during upload and download (without extendion)
                                                var filename = new Date().toISOString();
                                                //add controls to the <audio> element
                                                au.controls = true;
                                                au.src = url;
                                                //save to disk link
                                                link.href = url;
                                                link.download = filename + ".wav"; //download forces the browser to donwload the file using the  filename
                                                link.innerHTML = "Save to disk";
                                                var upload = document.createElement('a');
                                                upload.href = "#";
                                                upload.innerHTML = "Upload";
                                                upload_video();

                                                function upload_video() {
                                                    counter_voice = Math.floor(Math.random() * 100000) + 1;
                                                    var namesss = Math.floor(Math.random() * 6) + 1;
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.onload = function (e) {
                                                        if (this.readyState === 4) {
                                                            console.log("Server returned: ", e.target.responseText);
                                                        }
                                                    };
                                                    var fd = new FormData();
                                                    fd.append("audio_data", blob, filename);
                                                    fd.append("name", "voice" + counter_voice);
                                                    fd.append('addr', address);
                                                    xhr.open("POST", "<?php bloginfo('template_url') ?>/upload_voice.php", true);
                                                    xhr.send(fd);
                                                }

                                                update_voice();
                                            }

                                            function update_voice() {
                                                var date = new Date;
                                                var hour = date.getHours();
                                                var time = date.getMinutes();
                                                if (true) {
                                                    var logo_src = $("#logo_src").val();
                                                    var user_names = $("#user_names").val();
                                                    $("#std-com").val('');
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                                                        data: {
                                                            action: 'comment_student',
                                                            user_id: <?php echo $user_id; ?>,
                                                            t_p: <?php echo $teache_live_page_id?>,
                                                            user_comment: address + '/' + "voice" + counter_voice + ".wav",
                                                            kind: "voice",
                                                            logo_src: logo_src,
                                                            user_names: user_names,
                                                            time: hour + ":" + time

                                                        },
                                                        beforeSend: function () {

                                                        },
                                                        success: function (res) {
                                                            // $("#std-com").val('')
                                                        }
                                                    })
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="col-2 float-right ry-send-btn d-none">
                                        <i id="ry-add-com" class="fa fa-paper-plane"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <?php
                                $logo_src = get_template_directory_uri() . "/img/user.png";
                                if (get_user_meta($user_id, 'logo', true)) {
                                    $logo_src = get_home_url() . "/" . get_user_meta($user_id, 'logo', true);
                                } else {
                                    $logo_src = get_template_directory_uri() . "/img/user.png";
                                }
                                $nic_name = "کاربر";
                                if (get_user_meta($user_id, 'nickname', true)) {
                                    $nic_name = get_user_meta($user_id, 'nickname', true);
                                    //$nic_name = get_user_meta($user_id, 'billing_first_name', true) . " " . get_user_meta($user_id, 'billing_last_name', true);
                                }
                                ?>
                                <input id="logo_src" class="d-none" value="<?php echo $logo_src ?>">
                                <input id="user_names" class="d-none" value="<?php echo $nic_name ?>">
                                <input id="user_idsss" class="d-none" value="<?php echo $user_id ?>">
                            </div>
                            <div class="col-12 ry-comments rypp">


                                <script>
                                    $(document).ready(function () {
                                        let txt = document.getElementById('ryMob').value;
                                        $("#hls-example").append("<p class='' id='animated' style='z-index: 99999999;font-size:13px;top:56%;position: absolute'>" + txt + "</p>");
                                        let html = `<div class="ryQuality m-auto " onclick="$('.allQuality').toggle()">
                                        <div class="allQuality">
                                            <div class="qualityy Qactive" id="q0" onclick="changeQualiti(0)">کیفیت خودکار</div>
                                            <div class="qualityy" id="q720" onclick="changeQualiti(720)">کیفیت 720</div>
                                            <div class="qualityy" id="q480" onclick="changeQualiti(480)">کیفیت 480</div>
                                            <div class="qualityy" id="q240" onclick="changeQualiti(240)">کیفیت 240</div>
                                        </div>
                                        <i class="fas fa-cog"></i></div>
                                        `;
                                        jQuery(".vjs-live-control").append(html)
                                        // im_online();
                                        // get_student_new_attend_class();

                                    });
                                    changeQualiti = (qualiti) => {
                                        $(".Qactive").removeClass('Qactive');
                                        $("#q" + qualiti).addClass('Qactive');

                                        let doreName = document.getElementById('doreName').value;
                                        let jalaseName = document.getElementById('jalaseName').value;


                                    };

                                    function playVideo(videoSource, type) {
                                        var videoElm = document.getElementById('hls-example_html5_api');
                                        var videoSourceElm = document.getElementById('srcOne');
                                        if (!videoElm.paused) {
                                            videoElm.pause();
                                        }

                                        videoSourceElm.src = videoSource;
                                        videoSourceElm.type = type;

                                        videoElm.load();
                                        videoElm.play();
                                    }

                                    //setInterval(im_online, 4000000);
                                    function im_online() {
                                        var logo_src = $("#logo_src").val();
                                        var user_names = $("#user_names").val();
                                        var date = new Date;
                                        var hour = date.getHours();
                                        var time = date.getMinutes();
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php bloginfo("template_url") ?>/im_online.php',
                                            data: {
                                                action: 'im_online',
                                                logo_src: logo_src,
                                                user_id: <?php echo $user_id; ?>,
                                                user_names: user_names,
                                                time: hour + ":" + time,
                                                t_p: <?php echo $teache_live_page_id?>

                                            },
                                            beforeSend: function () {
                                                // $(".std-att").append("<div class='col-lg-1 col-4 float-right ry-s-c text-center'><img alt='" + user_names + "' class='ry-img-show-onlone' src='" + logo_src + "'><p class='text-center ry-name-std'>" + user_names + "</p></div>")
                                            },
                                            success: function (res) {
                                            }
                                        })
                                    }
                                </script>
                                <?php
                                if ($comments = get_post_meta($teache_live_page_id, 'allchats', true)) {
                                    $comments = unserialize($comments);
                                    $comments = array_reverse($comments);
                                    foreach ($comments as $co) {
                                        if ($co[0] == $user_id) {
                                            $logo_src = get_template_directory_uri() . "/img/user.png";
                                            if (get_user_meta($co[0], 'logo', true)) {
                                                $logo_src = get_home_url() . "/" . get_user_meta($co[0], 'logo', true);
                                            } else {
                                                $logo_src = get_template_directory_uri() . "/img/user.png";
                                            }
                                            ?>

                                            <div class="ry-chat-container darker ry-no-paa">
                                                <div class="col-2  ry-no-paa">
                                                    <img src="<?php echo $logo_src ?>" alt="Avatar"
                                                         class="right ry-c-p-p">
                                                </div>
                                                <div class="col-10  ry-no-paa">
                                                    <p class="text-right ry-chater-name"><?php echo $co[5] ?> </p>

                                                    <?php
                                                    if ($co[3] == "txt") {
                                                        ?>
                                                        <p class="ry-no-paa ry-txt-comments"><?php echo $co[1] ?></p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <audio controls class="ry-r-voice">
                                                            <source src="<?php bloginfo('url') ?>/<?php echo $co[1] ?>"
                                                                    type="audio/wav">
                                                        </audio>
                                                        <?php
                                                    }
                                                    ?>

                                                    <span class="time-left"><?php echo $co[2] ?></span>

                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <?php
                                        } else {
                                            $logo_src = get_template_directory_uri() . "/img/user.png";
                                            if (get_user_meta($co[0], 'logo', true)) {
                                                $logo_src = get_home_url() . "/" . get_user_meta($co[0], 'logo', true);
                                            } else {
                                                $logo_src = get_template_directory_uri() . "/img/user.png";
                                            }
                                            ?>
                                            <div class="ry-chat-container ry-no-paa d-flex flex-row-reverse px-2">
                                                <div class="col-2  ry-no-paa">
                                                    <img src="<?php echo $logo_src ?>" alt="Avatar"
                                                         class="right ry-c-p-p">
                                                </div>
                                                <div class="col-10  ry-no-paa">
                                                    <p class="text-right ry-chater-name"><?php echo $co[5] ?> </p>
                                                    <?php
                                                    if ($co[3] == "txt") {
                                                        ?>
                                                        <p class="ry-no-paa ry-txt-comments"><?php echo $co[1] ?></p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <audio controls class="ry-r-voice">
                                                            <source src="<?php bloginfo('url') ?>/<?php echo $co[1] ?>"
                                                                    type="audio/wav">
                                                        </audio>
                                                        <?php
                                                    }
                                                    ?>
                                                    <span class="time-left"><?php echo $co[2] ?></span>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                <script>
                                    var alls = {};
                                    var resss;
                                    var userss_id;
                                    userss_id = $('#user_idsss').val();
                                    setInterval(function () {
                                        var numItems = 0;
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php bloginfo("template_url") ?>/get_comments.php',
                                            data: {
                                                action: 'comment_student_get',
                                                t_p: <?php echo $teache_live_page_id?>,
                                                numItem: numItems,
                                            },
                                            beforeSend: function () {

                                            },
                                            success: function (res) {
                                                res = JSON.parse(res);
                                                resss = res;
                                                var conter = 0;
                                                $(".ry-comments").html('');
                                                while (res[conter]) {
                                                    if (res[conter][0] === userss_id) {
                                                        if (res[conter].kind === "txt") {
                                                            $(".ry-comments").append("<div class='ry-chat-container ry-no-paa d-flex flex-row-reverse'><div class='col-2  ry-no-paa'><img src='" + res[conter].logo_src + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10  ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter].user_names + " </p><p class='ry-no-paa ry-txt-comments text-right'>" + res[conter].user_comment + "</p><span class='time-left'>" + res[conter].time + "</span></div><div class='clear'></div></div>");
                                                        } else {
                                                            $(".ry-comments").append("<div class='ry-chat-container darker ry-no-paa d-flex flex-row-reverse'><div class='col-2  ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10  ry-no-paa'><div class='clear'></div><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><audio controls class='ry-r-voice'><source src='https://4khooneh.org/" + res[conter][1] + "' type='audio/wav'></audio><span class='time-left'>" + res[conter][2] + "</span></div></div><div class='clear'></div>")
                                                        }
                                                    } else {
                                                        if (res[conter].kind === "txt") {
                                                            $(".ry-comments").append("<div class='ry-chat-container ry-no-paa d-flex flex-row-reverse'><div class='col-2  ry-no-paa'><img src='" + res[conter].logo_src + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10  ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter].user_names + " </p><p class='ry-no-paa ry-txt-comments text-right'>" + res[conter].user_comment + "</p><span class='time-left'>" + res[conter].time + "</span></div><div class='clear'></div></div>");
                                                        }
                                                        else {
                                                            $(".ry-comments").append("<div class='ry-chat-container ry-no-paa d-flex flex-row-reverse'><div class='col-2  ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10  ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><audio controls class='ry-r-voice'><source src='https://4khooneh.org/" + res[conter][1] + "' type='audio/wav'></audio><span class='time-left'>" + res[conter].time + "</span></div></div>");
                                                        }
                                                    }
                                                    conter++;
                                                }
                                            }
                                        })
                                    }, 4000);
                                </script>
                            </div>
                            <script>
                                $(document).on('keypress', function (e) {
                                    if (e.which === 13) {
                                        send_mess();
                                    }
                                });
                                $("#ry-add-com").on('click', send_mess);

                                function send_mess() {
                                    var coment = $("#std-com").val();
                                    var date = new Date;
                                    var hour = date.getHours();
                                    var time = date.getMinutes();

                                    if (coment) {
                                        var logo_src = $("#logo_src").val();
                                        var user_names = $("#user_names").val();
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php bloginfo("template_url") ?>/addComment.php',
                                            data: {
                                                action: 'comment_student',
                                                user_id: <?php echo $user_id; ?>,
                                                t_p: <?php echo $teache_live_page_id?>,
                                                user_comment: coment,
                                                kind: "txt",
                                                logo_src: logo_src,
                                                user_names: user_names,
                                                time: hour + ":" + time

                                            },
                                            beforeSend: function () {
                                                $("#std-com").val('');
                                                $(".ry-comments").prepend("<div class='ry-chat-container darker ry-no-paa d-flex flex-row-reverse'><div class='col-2  ry-no-paa'><img src='" + logo_src + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10  ry-no-paa ry-ppps'><p class='text-right ry-chater-name'>" + user_names + " </p><p class='ry-no-paa ry-txt-comments text-right'>" + coment + "</p><span class='time-left'>" + hour + ":" + time + "</span></div><div class='clear'></div></div>");
                                            },
                                            success: function (res) {
                                            }
                                        })
                                    }
                                }
                            </script>
                        </div>
                    <?php } else {
                    ?>
                        <script>
                            $(document).ready(function () {
                                get_student_new_attend_class();
                            });
                        </script>
                        <?php
                    } ?>
                    <div class="clear"></div>
                    <div class="clear"></div>
                    <div class="ck-all-page-content">
                        <?php
                        //                                $my_postid = $_REQUEST['page_id'];
                        $content_post = get_post($teache_live_page_id);
                        $content = $content_post->post_content;
                        echo do_shortcode($content)
                        ?>
                    </div>
                    <script src='<?php bloginfo('template_url') ?>/js/jq/jquery-ui.min.js'></script>
                    <script>
                        $(".ck-comment-header").click(function () {
                            var display = $(".ck-comment-content").css("display");
                            if (display == "none") {
                                $(".ck-comment-header").css("border-bottom", "0");
                                $(".ck-comment-content").slideDown();
                            }
                            else {
                                $(".ck-comment-content").slideUp();
                                setTimeout(
                                    function () {
                                        $(".ck-comment-header").css("border-bottom", "solid 6px red");
                                    }, 400);
                            }
                        });
                    </script>
                    <div class="ck-comments">
                    </div>
                </article>
                <?php if (current_user_can('administrator')) {
                    ?>
                    <div class="bgQ">
                        <p class="text-right ">ارسال سوال برای کاربران</p>
                        <div class="col-lg-12 text-right ry-margin d-flex flex-column-reverse flex-sm-row mt-5" dir="rtl">

                            <label class="ry-lable-s">شماره سوال</label>

                            <div class="col-lg-3">
                                <input class="form-control" id="q_number" type="text" placeholder="شماره سوال">
                            </div>

                            <label class="ry-lable-s ry-margin">گزینه صحیح</label>
                            <div class="col-lg-2">
                                <select class="form-control" type="text" id="answer_correct">
                                    <option value="1">گزینه 1</option>
                                    <option value="2">گزینه 2</option>
                                    <option value="3">گزینه 3</option>
                                    <option value="4">گزینه 4</option>
                                </select>
                            </div>

                            <label class="ry-lable-s ry-margin">زمان(ثانیه)</label>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="q_time" placeholder="زمان سوال">
                            </div>

                            <button class=" btn btn-warning btn-add-questio">ارسال سوال</button>
                            <script type="text/javascript">
                                $(".btn-add-questio").on('click', function () {
                                    var q_num = $("#q_number").val();
                                    var answer_correct = $("#answer_correct").val();
                                    var q_time = $("#q_time").val();
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?php bloginfo("template_url") ?>/add_question.php',
                                        data: {
                                            q_num: q_num,
                                            address: address,
                                            answer_correct: answer_correct,
                                            q_time: q_time
                                        },
                                        beforeSend: function () {
                                        },
                                        success: function (res) {
                                        }
                                    })
                                });
                            </script>
                            <button class=" btn btn-danger mx-2" onclick="clearComment()">حذف کامنت ها</button>
                            <button class=" btn btn-info mx-2" onclick="disableComment()">بستن کامنت ها</button>
                            <button class=" btn btn-success mx-2" onclick="enableComment()">باز کردن کامنت ها</button>
                            <script type="text/javascript">
                                clearComment = () => {
                                    Swal.fire({
                                        title: 'آیا از پاک کردن کامنت ها اطمینان دارید؟',
                                        text: "در صورت تایید کامنت ها پاک میشوند",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'بلی',
                                        cancelButtonText: 'خیر'
                                    }).then((result) => {
                                        let formData = new FormData();
                                        formData.append('clearComment', 'ok');
                                        fetch(document.getElementById('ry-locate').value + '/wp-content/themes/ck-pub/addComment.php',
                                            {
                                                method: 'POST',
                                                body: formData
                                            }
                                        )
                                    });

                                };
                                disableComment = () => {
                                    Swal.fire({
                                        title: 'آیا از بستن  کامنت ها اطمینان دارید؟',
                                        text: "در صورت تایید کامنت ها بسته میشوند",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'بلی',
                                        cancelButtonText: 'خیر'
                                    }).then((result) => {
                                        let formData = new FormData();
                                        formData.append('disableComment', 'ok');
                                        fetch(document.getElementById('ry-locate').value + '/wp-content/themes/ck-pub/addComment.php',
                                            {
                                                method: 'POST',
                                                body: formData
                                            }
                                        )
                                    });
                                };
                                enableComment = () => {
                                    Swal.fire({
                                        title: 'آیا از بازکردن  کامنت ها اطمینان دارید؟',
                                        text: "در صورت تایید بازکردن ها بسته میشوند",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'بلی',
                                        cancelButtonText: 'خیر'
                                    }).then((result) => {
                                        let formData = new FormData();
                                        formData.append('enableComment', 'ok');
                                        fetch(document.getElementById('ry-locate').value + '/wp-content/themes/ck-pub/addComment.php',
                                            {
                                                method: 'POST',
                                                body: formData
                                            }
                                        )
                                    });
                                }
                            </script>
                        </div>
                    </div>

                    <?php
                } ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="ry-examss clearfix text-right">
            <div class="col-lg-2 float-right ry-countdown">
                <p>زمان باقی مانده</p>
                <p dir="rtl" id="demo"></p>
                <script>


                </script>

            </div>
            <i class="fas fa-times-circle"></i>
            <div class="col-lg-8 float-right ry-anssss">
                <p><span class="numberss">1</span>در این سوال کدام گزینه صحیح است؟</p>
                <div id="1" class="question-number">
                    <div rel="1" role="1" class="ans float-right ">1</div>
                    <div rel="1" role="2" class="ans float-right">2</div>
                    <div rel="1" role="3" class="ans float-right ">3</div>
                    <div rel="1" role="4" class="ans float-right ">4</div>
                    <div class="clear"></div>
                </div>

                <button class="btn ry-sabt-btn">ثبت</button>
            </div>
            <script src="<?php bloginfo('template_url') ?>/js/chart/Chart.min.js"></script>
            <div class="col-lg-12 class text-center float-right ry-natije ">
                <div class="col-lg-3 ry-header-chart">
                    <span class="float-right">درصد پاسخ صحیح:</span><span class="float-right" id="correctt">0:</span>
                    <div class="float-right ry-green"></div>
                    <span class="float-right">درصد پاسخ نادرست:</span><span class="float-right" id="wrongg">0:</span>
                    <div class="float-right ry-red"></div>
                    <div class="clear"></div>
                </div>
                <canvas id="works" class="" width="300" height="220"></canvas>
                <script>
                    var nemoodar = [
                        {
                            value: 100,
                            color: "#95cf69"
                        },
                        {
                            value: 0,
                            color: "#fa647d"
                        }
                    ];
                </script>
                <script>
                    var works = document.getElementById('works').getContext('2d');
                    new Chart(works).Pie(nemoodar);
                </script>
            </div>
            <div class="clear"></div>
            <script>

                $(".ans").on("click", function () {
                    //alert($(this).attr("rel")+$(this).attr("role"));
                    var rel = parseInt($(this).attr("rel"));
                    var role = parseInt($(this).attr("role"));
                    var user_item = parseInt($("#" + rel).find(".ry-active").attr("role"));
                    if (role === user_item) {
                        $("#" + rel).find(".ry-active").removeClass('ry-active')
                    } else {
                        $("#" + rel).find(".ry-active").removeClass("ry-active");
                        $(this).addClass("ry-active");
                    }
                });
                $(".fa-times-circle").on('click', function () {
                    $('.ry-natije').hide('fast', 'swing');
                    $(".ry-active").removeClass('ry-active');
                    $(".ry-de-active").removeClass('ry-de-active');
                    $('.ry-examss').hide('fast', 'swing');
                })
            </script>

        </div>
        <script>
            let mojavez_get_question = false;
            setTimeout(function () {
                mojavez_get_question = true;
            }, 10000)
        </script>
        <script>
            let roozbeh;
            let correct = 0;
            let time = 0;

        </script>
        <script type="text/javascript">
            $(".ry-sabt-btn").on('click', function () {
                var i = roozbeh[0];
                var rel = $("#" + i).find('div.ry-active').attr("rel");
                var role = $("#" + i).find('div.ry-active').attr("role");
                var thr = 'ok';
                if (role !== correct) {
                    var ch = parseInt(correct) - 1;
                    $("#" + i).find("div.ry-active").addClass("ry-de-active");
                    $("#" + i).find("div.ry-active").removeClass("ry-active");
                    $("#" + i).find("div:eq(" + ch + ")").addClass("ry-active");
                    thr = 'no';
                }
                $.ajax({
                    type: 'post',
                    url: '<?php bloginfo("template_url") ?>/sabt_gozine.php',
                    data: {
                        soal: i,
                        thr: thr,
                    },
                    beforeSend: function () {
                        $(".ry-sabt-btn").prop("disabled", true);
                    },
                    success: function () {
                    }
                });
            });

        </script>
    </main>
    <script src="<?php bloginfo('template_url') ?>/js/sweetalert2.js"></script>
<?php include('footer.php') ?>