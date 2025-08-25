<?php
/*
Template Name: ry-my-film
*/
global $user_ID;
$user_id = get_current_user_id();
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

                                <div class=" col-lg-12 float-right">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right ry-dashboord-checklist ry-none-background ry-etelaate-jashn-a "
                                         id="ry-autor-posts">
                                        <div class="col-lg-12 ry-title-dashboord">
                                            <span class="pull-right"><i class="fa fa-list"></i><a class="ry-dashboord-titl-a" href="#">فیلم های من</a></span>
                                            <span class="pull-left ry-dashboord-titl-a">مشاهده همه</span>
                                            <div class="clear"></div>
                                            <hr>
                                            <ul class="ry-ul-dashbord-list-paein">
                                                <?php

                                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                                $ppp = 5;
                                                $query = array(
                                                    'author' => $user_id,
                                                    'orderby' => 'post_date',
                                                    'order' => 'DESC',
                                                    'posts_per_page' => -1
                                                );
                                                $wpb_all_query = new WP_Query($query);
                                                if ($wpb_all_query->have_posts()) :
                                                    while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post();
                                                        ?>
                                                        <li>
                                                            <?php
                                                            $image_id = $loop->post->ID;
                                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'thumbnail');
                                                            ?>

                                                            <a href="<?php the_permalink(); ?>">
                                                                <img alt="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"
                                                                     class="pull-right lazy ck-book-img"
                                                                     src="<?php bloginfo('template_url') ?>/img/lazy.svg"
                                                                     data-src="<?php echo $image[0]; ?>">
                                                                <p class="pull-right ry-title-ka"><?php the_title(); ?></p>
                                                            </a>
                                                            <span class="pull-left ry-span">
                                            <i class="fa fa-clock-o"></i>
                                                                <?php
                                                                echo get_the_modified_date();

                                                                ?>
                                    </span>
                                                            <span class="pull-left ry-span">
                                            <i class="fa fa-eye"></i>
                                                                <?php echo getPostViews(get_the_ID()); ?>
                                        </span>
                                                            <span class="pull-left ry-span">انتشار:
                                                                <?php if ($post->post_status == "publish") echo '<i class="fa fa-check"></i>';
                                                                else echo 'در انتظار تایید';
                                                                ?>
                                    </span>
                                                            <span class="pull-left ry-span">امتیاز:
                                                                <?php
                                                                echo do_shortcode('[ratings id="'.$loop->ID.'"]') ;
                                                                ?>
                                    </span>
                                                            <div class="clear"></div>
                                                        </li>
                                                    <?php endwhile;
                                                else : ?>
                                                    <p><?php _e('متاسفانه چیزی یافت نشد'); ?></p>
                                                <?php endif; ?>


                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
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