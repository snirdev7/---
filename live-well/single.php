<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package live
 */

get_header();
?>
<div class="container">
	<main id="primary" class="single-post-content">
		<div class="top-bar">
			<div class="row">
				<div class="col-lg-6">
					<?php the_breadcrumb();?>
				</div>
				<div class="col-lg-6 d-lg-flex align-items-lg-center justify-content-lg-end mt-3 mt-lg-0">
					<!-- Search Form -->
					<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
						<div class="input-group">
							<input type="search" placeholder="<?php echo __( 'sort by...', 'live' )?>" class="form-control" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo __( 'Search...', 'live' )?>" />
						</div>
					</form>
					<!-- Search Form -->
				</div>
			</div>
		</div>
		<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile; // End of the loop.
		?>
	</main><!-- #main -->
</div>

<?php
get_footer();
