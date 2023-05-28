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
                        <div class="section-tasks-body scroll js-column">
                            <?php
                            if (isset($tasks)):
                                if (count($tasks) >= 1): ?>
                                <?php foreach ($tasks as $task):
                                    $boardId = $task['id_board'];
                                    require('partials/card_template.php');
                                 endforeach; else: ?>
                                    <div class="js-init-intro-tasks h-pointer-none">
                                        <p class="js-not-tasks grey-text lighten-3">No hay tareas</p>
                                    </div>
                            <?php endif;?>
                            <?php endif; ?>
                        </div>
                        <?php require('partials/task_form.php') ?>
                <?php endif;
                 endif; ?>
            </div>
            <div class="section-tasks-list">
                <div class="section-tasks-header">
                    En proceso
                </div>
                <div class="section-tasks-body scroll  js-column"></div>
                <?php require('partials/task_form.php') ?>
            </div>
            <div class="section-tasks-list">
                <div class="section-tasks-header">
                    Hecho
                </div>
                <div class="section-tasks-body scroll js-column"></div>
                <?php require('partials/task_form.php') ?>
            </div>
        </div>
    </div>
</main>

<?php require_once('partials/modals.php') ?>

<?php require_once('layout/footer.php') ?>