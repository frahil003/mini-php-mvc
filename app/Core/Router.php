<?php
declare(strict_types=1);

// Simple HTTP router: stores routes and matches incoming requests to handlers
final class Router
{
  /**
   * @var array<string, array<string, array{0: class-string, 1: string}>>
   */
  // $routes: organized by HTTP method -> path -> handler (handler is [ControllerClass, 'method'])
  private array $routes = [
    'GET' => [],
    'POST' => [],
  ];

  /**
   * Register a GET route.
   *
   * @param array{0: class-string, 1: string} $handler Handler as [ClassName::class, 'method']
   */
  public function get(string $path, array $handler): void
  {
    $this->routes['GET'][$this->normalize($path)] = $handler;
  }

  /**
   * Register a POST route.
   *
   * @param array{0: class-string, 1: string} $handler Handler as [ClassName::class, 'method']
   */
  public function post(string $path, array $handler): void
  {
    $this->routes['POST'][$this->normalize($path)] = $handler;
  }

  /**
   * Match an incoming request method and path to a registered handler.
   *
   * Returns the handler [ClassName, 'method'] or null if no match.
   *
   * @return array{0: class-string, 1: string}|null
   */
  public function match(string $method, string $path): ?array
  {
    // Normalize method to uppercase and path to a consistent form before lookup
    $method = strtoupper($method);
    $path = $this->normalize($path);

    return $this->routes[$method][$path] ?? null;
  }

  // normalize(): ensure paths are in the form "/..." with no trailing slash (except root)
  private function normalize(string $path): string
  {
    $path = '/' . trim($path, '/');
    return $path === '//' ? '/' : $path;
  }
}
