<?php


namespace App\Services;

use App\Vendor\Request\Request;
use App\Vendor\Singleton\Singleton;

class Router
{
    private static array $registeredRouteInfo;

    private static string $controllerName;

    private static string $controllerMethod;

    private static string $registeredRoutePath;

    private static string $currentPath;

    private static string $middleware;

    public static function registerRoute(array $registeredRoute)
    {
        static::$registeredRouteInfo = $registeredRoute;

        static::setRouteInfo();

        if (class_exists(static::$controllerName)){

            $reflection = new \ReflectionClass(static::$controllerName);

            if ($reflectionMethod = static::hasReflectionClassMethod($reflection)){

                if ($reflectionMethod->isPublic()){

                    static::bootMiddleware();

                    static::bootController($reflectionMethod);
                }
                else
                {
                    echo "its not a public method";
                }
            }
            else
            {
                echo "doesnt have any method!";
            }

        }
        else
        {
            echo "class does not exists!";
        }
    }

    private static function setRouteInfo()
    {
        static::$registeredRoutePath = static::$registeredRouteInfo["registeredRoutePath"];

        static::$currentPath = static::$registeredRouteInfo["current_route"];

        static::$controllerName = static::$registeredRouteInfo["controller"] ;

        static::$controllerMethod  = static::$registeredRouteInfo["controllerMethod"] ;

        static::$middleware = static::$registeredRouteInfo["middleware"];

    }

    private static function hasReflectionClassMethod(\ReflectionClass $reflection){

            if ($reflection->hasMethod(static::$controllerMethod)){

                return $reflection->getMethod(static::$controllerMethod);
            }

            return false;
    }

    private static function setObjectParams(\ReflectionMethod $reflectionMethod){

        foreach ($reflectionMethod->getParameters() as $parameter){

            if ($parameter->hasType()){

                if (class_exists($parameter->getType()->getName())){

                    $classNameParam = $parameter->getType()->getName();

                    $reflectionParamClass = new \ReflectionClass($classNameParam);
                        $traitKeyCheck = array_search(Singleton::class,$reflectionParamClass->getTraitNames());

                    if ( $traitKeyCheck!=false){

                        if ($traitKey = $reflectionParamClass->getTraitNames()[array_search(Singleton::class,$reflectionParamClass->getTraitNames())]){

                            if ($reflectionParamClass->hasMethod("makeInstance")){

                                $classNameParam = $classNameParam::makeInstance();
                            }
                        }
                    }
                    else
                    {
                        $classNameParam = new $classNameParam();
                    }

                    $classParams[]=$classNameParam;
                }
            }
        }
        return isset($classParams) ? $classParams : [];
    }

    private static function setRoutePassParams(array $currentRouteArray, array $registeredRouteArray){

        return array_map(function ($currentRoute, $registeredRoute) {

            if (substr($currentRoute,0,1)=="{" && substr($currentRoute,-1,1)=="}"){

                return $registeredRoute;

            }
        },$registeredRouteArray,$currentRouteArray);
    }

    private static function filterRoutePassParams($passParams){

        return array_filter($passParams,function ($value){

            return !is_null($value);

        });
    }
    private static function bootController(\ReflectionMethod $reflectionMethod){

        $controllerName = static::$controllerName;

        $controllerMethod = static::$controllerMethod;

        $classObject = new $controllerName();

        if ($reflectionMethod->getNumberOfRequiredParameters() > 0){

            $classParams = static::setObjectParams($reflectionMethod);

            $registeredRouteArray = explode("/",ltrim(static::$registeredRoutePath,'/'));

            $currentRouteArray = explode("/",ltrim(static::$currentPath,"/"));

            $passParams  = static::setRoutePassParams($currentRouteArray , $registeredRouteArray);

            $passParams = static::filterRoutePassParams($passParams);

            $passParams = array_merge($passParams,$classParams);

        }

        $passParams = isset($passParams) ? $passParams : [];
        $classObject->$controllerMethod(... $passParams);
    }
    private static function bootMiddleware(){
        $middleware = static::$middleware;
        $middlewareInstance = new $middleware();
        $requestObject = Request::makeInstance();
        $middlewareInstance->handle($requestObject);
    }
}