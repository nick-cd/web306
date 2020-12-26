<?php
/**
 * In order for our AutoLoader class to work, we need to require it into every page which needs access to our classes which kind of deffeats the purpose of using an autoloader.
 * 
 * To avoid needing to require this file in every file we will require it in an index.php file which we will place in a public directory which is located in the root directory of our app and we will use this file to import every page.
 * 
 * Then to initialize the Autoloader class we will call the get_loader() method.
 * We will also be requiring a third-party autoloader in this file which will allow us to use external libraries.
 */
$root = realpath(__DIR__ . '/..');

$composer_autoload = $root . '/vendor/autoload.php';
$custom_autoloader = $root . 'utilities/Autoloader.php';
$routes = $root . '/controllers/routes.php';

require $composer_autoload;
require $custom_autoloader;

Autoloader::get_loader();

/**
 * To import every page in our application into this file we will require our routes.php file at the bottom of this file.
 */
require $routes;