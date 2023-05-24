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
                        $classActive = ($boardId == $boardSelect) ? 'active' : '';
                    ?>
                        <li class="collection-item <?php echo $classActive ?>">
                            <a href="index.php?action=show_board&id_board=<?php echo $boardId?>"><?= $board['name'] ?></a>
                            <div class="collection-item-actions">
                                <a href="index.php?action=delete_board&id_board=<?php echo $boardId?>" onclick="return confirm('Estas seguro?'); false"><i class="material-icons">delete</i></a>
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