<?php get_header(); ?>

<!-- Portfolio -->

<div class="content-wrapper portfolio">
	<div class="container">

		<div class="row">
			<?php
			global $wp_query;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$wp_query = new WP_Query();

			$args = array(
				'post_type'			=> 'emm_portfolio',
				'paged'				=> $paged
			);

			$projects_per_page = get_option('portfolio_projects_per_page', 12);
			if($projects_per_page != false)
				$args['posts_per_page'] = intval($projects_per_page);

			$wp_query->query($args);

			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				include(locate_template('portfolio_list_item.php'));
			endwhile;
			?>
		</div>

		<div align="center">
			<div class="spacer-70"></div>
			<a href="#" class="btn btn-burton">View more</a>
		</div>

	</div>
</div>

<?php get_footer(); ?>
