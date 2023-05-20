<?php
    class User {
        private $conn;

        public function __construct($db) {
            $this->conn = $db->getConnection();
        }

        public function insert($username, $email, $password) {
            $query = "INSERT INTO users SET nickname = :nickname, email = :email, password = :password";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":nickname", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password) {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $row_user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row_user) {
                if(password_verify($password, $row_user['password'])) {
                    return $row_user;
                } else {
                    return false;
                }
            }
        }

        public function existUser($email) {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $row_user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row_user;
        }
    }
?>