<?php
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