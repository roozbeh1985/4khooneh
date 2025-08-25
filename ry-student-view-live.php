<?php
/*
Template Name: student live
*/
include("header.php");
setPostViews(get_the_ID());
global $post;
$user_id = get_current_user_id();
$kind = get_user_meta($user_id, "user_kind", 0)[0];
$email = get_user_meta($user_id, "billing_email", 0)[0];
$customer_email = $email;
$product_ids = get_post_meta($post->ID, 'کد محصول', true);

if (current_user_can('administrator')) {

} elseif (!is_user_logged_in() || $kind != "student") {

//    wp_redirect(home_url());
//    exit;

} elseif (!wc_customer_bought_product($customer_email, $user_id, $product_ids)) {
//    $_product = wc_get_product( $product_ids );
//    if($_product->get_price()!=0){
////            echo get_permalink($product_ids);
////    wp_redirect(get_permalink($product_ids));;
////    exit;
//    }

}
global $post, $product;
$title = $post->post_title;
$teache_live_page_id = get_post_meta($post->ID, "صفحه لایو", true);

$live_home = get_post_meta($teache_live_page_id, "آدرس ذخیره سازی", true);
?>
    <div>
        <div>
            <div class="ck-page-container ">
                <div class="ck-page-show d-none">
                    <div class="ck-page-show-container ck-col-container">
                        <ul>
                            <li>
                                <a><?php echo $title_parent = get_the_title($post->post_parent); ?></a>
                            </li>
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            <li>
                                <a><?php the_title(); ?></a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="ck-page-content ry-live-vv">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <div id="col-12" class="ck-page-right-menu-img">
                                <?php if (function_exists('get_users_browsing_page')): ?>
                                    <div id="useronline-browsing-page"><?php print_r(get_users_browsing_page()); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="container">

                            <article class="col-lg-12">
                                <div class="col-lg-9 float-right ry-record-teacher">
                                    <h3 class="text-center ry-f-title"><?php the_title() ?></h3>
                                    <!--                                <video controls autoplay id="video" class="stdviewvideo"></video>-->
                                    <script>
                                        //
                                        //                                    var video = document.getElementById('video');
                                        //                                    var source = document.createElement('source');
                                        //                                    source.setAttribute('src', '<?php //bloginfo('url') ?>///<?php //echo $live_home?>///roozbeh.mp4?t=' + new Date());
                                        //                                    source.setAttribute('type', 'video/mp4');
                                        //                                    video.appendChild(source);
                                        //                                    video.play();
                                        //                                    var timm = 0;
                                        //                                    var tiimend = 20;
                                        //                                    var befor_end = [];
                                        //                                    var i = 0;
                                        //                                    video.onended = function () {
                                        //                                        timm = video.currentTime;
                                        //                                        befor_end[i] = timm;
                                        //                                        if (i > 3 && befor_end[i] === befor_end[i - 2]) {
                                        //                                        } else {
                                        //                                            source.setAttribute('src', '<?php //bloginfo('url') ?>///<?php //echo $live_home?>///roozbeh.mp4?t=' + new Date());
                                        //                                            video.load();
                                        //                                            video.currentTime = timm;
                                        //                                            video.play();
                                        //                                        }
                                        //                                        i++;
                                        //                                    };
                                    </script>

                                    <?php if (!is_user_logged_in()) {
                                        ?>
                                        <div class="col-lg-12 ry-no-log">
                                            <p>برای حضور در کلاس میبایست حتما به سایت وارد بشوید</p>
                                            <label>اگر در سایت عضو هستید به حساب خود وارد بشوید</label>
                                            <a href="<?php bloginfo('url') ?>/ورود/">
                                                <button class="btn btn-blue">ورودبه سایت</button>
                                            </a><br>
                                            <label>اگر در سایت ثبت نام نکرده اید ابتدا ثبت نام نمایید</label>
                                            <a href="<?php bloginfo('url') ?>/ثبت-نام/">
                                                <button class="btn btn-danger">ثبت نام در سایت</button>
                                            </a>
                                        </div>
                                    <?php
                                    } else {

                                    $product = wc_get_product($product_ids);
                                    $price = $product->get_price();

                                    if (!wc_customer_bought_product($customer_email, $user_id, $product_ids) && $price != 0) {
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
                                                                    ?>
                                                                    <?php
                                                                    $attachment_ids = $product->get_gallery_attachment_ids();
                                                                    foreach ($attachment_ids as $attachment_id) {
                                                                        $image_link[$i] = wp_get_attachment_url($attachment_id);
                                                                        $i++;
                                                                    }
                                                                    $film_kind = get_post_meta($product_ids, 'فیلم', true);
                                                                    if (!$film_kind && $film_kind != 'ok') {
                                                                        ?>
                                                                        <div class="page four"><img class="lazy"
                                                                                                    alt="<?php the_title(); ?>"
                                                                                                    data-src="<?php echo $image_link[3]; ?>"
                                                                                                    src="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                                                        </div>
                                                                        <div class="page three"><img class="lazy"
                                                                                                     alt="<?php the_title(); ?>"
                                                                                                     data-src="<?php echo $image_link[2]; ?>"
                                                                                                     src="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                                                        </div>
                                                                        <div class="page two"><img class="lazy"
                                                                                                   alt="<?php the_title(); ?>"
                                                                                                   data-src="<?php echo $image_link[1]; ?>"
                                                                                                   src="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                                                        </div>
                                                                        <div class="page one"><img class="lazy"
                                                                                                   alt="<?php the_title(); ?>"
                                                                                                   data-src="<?php echo $image_link[0]; ?>"
                                                                                                   src="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                                                        </div>
                                                                    <?php } ?>
                                                                    <div class="ck-cover <?php if (!$film_kind && $film_kind != 'ok') echo 'front' ?> ck-itemeees">
                                                                        <img id="ry-coovv" class="lazy"
                                                                             alt="<?php the_title(); ?>"
                                                                             data-src="<?php echo $image_product; ?>"
                                                                             src="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
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
                                                                <div class="ry-check float-right"><i
                                                                            class="fa fa-check-square"></i>
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
                                                                            <span class="ry-p-n ry-redd"><?php echo((1 - ((int)($d_p[$ii]) / (int)($r_p[$ii]))) * 100) ?></span>
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

                                                                            <button class="ry-m1 ry-btn-add-to-cart <?php if (!$assest_product->is_in_stock()) echo 'ry-grayscale'; else echo 'single_add_to_cart_button add-to-cart'; ?>"
                                                                                    data-toggle="modal"
                                                                                    rel="<?php echo $v_id[$ii]; ?>"
                                                                            >
                                                                             <span> <i class="fa fa-cart-arrow-down"></i>
                                                                                 <span class="ry-a-t-c-t">
                                                                                     <?php if (!$assest_product->is_in_stock()) {
                                                                                         echo 'در انبار موجود نیست';
                                                                                     } else {
                                                                                         echo 'افزودن به سبد خرید';
                                                                                     } ?>
                                                                                 </span>
                                                                             </span>
                                                                            </button>
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
                                                                                        class="ry-p-n ry-redd"><?php echo((1 - ((int)($d_p[0]) / (int)($r_p[0]))) * 100) ?></span>
                                                                            </p>

                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <p>
                                                                                <span class="ry-p-n ry-redd">%</span><span
                                                                                        class="ry-p-n ry-redd"><?php echo((1 - ((int)($product->get_price()) / (int)($product->get_regular_price()))) * 100) ?></span>
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
                                                                    <button class=" ry-m1 ry-btn-add-to-cart single_add_to_cart_button add-to-cart"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModalCenter">
                                                        <span> <i class="fa fa-cart-arrow-down"></i><span
                                                                    class="ry-a-t-c-t">افزودن به سبد خرید</span> </span>
                                                                    </button>
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
                                        <div class="col-lg-12 ry-no-ready">
                                            <!--                                                <img src="-->
                                            <?php //bloginfo('url') ?><!--/wp-content/uploads/2020/05/01-2.jpg">-->
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
                                    ?>
                                        <div class="col-lg-12 ry-no-ready">
                                            <!--                                                <img src="-->
                                            <?php //bloginfo('url') ?><!--/wp-content/uploads/2020/05/01-2.jpg">-->
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
                                    elseif ($offline = get_post_meta($post->ID, 'آفلاین', true)){
                                    ?>
                                        <div class="col-lg-12" id="test_video">
                                            <link rel="stylesheet" type="text/css"
                                                  href="<?php bloginfo('template_url') ?>/plyrio/plyr.css"/>
                                            <video controls crossorigin playsinline autoplay id="player"></video>
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
                                        <div class="col-lg-12" id="test_video">
                                            <link rel="stylesheet" type="text/css"
                                                  href="<?php bloginfo('template_url') ?>/plyrio/plyr.css"/>

                                            <input class="d-none" id="os"
                                                   value="<?php echo get_post_meta($teache_live_page_id, 'نام استاد', true) ?>">
                                            <input class="d-none" id="ke"
                                                   value="<?php echo get_post_meta($teache_live_page_id, 'رمز ورود کلاس', true) ?>">

                                            <video controls crossorigin playsinline id="player"></video>
                                            <script
                                                    type="text/javascript"
                                                    src="<?php bloginfo('template_url') ?>/plyrio/polyfill.min.js"
                                                    crossorigin="anonymous"
                                            ></script>
                                            <!-- plyr.is -->
                                            <script type="text/javascript"
                                                    src="<?php bloginfo('template_url') ?>/plyrio/plyr.js"></script>
                                            <!-- hls.js -->
                                            <script type="text/javascript"
                                                    src="<?php bloginfo('template_url') ?>/plyrio/hls.js@latest"></script>
                                            <script>

                                                var os = $("#os").val();
                                                var ke = $("#ke").val();
                                                const source = 'https://4khoonehpub.ir/hls/' + os + '/' + ke + '.m3u8';
                                                const player = new Plyr('#player', {
                                                    invertTime: false,
                                                    autoPlay: true
                                                });
                                                var video = document.getElementById('player');
                                                if (Hls.isSupported()) {
                                                    var hls = new Hls();
                                                    hls.loadSource(source);
                                                    hls.attachMedia(video);
                                                    hls.on(Hls.Events.MANIFEST_PARSED, function () {
                                                        video.play();
                                                    });
                                                } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                                                    video.src = source;
                                                    video.addEventListener('loadedmetadata', function () {
                                                        video.play();
                                                    });
                                                }
                                            </script>


                                        </div>
                                        <?php
                                    } ?>
                                        <?php
                                    } ?>


                                </div>
                                <?php if (is_user_logged_in()) {
                                    ?>
                                    <div class="col-lg-3 ry-no-paa  float-right">
                                        <div class="col-12 ry-no-paa ry-commenting-container">
                                            <div class="col-lg-12 ry-chat-std">
                                                <div class="col-10 float-right ry-inp">
                                                    <input class="form-control" id="std-com" type="text"
                                                           placeholder="متن خود را وارد نمایید">
                                                    <script type="text/javascript">
                                                        $('#std-com').on('keypress', function (event) {
                                                            // var regex = new RegExp("^[a-zA-Z0-9\u0600-\u06FF \s \( \ )]+$");
                                                            var regex = new RegExp("[\U0001F300-\U0001F5FF]");
                                                            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                                                            if (regex.test(key)) {
                                                                event.preventDefault();
                                                                return false;
                                                            }
                                                        });
                                                    </script>
                                                </div>

                                                <div class="col-2 float-right ry-send-btn">
                                                    <input class="d-none" id="ry-root"
                                                           value="<?php echo get_post_meta($teache_live_page_id, "آدرس ذخیره سازی", true) ?>">
                                                    <i id="ry-microphone" class="fa fa-microphone"></i>
                                                    <script src="<?php bloginfo('template_url') ?>/uploadaudio/recorder.js"></script>
                                                    <script>

                                                        URL = window.URL || window.webkitURL;

                                                        var gumStream; 						//stream from getUserMedia()
                                                        var rec; 							//Recorder.js object
                                                        var input; 							//MediaStreamAudioSourceNode we'll be recording
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
                                        <div class="col-12 ry-comments ry-no-paa">
                                            <?php
                                            $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                            if (get_user_meta($user_id, 'logo', true)) {
                                                $logo_src = get_home_url() . "/" . get_user_meta($user_id, 'logo', true);
                                            } else {
                                                $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                            }
                                            $nic_name = "کاربر";
                                            if (get_user_meta($user_id, 'nickname', true)) {
                                                $nic_name = get_user_meta($user_id, 'nickname', true);
                                            }
                                            ?>

                                            <input id="logo_src" class="d-none" value="<?php echo $logo_src ?>">
                                            <input id="user_names" class="d-none" value="<?php echo $nic_name ?>">
                                            <input id="user_idsss" class="d-none" value="<?php echo $user_id ?>">


                                            <script>
                                                $(document).ready(function () {
                                                    im_online();
                                                    get_student_new_attend_class();
                                                });

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
                                                        $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                        if (get_user_meta($co[0], 'logo', true)) {
                                                            $logo_src = get_home_url() . "/" . get_user_meta($co[0], 'logo', true);
                                                        } else {
                                                            $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                        }
                                                        ?>

                                                        <div class="ry-chat-container darker ry-no-paa">
                                                            <div class="col-2 float-right ry-no-paa">
                                                                <img src="<?php echo $logo_src ?>" alt="Avatar"
                                                                     class="right ry-c-p-p">
                                                            </div>
                                                            <div class="col-10 float-right ry-no-paa">
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

                                                        </div>
                                                        <?php
                                                    } else {
                                                        $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                        if (get_user_meta($co[0], 'logo', true)) {
                                                            $logo_src = get_home_url() . "/" . get_user_meta($co[0], 'logo', true);
                                                        } else {
                                                            $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                        }
                                                        ?>
                                                        <div class="ry-chat-container ry-no-paa">
                                                            <div class="col-2 float-right ry-no-paa">
                                                                <img src="<?php echo $logo_src ?>" alt="Avatar"
                                                                     class="right ry-c-p-p">
                                                            </div>
                                                            <div class="col-10 float-right ry-no-paa">
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
                                                    var numItems = $(".ry-chat-container").length;
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
                                                            while (res[conter]) {
                                                                if (res[conter][0] === userss_id) {
                                                                    if (res[conter][3] === "txt") {
                                                                        $(".ry-comments").prepend("<div class='ry-chat-container darker ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><p class='ry-no-paa ry-txt-comments'>" + res[conter][1] + "</p><span class='time-left'>" + res[conter][2] + "</span></div></div>");
                                                                    } else {
                                                                        $(".ry-comments").prepend("<div class='ry-chat-container darker ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><audio controls class='ry-r-voice'><source src='https://4khooneh.org/" + res[conter][1] + "' type='audio/wav'></audio><span class='time-left'>" + res[conter][2] + "</span></div></div>")
                                                                    }
                                                                } else {
                                                                    if (res[conter][3] === "txt") {
                                                                        $(".ry-comments").prepend("<div class='ry-chat-container ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><p class='ry-no-paa ry-txt-comments'>" + res[conter][1] + "</p><span class='time-left'>" + res[conter][2] + "</span></div></div>");
                                                                    }
                                                                    else {
                                                                        $(".ry-comments").prepend("<div class='ry-chat-container ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><audio controls class='ry-r-voice'><source src='https://4khooneh.org/" + res[conter][1] + "' type='audio/wav'></audio><span class='time-left'>" + res[conter][2] + "</span></div></div>");
                                                                    }
                                                                }
                                                                conter++;
                                                            }
                                                        }
                                                    })
                                                }, 3000);
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
                                                        url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
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
                                                            $(".ry-comments").prepend("<div class='ry-chat-container darker ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + logo_src + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + user_names + " </p><p class='ry-no-paa ry-txt-comments'>" + coment + "</p><span class='time-left'>" + hour + ":" + time + "</span></div></div>");
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
                                <div id="col-12" class="ck-page-right-menu-img std-att">
                                    <p class="text-right ry-hozar"><span>حاضرین در کلاس:</span><span
                                                id="ry-teddad"></span>
                                    </p>
                                    <script>
                                        setInterval(hozar, 20000);

                                        function hozar() {
                                            var numItems_std = $(".ry-s-c").length;
                                            $("#ry-teddad").html(numItems_std + " نفر");
                                        }
                                    </script>
                                    <?php
                                    if ($all_user = get_post_meta($teache_live_page_id, 'all_users', true)) {
                                        $all_user = unserialize($all_user);
                                        foreach ($all_user as $us) {
                                            ?>
                                            <div class="col-lg-1 col-4 float-right ry-s-c text-center">
                                                <img alt="" class="ry-img-show-onlone" src="<?php echo $us[2] ?>">
                                                <p class="text-center ry-name-std"><?php echo $us[3] ?></p>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <script>
                                        setInterval(get_student_new_attend_class, 30000);

                                        function get_student_new_attend_class() {
                                            var numItems_std = $(".ry-s-c").length;
                                            $.ajax({
                                                type: 'POST',
                                                url: '<?php bloginfo("template_url") ?>/get_student_new_attend_class.php',
                                                data: {
                                                    action: 'get_student_new_attend_class',
                                                    t_p: <?php echo $teache_live_page_id?>,
                                                    numItems_std: numItems_std,

                                                },
                                                beforeSend: function () {
                                                },
                                                success: function (res) {
                                                    res = JSON.parse(res);
                                                    var counter = 0;
                                                    while (res[counter]) {
                                                        $(".std-att").append("<div class='col-lg-1 col-4 float-right ry-s-c text-center'><img alt='" + res[counter][3] + "' class='ry-img-show-onlone' src='" + res[counter][2] + "'><p class='text-center ry-name-std'>" + res[counter][3] + "</p></div>")
                                                        counter++;
                                                    }

                                                }
                                            })

                                        }
                                    </script>
                                </div>
                                <div class="clear"></div>
                                <div class="ck-all-page-content">
                                    <?php
                                    //                                $my_postid = $_REQUEST['page_id'];
                                    $content_post = get_post($teache_live_page_id);
                                    $content = $content_post->post_content;
                                    echo do_shortcode($content)
                                    ?>
                                </div>
                                <div class="ck-comment-header">
                                    <img src="<?php bloginfo('url'); ?>/img/comment-icom.png" alt="نظرات">
                                    <h3>ارسال دیدگاه(نظرات، انتقادات و پیشنهادات خود را با ما در میان بگذارید.)</h3>
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
                            <div class="clear"></div>
                        </div>

                        <?php include("ck-footer-pages.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>