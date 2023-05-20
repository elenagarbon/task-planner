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
            // función lastInsertId() obtener el ID del tablón recién creado del objeto de conexión PDO después de ejecutar la consulta de inserción
            return ($stmt->execute()) ? $this->conn->lastInsertId(): false;
        }

        public function list($user_id) {
            $query = "SELECT * FROM boards WHERE id_user = :id_user";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_user", $user_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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