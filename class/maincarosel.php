<?php

class maincarosel
{
    public function archiveBest()
    {
        global $post;
        $meta_query = array();
        array_push($meta_query, array('key' => '_stock_status', 'value' => 'instock'));
        $args = array(

            'post_type' => 'product',
            'posts_per_page' => 100,
            'product_cat' => $post->post_title,
            "orderby" => 'meta_value_num',
            "meta_key" => 'post_views_count',
            "order" => 'DESC',
        );
        $products = $this->loopToProduct($args);
        return $products;
    }

    public function loopToProduct($args)
    {
        $retArray = array();
        $single_filter = array();
        $loop = new WP_Query($args);
        $homeLength = strlen(get_home_url());
        if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post();
                $single_filter['video'] = false;
                $single_filter['videoUrl'] = '';

                if ($murl = get_post_meta($loop->post->ID, 'video', true)) {
                    $single_filter['video'] = true;
                    $single_filter['videoUrl'] = $murl;
                }
                if ($murl = get_post_meta($loop->post->ID, 'cover', true)) {
                    $single_filter['cover'] = $murl;
                }

                $single_filter["title"] = $loop->post->post_title;
                $single_filter["regular_price"] = get_post_meta($loop->post->ID, '_regular_price', true);
                $single_filter["final_price"] = get_post_meta($loop->post->ID, '_price', true);
                $single_filter["link"] = get_permalink($loop->post->ID);
                $single_filter["id"] = $loop->post->ID;
                $image_id = $loop->post->ID;
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($image_id), 'medium');
                $single_filter["image"] = $image[0];
                $prod = wc_get_product($loop->post->ID);
                if ($prod->is_in_stock() ) {
                    $single_filter["allow"] = "ok";
                } else {
                    $single_filter["allow"] = "no";
                }
                $single_filter["stock_status"] = get_post_meta($loop->post->ID, '_stock_status', true);

                array_push($retArray, $single_filter);
            endwhile;
        }
        return $retArray;
    }
    public function sortVideoTop($items)
    {
        $hasVideo = array();
        $noVideo = array();
        foreach ($items as $item) {
            if ($item['video']) {
                array_push($hasVideo, $item);
            } else {
                array_push($noVideo, $item);
            }
        }
        return array_merge($hasVideo, $noVideo);
    }
}