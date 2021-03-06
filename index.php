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

			$args['posts_per_page'] = 6;

			$wp_query->query($args);

			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				include(locate_template('portfolio_list_item.php'));
			endwhile;
			?>
		</div>

		<div align="center">
			<div class="spacer-70"></div>
			<?php
			$portfolio_works_page = get_option('portfolio-works-page', '#');
			if(is_numeric($portfolio_works_page))
				$portfolio_works_page = get_permalink($portfolio_works_page);
			?>
			<a href="<?php echo $portfolio_works_page; ?>" class="btn btn-burton">View more</a>
		</div>

	</div>
</div>

<?php get_footer(); ?>
