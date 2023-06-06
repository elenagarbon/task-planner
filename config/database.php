<?php
    class Database {
        private $host = "localhost";
        private $db_name = "id20854793_taskplannerpro";
        private $username = "id20854793_elenagarbon";
        private $password = "mL=49XVm";
        public $conn;

        public function getConnection() {
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                return $exception->getMessage();
            }
            return $this->conn;
        }
    }
?>