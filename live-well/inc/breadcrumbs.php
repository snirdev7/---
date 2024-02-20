<?php
/**
 * Breadcrumbs

 * @package live
 */

 function the_breadcrumb($marginTop=null) {
	global $post;
	$blog_page 			= get_permalink( 103 , false );
	$recipes_page 		= get_permalink( 203 , false );
	$catalog_page 		= get_permalink( 297 , false );
    $sep 				= ' <span class="sep"> | </span> ';
    // if (!is_front_page()) {

		// Start the breadcrumb with a link to your homepage
		if (is_singular('post')) {
			echo '<div class="breadcrumbs'. (!empty($marginTop) ? ' ' . $marginTop : '' ) .'">';
			echo '<a href="';
			echo get_option('home');
			echo '">';
			echo __('Home','live');
			// bloginfo('name');
			echo '</a>';
			echo $sep;
			echo '<a href="'. $blog_page .'" class="blog">';
			echo __('Liv Blog','live');
			echo '</a>';
			echo $sep;
			echo '<span class="current-page">';
			the_title();
			echo '</span>';
		}
		if (is_singular('recipe')) {
			echo '<div class="breadcrumbs'. (!empty($marginTop) ? ' ' . $marginTop : '' ) .'">';
			echo '<a href="'. $recipes_page .'" class="blog">';
			echo __('Recipes','live');
			echo '</a>';
			echo $sep;
			echo '<span class="current-page">';
			the_title();
			echo '</span>';
		}
		if (is_singular('product')) {
			$terms = get_the_terms( $post->ID , 'product-category' );
			echo '<div class="breadcrumbs'. (!empty($marginTop) ? ' ' . $marginTop : '' ) .'">';
			echo '<a href="#">';
			echo __('Products Catalog','live');
			echo '</a>';
			echo $sep;
			if (!empty($terms)) {
				echo '<a href="'. get_term_link($terms[0]->term_id) .'">';
			} else{
				echo '<a href="#">';

			}
			// echo '<a href="#">';
			if (!empty($terms)) {
				echo $terms[0]->name;
			} else {
				echo __('Category Name', 'live');

			}
			echo '</a>';
			echo $sep;
			echo '<span class="current-page">';
			the_title();
			echo '</span>';
		}
		if ( is_tax( 'product-category') ){
			$current_cat = get_queried_object();
			echo '<div class="breadcrumbs'. (!empty($marginTop) ? ' ' . $marginTop : '' ) .'">';
			echo '<a href="'. $catalog_page .'" >';
			echo __('Products Catalog','live');
			echo '</a>';
			echo $sep;
			echo '<span class="current-page">';
			echo $current_cat->name;
			echo '</span>';
		}
		if ( is_page() ){
		// Standard page
		if( $post->post_parent ) {
			// If child page, get parents
			$anc = get_post_ancestors( $post->ID );
			// Get parents in the right order
			$anc = array_reverse( $anc );
			echo '<div class="breadcrumbs'. (!empty($marginTop) ? ' ' . $marginTop : '' ) .'">';
			echo '<a href="';
			echo get_option('home');
			echo '">';
			echo __('Home','live');
			// bloginfo('name');
			echo '</a>';
			echo $sep;
			// Parent page loop
			if ( !isset( $parents ) ) $parents = null;
			foreach ( $anc as $ancestor ) {
				echo '<span class="current-page">';
				echo '<a href="'. get_permalink( $ancestor ) .'">' . get_the_title( $ancestor ) . '</a>';
				echo '</span>';
				echo $sep;

			}
			// Current page
			echo '<span class="current-page">'. get_the_title() .'</span>';

			} else {
			// Just display current page if not parents
			echo '<div class="breadcrumbs'. (!empty($marginTop) ? ' ' . $marginTop : '' ) .'">';
			echo '<a href="';
			echo get_option('home');
			echo '">';
			echo __('Home','live');
			// bloginfo('name');
			echo '</a>';
			echo $sep;
			echo '<span class="current-page">'. get_the_title() .'</span>';
			}
		}
		else {
			// echo '<div class="breadcrumbs'. (!empty($marginTop) ? ' ' . $marginTop : '' ) .'">';
			// echo '<a href="';
			// echo get_option('home');
			// echo '">';
			// echo __('Home','live');
			// // bloginfo('name');
			// echo '</a>';
			// echo $sep;
			// echo '<span class="current-page">';
			// the_title();
			// echo '</span>';
		}
			echo '</div>';
	// }
}