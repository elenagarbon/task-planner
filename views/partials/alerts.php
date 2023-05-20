<?php if(isset($error_message)) { ?>
    <div class="Alert card red lighten-4 red-text text-darken-4 js-alert">
        <div class="Alert-content">
            <i class="material-icons">report_problem</i>
            <span><?php echo $error_message; ?>.</span>
        </div>
    </div>
<?php } ?>

<?php if(isset($message)) { ?>
	<div class="Alert Alert--float card green lighten-4 green-text text-darken-4 js-alert">
		<div class="Alert-content">
			<i class="material-icons">check_circle</i>
			<span><?php echo $message; ?>.</span>
			<button class="Alert-action js-alert-close"><i class="material-icons">close</i></button>
		</div>
	</div>
<?php } ?>