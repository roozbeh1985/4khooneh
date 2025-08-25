<div class="section" id="section4">
    <style>
        .ck-img-namayandegi{
            text-align:center;
            margin-top:150px;
        }
    </style>
<div style="width: 96%; padding-left: 4%" >
    <!--------------------- content —-------------------->
    <?php
    $my_postid =747;
    $content_post = get_post($my_postid);
    $content = $content_post->post_content;
    ?>
    <?php echo do_shortcode($content) ?>
    <!----------- /content —----------------->
    <div class="ck-img-namayandegi">
        <a href="http://4khooneh.org/نمایندگی-های-فروش"><img src="http://4khooneh.org/wp-content/uploads/2018/05/Untitled-1-min-297x300.png"></a>
    </div>
    
</div>
    <div class="ck-container-scroll">
        <div style="cursor: pointer" class="container" id="moveSectionDown">
            <div class="chevron"></div>
            <div class="chevron"></div>
            <div class="chevron"></div>
            <span class="text">Scroll down</span>
        </div>
    </div>
</div>