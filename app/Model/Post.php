<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';

    public function site(){
        return $this->belongsTo('APP/Model/Site','site_id');
    }
    public function post_metas(){
        return $this->hasMany('APP/Model/PostMeta','post_id');
    }
    public function set_post_code(){
        $post_code = Str::random(8);

        // make sure unique
        while (Site::query()->where("post_code", $post_code)->first()) {
            $post_code = Str::random(8);
        }

        $this->post_code = $post_code;
    }
}
