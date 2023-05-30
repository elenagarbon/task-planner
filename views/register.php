<?php
    require_once('layout/header.php');

    if(isset($_SESSION["user"])) {
        header('Location: index.php?action=dashboard');
      }
?>

<main class="main">
    <div class="container">
        <div class="row">
            <h2>Registro de usuario</h2>
        </div>
        <form action="index.php?action=register" method="post">
            <div class="input-field">
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" class="form-control validate count-char" required data-length="30">
                <span class="helper-text" data-error="Solo se permite 30 caracteres" data-success="Correcto"></span>
            </div>
            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control validate" required>
                <span class="helper-text" data-error="Email incorrecto" data-success="Email correcto"></span>
            </div>
            <div class="input-field">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control validate" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+~`-]).{8,}">
                <span class="helper-text" data-error="Contraseña incorrecta" data-success="Contraseña correcta"></span>
            </div>
            <div class="input-field">
                <button type="submit" class="btn btn-primary" name="register-user">Registrarse</button>
            </div>
        </form>
        <?php require_once('partials/alerts.php') ?>
        <p>¿Ya tienes una cuenta? <a href="index.php?action=login">Inicia sesión</a></p>
    </div>
</main>

<?php require_once('layout/footer.php') ?>


