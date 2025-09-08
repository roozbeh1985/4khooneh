<?php
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

function wp_get_menu_array($current_menu)
{

    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['children'] = array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID'] = $m->ID;
            $submenu[$m->ID]['title'] = $m->title;
            $submenu[$m->ID]['url'] = $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;

}

// Shortcode to output custom PHP in Visual Composer
function my_vc_shortcode($atts)
{
    return '<h2>This is my custom PHP output!</h2>';
}

add_shortcode('my_vc_php_output', 'my_vc_shortcode');
//------------------get_gozineha--------------------------------
add_action('wp_ajax_get_gozineha', 'get_gozineha');
add_action('wp_ajax_nopriv_get_gozineha', 'get_gozineha');
function get_gozineha()
{
    $post_id = $_POST['post_id'];
    $gozineha = get_post_meta($post_id, 'key', true);
    $gozineha = unserialize($gozineha);
    $json = wp_json_encode($gozineha);
    wp_send_json($json);
}

////////////////////////////////////////////////////////////////////////
// BuddyPress Profile URL Integration //////////////////////////////////
////////////////////////////////////////////////////////////////////////
add_filter('wpdiscuz_profile_url', 'wpdiscuz_bp_profile_url', 10, 2);
function wpdiscuz_bp_profile_url($profile_url, $user)
{
    if ($user && class_exists('BuddyPress')) {
        $profile_url = bp_core_get_user_domain($user->ID);
    }
    return $profile_url;
}

//----------------------------the ajax function search----------------------------------------
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch()
{
    if (substr($_POST['keyword'], 0, 1) == '#') {
        $the_query = new WP_Query(array('posts_per_page' => -1, 'tag' => esc_attr(substr($_POST['keyword'], 1)), 'post_type' => 'any'));
        if ($the_query->have_posts()):
            while ($the_query->have_posts()):
                $the_query->the_post(); ?>

                <h2 class="ry-search-content-title">
                    <a class="float-right" href="<?php echo the_permalink() ?>"><?php the_title() ?></a>
                </h2>
                <div class="clear"></div>
            <?php endwhile;
            wp_reset_postdata();
        endif;
        die();


    } else {
        $the_query = new WP_Query(array('posts_per_page' => -1, 's' => esc_attr($_POST['keyword']), 'post_type' => 'any'));
        if ($the_query->have_posts()):
            while ($the_query->have_posts()):
                $the_query->the_post(); ?>
                <h2 class="ry-search-content-title">
                    <a class="float-right" href="<?php echo the_permalink() ?>"><?php the_title(); ?></a>
                </h2>
                <div class="clear"></div>
            <?php endwhile;
            wp_reset_postdata();
        endif;
        die();
    }

}

//----------------------- save_darsadha ---------------------------------------

add_action('wp_ajax_save_darsadha', 'save_darsadha');
add_action('wp_ajax_nopriv_save_darsadha', 'save_darsadha');
function save_darsadha()
{
    $all_darsad = array();
    $helper_array = array();
    $post_id = $_POST['post_id'];
    $darsad = $_POST['darsad'];
    $darsad_kolii = $_POST['darsad_kolii'];
    $user_id_rand = $_POST['user_id_rand'];

    $helper_array['user_id'] = $user_id_rand;
    $helper_array['darsad'] = $darsad;
    $helper_array['darsad_kolii'] = $darsad_kolii;

    if (!get_post_meta($post_id, "darsadha", true)) {
        $all_darsad[0] = $helper_array;
        if (!update_post_meta($post_id, 'darsadha', $all_darsad)) {
            add_post_meta($post_id, 'darsadha', $all_darsad, true);
        }

    } else {
        $all_darsad = get_post_meta($post_id, "darsadha", true);
        array_push($all_darsad, $helper_array);
        update_post_meta($post_id, "darsadha", $all_darsad);
    }
    //    $json = wp_json_encode($helper_array);
//    $json1 = wp_json_encode($all_darsad);
//    wp_send_json($json1);
}

