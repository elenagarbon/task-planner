<?php
    require_once('layout/header.php');

    if(isset($_SESSION["user"])) {
        header('Location: index.php?action=dashboard');
    }
?>

<main class="main main--user">
    <div class="container Card Card--user">
        <div class="row">
            <div class="col s12">
                <h4 class="h-mb-0">Iniciar sesión</h4>
            </div>
        </div>
        <form action="index.php?action=login" method="post" class="row">
            <div class="input-field col s12">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="input-field col s12">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="input-field col s12">
                <button type="submit" class="btn btn-primary" name="login-user">Iniciar sesión</button>
            </div>
        </form>
        <div class="row">
            <div class="col s12">
                <?php require_once('partials/alerts.php') ?>
            </div>
            <div class="col s12">
                <p>¿No tienes una cuenta? <a class="link" href="index.php?action=register">Regístrate</a></p>
            </div>
        </div>
    </div>
</main>

<?php require_once('layout/footer.php') ?>
