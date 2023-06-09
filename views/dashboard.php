<?php
    require_once('layout/header.php');
    require_once('helpers/FormatDate.php');

    if(!isset($_SESSION["user"])) {
        header("Location: index.php?action=main");
    }
?>
<main class="main p-dashboard <?php if ($totalBoards == 0) echo "js-init-intro"; ?>">
    <?php require_once('layout/aside_nav.php');?>

    <div class="section-tasks p-16">
        <?php
        function renderTaskListSection($sectionTitle, $status, $tasks)
        {
            $classList = ($status !== 'list') ? 'section-tasks-body--empty' : '';
            if (isset($tasks) && count($tasks) >= 1) {
                usort($tasks, function($a, $b) {
                    $priorities = ['high', 'medium', 'low'];
                    $priorityA = array_search($a['priority'], $priorities);
                    $priorityB = array_search($b['priority'], $priorities);
                    return $priorityA - $priorityB;
                });
            }
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
                    else:
                        if ($status == 'list'): ?>
                        <div class="h-pointer-none <?php if (count($tasks) == 0) echo "js-init-intro-tasks"; ?>">
                            <p class="js-not-tasks grey-text lighten-3">No hay tareas</p>
                        </div>
                    <?php endif; endif; ?>
                </div>
                <?php if ($status === 'list') {
                    require('partials/task_form.php');
                } ?>
            </div>
        <?php
        }

        if (isset($boards) && count($boards) > 0) {
            renderTaskListSection("Lista de tareas", "list", $tasks);
            renderTaskListSection("En proceso", "inprogress", $tasks);
            renderTaskListSection("Hecho", "done", $tasks);
            renderTaskListSection("Descartar", "discard", $tasks);
        }

        if (isset($tasks) && count($tasks) >= 1) {
            require('partials/filters.php');
        }
        ?>
    </div>
</main>

<?php require_once('partials/modals.php') ?>

<?php require_once('layout/footer.php') ?>