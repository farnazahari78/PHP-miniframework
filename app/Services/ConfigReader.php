<?php


namespace App\Services;


class ConfigReader
{
    /**
     * @param string $configName
     */
    private static array $configHistory = [];

    public static function getConfig(string $configName)
    {
        $fullConfigName = CONFIGS.$configName.'.php';

        if (array_key_exists($configName,static::$configHistory))
        {
            return static::$configHistory[$configName];
        }

        if (file_exists($fullConfigName))
        {
            $config  = include_once $fullConfigName;

            static::$configHistory[$configName] = $config;

            return $config;
        }

        return  false;
    }
}