<?php
    require_once('layout/header.php');

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
                        <div class="section-tasks-body">
                            <?php
                            if (isset($tasks)):
                                if (count($tasks) >= 1): ?>
                                <?php foreach ($tasks as $task):?>
                                    <div class="Card">
                                        <div class="Card-info">
                                            <?= $task['title'] ?>
                                        </div>
                                        <div class="Card-actions pink">
                                            <a href="index.php?action=edit_task&id_board=<?php echo $board['id_board']?>&id_task=<?php echo $task['id_task']?>">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; else: ?>
                                    <div class="js-init-intro-tasks">
                                        <p class="center-align js-not-tasks">No hay tareas</p>
                                    </div>
                            <?php endif;?>
                            <?php endif; ?>
                        </div>
                        <div class="section-tasks-form js-create-tasks">
                            <form class="col s12" action="index.php?action=create_task&id_board=<?php echo $boardSelect ?>" method="post">
                                <textarea id="task_title" name="task_title" class="materialize-textarea validate count-char" required data-length="100" placeholder="Añade titulo de tarea"></textarea>
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