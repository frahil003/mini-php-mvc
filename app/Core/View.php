<?php
// Enable strict type checking for function arguments and return types
declare(strict_types=1);

// final: prevents this class from being extended by other classes
final class View
{
  // static: this method can be called without creating an object instance (View::render())
  // render: method that loads and displays a template file with data
  // string $view: the name of the template file (without .php extension)
  // array $data = []: optional associative array of variables for the template
  // void: this method returns nothing
  public static function render(string $view, array $data = []): void
  {
    // Build the full file path to the template
    // __DIR__: current directory of this file (/app/Core)
    // '../Views/': go up one level, then into the Views folder
    $file = __DIR__ . '/../Views/' . $view . '.php';

    // Check if the template file exists
    if (!is_file($file)) {
      // Set HTTP status code to 500 (Internal Server Error)
      http_response_code(500);
      // Display error message (htmlspecialchars prevents code injection)
      // ENT_QUOTES: converts both double and single quotes to HTML entities
      // UTF-8: character encoding for proper handling of special characters
      echo "View not found: " . htmlspecialchars($view, ENT_QUOTES, 'UTF-8');
      return; // Exit the method early
    }

    // extract(): converts array keys into variables available in the template
    // EXTR_SKIP: don't overwrite existing variables
    // Example: ['title' => 'Home'] becomes $title = 'Home'
    extract($data, EXTR_SKIP);
    
    // Load and execute the template file
    require $file;
  }
}
