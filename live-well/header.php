<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package live
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image 			= wp_get_attachment_image_src( $custom_logo_id , 'full' );
	// ACF
	$facebook_url 				= get_field('facebook_url', 'option');
	$instagram_url 				= get_field('instagram_url', 'option');
	$text_before_header 		= get_field('text_before_header', 'option');
	$text_before_header_link 	= get_field('text_before_header_link', 'option');
	wp_body_open();
?>
	<div class="text_upto_header" style="background-color: #346139; padding-top: 5px;
    padding-bottom: 5px;
    display: flex;
    align-content: center;
    justify-content: center;>
		<p class="center_text"><span style="background-color: #346139; color: #ffffff!important;">הצטרפו <span style="text-decoration: underline;"><a class="first_link" href="https://liveil.co.il/%d7%9c%d7%99%d7%91-%d7%91%d7%9c%d7%95%d7%92/">לבלוג</a></span> שלנו ותוכלו להנות מכתבות מקצועיות ופרסומים בלעדיים</span></p>
	</div>
<?php if ($text_before_header) : ?>
	<div class="before-header d-none d-md-block"><a href="<?php echo $text_before_header_link; ?>"><?php echo $text_before_header; ?></a></div>
<?php endif; ?>
<header id="masthead" class="site-header print-no">
	<div class="container-md d-flex align-items-center justify-content-between h-100">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php
					if ($image) :
							echo '<img src="'. $image[0] .'" alt="">';
						else :
							echo getImage('logo.svg');
					endif;
				?>
			</a>
		</div><!-- .site-branding -->
		<nav class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'after'          => '<span class="sub-menu-arrow"><svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 1.5L5 5.5L9 1.5" stroke="#336138" stroke-width="1.15" stroke-linecap="round" stroke-linejoin="round"/>
					</svg></span>',
					'container'      => '',
					'items_wrap' => '<ul id="%1$s" class="menu">%3$s</ul>',
				)
			);
			?>
			<!-- Search Form -->
			<?php //echo do_shortcode('[wpdreams_ajaxsearchpro id=3]'); ?>
			<form role="search" method="get" class="search-form search-form-m d-block d-lg-none" action="<?php echo home_url( '/' ); ?>">
				<div class="input-group">
				<input type="search" placeholder="<?php echo __( 'Search...', 'live' )?>" class="form-control" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo __( 'Search...', 'live' )?>" />
					<span class="search-ico">
						<input type="submit" value="<?php echo __( 'Search', 'live' ); ?>"/>
					</span>
				</div>
				<!-- <input type="hidden" name="post_type" value="product" /> -->
			</form>
			<!-- Search Form -->
		</nav><!-- #site-navigation -->
		<div class="social-search">
			<a class="facebook" href="<?php echo $facebook_url; ?>" target="url">
				<svg fill="#336138"  version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  width="800px" height="800px" viewBox="0 0 512 512" xml:space="preserve">
						<g id="7935ec95c421cee6d86eb22ecd11b7e3">
						<path style="display: inline;" d="M283.122,122.174c0,5.24,0,22.319,0,46.583h83.424l-9.045,74.367h-74.379 c0,114.688,0,268.375,0,268.375h-98.726c0,0,0-151.653,0-268.375h-51.443v-74.367h51.443c0-29.492,0-50.463,0-56.302 c0-27.82-2.096-41.02,9.725-62.578C205.948,28.32,239.308-0.174,297.007,0.512c57.713,0.711,82.04,6.263,82.04,6.263 l-12.501,79.257c0,0-36.853-9.731-54.942-6.263C293.539,83.238,283.122,94.366,283.122,122.174z"> </path>
					</g>
				</svg>
			</a>
			<a class="instagram" href="<?php echo $instagram_url; ?>" target="url">
				<svg fill="#336138" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
					<path d="M25.805 7.996c0 0 0 0.001 0 0.001 0 0.994-0.806 1.799-1.799 1.799s-1.799-0.806-1.799-1.799c0-0.994 0.806-1.799 1.799-1.799v0c0.993 0.001 1.798 0.805 1.799 1.798v0zM16 20.999c-2.761 0-4.999-2.238-4.999-4.999s2.238-4.999 4.999-4.999c2.761 0 4.999 2.238 4.999 4.999v0c0 0 0 0.001 0 0.001 0 2.76-2.237 4.997-4.997 4.997-0 0-0.001 0-0.001 0h0zM16 8.3c0 0 0 0-0 0-4.253 0-7.7 3.448-7.7 7.7s3.448 7.7 7.7 7.7c4.253 0 7.7-3.448 7.7-7.7v0c0-0 0-0 0-0.001 0-4.252-3.447-7.7-7.7-7.7-0 0-0 0-0.001 0h0zM16 3.704c4.003 0 4.48 0.020 6.061 0.089 1.003 0.012 1.957 0.202 2.84 0.538l-0.057-0.019c1.314 0.512 2.334 1.532 2.835 2.812l0.012 0.034c0.316 0.826 0.504 1.781 0.516 2.778l0 0.005c0.071 1.582 0.087 2.057 0.087 6.061s-0.019 4.48-0.092 6.061c-0.019 1.004-0.21 1.958-0.545 2.841l0.019-0.058c-0.258 0.676-0.64 1.252-1.123 1.726l-0.001 0.001c-0.473 0.484-1.049 0.866-1.692 1.109l-0.032 0.011c-0.829 0.316-1.787 0.504-2.788 0.516l-0.005 0c-1.592 0.071-2.061 0.087-6.072 0.087-4.013 0-4.481-0.019-6.072-0.092-1.008-0.019-1.966-0.21-2.853-0.545l0.059 0.019c-0.676-0.254-1.252-0.637-1.722-1.122l-0.001-0.001c-0.489-0.47-0.873-1.047-1.114-1.693l-0.010-0.031c-0.315-0.828-0.506-1.785-0.525-2.785l-0-0.008c-0.056-1.575-0.076-2.061-0.076-6.053 0-3.994 0.020-4.481 0.076-6.075 0.019-1.007 0.209-1.964 0.544-2.85l-0.019 0.059c0.247-0.679 0.632-1.257 1.123-1.724l0.002-0.002c0.468-0.492 1.045-0.875 1.692-1.112l0.031-0.010c0.823-0.318 1.774-0.509 2.768-0.526l0.007-0c1.593-0.056 2.062-0.075 6.072-0.075zM16 1.004c-4.074 0-4.582 0.019-6.182 0.090-1.315 0.028-2.562 0.282-3.716 0.723l0.076-0.025c-1.040 0.397-1.926 0.986-2.656 1.728l-0.001 0.001c-0.745 0.73-1.333 1.617-1.713 2.607l-0.017 0.050c-0.416 1.078-0.67 2.326-0.697 3.628l-0 0.012c-0.075 1.6-0.090 2.108-0.090 6.182s0.019 4.582 0.090 6.182c0.028 1.315 0.282 2.562 0.723 3.716l-0.025-0.076c0.796 2.021 2.365 3.59 4.334 4.368l0.052 0.018c1.078 0.415 2.326 0.669 3.628 0.697l0.012 0c1.6 0.075 2.108 0.090 6.182 0.090s4.582-0.019 6.182-0.090c1.315-0.029 2.562-0.282 3.716-0.723l-0.076 0.026c2.021-0.796 3.59-2.365 4.368-4.334l0.018-0.052c0.416-1.078 0.669-2.326 0.697-3.628l0-0.012c0.075-1.6 0.090-2.108 0.090-6.182s-0.019-4.582-0.090-6.182c-0.029-1.315-0.282-2.562-0.723-3.716l0.026 0.076c-0.398-1.040-0.986-1.926-1.729-2.656l-0.001-0.001c-0.73-0.745-1.617-1.333-2.607-1.713l-0.050-0.017c-1.078-0.416-2.326-0.67-3.628-0.697l-0.012-0c-1.6-0.075-2.108-0.090-6.182-0.090z">
					</path>
				</svg>
			</a>
			<!-- Search Form -->
			<?php //echo do_shortcode('[wpdreams_ajaxsearchpro id=3]'); ?>
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<div class="input-group">
				<input type="search" placeholder="<?php echo __( 'Search...', 'live' )?>" class="form-control" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo __( 'Search...', 'live' )?>" />
					<span class="search-ico">
						<input type="submit" value="<?php echo __( 'Search', 'live' ); ?>"/>
					</span>
				</div>
				<!-- <input type="hidden" name="post_type" value="product" /> -->
			</form>
			<!-- Search Form -->
		</div>
		<button class="hamburger hamburger--spin" type="button" aria-label="Menu"
			aria-controls="navigation">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>
	</div>
</header><!-- #masthead -->
