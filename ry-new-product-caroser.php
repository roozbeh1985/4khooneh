<div class="ry-section" >
    <div class="swiper-container swiper-container2" dir="rtl">
        <p class="text-right ry-head-carosel"><span class="ry-ppaa">تازه های نشر </span>
        </p>
        <div class="swiper-wrapper swiper-wrapper2">
            <?php
            global $product;
            $args = array(
                'posts_per_page' => 25,
                'post_status' => "publish",
                'post_title' => $product->part_num,
                'product_cat' => 'جدید ترین ها',
                'orderby' => 'meta_value_num',
                'post_type' => "product"
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();
                    $regular_price=get_post_meta($loop->post->ID,'_regular_price',true);
                    $final_price=get_post_meta($loop->post->ID,'_price',true)
                    ?>
                    <div class="swiper-slide lazy mahsol text-center">
                        <a href="<?php echo get_permalink() ?>">
                            <div class="ry-carosel">
                                <?php if(((1-((int)($final_price)/(int)($regular_price)))*100)!=0){ ?>
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

                                        <span class="ry-bargain">   <?php echo ((1-($d_p[0]/$r_p[0]))*100) ?> % </span>

                                        <?php
                                    } else {
                                        ?>
                                        <span class="ry-bargain">   <?php echo intval((1-((int)($final_price)/(int)($regular_price)))*100) ?> % </span>
                                    <?php } ?>


                                <?php } ?>
                                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID), 'medium');
                                add_filter('woocommerce_order_item_name', 'woo_order_item_with_link', 10, 3);
                                ?>
                                <img alt="<?php the_title() ?>"  title="<?php the_title() ?>"  src-m="<?php bloginfo('url'); ?>/img/lazyloud.jpg"  src="<?php echo $image[0]; ?>">
                                <h4 class="ry-detail-product"><?php the_title() ?></h4>
                                <div class="ry-heiight">
                                    <?php if($regular_price!=$final_price){ ?>

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

                                            <del><?php echo  $r_p[0]?><span>تومان</span></del>
                                            <?php
                                        } else {
                                            ?>
                                            <del><?php echo  $regular_price?><span>تومان</span></del>
                                        <?php } ?>


                                    <?php } ?>
                                    <p class="new-price"><?php echo $final_price ?><span>تومان</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                endwhile;
            }
            wp_reset_postdata();
            ?>
        </div>
        <div class="swiper-button-next swiper-button-next2"></div>
        <div class="swiper-button-prev swiper-button-prev2"></div>
    </div>
</div>