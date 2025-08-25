<div class="ry-section">
    <div class="swiper-container swiper-container2" dir="rtl">
        <p class="text-right ry-head-carosel"><span class="ry-ppaa">آخرین فیلم های آموزشی</span>
        </p>
        <div class="swiper-wrapper swiper-wrapper2">
            <?php
            global $product;
            $args = array(
                'posts_per_page' => 25,
                'post_status' => "publish",
                'category_name' => 'ویدئو',
                'post_type' => "post",
                'orderby'     => 'modified',
                'order'       => 'DESC',
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();
                    $regular_price = get_post_meta($loop->post->ID, 'قیمت اصلی', true);
                    $final_price = get_post_meta($loop->post->ID, 'قیمت فروش ویژه', true);
                    $coming_soon=get_post_meta($loop->post->ID,'coming_soon',true);
                    $has_not_ostad=get_post_meta($post->ID,'بدون استاد',true);
                    ?>
                    <div class="swiper-slide lazy mahsol text-center">
                        <a href="<?php echo get_permalink() ?>">
                            <div class="ry-carosel <?php if($coming_soon=="ok"){echo "ry-comming-soon";}?>">
                                <?php
                                $in_stock_movie = get_post_meta($loop->post->ID, 'موجود در انبار', true);
                                if (((1 - ((int)($final_price) / (int)($regular_price))) * 100) != 0 && $in_stock_movie == 'ok') { ?>
                                    <span class="ry-bargain">   <?php echo((1 - ((int)($final_price) / (int)($regular_price))) * 100) ?>
                                        % </span>
                                <?php }
                                if($coming_soon=="ok"){
                                    ?>
                                    <span class="ry-comming-soon-ss"> به زودی </span>
                                    <?php
                                }

                                ?>
                                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID), 'medium');
                                add_filter('woocommerce_order_item_name', 'woo_order_item_with_link', 10, 3);
                                ?>
                                <img class="lazy" alt="<?php the_title() ?>" title="<?php the_title() ?>"
                                     src="<?php bloginfo('url'); ?>/img/lazyloud.jpg"
                                     data-src="<?php echo $image[0]; ?>">
                                <h4 class="ry-detail-product"><?php the_title() ?></h4>
                                <?php

                                if ($in_stock_movie == 'ok') {
                                    ?>
                                    <div class="ry-heiight">
                                        <?php if ($regular_price != $final_price) { ?>
                                            <del><?php echo $regular_price ?><span>تومان</span></del>
                                        <?php } ?>
                                        <p class="new-price"><?php echo $final_price ?><span>تومان</span></p>
                                    </div>
                                <?php } else {
                                    ?>
                                    <p class="new-price">مشاهده جزئیات</p>
                                    <?php
                                } ?>

                            </div>

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

                                if($has_not_ostad!=="ok"){
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
                            </div>
                            <div class="col-lg-12 text-left ry-viewww">
                                  <span>
                                        <?php
                                        $viewers=get_post_meta($loop->post->ID, 'post_views_count', true);
                                        echo $viewers ?>
                                 </span>
                                <span>
                                     <i class="fa fa-eye"></i>
                                 </span>
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