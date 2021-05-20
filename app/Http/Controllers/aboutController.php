<?php


namespace App\Http\Controllers;

use App\Services\View\View;

class aboutController
{
    public function index()
    {
        View::make("about.about",["header"=>"about us"]);
    }
}