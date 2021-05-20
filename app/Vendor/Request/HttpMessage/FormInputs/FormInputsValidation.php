<?php
namespace App\Vendor\Request\HttpMessage\FormInputs;

use App\Vendor\Response\Response;
use Illuminate\Database\Capsule\Manager as DB;
use JetBrains\PhpStorm\Pure;

trait FormInputsValidation
{
    /**
     * @var array
     */

    private array $validationErrorMessage=[];

    /**
     * @var array
     */

    private array $validationFileArray;

    /**
     * @param array $rules
     */

    private array $customMessages=[];

    /**
     * @param array $rules
     * @param array $messages
     */

    public function validate(array $rules , array $messages = []):void

    {
        $this->sanitizeCustomErrorMessages($messages);

        foreach ($rules as $key=>$rule){

            foreach ($rule as $ruleMethod){

                    $filter = $ruleMethod;

                    if (str_contains($ruleMethod,':')){

                        $ruleMethod = strstr($ruleMethod,':',1);

                    }

                $this->$ruleMethod($key , $filter);
            }
        }

        $this->checkValidationStatus();
    }

    private function checkValidationStatus(){

        if (count($this->validationErrorMessage) > 0){

            $this->replaceCustomMessages();

            errors()->put($this->validationErrorMessage);

            \response()->redirectBack();

            exit();

        }
        else
        {
            session()->destroyTmp();
        }
    }
    /**
     * @param string $input
     * @param string $filter
     */
    private function required(string $input , string $filter): void
    {
        $result = $this->checkIsArrayOffset($input) ? ($this->getArrayOffset($input) ? true : false)

            : ($this->input($input) ? true : false);

        if (!$result){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @return string
     */

    #[Pure] private function checkErrorInputName(string $input): string {

        return  str_contains($input,'.') ? ltrim(strstr($input,'.'),'.') : $input;
    }

    /**
     * @param string $input
     * @return mixed
     */

    #[Pure] private function checkIsArrayOffset(string $input) : bool{

        if (str_contains($input,'.')){

            return true;
        }

        return  false;
    }

    /**
     * @param string $input
     * @return mixed\
     */

    private function getArrayOffset(string $input): mixed
    {
        if ($array = $this->input(strstr($input,'.',1))){

            $key = ltrim(strstr($input,'.'),'.');

            if (array_key_exists($key,$array)){

                return $array[$key];

            }

            return  false;
        }
        return false;
    }
    /**
     * @param string $input
     * @param string $filter
     */

