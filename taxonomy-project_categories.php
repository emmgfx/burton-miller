<?php get_header(); ?>

<!-- Portfolio -->

<div class="content-wrapper portfolio">
	<div class="container">

		<div class="row">
			<?php
			if(have_posts()): while(have_posts()): the_post();
			include(locate_template('portfolio_list_item.php'));
			endwhile; endif;
			?>
		</div>

		<div align="center">
			<div class="spacer-70"></div>
			<?PHP get_template_part('pagination'); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
