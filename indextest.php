<?php
/*
Template Name: indextest
*/
include("header.php");
?>
    <div>
        <div>
            <div class="ck-page-container ">
                <div class="ck-page-content ry-content-page">
                    <div class="row" dir="rtl">
                        <article class="col-lg-12 index-article">
                            <div class="firstpage__header">
                                <div class="container">
                                    <div class="header__firstImage"></div>
                                    <div class="header_codeLineImage col-lg-8 float-right">
                                        <?php include("ry-slideshow-main.php") ?>
                                    </div>
                                    <div class="header_main col-lg-4 float-right">
                                        <h1 class="header_main--title">انتشارات چهارخونه ناشر تخصصی هنرستان</h1>
                                        <p class="header_main--description">انتشارات چهارخونه با بیش از 17 سال سابقه در
                                            زمینه کتاب های کمک آموزشی فنی و حرفه ای و کاردانش فعالیت دارد. این انتشارات
                                            علاوه بر تمرکز ویژه بر روی پایه های تحصیلی هنرستان، برای دوره ابتدایی و دوره
                                            اول متوسطه نیز کتاب های مورد نیازشون را تالیف و منتشر کرده است. انتشارات
                                            چهارخونه با بهره گیری از اساتید و دبیران برجسته کشور، سعی در تألیف هر چه
                                            بهتر کتاب های کمک آموزشی کرده است.

                                        </p>
                                        <div class="group">
                                            <a href="<?php bloginfo('url') ?>/هنرستان/پایه-دهم/فیلم-آموزشی-پایه-دهم/" class="course_btn">فیلم های آموزشی</a>
                                            <a href="<?php bloginfo('url') ?>/آزمون-آنلاین" class="article_btn">آزمون های آنلاین</a>
                                            <a href="<?php bloginfo('url') ?>/انتخاب-رشته-تحصیلی" class="course_btn discuss_btn">کتاب های کمک آموزشی</a>
                                            <a href="<?php bloginfo('url') ?>/مصاحبه-با-رتبه-های-برتر-رشته-الکتروتکن" class="course_btn rotbe">رتبه های برتر کنکور</a>
                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div>
                                
                            </div>
                            <div class="container">
                                <div class="col-lg-12 ry-fast-accsess">
                                    <p class="text-right ry-head-carosel"><span class="ry-ppaa">دسترسی سریع</span>
                                    <div class="col-lg-4 float-right">
                                        <select class="form-control ry-sssss" id="maghta">
                                            <option> پایه تحصیلی خور را انتخاب نمایید</option>
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
                                        var maghta=$("#maghta").val();
                                        var sal= $("#sale_tahsili");
                                        sal.html('');
                                        var reshte=$("#reshte_tahsili");
                                        sal.removeAttr('disabled');
                                        reshte.html('');
                                        if(maghta==="هنرستان") {
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
                                        if(maghta==="دوره اول متوسطه") {
                                            reshte.attr('disabled','disabled');
                                            reshte.append('<option>رشته تحصیلی</option>');
                                            sal.append('<option>سال هفتم</option>');
                                            sal.append('<option>سال هشتم</option>');
                                            sal.append('<option>سال نهم </option>');
                                        }
                                        if(maghta==="دوره ابتدایی") {
                                            reshte.attr('disabled','disabled');
                                            reshte.append('<option>رشته تحصیلی</option>');
                                            sal.append('<option>سال سوم</option>');
                                            sal.append('<option>سال چهارم</option>');
                                            sal.append('<option>سال پنجم </option>');
                                            sal.append('<option>سال ششم </option>');
                                        }


                                    });




                                    $("#btn-fast").on('click',function () {
                                       var maghta=$("#maghta").val();
                                       var sale_tahsili=$("#sale_tahsili").val();
                                        var reshte=$("#reshte_tahsili").val();
                                        if(maghta==="دوره ابتدایی"){
                                            if(sale_tahsili==="سال سوم"){
                                                window.location.replace('http://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d8%a8%d8%aa%d8%af%d8%a7%db%8c%db%8c/%d9%be%d8%a7%db%8c%d9%87-%d8%b3%d9%88%d9%85/');
                                            }
                                            if(sale_tahsili==="سال چهارم"){
                                                window.location.replace('http://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d8%a8%d8%aa%d8%af%d8%a7%db%8c%db%8c/%d9%be%d8%a7%db%8c%d9%87-%da%86%d9%87%d8%a7%d8%b1%d9%85/');
                                            }
                                            if(sale_tahsili==="سال پنجم"){
                                                window.location.replace('http://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d8%a8%d8%aa%d8%af%d8%a7%db%8c%db%8c/%d9%be%d8%a7%db%8c%d9%87-%d9%be%d9%86%d8%ac%d9%85/');
                                            }
                                            if(sale_tahsili==="سال ششم"){
                                                window.location.replace('http://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d8%a8%d8%aa%d8%af%d8%a7%db%8c%db%8c/%d9%be%d8%a7%db%8c%d9%87-%d8%b4%d8%b4%d9%85/');
                                            }
                                        }
                                        if(maghta==="دوره اول متوسطه"){
                                            if(sale_tahsili==="سال هفتم"){
                                                window.location.replace('http://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d9%88%d9%84-%d9%85%d8%aa%d9%88%d8%b3%d8%b7%d9%87/%d9%be%d8%a7%db%8c%d9%87-%d9%87%d9%81%d8%aa%d9%85/');

                                            }
                                            if(sale_tahsili==="سال هشتم"){
                                                window.location.replace('http://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d9%88%d9%84-%d9%85%d8%aa%d9%88%d8%b3%d8%b7%d9%87/%d9%be%d8%a7%db%8c%d9%87-%d9%87%d8%b4%d8%aa%d9%85/');

                                            }
                                            if(sale_tahsili==="سال نهم"){
                                                window.location.replace('http://4khooneh.org/%d8%af%d9%88%d8%b1%d9%87-%d8%a7%d9%88%d9%84-%d9%85%d8%aa%d9%88%d8%b3%d8%b7%d9%87/%d9%be%d8%a7%db%8c%d9%87-%d9%86%d9%87%d9%85/');

                                            }
                                        }
                                        if(maghta==="هنرستان"){
                                            if(sale_tahsili==="سال دهم هنرستان"){
                                                if(reshte==="رشته شبکه نرم افزار"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%b4%d8%a8%da%a9%d9%87-%d9%88-%d9%86%d8%b1%d9%85-%d8%a7%d9%81%d8%b2%d8%a7%d8%b1-%d8%b1%d8%a7%db%8c%d8%a7%d9%86%d9%87-%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته معماری"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d9%85%d8%b9%d9%85%d8%a7%d8%b1%db%8c-%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته حسابداری"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%ad%d8%b3%d8%a7%d8%a8%d8%af%d8%a7%d8%b1%db%8c-%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته الکتروتکنیک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d8%aa%da%a9%d9%86%db%8c%da%a9-%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته الکترونیک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d9%86%db%8c%da%a9-%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته گرافیک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%da%af%d8%b1%d8%a7%d9%81%db%8c%da%a9-%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته مکانیک خودرو"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d9%85%da%a9%d8%a7%d9%86%db%8c%da%a9-%d8%ae%d9%88%d8%af%d8%b1%d9%88-%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته ماشین ابزار"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d9%85%d8%a7%d8%b4%db%8c%d9%86-%d8%a7%d8%a8%d8%b2%d8%a7%d8%b1-%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته تربیت بدنی"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%d8%a8%d8%af%d9%86%db%8c/');
                                                }
                                                if(reshte==="رشته ساختمان"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%b3%d8%a7%d8%ae%d8%aa%d9%85%d8%a7%d9%86-%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته تربیت کودک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%da%a9%d9%88%d8%af%da%a9-%d8%af%d9%87%d9%85/');
                                                }
                                            }
                                            if(sale_tahsili==="سال یازدهم هنرستان"){
                                                if(reshte==="رشته شبکه نرم افزار"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%b4%d8%a8%da%a9%d9%87-%d9%88-%d9%86%d8%b1%d9%85-%d8%a7%d9%81%d8%b2%d8%a7%d8%b1-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته معماری"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%d8%b9%d9%85%d8%a7%d8%b1%db%8c-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته حسابداری"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%ad%d8%b3%d8%a7%d8%a8%d8%af%d8%a7%d8%b1%db%8c-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته الکتروتکنیک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d8%aa%da%a9%d9%86%db%8c%da%a9-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته الکترونیک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d9%86%db%8c%da%a9-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته گرافیک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%da%af%d8%b1%d8%a7%d9%81%db%8c%da%a9-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته مکانیک خودرو"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%da%a9%d8%a7%d9%86%db%8c%da%a9-%d8%ae%d9%88%d8%af%d8%b1%d9%88-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته ماشین ابزار"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%d8%a7%d8%b4%db%8c%d9%86-%d8%a7%d8%a8%d8%b2%d8%a7%d8%b1-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته تربیت بدنی"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%d8%a8%d8%af%d9%86%db%8c-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته ساختمان"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%b3%d8%a7%d8%ae%d8%aa%d9%85%d8%a7%d9%86-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته تربیت کودک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%da%a9%d9%88%d8%af%da%a9-%db%8c%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }

                                            }
                                            if(sale_tahsili==="سال دوازدهم هنرستان"){
                                                if(reshte==="رشته شبکه نرم افزار"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%b4%d8%a8%da%a9%d9%87-%d9%88-%d9%86%d8%b1%d9%85-%d8%a7%d9%81%d8%b2%d8%a7%d8%b1-%d8%b1%d8%a7%db%8c%d8%a7%d9%86%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته معماری"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%d8%b9%d9%85%d8%a7%d8%b1%db%8c-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته حسابداری"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%ad%d8%b3%d8%a7%d8%a8%d8%af%d8%a7%d8%b1%db%8c-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته الکتروتکنیک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d8%aa%da%a9%d9%86%db%8c%da%a9-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته الکترونیک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%a7%d9%84%da%a9%d8%aa%d8%b1%d9%88%d9%86%db%8c%da%a9-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته گرافیک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%da%af%d8%b1%d8%a7%d9%81%db%8c%da%a9-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته مکانیک خودرو"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%da%a9%d8%a7%d9%86%db%8c%da%a9-%d8%ae%d9%88%d8%af%d8%b1%d9%88-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته ماشین ابزار"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d9%85%d8%a7%d8%b4%db%8c%d9%86-%d8%a7%d8%a8%d8%b2%d8%a7%d8%b1-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته تربیت بدنی"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%d8%a8%d8%af%d9%86%db%8c-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته ساختمان"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%b3%d8%a7%d8%ae%d8%aa%d9%85%d8%a7%d9%86-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
                                                }
                                                if(reshte==="رشته تربیت کودک"){
                                                    window.location.replace('http://4khooneh.org/%d9%87%d9%86%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/%d9%be%d8%a7%db%8c%d9%87-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/%d8%aa%d8%b1%d8%a8%db%8c%d8%aa-%da%a9%d9%88%d8%af%da%a9-%d8%af%d9%88%d8%a7%d8%b2%d8%af%d9%87%d9%85/');
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
                                    <?php include("ry-film-new-caroser.php") ?>
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