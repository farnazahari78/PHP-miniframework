<?php


namespace App\Http\Middlewares;


use App\Vendor\Request\Request;

class formSecurity implements Middleware
{

    public function handle(Request $request)
    {
        if ($request->requestMethod()=="post"){

            $formCsrf = $request->input("_token");

            if (!$formCsrf || $formCsrf != session()->get("_token")){

                response()->pageExpired("errors.419");
            }
        }
    }
}