<?php
/*
Template Name: page2honarestan
*/
?>
<?php include("header.php"); ?>
<div>
    <div>
        <div class="ck-page-container ">
            <div class="ck-page-show ">
                <?php
                global $post, $product;
                $title=$post->post_title;
                // echo $title;
                // echo "<pre style='direction: ltr'>";
                //print_r($post);
                //echo "<pre>";
                ?>
                <div class="ck-page-show-container ck-col-container">
                    <ul>

                        <li><a href="<?php bloginfo('url') ?>/<?php echo $title_parent=get_the_title($post->post_parent); ?>"><?php echo $title_parent=get_the_title($post->post_parent); ?></a></li>
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        <li><a href="<?php bloginfo('url') ?>/<?php echo $title_parent=get_the_title($post->post_parent); ?>/<?php echo $title?>"><?php the_title(); ?></a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ck-page-content">
                <div class="row" dir="rtl">
                    <div class="ck-page-rightsidebar">
                        <?php include("ck-page2honarestan-rightside-bar.php"); ?>
                    </div>
                    <article class="ck-page-article">
                        <div class="ck-content-mobile-right-sidebar-container">
                            <?php include("ck-right-side-bar-mobile.php") ?>
                        </div>
                        <?php
                        if( $term = get_term_by( 'id', $id, 'product_cat' ) ){
                            echo $term->name;
                        }
                        ?>
                        <?php
                        $args = array('post_type' => 'product', 'posts_per_page' => 100, 'product_cat' => $post->post_title, 'orderby' => 'date');
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            global $product; ?>
                            <a href="<?php echo get_permalink($loop->post->ID) ?>">
                                <div class="ck-book">
                                    <?php
                                    $image_id = $loop->post->ID;
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'single-post-thumbnail');
                                    ?>
                                    <?php ?>
                                    <img class="lazy ck-book-img" data-src="<?php echo $image[0]; ?>"
                                         src="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                    <div class="ck-moshahedesafahat">
                                        <h3>مشاهده جزئیات کتاب</h3>
                                    </div>
                                    <h2><?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?></h2>
                                    <div class="ck-kharid">
                                        <div class="ck-gheymat">
                                            <div class="ck-old-price">
                                                <del><h3><?php echo $product->get_regular_price(); ?>تومان</h3></del>
                                            </div>
                                            <?php //print_r($product) ?>
                                            <div class="ck-new-price"><h3><?php echo $product->get_price(); ?>تومان</h3>
                                            </div>
                                        </div>
                                        <div class="ck-afzodan-be-sabad">
                                            <img src="<?php bloginfo('url'); ?>/img/sabad%20kharid.jpg">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>


                        <div class="clear"></div>
                        <div class="ck-all-page-content">
                            <?php
                            $my_postid =$_REQUEST['page_id'];
                            $content_post = get_post($my_postid);
                            $content = $content_post->post_content;

                            ?>
                            <?php echo do_shortcode($content) ?>
                        </div>
                        <div class="ck-tozhihat-ketab ck-ketabhaye-moshabeh">
                            <div class="ck-tozihat-header">
                                <p class="f-14 text-white px-1">شاید شما اینها را هم دوست داشته باشید.</p>
                            </div>
                            <div class="ck-tozih">
                                <div class="swiper-container1" dir="rtl">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slides -->
                                        <?php
                                        $sql="SELECT page_id FROM `wp_alaghemandi` where ip='".$_SESSION['ip']."'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $ids=$row['page_id'];



                                            $crosssellProductIds = get_post_meta($ids, '_crosssell_ids');

                                            //  echo "<pre style='direction: ltr'>";
                                            // print_r($crosssellProductIds);
                                            // echo "</pre>";
                                            $crosssellProductIds = $crosssellProductIds[0];
                                            //-----------------inja---------------------
                                            $crosssellProduct = wc_get_product($ids);
                                            //  echo "<pre style='direction: ltr'>";
                                            // print_r($crosssellProduct-> get_slug());
                                            //print_r($crosssellProduct-> get_image_id());
                                            $image_attributes = wp_get_attachment_image_src($crosssellProduct->get_image_id());
                                            $image_attributes[0] = substr($image_attributes[0], 0, strlen($image_attributes[0]) - 12);
                                            $image_product = $image_attributes[0] . ".jpg";
                                            $href = $crosssellProduct->get_slug();
                                            ?>
                                            <div class="swiper-slide lazy "><a href="<?php echo $href; ?>"><img
                                                        class="lazy" data-src="<?php echo $image_product; ?> "
                                                        alt="<?php the_title(); ?>"></a>
                                            </div>
                                            <?php

                                            //-----------------inja----------------------

                                            foreach ($crosssellProductIds as $id):
                                                $crosssellProduct = wc_get_product($id);
                                                //  echo "<pre style='direction: ltr'>";
                                                // print_r($crosssellProduct-> get_slug());
                                                //print_r($crosssellProduct-> get_image_id());
                                                $image_attributes = wp_get_attachment_image_src($crosssellProduct->get_image_id());
                                                $image_attributes[0] = substr($image_attributes[0], 0, strlen($image_attributes[0]) - 12);
                                                $image_product = $image_attributes[0] . ".jpg";
                                                $href = $crosssellProduct->get_slug();
                                                ?>
                                                <div class="swiper-slide lazy "><a href="<?php echo $href; ?>"><img
                                                            class="lazy" data-src="<?php echo $image_product; ?> "
                                                            alt="<?php the_title(); ?>"></a>
                                                </div>
                                                <?php
                                                // echo "</pre>";
                                            endforeach;
                                        }
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
                            <img src="<?php bloginfo('url'); ?>/img/comment-icom.png">
                            <h3>ارسال دیدگاه(نظرات، انتقادات و پیشنهادات خود را با ما در میان بگذارید.)</h3>
                        </div>
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
                    </article>
                    <div class="clear"></div>
                    <?php include("ck-footer-pages.php"); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include("footer.php") ?>
