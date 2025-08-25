<?php
/*
Template Name: online exam
*/
?>
    <style>
        .ry-page {
            position: relative;
        }

        .ry-quiz {
            height: 2550px;
        }

        ::-webkit-scrollbar {
            width: 0px !important;
        }

        .ry-mmmmm {
            display: none;
        }

        .ry-answers {
            height: 100%;
            overflow: scroll;
            position: fixed !important;
            top: 0;
        }

        .ry-header {
            margin-top: 85px;
            background-color: white;
            padding: 15px;
            height: auto;
            box-shadow: -1px 2px 20px 2px #cecece52;
        }

        .ry-page {
            background-color: #f5f5f5 !important;
        }

        .ry-header h1 {
            font-size: 17px;
            font-weight: bold;
        }

        .ry-header .ry-onvan {
            color: black;
            font-size: 16px;
        }

        .ry-header .ry-zaman {
            margin-right: 26%;
            color: black;
            font-size: 18px;
        }

        .ry-margin {
            margin-right: 15%;
        }

        .ry-btn-download {
            background-color: #2196f3;
            color: white;
            padding: 10px 29px;
            font-size: 13px;
        }

        .ry-down {
            margin-top: 4px;
        }

        .ry-btn-download i {
            font-size: 15px;
            margin-left: 6px;
        }

        .ry-m-c {
            margin-top: 25px !important;
            height: auto !important;
        }

        .ry-ml {
            margin-top: 101px;
        }

        #toolbar {
            display: none !important;
        }

        .ry-titr {
            color: #00afef;
            font-size: 18px;
            margin-bottom: 18px;
        }

        .ry-ml-2 {
            margin-top: 10px !important;
            height: 300px;
            overflow: scroll;
        }

        .ry-anssss .ry-answer-number {
            color: black;
            margin-right: 5px;
            font-size: 19px;
            width: 30px;
            text-align: center;
        }

        .ry-anssss .ans {
            color: black;
            border-radius: 10px;
            width: 33px;
            background-color: white;
            cursor: pointer;
            height: 20px;
            margin-top: 2px;
            padding: 2px;
            margin-right: 6px;
            box-shadow: 0px 0px 4px 2px #50454552;
        }

        .question-number {
            width: 210px;
            margin: auto;
            margin-top: 3px;
        }

        .ry-active {
            background-color: green !important;
            color: white !important;
        }

        .ry-de-active {
            background-color: red !important;
            color: white !important;
        }

        .ry-khali {
            background-color: #FFEB3B !important;
            color: black !important;
        }

        .ry-btn-cal {
            background-color: red;
            padding: 9px 29px !important;
            color: white;
            border-radius: 14px !important;
            font-size: 13px;
        }

        .ry-ml-3 {
            margin-top: 10px !important;
        }

        .ry-green {
            width: 20px;
            height: 10px;
            margin-right: 4px;
            margin-top: 5px;
            margin-left: 17px;
            background-color: #95cf69;
        }

        .ry-yellow {
            width: 20px;
            margin-right: 4px;
            margin-left: 17px;
            margin-top: 5px;
            margin-top: 5px;
            height: 10px;
            background-color: #f2ebd1;
        }

        .ry-red {
            width: 20px;
            margin-right: 4px;
            margin-left: 17px;
            height: 10px;
            margin-top: 5px;
            background-color: #fa647d;
        }

        .reedd {
            color: red;
            float: left;
        }

        #convasecal {
            display: none;
        }

        .convasecal span {
            font-size: 13px;
        }

        #answer-show {
            cursor: pointer;
            display: none;
        }

        #dros_darsad span {
            font-size: 17px;
            line-height: 28px;
        }

        #works {
            max-width: 100%;
            height: auto !important;
        }

        #countdown360_countdown {
            width: 100px;
        }

        .ry-img-full {
            width: 100%;
        }

        #wpcomm {
            max-width: 100% !important;
        }
        .ry-rrrrr{
            font-size: 25px;
            font-weight: bold;
            color: red;
            margin-bottom: 15px;
        }

        @media only screen and (max-width: 767px) and (min-width: 0px) {
            #works {
                max-width: 85%;
            }

            .ry-ml-22 {
                height: 49% !important;
            }

            .ry-header-chart {
                padding: 0 !important;
            }

            .ry-red, .ry-green, .ry-yellow {
                margin-left: 7px !important;
            }

            .ry-mmmmm {
                display: none;
            }

            #exam_question {
                margin-top: 98px;
            }

            .ry-answers {
                display: none;
                top: 0px;
                z-index: 100000;
                overflow: scroll;
            }

            .ry-quiz {
                padding: 0 !important;
            }

            .container-fluid {
                padding: 0 !important;
            }

            .ry-m-c {
                padding: 0 !important;
            }

            .ry-quiz {
                height: auto;
            }

            .ry-ml-2 {
                height: 40%;
            }

            .ry-mmmmm p, .ry-mmmmm h1 {

            }

            .ry-zaman {
                margin-right: 0 !important;

                clear: right;
            }

            .ry-cl-1 {
                clear: both;
                margin: 0;
            }

            .ry-down {
                clear: both
            }

            .ry-ml {
                margin-top: 10px
            }

            .mobile-add-gozineh {
                display: block !important;
            }
        }

        .mobile-add-gozineh {
            display: none;
            position: fixed;
            bottom: 0;
            padding: 15px;
            text-align: center;
            height: 50px;
            right: 0;
            font-size: 15px;
            color: white;
            width: 100%;
            background-color: red;
        }

        .blure {
            position: fixed;
            z-index: 99999;
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            display: none;
            background-color: rgba(27, 30, 33, 0.46);
        }

        .btn-close {
            position: fixed;
            z-index: 100001;
            width: 45px;
            text-align: center;
            border-radius: 26px;
            padding: 14px;
            height: 45px;
            top: 15px;
            right: 15px;
            display: none;
            background-color: rgba(0, 0, 0, 0.51);
        }

        .btn-close i {
            color: white;
            font-size: 16px;
        }

    </style>
