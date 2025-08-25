<?php include("header.php");
$cat = $post->post_category[0];
$cat1 = $post->post_category[1];
$cat = get_cat_name($cat);
$cat1 = get_cat_name($cat1);
if ($cat1 == 'اخبار') {
    $cat = "اخبار";
}
setPostViews(get_the_ID());
$post_author_id = get_post_field('post_author', $post->ID);
$has_not_ostad = get_post_meta($post->ID, 'بدون استاد', true);
?>
    <!--    <script src="--><?php //bloginfo('template_url'); ?><!--/js/jquery.min.js"></script>-->
    <link href="<?php bloginfo('template_url') ?>/js/video-js.css" rel="stylesheet">
    <script src='<?php bloginfo('template_url') ?>/js/videonew.js'></script>
    <script src="<?php bloginfo('template_url') ?>/js/videojs-resolution-switcher.js"></script>
    <div>
        <div>
            <div class="ck-page-container ">
                <div class="ck-page-show ">
                    <?php
                    global $post, $product;
                    $title = $post->post_title;
                    ?>
                </div>
                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <?php include("ck-page-rightside-bar.php"); ?>
                        </div>
                        <article class="ck-page-article">
                            <?php
                            if ($cat != "اخبار") {
                                ?>
                                <div class="col-lg-12 text-center">
                                    <div class="ry-video-contentt">
                                        <div class="ry-head-video">
                                            <div class="ry-right-v-h"></div>
                                            <h1><?php if ($has_not_ostad !== "ok") { ?><span
                                                        class="ry-ff1">فیلم آموزشی </span><?php } ?>
                                                <span class="ry-ff2"><?php the_title() ?></span>
                                            </h1>
                                            <div class="ry-left-v-h"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php

                                if ($has_not_ostad !== "ok") {
                                    ?>
                                    <div class=" ry-ostad-content">
                                        <div class="col-lg-3 ostad-pic float-right">
                                            <?php
                                            if (get_user_meta($post_author_id, 'logo', true)) {
                                                $logo_src = get_home_url() . "/" . get_user_meta($post_author_id, 'logo', true);
                                            } else {
                                                $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                            }
                                            ?>
                                            <?php if (get_user_meta($post_author_id, 'nickname', true)) {
                                                $ostad_name = get_user_meta($post_author_id, 'nickname', true);
                                            } ?>
                                            <img class="ry-o-p"
                                                 src="<?php echo $logo_src ?>"
                                                 alt="<?php echo $ostad_name ?>"
                                                 title="<?php echo $ostad_name ?>">

                                            <div class="col-lg-12 ry-dore-time">
                                                <?php
                                                if (get_post_meta($post->ID, 'فیلم ها', true)) {
                                                    $marahel = get_post_meta($post->ID, 'فیلم ها', true);
                                                    $marahel = unserialize($marahel);
                                                    $time_all = 0;
                                                    foreach ($marahel as $mr) {
                                                        $time_all += (int)$mr[5];
                                                    }
                                                }
                                                ?>
                                                <span class="ry-y-span"><i class="fa fa-clock"></i></span>
                                                <span>
                                                        <?php
                                                        if (((int)($time_all / 60)) > 0) {
                                                            echo (int)($time_all / 60);
                                                            echo " ساعت و ";
                                                            echo $time_all % 60;
                                                            echo " دقیقه ";
                                                        } else {
                                                            echo $time_all;
                                                            echo " دقیقه ";
                                                        }

                                                        ?>
                                                            </span>
                                            </div>
                                            <div class="ry-post-rating">

                                                <p><span class="">امتیاز</span><span class="">به این صفحه</span></p>
                                                <div class="col-lg-12">
                                                    <?php if (function_exists('the_ratings')) {
                                                        the_ratings();
                                                    } ?></div>
                                                <div class="col-12">
                                                    <div class="col-lg-16 float-right text-left ry-viewww">
                                                    <span>
                                                        <i class="fa fa-clock"></i>
                                                        <?php echo get_the_date(); ?>
                                                    </span>
                                                    </div>
                                                    <div class="col-lg-16 float-left text-left ry-viewww">
                                                     <span>
                                                     <i class="fa fa-eye"></i>
                                                     </span>
                                                        <span>
                                                        <?php
                                                        $viewers = get_post_meta($post->ID, 'post_views_count', true);
                                                        echo $viewers;
                                                        ?>
                                                    </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-9 ry-ostaad-bio float-right">
                                            <h2><span class="ry-ff1">نام استاد:</span><span
                                                        class="ry-ff2"><?php echo $ostad_name ?></span></h2>
                                            <p class="ry-ostad-biography">
                                                <?php if (get_user_meta($post_author_id, 'about-us', true)) {
                                                    echo $kholase = get_user_meta($post_author_id, 'about-us', true);
                                                } ?>
                                            </p>
                                            <?php
                                            if (get_post_meta($post->ID, 'فروش', true)) {
                                                $product_id_sell = get_post_meta($post->ID, 'فروش', true);
                                                $url = get_permalink($product_id_sell);
                                                ?>

                                                <button id="ry-film-add-to-shop"
                                                        class=" ry-m1 ry-btn-add-to-cart single_add_to_cart_button add-to-cart"
                                                        onclick="location.replace('<?php echo $url ?>')">

                                                        <span> <i class="fa fa-cart-arrow-down"></i><span
                                                                    class="ry-a-t-c-t">خرید کلیه قسمت های این فیلم آموزشی</span> </span>
                                                </button>
                                                <?php

                                            }
                                            ?>

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($pod4 = get_post_meta($post->ID, 'پودمان 4', true)) {
                                    ?>
                                    <div class="col-lg-12">
                                        <div class="col-lg-12 ry-dore-time pod-4">
                                            <span class="ry-y-span"><i class="fa fa-eye"></i></span>
                                            <?php
                                            if ($pod4_title = get_post_meta($post->ID, 'اسم پودمان 4', true)) {

                                                echo '<span>' . $pod4_title . '</span>';
                                            } else {
                                                ?>
                                                <span>مشاهده پودمان 4 به صورت رایگان(کلیک کنید)</span>
                                                <?php
                                            }
                                            ?>


                                        </div>
                                        <script>
                                            $(".pod-4").click(function () {
                                                // alert('ok');
                                                $('html, body').animate({
                                                    scrollTop: $("#podman4").offset().top - 150
                                                }, 1500);
                                            });
                                        </script>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                if (get_post_meta($post->ID, 'فیلم ها', true)) {
                                    $marahel = get_post_meta($post->ID, 'فیلم ها', true);
                                    $marahel = unserialize($marahel);
                                    $i = 0;
                                    $j = 1;
                                    $sts = true;
                                    foreach ($marahel as $mr) {
                                        if ($i == 6) $i = 0;
                                        ?>
                                        <div class="col-lg-12 ry-videooos ry-v-<?php echo $i ?>  <?php if ($mr[1] == "" && $mr[2] == "" && $mr[3] == "") {
                                            echo 'ry-grayyy';
                                        } ?>">
                                            <div class="col-lg-6 float-right ry-video-detail">
                                                <div class="ry-v-c-h">

                                                    <div class="ry-point"
                                                        <?php
                                                        $pod4 = get_post_meta($post->ID, 'پودمان 4', true);
                                                        if ($pod4 && $j == $pod4) echo 'id="podman4"' ?>
                                                    >
                                                        <?php echo $j ?></div>
                                                    توضیحات
                                                </div>
                                                <p class="ry-film-biography"><?php echo $mr[4] ?></p>
                                                <?php if ($mr[1] == "" && $mr[2] == "" && $mr[3] == "" && $sts == true) {
                                                    if (get_post_meta($post->ID, 'فروش', true)) {
                                                        $product_id_sell = get_post_meta($post->ID, 'فروش', true);
                                                        $url = get_permalink($product_id_sell);
                                                        $sts = false
                                                        ?>
                                                        <button id="ry-film-add-to-shop1"
                                                                class=" ry-m1 ry-btn-add-to-cart single_add_to_cart_button add-to-cart"
                                                                onclick="location.replace('<?php echo $url ?>')">

                                                        <span> <i class="fa fa-cart-arrow-down"></i><span
                                                                    class="ry-a-t-c-t">خرید کلیه قسمت های این فیلم آموزشی</span> </span>
                                                        </button>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div class="col-lg-6 float-right ry-main-video">
                                                <div class="ry-v-c-t">
                                                    <span><?php echo $mr[0] ?></span>
                                                </div>
                                                <div class="ry-video-gh">
                                                    <?php if ($mr[1] == "" && $mr[2] == "" && $mr[3] == "") {
                                                        ?>
                                                        <img class="no-video" src="<?php echo $mr[6] ?>">
                                                        <div class="ry-loock"><i class="fa fa-lock"></i></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <video id="video<?php echo $j ?>"
                                                               class="ry-vv video-js vjs-default-skin" width="1000"
                                                               controls
                                                               data-setup='{}' poster=" <?php echo $mr[6] ?>">
                                                            <source src=" <?php echo $mr[3] ?>"
                                                                    type='video/mp4' label='کیفیت 800'/>
                                                            <source src=" <?php echo $mr[2] ?>"
                                                                    type='video/mp4' label='کیفیت 480'/>
                                                            <source src=" <?php echo $mr[1] ?>"
                                                                    type='video/mp4' label='کیفیت 240'/>
                                                        </video>
                                                        <?php
                                                    } ?>


                                                </div>
                                                <div class="lock-status float-right">
                                                    <i class="fa fa-unlock"></i>
                                                    <span>برای </span><span
                                                            class="ry-y-span">مشاهده </span><span>کلیک کنید</span>
                                                </div>
                                                <div class="ry-time-c float-right">
                                                    <i class="fa fa-clock"></i>
                                                    <span class="ry-y-span"> <?php echo $mr[5] ?></span><span> دقیقه</span>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <?php
                                        $i++;
                                        $j++;
                                    }
                                }
                                ?>
                                <div class="clear"></div>
                            <?php } ?>
                            <script>
                                <?php
                                $f = 1;
                                foreach ($marahel  as $mr) {
                                if($mr[1] != "" && $mr[2] != "" && $mr[3] != ""){
                                ?>
                                videojs('video<?php echo $f?>').videoJsResolutionSwitcher();
                                <?php
                                $f++;
                                }
                                }
                                ?>
                            </script>

                            <?php
                            if ($cat != "اخبار") {
                                ?>
                                <?php
                                if ($pak = get_post_meta($post->ID, 'پکیج', true)) {

                                    ?>
                                    <div class="col-lg-12 ry-packk">
                                        <?php if ($pak_link = get_post_meta($post->ID, 'لینک پکیج', true)) { ?>
                                            <a href="<?php bloginfo('url') ?>/<?php echo $pak_link;?>">
                                                <img alt="پک آموزشی" src="<?php bloginfo('url') ?>/<?php echo $pak ?>">
                                            </a>
                                        <?php } else { ?>
                                            <img alt="پک آموزشی" src="<?php bloginfo('url') ?>/<?php echo $pak ?>">
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="col-lg-12 ry-all-btn">
                                    <div class="col-lg-3 col-6 float-right text-center ">
                                        <div id="ry-de" class="btn ry-package-active">
                                            <i class="fa fa-info-circle"></i><span>جزئیات</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6 float-right text-center">
                                        <div id="ry-comment" class="btn">
                                            <i class="fa fa-comment"></i><span>نظرات کاربران</span>
                                        </div>
                                    </div>


                                    <div class="clear"></div>
                                    <script>
                                        $(".btn").click(function () {
                                            $(".ry-all-btn").find(".ry-package-active").removeClass("ry-package-active");
                                            $(this).addClass("ry-package-active");
                                        });
                                    </script>
                                </div>
                            <?php } ?>

                            <div class="ry-page-content  col-12 padd00 ry-m-0">

                                <div id="ry-p-d"
                                     class="col-lg-12 ry-product-detail text-right ry-star-khadamat-content">
                                    <?php
                                   the_content()
                                    ?>
                                   
                                    <div class="col-lg-12 ry-all-page-tag">
                                        <p class="text-right">برچسب ها</p>
                                        <?php
                                        $tags = get_the_tags();

                                        echo '<ul >';
                                        foreach ($tags as $tag) {
                                            $tag_link = get_tag_link($tag->term_id);
                                            echo '<li class="float-right"> <a href="' . $tag_link . '"># ' . $tag->name . ' </a> </li>';
                                        }
                                        echo '</ul>';


                                        ?>

                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div id="ry-p-attr"
                                     class="col-lg-12 ry-product-detail text-right ry-star-khadamat-content">
                                    <div class="ck-tozih">

                                        <div class="swiper-container1" dir="rtl">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <!-- Slides -->
                                                <div class="swiper-slide lazy ">

                                                    <img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/10/5cb219d3-5817-42e9-8c24-462c37cb881d-150x150-2.jpg "
                                                         alt="روزبه یگانه">
                                                    <span>روزبه یگانه</span>

                                                    <span>پشتیبان فنی سایت</span>

                                                    <div class="call">
                                                        <i class="icon-call-2"></i>
                                                        <div class="seller_mobile">
                                                            <a class="seller_mobile_link" href="tel:+989125871319"
                                                               tabindex="0">
                                                                09125871319 </a>
                                                        </div>

                                                        <div class="seller_tell">
                                                            <a class="seller_tell_link" href="tel:+989125871319"
                                                               tabindex="0">09125871319</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                            <div class="swiper-button-next1"></div>
                                            <div class="swiper-button-prev1"></div>
                                            <div class="swiper-scrollbar"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ry-p-comment"
                                     class="col-lg-12 ry-product-detail text-right ry-star-khadamat-content">
                                    <?php comments_template(); ?>
                                </div>
                                <script>
                                    $("#ry-de").on("click", function () {
                                        $(".ry-star-khadamat-content").slideUp("fast");
                                        $("#ry-p-d").slideDown("fast");
                                    });
                                    $("#ry-attr").on("click", function () {
                                        $(".ry-star-khadamat-content").slideUp("fast");
                                        $("#ry-p-attr").slideDown("fast");
                                    });
                                    $("#ry-comment").on("click", function () {
                                        $(".ry-star-khadamat-content").slideUp("fast");
                                        $("#ry-p-comment").slideDown("fast");
                                    });
                                </script>
                                <?php
                                if ($cat != "اخبار") {
                                    ?>
                                    <div class="col-lg-12 ry-product-detail ry-shadow">
                                        <script>
                                            window.onload = function () {
                                                var mySwiper2 = new Swiper('.swiper-container2', {
                                                    // Optional parameters
                                                    direction: 'horizontal',
                                                    autoplay: false,
                                                    slidesOffsetBefore: 0,
                                                    slidesOffsetAfter: 0,
                                                    speed: 200,
                                                    spaceBetween: 30,
                                                    slidesPerView: 5,
                                                    loop: false,
                                                    grabCursor: true,
                                                    navigation: {
                                                        nextEl: '.swiper-button-next2',
                                                        prevEl: '.swiper-button-prev2'
                                                    },
                                                    lazy: true,
                                                    breakpoints: {
                                                        300: {
                                                            slidesPerView: 2,
                                                            spaceBetween: 10
                                                        },
                                                        500: {
                                                            slidesPerView: 2,
                                                            spaceBetween: 15

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
                                            };
                                        </script>
                                        <div class="ry-section" id="section">
                                            <div class="swiper-container swiper-container2" dir="rtl">
                                                <h6 class="text-justify ry-orange ry-h4">
                                                    <i class="fa fa-newspaper"></i><span> مطالب مرتبط </span><span><?php echo $post->post_title ?></span>
                                                    <?php
                                                    $cat = $post->post_category[0];
                                                    $cat = get_cat_name($cat);
                                                    ?>
                                                </h6>
                                                <!-- Additional required wrapper -->
                                                <div class="swiper-wrapper swiper-wrapper2 ry-mmmm">
                                                    <?php
                                                    $args = array(
                                                        'posts_per_page' => 10,
                                                        'category_name' => $cat,
                                                        'post_status' => "publish",
                                                        'post_type' => "post"
                                                    );
                                                    $loop = new WP_Query($args);
                                                    if ($loop->have_posts()) {
                                                        while ($loop->have_posts()) : $loop->the_post();
                                                            ?>
                                                            <div class="swiper-slide lazy mahsol text-center">
                                                                <a href="<?php the_permalink() ?>" rel="bookmark"
                                                                   title="<?php the_title_attribute(); ?>">
                                                                    <div class="ry-carosel ry-carosel-s ">
                                                                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID), 'medium'); ?>
                                                                        <img class="lazy ry-main-pic"
                                                                             alt="<?php echo $loop->post->post_title; ?>"
                                                                             src="<?php bloginfo('url'); ?>/img/lazyloud.jpg"
                                                                             data-src="<?php echo $image[0]; ?> ">
                                                                        <p><?php the_title_attribute(); ?></p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        <?php
                                                        endwhile;
                                                    }
                                                    wp_reset_postdata();
                                                    ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>

                                <?php
                                if ($cat == "اخبار") {
                                    ?>
                                    <div class="col-lg-12 ry-product-detail text-right ry-star-khadamat-content">
                                        <?php comments_template(); ?>
                                    </div>
                                <?php } ?>
                        </article>

                        <div class="clear"></div>
                        <?php include("ck-footer-pages.php"); ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>

<?php include("footer.php") ?>