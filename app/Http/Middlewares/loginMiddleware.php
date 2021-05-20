<?php


namespace App\Http\Middlewares;


use App\Services\Auth\Auth;
use App\Vendor\Request\Request;

class loginMiddleware implements Middleware
{

    public function handle(Request $request)
    {
        if (Auth::check()){

            response()->redirectTo("/dashboard");

        }
    }
}