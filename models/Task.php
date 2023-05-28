<?php
    require_once 'config/database.php';

    class Task {
        private $title;
        private $description;
        private $priority;
        private $type;
        private $expiration_date;
        private $status;
        private $id_board;
        private $conn;

        public function __construct($title, $description, $priority, $type, $expiration_date, $status, $id_board) {
            $this->title = $title;
            $this->description = $description;
            $this->priority = $priority;
            $this->type = $type;
            $this->expiration_date = $expiration_date;
            $this->status = $status;
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

        public function getById($id_task) {
            $query = "SELECT * FROM tasks WHERE id_task = :id_task";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_task", $id_task);
            $stmt->execute();
            $task = $stmt->fetch(PDO::FETCH_ASSOC);
            return $task;
        }

        public function update($id_task) {
            $query = "UPDATE tasks SET title = :title, description = :description, priority = :priority, type = :type, expiration_date = :expiration_date WHERE id_task = :id_task";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':priority', $this->priority);
            $stmt->bindParam(':type', $this->type);
            $stmt->bindParam(':expiration_date', $this->expiration_date);
            $stmt->bindParam(':id_task', $id_task);
            return $stmt->execute();
        }

        public function delete($task_id) {
            $query = "DELETE from tasks WHERE id_task = :id_task";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_task", $task_id);
            return ($stmt->execute()) ? true : false;
        }

        public function updateStatus($task_id, $status) {
            $query = "UPDATE tasks SET status = :status WHERE id_task = :id_task";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id_task', $task_id);
            return ($stmt->execute()) ? true : false;
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

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getIdBoard() {
            return $this->id_board;
        }

        public function setIdBoard($id_board) {
            $this->id_board = $id_board;
        }
    }
?>