<?php
    require_once 'models/Task.php';
    require_once 'helpers/RenderView.php';

    class TaskController {
        private $task;
        private $view;

        public function __construct() {
            $this->task = new Task("", "", "", "", "", "", "");
            $this->view = new RenderView();
        }

        public function createTask($board_id, $title) {
            if (empty($board_id) || empty($title)) {
                $_SESSION['error_message'] = 'Rellena el título de la tarea';
                header("Location:index.php?action=show_board&id_board=".$board_id);
                return;
            }

            $this->task->setTitle($title);
            $this->task->setIdBoard($board_id);

            if ($this->task->create()) {
                $_SESSION['success_message'] = 'Tarea creada correctamente';
            } else {
                $_SESSION['error_message'] = 'Error al crear la tarea';
            }
            header("Location:index.php?action=show_board&id_board=".$board_id);
        }

        public function getTasksByBoardId($board_id) {
            $tasks = $this->task->list($board_id);
            extract($tasks);
            return $tasks;
        }
    }
?>