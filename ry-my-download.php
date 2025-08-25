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
        <div class="ck-page-container ">

            <div class="ck-page-content">
                <div class="row" dir="rtl">
                    <div class="ck-page-rightsidebar">
                        <?php include("sidbar-profile.php") ?>
                    </div>
                    <article class="ck-page-article ry-prof">

                        <div class="container">
                            <div class="ck-all-page-content">
                                <?php
                                $my_postid = $_REQUEST['page_id'];
                                $content_post = get_post($my_postid);
                                $content = $content_post->post_content;
                                echo do_shortcode($content)
                                ?>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>

<?php include("footer.php") ?>