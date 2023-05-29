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
                        <div class="section-tasks-body scroll js-column" data-status="list">
                            <?php
                            if (isset($tasks)):
                                if (count($tasks) >= 1): ?>
                                <?php foreach ($tasks as $task):
                                     if ($task['status'] == 'list') {
                                        $boardId = $task['id_board'];
                                        require('partials/card_template.php');
                                    }
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
                <div class="section-tasks-body section-tasks-body--empty scroll js-column" data-status="inprogress">
                    <?php
                        if (isset($tasks)):
                            if (count($tasks) >= 1): ?>
                            <?php foreach ($tasks as $task):
                                    if ($task['status'] == 'inprogress') {
                                    $boardId = $task['id_board'];
                                    require('partials/card_template.php');
                                }
                                endforeach; endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="section-tasks-list">
                <div class="section-tasks-header">
                    Hecho
                </div>
                <div class="section-tasks-body section-tasks-body--empty scroll js-column" data-status="done">
                    <?php
                        if (isset($tasks)):
                            if (count($tasks) >= 1): ?>
                            <?php foreach ($tasks as $task):
                                    if ($task['status'] == 'done') {
                                    $boardId = $task['id_board'];
                                    require('partials/card_template.php');
                                }
                                endforeach; endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once('partials/modals.php') ?>

<?php require_once('layout/footer.php') ?>