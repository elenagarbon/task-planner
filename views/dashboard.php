<?php
    require_once('layout/header.php');
    require_once('helpers/FormatDate.php');

    if(!isset($_SESSION["user"])) {
        header("Location: index.php?action=main");
    }
?>
<main class="main p-dashboard <?php if ($totalBoards == 0) echo "js-init-intro"; ?>">
    <div class="l-content-grid">

        <?php require_once('layout/aside.php');?>

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
                        <div class="section-tasks-body scroll">
                            <?php
                            if (isset($tasks)):
                                if (count($tasks) >= 1): ?>
                                <?php foreach ($tasks as $task):
                                    $boardId = $task['id_board'];
                                    require('partials/card_template.php');
                                 endforeach; else: ?>
                                    <div class="js-init-intro-tasks">
                                        <p class="center-align js-not-tasks">No hay tareas</p>
                                    </div>
                            <?php endif;?>
                            <?php endif; ?>
                        </div>
                        <div class="section-tasks-form js-create-tasks">
                            <form class="col s12 form-task" action="index.php?action=create_task&id_board=<?php echo isset($_GET['id_board']) ? $_GET['id_board'] : $boardSelect; ?>" method="post">
                                <input type="text" name="task_title" class="validate count-char" required data-length="45" maxlength="45" placeholder="Añade titulo de tarea" autocomplete="off"/>
                                <button type="submit" name="create-task" class="btn waves-effect waves-light"><i class="large material-icons">add</i></button>
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
            <div>
                <?php  require('partials/filters.php'); ?>
            </div>
        </div>
    </div>
</main>

<?php require_once('partials/modals.php') ?>

<?php require_once('layout/footer.php') ?>