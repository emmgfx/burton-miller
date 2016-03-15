<?php
/**
 * Template Name: Portfolio Index
 */
?>

<?php get_header(); ?>

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

			$wp_query->query($args);

			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				include(locate_template('portfolio_list_item.php'));
			endwhile;
			?>
		</div>

		<div align="center">
			<div class="spacer-70"></div>
			<?PHP get_template_part('pagination'); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
