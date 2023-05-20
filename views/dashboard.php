<?php
    require_once('layout/header.php');

    if(!isset($_SESSION["user"])) {
        header("Location: index.php?action=main");
    }
?>
<main class="main p-dashboard">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4>Hola <?php echo $_SESSION["user"]["nickname"]?>!</h4>
            </div>
        </div>
    </div>
</main>

<?php require_once('layout/footer.php') ?>