//----------------------- read_daarsdha ---------------------------------------

add_action('wp_ajax_read_darsadha', 'read_darsadha');
add_action('wp_ajax_nopriv_read_darsadha', 'read_darsadha');
function read_darsadha()
{
    $post_id = $_POST['post_id'];
    $user_id_rand = $_POST['user_id_rand'];
    $all_darsad = get_post_meta($post_id, "darsadha", true);
    $json1 = wp_json_encode($all_darsad);
    wp_send_json($json1);
}

//----------------------- saveUserLead ---------------------------------------

add_action('wp_ajax_saveUserLead', 'saveUserLead');
add_action('wp_ajax_nopriv_saveUserLead', 'saveUserLead');
function saveUserLead()
{
    global $wpdb;
    $name = $_POST['userName'];
    $phoneNumber = $_POST['phoneNumber'];
    $userLogin = $_POST['userLogin'];
    $password = $_POST['password'];
    $reshte = $_POST['reshte'];
    $date = date("Y-m-d");
    $wpdb->get_results("INSERT INTO `onlineClass` (`id`, `name`, `phone`, `reshte`, `date`) VALUES (NULL, '$name', '$phoneNumber', '$reshte', '$date');");
    $status["statuse"] = "no";
    $status["title"] = "رمز یکبار مصرف صحیح نمیباشد";

    $stat = wp_create_user($userLogin, $password, $phoneNumber . "@gmail.com");
    if (is_wp_error($stat)) {
        $status["statuse"] = "no";
        $status["title"] = $stat->get_error_message();
    } else {
        $user_id = $stat;
        wp_update_user(array('ID' => $user_id, 'user_email' => ""));
        wp_set_password($password, $user_id);
        update_user_meta($user_id, 'billing_phone', $phoneNumber);
        update_user_meta($user_id, 'FirstName', $name);
        update_user_meta($user_id, 'LastName', $name);
        update_user_meta($user_id, 'first_name', $name);
        update_user_meta($user_id, 'last_name', "");
        $status["statuse"] = "ok";
        $status["title"] = "ثبت نام با موفقیت انجام شد";
        $user = get_users(array(
            'meta_key' => 'billing_phone',
            'meta_value' => $phoneNumber
        ));
        $creds = array(
            'user_login' => $user[0]->user_login,
            'user_password' => $password,
            'remember' => true
        );
        wp_signon($creds, false);
    }

    wp_send_json($status);
}

//---------------------------attach file-----------------------------------------------------
function ry_attach($file_handler, $post_id, $setthumb = false)
{

    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK)
        __return_false();

    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload($file_handler, $post_id);

    //if ($setthumb) update_post_meta($post_id, '_thumbnail_id', $attach_id);
    return $attach_id;
}

//-------------------view post----------------------------------------
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
//-------------------add to cart ---------------------------------------
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

function woocommerce_ajax_add_to_cart()
{

    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX::get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );

        echo wp_send_json($data);
    }

    wp_die();
}

/**
 * @snippet Disable Postcode/ZIP Validation @ WooCommerce Checkout
 * @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode https://businessbloomer.com/?p=20203
 * @author Rodolfo Melogli
 * @testedwith WooCommerce 2.5.5
 */

add_filter('woocommerce_default_address_fields', 'bbloomer_override_postcode_validation');

function bbloomer_override_postcode_validation($address_fields)
{
    $address_fields['postcode']['validate'] = false;
    return $address_fields;
}

