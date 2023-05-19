<?php
require_once 'helpers/Request.php';
require_once 'helpers/Session.php';

class RouterController {
    private $db;
    private $request;
    private $session;

    public function __construct($db) {
        $this->db = $db;
        $this->request = new Request();
        $this->session = new Session();
    }

    public function dispatch() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'main';

        switch ($action) {
            case 'login':
                if ($this->session->isLoggedIn()) {
                    header('Location: index.php?action=dashboard');
                } else {
                    require_once 'views/login.php';
                }
                break;
            case 'register':
                if ($this->session->isLoggedIn()) {
                    header('Location: index.php?action=dashboard');
                } else {
                    require_once 'views/register.php';
                }
                break;
            case 'dashboard':
                if ($this->session->isLoggedIn()) {
                    header('Location: index.php?action=dashboard');
                } else {
                    header('Location: index.php?action=login');
                }
                break;
            case 'main':
                require_once 'views/main.php';
                break;
            default:
                header('Location: index.php?action=login');
                break;
        }
    }
}