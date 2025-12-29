<?php
// Enable strict type checking for function arguments and return types
declare(strict_types=1);

// final: prevents this class from being extended by other classes
// extends Controller: inherits properties and methods from the base Controller class
final class HomeController extends Controller
{
  // Public method that handles requests to the home page
  // void: indicates this method returns nothing (no return value)
  public function index(): void
  {
    // Call the view() method (inherited from Controller) to render a template
    // 'home': name of the template file to display
    // Array: passes data to the template that can be used in the HTML
    $this->view('home', [
      'title' => 'Mini MVC',              // Page title
      'message' => 'Framework läuft ✅',  // Welcome message
    ]);
  }
}
