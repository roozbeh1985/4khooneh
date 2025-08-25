<?php
/*
Template Name: chargeWalet
*/

$client = new soapclient('https://sep.shaparak.ir/Payments/InitPayment.asmx?WSDL');
$veryfyPage='https://4khooneh.org/verifykif/';
$data=$_GET['udsds'].'-'.$_GET['pri']*10;
if(isset($_GET['veryfyPage'])){
    $veryfyPage='https://4khooneh.org/'.$_GET['veryfyPage'];
}
if(isset($_GET['eventName'])){
    $data.='-'.$_GET['eventName'];
}
$result = $client->RequestToken('10963258',
    $data,
    $_GET['pri']*10
    , '0'
    , '0'
    , '0'
    , '0'
    , '0'
    , '0'
    , 'ResNum1'
    , 'ResNum2'
    , '0'
    , $veryfyPage
);
echo "<form class='d-none' action='https://sep.shaparak.ir/payment.aspx' method='POST' id='roozForm'>
            <input name='token' type='hidden' value='" . $result . "'>
            <input name='RedirectURL' type='hidden' value='https://hooyo.ir/verifykif/'>
            <input class='d-none' name='btn' type='submit' id='send' value='Send'>
      </form>";
echo '<script type="text/javascript">document.getElementById("roozForm").submit()</script>';