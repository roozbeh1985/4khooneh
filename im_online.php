<?php
if( isset($_POST['t_p'])){
    $servername = "localhost";
    $username = "admin_4khooneokroozbeh";
    $password = "bedebala123!@#";
    $dbname = "admin_4khooneokroozbeh";

    $all_user_online = array();
    $user_online=array();
    $user_id = $_POST['user_id'];
    $teache_live_page_id = $_POST['t_p'];
    $logo_src=$_POST['logo_src'];
    $user_names=$_POST['user_names'];
    $time=$_POST['time'];
    $user_online[0]=$user_id;
    $user_online[1]=$time;
    $user_online[2]=$logo_src;
    $user_online[3]=$user_names;
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT meta_value FROM `qecna_postmeta` WHERE meta_key='all_users' AND post_id='".$teache_live_page_id."'";
    $result = $conn->query($sql);
    $j=0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $all_user_online = $row['meta_value'];
        $all_user_online=unserialize($all_user_online);
        if (!in_array_r($user_names, $all_user_online)) {
            $i=(int) count($all_user_online);
            $i=$i--;
            $all_user_online[$i]=$user_online;
            $all_user_online=serialize($all_user_online);
            $sql="UPDATE `qecna_postmeta` SET `meta_value` = '".$all_user_online."' WHERE `qecna_postmeta`.`post_id` = '".$teache_live_page_id."' AND `qecna_postmeta`.`meta_key` = 'all_users'";
            $result = $conn->query($sql);
        }
    }
    else{
        $all_user_online[0]=$user_online;
        $all_user_online=serialize($all_user_online);
        $sql="INSERT INTO `qecna_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES (NULL, '".$teache_live_page_id."', 'all_users', '".$all_user_online."');";
        $result = $conn->query($sql);
    }
    $conn->close();
}
function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if($item[0]==$needle  || $item[1]==$needle || $item[2]==$needle || $item[3]==$needle){
            return true;
        }
    }
    return false;
}
?>