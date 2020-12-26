<?php

require 'RepoController.php';

$controller = new RepoController;

$action = $_GET['action'];

switch ($action) {
    case 'create':
        $controller->create($_REQUEST, $_FILES);
        break;
    case 'update':
        $controller->update($_REQUEST['id'], $_REQUEST, $_FILES);
        break;
    case 'delete':
        $controller->delete($_REQUEST['id']);
        break;
    default:
        // If the key does not match any of the methods the nthe file will just redirect back to the view page.
        header('Location: ../views/index.php');
}
