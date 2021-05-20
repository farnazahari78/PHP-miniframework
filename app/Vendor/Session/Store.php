<?php


namespace App\Vendor\Session;


use App\Vendor\Singleton\Singleton;

class Store
{
    use Singleton,IniSession;

    /**
     * @param array $values
     */

    public function put(array $values)
    {
        $this->bootSession();

        foreach ($values as $key=>$value){

            $_SESSION[$key] = $value;
        }

        $this->downSession();
    }

    /**
     * @param string $value
     * @return mixed
     */

    public function get(string $value): mixed
    {

        $this->bootSession();

        $sessionValue = $_SESSION[$value]?? null;

        $this->downSession();

        return  $sessionValue;

    }

    public function delete(string $value): void
    {
        $this->bootSession();

        unset($_SESSION[$value]);

        $this->downSession();
    }

    public function destroy()
    {
        $this->bootSession();

        session_destroy();

        $this->downSession();
    }

    public function destroyTmp(): void
    {

        $tmpNames = include_once CONFIGS .'tmpSessionToDelete.php';

        $tmpNames = $this->isSessionDataExists($tmpNames);

        foreach ($tmpNames as $tmpName){

            $this->delete($tmpName);

        }
    }

}