<?php


namespace App\Http\Controllers;


use App\Models\Users;

use App\Services\Auth\Auth;

use App\Services\Mail\Mail;

use App\Services\View\View;

use App\Vendor\Request\Request;

class contactController
{
    public function index()
    {
        View::make("form.contact",["header"=>"contact us"]);

    }

    public function store(Request $request)
    {

        $request->flashOnly(["subject","contact.email"]);

        $rules = [

                "contact.name"=>["required","min:3","max:30","alpha"],

                "contact.email"=>["required","email"],

                "subject"=>["required","min:3","max:30","text"],

                "message"=>["required","min:2","text"]

        ];

        $customMessage = [

            "contact.name.required"=>"فیلد وارد شده را باید پر کنید",

            "contact.email.required"=>"ما نیاز داریم که ایمیل شما را بدانیم",

            "contact.email.email"=>"ایمیل وارد شده صحیح نمیباشد",

            "message.text"=>"متن ارسالی حاوی کاراکتر های غیر مجاز میباشد",

            "contact.customerName.unique" => "یورنیم وارد شده قبلا انتخاب شده است"
        ];

        $request->validate($rules,$customMessage);

        Mail::setCustomMailConfig(["fromName"=>$request->input("contact.name"),"replyTo"=>$request->input("contact.email")]);

        $result = Mail::sendMail("test@gmail.com",$request->input("subject"),$request->input("message"));

        $result ? message()->put(["congratulations"=>"we will get in touch with you as soon as possible"]) :

            message()->put(["notSend"=>"sorry!something went wrong"]);

        response()->redirectBack();
    }
}