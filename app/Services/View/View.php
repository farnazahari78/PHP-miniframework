<?php


namespace App\Services\View;


class View
{
    use ViewInitialize,ViewRegister;

    private static array $shareData = [];

    private static array $viewData;
    /**
     * @param string $viewPath
     * @param array $data
     */

    public static function make(string $viewPath,array $data = [])
    {
        $fullViewPath = static::makeFullViewRoute($viewPath);

        static::$viewData = $data;

        static::register($fullViewPath);

    }

    public static function share(array $shareData)
    {
        static::$shareData = $shareData;
    }


}