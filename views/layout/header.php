<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Task Planner</title>
	<!-- Estilos masterialize + personalizados -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/main.css">
	<!-- Materialize icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.1/introjs.css" integrity="sha512-4OzqLjfh1aJa7M33b5+h0CSx0Q3i9Qaxlrr1T/Z+Vz+9zs5A7GM3T3MFKXoreghi3iDOSbkPMXiMBhFO7UBW/g==" crossorigin="anonymous" referrerpolicy="no-referrer" >
</head>
<body>
<header>
	<?php
		$url = $_SERVER['REQUEST_URI'];
		if (strpos($url, 'dashboard') !== false || strpos($url, 'show_board') !== false) {
			$hideButton = true;
		} else {
			$hideButton = false;
		}
	?>
	<div class="navbar-fixed">
		<nav class="main-nav">
			<div class="nav-wrapper">
				<a href="index.php?action=main" class="brand-logo">Task Planner</a>
				<?php if(isset($_SESSION["user"])) {?>
					<?php if (isset($_GET['action'])):
							if ($_GET['action'] == 'show_board' or $_GET['action'] == 'dashboard') : ?>
								<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<?php endif; endif; ?>
					<?php } else {?>
						<!-- boton abrir inicio + registro -->
						<a class='dropdown-trigger dropdown-trigger hide-on-large-only' href='#' data-target='dropdown2'>
							<i class="material-icons">menu</i>
						</a>
					<?php
					}
				?>
				<ul id="nav-mobile" class="right">
					<?php if(isset($_SESSION["user"])) {?>
						<?php if (!$hideButton): ?>
							<li class="hide-on-med-and-down"><a href="index.php?action=dashboard">Ir a mis tablones</a></li>
						<?php endif; ?>
						<li class="hide-on-med-and-down"><?php echo "Hola ". $_SESSION["user"]["nickname"] ?></li>
						<!-- Dropdown Trigger -->
						<li id="dropdown-navbar">
							<a class='dropdown-trigger' href='#' data-target='dropdown1'>
								<i class=" material-icons">account_circle</i>
							</a>
						</li>
						<!-- Dropdown Structure -->
						<ul id='dropdown1' class='dropdown-content'>
							<?php if (!$hideButton): ?>
								<li class="hide-on-large-only"><a href="index.php?action=dashboard">Ir a mis tablones</a></li>
							<?php endif; ?>
							<li class="h-pointer-none">
								<a href="#!">
									Conectado con <?php echo $_SESSION["user"]["email"] ?>
								</a>
							</li>
							<li><a href="index.php?action=logout">Cerrar sesión</a></li>
						</ul>
					<?php } else {
						?>
						<li class="hide-on-med-and-down"><a href="index.php?action=register">Registrate</a></li>
						<li class="hide-on-med-and-down"><a href="index.php?action=login">Inicia sesión</a></li>
					<?php } ?>
				</ul>
				<?php if(!isset($_SESSION["user"])) :?>
					<!-- Dropdown Structure -->
					<ul id='dropdown2' class='dropdown-content hide-on-large-only'>
						<li><a href="index.php?action=register">Registrate</a></li>
						<li><a href="index.php?action=login">Inicia sesión</a></li>
					</ul>
				<?php endif ?>
			</div>
		</nav>
	</div>
</header>