//------------------------------
/* Custom Post Type Start */
function create_posttype()
{
    register_post_type(
        'news',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('news'),
                'singular_name' => __('News')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'news'),
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_posttype');
/* Custom Post Type End */
/*Custom Post type start*/
function cw_post_type_news()
{
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('news', 'plural'),
        'singular_name' => _x('news', 'singular'),
        'menu_name' => _x('news', 'admin menu'),
        'name_admin_bar' => _x('news', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New news'),
        'new_item' => __('New news'),
        'edit_item' => __('Edit news'),
        'view_item' => __('View news'),
        'all_items' => __('All news'),
        'search_items' => __('Search news'),
        'not_found' => __('No news found.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'news'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('news', $args);
}

add_action('init', 'cw_post_type_news');
//------------------comments--------------------------------------
add_action('wp_ajax_comment_student', 'comment_student');
add_action('wp_ajax_nopriv_comment_student', 'comment_student');
function comment_student()
{
    $all_comments = array();
    $com = array();
    $user_id = $_POST['user_id'];
    $teache_live_page_id = $_POST['t_p'];
    $user_comment = $_POST['user_comment'];
    $kind = $_POST['kind'];
    $logo_src = $_POST['logo_src'];
    $user_names = $_POST['user_names'];
    $time = $_POST['time'];

    $com[0] = $user_id;
    $com[1] = $user_comment;
    $com[2] = $time;
    $com[3] = $kind;
    $com[4] = $logo_src;
    $com[5] = $user_names;

    if (!get_post_meta($teache_live_page_id, "allchats", true)) {
        $all_comments[0] = $com;
        $all_comments = serialize($all_comments);
        add_post_meta($teache_live_page_id, "allchats", $all_comments);
        add_post_meta($teache_live_page_id, "total_chat", 1);
    } else {
        $all_comments = get_post_meta($teache_live_page_id, "allchats", true);
        $all_comments = unserialize($all_comments);
        array_push($all_comments, $com);
        $all_comments = serialize($all_comments);
        update_post_meta($teache_live_page_id, "allchats", $all_comments);
        $total_chat = get_post_meta($teache_live_page_id, "total_chat", true);
        $total_chat++;
        update_post_meta($teache_live_page_id, "total_chat", $total_chat);
    }
}

//------------------comments_get--------------------------------------
add_action('wp_ajax_comment_student_get', 'comment_student_get');
add_action('wp_ajax_nopriv_comment_student_get', 'comment_student_get');
function comment_student_get()
{
    $teache_live_page_id = $_POST['t_p'];
    $numItem = $_POST['numItem'];
    $new_cooments = array();
    $j = 0;
    //    if(0){
    if (get_post_meta($teache_live_page_id, "total_chat", true) != $numItem) {
        $allcomments = get_post_meta($teache_live_page_id, "allchats", true);
        $allcomments = unserialize($allcomments);
        if ($numItem < count($allcomments)) {
            for ($i = $numItem; $i <= count($allcomments); $i++) {
                $new_cooments[$j] = $allcomments[$i];
                $j++;
            }
            if (!empty($new_cooments)) {
                $json = wp_json_encode($new_cooments);
                wp_send_json($json);
                ;
            }
        }
    }
}

//------------------im_online------------------------------------------
add_action('wp_ajax_im_online', 'im_online');
add_action('wp_ajax_nopriv_im_online', 'im_online');
function im_online()
{
    $all_user_online = array();
    $user_online = array();
    $user_id = $_POST['user_id'];
    $teache_live_page_id = $_POST['t_p'];


    $logo_src = $_POST['logo_src'];
    $user_names = $_POST['user_names'];
    $time = $_POST['time'];

    $user_online[0] = $user_id;
    $user_online[1] = $time;
    $user_online[2] = $logo_src;
    $user_online[3] = $user_names;

    if (!get_post_meta($teache_live_page_id, "all_users", true)) {
        $all_user_online[0] = $user_online;
        $all_user_online = serialize($all_user_online);
        if (!update_post_meta($teache_live_page_id, "all_users", $all_user_online)) {
            add_post_meta($teache_live_page_id, "all_users", $all_user_online);
        }
    } else {
        $all_user_online = get_post_meta($teache_live_page_id, "all_users", true);
        $all_user_online = unserialize($all_user_online);
        if (!in_array_r($user_names, $all_user_online)) {
            $i = (int) count($all_user_online);
            $i = $i--;
            $all_user_online[$i] = $user_online;
            $all_user_online = serialize($all_user_online);
            update_post_meta($teache_live_page_id, "all_users", $all_user_online);
        }

    }

}

function in_array_r($needle, $haystack, $strict = false)
{
    foreach ($haystack as $item) {
        if ($item[0] == $needle || $item[1] == $needle || $item[2] == $needle || $item[3] == $needle) {
            return true;
        }
    }
    return false;
}

//------------------comments_get--------------------------------------
add_action('wp_ajax_get_student_new_attend_class', 'get_student_new_attend_class');
add_action('wp_ajax_nopriv_get_student_new_attend_class', 'get_student_new_attend_class');
function get_student_new_attend_class()
{
    $teache_live_page_id = $_POST['t_p'];
    $numItem = $_POST['numItems_std'];
    $new_users = array();
    $j = 0;

    $all_users = get_post_meta($teache_live_page_id, "all_users", true);
    $all_users = unserialize($all_users);
    if ($numItem < count($all_users)) {
        for ($i = $numItem; $i <= count($all_users); $i++) {
            $new_users[$j] = $all_users[$i];
            $j++;
        }
        if (!empty($new_users)) {
            $json = wp_json_encode($new_users);
            wp_send_json($json);
        }
    }
}

//------------------comments_get--------------------------------------
add_action('wp_ajax_hozorgheyab', 'hozorgheyab');
add_action('wp_ajax_nopriv_hozorgheyab', 'hozorgheyab');
function hozorgheyab()
{
    $teache_live_page_id = $_POST['t_p'];
    update_post_meta($teache_live_page_id, "all_users", "");
}

add_filter('show_password_fields', '__return_true');
//--------------------- get_all_filter ---------------------------------------
add_action('wp_ajax_get_all_filter', 'get_all_filter');
add_action('wp_ajax_nopriv_get_all_filter', 'get_all_filter');
function get_all_filter()
{
    $Model = $_POST['data'];
    $num = 12;
    $page = $Model["PageNumber"];
    $offset = ($page - 1) * $num;
    $meta_query = array('relation' => 'AND');
    $tax_query = array('relation' => 'AND');
    $return_filter = array();
    $single_filter = array();
    if (!empty($Model['sex'])) {
        array_push($tax_query, array('taxonomy' => 'pa_جنسیت', 'field' => 'slug', 'terms' => $Model['sex'], 'operator' => 'IN'));
    }
    if (!empty($Model['age'])) {
        array_push($tax_query, array('taxonomy' => 'pa_گروه-سنی', 'field' => 'slug', 'terms' => $Model['age'], 'operator' => 'IN'));
    }
    if (!empty($Model['price'])) {
        array_push($meta_query, array('key' => '_price', 'value' => $Model['price'], 'compare' => 'BETWEEN', 'type' => 'NUMERIC'));
    }
    $orderby = 'meta_value_num';
    $arg = array(
        'post_type' => 'product',
        'offset' => $offset,
        'posts_per_page' => $num,
        'product_cat' => $Model['ProductType'],
        'meta_query' => $meta_query,
        'tax_query' => $tax_query,
        "orderby" => 'meta_value_num',
        "meta_key" => 'post_views_count',
        "order" => 'DESC'
    );
    $loop = new WP_Query($arg);
    if ($loop->have_posts()):
        while ($loop->have_posts()):
            $loop->the_post();
            $single_filter["title"] = $loop->post->post_title;
            $single_filter["regular_price"] = get_post_meta($loop->post->ID, '_regular_price', true);
            $single_filter["final_price"] = get_post_meta($loop->post->ID, '_price', true);
            ;
            $single_filter["link"] = get_permalink($loop->post->ID);
            $image_id = $loop->post->ID;
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'single-post-thumbnail');
            $single_filter["image"] = $image[0];
            $single_filter["id"] = $loop->post->ID;
            $single_filter["total"] = $loop->found_posts;
            array_push($return_filter, $single_filter);
        endwhile;
        wp_reset_postdata();
    endif;
    wp_send_json($return_filter);
}

//-------------------- remove EMail ------------------------------------------------
add_filter('woocommerce_checkout_fields', 'ry_load_fiiil');
function ry_load_fiiil($woo_checkout_fields_array)
{
    unset($woo_checkout_fields_array['billing']['billing_email']['validate']);
    unset($woo_checkout_fields_array['billing']['billing_email']['required']);
    return $woo_checkout_fields_array;
}

//------------------------------------check Oil Status---------------------------------------------------
add_action('woocommerce_before_checkout_process', 'wp_kama_woocommerce_before_checkout_process_action');
function wp_kama_woocommerce_before_checkout_process_action()
{
    $mobile = replaceNumberToEnglish($_POST['billing_phone']);
    if (!preg_match("/^09[0-9]{9}$/", $mobile))
        throw new Exception('شماره موبایل صحیح نمیباشد');
    //    $postalCode = replaceNumberToEnglish($_POST['billing_postcode']);
//    if (strlen($postalCode) != 10)
//        throw new Exception('کد پستی صحیح نمیباشد');
}

function replaceNumberToPersian($English_Number)
{
    return str_replace(array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'), array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'), $English_Number);
}

function replaceNumberToEnglish($persianNumber)
{
    return str_replace(array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'), array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'), $persianNumber);
}

