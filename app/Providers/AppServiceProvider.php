<?php


namespace App\Providers;


use App\Services\bootMiddlewares;
use App\Services\ObjectInjector;
use App\Services\View\View;

class AppServiceProvider implements ServiceProvider
{
    public static function register()
    {
        ObjectInjector::injectObject();

        bootMiddlewares::bootMiddlewares();

    }

}