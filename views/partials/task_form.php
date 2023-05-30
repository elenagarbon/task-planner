<div class="section-tasks-form js-create-tasks">
    <form class="col s12 form-task" action="index.php?action=create_task&id_board=<?php echo isset($_GET['id_board']) ? $_GET['id_board'] : $boardSelect; ?>" method="post">
        <input type="text" name="task_title" class="validate count-char" required data-length="45" maxlength="45" placeholder="Añade titulo de tarea" autocomplete="off"/>
        <button type="submit" name="create-task" class="btn waves-effect waves-light"><i class="large material-icons">add</i></button>
    </form>
</div>