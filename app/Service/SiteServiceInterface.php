<?php


namespace App\Service;


interface SiteServiceInterface
{
    // 返回site_code
    public function add_site($name, $url, $password);

    public function edit_site($site_code, $name, $url, $password);

    public function login_check($site_code, $password);


}