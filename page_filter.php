<?php
/*
Template Name: page_filter
*/
include("header.php");
setPostViews(get_the_ID());
?>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
    <link href="<?php bloginfo('template_url') ?>/css/simplePagination.css" rel="stylesheet">
    <script src="<?php bloginfo('template_url') ?>/js/jquery.simplePagination.js"></script>
    <style>
        .curser {
            cursor: pointer;
        }

        #ajax-container {
            position: fixed;
            width: 100%;
            right: 0;
            height: 100%;
            background-color: rgba(27, 30, 33, 0.39);
            top: 0;
            z-index: 10;
            display: none;
        }

        #ajax-it {
            margin-right: 47%;
            margin-top: 7%;
        }
        .ry-auto,.ry-auto .ry-tt{
            height: auto!important;
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

                </div>
                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <div class="ry-r-s-c ry-auto">
                                <div class="ry-hedad">
                                    <p class="text-right">دسته بندی محصولات</p>
                                </div>
                                <div class="ry-tt">
                                    <p class="mr-4 h4 curser" onclick="pType('شبکه و نرم افزار رایانه دوازدهم')">شبکه و
                                        نرم افزار رایانه دوازدهم</p>
                                    <p class="mr-4 h4 curser" onclick="pType('نقشه کشی معماری دوازدهم')">نقشه کشی معماری
                                        دوازدهم</p>
                                </div>

                            </div>
                            <div class="ry-r-s-c ry-auto">
                                <div class="ry-hedad">
                                    <p class="text-right">بر اساس سن</p>
                                </div>
                                <div class="ry-tt h4 pr-3">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="below3" onchange="chekedAge()">
                                        <label class="form-check-label mr-4" for="flexCheckDefault">
                                            زیر 3 سال
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="3to5" onchange="chekedAge()">
                                        <label class="form-check-label mr-4" for="flexCheckChecked">
                                            3 تا 5 سال
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="5to7" onchange="chekedAge()">
                                        <label class="form-check-label mr-4" for="flexCheckChecked">
                                            5 تا 7 سال
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="7to10" onchange="chekedAge()">
                                        <label class="form-check-label mr-4" for="flexCheckChecked">
                                            7 تا 10 سال
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="10to15" onchange="chekedAge()">
                                        <label class="form-check-label mr-4" for="flexCheckChecked">
                                            10 تا 15 سال
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="big" onchange="chekedAge()">
                                        <label class="form-check-label mr-4" for="flexCheckChecked">
                                            بزرگسال
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="ry-r-s-c ry-auto">
                                <div class="ry-hedad">
                                    <p class="text-right">بر اساس جنسیت</p>
                                </div>
                                <div class="ry-tt h4 pr-3">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="male" onchange="chekeSex()">
                                        <label class="form-check-label mr-4" for="flexCheckDefault">
                                            پسرانه
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="fmale" onchange="chekeSex()">
                                        <label class="form-check-label mr-4" for="flexCheckDefault">
                                            دخترانه
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="nmale" onchange="chekeSex()">
                                        <label class="form-check-label mr-4" for="flexCheckDefault">
                                            پسرانه-دخترانه
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="ry-r-s-c ry-auto">
                                <div class="ry-hedad">
                                    <p class="text-right">بر اساس قیمت</p>
                                </div>
                                <div class="ry-tt h6 p-3">
                                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                                    <p class="pt-3">
                                        <input type="text" id="amount" readonly="" style="border:0; color:#00afef; font-size: 16px;font-weight:bold;" class="mb-3">
                                    </p>
                                    <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content "><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 15%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span></div>
                                    <div class="pt-3"></div>

                                    <div class="col-lg-12 text-left">
                                        <div class="btn btn-danger" onclick="priceFilter()">اعمال قیمت</div>
                                    </div>
                                    <script>

                                        $( function() {
                                            $( "#slider-range" ).slider({
                                                range: true,
                                                min: 0,
                                                max: 1250000,
                                                values: [ 0, 1250000 ],
                                                slide: function( event, ui ) {
                                                    $( "#amount" ).val(   ui.values[ 0 ] + "تومان - " + ui.values[ 1 ]+"تومان" );
                                                }
                                            });
                                            $( "#amount" ).val(  $( "#slider-range" ).slider( "values", 0 )+"تومان" +
                                                " - " + $( "#slider-range" ).slider( "values", 1 )+"تومان" );
                                        } );
                                    </script>
                                </div>

                            </div>
                            </div>
                            <article class="ck-page-article">
                                <div class="ry-filter-content">
                                    <div id="ajax-container">
                                        <img id="ajax-it"
                                             src="<?php bloginfo('url') ?>/wp-content/uploads/2021/04/ajax.gif">
                                    </div>
                                    <div id="all-item">

                                    </div>
                                    <div class="clear"></div>
                                    <div name="PagePagination" class="light-theme simple-pagination">
                                        <ul>
                                            <li><a href="#page-40" class="page-link prev">قبلی</a></li>
                                            <li><a href="#page-1" class="page-link active">1</a></li>
                                            <li class="disabled"><span class="current next">بعدی</span></li>
                                        </ul>
                                    </div>
                                    <input type="text" class="d-none" id="ry-locate" value="<?php bloginfo('url') ?>">
                                    <script>
                                        $(document).ready(function(){
                                            Model.ProductType="شبکه و نرم افزار رایانه دوازدهم";
                                            LoadRequestsData(1);
                                        });
                                        let Model = {};
                                        pType = (type) => {
                                            Model.ProductType = type;
                                            LoadRequestsData(1);
                                        };
                                        priceFilter=()=>{
                                            Model.price = [$( "#slider-range" ).slider( "values", 0 ),$( "#slider-range" ).slider( "values", 1 )];
                                            LoadRequestsData (1);
                                        };
                                        chekeSex=()=>{
                                            sexs=[];
                                            if($("#male").is(':checked')){
                                                sexs.push("پسرانه")
                                            }
                                            if($("#fmale").is(':checked')){
                                                sexs.push("دخترانه")
                                            }
                                            if($("#nmale").is(':checked')){
                                                sexs.push("پسرانه-دخترانه")
                                            }
                                            Model.sex = sexs;
                                            LoadRequestsData (1);
                                        };
                                        chekedAge=()=>{
                                            let age=[];
                                           if($("#below3").is(':checked')){
                                               age.push("زیر 3 سال")
                                           }
                                            if($("#3to5").is(':checked')){
                                                age.push("3 تا 5 سال")
                                            }
                                            if($("#5to7").is(':checked')){
                                                age.push("5 تا 7 سال")
                                            }
                                            if($("#7to10").is(':checked')){
                                                age.push("7 تا 10 سال")
                                            }
                                            if($("#10to15").is(':checked')){
                                                age.push("10 تا 15 سال")
                                            }
                                            if($("#big").is(':checked')){
                                                age.push("بزرگسال")
                                            }
                                            Model.age = age;
                                            LoadRequestsData (1);
                                        };
                                        LoadRequestsData = (p) => {


                                            Model.PageNumber = p;
                                            $.ajax({
                                                type: 'POST',
                                                url: document.getElementById('ry-locate').value + '/wp-admin/admin-ajax.php',
                                                data: {
                                                    action: 'get_all_filter',
                                                    data: Model
                                                },
                                                beforeSend: function () {
                                                    $("#ajax-container").toggle();
                                                },
                                                success: function (res) {
                                                    $('html, body').animate({
                                                        scrollTop: $("#all-item").offset().top - 150
                                                    }, 900);
                                                    result = res;
                                                    FillPersonsGrid(result, p);
                                                    $("#ajax-container").toggle();
                                                    console.log(result[0].total);
                                                    // $('#RequestCount').html('(' + result[0].number_of_users +  ' درخواست  )');
                                                    SetupPagination($('[name="PagePagination"]'), p, 12, result[0].total, LoadRequestsData);
                                                }
                                            });
                                        };
                                        FillPersonsGrid = (data, p) => {
                                            $('#all-item').empty();
                                            for (var i = 0; i < data.length; i++) {
                                                let item = '<a href="' + data[i].link + '">';
                                                item += '<div class="ck-book">';
                                                if (data[i].final_price !== data[i].regular_price) {
                                                    let fp = data[i].final_price;
                                                    let rp = data[i].regular_price;
                                                    let bar = parseInt((1 - (fp / rp)) * 100);
                                                    item += '<span class="ry-bargain">' + bar + '% </span>';
                                                }
                                                item += '<img class="lazy ck-book-img" src="' + data[i].image + '" alt="' + data[i].title + '" style="display: inline;">';
                                                item += ' <p>' + data[i].title + '</p>';
                                                item += '<div class="ck-kharid">';
                                                item += '<div class="ck-gheymat ck-no-aadd">';
                                                item += '<div class="ck-old-price">';
                                                if (data[i].final_price !== data[i].regular_price) {
                                                    item += '<del><h3>' + data[i].regular_price + '<span>تومان</span></h3></del>';
                                                }
                                                item += '<div class="ck-new-price"><h3>' + data[i].final_price + '<span>تومان</span></h3> </div>';
                                                item += '</div>';
                                                item += '</div>';
                                                item += '<div class="clear"></div>';
                                                item += '</div>';
                                                item += '<div rel="' + data[i].id + '" class="single_add_to_cart_buttons text-center">افزودن به سبد خرید</div>';
                                                item += '</div>';
                                                item += '</a>';
                                                $('#all-item').append(item);

                                            }
                                        };
                                        SetupPagination = (ElementName, CurrentPage, ItemsPersPage, TotalRecord, LoadDataFunction) => {
                                            ElementName.pagination({
                                                items: TotalRecord,
                                                itemsOnPage: ItemsPersPage,
                                                currentPage: CurrentPage,
                                                onPageClick: function (pageNumber, event) {
                                                    event.preventDefault();
                                                    LoadDataFunction(pageNumber);
                                                }
                                            });
                                        };
                                    </script>
                                </div>
                                <div class="ck-all-page-content">
                                    <?php
                                    $my_postid = $post->ID;
                                    $content_post = get_post($my_postid);
                                    $content = $content_post->post_content;
                                    echo do_shortcode($content);
                                    ?>
                                </div>
                                <div class="ck-comment-header">
                                    <img src="<?php bloginfo('url'); ?>/img/comment-icom.png" alt="نظرات">
                                    <h3>ارسال دیدگاه(نظرات، انتقادات و پیشنهادات خود را با ما در میان بگذارید.)</h3>
                                </div>
                                <script src='<?php bloginfo('template_url') ?>/js/jq/jquery-ui.min.js'></script>
                                <script src="<?php bloginfo('template_url') ?>/js/addinloop.js?v=1.0.0.1"></script>
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
                                <div class="clear"></div>
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
<?php include("footer.php") ?>