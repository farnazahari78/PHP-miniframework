<?php


namespace App\Services;


use App\Facades\facade;
use App\Vendor\Request\Request;
use App\Vendor\Router\Router;

class ObjectInjector
{
    /**
     * @var array
     */

    private static array $instances=[];

    /**
     * @return string[]
     */

    private static function registerList():array
    {
        return [

            Router::class,
        ];
    }

    public static function injectObject():void
    {
        foreach (static::registerList() as $class){

            $className = explode("\\",$class);

            $className = end($className);

            static::$instances[$className]= new $class();

        }

        facade::appInstanceInject(static::$instances);

    }

    /**
     * @param string $name
     * @return mixed
     */

    public static function getObjects(string $name): mixed
    {
        return static::$instances[$name];
    }
}