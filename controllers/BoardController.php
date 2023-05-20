<?php
    require_once 'models/Board.php';
    require_once 'helpers/RenderView.php';

    class BoardController {
        private $board;
        private $view;

        public function __construct() {
            // Proporciono valor inicial vacío para asignarlo donde corresponda
            $this->board = new Board("", "");
            $this->view = new RenderView();
        }

        public function createBoard($board_name, $user_id) {
            if (empty($board_name) || empty($user_id)) {
                $_SESSION['error_message'] = 'Rellena el nombre del tablón';
                header("Location:index.php?action=dashboard");
                return;
            }

            $this->board->setName($board_name);
            $this->board->setUserId($user_id);

            $board_id = $this->board->create(); // Obtener el ID del tablón creado

            if ($board_id) {
                $_SESSION['success_message'] = 'Tablón creado correctamente';
                header("Location:index.php?action=show_board&id_board=".$board_id);
            } else {
                $_SESSION['error_message'] = 'Error al crear el tablón';
                header("Location:index.php?action=dashboard");
            }
        }

        public function getUserBoards($user_id) {
            $boards = $this->board->list($user_id);
            $totalBoards = count($boards);
            // Renderizar la vista que muestra los tablones del usuario
            $this->view->render("views/dashboard.php", ["boards" => $boards ?? null, "totalBoards" => $totalBoards ]);
        }

        public function deletedBoardById($board_id, $user_id) {
            if($this->board->delete($board_id)) {
                $idFirstBoard = $this->board->getFirstBoard($user_id);
                if($idFirstBoard == null) {
                    header("Location:index.php?action=dashboard");
                } else {
                    header("Location:index.php?action=show_board&id_board=". $idFirstBoard);
                }
            }
        }
    }
?>