function sendsms($to, $text, $bodyId)
{
    ini_set("soap.wsdl_cache_enabled", "0");
    $sms = new SoapClient("http://api.payamak-panel.com/post/Send.asmx?wsdl", array("encoding" => "UTF-8"));
    $data = array(
        "username" => "09125871319",
        "password" => "rZ5871319!@#",
        "text" => $text,
        "to" => $to,
        "bodyId" => $bodyId
    );
    $send_Result = $sms->SendByBaseNumber($data)->SendByBaseNumberResult;
    //echo $send_Result;
}

add_action('woocommerce_thankyou', 'success_message_after_payment');
function success_message_after_payment($order_id)
{
    $order = wc_get_order($order_id);
    $order->get_meta('_spotplayer_data')['key'];
    if ($order->has_status('processing') || $order->has_status('completed')) {
        if ($_COOKIE["stSync" . $order->get_order_number()] !== "ok") {
            // setcookie("stSync" . $order->get_order_number(), "ok", time() + 36000);
            if ($order->get_meta('_spotplayer_data'))
                sendsms($order->get_billing_phone(), array($order->get_billing_first_name(), $order->get_meta('_spotplayer_data')['key']), '274783');
        }
        if ($order->get_shipping_method() == "تیپاکس") {
            $order->update_status('wc-tipax', 'تغییر اتوماتیک به وضعیت تیپاکس');
        }
    }



}

