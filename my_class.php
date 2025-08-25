<?php
/*
Template Name: my_class
*/
global $user_ID;
$user_id = get_current_user_id();
$email = get_user_meta($user_id, "billing_email", 0)[0];
if (!is_user_logged_in()) {
    wp_redirect('ثبت-نام');
    exit;
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
                                <?php
                                $product_cat="کلاس آنلاین";
                                $current_user= wp_get_current_user();
                                $customer_email = $email;
                                //                                echo $customer_email;
                                $args =
                                    array(
                                        'post_type' => 'product',
                                        'posts_per_page' => 100,
                                        'product_cat' => $product_cat,
                                        "orderby" => 'meta_value_num',
                                        "meta_key" => 'post_views_count',
                                        "order" => 'DESC',);
                                $loop = new WP_Query($args);
                                while ($loop->have_posts()) : $loop->the_post();
                                    global $product;
                                    $regular_price = get_post_meta($loop->post->ID, '_regular_price', true);
                                    $final_price = get_post_meta($loop->post->ID, '_price', true);
                                    $coming_soon=get_post_meta($loop->post->ID,'coming_soon',true);
                                    if (wc_customer_bought_product($customer_email, $user_id,$loop->post->ID)){
                                        $ass_link=get_post_meta($loop->post->ID,'ورود به کلاس',true);
                                        ?>
                                        <a href="<?php  bloginfo('url') ?>/<?php echo $ass_link?>">
                                            <div class="ck-book <?php if($coming_soon=="ok"){echo "ry-comming-soon";}?>">
                                                <?php if(((1-((int)($final_price)/(int)($regular_price)))*100)!=0){ ?>
                                                    <?php
                                                }
                                                if($coming_soon=="ok"){
                                                    ?>
                                                    <span class="ry-comming-soon-ss">در دست چاپ </span>
                                                    <?php
                                                }
                                                $image_id = $loop->post->ID;
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'single-post-thumbnail');
                                                ?>
                                                <?php ?>
                                                <img class="lazy ck-book-img" data-src="<?php echo $image[0]; ?>"
                                                     src="<?php bloginfo('url'); ?>/img/lazyloud.jpg"
                                                     alt="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                                <!--                                        <div class="ck-moshahedesafahat">-->
                                                <!--                                            <h3>مشاهده جزئیات کتاب</h3>-->
                                                <!--                                        </div>-->
                                                <h2><?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?></h2>
                                                <div class="ck-kharid d-none">
                                                    <div class="ck-gheymat ck-no-aadd">
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
                                                                        <del><h3><?php echo number_format($r_p[0]) ; ?>تومان</h3></del>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <del><h3><?php echo number_format($product->get_regular_price()) ; ?>تومان</h3></del>
                                                                    <?php } ?>


                                                                    <div class="ck-new-price"><h3><?php echo number_format($product->get_price()) ; ?> تومان</h3> </div>
                                                                <?php } else { ?>
                                                                    <div class="ck-old-price"><h3><?php echo number_format($product->get_price()); ?> تومان</h3></div>
                                                                <?php } ?>

                                                            </div>

                                                        <?php } else { ?>
                                                            <div class="ck-new-price"><h3>مشاهده جزئیات</h3>
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
                                                        $var_id=array();
                                                        foreach ($product->get_available_variations() as $variation) {
                                                            // Variation ID
                                                            $variation_id = $variation['variation_id'];
                                                            $var_id[$ii]=$variation_id;
                                                            $d_p[$ii] = $variation_display_price = $variation['display_price'];
                                                            $r_p[$ii] = $variation_regular_price = $variation['display_regular_price'];
                                                            $variation_title = get_the_title($variation['variation_id']);

                                                            $ii++;
                                                        }
                                                        ?>
                                                        <div class="single_add_to_cart_buttonsss text-center">مشاهده جزئیات</div>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div  rel="<?php echo $loop->post->ID;?>" class="single_add_to_cart_buttonsss text-center">شرکت در کلاس</div>
                                                        <!--                                                    <div  rel="--><?php //echo $loop->post->ID;?><!--" class="single_add_to_cart_buttons text-center">افزودن به سبد خرید</div>-->
                                                    <?php } ?>
                                                <?php } else{?>
                                                    <div  rel="<?php echo $loop->post->ID;?>" class="single_add_to_cart_buttonsss text-center">مشاهده جزئیات</div>
                                                <?php }?>
                                            </div>
                                        </a>
                                        <?php
                                    }
                                endwhile;
                                wp_reset_query(); ?>
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