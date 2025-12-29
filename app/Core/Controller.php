<?php
// Enable strict type checking for function arguments and return types
declare(strict_types=1);

// abstract: this class cannot be instantiated directly, only inherited by other classes
// It serves as a base class providing common functionality for all controllers
abstract class Controller
{
  // protected: this method can only be used by this class or classes that extend it
  // view: method name that renders a template with data
  // string $view: the name of the template file to render
  // array $data = []: optional array of variables to pass to the template (default: empty)
  // void: this method returns nothing
  protected function view(string $view, array $data = []): void
  {
    // Call the static render() method from the View class
    // This method handles loading and displaying the template file
    View::render($view, $data);
  }
}
