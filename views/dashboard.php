<?php
    require_once('layout/header.php');

    if(!isset($_SESSION["user"])) {
        header("Location: index.php?action=main");
    }
?>
<main class="main p-dashboard">
    <div class="l-content-grid">
        hola
    </div>
</main>

<?php require_once('layout/footer.php') ?>