<?php

function register_bm_settings() {
	register_setting( 'bm-settings', 'footer-phrase' );
	register_setting( 'bm-settings', 'social-twitter' );
	register_setting( 'bm-settings', 'social-facebook' );
	register_setting( 'bm-settings', 'social-google' );
	register_setting( 'bm-settings', 'social-tumblr' );
	register_setting( 'bm-settings', 'social-pinterest' );
	register_setting( 'bm-settings', 'home-header-bg-attachment' );
	register_setting( 'bm-settings', 'home-header-img-attachment' );
	register_setting( 'bm-settings', 'home-header-white-text' );
	register_setting( 'bm-settings', 'portfolio-use-first-image-instead-featured' );
	register_setting( 'bm-settings', 'portfolio-works-page' );

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
                <h3><span class="dashicons dashicons-admin-appearance"></span> Home header images:</h3>
				<?php
				$header_bg = get_option('home-header-bg-attachment');
				$header_img = get_option('home-header-img-attachment');
				$header_white_text = intval(get_option('home-header-white-text', 0)) == 1;
				?>
				<style>
				.header-preview{
					height: 150px;
					width: 100%;
					padding-top: 150px;
					background-image: url(<?php echo wp_get_attachment_url($header_bg); ?>);
					background-position: center center;
					background-size: cover;
					text-align: center;
					border-radius: 4px;
					background-color: #CCC;
				}
				.header-img{
					height: 150px;
					width: auto;
				}
				</style>
				<div class="header-preview">
					<img src="<?php echo wp_get_attachment_url($header_img); ?>" class="header-img" />
				</div>

				<p><label><input type="checkbox" name="home-header-white-text" value="1" <?php if($header_white_text){ echo 'checked'; } ?>/> Use white text in the home header</label></p>
				<a href="#" class="button header-background-change">Change background</a>
				<a href="#" class="button header-image-change">Change image</a>
				<a href="#" class="button header-image-remove">Remove image</a>
				<input type="hidden" name="home-header-bg-attachment" value="<?php echo intval($header_bg); ?>" />
				<input type="hidden" name="home-header-img-attachment" value="<?php echo intval($header_img); ?>" />

				<script>
            	jQuery(document).ready(function() {

            		var $ = jQuery;

            		var file_frame_background, file_frame_image;

					$(document).on('click', '.header-background-change', function( event ){

                        event.preventDefault();

                        if ( file_frame_background ) {
                            file_frame_background.open();
                            return;
                        }

                        file_frame_background = wp.media.frames.file_frame = wp.media({
                            title: jQuery( this ).data( 'uploader_title' ),
                            button: {
                                text: jQuery( this ).data( 'uploader_button_text' ),
                            },
                            multiple: false
                        });

                        file_frame_background.on( 'select', function() {

                            attachment = file_frame_background.state().get('selection').first().toJSON();

                            $('.header-preview').css("background-image", "url(" + attachment.sizes.full.url + ")");
                            $('input[name="home-header-bg-attachment"]').val(attachment.id);

                        });

                        file_frame_background.open();

            		});

					$(document).on('click', '.header-image-change', function( event ){

                        event.preventDefault();

                        if ( file_frame_image ) {
                            file_frame_image.open();
                            return;
                        }

                        file_frame_image = wp.media.frames.file_frame = wp.media({
                            title: jQuery( this ).data( 'uploader_title' ),
                            button: {
                                text: jQuery( this ).data( 'uploader_button_text' ),
                            },
                            multiple: false
                        });

                        file_frame_image.on( 'select', function() {

                            attachment = file_frame_image.state().get('selection').first().toJSON();

							$('.header-preview img').attr("src", attachment.sizes.full.url);
                            $('input[name="home-header-img-attachment"]').val(attachment.id);

                        });

                        file_frame_image.open();

            		});

            		$(document).on('click', '.header-image-remove', function(){
                        $('input[name="home-header-img-attachment"]').val("");
                        $('.header-preview img').attr("src", "");
                        $('.logo-remove').addClass('disabled');
            			return false;
            		});

            	});
            	</script>
            </div>

			<div class="card">
				<?php
				$portfolio_first_instead_featured = intval(get_option('portfolio-use-first-image-instead-featured', 0)) == 1;
				$portfolio_works_page = "";
 				?>
                <h3><span class="dashicons dashicons-format-quote"></span> General options:</h3>
                <p><label><input type="checkbox" name="portfolio-use-first-image-instead-featured" value="1" <?php if($portfolio_first_instead_featured){ echo 'checked'; } ?> /> Portfolio list items: Use first project image instead the featured. </label></p>
				<p><label>
					Full portfolio page: 
					<?php wp_dropdown_pages(array(
						"name" => "portfolio-works-page",
						"selected" => get_option("portfolio-works-page")
					)); ?>
				</label></p>
            </div>

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
