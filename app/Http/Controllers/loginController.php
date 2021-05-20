<?php


namespace App\Http\Controllers;


use App\Services\Auth\Auth;
use App\Services\View\View;
use App\Vendor\Request\Request;

class loginController
{
    public function index()
    {
        View::make("login.login",["header"=>"login"]);
    }

    public function store(Request $request)
    {
        $rules = [

          "email"=>["required","email"],

          "password"=>["required"]

        ];

        $request->validate($rules);

        $result = Auth::attempt($request->only(["email","password"]),true);

        if ($result)
        {
            response()->redirectTo("/dashboard");
        }

        else
        {
            message()->put(["failed"=>"username or password is wrong"]);

            response()->redirectBack();
        }
    }

    public function show()
    {

        View::make("login.dashboard");
    }


    public function delete()
    {
        Auth::logout();

        response()->redirectTo("/");

    }

}