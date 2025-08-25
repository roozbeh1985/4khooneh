<?php
global $post, $product;
$title=$post->post_title;
$parent=$post->post_parent;

$address_porsesh=$porseh_motadavel="پرسش های متداول ".$title;
$address_film =$filme_amozeshi="فیلم آموزشی ".$title;
$address_moshavere=$moshavere="مشاوره ".$title;
$khabarname="خبرنامه ";
$sargarmi="سرگرمی";

?>
<a href="<?php bloginfo('url') ?>/<?php echo $address_porsesh?>">
    <div class="ck-page-right-menu">
        <div class="ck-right porseshe-motedavel"><h3>پرسش‌های متداول</h3></div>
        <div class="ck-left porseshe-motedavel"><img alt="quwstion" class="lazy" data-src="<?php bloginfo('url'); ?>/img/question-icon.png"></div>
        <div class="clear"></div>
    </div>
</a>
<a href="<?php bloginfo('url') ?>/<?php echo $address_film ?>">
    <div class="ck-page-right-menu">
        <div class="ck-right film"><h3>فیلم آموزشی</h3></div>
        <div class="ck-left film"><img alt="film" class="lazy" data-src="<?php bloginfo('url'); ?>/img/film%20icon.png"></div>
        <div class="clear"></div>
    </div>
</a>
<a href="<?php bloginfo('url') ?>/<?php echo $address_moshavere; ?>">
    <div class="ck-page-right-menu">
        <div class="ck-right moshavere"><h3>مشاوره</h3></div>
        <div class="ck-left moshavere"><img alt="consult" class="lazy" data-src="<?php bloginfo('url'); ?>/img/moshavere%20icon.png"></div>
        <div class="clear"></div>
    </div>
</a>
<a href="<?php bloginfo('url') ?>/<?php echo $khabarname; ?>">
    <div class="ck-page-right-menu">
        <div class="ck-right khabarname"><h3>خبرنامه</h3></div>
        <div class="ck-left khabarname"><img alt="news" class="lazy" data-src="<?php bloginfo('url'); ?>/img/khabarname-icon.png"></div>
        <div class="clear"></div>
    </div>
</a>
<a href="<?php bloginfo('url') ?>/<?php echo $sargarmi; ?>">
    <div class="ck-page-right-menu">
        <div class="ck-right sargarmi"><h3>سرگرمی</h3></div>
        <div class="ck-left sargarmi"><img alt="hobby" class="lazy" data-src="<?php bloginfo('url'); ?>/img/sargarmi%20icon.png"></div>
        <div class="clear"></div>
    </div>
</a>

<div class="ck-page-right-menu-img">
    <a href="http://4khooneh.org/product/%D9%85%D8%AC%D9%85%D9%88%D8%B9%D9%87-%D8%B3%D9%88%D8%A7%D9%84%D8%A7%D8%AA-%D8%B7%D8%A8%D9%82%D9%87-%D8%A8%D9%86%D8%AF%DB%8C-%D8%B4%D8%AF%D9%87-%DA%A9%D9%86%DA%A9%D9%88%D8%B1-%D8%B9%D9%85%D9%88%D9%85/"><img alt="کنکور عمومی و پایه" class="lazy" data-src="<?php bloginfo('url'); ?>/img/baner%201.jpg"></a>
</div>
<div class="ck-page-right-menu-img">
    <img alt="shop" class="lazy" data-src="<?php bloginfo('url'); ?>/img/baner%202.jpg">
</div>
<div class="ck-page-right-menu-img">
    <img alt="work book" class="lazy" data-src="<?php bloginfo('url'); ?>/img/baner%205.jpg">
</div>
<div class="ck-page-right-menu-img">
    <img alt="post" class="lazy" data-src="<?php bloginfo('url'); ?>/img/baner%204.jpg">
</div>