<?php

namespace App\Route;

class RouteRegistry
{
    private static array $registeredRoutes = [];

    public static function registerRoute(string $path, ?string $alias = null): void
    {
        self::$registeredRoutes[] = [
            'path' => $path,
            'alias' => $alias
        ];
    }

    public static function getRegisteredRoutes(): array
    {
        return self::$registeredRoutes;
    }

    /**
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