<?php include("header.php"); ?>
<?php
$post = get_post();
$post_id = $post->ID;
$question_numbers = (int )get_post_meta($post_id, 'tedadsoal', true);
$time = (int)get_post_meta($post_id, 'time', true);
$sec = $time * 60;
$file_address = get_post_meta($post_id, "file", true);
$pasokh = get_post_meta($post_id, 'pasokh', true);
$image_name = get_post_meta($post_id, 'image_name', true);
$image_tedad = get_post_meta($post_id, 'image_tedad', true);
$image_address = get_post_meta($post_id, 'image_address', true);
$image_address_pasokh = get_post_meta($post_id, 'image_address_pasokh', true);
$image_name_pasokh = get_post_meta($post_id, 'image_name_pasokh', true);
if (get_post_meta($post_id, 'dros_seprate_name', true)) {
    $dros_seprate_name = get_post_meta($post_id, 'dros_seprate_name', true);
    $dros_seprate_name = unserialize($dros_seprate_name);
}
?>
    <div class="container-fluid ry-page">
    <div class="col-md-9 col-12  float-right ry-quiz">
        <div class="ry-header ry-mmmmm">
            <p class="pull-right ry-onvan">:عنوان آزمون</p>
            <h1 class="pull-right"><?php the_title() ?></h1>
            <p class="pull-right ry-zaman">:زمان آزمون</p>
            <p class="pull-right ry-onvan"><?php echo $time; ?></p>
            <p class="pull-right ry-onvan">دقیقه</p>
            <p class="pull-right ry-onvan ry-margin ry-cl-1">:تعداد سوال</p>
            <p class="pull-right ry-onvan"><?php echo $question_numbers ?></p>
            <a href="<?php bloginfo('url') ?>/<?php echo $file_address; ?>" class="pull-left ry-down"><span
                        class="ry-btn-download">دانلود سوالات<i
                            class="fa fa-angle-down"></i></span></a>
            <div class="clear"></div>
        </div>
        <div class="ry-header ry-m-c">
            <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
            <script src="<?php bloginfo('template_url') ?>/js/zoom.js"></script>
            <object id="exam_question" data="<?php bloginfo('url') ?>/<?php echo $file_address; ?>#view=FitH"
                    type="application/pdf"
                    width="100%" height="100%">

                <!--                <embed src="--><?php //bloginfo('url') ?><!--/-->
                <?php //echo $file_address; ?><!--" type="application/pdf" />-->

                <!--<!--                <div class="page pinch-zoom-parent">-->-->
                <!--                    <div class="pinch-zoom-container" style="overflow: hidden; position: relative; height: 471px;">-->
                <!---->
                <!---->
                <!--                        <div class="pinch-zoom" style="scale(1, 1) translate(0px, 0px)">-->
                <?php
                for ($i = 1; $i <= $image_tedad; $i++) {
                    ?>
                    <img class="ry-img-full"
                         src="<?php bloginfo('url') ?>/<?php echo $image_address ?>/pic/<?php echo $image_name . $i ?>.jpg"
                         alt="<?php the_title() ?>">
                <?php } ?>
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->


            </object>
        </div>
        <div class="col-lg-12">
            <?php
            $my_postid = $_REQUEST['page_id'];
            $content_post = get_post($my_postid);
            $content = $content_post->post_content;
            echo do_shortcode($content)
            ?>
        </div>
        <div class="ck-comments">
            <?php comments_template(); ?>
        </div>
    </div>
    <div class="col-md-3 col-12 pull-left ry-answers  text-center ">

        <script src="<?php bloginfo('template_url') ?>/js/jquery.countdown360.min.js"></script>
        <div id="countdown" class="ry-header ry-ml">
            <span id="answer-show" class="ry-btn-download">مشاهده پاسخنامه<i class="fa fa-angle-down"></i></span>
        </div>
        <script>
            $("#countdown").countdown360({
                radius: 60.5,
                seconds: parseInt(<?php echo $sec?>),
                strokeWidth: 10,
                fillStyle: '#2196f3',
                draggableUnzoomed: false,
                strokeStyle: '#4679a4',
                fontSize: 40,
                fontColor: '#FFFFFF',
                label: ["ثانیه", "ثانیه"],
                autostart: false,
                onComplete: function () {
                    finalcal();
                }
            }).start()
        </script>

        <div class="ry-header ry-ml-2">
            <p class="ry-titr text-center">گزینه خود را پر نمایید</p>
            <div class="col-12 ry-anssss" dir="rtl">
                <?php

                for ($i = 1; $i <= $question_numbers; $i++) {
                    ?>
                    <div id="<?php echo $i ?>" class="question-number">
                        <span class="ry-answer-number float-right text-center"><?php echo $i ?></span>

                        <div rel="<?php echo $i ?>" role="1" class="ans float-right">1</div>
                        <div rel="<?php echo $i ?>" role="2" class="ans float-right">2</div>
                        <div rel="<?php echo $i ?>" role="3" class="ans float-right">3</div>
                        <div rel="<?php echo $i ?>" role="4" class="ans float-right">4</div>

                        <div class="clear"></div>
                    </div>
                    <?php
                }
                ?>

                <script>
                    $(".ans").on("click", function () {
                        //alert($(this).attr("rel")+$(this).attr("role"));
                        var rel = parseInt($(this).attr("rel"));
                        var role = parseInt($(this).attr("role"));
                        var user_item = parseInt($("#" + rel).find(".ry-active").attr("role"));
                        if (role === user_item) {
                            $("#" + rel).find(".ry-active").removeClass('ry-active')
                        } else {
                            $("#" + rel).find(".ry-active").removeClass("ry-active");
                            $(this).addClass("ry-active");
                        }
                    });
                </script>

            </div>
        </div>
        <div class="ry-header ry-ml-2 ry-ml-22">
            <button id="btncal" onclick="finalcal()" class="btn ry-btn-cal">اتمام و محاسبه نتیجه</button>
            <div class="col-12 ry-anssss" dir="rtl"></div>
            <div id="convasecal" class="convasecal ">
                <div class="col-lg-12 float-left ry-header-chart">
                    <span class="float-right">صحیح</span><span class="float-right" id="correct"></span>
                    <div class="float-right ry-green"></div>
                    <span class="float-right">نادرست</span><span class="float-right" id="wrong"></span>
                    <div class="float-right ry-red"></div>
                    <span class="float-right">بدون پاسخ</span><span class="float-right" id="noanswer"></span>
                    <div class="float-right ry-yellow"></div>
                    <div class="clear"></div>
                </div>
                <canvas id="works" class="" width="250" height="180"></canvas>
                <script src="<?php bloginfo('template_url') ?>/js/chart/Chart.min.js"></script>
                <?php
                $ok = 5;
                if ($ok == "") $ok = 0;
                $no = 10;
                if ($no == "") $no = 0;
                $noanswer = 5;
                if ($no == "") $no = 0;
                ?>
                <script>
                    var nemoodar = [
                        {
                            value: <?php echo($ok); ?>,
                            color: "#95cf69"
                        },
                        {
                            value: <?php echo($noanswer); ?>,
                            color: "#fa647d"
                        },
                        {
                            value: <?php echo($no); ?>,
                            color: "#f2ebd1"
                        }

                    ];

                </script>
                <script>
                    var works = document.getElementById('works').getContext('2d');
                    new Chart(works).Pie(nemoodar);
                </script>

                <p id="ry-darsad" class="text-center"></p>
                <div id="dros_darsad" class="col-lg-12">

                </div>
            </div>
            <!--           <input class="" id="dros_seprate_name" value="-->
            <?php //echo (json_encode($dros_seprate_name)) ?><!--" type="text">-->


            <script>
                var exam_finish = "no";
                var dros_seprate_name;
                var user_gozineha = [];
                var name_dars = [];
                var darsad_dars = [];
                var user_id_rand='';
                var darsad_kolii=0.25;
                var save_statuse=true;
                var rotbe=[];
                var all_sherkatkonandehan;


                var exam_id=<?php echo $post_id?>;
                if(getCookie('random_number_for_user')=== ""){
                    setCookie('random_number_for_user',Math.floor(Math.random() * 100000000) + 1 ,365);
                }
                else{
                    user_id_rand=getCookie('random_number_for_user');
                }
                var exam_coockie_id=getCookie('exam_id_'+exam_id);
                var usr_coockie_gozineha=JSON.parse(getCookie('user_gozineha_'+exam_id));
                if(usr_coockie_gozineha!==""&&exam_coockie_id!==""){
                    user_gozineha=usr_coockie_gozineha;
                    console.log('uuuusssser'+user_gozineha);
                    save_statuse=false;

                    finalcal();

                    setTimeout(read_rotbeha,1000);

                }
                function finalcal() {
                    document.getElementById("btncal").style.display = "none";
                    // var answers=document.getElementsByClassName("question-number");
                    var answers = $(".question-number");
                    // console.log(answers);
                    var question_numbers =<?php echo $question_numbers?>;
                    user_gozineha[0] = 0;
                    var sahih = 0;
                    var nadorost = 0;
                    // dros_seprate_name=JSON.parse(dros_seprate_name);
                    // console.log(dros_seprate_name);
                    var bedonepasokh = question_numbers;
                    exam_finish = "ok";
                    if(save_statuse===true){
                        for (var i = 1; i <= question_numbers; i++) {
                            if ($("#" + i).find('div.ry-active').length !== 0) {
                                var rel = $("#" + i).find('div.ry-active').attr("rel");
                                var role = $("#" + i).find('div.ry-active').attr("role");
                                user_gozineha[i] = parseInt(role);
                            } else {
                                user_gozineha[i] = 0;
                            }
                        }
                    }
                    // alert(user_gozineha);
                    //console.log(user_gozineha);
                    $.ajax({
                        type: 'POST',
                        url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                        data: {
                            action: 'get_gozineha',
                            post_id: <?php echo $post_id?>
                        },
                        beforeSend: function () {
                        },
                        success: function (res) {
                            var key = JSON.parse(res);
                            console.log(key);
                            bedonepasokh = -1;
                            for (var i = 0; i <= question_numbers; i++) {
                                if (user_gozineha[i] == 0) {
                                    bedonepasokh++;
                                    var n = key[i];
                                    n--;
                                    $("#" + i).find("div:eq(" + n + ")").addClass("ry-khali");
                                } else {
                                    if (user_gozineha[i] === key[i]) {
                                        sahih++;

                                        var n = key[i];
                                        n--;
                                        $("#" + i).find("div:eq(" + n + ")").addClass("ry-active");

                                    } else {
                                        nadorost++;
                                        if (i !== 0) {
                                            n = key[i];
                                            n--;
                                            var wr=user_gozineha[i];
                                            wr--;
                                            if(save_statuse===true){
                                                $("#" + i).find("div.ry-active").addClass("ry-de-active");
                                                $("#" + i).find("div.ry-active").removeClass("ry-active");
                                                $("#" + i).find("div:eq(" + n + ")").addClass("ry-active");
                                            }else{

                                                $("#" + i).find("div:eq(" + wr + ")").addClass("ry-de-active");
                                                $("#" + i).find("div:eq(" + n + ")").addClass("ry-active");
                                            }
                                        }
                                    }
                                }
                            }
///-------------------------------inja----------------------------------------------------------
                            dros_seprate_name =<?php echo(json_encode($dros_seprate_name)) ?>;
                            if (dros_seprate_name != null) {
                                for (var j = 0; j < dros_seprate_name.length; j++) {
                                    name_dars[j] = dros_seprate_name[j][0];
                                    var start = dros_seprate_name[j][1];
                                    var end = dros_seprate_name[j][2];
                                    var correct = 0;
                                    var wrong = 0;
                                    var white = 0;
                                    for (var k = start; k <= end; k++) {
                                        var num = end - start + 1;
                                        if (k !== 0) {
                                            if (user_gozineha[k] === 0) {
                                                white++;
                                            } else {
                                                if (user_gozineha[k] === key[k]) {
                                                    correct++;
                                                } else {
                                                    wrong++;
                                                }
                                            }
                                        }
                                    }
                                    darsad_dars[j] = darsadgir(correct, wrong, num);
                                }
                                for (var jj = 0; jj < dros_seprate_name.length; jj++) {
                                    $("#dros_darsad").append('<p class="text-right" id="darsad_dars'+jj+'"><span class="reedd">%</span> <span >:' + name_dars[jj] + '</span> <span class="reedd">' + darsad_dars[jj].toFixed(2) + '</span> </p><hr>');
                                }
                                if(save_statuse===true){
                                    setCookie('exam_id_'+exam_id,exam_id,365);
                                    setCookie('user_gozineha_'+exam_id,JSON.stringify(user_gozineha),365);
                                    setCookie('name_dars_'+exam_id,name_dars,365);
                                    setCookie('darsad_dars_'+exam_id,darsad_dars,365);
                                }
                            }
                            // console.log("sahih" + sahih);
                            // console.log("nadorost" + nadorost);
                            // console.log("bedonepasokh" + bedonepasokh);
                            nemoodar[0]["value"] = sahih;
                            nemoodar[1]["value"] = nadorost;
                            nemoodar[2]["value"] = bedonepasokh;
                            new Chart(works).Pie(nemoodar);
                            $("#correct").html(sahih + ":");
                            $("#wrong").html(nadorost + ":");
                            $("#noanswer").html(bedonepasokh + ":");
                            darsad_kolii = (((sahih * 3) - nadorost) / (3 * question_numbers)) * 100;
                            $("#ry-darsad").html("%" + "درصد کل شما:" + darsad_kolii.toFixed(2));
                            $("#countdown360_countdown").slideUp("fast", "swing");
                            $("#answer-show").slideDown("fast", "swing");
                            $("#convasecal").slideDown("fast", "swing");
                            if(save_statuse===true){
                                save_darsadha();
                                if (dros_seprate_name!=null){
                                    var r = confirm("آیا میخواهید کارنامه خود را مشاهده نمایید؟");
                                    if(r === true){
                                        location.reload();
                                    }
                                }
                            }
                        }
                    });
                }
                function setCookie(cname, cvalue, exdays) {
                    var d = new Date();
                    d.setTime(d.getTime() + (exdays*24*60*60*1000));
                    var expires = "expires="+ d.toUTCString();
                    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }
                function getCookie(cname) {
                    var name = cname + "=";
                    var decodedCookie = decodeURIComponent(document.cookie);
                    var ca = decodedCookie.split(';');
                    for(var i = 0; i <ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                    return "";
                }
                function read_rotbeha() {
                    $.ajax({
                        type: 'POST',
                        url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                        data: {
                            action: 'read_darsadha',
                            post_id: <?php echo $post_id?>,
                            user_id_rand:user_id_rand

                        },
                        beforeSend: function () {

                        },
                        success: function (res) {
                            all_sherkatkonandehan=JSON.parse(res);
                            var alllll=all_sherkatkonandehan.length.toString();

                            for(var fff=0;fff<darsad_dars.length;fff++){
                                var rotbe=cal_rotbe(fff);
                                var rotbe_kol=cal_rotbe_final();
                                $("#darsad_dars"+fff).append('<p class="text-right"><span >:رتبه</span> <span dir="rtl" class="reedd">' + rotbe + '</span>  </p>');
                            }
                            $("#ry-darsad").append('<p dir="rtl" class="text-center ry-rrrrr">' + rotbe_kol + '  </p>')

                        }
                    });
                }
                function cal_rotbe_final(){
                    var all_dars_darsadha=[];
                    for(var i=0;i<all_sherkatkonandehan.length;i++){
                        all_dars_darsadha[i]=parseFloat(all_sherkatkonandehan[i].darsad_kolii);
                    }
                    all_dars_darsadha=all_dars_darsadha.sort((a, b) => b - a);
                    var user_rotbe_dars=all_dars_darsadha.indexOf(darsad_kolii)+1;
                    var ret= "رتبه کل:" + user_rotbe_dars.toString()+" از "+(all_sherkatkonandehan.length+1).toString();
                    return  ret;
                }
                function cal_rotbe(dars){
                    var all_dars_darsadha=[];
                    for(var i=0;i<all_sherkatkonandehan.length;i++){
                        all_dars_darsadha[i]=parseFloat(all_sherkatkonandehan[i].darsad[dars]);
                    }
                    all_dars_darsadha=all_dars_darsadha.sort((a, b) => b - a);
                    var user_rotbe_dars=all_dars_darsadha.indexOf(darsad_dars[dars])+1;
                    var ret=user_rotbe_dars.toString()+" از "+(all_sherkatkonandehan.length+1).toString();
                    return  ret;
                }
                function cal_rotbe_final_test(){
                    var all_dars_darsadha=[];
                    for(var i=0;i<all_sherkatkonandehan.length;i++){
                        all_dars_darsadha[i]=parseFloat(all_sherkatkonandehan[i].darsad_kolii);
                    }
                    all_dars_darsadha=all_dars_darsadha.sort((a, b) => b - a);
                    var user_rotbe_dars=all_dars_darsadha.indexOf(darsad_kolii)+1;
                    return  all_dars_darsadha;
                }

                function all_rotbe(dars){
                    var all_dars_darsadha=[];
                    for(var i=0;i<all_sherkatkonandehan.length;i++){
                        all_dars_darsadha[i]=parseFloat(all_sherkatkonandehan[i].darsad[dars]);
                    }
                    all_dars_darsadha=all_dars_darsadha.sort((a, b) => b - a);

                    return all_dars_darsadha;
                }
                function save_darsadha() {
                    $.ajax({
                        type: 'POST',
                        url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                        data: {
                            action: 'save_darsadha',
                            post_id: <?php echo $post_id?>,
                            darsad:darsad_dars,
                            name:name_dars,
                            darsad_kolii:darsad_kolii,
                            user_id_rand:user_id_rand

                        },
                        beforeSend: function () {

                        },
                        success: function (res) {

                        }
                    });
                }
                function darsadgir(sahih, nadorost, question_numbers) {
                    return (((sahih * 3) - nadorost) / (3 * question_numbers)) * 100;
                }
            </script>
        </div>
        <div class="d-none" id="pasokh_html">

            <?php
            if ($image_tedad_pasokh = get_post_meta($post_id, 'image_tedad_pasokh', true)) {
                for ($i = 1; $i <= $image_tedad_pasokh; $i++) {
                    ?>
                    <img class="ry-img-full"
                         src="<?php bloginfo('url') ?>/<?php echo $image_address_pasokh ?>/picpasokh/<?php echo $image_name_pasokh . $i ?>.jpg"
                         alt="<?php the_title() ?>">
                <?php }
            } ?>
        </div>
        <script>
            var status = "soal";
            var htmlsoal = $("#exam_question").html();
            var htmlpasokh = $("#pasokh_html").html();
            $("#answer-show").on("click", function () {

                if (exam_finish === "ok") {
                    if (status === "soal") {
                        $("#exam_question").attr("data", "<?php bloginfo('url')?>/<?php echo $pasokh?>#view=FitH");
                        $("#answer-show").html('مشاهده سوال<i class="fa fa-angle-down"></i>');
                        $("#exam_question").html(htmlpasokh);
                        status = "pasokh";
                    } else {
                        status = "soal";
                        $("#exam_question").attr("data", "<?php bloginfo('url')?>/<?php echo $file_address?>#view=FitH");
                        $("#answer-show").html('مشاهده پاسخنامه<i class="fa fa-angle-down"></i>');
                        $("#exam_question").html(htmlsoal);
                    }

                }
            });
        </script>
        <div class="clear"></div>
    </div>
    <div class="blure"></div>
    <div class="mobile-add-gozineh">اعمال گزینه
        <i class="fa fa-pencil"></i>
    </div>
    <div class="btn-close">
        <i class="fa fa-times"></i>
    </div>
    <script>
        $(".mobile-add-gozineh").on("click", function () {
            $(".ry-answers").slideDown();
            $(".blure").css("display", "block");
            $(".btn-close").css("display", "block");
        });
    </script>
    <script>
        $(".btn-close").on("click", function () {
            $(".ry-answers").slideUp("fast", "swing");
            $(".blure").css("display", "none");
            $(".btn-close").css("display", "none");
        })
    </script>
<?php include("footer.php") ?>