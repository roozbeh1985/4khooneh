<?php
/*
Template Name: newIndex
*/
include("header.php");
global $post;
$post_ids = $post->ID;

$all_content = array(
    0 => array(
        "link" => "https://4khooneh.org/%d8%a2%d8%b2%d9%85%d9%88%d9%86-%d8%a7%d8%b3%d8%aa%d8%ae%d8%af%d8%a7%d9%85%db%8c/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp22.png",
        "txt" => "آزمون استخدامی",
        "main" => "ok",
        "color" => "#feead8",
    ),
    1 => array(
        "link" => "https://4khooneh.org/courseselection/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp24.png",
        "txt" => "فنی‌حرفه‌ای کارودانش",
        "main" => "ok",
        "color" => "#feead8",
    ),
    2 => array(
        "link" => "https://4khooneh.org/%d8%a2%d9%85%d9%88%d8%b2%da%af%d8%a7%d8%b1-%d8%a7%d8%a8%d8%aa%d8%af%d8%a7%db%8c%db%8c/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp46.png",
        "txt" => "آموزگار ابتدایی",
        "main" => "ok",
        "color" => "#feead8",
    ),
    3 => array(
        "link" => "https://4khooneh.org/%d8%af%d8%a7%d9%86%d8%b4%da%af%d8%a7%d9%87-%d9%81%d8%b1%d9%87%d9%86%da%af%db%8c%d8%a7%d9%86-%d9%85%d8%ad%d8%b5%d9%88%d9%84%d8%a7%d8%aa/",
        "img" => "https://4khooneh.org/wp-content/uploads/2024/12/farhangian.png",
        "txt" => "کنکور فرهنگیان",
        "main" => "ok",
        "color" => "#feead8",
    ),
    4 => array(
        "link" => "https://4khooneh.org/%d8%a8%d8%b3%d8%aa%d9%87-%d9%87%d8%a7%db%8c-%d8%af%d8%a8%db%8c%d8%b1%db%8c/",
        "img" => "https://4khooneh.org/wp-content/uploads/2024/12/dabir.png",
        "txt" => "بسته های دبیری",
        "main" => "ok",
        "color" => "#feead8",
    ),
     5 => array(
        "link" => "https://4khooneh.org/%da%a9%d9%86%da%a9%d9%88%d8%b1-%d9%87%d9%86%d8%b1/",
        "img" => "https://4khooneh.org/wp-content/uploads/2025/12/kh.png",
        "txt" => "کنکور هنر",
        "main" => "ok",
        "color" => "#feead8",
    ),
    6 => array(
        "link" => "https://4khooneh.org/%D9%87%D9%86%D8%B1%D8%B3%D8%AA%D8%A7%D9%86/%D9%BE%D8%A7%DB%8C%D9%87-%D8%AF%D9%87%D9%85/%D9%81%DB%8C%D9%84%D9%85-%D8%A2%D9%85%D9%88%D8%B2%D8%B4%DB%8C-%D9%BE%D8%A7%DB%8C%D9%87-%D8%AF%D9%87%D9%85/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp1.png",
        "txt" => "فیلم‌های آموزشی",
        "main" => "no",
        "color" => "#feead8",
    ),
    7 => array(
        "link" => "https://4khooneh.org/%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87-%D9%87%D8%A7%DB%8C-%D9%87%D9%86%D8%B1%D8%B3%D8%AA%D8%A7%D9%86/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp20.png",
        "txt" => "مشاوره تحصیلی",
        "main" => "no",
        "color" => "#feead8",
    ),
    8 => array(
        "link" => "https://4khooneh.org/%DA%A9%D9%86%DA%A9%D9%88%D8%B1%D9%87%D8%A7%DB%8C-%D8%A2%D8%B2%D9%85%D8%A7%DB%8C%D8%B4%DB%8C-%D9%87%D9%86%D8%B1%D8%B3%D8%AA%D8%A7%D9%86/",
        "img" => "https://4khooneh.org/wp-content/uploads/2025/08/h5.png",
        "txt" => "کنکور های آزمایشی",
        "main" => "no",
    ),
    9 => array(
        "link" => "https://4khooneh.org/%D9%81%DB%8C%D9%84%D9%85-%D8%A2%D9%85%D9%88%D8%B2%D8%B4-%D8%B1%D8%A7%D9%87%D9%86%D9%85%D8%A7%DB%8C-%D8%AE%D8%B1%DB%8C%D8%AF-%D8%A7%DB%8C%D9%86%D8%AA%D8%B1%D9%86%D8%AA%DB%8C/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp16.png",
        "txt" => "راهنمای خرید",
        "main" => "no",
    ),
    10 => array(
        "link" => "https://4khooneh.org/%D8%B3%D9%88%D8%A7%D9%84%D8%A7%D8%AA-%D9%85%D8%AA%D8%AF%D8%A7%D9%88%D9%84",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp3.png",
        "txt" => "سوالات متداول",
        "main" => "no",
    ),
    11 => array(
        "link" => "https://4khooneh.org/%da%a9%d8%a7%d8%b1%d9%86%d8%a7%d9%85%d9%87-%d9%82%d8%a8%d9%88%d9%84-%d8%b4%d8%af%da%af%d8%a7%d9%86-%da%a9%d9%86%da%a9%d9%88%d8%b1-%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp2.png",
        "txt" => "کارنامه‌های قبولی",
        "main" => "no",
    ),
    12 => array(
        "link" => "https://ketabonline.ir",
        "img" => "https://4khooneh.org/wp-content/uploads/2025/04/g1.png",
        "txt" => "کتابهای گاج/خیلی سبز و..",
        "main" => "ok",
        "color" => "#efff00",
    ),
    13 => array(
        "link" => "https://ketabonline.ir/product-category/%D8%A2%D8%B2%D9%85%D9%88%D9%86-%D8%AA%DB%8C%D8%B2%D9%87%D9%88%D8%B4%D8%A7%D9%86",
        "img" => "https://4khooneh.org/wp-content/uploads/2025/04/g3.png",
        "txt" => "خرید کتاب های تیزهوشان",
        "main" => "ok",
        "color" => "#efff00",
    ),
    14 => array(
        "link" => "https://ketabonline.ir/product-category/%D8%B1%D9%88%D8%A7%D9%86-%D8%B4%D9%86%D8%A7%D8%B3%DB%8C",
        "img" => "https://4khooneh.org/wp-content/uploads/2025/04/g4.png",
        "txt" => "خرید کتاب های روانشناسی",
        "main" => "ok",
        "color" => "#efff00",
    ),
    15 => array(
        "link" => "https://ketabonline.ir/product-category/%DA%A9%D8%AA%D8%A7%D8%A8-%DA%A9%D9%86%DA%A9%D9%88%D8%B1",
        "img" => "https://4khooneh.org/wp-content/uploads/2025/04/g2.png",
        "txt" => "کتاب های کنکور ریاضی/تجربی",
        "main" => "ok",
        "color" => "#efff00",
    ),
    16 => array(
        "link" => "https://ketabonline.ir/product-category/%DA%A9%D9%85%DA%A9-%D8%AF%D8%B1%D8%B3%DB%8C-%D9%85%D8%AA%D9%88%D8%B3%D8%B7%D9%87-%D8%A7%D9%88%D9%84",
        "img" => "https://4khooneh.org/wp-content/uploads/2025/04/g5.png",
        "txt" => "خرید کتاب های متوسطه اول",
        "main" => "ok",
        "color" => "#efff00",
    ),
    17 => array(
        "link" => "https://ketabonline.ir/product-category/%DA%A9%D9%85%DA%A9-%D8%AF%D8%B1%D8%B3%DB%8C-%D9%85%D8%AA%D9%88%D8%B3%D8%B7%D9%87-%D8%AF%D9%88%D9%85",
        "img" => "https://4khooneh.org/wp-content/uploads/2025/04/g6.png",
        "txt" => "خرید کتاب های متوسطه دوم",
        "main" => "ok",
        "color" => "#efff00",
    ),
    18 => array(
        "link" => "https://4khooneh.org/%d9%85%d8%b5%d8%a7%d8%ad%d8%a8%d9%87-%d8%a8%d8%a7-%d8%b1%d8%aa%d8%a8%d9%87-%d9%87%d8%a7%db%8c-%d8%a8%d8%b1%d8%aa%d8%b1-%da%a9%d9%86%da%a9%d9%88%d8%b1/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp21.png",
        "txt" => "مصاحبه با رتبه‌های برتر",
        "main" => "no",
    ),
    
    19 => array(
        "link" => "https://4khooneh.org/%D9%85%D8%B9%D8%B1%D9%81%DB%8C-%D9%87%D9%86%D8%B1%D8%B3%D8%AA%D8%A7%D9%86-%D9%87%D8%A7/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp17.png",
        "txt" => "معرفی هنرستان‌ها",
        "main" => "no",
    ),
    20 => array(
        "link" => "https://4khooneh.org/%D9%85%D8%B9%D8%B1%D9%81%DB%8C-%D8%AF%D8%A7%D9%86%D8%B4%DA%AF%D8%A7%D9%87-%D9%87%D8%A7/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp4.png",
        "txt" => "معرفی دانشگاه‌ها",
        "main" => "no",
    ),
    21 => array(
        "link" => "https://4khooneh.org/%D8%A2%D8%AB%D8%A7%D8%B1-%D8%A8%D8%B1%DA%AF%D8%B2%DB%8C%D8%AF%D9%87-%D9%87%D9%86%D8%B1%D8%AC%D9%88%DB%8C%D8%A7%D9%86/",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp25.png",
        "txt" => "آثار برگزیدۀ هنرجویان",
        "main" => "no",
    ),
    22 => array(
        "link" => "https://4khooneh.org/%D9%86%D9%85%D8%A7%DB%8C%D9%86%D8%AF%DA%AF%DB%8C-%D9%87%D8%A7%DB%8C-%D9%81%D8%B1%D9%88%D8%B4",
        "img" => "https://4khooneh.org/wp-content/uploads/2022/12/hp26.png",
        "txt" => "نمایندگی‌های فروش",
        "main" => "no",
    ),
    23 => array(
        "link" => "https://4khooneh.org/%DA%A9%D9%84%D8%A7%D8%B3-%D8%A2%D9%86%D9%84%D8%A7%DB%8C%D9%86-%D9%87%D9%86%D8%B1%D8%B3%D8%AA%D8%A7%D9%86/",
        "img" => "https://4khooneh.org/wp-content/uploads/2025/11/h7.png",
        "txt" => "کلاس آنلاین",
        "main" => "no",
    ),
);
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
<div>
    <div>
        <div class="ck-page-container ">

            <div class="ck-page-content ry-content-page ryy-index-content">

                <div class="row" dir="rtl">

                    <article class="col-lg-12 index-article">
                        <div class="firstpage__header">
                            <div class="container">
                                <div class="header_main">
                                    <h1 class="header_main--title mb-4 " style="font-size:18px">انتشارات چهارخونه ناشر
                                        تخصصی آزمون استخدامی|هنرستان</h1>
                                </div>
                                <div class="row">
                                    <?php

                                    // $all_content=unserialize(get_post_meta($post->ID, 'allCat', true));
                                    foreach ($all_content as $content) {
                                        $color = 'white';
                                        if ($content['main'] == "ok")
                                            $color = $content['color'];
                                        ?>
                                        <div class="col-4 col-sm-4 col-md-2 p-1 p-sm-2 cursor ">
                                            <a href="<?php echo $content['link'] ?>">
                                                <div style="background-color: <?php echo $color ?>"
                                                    class=" d-flex flex-column rounded-4 shadow p-sm-3 text-center ry-pointer ry-transaction ry-hoverScroll">
                                                    <img src="<?php echo $content['img'] ?>"
                                                        alt="<?php echo $content['txt'] ?>"
                                                        title="<?php echo $content['txt'] ?>" class="mt-3 mx-auto"
                                                        width="42">
                                                    <h2 class="mt-4 mb-3 f-12-f text-center text-dark"><?php echo $content['txt'] ?></h2>
                                                </div>
                                            </a>

                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="header__firstImage"></div>
                                <div class="row">
                                    <div class="header_codeLineImage p-0 col-lg-12 rounded3">

                                        <?php include("ry-slideshow-mainbg.php") ?>
                                    </div>
                                </div>



                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="container">
                            <?php
                            if (current_user_can('administrator')) {

                                ?>
                                <div class="col-lg-12">
                                    <form class="form-control" data-abide id="myform" action="" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="col-lg-12 ry-chanel">
                                            <h3 class="text-right">اسلاید شو اصلی </h3>
                                        </div>

                                        <div class="col-lg-12 all-marahel">
                                            <?php
                                            $iii = 0;
                                            $jjj = 1;

                                            if ($afff = get_post_meta($post_ids, 'اسلاید اصلی', true)) {
                                                $afff = unserialize($afff);

                                                foreach ($afff as $ff) {
                                                    ?>
                                                    <div class="marhale">
                                                        <div class="col-lg-1 col-2 float-right mar"><span
                                                                class="float-right ry-numberrr"><?php echo $jjj ?></span>
                                                        </div>
                                                        <div class=" col-4 float-right mar">
                                                            <input name="marhale[]" type="text" class="form-control  text-right"
                                                                placeholder="توضیح اسلاید" value="<?php echo $ff[0] ?>">
                                                        </div>
                                                        <div class=" col-4 float-right mar">
                                                            <input name="peyvand[]" type="text" class="form-control  text-right"
                                                                placeholder="آدرس پیوند" value="<?php echo $ff[2] ?>">
                                                        </div>
                                                        <div class="col-lg-3 float-right">
                                                            <?php
                                                            if ($ff[1] == "")
                                                                $ss = 'http://qazakade.ir/wp-content/themes/ghazakade/img/addimage.jpg';
                                                            else
                                                                $ss = get_home_url() . "/" . $ff[1];
                                                            ?>
                                                            <label class="float-right ry-logo-image">
                                                                <img id="img<?php echo $jjj ?>" src=<?php echo $ss ?>"
                                                        alt=" your image">
                                                                <input id="<?php echo $jjj ?>" class="form-control"
                                                                    name="upload_attachment[<?php echo $iii ?>]" type="file"
                                                                    onchange="readURL(this);">
                                                            </label>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <?php
                                                    $jjj++;
                                                    $iii++;
                                                }
                                            } else {
                                                ?>
                                                <div class="marhale">
                                                    <div class="col-lg-1 col-2 float-right mar"><span
                                                            class="float-right ry-numberrr">1</span></div>
                                                    <div class=" col-4 float-right mar">
                                                        <input name="marhale[]" type="text" class="form-control  text-right"
                                                            placeholder="توضیح اسلاید">
                                                    </div>
                                                    <div class=" col-4 float-right mar">
                                                        <input name="peyvand[]" type="text" class="form-control  text-right"
                                                            placeholder="آدرس پیوند">
                                                    </div>
                                                    <div class="col-lg-3 float-right">
                                                        <label class="float-right ry-logo-image">
                                                            <img id="img1"
                                                                src="http://qazakade.ir/wp-content/themes/ghazakade/img/addimage.jpg"
                                                                alt="your image">
                                                            <input id="1" class="form-control" name="upload_attachment[0]"
                                                                type="file" onchange="readURL(this);">
                                                        </label>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <input id="btn-add-new-marhale" type="button" class="btn col-12"
                                                value="اضافه کردن اسلاید">
                                        </div>
                                        <div class="col-lg-12 ">
                                            <div class="col-lg-2">
                                                <input type="submit" class="ry-btn-submit" id="ry-profile-submit"
                                                    value="ثبت" name="rysubmit">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                    <input id="rrr" class="d-none" value="<?php echo $iii++ ?>">
                                    <script>
                                        var ii = 4;
                                        var dd = parseInt($('#rrr').val());
                                        if (dd === 0)
                                            dd = 1;
                                        var jj = dd + 1;
                                        $("#btn-add-new-marhale").on('click', function () {
                                            $(".all-marahel").append('<div class="marhale">\n' +
                                                '                <div class="col-lg-1 col-2 float-right mar"><span class="float-right ry-numberrr">' + jj + '</span></div>\n' +
                                                '                <div class="col-lg-4 col-4 float-right mar"><input  name="marhale[]" type="text" class="form-control  text-right" placeholder="توضیح اسلاید"></div>\n' +
                                                '                <div class="col-lg-4 col-4 float-right mar"><input  name="peyvand[]" type="text" class="form-control  text-right" placeholder="آدرس پیوند"></div>\n' +
                                                '                <div class="col-lg-3 float-right">\n' +
                                                '                    <label class="float-right ry-logo-image" >\n' +
                                                '                        <img id="img' + jj + '" src="http://qazakade.ir/wp-content/themes/ghazakade/img/addimage.jpg" alt="your image">\n' +
                                                '                        <input id="' + jj + '" class="form-control" name="upload_attachment[' + dd + ']" type="file" onchange="readURL(this);">\n' +
                                                '                    </label>\n' +
                                                '                </div>\n' +
                                                '                <div class="clear"></div>\n' +
                                                '            </div>');
                                            ii++;
                                            dd++;
                                            jj++;
                                        });
                                    </script>
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
                                </div>
                                <?php
                            }
                            ?>
                        </div>


                        <div class="container d-none">
                            <div class="col-lg-12 ry-fast-accsess">
                                <p class="text-right ry-head-carosel"><span class="ry-ppaa">دسترسی سریع</span>
                                <div class="col-lg-4 float-right">
                                    <select class="form-control ry-sssss" id="maghta">
                                        <option> پایه تحصیلی خود را انتخاب نمایید</option>
                                        <option>هنرستان</option>
                                        <option>دوره اول متوسطه</option>
                                        <option>دوره ابتدایی</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 float-right">
                                    <select class="form-control ry-sssss" id="sale_tahsili" disabled>
                                        <option value="1"> سال تحصیلی خود را انتخاب نمایید</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 float-right">
                                    <select class="form-control ry-sssss" id="reshte_tahsili" disabled>
                                        <option value="1"> رشته تحصیلی</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 float-right">
                                    <button class="btn btn-danger" id="btn-fast">انتخاب</button>
                                </div>
                            </div>
                            <script>
                                $("#maghta").change(function () {
                                    var maghta = $("#maghta").val();
                                    var sal = $("#sale_tahsili");
                                    sal.html('');
                                    var reshte = $("#reshte_tahsili");
                                    sal.removeAttr('disabled');
                                    reshte.html('');
                                    if (maghta === "هنرستان") {
                                        reshte.removeAttr('disabled');
                                        sal.append('<option>سال دهم هنرستان</option>');
                                        sal.append('<option>سال یازدهم هنرستان</option>');
                                        sal.append('<option>سال دوازدهم هنرستان</option>');
                                        reshte.append('<option>رشته شبکه نرم افزار</option>');
                                        reshte.append('<option>رشته معماری</option>');
                                        reshte.append('<option>رشته حسابداری</option>');
                                        reshte.append('<option>رشته الکتروتکنیک</option>');
                                        reshte.append('<option>رشته الکترونیک</option>');
                                        reshte.append('<option >رشته گرافیک</option>');
                                        reshte.append('<option>رشته مکانیک خودرو</option>');
                                        reshte.append('<option>رشته ماشین ابزار</option>');
                                        reshte.append('<option >رشته تربیت بدنی</option>');
                                        reshte.append('<option>رشته ساختمان</option>');
                                        reshte.append('<option >رشته تربیت کودک</option>');
                                    }
                                    if (maghta === "دوره اول متوسطه") {
                                        reshte.attr('disabled', 'disabled');
                                        reshte.append('<option>رشته تحصیلی</option>');
                                        sal.append('<option>سال هفتم</option>');
                                        sal.append('<option>سال هشتم</option>');
                                        sal.append('<option>سال نهم </option>');
                                    }
                                    if (maghta === "دوره ابتدایی") {
                                        reshte.attr('disabled', 'disabled');
                                        reshte.append('<option>رشته تحصیلی</option>');
                                        sal.append('<option>سال سوم</option>');
                                        sal.append('<option>سال چهارم</option>');
                                        sal.append('<option>سال پنجم </option>');
                                        sal.append('<option>سال ششم </option>');
                                    }


                                });


                                $("#btn-fast").on('click', function () {
                                    var maghta = $("#maghta").val();
                                    var sale_tahsili = $("#sale_tahsili").val();
                                    var reshte = $("#reshte_tahsili").val();
                                    if (maghta === "دوره ابتدایی") {
                                        if (sale_tahsili === "سال سوم") {
                                            window.location.replace('https://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d8%a8%d8%aa%d8%af%d8%a7%db%8c%db%8c/%d9%be%d8%a7%db%8c%d9%87-%d8%b3%d9%88%d9%85/');
                                        }
                                        if (sale_tahsili === "سال چهارم") {
                                            window.location.replace('https://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d8%a8%d8%aa%d8%af%d8%a7%db%8c%db%8c/%d9%be%d8%a7%db%8c%d9%87-%da%86%d9%87%d8%a7%d8%b1%d9%85/');
                                        }
                                        if (sale_tahsili === "سال پنجم") {
                                            window.location.replace('https://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d8%a8%d8%aa%d8%af%d8%a7%db%8c%db%8c/%d9%be%d8%a7%db%8c%d9%87-%d9%be%d9%86%d8%ac%d9%85/');
                                        }
                                        if (sale_tahsili === "سال ششم") {
                                            window.location.replace('https://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d8%a8%d8%aa%d8%af%d8%a7%db%8c%db%8c/%d9%be%d8%a7%db%8c%d9%87-%d8%b4%d8%b4%d9%85/');
                                        }
                                    }
                                    if (maghta === "دوره اول متوسطه") {
                                        if (sale_tahsili === "سال هفتم") {
                                            window.location.replace('https://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d9%88%d9%84-%d9%85%d8%aa%d9%88%d8%b3%d8%b7%d9%87/%d9%be%d8%a7%db%8c%d9%87-%d9%87%d9%81%d8%aa%d9%85/');

                                        }
                                        if (sale_tahsili === "سال هشتم") {
                                            window.location.replace('https://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d9%88%d9%84-%d9%85%d8%aa%d9%88%d8%b3%d8%b7%d9%87/%d9%be%d8%a7%db%8c%d9%87-%d9%87%d8%b4%d8%aa%d9%85/');

                                        }
                                        if (sale_tahsili === "سال نهم") {
                                            window.location.replace('https://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d9%88%d9%84-%d9%85%d8%aa%d9%88%d8%b3%d8%b7%d9%87/%d9%be%d8%a7%db%8c%d9%87-%d9%86%d9%87%d9%85/');

                                        }
                                    }
                                    if (maghta === "هنرستان") {
                                        if (sale_tahsili === "سال دهم هنرستان") {
                                            if (reshte === "رشته شبکه نرم افزار") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%b4%d8%a8%da%a9%d9%87-%d9%88-%d9%86%d8%b1%d9%85-%d8%a7%d9%81%d8%b2%d8%a7%d8%b1-%d8%b1%d8%a7%db%8c%d8%a7%d9%86%d9%87-%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته معماری") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d9%85%d8%b9%d9%85%d8%a7%d8%b1%db%8c-%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته حسابداری") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%ad%d8%b3%d8%a7%d8%a8%d8%af%d8%a7%d8%b1%db%8c-%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته الکتروتکنیک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d8%aa%da%a9%d9%86%db%8c%da%a9-%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته الکترونیک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d9%86%db%8c%da%a9-%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته گرافیک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%da%af%d8%b1%d8%a7%d9%81%db%8c%da%a9-%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته مکانیک خودرو") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d9%85%da%a9%d8%a7%d9%86%db%8c%da%a9-%d8%ae%d9%88%d8%af%d8%b1%d9%88-%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته ماشین ابزار") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d9%85%d8%a7%d8%b4%db%8c%d9%86-%d8%a7%d8%a8%d8%b2%d8%a7%d8%b1-%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته تربیت بدنی") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%d8%a8%d8%af%d9%86%db%8c/');
                                            }
                                            if (reshte === "رشته ساختمان") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%b3%d8%a7%d8%ae%d8%aa%d9%85%d8%a7%d9%86-%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته تربیت کودک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%da%a9%d9%88%d8%af%da%a9-%d8%af%d9%87%d9%85/');
                                            }
                                        }
                                        if (sale_tahsili === "سال یازدهم هنرستان") {
                                            if (reshte === "رشته شبکه نرم افزار") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%b4%d8%a8%da%a9%d9%87-%d9%88-%d9%86%d8%b1%d9%85-%d8%a7%d9%81%d8%b2%d8%a7%d8%b1-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته معماری") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%d8%b9%d9%85%d8%a7%d8%b1%db%8c-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته حسابداری") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%ad%d8%b3%d8%a7%d8%a8%d8%af%d8%a7%d8%b1%db%8c-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته الکتروتکنیک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d8%aa%da%a9%d9%86%db%8c%da%a9-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته الکترونیک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d9%86%db%8c%da%a9-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته گرافیک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%da%af%d8%b1%d8%a7%d9%81%db%8c%da%a9-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته مکانیک خودرو") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%da%a9%d8%a7%d9%86%db%8c%da%a9-%d8%ae%d9%88%d8%af%d8%b1%d9%88-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته ماشین ابزار") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%d8%a7%d8%b4%db%8c%d9%86-%d8%a7%d8%a8%d8%b2%d8%a7%d8%b1-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته تربیت بدنی") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%d8%a8%d8%af%d9%86%db%8c-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته ساختمان") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%b3%d8%a7%d8%ae%d8%aa%d9%85%d8%a7%d9%86-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته تربیت کودک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%da%a9%d9%88%d8%af%da%a9-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }

                                        }
                                        if (sale_tahsili === "سال دوازدهم هنرستان") {
                                            if (reshte === "رشته شبکه نرم افزار") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%b4%d8%a8%da%a9%d9%87-%d9%88-%d9%86%d8%b1%d9%85-%d8%a7%d9%81%d8%b2%d8%a7%d8%b1-%d8%b1%d8%a7%db%8c%d8%a7%d9%86%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته معماری") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%d8%b9%d9%85%d8%a7%d8%b1%db%8c-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته حسابداری") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%ad%d8%b3%d8%a7%d8%a8%d8%af%d8%a7%d8%b1%db%8c-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته الکتروتکنیک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d8%aa%da%a9%d9%86%db%8c%da%a9-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته الکترونیک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d9%86%db%8c%da%a9-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته گرافیک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%da%af%d8%b1%d8%a7%d9%81%db%8c%da%a9-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته مکانیک خودرو") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%da%a9%d8%a7%d9%86%db%8c%da%a9-%d8%ae%d9%88%d8%af%d8%b1%d9%88-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته ماشین ابزار") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%d8%a7%d8%b4%db%8c%d9%86-%d8%a7%d8%a8%d8%b2%d8%a7%d8%b1-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته تربیت بدنی") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%d8%a8%d8%af%d9%86%db%8c-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته ساختمان") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%b3%d8%a7%d8%ae%d8%aa%d9%85%d8%a7%d9%86-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }
                                            if (reshte === "رشته تربیت کودک") {
                                                window.location.replace('https://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%da%a9%d9%88%d8%af%da%a9-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                            }

                                        }
                                    }

                                });
                            </script>
                        </div>
                        <div class="container ry-product-carosell">

                            <div class="col-lg-12 ry-product-caroser">
                                <?php include("ry-new-product-caroser.php") ?>
                            </div>
                            <div class="col-lg-12 ry-product-caroser ">
                                <?php include("ry-porfroshtarin-product-caroser.php") ?>
                            </div>
                            <div class="col-lg-12 ry-product-caroser ">
                                <?php include("ry-film-best-caroser.php") ?>
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