<?php


namespace App\Vendor\Request\HttpMessage\FormInputs;


use App\Vendor\Request\HttpMessage\HttpFile\UploadFile;
use JetBrains\PhpStorm\Pure;

trait FormInputs
{
    use FormInputsValidation;

    /**
     * @return array
     */

    public function all(): array
    {
        return $_REQUEST;
    }

    /**
     * @return array
     */

    private function getMethodParams(): array
    {
        return $_GET;
    }

    /**
     * @return array
     */

    private function postMethodParams(): array
    {
        return $_POST;
    }

    /**
     * @param string $input
     * @return bool
     */

    #[Pure] public function has(string $input): bool
    {
        return array_key_exists($input,$this->all());
    }

    /**
     * @param string|null $input
     * @param mixed|null $inputDefault
     * @return array|null
     */

    #[Pure] public function input(string $input = null , mixed $inputDefault = null): array|null|string
    {
        return is_null($input) ? $this->postMethodParams() : (

        array_key_exists($input,$this->postMethodParams()) ? $this->postMethodParams()[$input] :

            ($this->checkIsArrayOffset($input) ? ($this->getArrayOffset($input) ?

                $this->getArrayOffset($input) :(is_null($inputDefault) ? null : $inputDefault))

                : (is_null($inputDefault) ? null : $inputDefault))
        );
    }

    /**
     * @param string|null $input
     * @param mixed|null $inputDefault
     * @return array|mixed|null
     */

    #[Pure] public function query(string $input = null , mixed $inputDefault = null): mixed
    {
        return is_null($input) ? $this->getMethodParams() : (

        array_key_exists($input,$this->getMethodParams()) ? $this->getMethodParams()[$input] :

            (is_null($inputDefault) ? null : $inputDefault)
        );
    }

    /**
     * @param array $inputs
     * @return mixed
     */

    #[Pure] public function only(array $inputs): mixed
    {

        $postParams = $this->postMethodParams();

        foreach ($inputs as $input){

            if (!str_contains($input,'.')){

                if (array_key_exists($input,$postParams)){

                    $only[$input] = $postParams[$input];
                }
            }
            else
            {
                $inputKey = $this->checkErrorInputName($input);

                $input = strstr($input,'.',1);

                if (array_key_exists($input,$postParams))
                {
                    if (array_key_exists($inputKey,$postParams[$input])){

                        $only[$input][$inputKey] =  $postParams[$input][$inputKey];
                    }
                }
            }
        }

        return $only;
    }

    /**
     * @param array $inputs
     * @return array
     */

    #[Pure] public function except(array $inputs): array
    {

        $postParams = $this->postMethodParams();

        foreach ($inputs as $input){

            if (!str_contains($input,'.')){

                if (array_key_exists($input,$postParams)){

                    unset($postParams[$input]);
                }
            }
            else
            {
                $inputKey = $this->checkErrorInputName($input);

                $input = strstr($input,'.',1);

                if (array_key_exists($input,$postParams))
                {
                    if (array_key_exists($inputKey,$postParams[$input])){

                        unset($postParams[$input][$inputKey]);

                    }
                }
            }
        }

        return $postParams;
    }

    /**
     * @param string $input
     * @return bool
     */

    #[Pure] public function filled(string $input): bool
    {
        return array_key_exists($input,$this->getMethodParams()) ?

            strlen($this->getMethodParams()[$input]) > 0 : false;
    }

    /**
     * @param string $fileName
     * @return UploadFile
     */

    public function file(string $fileName): UploadFile
    {
        $uploadFile = UploadFile::makeInstance();

        $uploadFile->iniFile($fileName);

        return $uploadFile;
    }


    public function flash(): void
    {

        old()->put($this->input());

    }

    /**
     * @param array $values
     */

    public function flashOnly(array $values): void
    {
        old()->put($this->only($values));
    }

    /**
     * @param array $values
     */

    public function flashExcept(array $values): void
    {
        old()->put($this->except($values));
    }

}