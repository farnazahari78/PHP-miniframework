<?php


namespace App\Vendor\MessageBag;


use App\Vendor\Singleton\Singleton;

class MsgBag extends MessageBagAbstract
{

    use Singleton;

    public function __construct()
    {
        $this->flush();
    }

    protected function MessageName(): string
    {
        return "MsgBag";
    }
}