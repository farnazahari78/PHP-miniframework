<?php


namespace App\Facades;


use http\Exception\RuntimeException;
use JetBrains\PhpStorm\Pure;

abstract class facade
{

    protected static array $appInstances=[];

    protected static function resolveInstanced()
    {
        return static::getInstanceByAccessor(static::facadeAccessorName());
    }
    #[Pure] protected static function getInstanceByAccessor(string $name)
    {
        if (array_key_exists($name,static::$appInstances)){

            return static::$appInstances[$name];
        }
        return false;
    }

    public static function appInstanceInject(array $instances)
    {
        static::$appInstances = $instances;
    }

    public static function __callStatic(string $method, array $arguments)
    {
        $resolveInstance = static::resolveInstanced();
        if (is_object($resolveInstance)){
            $ref = new \ReflectionClass($resolveInstance);
            $numberOfMethodParams = $ref->getMethod($method)->getNumberOfRequiredParameters();
            if ($numberOfMethodParams > count($arguments)){
                die("error");
            }
            $resolveInstance->$method(... $arguments);
        }
        else
        {
            throw new RuntimeException("not a object");
        }
    }
    abstract static protected function facadeAccessorName():string;

}