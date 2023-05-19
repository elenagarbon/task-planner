<?php
    class Request {
        public function isPost() {
            return $_SERVER['REQUEST_METHOD'] == 'POST';
        }
    }
?>