	<!-- Social -->
	<?php
	$social = array(
		'twitter' => get_option('social-twitter', null),
		'facebook' => get_option('social-facebook', null),
		'google' => get_option('social-google', null),
		'tumblr' => get_option('social-tumblr', null),
		'pinterest' => get_option('social-pinterest', null),
	);

	$at_leat_one_social = false;

	foreach($social as $network)
		if($network)
			$at_leat_one_social = true
	?>

	<?php if($at_leat_one_social): ?>
		<div class="content-wrapper">
			<div class="social">
				<p class="social-title">Connect with us</p>
				<ul class="list-unstyled list-inline">
					<?php
					if($social['twitter'])
						echo '<li><a href="'.$social['twitter'].'" target="_blank" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-twitter"></i></a></li>';

					if($social['facebook'])
						echo '<li><a href="'.$social['facebook'].'" target="_blank" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-facebook"></i></a></li>';

					if($social['google'])
						echo '<li><a href="'.$social['google'].'" target="_blank" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-google-plus"></i></a></li>';

					if($social['tumblr'])
						echo '<li><a href="'.$social['tumblr'].'" target="_blank" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-tumblr"></i></a></li>';

					if($social['pinterest'])
						echo '<li><a href="'.$social['pinterest'].'" target="_blank" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-pinterest-p"></i></a></li>';

					?>
				</ul>
			</div>
		</div>
	<?php else: ?>
		<div class="spacer-70"></div>
	<?php endif; ?>

	<!-- Footer -->

	<div class="content-wrapper small-padding only-bottom">
		<div class="footer">
			<?PHP
			wp_nav_menu(array(
				'theme_location'  => 'footer',
				'menu'            => 'footer',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'list-unstyled list-inline hidden-xs',
				'menu_id'         => 'footer',
				'echo'            => true,
				'fallback_cb'     => '',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => -1,
				'walker'          => ''
			));
			?>

			<p class="copy">
				<?php
				$footer_phrase = get_option('footer-phrase', null);
				if($footer_phrase)
					echo $footer_phrase;
				else
					echo date('Y') . ' - <a href="https://github.com/emmgfx/burton-miller" target="_blank">Burton &amp; Miller</a> free template for Wordpress - Made with love in Barcelona';
				?>
			</p>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/parallax.min.js"></script>
	<script>
	jQuery(function() {

		var $ = jQuery;

		var navigation = $(".navigation");
		var menu = $(".navigation .menu");
		var hamburger = $("#hamburger");

		$(window).scroll(function(){
			var scrollTop = $(document).scrollTop();

			if(scrollTop > 100)
				navigation.addClass("scrolled");
			else
				navigation.removeClass("scrolled");
		});

		$(window).resize(function(){
			navigation.removeClass("opened");
			hamburger.removeClass("opened");
		});


		$(".mobile-menu-toggler").click(function(){
			navigation.toggleClass("opened");
			hamburger.toggleClass("opened");
			return false;
		});

	});
	</script>
	<?php wp_footer(); ?>
</body>
</html>
