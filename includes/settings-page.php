<?php

function register_bm_settings() {
	register_setting( 'bm-settings', 'footer-phrase' );
	register_setting( 'bm-settings', 'social-twitter' );
	register_setting( 'bm-settings', 'social-facebook' );
	register_setting( 'bm-settings', 'social-google' );
	register_setting( 'bm-settings', 'social-tumblr' );
	register_setting( 'bm-settings', 'social-pinterest' );
}


function bm_admin_menu() {
	add_theme_page( 'Burton & Miller', 'Burton & Miller', 'manage_options', 'bm-settings', 'bm_settings' );
}

function bm_settings() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}
    wp_enqueue_media();
    ?>
	<div class="wrap">

        <h2>Burton &amp; Miller Settings</h2>

        <form method="post" action="options.php">

            <?PHP settings_fields( 'bm-settings' ); ?>
            <?PHP do_settings_sections( 'bm-settings' ); ?>

			<div class="card">
                <h3><span class="dashicons dashicons-format-quote"></span> Footer phrase:</h3>
                <p>Usually the license</p>
                <p><input style="width: 100%;" type="text" name="footer-phrase" value="<?php echo esc_attr( get_option('footer-phrase') ); ?>" /></p>
            </div>

			<div class="card">
                <h3><span class="dashicons dashicons-admin-site"></span> Social networks:</h3>
				<p>Twitter</p>
                <p><input style="width: 100%;" type="text" name="social-twitter" value="<?php echo esc_attr( get_option('social-twitter') ); ?>" placeholder="http://..." /></p>
				<p>Facebook</p>
                <p><input style="width: 100%;" type="text" name="social-facebook" value="<?php echo esc_attr( get_option('social-facebook') ); ?>" placeholder="http://..." /></p>
				<p>Google Plus</p>
                <p><input style="width: 100%;" type="text" name="social-google" value="<?php echo esc_attr( get_option('social-google') ); ?>" placeholder="http://..." /></p>
				<p>Tumblr</p>
                <p><input style="width: 100%;" type="text" name="social-tumblr" value="<?php echo esc_attr( get_option('social-tumblr') ); ?>" placeholder="http://..." /></p>
				<p>Pinterest</p>
                <p><input style="width: 100%;" type="text" name="social-pinterest" value="<?php echo esc_attr( get_option('social-pinterest') ); ?>" placeholder="http://..." /></p>
				<p class="description">Keep the field empty if you don't want the button on the footer.</p>
			</div>

            <?php submit_button(); ?>

        </form>
	</div>
    <?PHP
}

if ( is_admin() ){
    add_action( 'admin_menu', 'bm_admin_menu' );
    add_action( 'admin_init', 'register_bm_settings' );
}
