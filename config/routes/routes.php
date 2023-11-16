<?php

namespace config\routes\Route;

use App\Controller\HomeController;
use App\Controller\UserController;
use App\Route\Router;

$router = new Router();

// Get all classes that have the RegisterController attribute
$classesWithControllerAttribute = [
    UserController::class,
    HomeController::class,
];

foreach ($classesWithControllerAttribute as $controllerClass) {
    // Register routes for each controller
    $controllerClass::registerRoutes($router);
}

// Dispatch the router
$router->dispatch();
