<?php

namespace App\Route;

/**
 * Class RouteRegistry.
 */
class RouteRegistry
{
    /**
     * Array of registered routes.
     *
     * @var array
     */
    private static array $registeredRoutes = [];

    /**
     * To register a route.
     *
     * @param string $path Route path.
     * @param string|null $alias Route alias.
     * @return void
     */
    public static function registerRoute(string $path, ?string $alias = null): void
    {
        self::$registeredRoutes[] = [
            'path' => $path,
            'alias' => $alias
        ];
    }

    /**
     * To get registered routes.
     *
     * @return array
     */
    public static function getRegisteredRoutes(): array
    {
        return self::$registeredRoutes;
    }

    /**
     * To get a route by alias.
     *
     * @throws \Exception
     */
    public static function getRegisteredRoute(string $alias): string
    {
        foreach (self::$registeredRoutes as $route) {
            if ($route['alias'] === $alias) {
                return $route['path'];
            }
        }
        throw new \Exception('Route not found');
    }
}
