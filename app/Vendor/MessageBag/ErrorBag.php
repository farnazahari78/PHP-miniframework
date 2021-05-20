<?php


namespace App\Vendor\MessageBag;


use App\Vendor\Singleton\Singleton;

class ErrorBag extends MessageBagAbstract
{

    use Singleton;

    public function __construct()
    {
        $this->flush();
    }

    /**
     * @return string
     */

    protected function MessageName(): string
    {
        return "blackHoleError";
    }

}