<?php


namespace App\Vendor\Request\HttpMessage\HttpFile;


use App\Vendor\Singleton\Singleton;

class UploadFile
{
    use FileHelpers,Singleton;

    private string $fileInputName;

    private array  $fileInfoArray;

    /**
     * @param string $fileName
     *  @return void
     */

    private function iniFile(string $fileName): void
    {
        $this->fileInputName = $fileName;

        $this->iniFileArrayInfo();
    }

    /**
     * @return bool
     */

    private function iniFileArrayInfo(): bool
    {

        if (isset($_FILES) && count($_FILES) > 0 && array_key_exists($this->fileInputName,$_FILES)){

            if (is_uploaded_file($_FILES[$this->fileInputName]["tmp_name"])){

                $this->fileInfoArray = $_FILES[$this->fileInputName];

                return true;

            }
        }
        return false;
    }

    /**
     * @param string $path
     * @param string|null $fileAs
     * @return bool
     */

    public function store(string $path , string $fileAs = null): bool
    {

        $saveFileName = !is_null($fileAs) ? $fileAs.'.'.$this->fileExt() : time().$this->realFileName();

        $this->makeFile($path);

        $saveFilePath = FILE_STORAGE.$path.'/'.$saveFileName;

        if (move_uploaded_file($this->fileTmpName(),$saveFilePath)){

            return true;
        }
        return  false;
    }

    /**
     * @param string $fileName
     */

    private function makeFile(string $fileName): void
    {
        if (!file_exists(FILE_STORAGE.$fileName)){

            mkdir(FILE_STORAGE.$fileName);
        }
    }


    /**
     * @param string $name
     * @param array $arguments
     * @return void
     */

    public function __call(string $name, array $arguments): void
    {
        if (method_exists($this,$name)){

            $this->$name(... $arguments);
        }
    }
}