    private function min(string $input , string $filter): void
    {

        $inputValue = $this->checkInputType($input);

        $min = ltrim(strstr($filter,':'),':');

        if (strlen($inputValue) < $min) {

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages(strstr($filter,':',1),[$min,$input],["/:min/"]);

            $this->setValidationErrorMessage($input,$validationMessage);

        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function max(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        $max = ltrim(strstr($filter,':'),':');

        if (strlen($inputValue) > $max) {

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages(strstr($filter,':',1),[$max,$input],["/:max/"]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    /**
     * @param string $input
     * @param string $filter
     */

    private function unique(string $input , string $filter): void
    {

        $inputValue = $this->checkInputType($input);

        $table = ltrim(strstr($filter,':'),':');

        $input = $this->checkErrorInputName($input);

        $count = DB::table($table)->where($input,$inputValue)->count();

        if ($count > 0) {

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages(strstr($filter,':',1),[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);

        }
    }

    private function alpha(string $input , string $filter): void
    {

        $inputValue = $this->checkInputType($input);

        if (!preg_match("/^(?: *[a-zA-Z]+ *)+$/m",$inputValue)){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @return mixed
     */

    private function checkInputType(string $input): mixed{

        return $this->checkIsArrayOffset($input) ? ($this->getArrayOffset($input) ? trim($this->getArrayOffset($input)) : null)

            : ($this->input($input) ? trim($this->input($input)) : null);
    }

    private function alpha_dash(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        if (!preg_match("/^(?: *[a-zA-Z\-\_\.\']+ *)+$/m",$inputValue)){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function alpha_num(string $input , string $filter): void
    {

        $inputValue = $this->checkInputType($input);

        if (!preg_match("/^[a-zA-Z0-9\.\']*$/m",$inputValue)){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @param string $filter
     */
    private function text(string $input , string $filter): void
    {

        $inputValue = $this->checkInputType($input);

        if (!preg_match("/^(?:\s*[a-zA-Z\.\'?!\-&\!@\()+=_\\\]+\s*)+$/m",$inputValue)){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function boolean(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        if (!is_bool($inputValue)){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function confirmed(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        $passwordConfirmation = $this->input("password_confirmation");

        if (!isset($passwordConfirmation) || $passwordConfirmation!=$inputValue ){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage("password_confirmation",$validationMessage);

        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function date(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        if (!(bool)strtotime($inputValue)){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);

        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function email(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        if (!preg_match("/^[a-zA-Z](?:[a-zA-Z0-9-_\.]*)@[a-zA-z]{2,10}(?:\.[a-zA-Z]{2,6}){1,3}$/",$inputValue)){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function ends_with(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        $ends_with = ltrim(strstr($filter,':'),':');

        if (!str_ends_with($inputValue,$ends_with)) {

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages(strstr($filter,':',1),[$ends_with,$input],["/:value/"]);

            $this->setValidationErrorMessage($input,$validationMessage);

        }
    }

    /**
     * @param string $input
     * @param string $filter
     * @return void
     */

    private function is_file(string $input , string $filter): void
    {
            if (!$this->file($input)->isFileExists()){

                $validationMessage = $this->getValidationMessages($filter,[$input]);

                $this->setValidationErrorMessage($input,$validationMessage);
            }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function image(string $input , string $filter): void
    {
        if (!$this->file($input)->isFileExists() || explode("/",$this->file($input)->fileMimeType())[0]!="image"){

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function integer(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        if (!preg_match("/^[0-9]*$/m",$inputValue)){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function is_ip(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        if (!preg_match("/^(\d*\.){3}\d{1,3}$/m",$inputValue)){

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages($filter,[$input]);

            $this->setValidationErrorMessage($input,$validationMessage);
        }
    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function mimes(string $input , string $filter): void
    {
        $allowedExt = explode(",",ltrim(strstr($filter,':'),':'));

        $file = $this->file($input);

        if ($file->isFileExists()){

            if (!in_array(strtolower($file->fileExt()),$allowedExt)){

                $validationMessage = $this->getValidationMessages(strstr($filter,":",1),[implode(",",$allowedExt),$input],["/:values/"]);

                $this->setValidationErrorMessage($input,$validationMessage);

            }
        }

    }

    /**
     * @param string $input
     * @param string $filter
     */

    private function starts_with(string $input , string $filter): void
    {
        $inputValue = $this->checkInputType($input);

        $ends_with = ltrim(strstr($filter,':'),':');

        if (!str_starts_with($inputValue,$ends_with)) {

            $input = $this->checkErrorInputName($input);

            $validationMessage = $this->getValidationMessages(strstr($filter,':',1),[$ends_with,$input],["/:value/"]);

            $this->setValidationErrorMessage($input,$validationMessage);

        }
    }


    /**
     * @param string $filter
     * @param array $values
     * @param array $titles
     * @return string|string[]|null
     */

    private function getValidationMessages(string $filter , array $values , array $titles = []): array|string|null
    {
        if (!isset($this->validationFileArray)){

            $this->validationFileArray = include_once RESOURCES.'lang/validation'.'.php';

        }

        $validationArray = $this->validationFileArray;

        $validationMessageText=$validationArray[$filter];

        array_push($titles,'/:attribute/');

        return [$filter,preg_replace($titles,$values,$validationMessageText)];

    }

    /**
     * @param string $input
     * @param string $errorMessage
     */

    private  function setValidationErrorMessage(string $input,array $errorMessage): void
    {
        if (!array_key_exists($input,$this->validationErrorMessage)){

            $this->validationErrorMessage[$input] = [];
        }
        $errorKey = $errorMessage[0];

        $this->validationErrorMessage[$input][$errorKey] = $errorMessage[1];

    }

    /**
     * @param array $messages
     */

    private function sanitizeCustomErrorMessages(array $messages): void
    {

        if (count($messages) > 0){

            $messageKeys = array_keys($messages);

            array_walk($messageKeys,function (&$keys){

                if (substr_count($keys,'.') > 1){

                    $keys = ltrim(strstr($keys,'.'),'.');

                }
            });

            $this->customMessages = array_combine($messageKeys,array_values($messages));
        }
    }

    private function replaceCustomMessages(): void
    {
        if (count($this->customMessages) > 0){

            foreach ($this->customMessages as $key=>$message){

                $keyName  = strstr($key,'.',1);

                if (array_key_exists($keyName , $this->validationErrorMessage)){

                    $errorKey = ltrim(strstr($key,'.'),'.');

                    if (array_key_exists($errorKey,$this->validationErrorMessage[$keyName])){

                        $this->validationErrorMessage[$keyName][$errorKey] = $message;
                    }
                }

            }
        }
    }
}