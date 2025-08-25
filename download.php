<?php
define('WP_USE_THEMES', true);

  if ( !isset($wp_did_header) ) {

    $wp_did_header = true;

    require_once( dirname(__FILE__) . '/wp-load.php' );

    wp();

    require_once( ABSPATH . WPINC . '/template-loader.php' );

}

$path = '';
if(isset($_GET['id'])&&isset($_GET['n'])){
    	add_action('template_redirect', 'setPrivateTemplate');
        $vides=get_post_meta('11275','post_views_count',true);
//         $vides=unserialize($vides);
        //$video=$video[0][3];
        //$path=$video;
        if($videos){
			echo 'ok';
		}
		else echo "no";
         print_r($videos) ;
		
//         $mime_type=mime_content_type($path);
//         header("Pragma: public");
//         header("Expires: 0");
//         header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//         header("Cache-Control: public");
//         header("Content-Description: File Transfer");
//         header("Content-Type: " . $mime_type);
//         header("Content-Length: " .(string)(filesize($path)) );
//         header('Content-Disposition: attachment; filename="'.basename($path).'"');
//         header("Content-Transfer-Encoding: binary\n");
//         readfile($path);
//         exit();
    
}
else echo 'nio';
?>