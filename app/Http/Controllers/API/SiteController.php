<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\SiteService;

class SiteController extends Controller
{
    public function add(Request $request){
        $site_items = $request->json()->all();

        $site = new SiteService;

        $site_code = $site->add_site($site_items['name'], $site_items['url'], $site_items['password']);
        if($site_code){
            return array(
                "site_code" => $site_code);
        }else{
            return response()->json(null, 500);
        }

    }
}
