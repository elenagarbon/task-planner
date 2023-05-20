<?php
require_once 'config/variables.php';
require_once 'controllers/RouterController.php';
session_start();

$routerController = new RouterController();

$routerController->dispatch();
?>