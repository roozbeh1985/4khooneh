<?php
/*
Template Name: Tag Page
*/
include("header.php");
setPostViews(get_the_ID());
?>
    <div>
        <div>
            <div class="ck-page-container ">
                
                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <?php include("ck-page-rightside-bar.php"); ?>
                        </div>
                        <article class="ck-page-article">

                            <div class="col-lg-12">
                                <?php
                                $coming_soon = "no";
                                if (have_posts()) :
                                    while (have_posts()) : the_post();
                                        $featured_img_url = get_the_post_thumbnail_url('medium');
                                        $post_id = get_the_ID();
                                        $post = get_post($post_id);
                                        $image_id = $post->ID;
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'single-post-thumbnail');
                                        ?>
                                        <a href="<?php echo get_permalink($post->ID) ?>">
                                            <div class="ck-book">
                                                <img class="lazy ck-book-img" data-src="<?php echo $image[0]; ?>"
                                                     src="<?php bloginfo('url'); ?>/img/lazyloud.jpg"
                                                     alt="مجموعه سوالات چهارگزینه ای عمومی و پایه فنی حرفه ای کاردانش"
                                                     style="display: inline;">
                                                <h2><?php echo $post->post_title ?></h2>
                                                <div class="ck-kharid ry-kharid-tag">

                                                    <div   class="single_add_to_cart_buttonsss text-center">مشاهده جزئیات</div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                            <div class="ck-comment-header">
                                <img src="<?php bloginfo('url'); ?>/img/comment-icom.png" alt="نظرات">
                                <h3>ارسال دیدگاه(نظرات، انتقادات و پیشنهادات خود را با ما در میان بگذارید.)</h3>
                            </div>
                            <script src='<?php bloginfo('template_url') ?>/js/jq/jquery-ui.min.js'></script>
                            <script src="<?php bloginfo('template_url') ?>/js/addinloop.js?v=1.0.0.1"></script>
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