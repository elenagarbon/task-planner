<?php
    require_once 'models/User.php';
    require_once 'helpers/RenderView.php';

    class UserController {
        private $user;
        private $view;

        public function __construct($conn) {
            $this->user = new User($conn);
            $this->view = new RenderView();
        }

        public function signUp() {
            if(empty($_POST['username']) or empty($_POST['email']) or empty($_POST['password'])) {
                $error_message = 'Rellena todos los campos para registrarte';
                $this->view->render("views/register.php", ["error_message" => $error_message]);
            } else {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $existEmail = false;
                // verificar si ya existe el email
                $existEmail = $this->verifyEmail($email);

                if(!$existEmail) {
                    if($this->user->insert($username, $email, $password_hash)) {
                        header('Location: index.php?action=login');
                    } else {
                        $error_message = 'Error al registrar el usuario';
                        $this->view->render("views/register.php", ["error_message" => $error_message]);
                    }
                } else {
                    $error_message = 'Ese email ya existe';
                    $this->view->render("views/register.php", ["error_message" => $error_message]);
                }
            }
        }

        public function login() {
            if(empty($_POST['email']) or empty($_POST['password'])) {
                $error_message = 'Rellena todos los campos para iniciar sesión';
                $this->view->render("views/login.php", ["error_message" => $error_message]);
            } else {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = $this->user->login($email, $password);

                if($user) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header('Location: index.php?action=dashboard');
                } else {
                    $error_message = 'Email o contraseña incorrectos';
                    $this->view->render("views/login.php", ["error_message" => $error_message]);
                }
            }
        }

        public function logout() {
            session_start();
            session_destroy();
            header('Location: index.php?action=login');
        }

        private function verifyEmail($email) {
            // Lógica para verificar si existe el email que ha introducio el usuariolas credenciales en la base de datos
            $result = false;
            if ($this->user->existUser($email)) {
                $result = true;
            }
            return $result;
        }
    }
?>