<?php
/*
Template Name: OnlineCourse
*/
?>
<?php include("header.php"); ?>
<div>
    <div>
        <div class="container-fluid">
            <div class="row" dir="rtl">

                <article class="ck-page-article w-100 ">
                    <div class="ck-all-page-content mt-4">
                        <?php
                        $my_postid = $_REQUEST['page_id'];
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;

                        ?>
                        <?php echo do_shortcode($content) ?>
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
<style>
    .ck-footer {display: none!important;}
</style>
<div style="display: none!important;">
    <?php include("footer.php") ?>
</div>