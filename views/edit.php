<?php
    require_once('layout/header.php');
    require_once('controllers/TaskController.php');

    if(!isset($_SESSION["user"])) {
        header("Location: index.php?action=main");
    }

    $task_id = $_REQUEST['id_task'];
    $board_id = $_REQUEST['id_board'];
    $taskController = new TaskController();
    $task = $taskController->getTaskById($task_id);

    if ($task) {
        $title = $task['title'];
        $description = $task['description'];
        $priority = $task['priority'];
        $type = $task['type'];
        $expiration_date = $task['expiration_date'];
    } else {
        header("Location:views/dashboard.php");
    }
?>

<main class="main">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <ol class="Breadcrumb">
                    <li>
                        <a class="Breadcrumb-item" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Volver al listado</a>
                    </li>
                    <li>
                        <?php echo $title; ?>
                    </li>
                </ol>
            </div>
            <div class="col s12">
                <h4>Editar tarea</h4>
            </div>
        </div>
        <form action="index.php?action=update_task&id_board=<?php echo $board_id; ?>&id_task=<?php echo $task_id; ?>" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <label for="title_task">Título</label>
                    <input id="title_task" type="text" value="<?php echo $title; ?>" name="title" class="form-control validate count-char" required data-length="30">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="description_task">Descripción</label>
                    <textarea id="description_task" name="description" class="materialize-textarea validate count-char" data-length="255" placeholder="Añade una descripción"><?php echo $description; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select id="priority_task" name="priority">
                        <option value="" disabled selected>Elige una opción</option>
                        <?php
                            $optionsPriority = array(
                                "high" => "Alta",
                                "medium" => "Media",
                                "low" => "Baja"
                            );
                            foreach ($optionsPriority as $value => $name) {
                                $selected = ($value == $priority) ? "selected" : "";
                                echo "<option value='$value' $selected>$name</option>";
                            }
                        ?>
                    </select>
                    <label>Prioridad</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select class="icons" name="type">
                        <option value="" disabled selected>Elige una opción</option>
                        <?php
                             $opciones = array(
                                "work" => array(
                                    "nombre" => "Trabajo",
                                    "imagen" => "resources/images/work.png"
                                ),
                                "student" => array(
                                    "nombre" => "Estudio",
                                    "imagen" => "resources/images/study.png"
                                ),
                                "house" => array(
                                    "nombre" => "Casa",
                                    "imagen" => "resources/images/house.png"
                                )
                            );
                            foreach ($opciones as $valor => $opcion) {
                                $selected = ($valor == $type) ? "selected" : "";
                                $nombre = $opcion["nombre"];
                                $imagen = $opcion["imagen"];
                                echo "<option value='$valor' data-icon='$imagen' $selected>$nombre</option>";
                            }

                        ?>
                    </select>
                    <label>Tipo de tarea</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label>Fecha de vencimiento</label>
                    <input type="text" class="datepicker" name="expiration_date">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn btn-primary" name="update-task">editar</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require_once('layout/footer.php') ?>