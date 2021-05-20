<?php


namespace App\Vendor\Singleton;

trait Singleton
{
    /**
     * @var null
     */

    private static mixed $instanced = null;

    /**
     * @return static
     */

    public static function makeInstance():static
    {
        if (!is_object(static::$instanced)){

            static::$instanced = new static();

        }

        return static::$instanced;
    }

}