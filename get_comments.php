<?php
if (isset($_POST['numItem']) && isset($_POST['t_p'])) {
    include('configdb.php');
    $sql = "SELECT option_value as value FROM `wp_options` WHERE option_name='commentStatus';";
    $result = $conn->query($sql);
    $row=$result->fetch_all(MYSQLI_ASSOC);
    if($row[0]['value']=="ok"){
        $teache_live_page_id = $_POST['t_p'];
        $numItem=$_POST['numItem'];
        $numItem=0;
        $sql = "SELECT * FROM `chat` ORDER BY `chat`.`id` DESC LIMIT 150";
        $result = $conn->query($sql);
        $j = 0;
        $row=array();
        if ($result->num_rows > 0) {
            $row = $result->fetch_all(MYSQLI_ASSOC);

        }
        $conn->close();
        $new_cooments = json_encode($row);

    }else{
        $new_cooments = json_encode([]);
    }

    echo($new_cooments);

}
?>