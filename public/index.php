<?php

/**
 *
 * Front Controller
 *
 */

/**
 * Require the controller class
 */
//require '../App/Controllers/Posts.php';

/**
 * Twig
 */

require_once '../vendor/autoload.php';

/**
 * Autoloader
 */

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__); //get the root directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
});

/**
 * Error handler
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
//require '../Core/Router.php';

$router = new Core\Router();

//Add the routes
$router->add('', ['controller'=>'Home', 'action'=>'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING']);
