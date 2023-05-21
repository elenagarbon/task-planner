<?php
    require_once('layout/header.php');

    if(!isset($_SESSION["user"])) {
        header("Location: index.php?action=main");
    } else {
        $boardsUser = count($boards);
        $tasksUser = count($tasks);
    }
?>
<main class="main p-dashboard <?php if ($boardsUser == 0) echo "js-init-intro"; ?>">
    <div class="l-content-grid">
        <aside class="section-boards">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h5>Mis tablones</h5>
                    <!-- si el usuario tiene mas de 5 tableros poner disabled el boton con tooltip -->
                    <?php if (isset($boards)):
                            if ($totalBoards > 4): ?>
                                <a class="btn tooltipped Button--disabled" data-position="right" data-tooltip="Elimina un tablón para crear más"><i class="large material-icons">add</i></a>
                            <?php else: ?>
                                <a class="btn pink waves-effect waves-light modal-trigger tooltipped" data-position="right" data-tooltip="Crear un tablón" <?php if (count($boards) > 4) { echo "disabled"; } ?> href="#modal_create_board" id="openModalButton">
                                    <i class="large material-icons">add</i>
                                </a>
                            <?php endif; ?>
                    <?php endif; ?>
                </li>
                <?php
                if (isset($boards)):
                    if ($totalBoards > 0):?>
                    <?php foreach ($boards as $board):
                        $boardId = $board['id_board'];
                        $urlId = $_GET['id_board'];
                        $classActive = ($boardId == $urlId) ? 'active' : '';
                    ?>
                        <li class="collection-item <?php echo $classActive ?>">
                            <a href="index.php?action=show_board&id_board=<?php echo $board['id_board']?>"><?= $board['name'] ?></a>
                            <div class="collection-item-actions">
                                <a href="index.php?action=delete_board&id_board=<?php echo $board['id_board']?>" onclick="return confirm('Estas seguro?'); false"><i class="material-icons">delete</i></a>
                            </div>
                        </li>
                    <?php endforeach;else: ?>
                        <li class="collection-item center-align js-first-step">
                            No hay tablones
                        </li>
                <?php endif;
                 endif; ?>
            </ul>
            <?php
            if (isset($boards)):
                if ($totalBoards > 4):?>
                    <div class="Alert yellow lighten-4 lime-text text-darken-4 h-margin-0">
                        <div class="Alert-content">
                            <i class="material-icons">warning</i>
                            Has alcanzado el límite máximo de tablones. Elimina uno antes de crear uno nuevo.
                        </div>
                    </div>
            <?php endif;
            endif; ?>
        </aside>

        <!-- mostrar tareas de X id_board-->
        <div class="section-tasks p-16">
            <div class="section-tasks-list">
                <div class="section-tasks-header">
                    Lista de tareas
                </div>
                <?php
                if (isset($boards)):
                    if ($totalBoards > 0):?>
                        <!-- LISTAR TAREAS -->
                        <div class="section-tasks-body <?php if ($tasksUser == 0) echo "js-init-intro-tasks"; ?>">
                            <?php
                            if (isset($tasks)):
                                if (count($tasks) >= 1): ?>
                                <?php foreach ($tasks as $task):?>
                                    <div class="Card">
                                        <div class="Card-info">
                                            <?= $task['title'] ?>
                                        </div>
                                        <div class="Card-actions pink">
                                            <a href="index.php?action=edit_task&id_task=<?php echo $task['id_task']?>">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; else: ?>
                                    <p class="center-align js-not-tasks">No hay tareas</p>
                            <?php endif;?>
                            <?php endif; ?>
                        </div>
                        <div class="section-tasks-form js-create-tasks">
                            <form class="col s12" action="index.php?action=create_task&id_board=<?php if (isset($_GET['id_board'])) echo $_GET['id_board'] ?>" method="post">
                                <textarea id="icon_prefix2" name="task_title" class="materialize-textarea validate count-char" required data-length="100" placeholder="Añade titulo de tarea"></textarea>
                                <button type="submit" name="create-task" class="btn text-white pink waves-effect waves-light">Crear</button>
                            </form>
                        </div>
                <?php endif;
                 endif; ?>
            </div>
            <div class="section-tasks-list">
                <div class="section-tasks-header">
                    En proceso
                </div>
            </div>
            <div class="section-tasks-list">
                <div class="section-tasks-header">
                    Hecho
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once('partials/modals.php') ?>

<?php require_once('layout/footer.php') ?>