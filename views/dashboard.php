<?php
    require_once('layout/header.php');
    require_once('helpers/FormatDate.php');

    if(!isset($_SESSION["user"])) {
        header("Location: index.php?action=main");
    }
?>
<main class="main p-dashboard <?php if ($totalBoards == 0) echo "js-init-intro"; ?>">
    <?php require_once('layout/aside_nav.php');?>

    <!-- mostrar tareas de X id_board-->
    <div class="section-tasks p-16">

        <?php
        function renderTaskListSection($sectionTitle, $status, $tasks)
        {
            $classList = ($status !== 'list') ? 'section-tasks-body--empty' : '';
            ?>
            <div class="section-tasks-list">
                <div class="section-tasks-header">
                    <?php echo $sectionTitle; ?>
                </div>
                <div class="section-tasks-body scroll js-column <?= $classList; ?>" data-status="<?php echo $status; ?>">
                    <?php
                    if (isset($tasks) && count($tasks) >= 1):
                        foreach ($tasks as $task):
                            if ($task['status'] == $status) {
                                $boardId = $task['id_board'];
                                require('partials/card_template.php');
                            }
                        endforeach;
                    else: ?>
                        <div class="js-init-intro-tasks h-pointer-none">
                            <p class="js-not-tasks grey-text lighten-3">No hay tareas</p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($status === 'list') {
                    require('partials/task_form.php');
                } ?>
            </div>
        <?php
        }

        renderTaskListSection("Lista de tareas", "list", $tasks);
        renderTaskListSection("En proceso", "inprogress", $tasks);
        renderTaskListSection("Hecho", "done", $tasks);
        renderTaskListSection("Descartar", "discard", $tasks);


        if (isset($tasks) && count($tasks) >= 1) {
            require('partials/filters.php');
        }
        ?>
    </div>
</main>

<?php require_once('partials/modals.php') ?>

<?php require_once('layout/footer.php') ?>