add_filter('acf/settings/remove_wp_meta_box', '__return_false');

function register_shipped_order_status()
{
    register_post_status('wc-tipax', array(
        'label' => 'تیپاکس',
        'public' => true,
        'exclude_from_search' => false,
        'show_in_admin_all_list' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('تیپاکس <span class="count">(%s)</span>', 'تیپاکس <span class="count">(%s)</span>')
    ));
}
add_action('init', 'register_shipped_order_status');


add_filter('wc_order_statuses', 'custom_order_status');
function custom_order_status($order_statuses)
{
    $order_statuses['wc-tipax'] = _x('تیپاکس', 'Order status', 'woocommerce');
    return $order_statuses;
}


function register_shipped_order_status_comp()
{
    register_post_status('wc-tipax-comp', array(
        'label' => 'تکمیل تیپاکس',
        'public' => true,
        'exclude_from_search' => false,
        'show_in_admin_all_list' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('تکمیل تیپاکس <span class="count">(%s)</span>', 'تکمیل تیپاکس <span class="count">(%s)</span>')
    ));
}
add_action('init', 'register_shipped_order_status_comp');


add_filter('wc_order_statuses', 'custom_order_status_ok');
function custom_order_status_ok($order_statuses)
{
    $order_statuses['wc-tipax-comp'] = _x('تکمیل تیپاکس', 'Order status', 'woocommerce');
    return $order_statuses;
}


