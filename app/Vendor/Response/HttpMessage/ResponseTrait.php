<?php


namespace App\Vendor\Response\HttpMessage;

use App\Services\View\View;
use JetBrains\PhpStorm\NoReturn;

trait ResponseTrait
{
    /**
     * @param string $value
     */

    public function setAccessControlAllowMethods(string $value): void
    {
        header("Access-Control-Allow-Methods: ".$value);
    }

    /**
     * @param string $value
     */

    public function setAccessControlAllowHeaders(string $value): void
    {
        header("Access-Control-Allow-Headers: ".$value);
    }

    /**
     * @param string $value
     */

    public function setAccessControlAllowOrigin(string $value): void
    {
        header("Access-Control-Allow-Origin: ".$value);
    }

    /**
     * @param string $value
     */

    public function setAccessControlExposeHeaders(string $value): void
    {
        header("Access-Control-Expose-Headers: ".$value);
    }

    /**
     * @param string $value
     */

    public function setAllowMethods(string $value): void
    {
        header("Allow: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setClearSiteData(string $value): void
    {
        header("Clear-Site-Data: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setContentDisposition(string $value): void
    {
        header("Content-Disposition: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setContentEncoding(string $value): void
    {
        header("Content-Encoding: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setContentLanguage(string $value): void
    {
        header("Content-Language: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setContentLength(string $value): void
    {
        header("Content-Length: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setContentLocation(string $value): void
    {
        header("Content-Location: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setContentType(string $value): void
    {
        header("Content-Type: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setDate(string $value): void
    {
        header("Date: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setEtag(string $value): void
    {
        header("Etag: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setExpect(string $value): void
    {
        header("Expect: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setExpires(string $value): void
    {
        header("Expires: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setFrom(string $value): void
    {
        header("From: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setKeepAlive(string $value): void
    {
        header("Keep-Alive: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setLastModified(string $value): void
    {
        header("Last-Modified: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setLocation(string $value): void
    {
        header("Location: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setOrigin(string $value): void
    {
        header("Origin: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setRetryAfter(string $value): void
    {
        header("Retry-After: ".$value);
    }

    /**
     * @param string $value
     * @return void
     */

    public function setServer(string $value): void
    {
        header("Server: ".$value);
    }

    /**
     * @param string $name
     * @param string $value
     * @param int $time
     * @param string $domain
     * @return $this
     */

    public function setCookie(string $name , string $value , int $time , string $domain = "/"): static
    {
        setcookie($name , $value , $time , $domain);

        return $this;
    }

    /**
     * @param int $statusCode
     * @param string|null $humanReadable
     */

    public function setStatus(int $statusCode , string $humanReadable = null): void
    {
        header($_SERVER["SERVER_PROTOCOL"]." ".$statusCode."  ".$humanReadable);
    }

    /***
     * @param string $path
     */

    public function redirectTo(string $path): void
    {
        header("location: ".$path);
    }

    /**
     *
     */

    public function redirectBack(): void
    {
        header("location: ".$this->requestInstance->referrer());
    }

    /**
     * @param null $realm
     */

    public function basicAuthorize($realm = null): void
    {
        header("WWW-Authenticate: basic realm=".$realm);
    }

    /**
     * @param string $filePath
     * @param string $fileName
     */

    #[NoReturn] public function file(string $filePath, string $fileName = null): void
    {
        $filePath = FILE_STORAGE.$filePath;

        $fileName = is_null($fileName) ? basename($filePath) : $fileName;

        $this->setContentLength(filesize($filePath));

        $this->setContentType(mime_content_type($filePath));

        $this->setContentDisposition("attachment;filename=".$fileName);

        readfile($filePath);

        exit();
    }

    /**
     * @param string $viewPath
     */

    #[NoReturn] public function notFound(string $viewPath): void
    {
        $this->setStatus(static::HTTP_NOT_FOUND,static::$statusTexts[static::HTTP_NOT_FOUND]);

        View::make($viewPath);

        exit();
    }

    #[NoReturn] public function pageExpired(string $viewPath): void
    {
        $this->setStatus(419,"Unknown Status");

        View::make($viewPath);

        exit();
    }
}