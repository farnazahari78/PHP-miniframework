<?php


namespace App\Services\Auth;


use App\Models\Users;
use Illuminate\Database\Eloquent\Model;

class Auth
{
    public static function login(Model $user , bool $rememberMe)
    {

        $email = $user->email;

        $password = $user->password;

        session()->put(["login_web"=>["email"=>$email,"password"=>$password]]);

        if ($rememberMe){

            static::rememberMe($user);
        }

    }

    public static function logout()
    {
        if (session()->get("login_web")){

            session()->delete("login_web");
        }

        if (isset($_COOKIE["remember_Web"]))
        {
            static::removeRememberMe($_COOKIE["remember_Web"]);

        }
    }

    public static function check(): bool
    {
        $loginInfo = session()->get("login_web");

        if (!is_null($loginInfo))
        {
            if (Users::query()->where(["email"=>$loginInfo["email"],'password'=>$loginInfo["password"]])->get()){

                return  true;
            }
            return  false;
        }

        elseif (isset($_COOKIE["remember_Web"]))
        {
            if (static::checkRemember($_COOKIE["remember_Web"]))

            {
                return  true;
            }

            return  false;
        }

        return false;

    }

    private static function rememberMe(Model $user)
    {

        $rememberMeToken = hash("sha256",hashGenerator(10));

        session_id(session_create_id("rem"));

        session_set_cookie_params(31536000);

        session_name("remember_Web");

        session_start();

        $_SESSION["rememberToken"] = $rememberMeToken;

        session_write_close();

        $user->update(["remember_token"=>$rememberMeToken]);

    }

    private static function checkRemember(string $id): bool

    {
        session_id($id);

        session_set_cookie_params(31536000);

        session_name("remember_Web");

        session_start();

        $sessionInfo = $_SESSION;

        session_write_close();

        if (isset($sessionInfo["rememberToken"]))
        {
            if ($user = Users::query()->where("remember_token",$sessionInfo["rememberToken"])->first())

            {
                static::rememberMe($user);

                return  true;
            }

            return false;
        }

        return false;

    }

    public static function attempt(array $cred , bool $remember): bool
    {
        $check = Users::query()->where($cred)->first();

        if ($check)
        {

            static::login($check,$remember);

            return true;
        }

        return  false;
    }

    private static function removeRememberMe(string $id)
    {
        session_id($id);

        session_name("remember_Web");

        session_start();

        if (isset($_SESSION["rememberToken"]))
        {
            $token = $_SESSION["rememberToken"];
        }

        session_destroy();

        session_write_close();

        setcookie("remember_Web",'',time() - 10);

        if (isset($token))
        {
            $user = Users::query()->where("remember_token",$token)->first();

            $user->update(["remember_token"=>""]);
        }
    }

}