//--------------------------------show description---------------------------------------------

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts()
{
    echo '<style>
	.status-tipax {
      background-color: chartreuse;
      color: black;
    } 
  </style>';
}
function my_woocommerce_apply_cart_coupon_in_url()
{
    // Return early if WooCommerce or sessions aren't available.
    if (!function_exists('WC') || !WC()->session) {
        return;
    }

    // Return if there is no coupon in the URL, otherwise set the variable.
    if (empty($_REQUEST['coupon'])) {
        return;
    } else {
        $coupon_code = esc_attr($_REQUEST['coupon']);
    }

    // Set a session cookie to remember the coupon if they continue shopping.
    WC()->session->set_customer_session_cookie(true);

    // Apply the coupon to the cart if necessary.
    if (!WC()->cart->has_discount($coupon_code)) {

        // WC_Cart::add_discount() sanitizes the coupon code.
        WC()->cart->add_discount($coupon_code);
    }
}
add_action('wp_loaded', 'my_woocommerce_apply_cart_coupon_in_url', 30);
add_action('woocommerce_add_to_cart', 'my_woocommerce_apply_cart_coupon_in_url');



add_filter('woocommerce_coupon_is_valid_for_product', 'woocommerceir_exclude_product_from_product_promotions_frontend', 9999, 4);

