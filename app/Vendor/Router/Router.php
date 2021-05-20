<?php


namespace App\Vendor\Router;

use App\Vendor\Request\Request;

class Router
{
    /**
     * @var Request
     */

    private Request $requestInstance;

    /**
     * @var array
     */

    private array $registeredRoute;

    /**
     * Router constructor.
     */

    public function __construct()
    {
        $this->requestInstance = Request::makeInstance();
    }

    /**
     * @param string $path
     * @param array $action
     * @param string $middleware
     */

    public function get(string $path,array $action , string $middleware): void
    {
        $this->iniRegisterRoute($path,$action,$middleware);
    }

    /**
     * @param string $path
     * @param array $action
     * @param string $middleware
     */

    public function post(string $path,array $action , string $middleware): void
    {
        $this->iniRegisterRoute($path,$action ,  $middleware);

    }

    /**
     * @param string $path
     * @param array $action
     * @param string $middleware
     */

    public function put(string $path,array $action , string $middleware): void
    {
        $this->iniRegisterRoute($path,$action ,  $middleware);

    }

    /**
     * @param string $path
     * @param array $action
     * @param string $middleware
     */

    public function patch(string $path,array $action , string $middleware): void
    {
        $this->iniRegisterRoute($path,$action ,  $middleware);

    }

    /**
     * @param string $path
     * @param array $action
     * @param string $middleware
     */
    public function delete(string $path,array $action , string $middleware): void
    {
        $this->iniRegisterRoute($path, $action , $middleware);

    }
    /**
     * @param array $methods
     * @param string $path
     * @param array $action
     * @param string $middleware
     */

    public function match(array $methods,string $path,array $action , string $middleware): void
    {
       $this->iniRegisterRoute($path,$action , $middleware);
    }

    /**
     * @param string $path
     * @param array $action
     * @param string $middleware
     */

    private function iniRegisterRoute(string $path,array $action , string $middleware): void
    {
        $requestMethod = $this->requestInstance->requestMethod();

        $current_route = $this->requestInstance->path();

        $controller = $action[0];

        $controllerMethod = $action[1];

        $this->registeredRoute=[

            "registeredRoutePath"=>$path,

            "current_route"=>$current_route,

            "request_method"=>$requestMethod,

            "controller"=>$controller,

            "controllerMethod"=>$controllerMethod,

            "middleware" => $middleware
        ];

        \App\Services\Router::registerRoute($this->registeredRoute);
    }
}