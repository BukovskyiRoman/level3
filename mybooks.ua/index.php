<?php
error_reporting(-1);
use application\core\Router;

$query = trim($_SERVER['REQUEST_URI'], "/");

require 'debug.php';                            //connection function for debugging

/**
 * Autoload function of required classes;
 */
spl_autoload_register(function ($class) {
    $file = str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});

Router::add('^$', ['controller' => 'Books', 'action' => 'view']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-0-9-]+)?$');

Router::dispatch($query);

