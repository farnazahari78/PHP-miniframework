<?php

use App\Services\ConfigReader;

function session(): \App\Vendor\Session\Store
{
    return \App\Vendor\Session\Store::makeInstance();
}

function response(): \App\Vendor\Response\Response
{
    return \App\Vendor\Response\Response::makeInstance();
}

function errors(): \App\Vendor\MessageBag\ErrorBag
{
    return \App\Vendor\MessageBag\ErrorBag::makeInstance();
}

function message():\App\Vendor\MessageBag\MsgBag
{
    return  \App\Vendor\MessageBag\MsgBag::makeInstance();
}

function request(): \App\Vendor\Request\Request
{
    return \App\Vendor\Request\Request::makeInstance();
}

function old(): \App\Vendor\MessageBag\OldInputs
{
    return \App\Vendor\MessageBag\OldInputs::makeInstance();
}
function assets(string $path): string
{
    return "resources/".$path;
}

function url(string $route): string
{
    $routeConfig = ConfigReader::getConfig("router");

    return  strlen($routeConfig["Directory"]) == 0 ? $route :  "/".$routeConfig["Directory"].$route;

}
function hashGenerator(int $length) : string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}