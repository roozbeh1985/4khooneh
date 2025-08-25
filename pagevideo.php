<?php
/*
Template Name: page2video
*/
global $wpdb;

$servername = "localhost";
$username = "admin_4khooneokroozbeh";
$password = "bedebala123!@#";
$dbname = "admin_4khooneokroozbeh";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

setPostViews(get_the_ID());

?>
<?php include("header.php"); ?>
    <link href="<?php bloginfo('template_url'); ?>/css/video/video-js.css" rel="stylesheet">
    <!-- If you'd like to support IE8 -->
    <script src="<?php bloginfo('template_url'); ?>/js/video/videojs-ie8.min.js"></script>
    <div>
        <div>
            <div class="ck-page-container ">
                <!--                 <div class="ck-page-show ">
                    <?php
                global $post, $product;
                $title = $post->post_title;
                // echo $title;
                // echo "<pre style='direction: ltr'>";
                //print_r($post);
                //echo "<pre>";
                ?>
                    <div class="ck-page-show-container ck-col-container">
                        <ul>
                            <li>
                                <a href="<?php bloginfo('url') ?>/<?php echo $title_parent = get_the_title($post->post_parent); ?>"><?php echo $title_parent = get_the_title($post->post_parent); ?></a>
                            </li>
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            <li>
                                <a href="<?php bloginfo('url') ?>/<?php echo $title_parent = get_the_title($post->post_parent); ?>/<?php echo $title ?>"><?php the_title(); ?></a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div> -->
                <div class="ck-page-content">

                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <?php include("ck-page-rightside-bar.php"); ?>
                        </div>
                        <article class="ck-page-article">
                            <div class="ck-video">
                                <div class="ck-orginal-video">
                                    <?php
                                    $film_id = get_post_meta(get_the_ID(), 'فیلم', TRUE);
                                    
                                    $sql = "SELECT * FROM `qecna_video` WHERE id='" . $film_id . "'";

                                    print_r($results);

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $paye = $row['video_paye'];
                                        $dars = $row['video_dars'];
                                        $dore = $row['video_dore'];
                                    }
                                    ?>
                                    <video
                                            crossorigin="anonymous"
                                            playsinline="playsinline"
                                            preload="none"
                                            data-ads-enabled="true"
                                            id="my-player"
                                            class="video-js"
                                            controls
                                            preload="auto"
                                            poster="<?php bloginfo('url'); ?>/<?php echo $row['video_poster'] ?>"
                                            data-setup='{}'
                                            style="width: 100%; min-height:365px ; height:100%"
                                    >
                                        <source src="<?php echo $row['video_src'] ?>" type="video/mp4">
                                        <!--  <source src="//vjs.zencdn.net/v/oceans.webm" type="video/webm">
                                          <source src="//vjs.zencdn.net/v/oceans.ogv" type="video/ogg">-->
                                    </video>
                                    <script src="<?php bloginfo('template_url'); ?>/js/video/video.js"></script>
                                </div>
                                <div class="ck-common-video">
                                    <?php
                                    $sql = "SELECT * FROM `qecna_video` WHERE id!='" . $film_id . "'AND video_dore='" . $dore . "' AND video_paye='" . $paye . "'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <a href="<?php bloginfo('url') ?><?php echo $row['video_link'] ?>">
                                                <div class="ck-videos-common">
                                                    <div class="ck-common-image">
                                                        <img class="lazy"
                                                             data-src="<?php bloginfo('url'); ?>/<?php echo $row['video_banner'] ?>"
                                                             src="<?php bloginfo('url'); ?>/img/ch.gif">
                                                    </div>
                                                    <div class="ck-common-content">
                                                        <h3><?php echo $row['video_name'] ?></h3>
                                                        <h4><?php echo $row['video_paye'] ?></h4>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </a>
                                            <?php

                                        }
                                    }
                                    ?>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="ck-all-page-content">
                                <div class="col-lg-12 text-left ry-viewww">
                                                    <span>
                                                        <?php
                                                        $viewers=get_post_meta($post->ID, 'post_views_count', true);
                                                        echo $viewers;
                                                        ?>
                                                    </span>
                                    <span>
                                                     <i class="fa fa-eye"></i>
                                                </span>
                                </div>
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