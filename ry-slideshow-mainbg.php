<script src="<?php bloginfo('template_url') ?>/js/slideshowconfig.js"></script>
<div class="section rounded-3 mt-3 ry-round-slideShow"  >
    <div class="swiper-container swiper-container1" dir="rtl">
        <div class="swiper-wrapper">
            <?php
            $post_ids=$post->ID;
            if ( get_post_meta($post_ids, 'اسلاید اصلی', true)) {
                $afff =get_post_meta($post_ids, 'اسلاید اصلی', true);
            }
            $afff = unserialize($afff);
            foreach ($afff as $ff) {
                ?>
                <div  class="swiper-slide lazy "><a href="<?php echo $ff[2]?>"><img alt="<?php echo $ff[0]?>" src="<?php bloginfo('url'); ?>/<?php echo $ff[1]?>"></a></div>
            <?php
            }
            ?>
        </div>
        <div class="swiper-pagination swiper-pagination1 swiper-pagination-white swiper-pagination-clickable swiper-pagination-bullets">
            <span class="swiper-pagination-bullet swiper-pagination-bullet1" tabindex="0" role="button"
                  aria-label="Go to slide 1"></span>
            <span class="swiper-pagination-bullet swiper-pagination-bullet1 swiper-pagination-bullet-active"
                  tabindex="0" role="button"
                  aria-label="Go to slide 2"></span>
            <span class="swiper-pagination-bullet swiper-pagination-bullet1" tabindex="0"
                  role="button" aria-label="Go to slide 3"></span>
            <span class="swiper-pagination-bullet swiper-pagination-bullet1" tabindex="0" role="button"
                  aria-label="Go to slide 4"></span>
        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-next swiper-button-next1"></div>
        <div class="swiper-button-prev swiper-button-prev1"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-pagination swiper-pagination1 swiper-pagination-white swiper-pagination-white1 swiper-pagination-clickable swiper-pagination-clickable1 swiper-pagination-bullets swiper-pagination-bullets1"></div>
    </div>
    <!-- <div class="ry-container-scroll">-->

</div>