<?php if(isset($error_message)) { ?>
    <div class="Alert card red lighten-4 red-text text-darken-4 js-alert">
        <div class="Alert-content">
            <i class="material-icons">report_problem</i>
            <span><?php echo $error_message; ?>.</span>
        </div>
    </div>
<?php } ?>