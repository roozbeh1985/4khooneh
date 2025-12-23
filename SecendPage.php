<?php
/*
Template Name: secondPageIndex
*/
include("header.php");
global $post;
$post_ids = $post->ID;
if (isset($_POST['rysubmit'])) {
    $att = array();

    $cn = 0;
    if ($afff = get_post_meta($post_ids, 'اسلاید اصلی', true)) {
        $afff = unserialize($afff);
        if (isset($_FILES['upload_attachment'])) {
            $files = $_FILES['upload_attachment'];
            foreach ($files['name'] as $key => $value) {
                if ($files['name'][$key]) {
                    $file = array(
                        'name' => $files['name'][$key],
                        'type' => $files['type'][$key],
                        'tmp_name' => $files['tmp_name'][$key],
                        'error' => $files['error'][$key],
                        'size' => $files['size'][$key]
                    );
                    $_FILES = array("upload_attachment" => $file);
                    foreach ($_FILES as $file => $array) {

                        $image = ry_attach($file, $post_id);
                        $full_img_url = wp_get_attachment_url($image);
                        $full_img_url = substr($full_img_url, 21);
                        $file_format = substr($full_img_url, -4);
                        $att[$cn] = $full_img_url;
                        $count++;
                        $cn++;
                    }
                } else {
                    $att[$cn] = $afff[$cn][1];
                    $cn++;
                    $count++;
                }
            }
        }
    } else {
        if (isset($_FILES['upload_attachment'])) {
            $files = $_FILES['upload_attachment'];
            foreach ($files['name'] as $key => $value) {
                if ($files['name'][$key]) {
                    $file = array(
                        'name' => $files['name'][$key],
                        'type' => $files['type'][$key],
                        'tmp_name' => $files['tmp_name'][$key],
                        'error' => $files['error'][$key],
                        'size' => $files['size'][$key]
                    );
                    $_FILES = array("upload_attachment" => $file);
//                    include 'phpdebug/ChromePhp.php';
//                    ChromePhp::log($_FILES);
                    foreach ($_FILES as $file => $array) {

                        $image = ry_attach($file, $post_id);
                        $full_img_url = wp_get_attachment_url($image);
                        $full_img_url = substr($full_img_url, 21);
                        $file_format = substr($full_img_url, -4);
                        $att[$cn] = $full_img_url;
                        $count++;
                        $cn++;
//
//

                    }
                } else {
                    $att[$cn] = "";
//                        add_post_meta($post_id, 'img' . (string)$count, "");
                    $cn++;
                    $count++;

                }
            }
        }
    }

    $marahel = $_POST['marhale'];
    $peyvand = $_POST['peyvand'];
    $all_marahel = array();
    $cc = 0;
    foreach ($marahel as $mmm) {
        $all_marahel[$cc][0] = $mmm;
        $all_marahel[$cc][1] = $att[$cc];
        $all_marahel[$cc][2] = $peyvand[$cc];
        $cc++;
    }
    $all_marahel = serialize($all_marahel);
    if (!update_post_meta($post_ids, 'اسلاید اصلی', $all_marahel)) {
        add_post_meta($post_ids, 'اسلاید اصلی', $all_marahel);
    }

}
?>
<style>
    .firstpage__header {
        padding-top: 50px;
        padding-bottom: 50px;
        background: -webkit-linear-gradient(315deg,,#ff0606 20%,#ffcc29 80%)!important;
        background: -moz- oldlinear-gradient(315deg,,#ff0606 20%,#ffcc29 80%)!important;
        background: -o-linear-gradient(315deg,#ff0606 20%,#ffcc29 80%)!important;
        background: linear-gradient(135deg,#ff0606  20%,#ffcc29 80%)!important;
        position: relative;
    }
</style>
    <div>
        <div>
            <div class="ck-page-container ">

                <div class="ck-page-content ry-content-page ryy-index-content">

                    <div class="row" dir="rtl">

                        <article class="col-lg-12 index-article">
                            <div class="firstpage__header mt-5">
                                <div class="container">
                                    <div class="header_main">
                                    </div>
                                    <div class="row">
                                        <?php
                                        print_r(unserialize(get_post_meta($post->ID, 'allCat', true)));
                                        $all_content=unserialize(get_post_meta($post->ID, 'allCat', true));
                                        foreach ( $all_content as $content) {
                                            $color='white';
                                            if($content['main']=="ok")
                                                $color=$content['color'];
                                            ?>
                                            <div class="col-4 col-sm-4 col-md-2 p-1 p-sm-2 cursor ">
                                                <a href="<?php echo $content['link']?>">
                                                    <div style="background-color: <?php echo $color?>" class=" d-flex flex-column rounded-4 shadow p-sm-3 text-center ry-pointer ry-transaction ry-hoverScroll">
                                                        <img src="<?php echo $content['img']?>" alt="<?php echo $content['txt']?>" title="<?php echo $content['txt']?>"
                                                             class="mt-3 mx-auto" width="42">
                                                        <p class="mt-4 mb-3 f-12 text-dark"><?php echo $content['txt']?></p>
                                                    </div>
                                                </a>

                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="header__firstImage"></div>
                                    <div class="row">
                                        <div class="header_codeLineImage p-0 col-lg-12 rounded3">

                                            <?php //include("ry-slideshow-mainbg.php") ?>
                                        </div>
                                    </div>



                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="ck-all-page-content">
                                <div class="container mt-2">
                                    <div class="bg-white rounded p-1 p-sm-2">
                                        <?php
                                        global $post;
                                        $my_postid = $post->ID;
                                        $content_post = get_post($my_postid);
                                        $content = $content_post->post_content;
                                        echo do_shortcode($content)
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <div class="container">
                                <div class="bg-white rounded">
                                    <div class="ck-comments pt-2">
                                        <?php comments_template(); ?>
                                    </div>
                                </div>

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