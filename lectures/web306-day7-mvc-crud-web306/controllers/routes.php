<?php
/**
 * Noneo of our methods will run without being called. We will call the create, update and delete methods by pointing the action of a form to an address with a $_GET key of "action" and a value which amtches the name of the method being called.
 * 
 * First we need to require our ElephantController class and create a new instance of our Controller class.
 * 
 * Then we will use a switch statement to check the value of the "action" key and call the corresponding method in response.
 */
require 'ElephantController.php';

$controller = new ElephantController;

$action = $_GET['action'];

switch ($action) {
    case 'create':
        $controller->create($_POST);
        break;
    case 'update':
        $controller->update($_POST);
        break;
    case 'delete':
        $controller->delete($_POST);
        break;
    // If the key does not match any of the methods the nthe file will just redirect back to the view page.
    default:
        header('Location: views/view-elephant.php');
        exit();
}