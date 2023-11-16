<?php

namespace App\Controller;

use App\Attribute\RegisterRoute;
use App\Route\Router;
use ReflectionClass;

/**
 * Abstraction AbstractController.
 */
abstract class AbstractController
{
    /**
     * Base controller render method.
     *
     * @param string $view The view to render.
     * @param array $data The data to pass to the view.
     * @return void
     */
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        $pageTitle = $pageTitle ?? 'Page Title';
        if (isset($renderRaw)) {
            include "../views/$view.php";
        } else {
            include "../views/main.php";
        }
    }


    /**
     * To register all routes.
     *
     * @param Router $router Class Router.
     * @return void
     */
    public static function registerRoutes(Router $router): void
    {
        $reflectionClass = new ReflectionClass(static::class);
        $methods = $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            $attributes = $method->getAttributes(RegisterRoute::class);
            foreach ($attributes as $attribute) {
                $route = $attribute->newInstance();
                $router->addRoute($route->getPath(), static::class, $method->getName());
            }
        }
    }
}
