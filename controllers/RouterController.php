<?php
require_once 'controllers/UserController.php';
require_once 'controllers/BoardController.php';
require_once 'helpers/Request.php';
require_once 'helpers/Session.php';

class RouterController {
    private $userController;
    private $boardController;
    private $request;
    private $session;

    public function __construct() {
        $this->userController = new UserController();
        $this->boardController = new BoardController();
        $this->request = new Request();
        $this->session = new Session();
    }

    public function dispatch() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'main';

        switch ($action) {
            case 'login':
                if ($this->session->isLoggedIn() && isset($_POST['login-user'])) {
                    header('Location: index.php?action=dashboard');
                } else if ($this->request->isPost()) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $this->userController->login($email, $password);
                } else {
                    require_once 'views/login.php';
                }
                break;
            case 'register':
                if ($this->session->isLoggedIn()) {
                    header('Location: index.php?action=dashboard');
                } else if ($this->request->isPost() && isset($_POST['register-user'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $this->userController->signUp($username, $email, $password);
                } else {
                    require_once 'views/register.php';
                }
                break;
            case 'logout':
                $this->userController->logout();
                break;
            case 'dashboard':
                if ($this->session->isLoggedIn()) {
                    $this->boardController->getUserBoards($_SESSION['user']['id_user']);
                } else {
                    header('Location: index.php?action=login');
                }
                break;
            case 'create_board':
                if ($this->request->isPost() && isset($_POST['create-board'])) {
                    $board_name = $_POST['board_name'];
                    $user_id = $_POST['user_id'];
                    $this->boardController->createBoard($board_name, $user_id);
                } else {
                    if ($this->session->isLoggedIn()) {
                        header('Location: index.php?action=dashboard');
                    }
                }
                break;
            case 'show_board':
                $this->boardController->getUserBoards($_SESSION['user']['id_user']);
                break;
            case 'delete_board':
                $board_id = $_REQUEST['id_board'];
                $this->boardController->deletedBoardById($board_id, $_SESSION['user']['id_user']);
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