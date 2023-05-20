<!-- Modal Create Board -->
<div id="modal_create_board" class="modal">
    <form action="index.php?action=create_board" method="post">
    <div class="modal-content">
        <h4>Crear tablón</h4>
        <div class="form-group">
            <label for="board_name">Nombre de tablón</label>
            <input type="text" name="board_name" class="form-control validate count-char" required data-length="50">
            <span class="helper-text" data-error="Solo se permite 50 caracteres" data-success="Correcto"></span>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user"]["id_user"]?>"/>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
            <button type="submit" class="btn btn-primary" name="create-board">crear</button>
        </div>
    </form>
</div>