<?php
/*
Template Name: kifPool
*/
global $user_ID;
$user_id = get_current_user_id();
$email = get_user_meta($user_id, "billing_email", 0)[0];
if (!is_user_logged_in()) {
    wp_redirect('ثبت-نام');
    exit;
}
include("header.php") ?>
    <input type="text" id="cUId" class="form-control d-none" value="<?php echo get_current_user_id() ?>">
    <input type="text" id="ry-locate" class="form-control d-none" value="<?php echo get_home_url() ?>">

    <script src="<?php bloginfo('template_url') ?>/js/profile.js?t=1.0.0.0021"></script>
    <script type="text/javascript">
        let mprofile=new ProfileAll();
    </script>
    <div>
        <div>

            <div class="ck-page-container ry-proffile">
                <div class="ck-page-content">
                    <div class="row" dir="rtl">
                        <div class="ck-page-rightsidebar">
                            <?php include("sidbar-profile.php") ?>
                        </div>
                        <article class="ck-page-article ry-prof d-flex justify-content-center">
                            <div class="col-lg-6" dir="rtl">
                                <div class="ry-prof-side rounded bg-prof-gray" id="profileHanlingSide"><div class="col-lg-12 text-center pt-4">
                                        <img style="width: 297px;    margin: auto;    border-radius: 40px;margin-bottom: 10px;" src="https://4khooneh.org/wp-content/uploads/2024/10/35.04-scaled.jpg">
                                    </div>
                                    <p class="text-center pt-1 f-14 ry-bolder m-auto">کیف پول من</p><div class="d-flex flex-row mt-4 justify-content-center">
                                        <span class="text-dark f-14 ry-bolder">میزان اعتبار شما:</span>
                                        <span class="px-2 hooyoColor ry-bold"><?php echo woo_wallet()->wallet->get_wallet_balance(get_current_user_id()); ?></span>
                                    </div><div class="mt-4 px-2">
                                        <input type="number" class="text-center form-control ry-iransans" id="priceToCharge" placeholder="مبلغ به تومان">
                                    </div><div class="mt-2 px-2">
                                        <div class=" mt-2 ">
                                            <div class="bgHooyoColor rounded-3 text-white p-2 text-center ry-pointer btn btn-primary mt-2 w-100" id="ryssssl" onclick="mprofile.chargePrice()">پرداخت و افزایش اعتبار</div>
                                        </div>
                                    </div></div>
                            </div>
                        </article>
                        <div class="clear"></div>
                        <?php include("ck-footer-pages.php"); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include("footer.php") ?>