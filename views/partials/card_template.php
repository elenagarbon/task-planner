<div class="card Card Card--<?php echo $task['priority']?>">
    <div class="Card-info">
        <div>
            <div class="Card-title">
                <span><?= $task['title'] ?></span>
            </div>
            <div class="Card-date"><?= $task['expiration_date'] ?></div>
        </div>
        <img class="Card-icon" src="resources/images/<?= $task['type'] ?>.png" alt="" />
    </div>
    <div class="Card-buttons">
        <a class="Card-buttons-item activator">
            <i class="material-icons activator">info_outline</i>
        </a>
        <a class="Card-buttons-item" href="index.php?action=edit_task&id_task=<?php echo $task['id_task']?>">
            <i class="material-icons">edit</i>
        </a>
        <a class="Card-buttons-item" href="index.php?action=edit_task&id_task=<?php echo $task['id_task']?>">
            <i class="material-icons">delete</i>
        </a>
    </div>
    <div class="card-reveal">
        <span class="card-title"><i class="material-icons right">close</i></span>
        <p class="Card-description">
            <?= $task['description'] !== null ? $task['description'] : 'No hay descripción'; ?>
        </p>
    </div>
</div>