<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package live
 */

get_header();
?>

<div class="container site-main">
	<?php if ( have_posts() ) : ?>
		<header class="page-header pb-4">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'live' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->
		<div class="row wrap-blog g-lg-5">
		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
	</div>
</div><!-- #main -->

<?php
get_footer();
