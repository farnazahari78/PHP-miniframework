<?php


namespace App\Http\Controllers;

use App\Http\Middlewares\homeSecurity;
use App\Models\Customers;
use App\Models\Users;
use App\Services\Auth\Auth;
use App\Services\Mail\Mail;
use App\Services\View\View;
use App\Vendor\Request\HttpMessage\HttpFile\UploadFile;
use App\Vendor\Request\Request;
use App\Vendor\Response\Response;

class homeController
{
    public function index()
    {
       View::make("index.index");

    }

}