function woocommerceir_exclude_product_from_product_promotions_frontend($valid, $product, $coupon, $values)
{

    if (153609 == $product->get_id()) {
        //$valid = false;
    }
    return $valid;
}
//-------------------custom Field-----------------
function ry_show_all_meta_box()
{
    global $post;

    $custom_fields = get_post_meta($post->ID);

    echo '<div style="max-height:400px;overflow:auto;">';
    if ($custom_fields) {
        echo '<table style="width:100%;border-collapse:collapse;">';
        echo '<tr><th style="border:1px solid #ccc;padding:5px;">Meta Key</th><th style="border:1px solid #ccc;padding:5px;">Meta Value</th></tr>';
        foreach ($custom_fields as $key => $values) {
            if (strpos($key, '_') === 0 || stripos($key, 'yoast') !== false || stripos($key, 'wpdiscuz') !== false) {
                continue;
            }

            foreach ($values as $value) {
                $field_name = 'ry_meta_' . md5($key);

                // تست serialize
                $decoded = @unserialize($value);
                $is_serialized = ($decoded !== false || $value === 'b:0;');

                echo '<tr>';
                echo '<td style="border:1px solid #ccc;padding:5px;">' . esc_html($key) . '</td>';
                echo '<td style="border:1px solid #ccc;padding:5px;">';

                if ($is_serialized) {
                    echo '<textarea style="width:100%;height:120px;" name="' . esc_attr($field_name) . '">' . esc_textarea(implode("\n", (array) $decoded)) . '</textarea>';
                    echo '<input type="hidden" name="' . esc_attr($field_name . "_serialized") . '" value="1">';
                } else {
                    echo '<textarea style="width:100%;height:60px;" name="' . esc_attr($field_name) . '">' . esc_textarea($value) . '</textarea>';
                    echo '<input type="hidden" name="' . esc_attr($field_name . "_serialized") . '" value="0">';
                }

                echo '<input type="hidden" name="' . esc_attr($field_name . "_key") . '" value="' . esc_attr($key) . '">';
                echo '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
    } else {
        echo '<p>هیچ متایی برای این نوشته وجود ندارد.</p>';
    }
    echo '</div>';
}


function ry_register_all_meta_box()
{
    $screens = ['post', 'page'];
    foreach ($screens as $screen) {
        add_meta_box(
            'ry_all_meta_box',
            '🔑 همه متاها (با پشتیبانی unserialize)',
            'ry_show_all_meta_box',
            $screen,
            'normal',
            'default'
        );
    }
}
add_action('add_meta_boxes', 'ry_register_all_meta_box');

function ry_save_all_meta_box($post_id)
{
    foreach ($_POST as $field => $value) {
        if (strpos($field, 'ry_meta_') === 0 && !str_ends_with($field, '_key') && !str_ends_with($field, '_serialized')) {
            $key_field = $field . "_key";
            $ser_field = $field . "_serialized";

            if (isset($_POST[$key_field])) {
                $meta_key = sanitize_text_field($_POST[$key_field]);
                $is_serialized = isset($_POST[$ser_field]) && $_POST[$ser_field] == "1";

                if ($is_serialized) {
                    $lines = array_filter(array_map('trim', explode("\n", $value)));
                    update_post_meta($post_id, $meta_key, serialize($lines));
                } else {
                    $meta_value = sanitize_textarea_field($value);
                    update_post_meta($post_id, $meta_key, $meta_value);
                }
            }
        }
    }
}
add_action('save_post', 'ry_save_all_meta_box');

//--------------emoji woocommerce--*---------
add_filter('manage_edit-shop_order_columns', 'add_product_type_column_after_date', 20);
function add_product_type_column_after_date($columns)
{
    $new_columns = array();
    foreach ($columns as $key => $column) {
        $new_columns[$key] = $column;
        if ($key === 'order_date') {
            $new_columns['product_type'] = 'نوع محصول';
        }
    }
    return $new_columns;
}

add_action('manage_shop_order_posts_custom_column', 'show_product_type_column_content', 10, 2);
function show_product_type_column_content($column, $post_id)
{
    if ($column === 'product_type') {
        $order = wc_get_order($post_id);
        $types = array();
        foreach ($order->get_items() as $item) {
            $product_name = strtolower($item->get_name());
            if (strpos($product_name, 'فیلم') !== false)
                $types['فیلم'] = '🎬';
            if (strpos($product_name, 'کلاس') !== false)
                $types['کلاس'] = '🏫';
            if (strpos($product_name, 'کنکور آزمایشی') !== false)
                $types['آزمون'] = '📝';
        }
        if (empty($types))
            $types[] = '📒';
        echo '<span class="product-type-emojis">' . implode(' ', $types) . '</span>';
    }
}

add_action('admin_head', function () {
    echo '<style>
    .column-product_type .product-type-emojis {
        font-size: 2.5em;
        line-height: 1;
        font-family: "Segoe UI Emoji", "Apple Color Emoji", "Noto Color Emoji", sans-serif;
        display: inline-block;
    }
        .img.wp-smiley, img.emoji{
        width: 31px !important;
        height: 31px !important;
    }
    </style>';
});

add_action('woocommerce_order_status_changed', function($order_id, $old_status, $new_status, $order) {
    if ($old_status === 'processing' && $new_status === 'completed') {
        foreach ($order->get_items() as $item) {
            $product = $item->get_product();
            if ($product && ($product->is_virtual() || $product->is_downloadable())) {
                remove_action('woocommerce_order_status_changed', __FUNCTION__, 10);
                $order->update_status('processing', 'محصول دانلودی یا مجازی: سفارش کامل نشد و در حال انجام باقی ماند.');
                add_action('woocommerce_order_status_changed', __FUNCTION__, 10, 4);
                break;
            }
        }
    }
}, 10, 4);

?>