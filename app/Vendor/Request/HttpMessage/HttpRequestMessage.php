<?php


namespace App\Vendor\Request\HttpMessage;

trait HttpRequestMessage
{
    /**
     * @return mixed
     */

    public function acceptContent(): mixed
    {
        return $_SERVER["HTTP_ACCEPT"];
    }

    /**
     * @return mixed
     */

    public function acceptEncoding(): mixed
    {
        return $_SERVER["HTTP_ACCEPT_ENCODING"];
    }

    /**
     * @return mixed
     */

    public function acceptLanguage(): mixed
    {
        return $_SERVER["HTTP_ACCEPT_LANGUAGE"];
    }

    /**
     * @return mixed
     */

    public function acceptCharset(): mixed
    {
        return $_SERVER["HTTP_ACCEPT_CHARSET"];
    }

    /**
     * @return mixed
     */

    public function connection(): mixed
    {
        return $_SERVER["HTTP_CONNECTION"];
    }

    /**
     * @return mixed
     */

    public function host(): mixed
    {
        return $_SERVER["HTTP_HOST"];
    }

    /**
     * @return mixed
     */

    public function referrer (): mixed
    {
        return $_SERVER["HTTP_REFERER"];
    }

    /**
     * @return mixed
     */

    public function userAgent(): mixed
    {
        return $_SERVER["HTTP_USER_AGENT"];
    }

    /**
     * @return array
     */

    public function allCookies(): array
    {
        return $_COOKIE;
    }

    /**
     * @param string $cookie
     * @return mixed
     */

    public function cookie(string $cookie): mixed
    {
        return isset($_COOKIE[$cookie]) ? $_COOKIE[$cookie] : false;
    }

    /**
     * @return mixed
     */

    public function ip(): mixed
    {
        return $_SERVER["REMOTE_ADDR"];
    }

    /**
     * @return string
     */

    public function requestMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    /**
     * @return string
     */

    public function fullUrl(): string
    {
        return $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
    }

    /**
     * @return string
     */

    public function path(): string
    {
        return strtolower(strtok($_SERVER["REQUEST_URI"],'?'));
    }

    /**
     * @param string $method
     * @return bool
     */

    public function isMethod(string $method): bool
    {
        return $this->requestMethod() == $method;
    }

    /**
     * @param array $accepts
     * @return bool
     */

    public function accepts(array $accepts): bool
    {
        $filterAccepts = array_filter($accepts ,function ($accept){

           return array_key_exists($accept,array_flip(explode(",",$this->acceptContent())));
        });

        return count($accepts) > 0;
    }

    /**
     * @return bool
     */

    public function  isBasicAuthenticate(): bool
    {
        if (isset($_SERVER["PHP_AUTH_USER"]) && isset($_SERVER["PHP_AUTH_PW"])){

            return true;
        }

        return false;
    }

    /**
     * @return string
     */

    public function baseAuthenticateUsername(): string
    {
        return $_SERVER["PHP_AUTH_USER"];
    }

    /**
     * @return string
     */

    public function baseAuthenticatePassword(): string
    {
        return $_SERVER["PHP_AUTH_PW"];
    }


}