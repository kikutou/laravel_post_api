<?php

namespace App\Service;

use App\Model\Site;
use Illuminate\Support\Facades\Hash;

class SiteService implements SiteServiceInterface
{
    public function add_site($name, $url, $password){
        $site = new Site;
        $site->name = $name;
        $site->url = $url;
        $site->password = $site->setPassword($password);
        $site->site_code = $site->set_site_code();
        
        $site->save();

        return $site->site_code;
    }

    public function edit_site($site_code, $name, $url, $password){
        $site = Site::where('site_code', $site_code)->first();
        if ($site) {
            $site->name = $name;
            $site->url = $url;
            $site->setPassword($password);

            if($site->save()){
                return ture;
            }else{
                return false;
            }
        }else {
            return false;
        }
        
    }

    public function login_check($site_code, $password){
        $result = false;
        $site = Site::where("site_code", $site_code)->first();

        if($site) {
            $result = Hash::check($password, $site->password);

            return $result;
        }
    }
}
