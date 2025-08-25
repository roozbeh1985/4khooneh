<?php
$response = array();
$response['status'] = false;
$response['msg'] = 'مشکلی پیش آمده';
include('configdb.php');
if (isset($_POST['action']) && isset($_POST['user_id'])) {
    $sql = "INSERT INTO `chat` (`id`, `user_id`, `t_p`, `user_comment`, `kind`, `logo_src`, `user_names`, `time`, `action`) VALUES (NULL, '{$_POST["user_id"]}', '{$_POST["t_p"]}', '{$_POST["user_comment"]}', '{$_POST["kind"]}', '{$_POST["logo_src"]}', '{$_POST["user_names"]}', '{$_POST["time"]}', '{$_POST["action"]}');";
    $result = $conn->query($sql);
    $response['status'] = true;
    $response['msg'] = 'همه چیز صحیح است.';
    $conn->close();
}
if(isset($_POST['clearComment'])){
    $sql="delete from chat;";
    $result = $conn->query($sql);
    $response['status'] = true;
    $response['msg'] = 'کامنت ها پاک شد';
}
if(isset($_POST['disableComment'])){
    $sql="UPDATE `wp_options` SET `option_value` = 'no' WHERE `wp_options`.`option_name` = 'commentStatus';";
    $result = $conn->query($sql);
    $response['status'] = true;
    $response['msg'] = 'همه چیز صحیح است.';
    $conn->close();
}
if(isset($_POST['enableComment'])){
    $sql="UPDATE `wp_options` SET `option_value` = 'ok' WHERE `wp_options`.`option_name` = 'commentStatus';";
    $result = $conn->query($sql);
    $response['status'] = true;
    $response['msg'] = 'همه چیز صحیح است.';
    $conn->close();
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response)
?>