<?php
    require_once 'models/User.php';
    require_once 'helpers/RenderView.php';

    class UserController {
        private $user;
        private $view;

        public function __construct() {
            // Proporciono valores iniciales vacíos para asignarlos donde corresponda
            $this->user = new User("", "", "");
            $this->view = new RenderView();
        }

        public function signUp($username, $email, $password) {
            if (empty($username) || empty($email) || empty($password)) {
                $error_message = 'Rellena todos los campos para registrarte';
                $this->view->render("views/register.php", ["error_message" => $error_message]);
                return;
            }

            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $this->user->setUsername($username);
            $this->user->setEmail($email);
            $this->user->setPassword($password_hash);

            $existEmail = $this->verifyEmail($email);

            if (!$existEmail) {
                if ($this->user->insert()) {
                    $message = 'Usuario registrado correctamente';
                    $this->view->render("views/login.php", ["message" => $message]);
                } else {
                    $error_message = 'Error al registrar el usuario';
                    $this->view->render("views/register.php", ["error_message" => $error_message]);
                }
            } else {
                $error_message = 'Ese email ya existe';
                $this->view->render("views/register.php", ["error_message" => $error_message]);
            }
        }

        public function login($email, $password) {
            if (empty($email) || empty($password)) {
                $error_message = 'Rellena todos los campos para iniciar sesión';
                $this->view->render("views/login.php", ["error_message" => $error_message]);
                return;
            }

            $user = $this->user->login($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: index.php?action=show_board');
            } else {
                $error_message = 'Email o contraseña incorrectos';
                $this->view->render("views/login.php", ["error_message" => $error_message]);
            }
        }

        public function logout() {
            session_start();
            session_destroy();
            header('Location: index.php?action=login');
        }

        private function verifyEmail($email) {
            // Lógica para verificar si existe el email que ha introducio el usuariolas credenciales en la base de datos
            return $this->user->existUser($email);
        }
    }
?>