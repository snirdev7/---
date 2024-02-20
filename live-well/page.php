<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package live
 */

get_header();
$post_id = get_the_ID();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
?>
<?php if ( $image ) : ?>
	<div class="hero-banner" style="background-image: url('<?php echo $image[0]; ?>');"></div>
<?php endif; ?>
<div class="container">
	<main id="primary" class="site-main">
		<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
		?>
	</main><!-- #main -->
</div>
<?php
get_footer();
