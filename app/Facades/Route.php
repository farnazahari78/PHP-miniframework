<?php


namespace App\Facades;

/**
 *
 *  * @method static App\Vendor\Router\Router get(string $name,array $action,string $middleware)
 *   @method static  App\Vendor\Router\Router post(string $name,array $action , string $middleware)
 * @method  static  App\Vendor\Router\Router match(array $matches,string $name , array $action , string $middleware)
 *  @method static App\Vendor\Router\Router put(string $name,array $action,string $middleware)
 *  @method static App\Vendor\Router\Router patch(string $name,array $action,string $middleware)
 *  @method static App\Vendor\Router\Router delete(string $name,array $action,string $middleware)
 *
 */
class Route extends facade
{

    protected static function facadeAccessorName(): string
    {
        return  "Router";
    }

}