<?php
/*
Template Name: ry-change-pic
*/
global $user_ID;
$user_id = get_current_user_id();
if (!is_user_logged_in()) {
    wp_redirect('ثبت-نام');
    exit;
}
if (isset($_POST['rysubmit'])) {
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
                    if ($count == 0) {
                        $image = ry_attach($file, $post_id);
//                            $full_img_url = wp_get_attachment_url($image);
                        $full_img_url = wp_get_attachment_image_src($image, 'thumbnail')[0];
                        $full_img_url = substr($full_img_url, 20);
                        if (!update_user_meta($user_id, 'logo', $full_img_url)) {
                            add_user_meta($user_id, 'logo', $full_img_url);
                        }
                        $count++;
                    }
                }
            } else {
                if ($count == 0) {

                    $count++;
                }
            }
        }
    }
}
include("header.php") ?>
    <div>
        <div>
            <div class="ck-page-container ry-proffile">

                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <?php include("sidbar-profile.php") ?>
                        </div>
                        <article class="ck-page-article ry-prof">

                            <div class="container">

                                <div class="col-xs-12 col-md-8 col-lg-9 float-right">
                                    <form class="" data-abide id="myform" action="" method="POST" enctype="multipart/form-data">
                                        <div class="col-lg-12 ry-chanel">
                                            <h4 class="text-right">اطلاعات من</h4>
                                        </div>

                                        <label class="float-right ry-logo-image" id="#logo">
                                            <?php
                                            if (get_user_meta($user_id, 'logo', true)) {
                                                $logo_src = get_home_url() . "/" . get_user_meta($user_id, 'logo', true);
                                            } else {
                                                $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                            }
                                            ?>
                                            <img id="img1" src="<?php echo $logo_src ?>" alt="your image">
                                            <input id="1" class="form-control" name="upload_attachment[0]" type="file"
                                                   onchange="readURL(this);">
                                        </label>
                                        <div class="clear"></div>
                                        <div class="col-lg-12 ">
                                            <div class="col-lg-2">
                                                <input type="submit" class="ry-btn-submit" id="ry-profile-submit" value="ثبت" name="rysubmit">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <script>
                                            var inp;

                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        inp = input;
                                                        var id = $(inp).attr('id');
                                                        $('#img' + id)
                                                            .attr('src', e.target.result)
                                                            .width(232)
                                                            .height(232);
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                    </form>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </article>
                        <div class="clear"></div>
                        <?php include("ck-footer-pages.php"); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include("footer.php") ?>