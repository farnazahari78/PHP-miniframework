<?php


namespace App\Services;


class ConfigReader
{
    /**
     * @param string $configName
     */

    public static function getConfig(string $configName)
    {
        $fullConfigName = CONFIGS.$configName.'.php';

        if (file_exists($fullConfigName))
        {
            return include_once $fullConfigName;
        }

        return  false;
    }
}