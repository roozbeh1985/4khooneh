<?php
if(isset($_FILES["audiovideo"])){ // save audio and video
    $fileName = $_POST["name"].".webm";
    $uploadDirectory = './uploads/'. $fileName;
    if (!move_uploaded_file($_FILES["audiovideo"]["tmp_name"], $uploadDirectory)) {
        echo("Couldn't upload video !");
    }
    else{
        echo("File Moved");
    }
}
elseif(isset($_FILES["audio"])){ // save audio only
    $fileName = "myaudio.webm";
    $uploadDirectory = './'. $fileName;
    if (!move_uploaded_file($_FILES["audio"]["tmp_name"], $uploadDirectory)) {
        echo("Couldn't upload video !");
    }
    else{
        echo("File Moved");
    }
}
elseif(isset($_FILES["video"])){ // save video only
    $fileName = "myvideo.webm";
    $uploadDirectory = './uploads/'. $fileName;
    if (!move_uploaded_file($_FILES["video"]["tmp_name"], $uploadDirectory)) {
        echo("Couldn't upload video !");
    }
    else{
        echo("File Moved");
    }
}
//elseif(isset($_FILES["stream"])){ // save streamming
//    $fileName = $_POST["name"];
//    $uploadDirectory = './uploads/'. $fileName;
//    if (!move_uploaded_file($_FILES["stream"]["tmp_name"], $uploadDirectory)) {
//        echo("Couldn't upload video !");
//    }
//    else{
//        echo("Success");
//    }
//}
//elseif(isset($_FILES["stream"])){ // save streamming
//    $fileName = $_POST["name"];
//    $direcory_ostad = $_POST["addr"];
//    $uploadDirectory = '../../../'.$direcory_ostad. '/roozbeh.mp4';
//    if(!file_exists($uploadDirectory)){
//        if (!move_uploaded_file($_FILES["stream"]["tmp_name"], $uploadDirectory)) {
//            echo("Couldn't upload video !");
//        }
//        else{
//            echo("Success");
//        }
//    }
//    else{
//        $file1 = fopen($uploadDirectory, 'a+');
//        $file2 = file_get_contents($_FILES["stream"]["tmp_name"]);
//        fwrite($file1, $file2);
//        fclose ($file1);
//
//
//    }
//
//}
elseif(isset($_FILES["stream"])){ // save streamming
    $vid_url = "rtmp://185.55.227.50/test";

    $opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en\r\n" .
                "Cookie: foo=bar\r\n"
        )
    );

    $context = stream_context_create($_FILES["stream"]);

    /* Sends an http request to www.example.com
       with additional headers shown above */
    $fp = fopen($vid_url, 'r', false, $context);
    fpassthru($fp);
    fclose($fp);
}


else{
    echo "No file uploaded";
}

?>