<?php
require_once 'config/variables.php';
require_once 'config/database.php';
require_once 'controllers/RouterController.php';
session_start();

$db = new Database();
$routerController = new RouterController($db);

$routerController->dispatch();
?>