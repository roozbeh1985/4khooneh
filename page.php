<?php include("header.php");
setPostViews(get_the_ID());
?>
    <div>
        <div>
            <div class="ck-page-container " id="ryMAinContainer">
                <div class="ck-page-show ">
                    <?php
                    global $post, $product;
                    $title = $post->post_title;
                    ?>
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
                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <?php include("ck-page-rightside-bar.php"); ?>
                        </div>
                        <article class="ck-page-article">
                            <?php
                            global $post;
                            if (get_post_meta($post->ID, 'allcat', true)) {
                                ?>
                                <div class="container mb-4 p-1">
                                    <div class="header_main">
                                    </div>
                                    <div class="row ">
                                        <?php

                                        $all_content = unserialize(get_post_meta($post->ID, 'allcat', true));
                                        foreach ($all_content as $content) {
                                            $color = 'white';
                                            if ($content['main'] == "ok")
                                                $color = $content['color'];
                                            ?>
                                            <div class="col-4 col-sm-2 col-md-2 px-3 px-sm-3 pt-1 pb-1 cursor ">
                                                <a href="<?php echo $content['link'] ?>">
                                                    <div style="background-color: <?php echo $color ?>"
                                                         class=" d-flex flex-column rounded-4 shadow p-sm-3 text-center ry-pointer ry-transaction ry-hoverScroll">
                                                        <img src="<?php echo $content['img'] ?>"
                                                             alt="<?php echo $content['txt'] ?>"
                                                             title="<?php echo $content['txt'] ?>"
                                                             class="mt-3 mx-auto" width="42">
                                                        <p class="mt-4 mb-3 f-12 text-dark"><?php echo $content['txt'] ?></p>
                                                    </div>
                                                </a>

                                            </div>
                                        <?php } ?>
                                    </div>


                                    <div class="clear"></div>
                                </div>
                                <?php
                            } ?>
                            <!--    loop for   product  -->
                            <div class="row">
                                <?php
                                if ($term = get_term_by('id', $id, 'product_cat')) {
                                    echo $term->name;
                                }
                                $args =
                                    array(
                                        'post_type' => 'product',
                                        'posts_per_page' => 100,
                                        'product_cat' => $post->post_title,
                                        "orderby" => 'meta_value_num',
                                        "meta_key" => 'post_views_count',
                                        "order" => 'DESC',);
                                $loop = new WP_Query($args);
                                $videoConter = 0;
                                while ($loop->have_posts()) : $loop->the_post();
                                    global $product;
                                    $regular_price = get_post_meta($loop->post->ID, '_regular_price', true);
                                    $final_price = get_post_meta($loop->post->ID, '_price', true);
                                    $coming_soon = get_post_meta($loop->post->ID, 'coming_soon', true);
                                    ?>

                                    <div class="col-lg-3 col-6">
                                        <a href="<?php echo get_permalink($loop->post->ID) ?>">
                                            <div class="ck-book  <?php if ($coming_soon == "ok") {
                                                echo "ry-comming-soon";
                                            } ?>">
                                                <?php if (((1 - ((int)($final_price) / (int)($regular_price))) * 100) != 0) { ?>
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

                                                        <span
                                                            class="ry-bargain">   <?php echo (int)((1 - ($d_p[0] / $r_p[0])) * 100) ?>
                                                            % </span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span
                                                            class="ry-bargain">   <?php echo round((1 - ($final_price / $regular_price)) * 100) ?> % </span>
                                                    <?php } ?>


                                                    <?php
                                                }
                                                if ($coming_soon == "ok") {
                                                    ?>
                                                    <span class="ry-comming-soon-ss"> در دست چاپ </span>
                                                    <?php
                                                }
                                                $image_id = $loop->post->ID;
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'single-post-thumbnail');

                                                ?>

                                                <div class="position-relative">
                                                    <?php if (get_post_meta($loop->post->ID, 'video', true)) {


                                                        ?>
                                                        <div class=" text-center ryMobPicArchive "
														onclick="mainClass.showVideoPop(event,`<?php echo $videoConter ?>`,`ryAll`)"
														>
                                                            <svg class="position-absolute playIcon ry-pointer"
                                                                 onclick="mainClass.showVideoPop(event,`<?php echo $videoConter ?>`,`ryAll`)"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 width="40" height="40" viewBox="0 0 71 87">
                                                                <g id="Polygon_22" data-name="Polygon 22"
                                                                   transform="translate(71) rotate(90)" fill="#fff">
                                                                    <path
                                                                        d="M 65.57472991943359 70.5 L 21.42526054382324 70.5 C 17.20494079589844 70.5 13.45411968231201 68.30171966552734 11.39181995391846 64.61959838867188 C 9.329509735107422 60.93747711181641 9.414569854736328 56.59076690673828 11.61935043334961 52.99215698242188 L 33.694091796875 16.96212768554688 C 35.80109024047852 13.52311706542969 39.46685028076172 11.46997737884521 43.5 11.46997737884521 C 47.53313827514648 11.46997737884521 51.19889831542969 13.52311706542969 53.305908203125 16.96212768554688 L 75.38065338134766 52.99215698242188 C 77.58542633056641 56.59076690673828 77.67048645019531 60.93746566772461 75.60819244384766 64.61959075927734 C 73.54588317871094 68.30171966552734 69.79505920410156 70.5 65.57472991943359 70.5 Z"
                                                                        stroke="none"></path>
                                                                    <path
                                                                        d="M 43.5 11.969970703125 C 39.6422004699707 11.969970703125 36.13581848144531 13.933837890625 34.12044143676758 17.22332763671875 L 12.04570007324219 53.25336456298828 C 9.936767578125 56.69551849365234 9.85540771484375 60.85323715209961 11.82804870605469 64.37525939941406 C 13.80068969726562 67.89729309082031 17.388427734375 70 21.42526245117188 70 L 65.57472991943359 70 C 69.611572265625 70 73.19931030273438 67.89728546142578 75.17195129394531 64.37525939941406 C 77.14459228515625 60.85322570800781 77.06321716308594 56.69551849365234 74.95429229736328 53.25336456298828 L 52.87955856323242 17.22332763671875 C 50.86417007446289 13.933837890625 47.35779190063477 11.969970703125 43.5 11.969970703125 M 43.49999618530273 10.969970703125 C 47.44571685791016 10.969970703125 51.39144134521484 12.88027954101562 53.73225021362305 16.70090866088867 L 75.80697631835938 52.73094940185547 C 80.70587921142578 60.72682952880859 74.95201110839844 71 65.57472991943359 71 L 21.42526245117188 71 C 12.04798889160156 71 6.294120788574219 60.72682952880859 11.19300842285156 52.73094940185547 L 33.26774978637695 16.70090866088867 C 35.60855484008789 12.88027954101562 39.55427551269531 10.969970703125 43.49999618530273 10.969970703125 Z"
                                                                        stroke="none" fill="#ff0060"></path>
                                                                </g>
                                                            </svg>
                                                            <div class="playTitle">فیلم معرفی کتاب</div>
                                                            <div class="ryBluerImg position-absolute"
                                                                 onclick="mainClass.showVideoPop(event,`<?php echo $videoConter ?>`,`ryAll`)"></div>
                                                        </div>

                                                        <?php
                                                        $videoConter=$videoConter+1;

                                                    }
                                                    ?>
                                                    <img class=" ck-book-img" src="<?php echo $image[0]; ?>"
                                                         src-m="<?php bloginfo('url'); ?>/img/lazyloud.jpg"
                                                         alt="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                                    <!--                                        <div class="ck-moshahedesafahat">-->
                                                    <!--                                            <h3>مشاهده جزئیات کتاب</h3>-->
                                                    <!--                                        </div>-->
                                                </div>

                                                <div class="ck-kharid">
                                                    <p><?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?></p>

                                                    <div class="ck-gheymat ck-no-aadd pt-2">
                                                        <?php if ($product->is_in_stock()) {
                                                            ?>
                                                            <div class="ck-old-price">
                                                                <?php if (((1 - ((int)($final_price) / (int)($regular_price))) * 100) != 0) { ?>

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
                                                                        <del><div><?php echo number_format($r_p[0]); ?>
                                                                                تومان</div>
                                                                        </del>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <del>
                                                                            <div><?php echo number_format($product->get_regular_price()); ?>
                                                                                تومان</div></del>
                                                                    <?php } ?>


                                                                    <div class="ck-new-price">
                                                                        <div><?php echo number_format($product->get_price()); ?>
                                                                            تومان</div></div>
                                                                <?php } else { ?>
                                                                    <div class="ck-old-price">
                                                                        <div><?php echo number_format($product->get_price()); ?>
                                                                            تومان</div></div>
                                                                <?php } ?>

                                                            </div>

                                                        <?php } else { ?>
                                                            <div class="ck-new-price"><div>مشاهده جزئیات</div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <?php if ($product->is_in_stock()) { ?>
                                                    <?php
                                                    if ($product->is_type('variable')) {
                                                        $d_p = array();
                                                        $ii = 0;
                                                        $r_p = array();
                                                        $var_id = array();
                                                        foreach ($product->get_available_variations() as $variation) {
                                                            // Variation ID
                                                            $variation_id = $variation['variation_id'];
                                                            $var_id[$ii] = $variation_id;
                                                            $d_p[$ii] = $variation_display_price = $variation['display_price'];
                                                            $r_p[$ii] = $variation_regular_price = $variation['display_regular_price'];
                                                            $variation_title = get_the_title($variation['variation_id']);
                                                            $ii++;
                                                        }
                                                        ?>
                                                        <div class="single_add_to_cart_buttonsss text-center">مشاهده
                                                            جزئیات
                                                        </div>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div rel="<?php echo $loop->post->ID; ?>"
                                                             class="single_add_to_cart_buttons text-center">افزودن به
                                                            سبد خرید
                                                        </div>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div rel="<?php echo $loop->post->ID; ?>"
                                                         class="single_add_to_cart_buttonsss text-center">مشاهده جزئیات
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </a>
                                    </div>


                                <?php endwhile;
                                wp_reset_query(); ?>
                            </div>


                            <!--    loop for  film   -->
                            <?php
                            if ($term = get_term_by('id', $id, 'product_cat')) {
                                echo $term->name;
                            }
                            $cat = $title;
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $ppp = -1;
                            $args = array(
                                'post_type' => 'post',
                                'category_name' => $cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $ppp,
                                'paged' => $paged,
                                "orderby" => 'meta_value_num',
                                "meta_key" => 'post_views_count',
                                "order" => 'DESC',
                            );
                            $loop = new WP_Query($args);
                            while ($loop->have_posts()) : $loop->the_post();
                                global $product;
                                $regular_price = get_post_meta($loop->post->ID, 'قیمت اصلی', true);
                                $final_price = get_post_meta($loop->post->ID, 'قیمت فروش ویژه', true);
                                $in_stock_movie = get_post_meta($loop->post->ID, 'موجود در انبار', true);
                                $coming_soon = get_post_meta($loop->post->ID, 'coming_soon', true);
                                ?>
                                <a href="<?php echo get_permalink($loop->post->ID) ?>">
                                    <div class="ck-book <?php if ($coming_soon == "ok") {
                                        echo "ry-comming-soon";
                                    } ?>">
                                        <?php if ((((1 - ((int)($final_price) / (int)($regular_price))) * 100) != 0) && $in_stock_movie == "ok") { ?>
                                            <span
                                                class="ry-bargain">   <?php echo (int)((1 - ((int)($final_price) / (int)($regular_price))) * 100) ?>
                                                % </span>
                                        <?php }
                                        if ($coming_soon == "ok") {
                                            ?>
                                            <span class="ry-comming-soon-ss"> به زودی </span>
                                            <?php
                                        }
                                        $image_id = $loop->post->ID;
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'single-post-thumbnail');
                                        ?>
                                        <?php ?>
                                        <img class=" ck-book-img" src="<?php echo $image[0]; ?>"
                                             src-m="<?php bloginfo('url'); ?>/img/lazyloud.jpg"
                                             alt="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                        <!--                                        <div class="ck-moshahedesafahat">-->
                                        <!--                                            <h3>مشاهده جزئیات کتاب</h3>-->
                                        <!--                                        </div>-->
                                        <p>
                                            <span>فیلم آموزشی </span><?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>
                                        </p>
                                        <div class="ck-kharid">
                                            <div class="ck-gheymat">
                                                <?php
                                                if ($in_stock_movie == 'ok') {
                                                    ?>
                                                    <div class="ck-old-price">
                                                        <?php if (((1 - ((int)($final_price) / (int)($regular_price))) * 100) != 0) { ?>
                                                            <del><div><?php echo number_format($regular_price); ?>
                                                                    تومان</div></del>
                                                            <div class="ck-new-price">
                                                                <div><?php echo number_format($final_price); ?>تومان</div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="ck-old-price">
                                                                <div><?php echo number_format($regular_price); ?>
                                                                    تومان</div></div>
                                                        <?php } ?>

                                                    </div>

                                                <?php } else { ?>
                                                    <div class="ck-new-price"><div>مشاهده جزئیات</div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <!--                                            <div class="ck-afzodan-be-sabad">-->
                                            <!--                                                <img alt="سبد خرید"-->
                                            <!--                                                     src="-->
                                            <?php //bloginfo('url'); ?><!--/img/sabad%20kharid.jpg">-->
                                            <!--                                            </div>-->
                                            <div class="clear"></div>
                                        </div>
                                        <?php if ($in_stock_movie == 'ok') { ?>
                                            <?php
                                            if ($product->is_type('variable')) {
                                                $d_p = array();
                                                $ii = 0;
                                                $r_p = array();
                                                $var_id = array();
                                                foreach ($product->get_available_variations() as $variation) {
                                                    // Variation ID
                                                    $variation_id = $variation['variation_id'];
                                                    $var_id[$ii] = $variation_id;
                                                    $d_p[$ii] = $variation_display_price = $variation['display_price'];
                                                    $r_p[$ii] = $variation_regular_price = $variation['display_regular_price'];
                                                    $variation_title = get_the_title($variation['variation_id']);

                                                    $ii++;
                                                }
                                                ?>
                                                <div rel="<?php echo $var_id[0]; ?>"
                                                     class="single_add_to_cart_buttons text-center">افزودن به سبد خرید
                                                </div>

                                                <?php
                                            } else {
                                                ?>
                                                <div rel="<?php echo $loop->post->ID; ?>"
                                                     class="single_add_to_cart_buttons text-center">افزودن به سبد خرید
                                                </div>
                                            <?php } ?>


                                        <?php } else { ?>
                                            <div rel="<?php echo $loop->post->ID; ?>"
                                                 class="single_add_to_cart_buttonsss text-center">مشاهده جزئیات
                                            </div>
                                        <?php } ?>
                                    </div>
                                </a>
                            <?php endwhile;
                            wp_reset_query(); ?>
                            <div class="clear"></div>
                            <div class="ck-all-page-content">
                                <?php
                                $my_postid = $_REQUEST['page_id'];
                                $content_post = get_post($my_postid);
                                $content = $content_post->post_content;
                                echo do_shortcode($content)
                                ?>
                            </div>
                            <div class="col-lg-12 text-right p-2 mt-4">
                                <?php echo do_shortcode("[addtoany]"); ?>
                            </div>
                            <div class="ck-comment-header">
                                <img src="<?php bloginfo('url'); ?>/img/comment-icom.png" alt="نظرات">
                                <div>ارسال دیدگاه(نظرات، انتقادات و پیشنهادات خود را با ما در میان بگذارید.)</div>
                            </div>



                            <script src='<?php bloginfo('template_url') ?>/js/jq/jquery-ui.min.js'></script>
                            <script src="<?php bloginfo('template_url') ?>/js/addinloop.js?v=1.0.0.1"></script>
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
                            <div class="ck-comments">
                                <?php comments_template(); ?>
                            </div>
                            <?php
                            require_once('class/maincarosel.php');
                            $archiveCarosel = new maincarosel();
                            $configArray = $archiveCarosel->archiveBest();
                            ?>
                            <textarea type="text" id="ryAll"
                                      class="form-control d-none"><?php echo json_encode($configArray) ?></textarea>
                        </article>
                        <div class="clear"></div>

                        <?php include("ck-footer-pages.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	 <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/plyrio/plyr.css">
	<script src="<?php bloginfo('template_url'); ?>/plyrio/hls.js@latest"></script>
	<script src="<?php bloginfo('template_url'); ?>/plyrio/plyr.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/mainPage.js?v=1.0.0.0.13"></script>
    <script>
        let mainClass = new mainPage();
    </script>
<?php include("footer.php") ?>