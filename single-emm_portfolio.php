<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<?php
$technologies	= get_the_terms($post->ID, 'project_technologies');
$tools			= get_the_terms($post->ID, 'project_tools');
$categories		= get_the_terms($post->ID, 'project_categories');
?>

<div class="container">

	<?php $post_classes = array('post'); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>

		<div class="content"><?PHP the_content(); ?></div>

		<?php
		$images_json = get_post_meta( $post->ID, 'emm_portfolio_images_order', true );
		if(!is_array(@json_decode($images_json, true)))
			$images_json = json_encode(array());

		$images_array = json_decode($images_json);
		$total_images = count($images_array);
		$portfolio_first_instead_featured = intval(get_option('portfolio-use-first-image-instead-featured', 0)) == 1;

		foreach($images_array as $index => $attachment_id):

			if($total_images > 1 && $index == 0 && $portfolio_first_instead_featured)
				continue;

			$attachment_meta = wp_get_attachment_metadata($attachment_id);
			if($attachment_meta == false)
				continue;

			$image_m_data = wp_get_attachment_image_src( $attachment_id, 'full', '', array(
				'class' => 'img-responsive'
			));

			echo '<img src="'.$image_m_data[0].'" width="'.$image_m_data[1].'" height="'.$image_m_data[2].'" alt="'.get_the_title().'" class="img-responsive img-rounded center-block" />';
			?>
		<?php endforeach; ?>

		<?php
		$link_website = get_post_meta( $post->ID, 'emm_portfolio_link_website', true );
		$link_download = get_post_meta( $post->ID, 'emm_portfolio_link_download', true );
 		?>

		<?php if($link_website || $link_download): ?>
			<div class="spacer-70"></div>
		<?php endif; ?>

		<?php if($link_website): ?>
			<a href="<?php echo $link_website; ?>" class="btn btn-burton" target="_blank">Website</a>
		<?php endif; ?>

		<?php if($link_download): ?>
			<a href="<?php echo $link_download; ?>" class="btn btn-burton btn-success"  target="_blank">Download</a>
		<?php endif; ?>

	</div>

</div>
<?php endwhile; endif; ?>


<?php get_footer(); ?>
