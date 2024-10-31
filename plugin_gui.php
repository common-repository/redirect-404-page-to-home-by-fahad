<div class="wrap">
<h1>404 to Home</h1>
<form method="post" action="options.php"> 
<?php 
settings_fields( '404_options' );
do_settings_sections( '404_options' );
?>
       <label for="Student">Activate 404 to Home Page Redirect</label>
       <input name="checked_status" type="checkbox" value="true" <?php checked( 'true', get_option( 'checked_status' ) ); ?> />
       <br><label for="Student">Redirect to Specific Page: (leave empty to redirect to home)</label>
       <br><input name="redirect_url" type="input" value="<?php echo sanitize_text_field(get_option( 'redirect_url' )) ?>" />
<?php
submit_button();
;?>
</form>
</div>