<?php
    require_once 'config/database.php';

    class User {
        private $username;
        private $email;
        private $password;
        private $conn;

        public function __construct($username, $email, $password) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $db = new Database();
            $this->conn = $db->getConnection();
        }

        public function insert() {
            $query = "INSERT INTO users SET nickname = :nickname, email = :email, password = :password";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nickname', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            return $stmt->execute();
        }

        public function login($email, $password) {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            return false;
        }

        public function existUser($email) {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $row_user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row_user;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setUsername($username) {
            $this->username = $username;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setPassword($password) {
            $this->password = $password;
        }
    }
?>