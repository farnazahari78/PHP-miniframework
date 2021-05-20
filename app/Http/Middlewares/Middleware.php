<?php


namespace App\Http\Middlewares;


use App\Vendor\Request\Request;

interface Middleware
{
    public function handle(Request $request);
}