<?php
/*
Template Name: allclass
*/
include("header.php"); ?>
<style>
.ry-time-check{
	display:none!important;
}
</style>
    <div>

        <div>
            <div class="ck-page-container ">
                <div class="ck-page-show ">
                    <?php
                    global $post, $product;
                    $title = $post->post_title;
                    ?>
                    <div class="ck-page-show-container ck-col-container">
                        <ul>
                            <li>
                                <a><?php echo $title_parent = get_the_title($post->post_parent); ?></a>
                            </li>
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            <li>
                                <a><?php the_title(); ?></a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <?php include("ck-page-rightside-bar.php"); ?>
                        </div>
                        <article class="ck-page-article">
                            <div class="alert alert-primary p-3">

                                <?php
                                if (is_user_logged_in()) {
                                    ?>
                                    <p class="text-center p-3" style="font-size: 13px">شما در سامانه وارد شده اید لطفا وارد کلاس خود شوید</p>
                                    <?php
                                } else {
                                    ?>
                                    <p class="mt-3 mb-5 text-center" style="font-size: 15px;">برای ثبت نام اطلاعات خود را
                                        وارد نمایید</p>
                                    <div class="form-group form-row">

                                        <div class="col-6 col-md-2">
                                            <label for="userName" class="">نام و نام خانوادگی </label>
                                            <input type="text" value="" id="userName" name="userName"
                                                   class="form-control ry-fill">
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <label for="phoneNumber" class="">شماره تماس </label>
                                            <input type="number" value="" id="phoneNumber" name="phoneNumber"
                                                   class="form-control ry-fill">
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <label for="phoneNumber" class="">رشته تحصیلی</label>
                                            <select type="text" value="" id="reshte" style="height: 35px"
                                                    class="form-control ry-fill" name="reshte">
                                                <option>شبکه و نرم افزار</option>
                                                <option>حسابداری</option>
                                                <option>الکتروتکنیک</option>
                                                <option>مکانیک</option>
                                            </select>
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <label for="userLogin" class="">نام کاربری(انگلیسی) </label>
                                            <input type="text" value="" id="userLogin" name="userLogin"
                                                   class="form-control ry-fill">
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <label for="password" class="">رمز عبور </label>
                                            <input type="password" value="" id="password" name="password"
                                                   class="form-control ry-fill">
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <label for="repassword" class="">تکرار رمز عبور </label>
                                            <input type="password" value="" id="repassword" name="repassword"
                                                   class="form-control ry-fill">
                                        </div>
                                        <div class="col-12 col-md-12 pt-3 text-left">
                                            <button class="btn btn-primary mt-4 px-5" id="store" onclick="stor()">ذخیره
                                            </button>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>


                            <?php
                            $zz = 0;
                            if (get_post_meta($post->ID, 'رشته ها', true)) {
                                $film_kind = get_post_meta($post->ID, 'رشته ها', true);
                                $film_kind = unserialize($film_kind);
                            }
                            $xxx = 0;
                            $fff = 0;
                            $counter = 0;
                            foreach ($film_kind as $fk) {
                                ?>
                                <div class="ry-bbbb ryy-b-<?php echo $zz;
                                $zz++; ?>">
                                    <h2 class="text-center ry-hedear-filmss"><span
                                                class="ry-danger"><?php echo $fk ?></span></h2>
                                    <div class="row">
                                        <?php
                                        if ($term = get_term_by('id', $id, 'product_cat')) {
                                            echo $term->name;
                                        }
                                        $cat = $title;
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                        $ppp = -1;
                                        if ($zz == 9) $zz = 0;
                                        if ($xxx == 0) {
                                            $args = array(
                                                'posts_per_page' => -1,
                                                'post_status' => "publish",
                                                'post_type' => "page",
                                                'orderby' => 'publish_date',
                                                'meta_key' => 'وضعیت برگزاری',
                                                'meta_value' => 'no',
                                                'order' => 'ASC',
                                            );
                                        } else {
                                            $args = array(
                                                'posts_per_page' => 25,
                                                'post_status' => "publish",
                                                'category_name' => $fk,
                                                'post_type' => "post",
                                                'orderby' => 'publish_date',
                                                'order' => 'ASC',
                                            );
                                        }

                                        $loop = new WP_Query($args);
                                        while ($loop->have_posts()) : $loop->the_post();
                                            global $product;
                                            $regular_price = get_post_meta($loop->post->ID, 'قیمت اصلی', true);
                                            $final_price = get_post_meta($loop->post->ID, 'قیمت فروش ویژه', true);
                                            $in_stock_movie = get_post_meta($loop->post->ID, 'موجود در انبار', true);
                                            $viewers = get_post_meta($loop->post->ID, 'post_views_count', true);
                                            $coming_soon = get_post_meta($loop->post->ID, 'coming_soon', true);
                                            $has_not_ostad = get_post_meta($post->ID, 'بدون استاد', true);
                                            ?>
                                            <div class="ck-book ry-fiilllmm <?php if ($coming_soon == 'ok') {
                                                echo "ry-comming-soon";
                                            } ?>">
                                                <a href="<?php if ($coming_soon != "ok") {
                                                    echo get_permalink($loop->post->ID);
                                                } else {
                                                    echo "";
                                                } ?>">
                                                    <?php if (((1 - ((int)($final_price) / (int)($regular_price))) * 100) != 0 && $in_stock_movie == "ok") { ?>
                                                        <span class="ry-bargain">   <?php echo (int)((1 - ((int)($final_price) / (int)($regular_price))) * 100) ?>
                                                            % </span>
                                                    <?php } ?>
                                                    <?php
                                                    $image_id = $loop->post->ID;
                                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'single-post-thumbnail');
                                                    ?>
                                                    <?php ?>
                                                    <img class="lazy ck-book-img" data-src="<?php echo $image[0]; ?>"
                                                         src="<?php bloginfo('url'); ?>/img/lazyloud.jpg"
                                                         alt="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                                    <?php
                                                    if ($coming_soon == "ok") {
                                                        ?>
                                                        <span class="ry-comming-soon-ss"> به زودی </span>
                                                        <?php
                                                    }
                                                    ?>

                                                    <h3 class="ry-film-title">
                                                        <?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>
                                                    </h3>
                                                </a>

                                                <div class="d-none col-md-12 float-left text-center ry-rateeeee">
                                                    <?php if (function_exists('the_ratings')) {
                                                        the_ratings();
                                                    } ?>
                                                </div>
                                                <a href="<?php if ($coming_soon != "ok") {
                                                    echo get_permalink($loop->post->ID);
                                                } else {
                                                    echo "";
                                                } ?>">
                                                    <div class="ostad-attr">
                                                        <?php
                                                        $recent_author = get_user_by('ID', $loop->post->post_author);
                                                        $author_display_name = $recent_author->display_name;
                                                        if (get_user_meta($recent_author->ID, 'logo', true)) {
                                                            $imag_logo = get_user_meta($recent_author->ID, 'logo', true);
                                                            $imag_logo = get_home_url() . "/" . $imag_logo;
                                                        } else {
                                                            $imag_logo = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                        }
                                                        if (get_user_meta($recent_author->ID, 'nickname', true)) {
                                                            $ostad_name = get_user_meta($recent_author->ID, 'nickname', true);
                                                        }
                                                        ?>

                                                        <?php
                                                        if ($has_not_ostad !== "ok") {
                                                            ?>
                                                            <img class="lazy float-right"
                                                                 src="<?php bloginfo('url') ?>/wp-content/uploads/2019/12/user2.png"
                                                                 data-src="<?php echo $imag_logo ?>"
                                                                 alt="<?php echo $author_display_name; ?>">
                                                            <p class="float-right ry-aurtorname">
                                                                <?php echo "استاد:" . $ostad_name; ?>
                                                            </p>
                                                            <div class="clear"></div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php

                                                    if ($xxx == 0) {


                                                        $time = "Jan 5, 2021 15:37:25";

                                                        if (get_post_meta($loop->post->ID, 'ساعت', true)) {
                                                            $time = get_post_meta($loop->post->ID, 'ساعت', true);
                                                            echo "<input type='text' class='d-none saat$counter' value='$time'>";
                                                        }
                                                        ?>
                                                        <div class="col-12 ry-time-check">
                                                            <p id="rytimer<?php echo $counter ?>"></p>
                                                            <script>

                                                                var x = setInterval(function () {
                                                                    var counter =<?php echo $counter;?>;
                                                                    var time = $(".saat" + counter).val();
                                                                    var countDownDate = new Date(time).getTime();

                                                                    var now = new Date().getTime();
                                                                    var distance = countDownDate - now;
                                                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                                                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                                                    document.getElementById("rytimer" + counter).innerHTML = days + "روز " + hours + "ساعت "
                                                                        + minutes + "دقیقه " + seconds + "ثانیه ";
                                                                    if (distance < 0) {
                                                                        clearInterval(x);
                                                                        document.getElementById("rytimer" + counter).innerHTML = "در حال برگزاری";
                                                                    }
                                                                }, 1000);
                                                            </script>
                                                        </div>

                                                        <?php
                                                        $counter++;
                                                    }
                                                    ?>

                                                    <div class="col-12">
                                                        <div class=" col-12 float-right text-right ry-viewww">
                                                        <span class="ry-clooocck ry-cccc">

                                                        <i class="fa fa-clock"></i>
                                                            <?php
                                                            $timmm = get_post_meta($loop->post->ID, 'ساعت برگزاری', true);
                                                            echo $timmm; ?>
                                                    </span>
                                                        </div>
                                                        <div class="col-lg-5 col-4  float-left text-left ry-viewww">
                                                    <span>
                                                        <?php echo $viewers ?>
                                                    </span>
                                                            <span>
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>


                                        <?php

                                        endwhile;
                                        $xxx++;
                                        wp_reset_query(); ?>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="ck-all-page-content">
                                <?php
                                $my_postid = $_REQUEST['page_id'];
                                $content_post = get_post($my_postid);
                                $content = $content_post->post_content;
                                ?>
                                <!--                                --><?php //echo do_shortcode($content) ?>
                            </div>
                            <div class="ck-comment-header">
                                <img src="<?php bloginfo('url'); ?>/img/comment-icom.png" alt="نظرات">
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
                            </script>
                            <div class="ck-comments">
                                <?php comments_template(); ?>
                            </div>
                        </article>
                        <div class="clear"></div>
                        <?php include("ck-footer-pages.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        stor = () => {
            let username = document.getElementById('userName').value;
            let phoneNumber = document.getElementById('phoneNumber').value;
            let reshte = document.getElementById('reshte').value;
            let userLogin = document.getElementById('userLogin').value;
            let password = document.getElementById('password').value;
            let repassword = document.getElementById('repassword').value;
            if (username.length < 3 || phoneNumber.length !== 11 || reshte.length < 3 || userLogin.length < 3 ||
                password.length < 6 || repassword.length < 6 || password !== repassword)
                errorMsg();
            else
                successMsg(username, phoneNumber, reshte, userLogin, password);
        };
        errorMsg = () => {
            Swal.fire({
                confirmButtonText: 'متوجه شدم',
                icon: 'error',
                title: 'مشکل در ارسال اطلاعات',
                text: 'اطلاعات خود را صحیح وارد نمایید'

            });
        };
        successMsg = (userName, phoneNumber, reshte, userLogin, password) => {
            $.ajax({
                type: 'POST',
                url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                data: {
                    action: 'saveUserLead',
                    userName: userName,
                    phoneNumber: phoneNumber,
                    reshte: reshte,
                    userLogin: userLogin,
                    password: password
                },
                beforeSend: function () {
                    document.getElementById('store').innerHTML = `<i style="font-size: 10px!important;" class="fa fa-spinner text-white f-12 ry-spin ry"></i>`;
                },
                success: function (res) {
                    document.getElementById('store').innerHTML = 'ذخیره';
                    if (res.statuse === "ok") {
                        $('.ry-fill').val('');
                        Swal.fire({
                            confirmButtonText: 'متوجه شدم',
                            icon: 'success',
                            title: 'عملیات موفق آمیز بود',
                            text: 'اطلاعات شما با موفقیت ثبت شد و شما به سایت وارد شدید میتوانید وارد کلاس خود شوید'

                        });
                        window.location.reload();
                    }
                    else {
                        Swal.fire({
                            confirmButtonText: 'متوجه شدم',
                            icon: 'error',
                            title: 'عملیات موفق آمیز نبود',
                            text: res.title

                        });
                    }

                }
            });


        }
    </script>
<?php include("footer.php") ?>