<?php

namespace App\Route;

class Router
{
    protected array $routes = [];

    public function addRoute(string $route, string $controller, string $action): void
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch(string $uri = null): void
    {
        $uri = ! empty($uri) ? $uri : $_SERVER['REQUEST_URI'];
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];

            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            header("HTTP/1.0 404 Not Found");
            include('views/404.php');
            exit();
        }
    }
}
