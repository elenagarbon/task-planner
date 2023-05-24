<?php
    require_once('layout/header.php');
    require_once('controllers/TaskController.php');
    require_once('data/select_options.php');

    if(!isset($_SESSION["user"])) {
        header("Location: index.php?action=main");
    }

    $task_id = $_REQUEST['id_task'];
    $taskController = new TaskController();
    $task = $taskController->getTaskById($task_id);

    if ($task) {
        $title = $task['title'];
        $description = $task['description'];
        $priority = $task['priority'];
        $type = $task['type'];
        $expiration_date = $task['expiration_date'];
        $id_board = $task['id_board'];
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
                        <a class="Breadcrumb-item" href="index.php?action=dashboard">Volver al listado</a>
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
        <form action="index.php?action=update_task&id_board=<?php echo $id_board; ?>&id_task=<?php echo $task_id; ?>" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <label for="title_task">Título</label>
                    <input id="title_task" type="text" value="<?php echo $title; ?>" name="title" class="form-control validate count-char" required data-length="45" maxlength="45">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="description_task">Descripción</label>
                    <textarea id="description_task" name="description" class="materialize-textarea validate count-char" data-length="255" placeholder="Añade una descripción"><?php echo $description; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="wrapper-radios">
                        <?php
                            foreach ($priorities as $value => $name) {
                                $checked = ($value == $priority) ? "checked" : "";
                                echo "<label>
                                        <input class='with-gap' name='priority' type='radio' value='$value ' $checked/>
                                        <span>$name prioridad</span>
                                    </label>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select class="icons" name="type">
                        <option value="" disabled selected>Elige una opción</option>
                        <?php
                            foreach ($taskTypes as $valor => $taskType) {
                                $selected = ($valor == $type) ? "selected" : "";
                                $name = $taskType["name"];
                                $image = $taskType["image"];
                                echo "<option value='$valor' data-icon='$image' $selected>$name</option>";
                            }
                        ?>
                    </select>
                    <label>Tipo de tarea</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label>Fecha de vencimiento</label>
                    <input
                        type="text"
                        id="datepiker-task"
                        class="datepicker"
                        name="expiration_date"
                        value="<?php echo !empty($expiration_date) ? $expiration_date : null ; ?>"
                        data-date="<?php echo $expiration_date; ?>"
                        autocomplete="off"
                    />
                </div>
            </div>
            <input type="hidden" name="id_board" value="<?php echo $id_board; ?>"/>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn pink waves-effect waves-light" name="update-task">editar</button>
                </div>
            </div>
        </form>
    </div>
</main>

<script>
    let expirationDate = '<?php echo $expiration_date; ?>';
</script>

<?php require_once('layout/footer.php') ?>