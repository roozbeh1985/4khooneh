<?php

if(isset($_POST['numItems_std'])&& isset($_POST['t_p'])){
    $servername = "localhost";
    $username = "admin_4khooneokroozbeh";
    $password = "bedebala123!@#";
    $dbname = "admin_4khooneokroozbeh";

    $teache_live_page_id = $_POST['t_p'];
    $numItem=$_POST['numItems_std'];
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT meta_value FROM `qecna_postmeta` WHERE meta_key='all_users' AND post_id='".$teache_live_page_id."'";
    $result = $conn->query($sql);
    $j=0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $users = $row['meta_value'];
        $allusers=unserialize($users);
        $new_users=array();
        if($numItem < count($allusers)){
            for ($i = $numItem; $i < count($allusers); $i++) {
                $new_users[$j]=$allusers[$i];
                $j++;
            }
            if(!empty($new_users)){
                $new_users=json_encode($new_users);
                echo($new_users);
            }
        }
    }
    $conn->close();
}

?>