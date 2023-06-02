<?php

    class RenderView {
        public function render($view, $data = []) {
            // Extraer los datos del arreglo asociativo
            extract($data);
            // Incluir el archivo de la vista
            require_once(BASE_URL . $view);
        }
    }

?>