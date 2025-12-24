<?php include("header.php");
$product = wc_get_product($post->ID);
$u2 = $t2 = $t1 = $product->get_attribute('maghta');
$u1 = $t1 = $t1 = $product->get_attribute('paye');
$is_ketab_darsi = "no";
$is_ketab_darsi = get_post_meta($post->ID, 'کتاب درسی', true);
setPostViews(get_the_ID());

?>
    <div>
        <div>
            <div class="ck-page-container ">
                <div class="ck-page-show ">
                    <div class="ck-page-show-container ck-col-container">
                        <ul>
                            <li><a><?php echo $t2; ?></a></li>
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            <li>
                                <a><?php echo $t1; ?></a>
                            </li>
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            <li><a href="#"><?php the_title(); ?></a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <?php include("ck-page-rightside-bar.php") ?>
                        </div>
                        <article class="ck-page-article">
                            <div class="ck-book-name">
                                <img class="ck-rights " alt="right"
                                     src="<?php bloginfo('url'); ?>/img/mosalas%20left.png">
                                <img class="ck-lefts " alt="left"
                                     src="<?php bloginfo('url'); ?>/img/mosalas%20right.png">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="ck-book-characteristic ">
                                <?php if (get_post_meta($post->ID, "فروشگاهی", true) !== "ok") { ?>
                                    <div class="ck-book-image position-relative ">
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
                                            $film_kind = get_post_meta($post->ID, 'فیلم', true);
                                            if (!$film_kind && $film_kind != 'ok') {
                                                ?>
                                                <div class="page four"><img class="" alt="<?php the_title(); ?>"
                                                                            src-m="<?php echo $image_link[3]; ?>"
                                                                            src="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                                </div>
                                                <div class="page three"><img class="" alt="<?php the_title(); ?>"
                                                                             src="<?php echo $image_link[2]; ?>"
                                                                             src-m="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                                </div>
                                                <div class="page two"><img class="" alt="<?php the_title(); ?>"
                                                                           src="<?php echo $image_link[1]; ?>"
                                                                           src-m="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                                </div>
                                                <div class="page one"><img class="" alt="<?php the_title(); ?>"
                                                                           src="<?php echo $image_link[0]; ?>"
                                                                           src-m="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                                </div>
                                            <?php } ?>
                                            <div
                                                class="ck-cover <?php if (!$film_kind && $film_kind != 'ok') echo 'front' ?> ck-itemeees">
                                                <img id="ry-coovv" class=""
                                                     alt="<?php the_title(); ?>"
                                                     src="<?php echo $image_product; ?>"
                                                     src-m="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
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
                                <?php } else {
                                ?>

                                    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
                                    <script
                                        src='<?php bloginfo('template_url') ?>/js/jquery.elevateZoom-3.0.8.min.js'></script>
                                <?php
                                $image_id = $product->get_image_id();
                                $image_attributes = wp_get_attachment_image_src($image_id);
                                $image_attributes[0] = substr($image_attributes[0], 0, strlen($image_attributes[0]) - 12);
                                $image_product = $image_attributes[0] . ".jpg";
                                $large_pic = get_post_meta($post->ID, 'large', true);
                                ?>
                                    <div class="ck-book-image">
                                        <div class="ck-frame ry--ry-items">
                                            <div class="ck-cover  ck-itemeees">
                                                <img id="ry-coovv" class="lazy"
                                                     alt="<?php the_title(); ?>"
                                                     src='<?php echo $image_product ?>'
                                                     data-zoom-image="<?php echo $large_pic ?>"/>
                                                <script>
                                                    $('#ry-coovv').elevateZoom({
                                                        zoomType: "window",
                                                        cursor: "crosshair",
                                                        zoomWindowFadeIn: 50,
                                                        zoomWindowFadeOut: 50
                                                    });
                                                </script>
                                            </div>
                                            <div class="clear"></div>

                                        </div>
                                        <div class="col-lg-10 col-md-10 col-12 p-0">
                                            <div class="ry-img-zoom-container">
                                                <i class="fa fa-times ry-close"></i>
                                                <img id="tumb1" class=" ry-close-img"
                                                     src="<?php bloginfo("template_url"); ?>/img/aroos.jpg">
                                                <i class="fa fa-close ry-close"></i>
                                                <i class="fa fa-angle-right ry-right-img"></i>
                                                <i class="fa fa-angle-left ry-left-img"></i>
                                            </div>
                                            <?php
                                            $i = 0;
                                            $count = 0;
                                            //                                                $attachment_ids = $product->get_gallery_attachment_ids();
                                            $attachment_ids = $product->get_gallery_image_ids();
                                            foreach ($attachment_ids as $attachment_id) {
                                                $image_link[$i] = wp_get_attachment_url($attachment_id);
                                                ?>
                                                <div class="col-lg-3 col-3 p-1 float-right ry-img-gallery">
                                                    <img class="ry-gallery thumbnail" id='tm<?php echo $count ?>'
                                                         src="<?php echo $image_link[$i]; ?>">
                                                </div>
                                                <?php
                                                $i++;
                                                $count++;
                                            }
                                            ?>
                                            <script>
                                                $(".ry-close").click(function () {
                                                    $(".ry-img-zoom-container").slideUp();
                                                });
                                                $(".ry-close-img").click(function () {
                                                    $(".ry-img-zoom-container").slideUp();
                                                });
                                                $("body").keydown(function (e) {
                                                    if (e.keyCode === 37) { // left
                                                        id++;
                                                        if ((id > max)) {
                                                            id = 0;
                                                        }
                                                        var src = $("#tm" + (id)).attr("src");
                                                        $(".ry-close-img").attr("src", src);
                                                    } else if (e.keyCode === 39) { // right
                                                        id--;
                                                        if (id < 0) {
                                                            id = max;
                                                        }
                                                        var src = $("#tm" + (id)).attr("src");
                                                        $(".ry-close-img").attr("src", src);
                                                    } else if (e.keyCode === 27) { // esc
                                                        $(".ry-img-zoom-container").slideUp();
                                                    }
                                                });

                                                $(".ry-right-img").click(function () {
                                                    id++;
                                                    if ((id > max)) {
                                                        id = 0;
                                                    }
                                                    var src = $("#tm" + (id)).attr("src");
                                                    $(".ry-close-img").attr("src", src);

                                                });
                                                $(".ry-left-img").click(function () {
                                                    id--;
                                                    if (id < 0) {
                                                        id = max;
                                                    }
                                                    var src = $("#tm" + (id)).attr("src");
                                                    $(".ry-close-img").attr("src", src);

                                                });
                                                var id;
                                                var max;
                                                $(".thumbnail").click(function () {
                                                    var imgzoom = $(this).attr("src");
                                                    id = $(this).attr('id');
                                                    id = id.substr(id.length - 1);
                                                    id = parseInt(id);
                                                    //alert(id + 1);
                                                    $(".ry-close-img").attr("src", imgzoom);
                                                    $(".ry-img-zoom-container").slideDown();
                                                });
                                                if ($('#tm3').length > 0) {
                                                    max = 3;
                                                } else if ($('#tm2').length > 0) {
                                                    max = 2;
                                                } else if ($('#tm1').length > 0) {
                                                    max = 1;
                                                }

                                            </script>
                                            <div class="clear"></div>
                                        </div>

                                    </div>
                                    <?php
                                } ?>
                                <div class="ck-book-content">
                                    <div class="col-lg-12 float-left ry-p-d-l">
                                        <?php if ($product->is_in_stock()) {
                                            ?>

                                            <div class="ry-p-st <?php if ($is_ketab_darsi == 'ok') echo 'd-none' ?>">
                                                <span>موجود در انبار</span>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div
                                                class="ry-p-st ry-reed <?php if ($is_ketab_darsi == 'ok') echo 'd-none' ?>">
                                                در انبار موجود نیست
                                            </div>
                                            <?php
                                        } ?>
                                        <div class="col-lg-12 ry-product-detail">
                                            <div class=" ry-p-i text-center">

                                            </div>
                                            <div class=" text-center col-lg-12 ry-m1  ry-22-mm">
                                                <?php if ($product->get_attribute('adress-file')) { ?>
                                                    <div class="col-lg-4  float-right">
                                                        <a target="_blank ck-pdf"
                                                           href="<?php bloginfo('url') ?>/<?php echo $product->get_attribute('adress-file') ?>">
                                                            <div class="ry-show-content col-lg-12 text-right  ry-fir-d">
                                                                مشاهده چند صفحه
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php } ?>
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
                                                                $tt = " دریافت از طریق دانلود (حجم نیم بها)";
                                                            } else {
                                                                $tt = "دریافت DVD درب منزل (سه الی پنج روز کاری)";
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
                                                                <span
                                                                    class="ry-p-n"><?php echo number_format($r_p[$ii]) ?></span><span
                                                                    class="ry-p-t">تومان</span>
                                                            </p>
                                                        </div>
                                                        <?php if ((1 - ($product->get_price() / $product->get_regular_price())) != 0) {
                                                            ?>
                                                            <div class="ry-price ry-bargains float-right">
                                                                <p class="text-right ry-t1">تخفیف:</p>

                                                                <p><span class="ry-p-n ry-redd">%</span>
                                                                    <span
                                                                        class="ry-p-n ry-redd"><?php echo intval((1 - ((int)($d_p[$ii]) / (int)($r_p[$ii]))) * 100) ?></span>
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
                                                                <span
                                                                    class="ry-p-n ry-lp"><?php echo number_format($d_p[$ii]) ?></span>
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

                                                                    <button
                                                                        class="ry-m1 ry-btn-add-to-cart <?php if (!$assest_product->is_in_stock()) echo 'ry-grayscale'; else echo 'single_add_to_cart_button add-to-cart'; ?>"
                                                                        data-toggle="modal"
                                                                        rel="<?php echo $v_id[$ii]; ?>"
                                                                    >
                                                                             <span> <i
                                                                                     class="fa fa-cart-arrow-down"></i>
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
                                                                        <button
                                                                            class=" ry-m1 add-to-cart ry-download-file"
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
                                                                                    محصول مورد نظر شما با موفقیت به
                                                                                    سبد
                                                                                    خریدتان وارد
                                                                                    شد.</h5>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                آیا میخواهید سبد خرید را مشاهده کنید
                                                                                و خرید
                                                                                را تکمیل
                                                                                نمایید؟
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">خیر
                                                                                </button>
                                                                                <button
                                                                                    onclick="setTimeout( delay, 1500 );"
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
                                                            </div>
                                                            <div class="clear"></div>
                                                            <?php
                                                        } else {
                                                            $link_buy = $product->get_attribute('لینک-خرید');
                                                            if (!empty($link_buy)) {
                                                            ?>
                                                                <div class="ry-addddd text-right">
                                                                    <a target="_blank" href="https://ketabonline.ir/product/<?php echo ($link_buy); ?>" target="_blank">
                                                                        <div class="col-lg-12 ry-m1 ry-btn-add-to-cart ry-enable ">
                                                                            <span> <i class="fa fa-cart-arrow-down"></i>
                                                                                <span class="ry-a-t-c-t">خرید بسته</span>
                                                                            </span>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                             <?php
                                                            } else {
                                                               ?>

                                                                <div class="ry-addddd text-right">
                                                                    <div
                                                                        class="col-lg-12 ry-m1 ry-btn-add-to-cart ry-disable ">
                                                                    <span> <i class="fa fa-cart-arrow-down"></i>
                                                                        <span class="ry-a-t-c-t">غیر موجود</span>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
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
                                                                    <span
                                                                        class="ry-p-n"><?php echo number_format($r_p[0]) ?></span><span
                                                                        class="ry-p-t">تومان</span>
                                                                </p>

                                                                <?php
                                                            } else {
                                                                ?>
                                                                <p>
                                                                    <span
                                                                        class="ry-p-n"><?php echo number_format($product->get_regular_price()) ?></span><span
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
                                                                    <p><span class="ry-p-n ry-redd">%</span><span
                                                                            class="ry-p-n ry-redd"><?php echo intval((1 - ((int)($d_p[0]) / (int)($r_p[0]))) * 100) ?></span>
                                                                    </p>

                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <p><span class="ry-p-n ry-redd">%</span><span
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
                                                                <span
                                                                    class="ry-p-n ry-lp"><?php echo number_format($product->get_price()) ?></span>
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
                                                <?php if ($is_ketab_darsi != "ok") {
                                                ?>
                                                    <div class="col-lg-7 float-right">
                                                        <?php
                                                        if ($product->get_attribute('نویسنده')) {
                                                            ?>
                                                            <p class="author">
                                                                <i class="fa fa-user-edit"></i><span>نویسنده:</span>
                                                                <span><?php echo $product->get_attribute('نویسنده') ?></span>
                                                            </p>
                                                        <?php }
                                                        if ($product->get_attribute('شابک')) {
                                                            ?>
                                                            <div class="author">
                                                                <i class="fa fa-book float-right"></i>
                                                                <span class="float-right">شابک:</span>
                                                                <p class="float-right"><?php echo $product->get_attribute('شابک') ?></p>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <?php
                                                        }
                                                        if ($product->get_attribute('tedad-safehat')) {
                                                            ?>
                                                            <div class="author">
                                                                <i class="fa fa-book float-right"></i>
                                                                <span class="float-right">تعداد صفحات:</span>
                                                                <p class="float-right"><?php echo $product->get_attribute('tedad-safehat') ?></p>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <?php
                                                        }
                                                        if ($product->get_attribute('ناشر')) {
                                                            ?>
                                                            <div class="author">
                                                                <i class="fa fa-book-open float-right"></i>
                                                                <span class="float-right">ناشر:</span>
                                                                <p class="float-right"><?php echo $product->get_attribute('ناشر') ?></p>
                                                                <div class="clear"></div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php
                                                        if ($product->get_attribute('جنسیت')) {
                                                            ?>
                                                            <div class="author">
                                                                <i class="fa fa-neuter float-right"></i>
                                                                <span class="float-right">جنسیت:</span>
                                                                <p class="float-right"><?php echo $product->get_attribute('جنسیت') ?></p>
                                                                <div class="clear"></div>
                                                            </div>
                                                        <?php }
                                                        if ($product->get_attribute('گروه-سنی')) {
                                                            ?>
                                                            <div class="author">
                                                                <i class="fa fa-baby float-right"></i>
                                                                <span class="float-right">گروه سنی:</span>
                                                                <p class="float-right"><?php echo $product->get_attribute('گروه-سنی') ?></p>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <?php
                                                        } ?>

                                                    </div>
                                                <?php }
                                                ?>
                                                <?php if ($product->is_in_stock()) {
                                                ?>
                                                <?php
                                                if ($product->is_type('variable')) {
                                                ?>
                                                    <div class="col-lg-6  float-right ry-downloa-or-buy ">
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
                                                    <div class="col-lg-5 p-0 float-left ry-addddd text-right">
                                                        <?php
                                                        if ($is_ketab_darsi != "ok") {
                                                            ?>
                                                            <button
                                                                class=" ry-m1 ry-btn-add-to-cart single_add_to_cart_button add-to-cart"
                                                                data-toggle="modal"
                                                                data-target="#exampleModalCenter"
                                                                rel="<?php echo $product->get_id() ?>">
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
                                                    //ok
                                                    $link_buy = $product->get_attribute('لینک-خرید');
                                                    if (!empty($link_buy)) {
                                                    ?>
                                                        <div class="ry-addddd text-right">
                                                            <a target="_blank" href="https://ketabonline.ir/product/<?php echo ($link_buy); ?>" target="_blank">
                                                                <div class="col-lg-12 ry-m1 ry-btn-add-to-cart ry-enable ">
                                                                    <span> <i class="fa fa-cart-arrow-down"></i>
                                                                        <span class="ry-a-t-c-t">خرید این بسته</span>
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
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
                                                     }
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


                                            <script
                                                src='<?php bloginfo('template_url') ?>/js/jq/jquery-ui.min.js'></script>
                                            <script
                                                src="<?php bloginfo('template_url') ?>/js/add.js?v=1.3.3.9"></script>

                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                                <div class="col-lg-12 ry-kh-rz">
                                    <div class="col-3  text-center col-lg-3 float-right">
                                        <img class="ry-im-res"
                                             src="<?php bloginfo('url') ?>/wp-content/uploads/2020/10/1-1.png">
                                        <p class="ry-c-kh text-center">ارسال رایگان به سراسر ایران</p>
                                    </div>
                                    <div class="col-3  text-center col-lg-3 float-right">
                                        <img class="ry-im-res"
                                             src="<?php bloginfo('url') ?>/wp-content/uploads/2020/10/2-1.png">
                                        <p class="ry-c-kh text-center">پشتیبانی تلفنی</p>
                                    </div>
                                    <div class="col-3  text-center col-lg-3 float-right">
                                        <img class="ry-im-res"
                                             src="<?php bloginfo('url') ?>/wp-content/uploads/2020/10/3-1.png">
                                        <p class="ry-c-kh text-center">تحویل درب منزل</p>
                                    </div>
                                    <div class="col-3 text-center col-lg-3 float-right">
                                        <img class="ry-im-res text-center"
                                             src="<?php bloginfo('url') ?>/wp-content/uploads/2020/10/4-1.png">
                                        <p class="ry-c-kh">تضمین سلامت کالا</p>
                                    </div>
                                    <div class="clear"></div>

                                </div>

                                <div class="clear"></div>
                                <div class="ck-tozhihat-ketab">
                                    <div class="ck-tozihat-header">
                                        <h3>ویژگی‌های کتاب</h3>
                                    </div>
                                    <div class="ck-tozih">
                                        <!--------------------- content —-------------------->
                                        <?php
                                        // $content=$product->get_data();
                                        //print_r($content[description]) ;
                                        ?>
                                        <?php
                                        $my_postid = $_REQUEST['page_id'];
                                        $content_post = get_post($my_postid);
                                        $content = $content_post->post_content;

                                        ?>
                                        <?php echo do_shortcode($content) ?>
                                        <!----------- /content —----------------->
                                        <div
                                            class="col-lg-12 text-right"><?php echo do_shortcode("[addtoany]"); ?></div>
                                    </div>

                                </div>

                                <div class="ck-tozhihat-ketab ck-ketabhaye-moshabeh">
                                    <div class="ck-tozihat-header">
                                        <p class="f-14 text-white px-1">شاید شما اینها را هم دوست داشته باشید.</p>
                                    </div>
                                    <div class="ck-tozih">
                                        <script>
                                            //---------------------swiper book-----------------------------
                                            document.addEventListener('DOMContentLoaded', function () {
                                                var mySwiper1 = new Swiper('.swiper-container1', {
                                                    direction: 'horizontal',
                                                    slidesOffsetBefore: 0,
                                                    slidesOffsetAfter: 0,
                                                    slidesPerView: 5,
                                                    loop: false,
                                                    grabCursor: true,
                                                    navigation: {
                                                        nextEl: '.swiper-button-next1',
                                                        prevEl: '.swiper-button-prev1'
                                                    },
                                                    spaceBetween: 30,
                                                    lazy: true,
                                                    breakpoints: {
                                                        300: {
                                                            slidesPerView: 1
                                                        },
                                                        500: {
                                                            slidesPerView: 2

                                                        },
                                                        800: {
                                                            slidesPerView: 3,
                                                            slidesOffsetBefore: 0
                                                        },
                                                        1200: {
                                                            slidesPerView: 4,
                                                            slidesOffsetBefore: 0
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                        <div class="swiper-container1" dir="rtl">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <?php
                                                $crosssellProductIds = get_post_meta(get_the_ID(), '_crosssell_ids');
                                                $crosssellProductIds = $crosssellProductIds[0];
                                                foreach ($crosssellProductIds as $id):
                                                    $crosssellProduct = wc_get_product($id);

                                                    $image_attributes = wp_get_attachment_image_src($crosssellProduct->get_image_id());
                                                    $image_attributes[0] = substr($image_attributes[0], 0, strlen($image_attributes[0]) - 12);
                                                    $image_product = $image_attributes[0] . ".jpg";
                                                    $href = $crosssellProduct->get_permalink();
                                                    ?>
                                                    <div class="swiper-slide lazy "><a href="<?php echo $href; ?>"><img
                                                                class=""
                                                                src="<?php echo $image_product; ?> "
                                                                alt="<?php the_title(); ?>"></a>
                                                    </div>
                                                <?php
                                                    // echo "</pre>";
                                                endforeach;
                                                ?>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                            <div class="swiper-button-next1"></div>
                                            <div class="swiper-button-prev1"></div>
                                            <div class="swiper-scrollbar"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ck-comment-header">
                                    <img class="lazy" data-src="<?php bloginfo('url'); ?>/img/comment-icom.png">
                                    <h3>ارسال دیدگاه(نظرات، انتقادات و پیشنهادات خود را با ما در میان بگذارید.)</h3>
                                </div>
                                <script>
                                    $(".ck-comment-header").click(function () {
                                        var display = $(".ck-comment-content").css("display");
                                        if (display == "none") {
                                            $(".ck-comment-header").css("border-bottom", "0");
                                            $(".ck-comment-content").slideDown();
                                        } else {
                                            $(".ck-comment-content").slideUp();
                                            setTimeout(
                                                function () {
                                                    $(".ck-comment-header").css("border-bottom", "solid 6px red");
                                                }, 400);
                                        }
                                    });
                                </script>
                                <div class="ck-comment-content">
                                </div>

                                <div class="ck-comments">
                                    <?php comments_template(); ?>
                                </div>
                        </article>

                        <div class="clear"></div>
                        <?php include("ck-footer-pages.php") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>