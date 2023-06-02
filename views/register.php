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
                <h4 class="h-mb-0">Crear cuenta</h4>
            </div>
        </div>
        <form action="index.php?action=register" method="post" class="row">
            <div class="input-field col s12">
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" class="form-control validate count-char" required data-length="30">
                <span class="helper-text" data-error="Solo se permite 30 caracteres" data-success="Correcto"></span>
            </div>
            <div class="input-field col s12">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control validate" required>
                <span class="helper-text" data-error="Email incorrecto" data-success="Email correcto"></span>
            </div>
            <div class="input-field col s12">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control validate" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+~`-]).{8,}">
                <span class="helper-text" data-error="Contraseña incorrecta" data-success="Contraseña correcta"></span>
            </div>
            <div class="input-field col s12">
                <button type="submit" class="btn btn-primary" name="register-user">Registrate</button>
            </div>
        </form>
        <div class="row">
            <div class="col s12">
                <?php require_once('partials/alerts.php') ?>
            </div>
            <div class="col s12">
                <p>¿Ya tienes una cuenta? <a class="link" href="index.php?action=login">Inicia sesión</a></p>
            </div>
        </div>
    </div>
</main>

<?php require_once('layout/footer.php') ?>


