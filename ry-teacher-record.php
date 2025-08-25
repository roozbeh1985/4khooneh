<?php
header("Access-Control-Allow-Origin: *");
/*
Template Name: teacher live
*/
include("header.php");
setPostViews(get_the_ID());
$kind = get_user_meta($user_id, "user_kind", 0)[0];

if (current_user_can('administrator') || $kind != "teacher") {

} else if (!is_user_logged_in() || $kind != "دانش آموز") {
    wp_redirect(home_url());
    exit;

}
global $post;
$user_id = get_current_user_id();
?>
    <div>
        <div>
            <div class="ck-page-container ">
                <div class="ck-page-show d-none">
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
                <div class="ck-page-content ry-live-vv">
                    <div class="row" dir="rtl">

                        <div class="container">
                            <article class="col-lg-12">
                                <div class="col-lg-9 float-right ry-record-teacher">
                                    <link href="<?php bloginfo('template_url') ?>/recordjs/css/video-js.min.css"
                                          rel="stylesheet">
                                    <link href="<?php bloginfo('template_url') ?>/recordjs/css/videojs.record.min.css"
                                          rel="stylesheet">

                                    <video id="myVideo" class="video-js vjs-default-skin"></video>

                                    <!-- Load video.js -->
                                    <script src="<?php bloginfo('template_url') ?>/recordjs/js/video.min.js"></script>


                                    <!-- Load RecordRTC core and adapter -->
                                    <script src="<?php bloginfo('template_url') ?>/recordjs/js/RecordRTC.js"></script>
                                    <script src="<?php bloginfo('template_url') ?>/recordjs/js/adapter.js"></script>
                                    <!-- Load VideoJS Record Extension -->
                                    <script src="<?php bloginfo('template_url') ?>/recordjs/js/videojs.record.min.js"></script>
                                    <input class="d-none" id="ry-root"
                                           value="<?php echo get_post_meta($post->ID, "آدرس ذخیره سازی", true) ?>">
                                    <script>
                                        var videoMaxLengthInSeconds = 3600;
                                        var address = $("#ry-root").val();
                                        var player = videojs("myVideo", {
                                            controls: true,
                                            width: 720,
                                            height: 480,
                                            fluid: false,
                                            plugins: {
                                                record: {
                                                    audio: true,
                                                    video: true,
                                                    maxLength: videoMaxLengthInSeconds,
                                                    debug: true,
                                                    timeSlice: 3000,
                                                    videoMimeType: "video/webm;codecs=H264"
                                                }
                                            }
                                        }, function () {
                                            // print version information at startup
                                            videojs.log(
                                                'Using video.js', videojs.VERSION,
                                                'with videojs-record', videojs.getPluginVersion('record'),
                                                'and recordrtc', RecordRTC.version
                                            );
                                        });
                                        // error handling for getUserMedia
                                        player.on('deviceError', function () {
                                            console.log('device error:', player.deviceErrorCode);
                                        });

                                        player.on('error', function (error) {
                                            console.log('error:', error);
                                        });

                                        player.on('startRecord', function () {
                                            console.log('started recording! Do whatever you need to');
                                        });
                                        player.on('progressRecord', function () {
                                            // console.log(player.recordedData);
                                        });


                                        player.on('finishRecord', function () {
                                            // the blob object contains the recorded data that
                                            // can be downloaded by the user, stored on server etc.
                                            console.log('finished recording: ', player.recordedData);
                                            var formData = new FormData();
                                            formData.append('video', player.recordedData);
                                            // xhr('./upload-video.php', formData, function (fName) {
                                            //     console.log("Video succesfully uploaded !");
                                            // });
                                            function xhr(url, data, callback) {
                                                var request = new XMLHttpRequest();
                                                request.onreadystatechange = function () {
                                                    if (request.readyState === 4 && request.status === 200) {
                                                        callback(location.href + request.responseText);
                                                    }
                                                };
                                                request.open('POST', url);
                                                request.send(data);
                                            }
                                        });

                                        var segmentNumber = 0;
                                        var ress;
                                        var data_send;
                                        player.on('timestamp', function () {
                                            data = player.recordedData;
                                            console.log('array of blobs: ', player.recordedData);
                                            if (player.recordedData && player.recordedData.length > 0) {
                                                var binaryData = player.recordedData[player.recordedData.length - 1];
                                                data_send=binaryData;
                                                segmentNumber++;
                                                var formData = new FormData();
                                                formData.append('stream', binaryData);
                                                //xhr('<?php //bloginfo('template_url') ?>///upload-video.php', formData, function (fName) {
                                                //    console.log("Video succesfully uploaded !", fName);
                                                //});
                                                xhr('rtmp://185.55.227.50/roozbeh', binaryData, function (fName) {
                                                    console.log("Video succesfully uploaded !", fName);
                                                });

                                                function xhr(url, data, callback) {
                                                    var request = new XMLHttpRequest();
                                                    request.onreadystatechange = function () {
                                                        if (request.readyState == 4 && request.status == 200) {
                                                            callback(location.href + request.responseText);
                                                        }
                                                    };
                                                    request.open('GET', url);
                                                    request.send(data);
                                                }
                                            }
                                        });

                                    </script>
                                    <select id="changetoscreen" class="form-control">
                                        <option value="1"><i class="fa fa-camera">حالب ضبط دوربین</option>
                                        <option value="2"><i class="fa fa-desktop">حالب ضبط دوربین حالت اشتراک دسکتاپ
                                        </option>
                                    </select>
                                    <script>
                                        $("#changetoscreen").on("change", function () {
                                            if ($(this).val() === 1) {
                                                player.record().recordVideo = true;
                                                player.record().recordScreen = false;
                                            }
                                            else {
                                                player.record().recordVideo = false;
                                                player.record().recordScreen = true
                                            }
                                        });
                                    </script>
                                </div>

                                <div class="col-lg-3 ry-no-paa  float-right">
                                    <div class="col-12 ry-no-paa ry-commenting-container">
                                        <div class="col-lg-12 ry-chat-std">
                                            <div class="col-10 float-right ry-inp">
                                                <input class="form-control" id="std-com" type="text"
                                                       placeholder="متن خود را وارد نمایید">
                                            </div>

                                            <div class="col-2 float-right ry-send-btn">
                                                <input class="d-none" id="ry-root"
                                                       value="<?php echo get_post_meta($post->ID, "آدرس ذخیره سازی", true) ?>">
                                                <i id="ry-microphone" class="fa fa-microphone"></i>
                                                <script src="<?php bloginfo('template_url') ?>/uploadaudio/recorder.js"></script>
                                                <script>
                                                    URL = window.URL || window.webkitURL;
                                                    var gumStream; 						//stream from getUserMedia()
                                                    var rec; 							//Recorder.js object
                                                    var input; 							//MediaStreamAudioSourceNode we'll be recording
                                                    var stop_btn_status = true;
                                                    var address = $("#ry-root").val();
                                                    var AudioContext = window.AudioContext || window.webkitAudioContext;
                                                    var audioContext;//audio context to help us record
                                                    var counter_voice = 1;
                                                    var ry_rec_audio = document.getElementById("ry-microphone");
                                                    ry_rec_audio.addEventListener("click", sts_check);

                                                    function sts_check() {
                                                        if (stop_btn_status) {
                                                            startRecording();
                                                            stop_btn_status = false;
                                                        }
                                                        else {
                                                            stopRecording();
                                                            stop_btn_status = true;
                                                        }
                                                    }

                                                    function startRecording() {
                                                        console.log("recordButton clicked");
                                                        var constraints = {audio: true, video: false};
                                                        navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
                                                            console.log("getUserMedia() success, stream created, initializing Recorder.js ...");
                                                            audioContext = new AudioContext();
                                                            gumStream = stream;
                                                            input = audioContext.createMediaStreamSource(stream);
                                                            rec = new Recorder(input, {numChannels: 1});
                                                            rec.record();
                                                            console.log("Recording started");

                                                        }).catch(function (err) {
                                                        });
                                                    }

                                                    function pauseRecording() {
                                                        console.log("pauseButton clicked rec.recording=", rec.recording);
                                                        if (rec.recording) {
                                                            rec.stop();
                                                        } else {
                                                            rec.record();
                                                        }
                                                    }

                                                    function stopRecording() {
                                                        console.log("stopButton clicked");
                                                        rec.stop();
                                                        gumStream.getAudioTracks()[0].stop();

                                                        rec.exportWAV(createDownloadLink);
                                                    }

                                                    function createDownloadLink(blob) {
                                                        var url = URL.createObjectURL(blob);
                                                        var au = document.createElement('audio');
                                                        var li = document.createElement('li');
                                                        var link = document.createElement('a');
                                                        var filename = new Date().toISOString();
                                                        //add controls to the <audio> element
                                                        au.controls = true;
                                                        au.src = url;
                                                        link.href = url;
                                                        link.download = filename + ".wav"; //download forces the browser to donwload the file using the  filename
                                                        link.innerHTML = "Save to disk";
                                                        var upload = document.createElement('a');
                                                        upload.href = "#";
                                                        upload.innerHTML = "Upload";
                                                        upload_video();

                                                        function upload_video() {
                                                            counter_voice = Math.floor(Math.random() * 100000) + 1;
                                                            var namesss = Math.floor(Math.random() * 6) + 1;
                                                            var xhr = new XMLHttpRequest();
                                                            xhr.onload = function (e) {
                                                                if (this.readyState === 4) {
                                                                    console.log("Server returned: ", e.target.responseText);
                                                                }
                                                            };
                                                            var fd = new FormData();
                                                            fd.append("audio_data", blob, filename);
                                                            fd.append("name", "voice" + counter_voice);
                                                            fd.append('addr', address);
                                                            xhr.open("POST", "<?php bloginfo('template_url') ?>/upload_voice.php", true);
                                                            xhr.send(fd);
                                                        }

                                                        update_voice();
                                                    }

                                                    function update_voice() {
                                                        var date = new Date;
                                                        var hour = date.getHours();
                                                        var time = date.getMinutes();
                                                        if (true) {
                                                            var logo_src = $("#logo_src").val();
                                                            var user_names = $("#user_names").val();
                                                            $("#std-com").val('');
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                                                                data: {
                                                                    action: 'comment_student',
                                                                    user_id: <?php echo $user_id; ?>,
                                                                    t_p: <?php echo $post->ID?>,
                                                                    user_comment: address + '/' + "voice" + counter_voice + ".wav",
                                                                    kind: "voice",
                                                                    logo_src: logo_src,
                                                                    user_names: user_names,
                                                                    time: hour + ":" + time

                                                                },
                                                                beforeSend: function () {
                                                                },
                                                                success: function (res) {
                                                                }
                                                            })
                                                        }
                                                    }
                                                </script>
                                            </div>
                                            <div class="col-2 float-right ry-send-btn d-none">
                                                <i id="ry-add-com" class="fa fa-paper-plane"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ry-comments ry-no-paa">
                                        <?php
                                        $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                        if (get_user_meta($user_id, 'logo', true)) {
                                            $logo_src = get_home_url() . "/" . get_user_meta($user_id, 'logo', true);
                                        } else {
                                            $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                        }
                                        $nic_name = "کاربر";
                                        if (get_user_meta($user_id, 'nickname', true)) {
                                            $nic_name = get_user_meta($user_id, 'nickname', true);
                                        }
                                        ?>
                                        <input id="logo_src" class="d-none" value="<?php echo $logo_src ?>">
                                        <input id="user_names" class="d-none" value="<?php echo $nic_name ?>">
                                        <input id="user_idsss" class="d-none" value="<?php echo $user_id ?>">
                                        <script>
                                            $(document).ready(function () {
                                                im_online();
                                            });

                                            //setInterval(im_online, 4000000);
                                            function im_online() {
                                                var logo_src = $("#logo_src").val();
                                                var user_names = $("#user_names").val();
                                                var date = new Date;
                                                var hour = date.getHours();
                                                var time = date.getMinutes();
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '<?php bloginfo("template_url") ?>/im_online.php',
                                                    data: {
                                                        action: 'im_online',
                                                        logo_src: logo_src,
                                                        user_id: <?php echo $user_id; ?>,
                                                        user_names: user_names,
                                                        time: hour + ":" + time,
                                                        t_p: <?php echo $post->ID?>
                                                    },
                                                    beforeSend: function () {
                                                    },
                                                    success: function (res) {

                                                    }
                                                })
                                            }
                                        </script>

                                        <?php
                                        if ($comments = get_post_meta($post->ID, 'allchats', true)) {
                                            $comments = unserialize($comments);
                                            $comments = array_reverse($comments);
                                            foreach ($comments as $co) {
                                                if ($co[0] == $user_id) {
                                                    $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                    if (get_user_meta($co[0], 'logo', true)) {
                                                        $logo_src = get_home_url() . "/" . get_user_meta($co[0], 'logo', true);
                                                    } else {
                                                        $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                    }
                                                    ?>

                                                    <div class="ry-chat-container darker ry-no-paa">
                                                        <div class="col-2 float-right ry-no-paa">
                                                            <img src="<?php echo $logo_src ?>" alt="Avatar"
                                                                 class="right ry-c-p-p">
                                                        </div>
                                                        <div class="col-10 float-right ry-no-paa">
                                                            <p class="text-right ry-chater-name"><?php echo $co[5] ?> </p>

                                                            <?php
                                                            if ($co[3] == "txt") {
                                                                ?>
                                                                <p class="ry-no-paa ry-txt-comments"><?php echo $co[1] ?></p>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <audio controls class="ry-r-voice">
                                                                    <source src="<?php bloginfo('url') ?>/<?php echo $co[1] ?>"
                                                                            type="audio/wav">
                                                                </audio>
                                                                <?php
                                                            }
                                                            ?>

                                                            <span class="time-left"><?php echo $co[2] ?></span>
                                                        </div>

                                                    </div>
                                                    <?php
                                                } else {
                                                    $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                    if (get_user_meta($co[0], 'logo', true)) {
                                                        $logo_src = get_home_url() . "/" . get_user_meta($co[0], 'logo', true);
                                                    } else {
                                                        $logo_src = get_home_url() . "/wp-content/uploads/2019/10/user.jpg";
                                                    }
                                                    ?>
                                                    <div class="ry-chat-container ry-no-paa">
                                                        <div class="col-2 float-right ry-no-paa">
                                                            <img src="<?php echo $logo_src ?>" alt="Avatar"
                                                                 class="right ry-c-p-p">
                                                        </div>
                                                        <div class="col-10 float-right ry-no-paa">
                                                            <p class="text-right ry-chater-name"><?php echo $co[5] ?> </p>
                                                            <?php
                                                            if ($co[3] == "txt") {
                                                                ?>
                                                                <p class="ry-no-paa ry-txt-comments"><?php echo $co[1] ?></p>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <audio controls class="ry-r-voice">
                                                                    <source src="<?php bloginfo('url') ?>/<?php echo $co[1] ?>"
                                                                            type="audio/wav">
                                                                </audio>
                                                                <?php
                                                            }
                                                            ?>
                                                            <span class="time-left"><?php echo $co[2] ?></span>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                        <script>
                                            var alls = {};
                                            var resss;
                                            var userss_id;
                                            userss_id = $('#user_idsss').val();
                                            setInterval(function () {
                                                var numItems = $(".ry-chat-container").length;
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '<?php bloginfo("template_url") ?>/get_comments.php',
                                                    data: {
                                                        action: 'comment_student_get',
                                                        t_p: <?php echo $post->ID?>,
                                                        numItem: numItems,
                                                    },
                                                    beforeSend: function () {
                                                    },
                                                    success: function (res) {
                                                        res = JSON.parse(res);
                                                        resss = res;
                                                        var conter = 0;
                                                        while (res[conter]) {
                                                            if (res[conter][0] === userss_id) {
                                                                if (res[conter][3] === "txt") {
                                                                    $(".ry-comments").prepend("<div class='ry-chat-container darker ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><p class='ry-no-paa ry-txt-comments'>" + res[conter][1] + "</p><span class='time-left'>" + res[conter][2] + "</span></div></div>");
                                                                } else {
                                                                    $(".ry-comments").prepend("<div class='ry-chat-container darker ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><audio controls class='ry-r-voice'><source src='https://4khooneh.org/" + res[conter][1] + "' type='audio/wav'></audio><span class='time-left'>" + res[conter][2] + "</span></div></div>")
                                                                }
                                                            } else {
                                                                if (res[conter][3] === "txt") {
                                                                    $(".ry-comments").prepend("<div class='ry-chat-container ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><p class='ry-no-paa ry-txt-comments'>" + res[conter][1] + "</p><span class='time-left'>" + res[conter][2] + "</span></div></div>");
                                                                }
                                                                else {
                                                                    $(".ry-comments").prepend("<div class='ry-chat-container ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + res[conter][4] + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + res[conter][5] + " </p><audio controls class='ry-r-voice'><source src='https://4khooneh.org/" + res[conter][1] + "' type='audio/wav'></audio><span class='time-left'>" + res[conter][2] + "</span></div></div>");
                                                                }
                                                            }
                                                            conter++;
                                                        }
                                                    }
                                                })
                                            }, 3000);
                                        </script>
                                    </div>
                                    <script>
                                        $(document).on('keypress', function (e) {
                                            if (e.which === 13) {
                                                send_mess();
                                            }
                                        });
                                        $("#ry-add-com").on('click', send_mess);

                                        function send_mess() {
                                            var coment = $("#std-com").val();
                                            var date = new Date;
                                            var hour = date.getHours();
                                            var time = date.getMinutes();
                                            if (coment) {
                                                var logo_src = $("#logo_src").val();
                                                var user_names = $("#user_names").val();
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                                                    data: {
                                                        action: 'comment_student',
                                                        user_id: <?php echo $user_id; ?>,
                                                        t_p: <?php echo $post->ID?>,
                                                        user_comment: coment,
                                                        kind: "txt",
                                                        logo_src: logo_src,
                                                        user_names: user_names,
                                                        time: hour + ":" + time

                                                    },
                                                    beforeSend: function () {
                                                        $("#std-com").val('');
                                                        $(".ry-comments").prepend("<div class='ry-chat-container darker ry-no-paa'><div class='col-2 float-right ry-no-paa'><img src='" + logo_src + "' alt='Avatar' class='right ry-c-p-p'></div><div class='col-10 float-right ry-no-paa'><p class='text-right ry-chater-name'>" + user_names + " </p><p class='ry-no-paa ry-txt-comments'>" + coment + "</p><span class='time-left'>" + hour + ":" + time + "</span></div></div>");
                                                    },
                                                    success: function (res) {
                                                    }
                                                })
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="clear"></div>
                                <div class="ck-all-page-content">
                                    <?php
                                    $my_postid = $_REQUEST['page_id'];
                                    $content_post = get_post($my_postid);
                                    $content = $content_post->post_content;
                                    echo do_shortcode($content)
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
                                <div class="ck-comments">
                                </div>
                            </article>
                        </div>
                        <div class="container">
                            <div id="col-12" class="ck-page-right-menu-img std-att">
                                <p class="text-right ry-hozar"><span>حاضرین در کلاس:</span><span
                                            id="ry-teddad"></span>
                                </p>
                                <script>
                                    setInterval(hozar, 2000);

                                    function hozar() {
                                        var numItems_std = $(".ry-s-c").length;
                                        $("#ry-teddad").html(numItems_std + " نفر");
                                    }
                                </script>
                                <?php
                                if ($all_user = get_post_meta($post->ID, 'all_users', true)) {
                                    $all_user = unserialize($all_user);
                                    foreach ($all_user as $us) {
                                        ?>
                                        <div class="col-lg-1 col-4 float-right ry-s-c text-center">
                                            <img alt="" class="ry-img-show-onlone" src="<?php echo $us[2] ?>">
                                            <p class="text-center ry-name-std"><?php echo $us[3] ?></p>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <script>
                                    setInterval(get_student_new_attend_class, 30000);

                                    function get_student_new_attend_class() {
                                        var numItems_std = $(".ry-s-c").length;
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php bloginfo("template_url") ?>/get_student_new_attend_class.php',
                                            data: {
                                                action: 'get_student_new_attend_class',
                                                t_p: <?php echo $post->ID?>,
                                                numItems_std: numItems_std,
                                            },
                                            beforeSend: function () {
                                            },
                                            success: function (res) {
                                                res = JSON.parse(res);
                                                var counter = 0;
                                                while (res[counter]) {
                                                    $(".std-att").append("<div class='col-lg-1 col-4 float-right ry-s-c text-center'><img alt='" + res[counter][3] + "' class='ry-img-show-onlone' src='" + res[counter][2] + "'><p class='text-center ry-name-std'>" + res[counter][3] + "</p></div>")
                                                    counter++;
                                                }
                                            }
                                        })
                                    }
                                </script>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-danger btn-hozorgheyab" onclick="hozor_gheyab()">حضور و غیاب
                                    مجدد
                                </button>
                                <script>
                                    function hozor_gheyab() {
                                        $.ajax({

                                            type: 'POST',
                                            url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                                            data: {
                                                action: 'hozorgheyab',
                                                t_p: <?php echo $post->ID?>,
                                            },
                                            beforeSend: function () {
                                                $(".ry-s-c").remove();
                                            },
                                            success: function (res) {
                                            }
                                        })
                                    }
                                </script>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="clear"></div>
                        <?php include("ck-footer-pages.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>