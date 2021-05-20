<?php


namespace App\Vendor\Request\HttpMessage;


use App\Vendor\Request\HttpMessage\FormInputs\FormInputs;

trait HttpMessage
{
    use HttpRequestMessage,FormInputs;

}