<?php
declare(strict_types=1);

final class App
{
  private Router $router;

  public function __construct()
  {
    // Create a router to manage the routes
    $this->router = new Router();

    // Routes: map paths to controller methods
    // get('/', [HomeController::class, 'index']) -> on GET / call HomeController::index()
    $this->router->get('/', [HomeController::class, 'index']);
  }

  // run(): processes the current HTTP request and executes the matching controller action
  public function run(): void
  {
    // parse_url: extract the path part of the requested URL (e.g. "/about")
    // Fallback to '/' if REQUEST_URI is not set
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

    // Try to find a matching route
    $handler = $this->router->match($method, $path);

    if ($handler === null) {
      // No route found -> 404 Not Found
      http_response_code(404);
      echo '404 Not Found';
      return;
    }

    // Handler is a tuple [Class, Method]
    [$class, $action] = $handler;

    // Instantiate the controller
    $controller = new $class();

    // Check if the method exists on the controller
    if (!method_exists($controller, $action)) {
      // Defensive error: route points to an invalid handler -> server error
      http_response_code(500);
      echo '500 Invalid route handler';
      return;
    }

    // Call the controller method (the method is responsible for output/rendering)
    $controller->$action();
  }
}
