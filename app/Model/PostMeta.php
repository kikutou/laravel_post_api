<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = 'post_metas';
    
    public function post()
    {
        return $this->belongsTo('APP/Model/Post','post_id');
    }
}
