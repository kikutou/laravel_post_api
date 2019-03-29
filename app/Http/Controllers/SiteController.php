<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Site;
use App\Service\SiteService;
use Validator;

class SiteController extends Controller
{
    public function index(Request $request){
        $sites = Site::all();
        return view("site.index", ["sites" => $sites]);
    }

    public function add(Request $request){
        if($request->isMethod("GET")){

          return view("site.add");

        }else{

            $validator_rules = [
                "name" => "required",
                "url" => "required",
                "password" => "required"
              ];
              $validator_messages = [
                "name.required" => "名前を入力してください。",
                "url.required" => "urlを入力してください。",
                "password.required" => "パスワードを入力してください。"
              ];
              $validator=Validator::make($request->all(),$validator_rules,$validator_messages);
              if($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
              }

              $name = $request->name;
              $url = $request->url;
              $password = $request->password;

              $site = new SiteService;
              $result = $site->add_site($name, $url, $password);
              if($result != null){
                $message = '新規作成が完了となりました。';
              }else{
                  $message = '新規作成が失敗しました。';
              }
              

              return redirect(route('get_site_add'))->with(["message" => $message]);
        }
      }

    


}
