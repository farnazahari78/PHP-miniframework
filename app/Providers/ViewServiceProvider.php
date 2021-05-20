<?php


namespace App\Providers;


use App\Services\View\View;

class ViewServiceProvider implements ServiceProvider
{

    public static function register()
    {
        $menu = [["name"=>"home","path"=>"/"],["name"=>"about","path"=>"/about"]

            ,["name"=>"contact","path"=>"/contact"],["name"=>"login","path"=>"/login"]];

        View::share(["menu"=>$menu]);
    }
}