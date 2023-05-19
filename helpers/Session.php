<?php
    class Session {
        public function isLoggedIn() {
            return isset($_SESSION['user']);
        }
    }
?>