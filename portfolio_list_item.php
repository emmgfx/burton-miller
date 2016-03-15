<?php
$portfolio_first_instead_featured = intval(get_option('portfolio-use-first-image-instead-featured', 0)) == 1;

if(has_post_thumbnail() && !$portfolio_first_instead_featured):

	$project_poster = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio_1' );

else:

	$images_json = get_post_meta( get_the_ID(), 'emm_portfolio_images_order', true );

	if(!is_array(@json_decode($images_json, true)))
		$images_json = json_encode(array());

	$images_array = json_decode($images_json);


	if(isset($images_array[0])):
		$poster_meta = wp_get_attachment_metadata($images_array[0]);
		if($poster_meta != false):
			$project_poster = wp_get_attachment_image_src( $images_array[0], 'portfolio_1' );
		endif;
	endif;

endif;

$project_categories = wp_get_post_terms( $post->ID, 'project_categories' );

?>

<div class="col-md-4 col-sm-6">
	<div class="item">
		<a href="<?php the_permalink(); ?>" class="featured-image"><img class="img-hover" src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio-hover.png" /><img src="<?php echo $project_poster[0]; ?>" width="<?php echo $project_poster[1]; ?>" height="<?php echo $project_poster[2]; ?>" class="img-poster img-responsive center-block img-rounded" /></a>
		<div class="name"><?php the_title(); ?></div>
		<div class="subtitle">
			<?php foreach($project_categories as $index => $category): ?>
				<?php $isLast = $index < count($project_categories)-1; ?>
				<a href="<?php echo get_site_url(); ?>/projects/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a><?php if($isLast){ echo ', '; } ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
