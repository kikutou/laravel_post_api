<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Site extends Model
{
    protected $table = "sites";

    public function posts(){
        return $this->hasMany('APP/Model/Post','site_id');
    }
    
    public function setPassword($password){
        $this->password = Hash::make($password);
        return $this->password;
    }

    public function set_site_code(){
        $site_code = Str::random(10);

        while (Site::query()->where("site_code", $site_code)->first()) {
            $site_code = Str::random(10);
        }

        $this->site_code = $site_code;
        return $this->site_code;
    }

    
}
