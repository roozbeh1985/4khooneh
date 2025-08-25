<div class="col-lg-12 float-right ry-dashbord-right-sidebar">
    <div class="col-lg-12 ry-d-container">
        <div class="side-header p-t-2 p-r-2 p-l-2">
            <a  href="<?php bloginfo('url') ?>/تغییر-تصویر" class="profilepic-link">
                <?php
                if (get_user_meta($user_id, 'logo', true)) {
                    $logo_src = get_home_url() . "/" . get_user_meta($user_id, 'logo', true);
                } else {
                    $logo_src = get_template_directory_uri() . "/img/";
                }
                ?>
                <img class=" lazy" src="<?php bloginfo('url') ?>/wp-content/uploads/2019/10/user.jpg"
                     data-src="<?php echo $logo_src ?>" width="80"
                     height="80">
                <div class="ry-edit-btn"><i class="fa fa-pen"></i></div>
            </a>
            <div class="datauserside">
                <?php
                $nic_name="کاربر";
                if (get_user_meta($user_id, 'nickname', true)) {
                    $nic_name =get_user_meta($user_id, 'nickname', true);
                }
                global $post;
                $post_title=$post->post_title;
                ?>
                <h3><?php echo $nic_name?></h3>
                <span><span>عضویت :</span><span> <?php echo date_i18n( "M d, Y", strtotime( get_the_author_meta( 'user_registered', $user_id ) ) ); ?></span></span>
                <a href="<?php bloginfo('url') ?>/پروفایل">پروفایل من</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="side-user p-y-1  text-right">
            <ul>
                <li>
                    <a href="<?php bloginfo('url') ?>/پروفایل" class="<?php if($post_title=="پروفایل") echo "active";?>">
                        <i class="fa fa-home"></i>
                        داشبورد
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('url') ?>/شارژ-کیف-پول" class="<?php if($post_title=="شارژ کیف پول") echo "active";?>">
                        <i class="fas fa-money-bill"></i>
                        شارژ کیف پول
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('url') ?>/کلاس-های-آنلاین/" class="<?php if($post_title=="کلاس های موجود") echo "active";?>">
                        <i class="fa fa-chalkboard"></i>
                        دوره های آنلاین قابل شرکت
                    </a>
                </li>

                <li>
                    <a href="<?php bloginfo('url') ?>/کلاس-های-آنلاین/" class="<?php if($post_title=="کلاس های من") echo "active";?>">
                        <i class="fa fa-chalkboard-teacher"></i>
                        کلاس های آنلاین من
                    </a>
                </li>
                <?php if(current_user_can('administrator')) {?>
                <li>
                    <a href="<?php bloginfo('url') ?>/فیلم-های-من" class="<?php if($post_title=="فیلم های من") echo "active";?>">
                        <i class="fa fa-film"></i>
                        فیلم های من
                    </a>
                </li>
                <?php } ?>
                <li>
                    <a href="<?php bloginfo('url') ?>/تغییر-تصویر" class="<?php if($post_title=="تغییر تصویر") echo "active";?>">
                        <i class="fa fa-image"></i>
                        تصویر پروفایل
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('url') ?>/my-account/downloads/" class="<?php if($post_title=="my-account/downloads/") echo "active";?>">
                        <i class="fa fa-download"></i>
                        دانلود های من
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('url') ?>/my-account/orders/" class="<?php if($post_title=="/my-account/orders/") echo "active";?>">
                        <i class="fa fa-shopping-basket"></i>
                        سفارش های من
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('url') ?>/my-account/edit-account/" class="<?php if($post_title=="/my-account/edit-account/") echo "active";?>">
                        <i class="fa fa-pen"></i>
                        ویرایش مشخصات
                    </a>
                </li>
                <li>
                    <a href="<?php bloginfo('url') ?>/my-account/edit-address/" class="<?php if($post_title=="/my-account/edit-address/") echo "active";?>">
                        <i class="fa fa-location-arrow"></i>
                        ویرایش آدرس
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>