<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package live
 */
$post_id = get_the_ID();
$image              = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-post-thumb' );
$author_id			= $post->post_author;
$author_name 		= get_the_author_meta( 'display_name', $author_id );
?>
<div class="col-md-6 col-xl-4">
	<div class="card">
		<a href="<?php echo get_the_permalink(); ?>" class="card-img">
			<?php if( $image ) : ?>
				<img src="<?php echo $image[0]; ?>" alt="">
			<?php else : ?>
				<?php echo getImage('recipe-placeholder.jpg') ?>
			<?php endif; ?>
		</a>
		<div class="card-body">
			<a href="<?php echo get_the_permalink(); ?>">
				<h2 class="card-title"><?php echo get_the_title(); ?></h2>
			</a>
		</div>
	</div>
</div>
