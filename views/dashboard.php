<?php
    require_once('layout/header.php');

    if(!isset($_SESSION["user"])) {
        header("Location: index.php?action=main");
    }
?>
<main class="main p-dashboard">
    <div class="l-content-grid">
        <ul class="collection with-header">
            <li class="collection-header">
                <h5>Mis tablones</h5>
                <!-- si el usuario tiene mas de 5 tableros poner disabled el boton con tooltip -->
                <?php if (isset($boards)):
                        if ($totalBoards > 4): ?>
                            <a class="btn tooltipped Button--disabled" data-position="right" data-tooltip="Elimina un tablón para crear más"><i class="large material-icons">add</i></a>
                        <?php else: ?>
                            <a class="btn pink waves-effect waves-light modal-trigger tooltipped" data-position="right" data-tooltip="Crear un tablón" <?php if (count($boards) > 4) { echo "disabled"; } ?> href="#modal_create_board" id="openModalButton"><i class="large material-icons">add</i></a>
                        <?php endif; ?>
                <?php endif; ?>
            </li>
            <?php
            if (isset($boards)):
                if ($totalBoards > 0):?>
                <?php foreach ($boards as $board):
                    $boardId = $board['id_board'];
                    $urlId = $_GET['id_board'];
                    $class = ($boardId == $urlId) ? 'active' : '';
                ?>
                    <li class="collection-item <?php echo $class ?>">
                        <a href="index.php?action=show_board&id_board=<?php echo $board['id_board']?>"><?= $board['name'] ?></a>
                        <div class="collection-item-actions">
                            <a href="index.php?action=delete_board&id_board=<?php echo $board['id_board']?>" onclick="return confirm('Estas seguro?'); false"><i class="material-icons">delete</i></a>
                        </div>
                    </li>
                <?php endforeach;else: ?>
                    <li class="collection-item center-align">Comienza creando tu primer tablón en el botón +</li>
            <?php endif;
                if ($totalBoards > 4):?>
                     <li class="collection-item">
                    <div class="Alert card yellow lighten-3 text-darken-4 h-margin-0">
                        <div class="Alert-content">
                            <i class="material-icons">warning</i>
                            Has llegado al limite de tablones permitidos. Elimina un tablero para crear uno nuevo.
                        </div>
                    </div>
                </li>
            <?php endif;
            endif; ?>
        </ul>
        <!-- mostrar tareas de X id_board-->
        <div class="p-16"></div>
    </div>
</main>

<?php require_once('partials/modals.php') ?>

<?php require_once('layout/footer.php') ?>