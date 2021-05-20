<?php


namespace App\Services;


use App\Http\Middlewares\formSecurity;
use App\Vendor\Request\Request;
use JetBrains\PhpStorm\Pure;

class bootMiddlewares
{
    private static array $middlewares = [
        
      "post"=>[
          formSecurity::class
      ],

        "get"=>[]

    ];


    /**
     * @return array|string[]
     */

    private static function middlewaresArray(): array
    {
        return static::$middlewares;
    }


    public static function bootMiddlewares()
    {

        $requestObject = Request::makeInstance();

        foreach (static::middlewaresArray() as $method=>$middlewares){

            if ($requestObject->requestMethod() == $method){

                foreach ($middlewares as $middleware){

                    if (class_exists($middleware)){

                        $middlewareObject = new $middleware();

                        $middlewareObject->handle($requestObject);

                    }
                }
            }

            continue;

        }
    }
}