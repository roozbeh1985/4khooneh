<?php include("header.php"); ?>
<div>
    <div>
        <div class="ck-page-container ">
            <div class="ck-page-show ">
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
                        <li><a href="<?php bloginfo("url"); ?>">انتشارات چهارخونه</a></li>
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        <li><a>صفحه پیدا نشد</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ck-page-content" >
                <div class="row" dir="rtl">
                    <div class="ck-page-rightsidebar">
                        <?php include("ck-page-rightside-bar.php"); ?>
                    </div>
                    <article class="ck-page-article" style="background-color: white">
                        <div class="ck-content-mobile-right-sidebar-container">
                            <?php include("ck-right-side-bar-mobile.php") ?>
                        </div>


                        <div style="text-align: center; width: 100%; height: auto; margin-top: 50px">
                            <img style="width: 80%; height: auto" class="lazy" data-src="<?php bloginfo('url'); ?>/img/404.png">
                        </div>
                        <h2 style="text-align: center; font-size: 20px; margin-bottom: 20px;margin-top: 12px"> صفحه مورد نظر یافت
                            نشد </h2>


                        <div class="clear"></div>
                        <div class="ck-page-content">

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
