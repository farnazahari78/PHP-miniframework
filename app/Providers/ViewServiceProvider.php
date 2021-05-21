<?php


namespace App\Providers;


use App\Services\View\View;

class ViewServiceProvider implements ServiceProvider
{

    public static function register()
    {
        $menu = [["name"=>"home","path"=>url("/")],["name"=>"about","path"=>url("/about")]

            ,["name"=>"contact","path"=>url("/contact")],["name"=>"login","path"=>url("/login")]];

        View::share(["menu"=>$menu]);
    }
}