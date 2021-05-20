<?php


namespace App\Vendor\MessageBag;


use App\Vendor\Singleton\Singleton;

class OldInputs extends MessageBagAbstract
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
        return "oldInputs";
    }
}