<?php


namespace App\Vendor\MessageBag;


use App\Vendor\Singleton\Singleton;

abstract class MessageBagAbstract
{

    public abstract function __construct();

    /**
     * @return mixed
     */
    public function all(): mixed
    {
        return session()->get($this->MessageName()) ?

            session()->get($this->MessageName()) : (session()->get($this->MessageName().'Tmp') ?

                session()->get($this->MessageName().'Tmp') : false );
    }

    /**
     * @return bool
     */

    public function any(): bool
    {
        return session()->get($this->MessageName()) ?

            true : (session()->get($this->MessageName().'Tmp') ?

                true : false );
    }

    /**
     * @param string $name
     * @return mixed
     */

    public function get(string $name): mixed
    {
        return session()->get($this->MessageName())?

            (array_key_exists($name,session()->get($this->MessageName())) ? session()->get($this->MessageName())[$name] : null

            ):
            (session()->get($this->MessageName().'Tmp') ?

                (array_key_exists($name,session()->get($this->MessageName().'Tmp')) ?

                    is_array(session()->get($this->MessageName().'Tmp')[$name]) ? array_values(session()->get($this->MessageName().'Tmp')[$name]) :  session()->get($this->MessageName().'Tmp')[$name]

                        : (str_contains($name,'.') ? (

                        array_key_exists(ltrim(strstr($name,'.'),'.'), session()->get($this->MessageName().'Tmp')[strstr($name,'.',1)])

                        ? session()->get($this->MessageName().'Tmp')[strstr($name,'.',1)][ltrim(strstr($name,'.'),'.')] : null

                    ) : null) ): null );
    }

    public function has(string $name): bool
    {
        if (session()->get($this->MessageName())){
            if (array_key_exists($name,session()->get($this->MessageName()))){

                return true;
            }
            else
            {
                return false;
            }
        }
        elseif (session()->get($this->MessageName().'Tmp')){

            if (array_key_exists($name,session()->get($this->MessageName().'Tmp'))){

                return true;
            }
            else
            {
                return false;
            }
        }

        return false;
    }

    /**
     * @param mixed $values
     */

    public function put(mixed $values): void
    {
        $insertValues[$this->MessageName()] = $values;

        session()->put($insertValues);

    }

    private function tempFlush(): void
    {
        $insertValues[$this->MessageName()."Tmp"] = $this->all();

        session()->put($insertValues);
    }

    /**
     * @return bool
     */

    private function currentSessionFlush(): bool
    {
        if (session()->get($this->MessageName())){

            return  true;
        }

        return  false;

        
    }

    private function isTmp(): bool
    {
        if (session()->get($this->MessageName()."Tmp")){

            return  true;
        }
        return  false;
    }

    protected function
    flush(): void

    {

        if ($this->currentSessionFlush()){

            $this->tempFlush();

            session()->delete($this->MessageName());

        }
        else
        {
            if ($this->isTmp()){

                session()->delete($this->MessageName()."Tmp");

            }
        }
    }

    protected abstract function MessageName(): string;

}