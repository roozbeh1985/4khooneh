<?php
/*
Template Name: qrCode
*/
include("header.php");
setPostViews(get_the_ID());
?>
<link href="<?php bloginfo('template_url'); ?>/plyrio/plyr.css" rel="stylesheet">
<div>
    <div>
        <style>
            h1{
                background: #443b3b;
                color: white;
                font-size: 20px;
                padding: 10px;
            }
            #player{
                max-height: 100%!important;
            }
        </style>
        <div class="ck-page-container ">

            <div class="ck-page-content">
                <div class="row" dir="rtl">
                    <div class="ck-page-rightsidebar">
                        <?php include("ck-page-rightside-bar.php"); ?>
                    </div>
                    <article class="ck-page-article">
                        <h1 class="text-center">پخش آنلاین ویدئو</h1>
                        <video id="player" class="w-100" style="max-height: 348px;" controls autoplay></video>
                        <!-- img -->
                         <a href="https://ketabonline.ir/">
                            <img class="w-100 mt-2 rounded" 
                         src="https://4khooneh.org/wp-content/uploads/2025/04/photo_2025-04-08_17-06-18.jpg" alt="کتاب آنلاین">
                         </a>
                         
                        <div class="ck-comments pt-3">
                            <?php comments_template(); ?>
                        </div>
                        
                    </article>
                    <script src="<?php bloginfo('template_url'); ?>/plyrio/plyr.js"></script>
                    <script src="<?php bloginfo('template_url'); ?>/plyrio/hls.js@latest"></script>
                    <script>
                        let video = document.getElementById('player');
                        let player = new Plyr('#player');
                        let source = 'https://4khooneh.org/film/qr/<?php echo explode(',',$_GET['c'])[0]?>/<?php echo explode(',',$_GET['c'])[1]?>/output.m3u8';

                        if (Hls.isSupported()) {
                            let hls = new Hls();
                            hls.loadSource(source);
                            hls.attachMedia(video);
                            hls.on(Hls.Events.MANIFEST_PARSED, () => {
                                player.play();
                            });
                        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                            video.src = source;
                            video.addEventListener('loadedmetadata', () => {
                                player.play();
                            });
                        }
                        player.play()
                        
                    </script>
                    <div class="clear"></div>
                    <?php include("ck-footer-pages.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php") ?>
