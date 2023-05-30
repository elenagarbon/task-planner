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

        public function getTaskById($task_id) {
            $task = $this->task->getById($task_id);
            return $task;
        }

        public function updateTask($task_id, $title, $description, $priority, $type, $expiration_date, $board_id) {
            if (empty($title)) {
                $_SESSION['error_message'] = 'Rellena el título de la tarea';
                header("Location:index.php?action=edit_task&task_id=".$task_id);
                return;
            }

            $this->task->setTitle($title);
            $this->task->setDescription($description);
            $this->task->setPriority($priority);
            $this->task->setType($type);
            $this->task->setExpirationDate($expiration_date);

            if ($this->task->update($task_id)) {
                $_SESSION['success_message'] = 'Tarea actualizada correctamente';
            } else {
                $_SESSION['error_message'] = 'Error al actualizar la tarea';
            }
            header("Location:index.php?action=show_board&id_board=".$board_id);
        }

        public function deletedTaskById($task_id, $board_id ) {
            if($this->task->delete($task_id)) {
                $_SESSION['success_message'] = 'Tarea eliminada correctamente';
            } else {
                $_SESSION['error_message'] = 'Error al eliminar la tarea';
            }
            header("Location:index.php?action=show_board&id_board=". $board_id);
        }
    }
?>