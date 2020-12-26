<?php
/**
 * Because of some changes we are making to the way our app works we need to change some things in our routes file.
 * 
 * Instead of calling methods using an address with a $_GET key of "action" we will get the URI (the subfirectory which followes our virtual host name i.e. the /add in www.elephants.local/add).
 * 
 * We can do this using $_SERVER['REQUEST_URI'] and the parse_url() function.
 * 
 * First we need to require our \Controllers\ElephantController class and create a new instance of our Controller using its namespace.
 */
$controller = new \Controllers\ElephantController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/**
 * Then we will use a switch statement to check the value of the URI key and call the corresponding method in response. Previously, we only used our routes file to call the create, update and delete methods but we will also by using it to call read(), add() and edit() methods now.
 */
switch ($uri) {
  case '/':
    echo $controller->read();
    break;

  case '/add':
    echo $controller->add();
    break;

  case '/edit':
    echo $controller->edit($_GET['id']);
    break;

  case '/create':
    $controller->create($_POST);
    break;

  case '/update':
    $controller->update($_POST);
    break;

  case '/delete':
    $controller->delete($_POST);
    break;

  default:
    echo $controller->read();
}
