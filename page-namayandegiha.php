<?php
/*
Template Name: namayandegiha
*/
?>
<?php include("header.php"); ?>
<div>
    <div>
        <div class="ck-page-container ">
            <div class="ck-page-show  d-none">
                <?php
                global $post, $product;
                $title = $post->post_title;
                ?>

            </div>

            <div class="" dir="rtl">
                <style>
                    .ck-article-namayandegi-frosh {
                        width: 100% !important;

                    }

                    #ck-map-namayandegiha {
                        zoom: 79%;
                        padding-top: 87px;
                    }

                    @media only screen and (max-width: 600px) and (min-width: 0px) {
                        #ck-map-namayandegiha {
                            zoom: 38%;
                            margin-top: 0px;
                        }
                    }

                    @media only screen and (max-width: 1200px) and (min-width: 600px) {
                        #ck-map-namayandegiha {
                            zoom: 58%;
                            margin-top: 244px;
                        }

                    }

                    @media only screen and (max-width: 1400px) and (min-width: 1201px) {
                        #ck-map-namayandegiha {
                            zoom: 58%;
                            margin-top: 54px;
                        }
                    }

                    #ck-map-overlay .ck-overlay-poly {
                        fill: rgba(3, 169, 244, 0.28);
                        /* آبی روشن با شفافیت */
                        stroke: rgba(3, 169, 244, 0.95);
                        stroke-width: 2;
                        transition: all .18s ease;
                        pointer-events: none;
                        /* تا نقشه زیر آن فعال بماند */
                    }

                    .ck-map-tooltip {
                        position: absolute;
                        background: rgba(3, 169, 244, 0.95);
                        color: #fff;
                        padding: 6px 9px;
                        border-radius: 6px;
                        font-size: 13px;
                        white-space: nowrap;
                        transform: translate(-50%, -120%);
                        pointer-events: none;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                        opacity: 0;
                        transition: opacity .15s ease, transform .15s ease;
                        z-index: 9999;
                    }

                    .ck-map-tooltip.show {
                        opacity: 1;
                        transform: translate(-50%, -140%);
                    }
                </style>

                <article class="ck-page-article ck-article-namayandegi-frosh">

                    <?php
                    if ($term = get_term_by('id', $id, 'product_cat')) {
                        echo $term->name;
                    }
                    ?>
                    <?php
                    $args = array('post_type' => 'product', 'posts_per_page' => 100, 'product_cat' => $post->post_title, 'orderby' => 'date');
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()):
                        $loop->the_post();
                        global $product; ?>
                        <a href="<?php echo get_permalink($loop->post->ID) ?>">
                            <div class="ck-book">
                                <?php
                                $image_id = $loop->post->ID;
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'single-post-thumbnail');
                                ?>
                                <?php ?>
                                <img class="lazy ck-book-img" data-src="<?php echo $image[0]; ?>"
                                    src="<?php bloginfo('url'); ?>/img/lazyloud.jpg">
                                <div class="ck-moshahedesafahat">
                                    <h3>مشاهده جزئیات کتاب</h3>
                                </div>
                                <h2><?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>
                                </h2>
                                <div class="ck-kharid">
                                    <div class="ck-gheymat">
                                        <?php if ($product->is_in_stock()) {
                                            ?>
                                            <div class="ck-old-price">
                                                <del>
                                                    <h3><?php echo $product->get_regular_price(); ?>تومان</h3>
                                                </del>
                                            </div>
                                            <div class="ck-new-price">
                                                <h3><?php echo $product->get_price(); ?>
                                                    تومان</h3>
                                            </div>
                                        <?php } else { ?>
                                            <div class="ck-new-price">
                                                <h3>مشاهده جزئیات</h3>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="ck-afzodan-be-sabad">
                                        <img src="<?php bloginfo('url'); ?>/img/sabad%20kharid.jpg">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>


                    <div class="clear"></div>
                    <div class="ck-all-page-content">
                        <?php
                        $my_postid = $_REQUEST['page_id'];
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;

                        ?>
                        <?php echo do_shortcode($content) ?>
                    </div>
                    <script>
                        $(function () {
                            $('.ck-ostan').click(function () {
                                var roozbeh = $(this).attr('id');
                                //$('.' + roozbeh).css('display', 'block');
                                $('.' + roozbeh).slideDown();
                            });

                            //----------------------------------------------------------
                            $('.ck-close').click(function () {
                                // $('.ck-namayandegi-show').css('display', 'none');
                                $('.ck-namayandegi-show').slideUp();
                            })
                        });
                    </script>
                    <script>
                        jQuery(function ($) {
                            var $img = $('#ck-map-img');
                            var svg = document.getElementById('ck-map-overlay');

                            function ensureSvgViewBox() {
                                // تعیین viewBox با اندازه طبیعی تصویر برای نگهداری تناسب coords
                                var w = $img.prop('naturalWidth') || $img.width();
                                var h = $img.prop('naturalHeight') || $img.height();
                                if (w && h) {
                                    svg.setAttribute('viewBox', '0 0 ' + w + ' ' + h);
                                }
                            }

                            // وقتی تصویر لود شد یا اندازه تغییر کرد، viewBox را تنظیم کن
                            $img.on('load', ensureSvgViewBox);
                            ensureSvgViewBox();

                            // ایجاد tooltip عنصر
                            var $tooltip = $('<div class="ck-map-tooltip"></div>').appendTo('body');

                            // تابع تبدیل coords به نقاط polygon
                            function coordsToPoints(coords) {
                                var arr = coords.split(',');
                                var points = [];
                                for (var i = 0; i < arr.length; i += 2) {
                                    var x = parseFloat(arr[i]);
                                    var y = parseFloat(arr[i + 1]);
                                    if (!isNaN(x) && !isNaN(y)) points.push(x + ',' + y);
                                }
                                return points.join(' ');
                            }

                            // محاسبه مرکز جرم ساده (میانگین نقاط) برای قرار دادن tooltip
                            function centroid(coords) {
                                var arr = coords.split(',');
                                var sx = 0, sy = 0, n = 0;
                                for (var i = 0; i < arr.length; i += 2) {
                                    var x = parseFloat(arr[i]), y = parseFloat(arr[i + 1]);
                                    if (!isNaN(x) && !isNaN(y)) { sx += x; sy += y; n++; }
                                }
                                return n ? { x: sx / n, y: sy / n } : { x: 0, y: 0 };
                            }

                            $('area.ck-ostan').on('mouseenter', function (e) {
                                var $a = $(this);
                                var coords = $a.attr('coords');
                                if (!coords) return;
                                // پاک کردن هر پلیگانی که قبلا بود
                                while (svg.firstChild) svg.removeChild(svg.firstChild);
                                // ساخت polygon و افزودن به svg
                                var poly = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
                                poly.setAttribute('points', coordsToPoints(coords));
                                poly.setAttribute('class', 'ck-overlay-poly');
                                svg.appendChild(poly);

                                // قرار دادن و نمایش тул‌تیپ
                                var c = centroid(coords);
                                // مقیاس دهی نقطه از مختصات اصلی به پیکسل‌های نمایش داده شده
                                var natW = $img.prop('naturalWidth') || $img.width();
                                var natH = $img.prop('naturalHeight') || $img.height();
                                var dispW = $img.width();
                                var dispH = $img.height();
                                var rx = dispW / natW;
                                var ry = dispH / natH;
                                var pageOffset = $img.offset();
                                var left = pageOffset.left + c.x * rx;
                                var top = pageOffset.top + c.y * ry;
                                $tooltip.text($a.attr('id') || $a.attr('title') || 'استان').css({ left: left + 'px', top: top + 'px' }).addClass('show');
                            }).on('mouseleave', function () {
                                // حذف overlay و پنهان کردن tooltip
                                while (svg.firstChild) svg.removeChild(svg.firstChild);
                                $tooltip.removeClass('show');
                            });

                            // پاکسازی زمانی که کلیک روی استان انجام می‌شود (تا تداخل با نمایندگی‌ نمایش نشود)
                            $('area.ck-ostan').on('click', function () { while (svg.firstChild) svg.removeChild(svg.firstChild); $tooltip.removeClass('show'); });

                            // در صورت ریسایز پنجره، viewBox و tooltip موقعیت دهی مجدد شوند
                            $(window).on('resize', function () { ensureSvgViewBox(); $tooltip.removeClass('show'); });
                        });
                    </script>




                    <style>
                        .ck-namayandegi-show {
                            display: none;
                            position: fixed;
                            background-color: rgba(94, 180, 189, 0.6);
                            width: 100%;
                            right: 0;
                            padding: 11px 11px;
                            top: 0;
                            height: 100%;
                            z-index: 999;
                            overflow: auto !important;
                        }

                        .ck-namayandegi-show i {
                            cursor: pointer;
                            color: red;
                            position: absolute;
                            right: 30px;
                            top: 30px;
                            font-size: 38px;
                        }

                        #ck-map-namayandegiha {
                            width: 100%;
                            text-align: center;
                        }

                        .ck-namayandegi-show table {
                            direction: rtl;
                            margin-left: auto;
                            margin-top: 70px;
                            font-family: iransans, serif;
                            font-size: 16px;
                            border-radius: 8px;
                            background-color: white;
                        }

                        .ck-namayandegi-show table td {
                            text-align: center;
                        }
                    </style>
                    <div class="azarbayjangharbi ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td>
                                        <div> آذربایجان غربی</div>
                                    </td>
                                    <td>
                                        <div> بوکان</div>
                                    </td>
                                    <td>
                                        <div>کتاب سرا پیشرو</div>
                                    </td>
                                    <td>
                                        <div> 044-46241990 09190958395</div>
                                    </td>
                                    <td>
                                        <div> بوکان- بلوار کردستان روبه روی سراه سنگینی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان غربی</div>
                                    </td>
                                    <td>
                                        <div> ارومیه</div>
                                    </td>
                                    <td>
                                        <div> دانش‌یار</div>
                                    </td>
                                    <td>
                                        <div> 32248668</div>
                                    </td>
                                    <td>
                                        <div> ارومیه ـ خیابان دانش ـ نبش خیابان طرزی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان غربی</div>
                                    </td>
                                    <td>
                                        <div> بوکان</div>
                                    </td>
                                    <td>
                                        <div> جوان</div>
                                    </td>
                                    <td>
                                        <div> 0914-4809924</div>
                                    </td>
                                    <td>
                                        <div> خیابان انقلاب-روبروی بانک ملت-طبقه زیرین - پاساژ صالحی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان غربی</div>
                                    </td>
                                    <td>
                                        <div> خوی</div>
                                    </td>
                                    <td>
                                        <div> پرهام</div>
                                    </td>
                                    <td>
                                        <div> 044-36229730</div>
                                    </td>
                                    <td>
                                        <div> </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان غربی</div>
                                    </td>
                                    <td>
                                        <div> ارومیه</div>
                                    </td>
                                    <td>
                                        <div> نمایشگاه کتاب ختایی </div>
                                    </td>
                                    <td>
                                        <div> 044-32252459</div>
                                    </td>
                                    <td>
                                        <div>خیابان خیام جنوبی-پاساژ تخت طاووس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان غربی</div>
                                    </td>
                                    <td>
                                        <div> خوی</div>
                                    </td>
                                    <td>
                                        <div> دانشجو</div>
                                    </td>
                                    <td>
                                        <div> 36444248</div>
                                    </td>
                                    <td>
                                        <div> خیابان شهید صمدزاده ـ مقابل كوی صابونچی</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sistanbalochestan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <td>
                                <div> نام استان</div>
                            </td>
                            <td style="color: #ff0000;">
                                <div> نام شهر</div>
                            </td>
                            <td style="color: #ff0000;">
                                <div> نام كتابفروشی</div>
                            </td>
                            <td style="color: #ff0000;">
                                <div> تلفن</div>
                            </td>
                            <td style="color: #ff0000;">
                                <div> آدرس</div>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <div> سیستان و بلوچستان</div>
                                </td>
                                <td>
                                    <div> زاهدان</div>
                                </td>
                                <td>
                                    <div> كالج</div>
                                </td>
                                <td>
                                    <div> 33250829</div>
                                </td>
                                <td>
                                    <div> ــــــــــــــــــــــــــــــــــــــ</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="kerman ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> فرهنگ</div>
                                    </td>
                                    <td>
                                        <div> 32224608</div>
                                    </td>
                                    <td>
                                        <div> 32231833</div>
                                    </td>
                                    <td>
                                        <div> خیابان شریعتی ـ چهار راه كاظمی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> بانک کتاب آزادی</div>
                                    </td>
                                    <td>
                                        <div> 32460662</div>
                                    </td>
                                    <td>
                                        <div> </div>
                                    </td>
                                    <td>
                                        <div> میدان آزادی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> کتابفروشی صابر</div>
                                    </td>
                                    <td>
                                        <div> 034-32234842</div>
                                    </td>
                                    <td>
                                        <div> 034-32234842</div>
                                    </td>
                                    <td>
                                        <div>حد فاصل سه راه احمدی و چهارراه احمدی نبش کوچه 31</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="hormozgan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> هرمزگان</div>
                                    </td>
                                    <td>
                                        <div> بندر عباس</div>
                                    </td>
                                    <td>
                                        <div> نمازی</div>
                                    </td>
                                    <td>
                                        <div> 32248521</div>
                                    </td>
                                    <td>
                                        <div> بلوار سید جمال الدین اسدآبادی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> هرمزگان</div>
                                    </td>
                                    <td>
                                        <div> میناب</div>
                                    </td>
                                    <td>
                                        <div> عصر جدید</div>
                                    </td>
                                    <td>
                                        <div> 42229794</div>
                                    </td>
                                    <td>
                                        <div> خیابان امینی ـ كوچه نهم ـ جنب مؤسسه ریحانه</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> هرمزگان</div>
                                    </td>
                                    <td>
                                        <div> بندرعباس</div>
                                    </td>
                                    <td>
                                        <div> فرهنگ</div>
                                    </td>
                                    <td>
                                        <div> 32224602</div>
                                    </td>
                                    <td>
                                        <div> چهار راه سازمان</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="khorasanjonobi ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان جنوبی</div>
                                    </td>
                                    <td>
                                        <div> بیرجند</div>
                                    </td>
                                    <td>
                                        <div> خوارزمی</div>
                                    </td>
                                    <td>
                                        <div> 32222221</div>
                                    </td>
                                    <td>
                                        <div> 32224317</div>
                                    </td>
                                    <td>
                                        <div> میدان ابوذر ـ ابتدای مدرس 2 ـ پلاك 22</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="yazd ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> چشمك</div>
                                    </td>
                                    <td>
                                        <div> 36264788</div>
                                    </td>
                                    <td>
                                        <div> خیابان آزادی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> شهر کتاب </div>
                                    </td>
                                    <td>
                                        <div> 035-36222226</div>
                                    </td>
                                    <td>
                                        <div> میدان باغ ملی-ابتدای خیابان فرخی </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> کتاب فروشی فدک </div>
                                    </td>
                                    <td>
                                        <div> 035-36225491</div>
                                    </td>
                                    <td>
                                        <div> میدان باغ ملی-ابتدای خیابان فرخی </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="fas ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> خوارزمی</div>
                                    </td>
                                    <td>
                                        <div> 071-36473771</div>
                                    </td>
                                    <td>
                                        <div> خیابان مشیر فاطمی ـ خیابان معدل ـ پاساژ 110</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> بازار بزرگ کتاب</div>
                                    </td>
                                    <td>
                                        <div> 071-32337971 071-32333646</div>
                                    </td>
                                    <td>
                                        <div> چهارراه پارامونت - روبروی پاساژ ایران</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> آباده</div>
                                    </td>
                                    <td>
                                        <div> خورشید شب</div>
                                    </td>
                                    <td>
                                        <div> 071-44347327</div>
                                    </td>
                                    <td>
                                        <div> بالای میدان منتظری مجتمع کوروش طبقه فوقانی فروشگاه رفاه</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> زند</div>
                                    </td>
                                    <td>
                                        <div> 071-33222780 - 0930-0971352</div>
                                    </td>
                                    <td>
                                        <div> خیابان انقلاب ـ بعد از سینما مبعث ـ جنب اداره برق</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> بانك كتاب</div>
                                    </td>
                                    <td>
                                        <div> 36293121</div>
                                    </td>
                                    <td>
                                        <div> بلوار مطهری ـ جنب مجتمع نسترن ـ شماره 110</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> کتاب خرد</div>
                                    </td>
                                    <td>
                                        <div> 07132355440</div>
                                    </td>
                                    <td>
                                        <div> خیابان مشیر فاطمی - ابتدای خیابان معدل - ساختمان 110</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> برازجان</div>
                                    </td>
                                    <td>
                                        <div> راهیان دانش</div>
                                    </td>
                                    <td>
                                        <div> 34231229</div>
                                    </td>
                                    <td>
                                        <div> خیابان شهید چمران ـ پاساژ نادر ـ طبقه همكف</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> جهرم</div>
                                    </td>
                                    <td>
                                        <div> کلبه کتاب</div>
                                    </td>
                                    <td>
                                        <div> 071-54226649 071-54225660</div>
                                    </td>
                                    <td>
                                        <div> میدان شهدا خیابان جمهوری اسلامی راسته طلا فروشان</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="esfehan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;" width="200px">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;" width="200px">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;" width="250px">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;" width="80px">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> خوارزمی</div>
                                    </td>
                                    <td width="200px">
                                        <div> 32222612</div>
                                    </td>
                                    <td>
                                        <div> خیابان آمادگاه ـ مقابل هتل عباسی ـ طبقه زیرین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> نشر بهروز</div>
                                    </td>
                                    <td width="200px">
                                        <div> 32216040</div>
                                    </td>
                                    <td>
                                        <div> خیابان آمادگاه ـ مجموعه عباسی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> فارابی</div>
                                    </td>
                                    <td width="200px">
                                        <div> 32210659</div>
                                    </td>
                                    <td>
                                        <div> خ آمادگاه - روبروی هتل عباسی - طبقه زیرین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> همام</div>
                                    </td>
                                    <td width="200px">
                                        <div> 031-32224956</div>
                                    </td>
                                    <td>
                                        <div>چهارباغ-خیابان آمادگاه-جنب بیمه ایران</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> عابدی</div>
                                    </td>
                                    <td width="200px">
                                        <div> 0916-2839294 </div>
                                    </td>
                                    <td>
                                        <div>چهارباغ عباسی - پاساژ شکری</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> البرز</div>
                                    </td>
                                    <td width="200px">
                                        <div> 031-32225800</div>
                                    </td>
                                    <td>
                                        <div>چهارباغ عباسی - مجتمع تجاری چهار باغ</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> نشر بهروز</div>
                                    </td>
                                    <td width="200px">
                                        <div> 031-32216040</div>
                                    </td>
                                    <td>
                                        <div>خیابان آمادگاه -مجموعه عباسی </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="khorasanrazavi ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> سینا</div>
                                    </td>
                                    <td>
                                        <div> 32224579</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ مهتاب ـ طبقه همكف</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> اوستا</div>
                                    </td>
                                    <td>
                                        <div> 051-32215781</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ مهتاب ـ طبقه -1</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> یاس</div>
                                    </td>
                                    <td>
                                        <div> 051-33132</div>
                                    </td>
                                    <td>
                                        <div> ضلع شرقی میدان سعدی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> اوستا</div>
                                    </td>
                                    <td>
                                        <div> 32215781</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی- پاساژ مهتاب طبقه ۱</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> مشاور</div>
                                    </td>
                                    <td>
                                        <div> 32213787</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ مهتاب ـ طبقه زیرین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> کیوان</div>
                                    </td>
                                    <td>
                                        <div> 32237519</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ مهتاب ـ طبقه زیرین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> کیانی</div>
                                    </td>
                                    <td>
                                        <div> 0915-0444321</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ پردیس 2</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> قائم</div>
                                    </td>
                                    <td>
                                        <div> 051-33435515</div>
                                    </td>
                                    <td>
                                        <div> مشهد خ فداییان اسلام بلوار چمن نبش چمن 41</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="boshehr ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> بوشهر</div>
                                    </td>
                                    <td>
                                        <div> بوشهر</div>
                                    </td>
                                    <td>
                                        <div> پاركر</div>
                                    </td>
                                    <td>
                                        <div> 33322631</div>
                                    </td>
                                    <td>
                                        <div> خیابان لیان ـ پاساژ توحید</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="charmahalbakhtiari ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> چهارمحال و بختیاری</div>
                                    </td>
                                    <td>
                                        <div> بروجن</div>
                                    </td>
                                    <td>
                                        <div> اندیشه</div>
                                    </td>
                                    <td>
                                        <div> 038-4243431</div>
                                    </td>
                                    <td>
                                        <div> بروجن ـ خیابان طالقانی غربی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> چهارمحال و بختیاری</div>
                                    </td>
                                    <td>
                                        <div> شهركرد</div>
                                    </td>
                                    <td>
                                        <div> مهدی موعود</div>
                                    </td>
                                    <td>
                                        <div> 32254676</div>
                                    </td>
                                    <td>
                                        <div> خیابان مولوی ـ تقاطع ولیعصر ـ پلاك 434</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> چهارمحال و بختیاری</div>
                                    </td>
                                    <td>
                                        <div> شهركرد</div>
                                    </td>
                                    <td>
                                        <div>کتاب فروشی کالج</div>
                                    </td>
                                    <td>
                                        <div> 038-32223193</div>
                                    </td>
                                    <td>
                                        <div>سه راه سینما-پایین تر از موزه</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> چهارمحال و بختیاری</div>
                                    </td>
                                    <td>
                                        <div> رسالت</div>
                                    </td>
                                    <td>
                                        <div>کتاب فروشی رسالت</div>
                                    </td>
                                    <td>
                                        <div> 038-32260128</div>
                                    </td>
                                    <td>
                                        <div></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="kohkiloye ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> فرهنگ</div>
                                    </td>
                                    <td>
                                        <div> 32224608</div>
                                    </td>
                                    <td>
                                        <div> 32231833</div>
                                    </td>
                                    <td>
                                        <div> خیابان شریعتی ـ چهار راه كاظمی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> بانک کتاب آزادی</div>
                                    </td>
                                    <td>
                                        <div> 32460662</div>
                                    </td>
                                    <td>
                                        <div> </div>
                                    </td>
                                    <td>
                                        <div> میدان آزادی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> كرمان</div>
                                    </td>
                                    <td>
                                        <div> کتابفروشی صابر</div>
                                    </td>
                                    <td>
                                        <div> 034-32234842</div>
                                    </td>
                                    <td>
                                        <div> 034-32234842</div>
                                    </td>
                                    <td>
                                        <div>حد فاصل سه راه احمدی و چهارراه احمدی نبش کوچه 31</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="hormozgan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> هرمزگان</div>
                                    </td>
                                    <td>
                                        <div> بندر عباس</div>
                                    </td>
                                    <td>
                                        <div> نمازی</div>
                                    </td>
                                    <td>
                                        <div> 32248521</div>
                                    </td>
                                    <td>
                                        <div> بلوار سید جمال الدین اسدآبادی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> هرمزگان</div>
                                    </td>
                                    <td>
                                        <div> میناب</div>
                                    </td>
                                    <td>
                                        <div> عصر جدید</div>
                                    </td>
                                    <td>
                                        <div> 42229794</div>
                                    </td>
                                    <td>
                                        <div> خیابان امینی ـ كوچه نهم ـ جنب مؤسسه ریحانه</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> هرمزگان</div>
                                    </td>
                                    <td>
                                        <div> بندرعباس</div>
                                    </td>
                                    <td>
                                        <div> فرهنگ</div>
                                    </td>
                                    <td>
                                        <div> 32224602</div>
                                    </td>
                                    <td>
                                        <div> چهار راه سازمان</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="khorasanjonobi ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان جنوبی</div>
                                    </td>
                                    <td>
                                        <div> بیرجند</div>
                                    </td>
                                    <td>
                                        <div> خوارزمی</div>
                                    </td>
                                    <td>
                                        <div> 32222221</div>
                                    </td>
                                    <td>
                                        <div> 32224317</div>
                                    </td>
                                    <td>
                                        <div> میدان ابوذر ـ ابتدای مدرس 2 ـ پلاك 22</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="yazd ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> چشمك</div>
                                    </td>
                                    <td>
                                        <div> 36264788</div>
                                    </td>
                                    <td>
                                        <div> خیابان آزادی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> شهر کتاب </div>
                                    </td>
                                    <td>
                                        <div> 035-36222226</div>
                                    </td>
                                    <td>
                                        <div> میدان باغ ملی-ابتدای خیابان فرخی </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> یزد</div>
                                    </td>
                                    <td>
                                        <div> کتاب فروشی فدک </div>
                                    </td>
                                    <td>
                                        <div> 035-36225491</div>
                                    </td>
                                    <td>
                                        <div> میدان باغ ملی-ابتدای خیابان فرخی </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="fas ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> خوارزمی</div>
                                    </td>
                                    <td>
                                        <div> 071-36473771</div>
                                    </td>
                                    <td>
                                        <div> خیابان مشیر فاطمی ـ خیابان معدل ـ پاساژ 110</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> بازار بزرگ کتاب</div>
                                    </td>
                                    <td>
                                        <div> 071-32337971 071-32333646</div>
                                    </td>
                                    <td>
                                        <div> چهارراه پارامونت - روبروی پاساژ ایران</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> آباده</div>
                                    </td>
                                    <td>
                                        <div> خورشید شب</div>
                                    </td>
                                    <td>
                                        <div> 071-44347327</div>
                                    </td>
                                    <td>
                                        <div> بالای میدان منتظری مجتمع کوروش طبقه فوقانی فروشگاه رفاه</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> زند</div>
                                    </td>
                                    <td>
                                        <div> 071-33222780 - 0930-0971352</div>
                                    </td>
                                    <td>
                                        <div> خیابان انقلاب ـ بعد از سینما مبعث ـ جنب اداره برق</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> بانك كتاب</div>
                                    </td>
                                    <td>
                                        <div> 36293121</div>
                                    </td>
                                    <td>
                                        <div> بلوار مطهری ـ جنب مجتمع نسترن ـ شماره 110</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> شیراز</div>
                                    </td>
                                    <td>
                                        <div> کتاب خرد</div>
                                    </td>
                                    <td>
                                        <div> 07132355440</div>
                                    </td>
                                    <td>
                                        <div> خیابان مشیر فاطمی - ابتدای خیابان معدل - ساختمان 110</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> برازجان</div>
                                    </td>
                                    <td>
                                        <div> راهیان دانش</div>
                                    </td>
                                    <td>
                                        <div> 34231229</div>
                                    </td>
                                    <td>
                                        <div> خیابان شهید چمران ـ پاساژ نادر ـ طبقه همكف</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> فارس</div>
                                    </td>
                                    <td>
                                        <div> جهرم</div>
                                    </td>
                                    <td>
                                        <div> کلبه کتاب</div>
                                    </td>
                                    <td>
                                        <div> 071-54226649 071-54225660</div>
                                    </td>
                                    <td>
                                        <div> میدان شهدا خیابان جمهوری اسلامی راسته طلا فروشان</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="esfehan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;" width="200px">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;" width="200px">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;" width="250px">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;" width="80px">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> خوارزمی</div>
                                    </td>
                                    <td width="200px">
                                        <div> 32222612</div>
                                    </td>
                                    <td>
                                        <div> خیابان آمادگاه ـ مقابل هتل عباسی ـ طبقه زیرین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> نشر بهروز</div>
                                    </td>
                                    <td width="200px">
                                        <div> 32216040</div>
                                    </td>
                                    <td>
                                        <div> خیابان آمادگاه ـ مجموعه عباسی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> فارابی</div>
                                    </td>
                                    <td width="200px">
                                        <div> 32210659</div>
                                    </td>
                                    <td>
                                        <div> خ آمادگاه - روبروی هتل عباسی - طبقه زیرین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> همام</div>
                                    </td>
                                    <td width="200px">
                                        <div> 031-32224956</div>
                                    </td>
                                    <td>
                                        <div>چهارباغ-خیابان آمادگاه-جنب بیمه ایران</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> عابدی</div>
                                    </td>
                                    <td width="200px">
                                        <div> 0916-2839294 </div>
                                    </td>
                                    <td>
                                        <div>چهارباغ عباسی - پاساژ شکری</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> البرز</div>
                                    </td>
                                    <td width="200px">
                                        <div> 031-32225800</div>
                                    </td>
                                    <td>
                                        <div>چهارباغ عباسی - مجتمع تجاری چهار باغ</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> اصفهان</div>
                                    </td>
                                    <td>
                                        <div> نشر بهروز</div>
                                    </td>
                                    <td width="200px">
                                        <div> 031-32216040</div>
                                    </td>
                                    <td>
                                        <div>خیابان آمادگاه -مجموعه عباسی </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="khorasanrazavi ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> سینا</div>
                                    </td>
                                    <td>
                                        <div> 32224579</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ مهتاب ـ طبقه همكف</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> اوستا</div>
                                    </td>
                                    <td>
                                        <div> 051-32215781</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ مهتاب ـ طبقه -1</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> یاس</div>
                                    </td>
                                    <td>
                                        <div> 051-33132</div>
                                    </td>
                                    <td>
                                        <div> ضلع شرقی میدان سعدی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> اوستا</div>
                                    </td>
                                    <td>
                                        <div> 32215781</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی- پاساژ مهتاب طبقه ۱</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> مشاور</div>
                                    </td>
                                    <td>
                                        <div> 32213787</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ مهتاب ـ طبقه زیرین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> کیوان</div>
                                    </td>
                                    <td>
                                        <div> 32237519</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ مهتاب ـ طبقه زیرین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> کیانی</div>
                                    </td>
                                    <td>
                                        <div> 0915-0444321</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ پاساژ پردیس 2</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان رضوی</div>
                                    </td>
                                    <td>
                                        <div> مشهد</div>
                                    </td>
                                    <td>
                                        <div> قائم</div>
                                    </td>
                                    <td>
                                        <div> 051-33435515</div>
                                    </td>
                                    <td>
                                        <div> مشهد خ فداییان اسلام بلوار چمن نبش چمن 41</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="boshehr ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> بوشهر</div>
                                    </td>
                                    <td>
                                        <div> بوشهر</div>
                                    </td>
                                    <td>
                                        <div> پاركر</div>
                                    </td>
                                    <td>
                                        <div> 33322631</div>
                                    </td>
                                    <td>
                                        <div> خیابان لیان ـ پاساژ توحید</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="charmahalbakhtiari ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> چهارمحال و بختیاری</div>
                                    </td>
                                    <td>
                                        <div> بروجن</div>
                                    </td>
                                    <td>
                                        <div> اندیشه</div>
                                    </td>
                                    <td>
                                        <div> 038-4243431</div>
                                    </td>
                                    <td>
                                        <div> بروجن ـ خیابان طالقانی غربی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> چهارمحال و بختیاری</div>
                                    </td>
                                    <td>
                                        <div> شهركرد</div>
                                    </td>
                                    <td>
                                        <div> مهدی موعود</div>
                                    </td>
                                    <td>
                                        <div> 32254676</div>
                                    </td>
                                    <td>
                                        <div> خیابان مولوی ـ تقاطع ولیعصر ـ پلاك 434</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> چهارمحال و بختیاری</div>
                                    </td>
                                    <td>
                                        <div> شهركرد</div>
                                    </td>
                                    <td>
                                        <div>کتاب فروشی کالج</div>
                                    </td>
                                    <td>
                                        <div> 038-32223193</div>
                                    </td>
                                    <td>
                                        <div>سه راه سینما-پایین تر از موزه</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> چهارمحال و بختیاری</div>
                                    </td>
                                    <td>
                                        <div> رسالت</div>
                                    </td>
                                    <td>
                                        <div>کتاب فروشی رسالت</div>
                                    </td>
                                    <td>
                                        <div> 038-32260128</div>
                                    </td>
                                    <td>
                                        <div></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="kohkiloye ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كهگیلویه و بویر احمد</div>
                                    </td>
                                    <td>
                                        <div> یاسوج</div>
                                    </td>
                                    <td>
                                        <div> رازی</div>
                                    </td>
                                    <td>
                                        <div> 32228216</div>
                                    </td>
                                    <td>
                                        <div> 33228216</div>
                                    </td>
                                    <td>
                                        <div> بالاتر از میدان هفت تیر ـ روبروی خیابان فردوسی ـ نبش پاساژ بهاران
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كهگیلویه و بویر احمد</div>
                                    </td>
                                    <td>
                                        <div>دهدشت</div>
                                    </td>
                                    <td>
                                        <div> کتاب فروشی صفا دوست</div>
                                    </td>
                                    <td>
                                        <div> 09174128158</div>
                                    </td>
                                    <td>
                                        <div> ------- </div>
                                    </td>
                                    <td>
                                        <div> خیابان همایون فر شمالی کوچه اول سمت راست موسسه فارابی
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="khozestan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خوزستان</div>
                                    </td>
                                    <td>
                                        <div> اهواز</div>
                                    </td>
                                    <td>
                                        <div> شهر كتاب</div>
                                    </td>
                                    <td width="100px">
                                        <div> 32212314</div>
                                    </td>
                                    <td>خیابان نادری ـ بین حافظ و فردوسی ـ ساختمان فرهاد</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خوزستان</div>
                                    </td>
                                    <td>
                                        <div> اهواز</div>
                                    </td>
                                    <td>
                                        <div> كتاب شرق</div>
                                    </td>
                                    <td>
                                        <div> 32230553</div>
                                    </td>
                                    <td>بلوار سلمان فارسی ـ خیابان حافظ</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خوزستان</div>
                                    </td>
                                    <td>
                                        <div> آبادان</div>
                                    </td>
                                    <td>
                                        <div> سعید</div>
                                    </td>
                                    <td>
                                        <div> 53321857</div>
                                    </td>
                                    <td>خیابان یك اصلی ـ مقابل مسجد امیرالمومنین</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خوزستان</div>
                                    </td>
                                    <td>
                                        <div> آبادان</div>
                                    </td>
                                    <td>
                                        <div> مهران</div>
                                    </td>
                                    <td style="padding: 5px 0">
                                        <div>061-53226512</div>
                                    </td>
                                    <td> خیابان زند</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="semnan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> سمنان</div>
                                    </td>
                                    <td>
                                        <div> سمنان</div>
                                    </td>
                                    <td>
                                        <div> امان</div>
                                    </td>
                                    <td>
                                        <div> 33320171</div>
                                    </td>
                                    <td>
                                        <div> خیابان طالقانی ـ جنب بانك مسكن</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ilam ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> ایلام</div>
                                    </td>
                                    <td>
                                        <div> آبدانان</div>
                                    </td>
                                    <td>
                                        <div> دانشجو</div>
                                    </td>
                                    <td>
                                        <div> 26227589</div>
                                    </td>
                                    <td>
                                        <div> آبدانان ـ خیابان امام ـ جنب دفتر امام جمعه</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="lorestan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> لرستان</div>
                                    </td>
                                    <td>
                                        <div> بروجرد</div>
                                    </td>
                                    <td>
                                        <div> ولایت</div>
                                    </td>
                                    <td>
                                        <div> 42629550</div>
                                    </td>
                                    <td>
                                        <div> بروجرد ـ خیابان شهدا ـ پاساژ آیینه ـ طبقه زیرین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> لرستان</div>
                                    </td>
                                    <td>
                                        <div> خرم‌آباد</div>
                                    </td>
                                    <td>
                                        <div> افلاك</div>
                                    </td>
                                    <td>
                                        <div> 33323343</div>
                                    </td>
                                    <td>
                                        <div> خیابان امام ـ جنب پل حاجی ـ روبروی پادگان امام حسین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> لرستان</div>
                                    </td>
                                    <td>
                                        <div> خرم‌آباد</div>
                                    </td>
                                    <td>
                                        <div> بانك كتاب فتحی</div>
                                    </td>
                                    <td>
                                        <div> 33303600</div>
                                    </td>
                                    <td>
                                        <div> خیابان امام ـ چهار راه بانك</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="khorasanshomali ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان شمالی</div>
                                    </td>
                                    <td>
                                        <div> بجنورد</div>
                                    </td>
                                    <td>
                                        <div> دانشجو</div>
                                    </td>
                                    <td>
                                        <div> 42228601</div>
                                    </td>
                                    <td>
                                        <div> خیابان طالقانی شرقی ـ ساختمان 110</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> خراسان شمالی</div>
                                    </td>
                                    <td>
                                        <div> بجنورد</div>
                                    </td>
                                    <td>
                                        <div> راه پله</div>
                                    </td>
                                    <td>
                                        <div> 32210910</div>
                                    </td>
                                    <td>
                                        <div> خیابان 17 شهریور جنوبی - پشت ایستگاه خط واحد</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="golestan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> گلستان</div>
                                    </td>
                                    <td>
                                        <div> گنبد كاووس</div>
                                    </td>
                                    <td>
                                        <div> باقرالعلوم</div>
                                    </td>
                                    <td>
                                        <div> 22222512</div>
                                    </td>
                                    <td>
                                        <div> خیابان دارایی شرقی ـ روبروی سینما قدس ـ پاساژ محمدی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> گلستان</div>
                                    </td>
                                    <td>
                                        <div> گنبد كاووس</div>
                                    </td>
                                    <td>
                                        <div> کیمیا</div>
                                    </td>
                                    <td>
                                        <div> 017-33341316 - 09118729731</div>
                                    </td>
                                    <td>
                                        <div> خیابان دانشگاه- نبش اندیشه -پلاک 30</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> گلستان</div>
                                    </td>
                                    <td>
                                        <div> گرگان</div>
                                    </td>
                                    <td>
                                        <div> جلالی</div>
                                    </td>
                                    <td>
                                        <div> 017-32253918</div>
                                    </td>
                                    <td>
                                        <div> خیابان امام کوچه آفتاب پلاک 20</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="azarbayjansharghi ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان شرقی</div>
                                    </td>
                                    <td>
                                        <div> تبریز</div>
                                    </td>
                                    <td>
                                        <div> گلزار</div>
                                    </td>
                                    <td>
                                        <div> 35238686</div>
                                    </td>
                                    <td>
                                        <div> خیابان جمهوری</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان شرقی</div>
                                    </td>
                                    <td>
                                        <div> تبریز</div>
                                    </td>
                                    <td>
                                        <div> فروزش</div>
                                    </td>
                                    <td>
                                        <div> 041-33362929</div>
                                    </td>
                                    <td>
                                        <div> خیابان امام-نرسیده به چهارراه آبرسان طبقه زیرین -بانک سرمایه</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان شرقی</div>
                                    </td>
                                    <td>
                                        <div> تبریز</div>
                                    </td>
                                    <td>
                                        <div> شایسته</div>
                                    </td>
                                    <td>
                                        <div> 041-35561961</div>
                                    </td>
                                    <td>
                                        <div> خیابان امام-روبروی سراه طالقانی</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div> آذربایجان شرقی</div>
                                    </td>
                                    <td>
                                        <div> عجب شیر</div>
                                    </td>
                                    <td>
                                        <div> وحید</div>
                                    </td>
                                    <td>
                                        <div> 37622898</div>
                                    </td>
                                    <td>
                                        <div> خیابان امام - ساختمان رضوی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان شرقی</div>
                                    </td>
                                    <td>
                                        <div> تبریز</div>
                                    </td>
                                    <td>
                                        <div> بانک کتاب</div>
                                    </td>
                                    <td>
                                        <div> 041-33363090</div>
                                    </td>
                                    <td>
                                        <div> آبرسان-خیابان امام خمینی-روبروی بزرگمهر</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> آذربایجان شرقی</div>
                                    </td>
                                    <td>
                                        <div> مرند</div>
                                    </td>
                                    <td>
                                        <div> دانشجو</div>
                                    </td>
                                    <td>
                                        <div> 041-42232477</div>
                                    </td>
                                    <td>
                                        <div> خیابان شریعتی ـ پاساژ عظیمی</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="kordestan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كردستان</div>
                                    </td>
                                    <td>
                                        <div> بیجار</div>
                                    </td>
                                    <td>
                                        <div> پگاه</div>
                                    </td>
                                    <td>
                                        <div> 38231001</div>
                                    </td>
                                    <td>
                                        <div> چهارراه آزادگان ـ پاساژ مهراب ـ طبقه 3</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كردستان</div>
                                    </td>
                                    <td>
                                        <div> بیجار</div>
                                    </td>
                                    <td>
                                        <div> یگاره</div>
                                    </td>
                                    <td>
                                        <div> 087-38231001</div>
                                    </td>
                                    <td>
                                        <div> خیابان آزادگان جنب حسینیه روبروی اداره برق</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كردستان</div>
                                    </td>
                                    <td>
                                        <div> سنندج</div>
                                    </td>
                                    <td>
                                        <div> خانه کتاب سنندج</div>
                                    </td>
                                    <td>
                                        <div> 087-33165886</div>
                                    </td>
                                    <td>
                                        <div> خیابان فردوسی سه راه نمکی -پاساژصدف</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كردستان</div>
                                    </td>
                                    <td>
                                        <div> سقز</div>
                                    </td>
                                    <td>
                                        <div> زانکو</div>
                                    </td>
                                    <td>
                                        <div> 087-36218000</div>
                                    </td>
                                    <td>
                                        <div> میدان قدس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كردستان</div>
                                    </td>
                                    <td>
                                        <div> سنندج</div>
                                    </td>
                                    <td>
                                        <div> فردوسی</div>
                                    </td>
                                    <td>
                                        <div> 087-33162588</div>
                                    </td>
                                    <td>
                                        <div> میدان فردوسی -پاساژصدف پلاک 3</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كردستان</div>
                                    </td>
                                    <td>
                                        <div> سنندج</div>
                                    </td>
                                    <td>
                                        <div> خانه کتاب</div>
                                    </td>
                                    <td>
                                        <div> 33165886</div>
                                    </td>
                                    <td>
                                        <div> خیابان فردوسی - سه راه نمکی پاساژ صدف </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="kermanshah ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمانشاه</div>
                                    </td>
                                    <td>
                                        <div> اسلام آباد غرب</div>
                                    </td>
                                    <td>
                                        <div> اندیشمند</div>
                                    </td>
                                    <td>
                                        <div> 083-45243322</div>
                                    </td>
                                    <td>
                                        <div> اسلام آباد غرب ـ خیابان راه كربلا</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمانشاه</div>
                                    </td>
                                    <td>
                                        <div> كرمانشاه</div>
                                    </td>
                                    <td>
                                        <div> دانش</div>
                                    </td>
                                    <td>
                                        <div> 37234987</div>
                                    </td>
                                    <td>
                                        <div> خیابان دبیر اعظم ـ پاساژ سروش ـ طبقه 2</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمانشاه</div>
                                    </td>
                                    <td>
                                        <div> كرمانشاه</div>
                                    </td>
                                    <td>
                                        <div> سروش</div>
                                    </td>
                                    <td>
                                        <div> 38220276</div>
                                    </td>
                                    <td>
                                        <div> میدان آزادی ـ خیابان اداره پست ـ خیابان شهید قندی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> كرمانشاه</div>
                                    </td>
                                    <td>
                                        <div> كرمانشاه</div>
                                    </td>
                                    <td>
                                        <div> سروش نو</div>
                                    </td>
                                    <td>
                                        <div> 37280032</div>
                                    </td>
                                    <td>
                                        <div> خیابان دبیر اعظم ـ پاساژ سروش ـ طبقه 2 ـ سمت راست</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tehran ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000; width: 60px;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000; width: 81px;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000; width: 158px;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000; width: 102px;">
                                        <div> تلفن1</div>
                                    </td>
                                    <td style="color: #ff0000; width: 103px;">
                                        <div> تلفن2</div>
                                    </td>
                                    <td style="color: #ff0000; width: 823px;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 60px;">
                                        <div> تهران</div>
                                    </td>
                                    <td style="width: 81px;">
                                        <div> تهران</div>
                                    </td>
                                    <td style="width: 158px;">
                                        <div> نمایندگی مرکزی</div>
                                    </td>
                                    <td style="width: 102px;">
                                        <div> 66928171</div>
                                    </td>
                                    <td style="width: 103px;">
                                        <div> 66927796</div>
                                    </td>
                                    <td style="width: 823px;">
                                        <div> میدان انقلاب اسلامی به سمت آزادی، خیابان والعصر، پلاک 4
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 60px;">
                                        <div> تهران</div>
                                    </td>
                                    <td style="width: 81px;">
                                        <div> تهران</div>
                                    </td>
                                    <td style="width: 158px;">
                                        <div> وطن</div>
                                    </td>
                                    <td style="width: 102px;">
                                        <div> 66497715</div>
                                    </td>
                                    <td style="width: 103px;">
                                        <div> ---</div>
                                    </td>
                                    <td style="width: 823px;">
                                        <div> ضلع جنوب شرقی میدان بازار بزرگ</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 60px;">
                                        <div> تهران</div>
                                    </td>
                                    <td style="width: 81px;">
                                        <div> شهریار</div>
                                    </td>
                                    <td style="width: 158px;">
                                        <div> آموزشگاه فرهنگ آموزش روزبه</div>
                                    </td>
                                    <td style="width: 102px;">
                                        <div> 65251590</div>
                                    </td>
                                    <td style="width: 103px;">
                                        <div> 09123067897</div>
                                    </td>
                                    <td style="width: 823px;">
                                        <div> شهریار- ابتدای خیابان ولیعصر-کوچه شهید حاج اسماعیلی</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mazandaran ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مازندران</div>
                                    </td>
                                    <td>
                                        <div> آمل</div>
                                    </td>
                                    <td>
                                        <div> مهندسین</div>
                                    </td>
                                    <td>
                                        <div> 44259246</div>
                                    </td>
                                    <td>
                                        <div> خیابان فرهنگ - پاساژ زرشناس طبقه پایین</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مازندران</div>
                                    </td>
                                    <td>
                                        <div> آمل</div>
                                    </td>
                                    <td>
                                        <div> الو کتاب</div>
                                    </td>
                                    <td>
                                        <div> 01144227573</div>
                                    </td>
                                    <td>
                                        <div> آمل، سبزه میدان رو به روی تامین اجتماعی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مازندران</div>
                                    </td>
                                    <td>
                                        <div> رامسر</div>
                                    </td>
                                    <td>
                                        <div> الهیان</div>
                                    </td>
                                    <td>
                                        <div> 011-55254875</div>
                                    </td>
                                    <td>
                                        <div> میدان امام</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div> مازندران</div>
                                    </td>
                                    <td>
                                        <div> آمل</div>
                                    </td>
                                    <td>
                                        <div> کتابفروشی شباویز </div>
                                    </td>
                                    <td>
                                        <div> 011-3121732</div>
                                    </td>
                                    <td>
                                        <div>روبروی سینما بهمن</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مازندران</div>
                                    </td>
                                    <td>
                                        <div> ساری</div>
                                    </td>
                                    <td>
                                        <div> کتابفروشی دانشجو </div>
                                    </td>
                                    <td>
                                        <div> 011-33326399</div>
                                    </td>
                                    <td>
                                        <div>خیابان فرهنگ</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مازندران</div>
                                    </td>
                                    <td>
                                        <div> بابل</div>
                                    </td>
                                    <td>
                                        <div> پیام فن</div>
                                    </td>
                                    <td>
                                        <div> 011-32207303</div>
                                    </td>
                                    <td>
                                        <div> بابل سبزه میدان ، جنب اداره پست</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مازندران</div>
                                    </td>
                                    <td>
                                        <div> ساری</div>
                                    </td>
                                    <td>
                                        <div> حامی</div>
                                    </td>
                                    <td>
                                        <div> 011-33321781</div>
                                    </td>
                                    <td>
                                        <div> خیابان انقلاب ـ چهار راه برق روبه روی حلال احمر</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مازندران</div>
                                    </td>
                                    <td>
                                        <div> ساری</div>
                                    </td>
                                    <td>
                                        <div> خاكساریان</div>
                                    </td>
                                    <td>
                                        <div> 33406670</div>
                                    </td>
                                    <td>
                                        <div> خیابان فرهنگ ـ روبروی خیابان قارن ـ 3 راه ایرانپور</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مازندران</div>
                                    </td>
                                    <td>
                                        <div> آمل</div>
                                    </td>
                                    <td>
                                        <div> ملاصدرا</div>
                                    </td>
                                    <td>
                                        <div> 44268544</div>
                                    </td>
                                    <td>
                                        <div> خیابان طالب آملی ـ ابتدای كوچه هنرستان دریا 23 ـ پلاك 5</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ardebil ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اردبیل</div>
                                    </td>
                                    <td>
                                        <div> اردبیل</div>
                                    </td>
                                    <td>
                                        <div> شریعتی</div>
                                    </td>
                                    <td>
                                        <div> 33260080</div>
                                    </td>
                                    <td>
                                        <div> میدان شریعتی ـ جنب ارس اپتیك</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> اردبیل</div>
                                    </td>
                                    <td>
                                        <div> اردبیل</div>
                                    </td>
                                    <td>
                                        <div> کتاب فروشی حضرتی</div>
                                    </td>
                                    <td>
                                        <div> 045-33261689</div>
                                    </td>
                                    <td>
                                        <div> مابین شریعتی و سه راه دانش</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="gilan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> گیلان</div>
                                    </td>
                                    <td>
                                        <div> رشت</div>
                                    </td>
                                    <td>
                                        <div> مژده</div>
                                    </td>
                                    <td>
                                        <div> 013-33223637</div>
                                    </td>
                                    <td>
                                        <div> میدان شهرداری</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> گیلان</div>
                                    </td>
                                    <td>
                                        <div> رشت</div>
                                    </td>
                                    <td>
                                        <div> طاعتی</div>
                                    </td>
                                    <td>
                                        <div> 33222627</div>
                                    </td>
                                    <td>
                                        <div> خیابان اعلم الهدی -شماره 11</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> گیلان</div>
                                    </td>
                                    <td>
                                        <div> لاهیجان</div>
                                    </td>
                                    <td>
                                        <div> نباتی</div>
                                    </td>
                                    <td>
                                        <div> 42236055</div>
                                    </td>
                                    <td>
                                        <div> خیابان انقلاب ـ بعد از سینما مبعث ـ جنب اداره برق</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> گیلان</div>
                                    </td>
                                    <td>
                                        <div> رشت</div>
                                    </td>
                                    <td>
                                        <div> رستگار</div>
                                    </td>
                                    <td>
                                        <div> 33237595</div>
                                    </td>
                                    <td>
                                        <div> خیابان امام خمینی ـ روبروی آرد كوبی</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="zanjan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> زنجان</div>
                                    </td>
                                    <td>
                                        <div> زنجان</div>
                                    </td>
                                    <td>
                                        <div> خانه كتاب</div>
                                    </td>
                                    <td>
                                        <div> 33329100</div>
                                    </td>
                                    <td>
                                        <div> میدان انقلاب ـ خیابان سعدی ـ پاساژ سعدی ـ پلاك 4</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> زنجان</div>
                                    </td>
                                    <td>
                                        <div> زنجان</div>
                                    </td>
                                    <td>
                                        <div> شهر كتاب</div>
                                    </td>
                                    <td>
                                        <div> 33324481</div>
                                    </td>
                                    <td>
                                        <div> خیابان سعدی ـ نرسیده به جهارراه سعدی</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ghazvin ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> قزوین</div>
                                    </td>
                                    <td>
                                        <div> قزوین</div>
                                    </td>
                                    <td>
                                        <div> آریا</div>
                                    </td>
                                    <td>
                                        <div> 33333287</div>
                                    </td>
                                    <td>
                                        <div> خیابان خیام شمالی ـ روبروی بانك تجارت</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="alborz ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> البرز</div>
                                    </td>
                                    <td>
                                        <div> کرج</div>
                                    </td>
                                    <td class="auto-style2">کتاب فروشی کاظمی</td>
                                    <td class="auto-style1">32228079</td>
                                    <td>
                                        <div class="auto-style1"> خیابان شهید بهشتی، خیابان فاطمیه، پلاک 93
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="qom ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> قم</div>
                                    </td>
                                    <td>
                                        <div> قم</div>
                                    </td>
                                    <td class="auto-style2">آموزشگاه اندیشه و فن</td>
                                    <td class="auto-style1">7724933</td>
                                    <td>
                                        <div class="auto-style1"> خیابان باجک-فلکه جهاد-ابتدای باجک-طبقه فوقانی
                                            بانک پاسارگاد
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> قم</div>
                                    </td>
                                    <td>
                                        <div> قم</div>
                                    </td>
                                    <td>
                                        <div> هادی</div>
                                    </td>
                                    <td>
                                        <div> 33773257</div>
                                    </td>
                                    <td>
                                        <div> خیابان ارم ـ پاساژ قدس ـ شماره 85</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> قم</div>
                                    </td>
                                    <td>
                                        <div> قم</div>
                                    </td>
                                    <td>
                                        <div> اندیشه سازان</div>
                                    </td>
                                    <td>
                                        <div> 32241607</div>
                                    </td>
                                    <td>
                                        <div> خیابان ارم ـ پاساژ قدس ـ طبقه همكف ـ شماره 114</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="markazi ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مركزی</div>
                                    </td>
                                    <td>
                                        <div> اراك</div>
                                    </td>
                                    <td>
                                        <div> گاج</div>
                                    </td>
                                    <td>
                                        <div> 32241607</div>
                                    </td>
                                    <td>
                                        <div> خیابان مخابرات ـ طبقه‌ی پایین اداره پست مركزی</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مركزی</div>
                                    </td>
                                    <td>
                                        <div> اراك</div>
                                    </td>
                                    <td>
                                        <div> اندیشه</div>
                                    </td>
                                    <td>
                                        <div> 32245430</div>
                                    </td>
                                    <td>
                                        <div> میدان شهدا - پاساژ اتحاد</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مركزی</div>
                                    </td>
                                    <td>
                                        <div> اراك</div>
                                    </td>
                                    <td>
                                        <div> گزینه درست</div>
                                    </td>
                                    <td>
                                        <div> 086-3228004</div>
                                    </td>
                                    <td>
                                        <div> </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مركزی</div>
                                    </td>
                                    <td>
                                        <div> ساوه</div>
                                    </td>
                                    <td>
                                        <div> ربانی</div>
                                    </td>
                                    <td>
                                        <div> 42449090</div>
                                    </td>
                                    <td>
                                        <div> خیابان امیرکبیر 11</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> مركزی</div>
                                    </td>
                                    <td>
                                        <div> اراك</div>
                                    </td>
                                    <td>
                                        <div> خانه کتاب</div>
                                    </td>
                                    <td>
                                        <div> 086-32229707</div>
                                    </td>
                                    <td>
                                        <div> میدان شهدا-پاساژ اتحاد-طبقه دوم</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="hamedan ck-namayandegi-show table-responsive">
                        <i class="fa fa-window-close ck-close"></i>
                        <table class="table table-striped table-hover table table-sm">
                            <tbody>
                                <tr>
                                    <td style="color: #ff0000;">
                                        <div> نام استان</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام شهر</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> نام كتابفروشی</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> تلفن</div>
                                    </td>
                                    <td style="color: #ff0000;">
                                        <div> آدرس</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div> همدان</div>
                                    </td>
                                    <td>
                                        <div> همدان</div>
                                    </td>
                                    <td>
                                        <div> جهان دانش</div>
                                    </td>
                                    <td>
                                        <div> 32517595</div>
                                    </td>
                                    <td>
                                        <div> 32512905</div>
                                    </td>
                                    <td>
                                        <div> خیابان امام ـ ابتدای خیابان شریعتی</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div id="ck-map-namayandegiha">
                        <h2 style="margin-top: 77px; margin-bottom: 11px;font-size: 15px;">برای مشاهده آدرس و شماره
                            تماس نمایندگی بر روی نام استان کلیک نمایید</h2>
                        <!-- wrapper برای تصویر نقشه و overlay SVG -->
                        <div class="ck-map-wrapper" style="position:relative;display:inline-block;">
                            <div class="ck-map-wrapper" style="position:relative;display:inline-block;">
                                <img id="ck-map-img" src="<?php bloginfo('url') ?>/img/map.png" usemap="#Map"
                                    style="display:block;max-width:100%;height:auto;">
                                <!-- SVG overlay با همان سایز تصویر، به صورت absolute روی عکس قرار می‌گیرد -->
                                <svg id="ck-map-overlay"
                                    style="position:absolute;left:0;top:0;pointer-events:none;width:100%;height:100%;"
                                    preserveAspectRatio="xMinYMin meet"></svg>
                            </div>
                            <!-- SVG overlay با همان سایز تصویر، به صورت absolute روی عکس قرار می‌گیرد -->
                            <svg id="ck-map-overlay"
                                style="position:absolute;left:0;top:0;pointer-events:none;width:100%;height:100%;"
                                preserveAspectRatio="xMinYMin meet"></svg>
                        </div>
                        <map name="Map">
                            <area class="ck-ostan" id="sistanbalochestan" shape="poly"
                                coords="709,765,710,783,718,796,718,812,721,833,718,849,733,867,738,881,755,880,777,882,792,885,802,887,807,883,814,887,827,889,838,892,853,894,865,889,865,880,866,866,866,856,865,848,869,843,872,833,875,825,885,818,895,810,899,803,910,798,924,794,937,793,943,790,939,772,939,764,927,761,920,756,918,744,913,727,909,713,902,700,889,692,874,687,858,677,847,664,833,643,829,629,818,617,810,615,811,603,819,592,833,578,844,559,855,539,850,524,845,515,837,515,824,523,816,535,817,554,817,569,811,579,806,576,796,569,784,561,775,560,753,564,744,572,739,583,734,598,729,617,736,630,739,643,741,654,735,660,735,676,731,691,720,696,718,710,716,712,723,715,741">
                            <area class="ck-ostan" id="kerman" shape="poly"
                                coords="512,549,535,549,544,540,546,529,547,519,565,509,578,500,592,492,610,495,626,501,640,506,658,511,674,516,695,524,705,536,721,542,732,568,731,590,725,609,728,626,731,645,729,662,724,682,720,696,710,710,716,736,705,767,706,791,713,805,693,807,668,795,657,792,639,781,634,754,632,740,625,731,614,716,609,710,602,716,592,722,575,720,566,707,566,687,563,672,557,675,549,680,541,680,525,675,520,673,512,661,503,645,496,643,487,634,483,616,488,593,485,575,482,560,487,550">
                            <area class="ck-ostan" id="hormozgan" shape="poly"
                                coords="388,772,394,767,412,776,445,780,456,778,459,769,469,764,477,761,494,759,515,764,524,754,535,746,540,739,538,731,539,722,537,707,537,701,530,692,524,687,522,681,537,680,554,686,557,700,560,707,564,718,575,726,588,727,601,727,607,715,617,731,628,744,631,759,629,774,632,782,638,793,645,797,665,799,676,806,684,813,700,815,710,815,716,817,716,828,715,846,716,853,723,861,733,877,721,876,715,875,700,873,689,874,682,879,676,880,672,873,666,867,653,869,642,864,630,855,627,838,621,827,619,817,615,804,609,793,604,787,595,783,577,783,565,787,554,792,544,797,538,803,525,806,514,809,504,816,493,822,473,812,465,812,453,811,437,809,420,804,406,790,394,785">
                            <area class="ck-ostan" id="khorasanjonobi" shape="poly"
                                coords="672,368,700,363,726,366,752,367,762,376,773,366,781,371,783,389,792,398,782,417,791,443,794,463,799,484,800,510,809,518,816,525,815,537,812,545,813,557,813,571,804,569,793,563,777,559,758,555,750,561,743,565,732,561,719,540,717,533,704,527,690,522,678,514,660,508,649,504,641,499,642,487,655,482,658,475,653,464,648,453,645,442,636,442,633,431,629,416,628,406,618,404,606,386,610,377,614,363,621,351,642,341,635,353,642,362,662,362">
                            <area class="ck-ostan" id="yazd" shape="poly"
                                coords="400,470,396,499,399,510,403,520,414,525,428,549,447,576,458,599,477,620,483,612,482,595,482,573,478,564,495,548,525,548,536,544,538,533,546,522,548,516,563,506,574,497,590,490,600,490,619,491,631,498,642,490,651,479,654,470,643,452,634,441,628,425,623,406,601,393,607,378,616,355,632,342,634,329,629,321,616,315,607,314,592,323,587,329,579,329,568,328,556,331,549,344,548,353,542,365,532,368,525,367,528,377,531,395,527,406,520,415,511,420,507,430,497,437,478,440,466,445,454,447,440,454,431,452,417,452,411,456">
                            <area class="ck-ostan" id="fas" shape="poly"
                                coords="298,599,308,591,313,585,314,577,316,571,329,573,335,579,337,574,348,556,347,542,347,529,343,523,342,520,349,514,360,508,370,513,378,522,391,524,405,522,421,527,426,560,437,573,450,596,459,608,469,619,474,628,485,644,508,654,518,678,519,690,530,704,539,721,535,731,533,746,521,750,505,756,487,756,477,756,465,761,453,768,446,773,437,775,425,777,413,773,399,765,389,760,382,744,368,728,361,707,355,686,351,675,347,660,337,634,342,647,331,643,322,639,311,624,302,615,291,613,288,604">
                            <area class="ck-ostan" id="esfehan" shape="poly"
                                coords="400,470,396,499,399,510,403,520,414,525,428,549,447,576,458,599,477,620,483,612,482,595,482,573,478,564,495,548,525,548,536,544,538,533,546,522">

                            <area class="ck-ostan" id="khorasanrazavi" shape="poly"
                                coords="672,368,700,363,726,366,752,367,762,376,773,366,781,371,783,389,792,398,782,417,791,443">

                            <area class="ck-ostan" id="boshehr" shape="poly"
                                coords="298,599,308,591,313,585,314,577,316,571,329,573,335,579,337,574,348,556">

                            <area class="ck-ostan" id="charmahalbakhtiari" shape="poly"
                                coords="400,470,396,499,399,510,403,520,414,525,428,549,447,576">

                            <area class="ck-ostan" id="kohkiloye" shape="poly"
                                coords="298,599,308,591,313,585,314,577,316,571">

                            <area class="ck-ostan" id="khozestan" shape="poly"
                                coords="400,470,396,499,399,510,403,520,414">

                            <area class="ck-ostan" id="semnan" shape="poly" coords="672,368,700,363,726,366,752,367">

                            <area class="ck-ostan" id="ilam" shape="poly" coords="298,599,308,591,313,585">

                            <area class="ck-ostan" id="lorestan" shape="poly" coords="400,470,396,499,399">

                            <area class="ck-ostan" id="khorasanshomali" shape="poly" coords="672,368,700,363">

                            <area class="ck-ostan" id="golestan" shape="poly" coords="298,599,308">

                            <area class="ck-ostan" id="azarbayjansharghi" shape="poly" coords="400,470">

                            <area class="ck-ostan" id="kordestan" shape="poly" coords="672,368">

                            <area class="ck-ostan" id="kermanshah" shape="poly" coords="298,599">

                            <area class="ck-ostan" id="tehran" shape="poly" coords="400,470">

                            <area class="ck-ostan" id="mazandaran" shape="poly" coords="672,368">

                            <area class="ck-ostan" id="ardebil" shape="poly" coords="298,599">

                            <area class="ck-ostan" id="gilan" shape="poly" coords="400,470">

                            <area class="ck-ostan" id="zanjan" shape="poly" coords="672,368">

                            <area class="ck-ostan" id="ghazvin" shape="poly" coords="298,599">

                            <area class="ck-ostan" id="alborz" shape="poly" coords="400,470">

                            <area class="ck-ostan" id="qom" shape="poly" coords="672,368">

                            <area class="ck-ostan" id="markazi" shape="poly" coords="298,599">

                            <area class="ck-ostan" id="hamedan" shape="poly" coords="400,470">
                        </map>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>