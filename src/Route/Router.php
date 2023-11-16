<?php

namespace App\Route;

/**
 * Class Router.
 */
class Router
{
    /**
     * The array of routes.
     *
     * @var array
     */
    private array $routes = [];

    /**
     * To add a route.
     *
     * @param string $route Route name.
     * @param string $controller Controller name.
     * @param string $action Action name.
     * @return void
     */
    public function addRoute(string $route, string $controller, string $action): void
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * To dispatch the route.
     *
     * @param string|null $uri URI.
     * @return void
     */
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
