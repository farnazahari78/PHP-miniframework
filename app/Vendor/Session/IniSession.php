<?php


namespace App\Vendor\Session;


trait IniSession
{
    private  string $sessionName="blackHole_session";

    private string|null $sessionId = null;

    private array $lastSessionInfo;

    private function setSessionName(): void
    {
        session_name($this->sessionName);

    }

    /**
     * @param string $prefix
     */

    private function setSessionId(string $prefix="bl"): void
    {
        $this->sessionId = isset($_COOKIE[$this->sessionName]) ? $_COOKIE[$this->sessionName] : session_create_id($prefix);

        session_id($this->sessionId);

    }

    private function setSessionSavePath(string $path): void
    {
        session_save_path($path);
    }

    private function regenerateSessionId(): void
    {
        session_regenerate_id();

        $this->sessionId = session_id();
    }

    private function bootSession(): void
    {

        $this->getLastSessionInfo();

        if (session_name()!="blackHole_session"){

            $this->setSessionName();

            $this->setSessionId();

            $this->setSessionUseCookies();

            $this->setSessionUseOnlyCookies();

            $this->setSessionLifeTime();
        }

        session_start();

    }

    private function downSession(): void
    {
        session_write_close();

        $this->setLastSessionInfo();

    }

    private function getLastSessionInfo() :void
    {

        if (session_name() != "blackHole_session")

        {
            $this->lastSessionInfo["sessionName"] = session_name();


            $this->lastSessionInfo["sessionId"] = session_id();

            $this->lastSessionInfo["sessionSavePath"] = session_save_path();

        }

    }

    private function setLastSessionInfo() :void
    {

         session_name($this->lastSessionInfo["sessionName"]);

         session_id($this->lastSessionInfo["sessionId"]);

         session_save_path($this->lastSessionInfo["sessionSavePath"]);

    }

    /**
     * @param int $time
     */

    public function setSessionLifeTime(int $time = 7200): void
    {
        ini_set("session.cookie_lifetime",$time);
    }

    /**
     * @param bool $bool
     */

    public function setSessionCookieHttpOnly(bool $bool = true): void
    {
        ini_set("session.cookie_httponly", true);
    }

    /**
     * @param bool $bool
     */

    public function setSessionCookieSecure(bool $bool = true): void
    {
        ini_set("session.cookie_secure",true);
    }

    /**
     * @param bool $bool
     */

    public function setSessionUseCookies(bool $bool = true): void
    {
        ini_set("session.use_cookies",true);
    }

    /**
     * @param bool $bool
     */

    public function setSessionUseOnlyCookies(bool $bool = true): void
    {
        ini_set("session.use_only_cookies",true);
    }

    /**
     * @param string $path
     */

    public function setSessionCookiePath(string $path = "/"): void
    {
        ini_set("session.cookie_path",$path);
    }

    /**
     * @param array $data
     * @return array
     */
    public function isSessionDataExists(array $data): array
    {
        return array_filter($data ,function ($session){

                return array_key_exists($session,$_SESSION);

        });
    }
}