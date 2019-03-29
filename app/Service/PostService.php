<?php

namespace App\Service;

use App\Model\Post;
use App\Model\PostMeta;
use App\Model\Site;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostService implements PostServiceInterface
{

    private $site;

    public function __construct(String $site_code, String $password)
    {
        $site_service = new SiteService();
        $result = $site_service->login_check($site_code, $password);
        if(!$result) {
            throw new \Exception("Auth fail");
        }

        $this->site = Site::query()->where("site_code", $site_code)->first();

        return;
    }


    public function add_post($post_type = null, $title = null, $content = null, Array $meta = array())
    {
        $post = new Post;
        $post->site_id = $this->site->id;
        $post->post_type = $post_type;
        $post->title = $title;
        $post->content = $content;
        $post->set_post_code();

        $post->save();

        foreach ($meta as $key=>$value) {

            $post_meta = new PostMeta();
            $post_meta->post_id = $post->id;
            $post_meta->meta_key = $key;
            $post_meta->meta_value = $value;

            $post_meta->save();

        }

        return $post->post_code;
    }

    public function edit_post($post_code, $post_type = null, $title = null, $content = null, Array $meta = null)
    {
        $post = Post::where('post_code', $post_code)->first();
        if ($post) {

            $post->post_type = $post_type;
            $post->title = $title;
            $post->content = $content;

            if($post->save()){
                return true;
            }else{
                return false;
            }
        }else {
            return false;
        }
        
    }

    public function get_posts($post_type = null)
    {
        if($post_type){
            $posts = Post::where("post_type", $post_type)->get();
        }else{
            $posts = Post::all();
        }

        return $posts->toArray();
    }

    public function get_post($post_code)
    {
        $post = Post::query()->where("post_code", $post_code)->first();
        if($post) {
            return $post->toArray();
        } else {
            return null;
        }
    }

}