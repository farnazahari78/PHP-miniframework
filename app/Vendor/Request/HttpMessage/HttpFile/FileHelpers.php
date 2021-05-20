<?php


namespace App\Vendor\Request\HttpMessage\HttpFile;


trait FileHelpers
{
    /**
     * @return string
     */
    public function realFileName(): string
    {
        return $this->fileInfoArray["name"];
    }

    /**
     * @return string
     */
    public function fileMimeType(): string
    {
        return $this->fileInfoArray["type"];
    }

    /**
     * @return string
     */

    public function fileTmpName(): string
    {
        return $this->fileInfoArray["tmp_name"];
    }

    /**
     * @return string
     */

    public function fileExt(): string
    {
        $fileCmt = explode(".",$this->realFileName());

        return end($fileCmt);
    }

    /**
     * @param string $unit
     * @param int $precision
     * @return int
     */

    public function fileSize(string $unit = "BYTE" , int $precision = 0): int|float
    {
        return match ($unit) {

            "MB" => $precision ==  0 ? $this->fileInfoArray["size"] / 1024 / 1024 : round($this->fileInfoArray["size"] / 1024 / 1024, $precision),

            "KB" => $precision ==  0 ? $this->fileInfoArray["size"] / 1024  : round($this->fileInfoArray["size"] / 1024, $precision),

            "BYTE" => $this->fileInfoArray["size"]
        };
    }

    /**
     * @return bool
     */

    public function isFileExists(): bool
    {
        return isset($this->fileInfoArray);
    }


}