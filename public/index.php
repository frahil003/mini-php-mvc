<?php
/**
 * Application Entry Point
 * 
 * This is the main entry point for the MVC application.
 * All requests are routed through this file.
 */

// Enable strict type checking for all function arguments and return types
declare(strict_types=1);

// Load core framework classes
// These files provide the minimal MVC framework (View rendering, Controller base, Routing, App bootstrap)
require __DIR__ . '/../app/Core/View.php';
require __DIR__ . '/../app/Core/Controller.php';
require __DIR__ . '/../app/Core/Router.php';
require __DIR__ . '/../app/Core/App.php';

// Load application controllers
// Application-specific controllers (handle request logic)
require __DIR__ . '/../app/Controllers/HomeController.php';

// Create and run the application
// App bootstraps routing and dispatches the current HTTP request to the correct controller/action
$app = new App();
$app->run();