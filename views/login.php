<?php
    require_once('layout/header.php');

    if(isset($_SESSION["user"])) {
        header("Location:dashboard.php");
    }
?>

<main class="main">
    <div class="container">
        <div class="row">
            <h2>Iniciar sesión</h2>
        </div>
        <form action="index.php?action=login" method="post">
            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control validate" required>
                <span class="helper-text" data-error="Email incorrecto" data-success="Email correcto"></span>
            </div>
            <div class="input-field">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control validate" required>
                <span class="helper-text" data-error="Contraseña incorrecta" data-success="Contraseña correcta"></span>
            </div>
            <div class="input-field">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </form>
        <p>¿No tienes una cuenta? <a href="index.php?action=register">Regístrate</a></p>
    </div>
</main>

<?php require_once('layout/footer.php') ?>
