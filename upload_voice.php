<?php
if(isset($_FILES["audio_data"])){
//    print_r($_FILES);
    $fileName = $_POST['name'].".wav";
    $direcory_ostad = $_POST["addr"];
    $uploadDirectory = '../../../'.$direcory_ostad.'/'. $fileName;
    if (!move_uploaded_file($_FILES["audio_data"]["tmp_name"], $uploadDirectory)) {
        echo("Couldn't upload video !");
    }
}else{
    echo "No file uploaded";
}
?>