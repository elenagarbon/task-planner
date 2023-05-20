<?php
	$message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
	unset($_SESSION['error_message']);
?>
<?php if(!empty($message)) { ?>
	<div class="Alert Alert--float card red lighten-4 red-text text-darken-4 js-alert">
		<div class="Alert-content">
			<i class="material-icons">report_problem</i>
			<span><?php echo $message; ?>.</span>
			<button class="Alert-action js-alert-close"><i class="material-icons">close</i></button>
		</div>
	</div>
<?php } ?>

<?php
	$message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
	unset($_SESSION['success_message']);
?>
<?php if(!empty($message)) { ?>
	<div class="Alert Alert--float card green lighten-4 green-text text-darken-4 js-alert">
		<div class="Alert-content">
			<i class="material-icons">check_circle</i>
			<span><?php echo $message; ?>.</span>
			<button class="Alert-action js-alert-close"><i class="material-icons">close</i></button>
		</div>
	</div>
<?php } ?>