<?php
/*
Template Name: allfilm
*/
include("header.php"); ?>
    <div>
        <div>
            <div class="ck-page-container ">
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
                            <!--    loop for  film   -->
                            <h1 class="text-center p-1 mb-3" style="font-size: 18px;color: red;">مشاهده فیلم ها تنها به
                                روش دانلودی امکان پذیر است</h1>
                            <?php
                            $zz = 0;
                            if (get_post_meta($post->ID, 'رشته ها', true)) {
                                $film_kind = get_post_meta($post->ID, 'رشته ها', true);
                                $film_kind = unserialize($film_kind);
                            }
                            foreach ($film_kind as $fk) {
                                ?>

                                <div class="ry-bbbb ryy-b-<?php echo $zz;
                                $zz++; ?>">
                                    <h2 class="text-center ry-hedear-filmss"><span
                                                class="ry-danger"><?php echo $fk ?></span></h2>
                                    <div class="row">
                                        <?php
                                        if ($term = get_term_by('id', $id, 'product_cat')) {
                                            echo $term->name;
                                        }
                                        $cat = $title;
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                        $ppp = -1;
                                        if ($zz == 9) $zz = 0;
                                        $args = array(
                                            'posts_per_page' => 30,
                                            'post_status' => "publish",
                                            'category_name' => $fk,
                                            'post_type' => "post",
                                            'orderby' => 'publish_date',
                                            'order' => 'ASC',
                                        );
                                        $loop = new WP_Query($args);
                                        while ($loop->have_posts()) : $loop->the_post();
                                            global $product;
                                            $regular_price = get_post_meta($loop->post->ID, 'قیمت اصلی', true);
                                            $final_price = get_post_meta($loop->post->ID, 'قیمت فروش ویژه', true);
                                            $in_stock_movie = get_post_meta($loop->post->ID, 'موجود در انبار', true);
                                            $viewers = get_post_meta($loop->post->ID, 'post_views_count', true);
                                            $coming_soon = get_post_meta($loop->post->ID, 'coming_soon', true);
                                            $has_not_ostad = get_post_meta($post->ID, 'بدون استاد', true);
                                            $productId = get_post_meta($post->ID, 'فروش', true);
                                            $prodPrice = 0;
                                            if ($productId) {
                                                $myProd = wc_get_product($productId);
                                                $prodPrice = $myProd->get_price();
                                            }

                                            ?>

                                            <div class="ck-book ry-fiilllmm <?php if ($coming_soon == 'ok') {
                                                echo "ry-comming-soon";
                                            } ?>">
                                                <a href="<?php if ($coming_soon != "ok") {
                                                    echo get_permalink($loop->post->ID);
                                                } else {
                                                    echo "";
                                                } ?>">
                                                    <?php if (((1 - ((int)($final_price) / (int)($regular_price))) * 100) != 0 && $in_stock_movie == "ok") { ?>
                                                        <span class="ry-bargain">   <?php echo (int)((1 - ((int)($final_price) / (int)($regular_price))) * 100) ?>
                                                            % </span>
                                                    <?php } ?>
                                                    <?php
                                                    $image_id = $loop->post->ID;
                                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'single-post-thumbnail');
                                                    ?>
                                                    <?php ?>
                                                    <img class="lazy ck-book-img" data-src="<?php echo $image[0]; ?>"
                                                         src="<?php bloginfo('url'); ?>/img/lazyloud.jpg"
                                                         alt="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                                    <?php
                                                    if ($coming_soon == "ok") {
                                                        ?>
                                                        <span class="ry-comming-soon-ss"> به زودی </span>
                                                        <?php
                                                    }
                                                    ?>

                                                    <h3 class="ry-film-title">
                                                        <?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>
                                                    </h3>
                                                </a>

                                                <div class="col-md-12 float-left text-center ry-rateeeee">
                                                    <?php if (function_exists('the_ratings')) {
                                                        the_ratings();
                                                    } ?>
                                                </div>
                                                <a href="<?php if ($coming_soon != "ok") {
                                                    echo get_permalink($loop->post->ID);
                                                } else {
                                                    echo "";
                                                } ?>">
                                                    <div class="ostad-attr">
                                                        <?php
                                                        $recent_author = get_user_by('ID', $loop->post->post_author);
                                                        $author_display_name = $recent_author->display_name;
                                                        if (get_user_meta($recent_author->ID, 'logo', true)) {
                                                            $imag_logo = get_user_meta($recent_author->ID, 'logo', true);
                                                            $imag_logo = get_home_url() . "/" . $imag_logo;
                                                        } else {
                                                            $imag_logo = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                        }
                                                        if (get_user_meta($recent_author->ID, 'nickname', true)) {
                                                            $ostad_name = get_user_meta($recent_author->ID, 'nickname', true);
                                                        }
                                                        ?>

                                                        <?php
                                                        if ($has_not_ostad !== "ok") {
                                                            ?>
                                                            <img class="lazy float-right"
                                                                 src="<?php bloginfo('url') ?>/wp-content/uploads/2019/12/user2.png"
                                                                 data-src="<?php echo $imag_logo ?>"
                                                                 alt="<?php echo $author_display_name; ?>">
                                                            <p class="float-right ry-aurtorname">
                                                                <?php echo "استاد:" . $ostad_name; ?>
                                                            </p>
                                                            <div class="clear"></div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="d-flex flex-row ">
                                                            <p class="text-danger text-right pr-2 font-bold f-14">قیمت:</p>
                                                            <p class="text-danger font-bold f-14"><?php
                                                                if ($prodPrice!=0)
                                                                    echo number_format($prodPrice) ." تومان";
                                                                else
                                                                    echo "رایگان"
                                                                ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class=" col-lg-6 col-8 float-right text-right ry-viewww">
                                                        <span class="ry-clooocck">
                                                        <i class="fa fa-clock"></i>
                                                            <?php echo get_the_date(); ?>
                                                    </span>
                                                        </div>
                                                        <div class="col-lg-6 col-4  float-left text-left ry-viewww">
                                                    <span>
                                                        <?php echo $viewers ?>
                                                    </span>
                                                            <span>
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>


                                        <?php endwhile;
                                        wp_reset_query(); ?>
                                        <div class="clear"></div>
                                    </div>

                                </div>
                                <?php
                            }
                            ?>
                            <div class="ck-all-page-content">
                                <?php
                                $my_postid = $_REQUEST['page_id'];
                                $content_post = get_post($my_postid);
                                $content = $content_post->post_content;
                                ?>
                                <!--                                --><?php echo do_shortcode($content) ?>
                            </div>
                            <div class="ck-comment-header">
                                <img src="<?php bloginfo('url'); ?>/img/comment-icom.png" alt="نظرات">
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
                            <div class="ck-comments">
                                <?php comments_template(); ?>
                            </div>
                        </article>
                        <div class="clear"></div>
                        <?php include("ck-footer-pages.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>