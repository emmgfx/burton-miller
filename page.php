<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<div class="container">

	<?php $post_classes = array('post'); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>

		<div class="content"><?PHP the_content(); ?></div>

	</div>

</div>
<?php endwhile; endif; ?>


<?php get_footer(); ?>
