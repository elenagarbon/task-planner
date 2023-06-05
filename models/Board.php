<?php
    require_once 'config/database.php';

    class Board {
        private $name;
        private $user_id;
        private $conn;

        public function __construct($name, $user_id) {
            $this->name = $name;
            $this->user_id = $user_id;
            $db = new Database();
            $this->conn = $db->getConnection();
        }

        public function create() {
            $query = "INSERT INTO boards SET name = :name, id_user = :id_user";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':id_user', $this->user_id);
            return ($stmt->execute()) ? $this->conn->lastInsertId(): false;
        }

        public function list($user_id) {
            $query = "SELECT * FROM boards WHERE id_user = :id_user";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_user", $user_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete($board_id) {
            $query = "DELETE from boards WHERE id_board = :id_board";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_board", $board_id);
            return $stmt->execute();
        }

        public function getFirstBoard($user_id) {
            $query = "SELECT id_board FROM boards WHERE id_user = :id_user ORDER BY id_board ASC LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_user', $user_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($result) ? $result['id_board'] : null;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getUserId() {
            return $this->user_id;
        }

        public function setUserId($user_id) {
            $this->user_id = $user_id;
        }
    }
?>