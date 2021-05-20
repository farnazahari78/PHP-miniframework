<?php


namespace App\Vendor\Router;

use App\Services\View\View;
use App\Vendor\Request\Request;

class RouterInitialize
{
    /**
     * @return mixed
     */

    public static function verifyRoute(): void
    {
        $result = static::routeIni();

        count($result) < 1 ? response()->notFound("errors.404") : eval($result[0]);
    }

    /**
     * @return mixed
     */

    private static function routeIni(): mixed
    {
        $allRegisteredRoutes = file_get_contents("routes/web.php");

        $requestInstance = Request::makeInstance();

        $uriIni = explode("/",trim($requestInstance->path(),'/'));


        array_walk($uriIni,function (&$value){

            $value = "(?:(?:\/{.*})|"."\/".$value.")";

        });

        $uri =implode("",$uriIni);

        $requestMethod = $requestInstance->input("_method") ? $requestInstance->input("_method") : $requestInstance->requestMethod();

        preg_match("/^\\\?App\\\Facades\\\Route\n{0,}::\n{0,}(?:match\(\[.*$requestMethod.*],|$requestMethod)\n{0,}\(?.*\"$uri\"\n{0,},(?:[\n]?.*?)*;/m",$allRegisteredRoutes,$result);

        return $result;
    }
}
