<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Task Planner</title>
	<!-- Estilos masterialize + personalizados -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/main.css">
	<!-- Materialize icons-->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>node_modules/material-icons/iconfont/material-icons.css">
	<!-- Intro.js -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>node_modules/intro.js/minified/introjs.min.css">
</head>
<body>
<header>
	<div class="navbar-fixed">
		<nav class="main-nav">
			<div class="nav-wrapper">
				<a href="index.php?action=main" class="brand-logo">
					Task Planner
				</a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
			<?php
					if(isset($_SESSION["user"])) {?>
						<?php if (isset($_GET['action'])):
								if ($_GET['action'] == 'main' or $_GET['action'] == 'edit_task') : ?>
								<li><a href="index.php?action=dashboard">Ir a mi tablones</a></li>
						<?php endif; endif; ?>
						<li><?php echo "Hola ". $_SESSION["user"]["nickname"] ?></li>
						<!-- Dropdown Trigger -->
						<li id="dropdown-navbar">
							<a class='dropdown-trigger' href='#' data-target='dropdown1'>
								<i class=" material-icons">account_circle</i>
							</a>
						</li>
						<!-- Dropdown Structure -->
						<ul id='dropdown1' class='dropdown-content'>
							<li class="h-pointer-none">
								<a href="#!">
									Conectado con <?php echo $_SESSION["user"]["email"] ?>
								</a>
							</li>
							<li><a href="index.php?action=logout">Cerrar sesión</a></li>
						</ul>
					<?php
					} else {
					?>
						<li><a href="index.php?action=register">Registrate</a></li>
						<li><a href="index.php?action=login">Inicia sesión</a></li>
					<?php
					}
					?>
			</ul>
			</div>
		</nav>
	</div>
</header>