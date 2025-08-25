<?php
/*
Template Name: verifyKif
*/
get_header();
include('lib/nusoap.php');
require_once('lib/nusoap.php');
$RefNum = '';
$transaction_id = '';
$terminalId = '10963258';
$CardHolderPan1 = filter_input(INPUT_POST, 'SecurePan');
$RefNum = filter_input(INPUT_POST, 'RefNum');
$ResNum = filter_input(INPUT_POST, 'ResNum');

$transaction_id = filter_input(INPUT_POST, 'TRACENO');
$State = filter_input(INPUT_POST, 'State');
try {
    $soapclient = new SoapClient('https://acquirer.samanepay.com/payments/referencepayment.asmx?WSDL');
} catch (SoapFault $e) {
    $err = $e->faultstring;
}
$reverse = 0;
if (strtolower($State) == "ok") {
    $rev_to_u = 0;
    $res = $soapclient->VerifyTransaction($RefNum, $terminalId);
    if ($res <= 0) {
        $reverse = 1;
        $status_b = 'notequal';
        $fault = $res;
    } else {
        $reverse = 0;
        $status_b = 'completed';
    }
} else {
    $status_b = 'cancelled';
    $fault = $State;
}
if ($reverse == 1) {
    $rev_to_u = 1;
    $status_b = 'notequal';
    $soapclient = new SoapClient('https://acquirer.samanepay.com/payments/referencepayment.asmx?WSDL');
    $res = $soapclient->reverseTransaction($State, $terminalId, $userName, $userPassword);
    if ($res == 1) {
        $rev_to_u = 0;
    } else {
        $rev_to_u = 1;
        $fault = $res;
    }
}
if ($status_b == 'completed') {
    $itemm = explode('-', $ResNum);
    $waletCharge = 0;
    if ($wallet = get_user_meta($itemm[0], '_current_woo_wallet_balance', true))
        $waletCharge = $wallet;
    $waletCharge += ($itemm[1] / 10);
    woo_wallet()->wallet->credit( $itemm[0], ($itemm[1] / 10), __( 'Wallet refund #', 'woo-wallet' ) . ($itemm[1] / 10) )
    ?>

    <div class="mt-5 pt-5">
        <div class="mt-5 d-flex flex-column justify-content-center">
            <h1 class="text-center h3 mt-5">کیف پول شما با موفقیت شارژ شد</h1>
            <div class="p-2 text-center mt-5  m-auto">
                <div class="bg-success w-51px rounded-circle p-3"><i class="fa fa-check text-white"></i>
                </div>
            </div>
            <p class="text-success text-center mt-2">پرداخت شما با موفقیت انجام شد</p>
            <p class="text-success text-center mt-2"><span>اعتبار شما مبلغ </span><span
                        class="ry-iransans"><?php echo $itemm[1] / 10 ?></span><span> تومان </span><span>شارژ شد</span>
            </p>
            <div class="d-flex justify-content-center p-2 mt-2">
                <a href="<?php bloginfo('url') ?>/پروفایل">
                    <input class="btn btn-success ry-hooyostar-submit" onclick="createList()" value=" مشاهده پروفایل ">
                </a>
            </div>
            <script type="text/javascript">
                alert("شارژ کیف پول باموفقیت انجام شد");
                let url = "https://4khooneh.org";
                url += "/" + "پروفایل";
                setTimeout(() => {
                    window.location.replace(url)
                }, 1000)
            </script>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="mt-5 pt-5">
        <div class="d-flex flex-column mt-5 justify-content-center">
            <h1 class="text-center h3 mt-5">مشکلی در پرداخت شما رخ داده است</h1>
            <div class="p-2 text-center mt-5  m-auto">
                <div class="bg-danger w-51px rounded-circle p-3"><i class="fa fa-info text-white"></i></div>
            </div>
            <p class="text-danger text-center mt-2">پرداخت شما ناموفق بود</p>
            <div class="d-flex justify-content-center p-2 mt-2">
                <a href="<?php bloginfo('url') ?>/پروفایل">
                    <input class="btn ry-hooyostar-submit" onclick="createList()" value=" مشاهده پروفایل ">
                </a>
            </div>
        </div>
    </div>
    <?php
}
get_footer() ?>