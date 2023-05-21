<?php
    require_once 'config/database.php';

    class Task {
        private $title;
        private $description;
        private $priority;
        private $type;
        private $expiration_date;
        private $id_board;
        private $conn;

        public function __construct($title, $description, $priority, $type, $expiration_date, $id_board) {
            $this->title = $title;
            $this->description = $description;
            $this->priority = $priority;
            $this->type = $type;
            $this->expiration_date = $expiration_date;
            $this->id_board = $id_board;

            $db = new Database();
            $this->conn = $db->getConnection();
        }

        public function create() {
            $query = "INSERT INTO tasks SET title = :title, id_board = :id_board";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':id_board', $this->id_board);
            return ($stmt->execute()) ? true : false;
        }

        public function list($id_board) {
            $query = "SELECT * FROM tasks WHERE id_board = :id_board";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_board", $id_board);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getTitle() {
            return $this->title;
        }

        public function setTitle($title) {
            $this->title = $title;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getPriority() {
            return $this->priority;
        }

        public function setPriority($priority) {
            $this->priority = $priority;
        }

        public function getType() {
            return $this->type;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function getExpirationDate() {
            return $this->expiration_date;
        }

        public function setExpirationDate($expiration_date) {
            $this->expiration_date = $expiration_date;
        }

        public function getIdBoard() {
            return $this->id_board;
        }

        public function setIdBoard($id_board) {
            $this->id_board = $id_board;
        }
    }
?>