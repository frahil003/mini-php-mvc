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
require __DIR__ . '/../app/Core/View.php';
require __DIR__ . '/../app/Core/Controller.php';

// Load application controllers
require __DIR__ . '/../app/Controllers/HomeController.php';

// Instantiate and execute the home controller
$controller = new HomeController();
$controller->index();
