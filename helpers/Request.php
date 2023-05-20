<?php
    class Request {
        // Verifica si la solicitud es de tipo POST
        // Verifica que hay datos enviados en el cuerpo de la solicitud (no esta vacio)
        public function isPost() {
            return $_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST);
        }
    }
?>