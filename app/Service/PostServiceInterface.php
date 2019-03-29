<?php


namespace App\Service;


interface PostServiceInterface
{
    // 可获得全部posts或指定类型的posts
    public function get_posts($post_type = null);

    // 可获得特定code的post
    public function get_post($post_code);

    // $meta = ["meta_key"=>"key", "meta_value"=>"value"]
    // 任意一项均可为空，但须在方法中规定不可全部为空，返回值为post_code
    public function add_post($post_type = null, $title = null, $content = null, Array $meta = array());

    public function edit_post($post_code, $post_type = null, $title = null, $content = null, Array $meta = null);


}