<a href="<?php bloginfo('url') ?>/آزمون-استخدامی/">
    <div class="ck-page-right-menu-img">
        <img alt="آزمون استخدامی" src="<?php bloginfo('url'); ?>/wp-content/uploads/2024/11/manabe.jpg">
    </div>
</a>
<a href="<?php bloginfo('url') ?>/مشاوره-های-هنرستان/">
    <div class="ck-page-right-menu-img">
        <img alt="آزمون استخدامی" src="<?php bloginfo('url'); ?>/wp-content/uploads/2025/08/moshaver.jpg">
    </div>
</a>
<a href="<?php bloginfo('url') ?>/آزمون-استخدامی/">
    <div class="ck-page-right-menu-img">
        <img alt="آزمون استخدامی" src="<?php bloginfo('url'); ?>/wp-content/uploads/2024/11/talaei.jpg">
    </div>
</a>
<a href="<?php bloginfo('url') ?>/هنرستان/پایه-دهم/فیلم-آموزشی-پایه-دهم">
    <div class="ck-page-right-menu-img">
        <img alt="فیلم آموزشی" src="<?php bloginfo('url'); ?>/wp-content/uploads/2020/01/filmamozeshi.jpg">
    </div>
</a>

<a href="<?php bloginfo('url') ?>/مصاحبه-با-رتبه-یک-الکتروتکنیک/">
    <div class="ck-page-right-menu-img">
        <img alt="مصاحبه با رتبه های برتر کنکور الکتروتکنیک" src="https://4khooneh.org/wp-content/uploads/2022/12/hasanib.jpg">
    </div>
</a>





	
<a href="<?php bloginfo('url') ?>/مشاوره-های-هنرستان/">
    <div class="ck-page-right-menu-img">
        <img alt="فیلم آموزشی" src="<?php bloginfo('url'); ?>/wp-content/uploads/2019/12/moshaverevahedayattahsili.jpg">
    </div>
</a>
<a href="<?php bloginfo('url') ?>/کارنامه-قبول-شدگان-کنکور-هنرستان">
    <div class="ck-page-right-menu-img">
        <img alt="کارنامه قبول شدگان" src="<?php bloginfo('url'); ?>/img/karname.png">
    </div>
</a>

<a href="<?php bloginfo('url') ?>/آثار-برگزیده-هنرجویان/">
    <div class="ck-page-right-menu-img">
        <img alt="آثار برگزیده هنرجویان" src="<?php bloginfo('url'); ?>/wp-content/uploads/2019/12/asarebargozide.jpg">
    </div>
</a>
<a href="<?php bloginfo('url') ?>/گالری-تصاویر">
    <div class="ck-page-right-menu-img">
        <img alt="گالری تصاویر"  src="<?php bloginfo('url'); ?>/img/gallery.png">
    </div>
</a>

<a href="<?php bloginfo('url') ?>/معرفی-هنرستان-ها/">
    <div class="ck-page-right-menu-img">
        <img alt="معرفی هنرستان ها" src="<?php bloginfo('url'); ?>/wp-content/uploads/2019/12/moarefiyehonarestan.jpg">
    </div>
</a>
<a href="<?php bloginfo('url') ?>/معرفی-دانشگاه-ها/">
    <div class="ck-page-right-menu-img">
        <img alt="معرفی دانشگاه ها" src="<?php bloginfo('url'); ?>/wp-content/uploads/2019/12/moarefiyedaneshgahha.jpg">
    </div>
</a>
<a href="<?php bloginfo('url') ?>/معرفی-رشته-های-هنرستان/">
    <div class="ck-page-right-menu-img">
        <img alt="گالری تصاویر"  src="<?php bloginfo('url'); ?>/wp-content/uploads/2019/12/banerreshteha.jpg">
    </div>
</a>
<a href="<?php bloginfo('url') ?>/فیلم-آموزش-راهنمای-خرید-اینترنتی/">
    <div class="ck-page-right-menu-img">
        <img alt="فیلم آموزشی" src="<?php bloginfo('url'); ?>/img/rahnamayekhariid.png">
    </div>
</a>
<div class="ry-r-s-c">
    <div class="ry-hedad">
        <p class="text-right">مطالب برگزیده</p>
    </div>
    <div class="ry-tt">
        <ul class="text-right">
            <?php
            global $product;
            $args = array(
                'posts_per_page' => 28,
                'post_status' => "publish",
                'post_type' => "any"
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {

                while ($loop->have_posts()) : $loop->the_post();
                    $regular_price = get_post_meta($loop->post->ID, '_regular_price', true);
                    $final_price = get_post_meta($loop->post->ID, '_price', true)
                    ?>
                    <li><a href="<?php echo get_permalink() ?>"><?php the_title() ?></a></li>

                <?php
                endwhile;
            }
            wp_reset_postdata();
            ?>
        </ul>
    </div>

</div>