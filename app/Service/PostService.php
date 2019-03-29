<?php

namespace App\Service;


use App\Model\Post;
use Illuminate\Support\Facades\Hash;

class PostService implements PostServiceInterface
{
    public function get_sites($post_type = null){
        if($post_type){
            $posts = Post::where("post_type", $post_type)->get();
        }else{
            $posts = Post::all();
        }
        
    }
    public function get_site($post_code){
        $post = Post::where("post_code", $post_code)->first();
    }

    public function add_post($post_type = null, $title = null, $content = null, Array $meta = null){
        $post = new post;
        $post->name = $name;
        $post->url = $url;
        $post->set_password($password);
        $post->set_post_code();

        $post->save();

        return $post->post_code;
    }

    public function edit_post($post_code, $post_type = null, $title = null, $content = null, Array $meta = null){
        $post = Post::where('post_code', $post_code)->first();
        if ($post) {
            $post->post_type = $post_type;
            $post->title = $title;
            $post->content = $content;

            if($post->save()){
                return ture;
            }else{
                return false;
            }
        }else {
            return false;
        }
        
    }

}