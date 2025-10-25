<?php
/*
Template Name: OnlineCourse
*/
?>
<?php include("header.php"); ?>

<?php
$course = get_post_meta(get_the_ID(), 'courseItem', true);
if (empty($course)) {
    $course = 'computeronlinecourse';
}
$iframe_src = esc_url('https://www.skyroom.online/ch/charkhooneh/' . rawurlencode($course));
?>

<div>
    <div>
        <div class="container-fluid">
            <div class="row" dir="rtl">

                <article class="ck-page-article w-100 ">
                    <div class="ryHeightD mt-5" style="position:relative;">
                        <iframe id="skyroom_iframe" src="<?php echo $iframe_src; ?>" width="100%" height="100%"
                            frameborder="0" allowfullscreen="true"
                            allow="autoplay;fullscren;microphone;camera;display-capture"></iframe>

                        <a class="ck-vendor-overlay" href="https://skyroom.online" target="_blank" title="4khooneh">
                            <img src="https://4khooneh.org/img/ck-logo.png" alt="4khooneh">
                        </a>
                    </div>

                    <button class="ck-fullscreen-btn" title="تمام صفحه">⤢</button>

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

                        (function ($) {
                            var $container = $('.ryHeightD').first();
                            var $btn = $('.ck-fullscreen-btn');

                            function enterFallback() {
                                $container.addClass('fullScreen');
                                $('html').addClass('ck-fullscreen-mode');
                            }
                            function exitFallback() {
                                $container.removeClass('fullScreen');
                                $('html').removeClass('ck-fullscreen-mode');
                            }

                            function isInFullscreen() {
                                return document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || $container.hasClass('fullScreen');
                            }

                            function requestFullscreen(el) {
                                if (el.requestFullscreen) return el.requestFullscreen();
                                if (el.webkitRequestFullscreen) return el.webkitRequestFullscreen();
                                if (el.mozRequestFullScreen) return el.mozRequestFullScreen();
                                if (el.msRequestFullscreen) return el.msRequestFullscreen();
                                return null;
                            }
                            function exitFullscreen() {
                                if (document.exitFullscreen) return document.exitFullscreen();
                                if (document.webkitExitFullscreen) return document.webkitExitFullscreen();
                                if (document.mozCancelFullScreen) return document.mozCancelFullScreen();
                                if (document.msExitFullscreen) return document.msExitFullscreen();
                                return null;
                            }

                            $btn.on('click', function () {
                                if (!isInFullscreen()) {
                                    var p = requestFullscreen($container.get(0));
                                    $('html').addClass('ck-fullscreen-mode');
                                    setTimeout(function () {
                                        if (!document.fullscreenElement && !document.webkitFullscreenElement && !document.mozFullScreenElement && !document.msFullscreenElement) {
                                            enterFallback();
                                        }
                                    }, 300);
                                } else {
                                    exitFullscreen();
                                    exitFallback();
                                    $('html').removeClass('ck-fullscreen-mode');
                                }
                            });

                            $(document).on('fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange', function () {
                                if (!document.fullscreenElement && !document.webkitFullscreenElement && !document.mozFullScreenElement && !document.msFullscreenElement) {
                                    exitFallback();
                                    $('html').removeClass('ck-fullscreen-mode');
                                } else {
                                    $('html').addClass('ck-fullscreen-mode');
                                }
                            });
                        })(jQuery);
                    </script>

                </article>
                <div class="clear"></div>
                <?php include("ck-footer-pages.php"); ?>
            </div>

        </div>
    </div>
</div>
<style>
    .ck-footer {
        display: none !important;
    }

    .ryHeightD {
        width: 100%;
        height: 100vh !important;
        max-height: 100vh;
        overflow: auto;
    }

    .ryHeightD iframe {
        height: 100%;
        display: block;
        border: 0;
    }

    .vendor_logo {
        display: none !important;
    }

    .fullScreen {}

    .ck-fullscreen-btn {
        position: fixed;
        left: 12px;
        bottom: 12px;
        z-index: 999999;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        border: none;
        padding: 10px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    html.ck-fullscreen-mode {
        margin-top: 0 !important;
    }

    html.ck-fullscreen-mode .menubar {
        display: none !important;
    }

    .ryHeightD.fullScreen {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        height: 100vh !important;
        z-index: 999998;
    }

    .ryHeightD {
        position: relative;
    }

    .ck-vendor-overlay {
        position: absolute;
        top: 4px;
        left: 12px;
        transform: none;
        z-index: 1000000;
        display: inline-block;
        text-decoration: none;
    }

    .ck-vendor-overlay img {
        height: 36px;
        display: block;
        pointer-events: auto;
    }

    .ryHeightD.fullScreen .ck-vendor-overlay,
    html.ck-fullscreen-mode .ck-vendor-overlay {
        left: 50%;
        transform: translateX(-50%);
    }

    .vendor_logo {
        display: none !important;
    }
</style>
<div style="display: none!important;">
    <?php include("footer.php") ?>
</div>
<script>
    (function ($) {
        var iframe = document.getElementById('skyroom_iframe');
        if (iframe) {
            iframe.addEventListener('load', function () {
                try {
                    var doc = iframe.contentDocument || iframe.contentWindow.document;
                    var img = doc.querySelector('.box-shrink.login-title img#vendor_logo') || doc.querySelector('.box-shrink.login-title img');
                    if (img) {
                        img.style.display = 'none';
                    }
                } catch (err) {
                    console.warn('Cannot access iframe DOM (cross-origin).', err);
                }
            });
        }
    })(jQuery);
</script>