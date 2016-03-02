	<!-- Social -->

	<div class="content-wrapper">
		<div class="social">
			<p class="social-title">Connect with us</p>
			<ul class="list-unstyled list-inline">
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-twitter"></i></a></li>
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-facebook"></i></a></li>
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-google-plus"></i></a></li>
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-tumblr"></i></a></li>
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-pinterest-p"></i></a></li>
			</ul>
		</div>
	</div>

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

			<p class="copy">&copy; <?php echo date('Y'); ?> Burton &amp; Miller free template for Wordpress - Made with love in Barcelona</p>
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
