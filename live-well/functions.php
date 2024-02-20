<?php
/**
 * live functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package live
 */

if ( ! defined( 'LIVE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'LIVE_VERSION', '1.0.3' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function live_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on live, use a find and replace
		* to change 'live' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'live', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );
	add_image_size('acf-admin-image', 25, 25, true);
	add_image_size('blog-post-thumb', 480, 350, true);
	add_image_size('products-thumb', 333, 333, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'live' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'live_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'live_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function live_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'live_content_width', 640 );
}
add_action( 'after_setup_theme', 'live_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function live_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'live' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'live' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	// Footer
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'live' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'live' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s no-title">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'live' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'live' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'live' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'live' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s no-title">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'live' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'live' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 5', 'live' ),
			'id'            => 'footer-5',
			'description'   => esc_html__( 'Add widgets here.', 'live' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s no-title">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'live_widgets_init' );

//estimated reading time
function reading_time() {
	global $post;
	$content     = get_post_field( 'post_content', $post->ID );
	$word_count  = str_word_count( strip_tags( $content ) );
	$readingtime = ceil( $word_count / 200 );
	if ( $readingtime == 1 ) {
		$timer = ' ' . __('minute', 'live');
	} else {
		$timer = ' ' . __('minutes', 'live');
	}
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}

/**
 * Enqueue scripts and styles.
 */
function live_scripts() {
	wp_enqueue_style( 'live-bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.rtl.min.css', array(), LIVE_VERSION );
	wp_enqueue_style( 'live-swiper-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array(), LIVE_VERSION );
	wp_enqueue_style( 'live-style', get_stylesheet_uri(), array(), LIVE_VERSION );

	wp_enqueue_script( 'live-jquery', get_template_directory_uri() . '/assets/vendor/jquery/jquery-3.6.1.min.js', array(), LIVE_VERSION, true );
	wp_enqueue_script( 'live-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.bundle.min.js', array(), LIVE_VERSION, true );
	wp_enqueue_script( 'live-swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), LIVE_VERSION, true );
	wp_enqueue_script( 'live-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), LIVE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_localize_script(
		'live-scripts',
		'LIVE',
		array(
			'ajaxUrl'     				=> admin_url( 'admin-ajax.php' ),
			'homeUrl'      				=> esc_url( home_url( '/' ) ),
			'images'       				=> get_template_directory_uri() . '/assets/images/',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'live_scripts' );

// Get image function
function getImage($image, $class = null, $alt = null, $width = null , $height = null) {
	return '<img ' . (!empty($class) ? 'class="' . $class . '"' : '') . '  src="' . get_template_directory_uri() . '/assets/images/' . $image . '"' . (!empty($alt) ? 'alt="' . $alt . '"' : 'alt="' . $image . '"') . (!empty($alt) ? 'alt="' . $alt . '"' : 'alt="' . $image . '"') . (!empty($width) ? 'width="'. $width .'"' : '')  .  '>';
}

// Put yoast at the bottom
add_filter( 'wpseo_metabox_prio', function() {
	return 'low';
} );

// Get instagram photos using API
function get_instagram_media(
	$token,
	$user,
	$limit = 5,
	$fields = 'media_url,thumbnail_url,permalink,media_type,caption',
	$restrict = [ 'IMAGE','VIDEO' ]
) {
	// The request URL. see: https://developers.facebook.com/docs/instagram-basic-display-api/reference/user
	$request_url = 'https://graph.instagram.com/' . $user . '?fields=media&access_token=' . $token;

	// We use transients to cache the results and fetch them once every hour, to avoid bumping into Instagram's limits (see: https://developers.facebook.com/docs/graph-api/overview/rate-limiting#instagram-graph-api)
	$output = get_transient( 'instagram_feed_' . $user ); // Our transient should have a unique name, so we pass the user id as an extra precaution.
	if ( false === ( $data = $output ) || empty( $output ) ) {
		// Prepare the data variable and set it as an empty array.
		$data = [];
		// Make the request
		$response      = wp_safe_remote_get( $request_url );
		$response_body = '';
		if ( is_array( $response ) && ! is_wp_error( $response ) ) {
			$response_body = json_decode( $response['body'] );
		}
		if ( $response_body && isset( $response_body->media->data ) ) {
			$i = 0;
			// Get each media item from it's ID and push it to the $data array.
			foreach ( $response_body->media->data as $media ) {
				if ( $limit > $i ) {
					$request_media_url = 'https://graph.instagram.com/' . $media->id . '?fields=' . $fields . '&access_token=' . $token;
					$media_response    = wp_safe_remote_get( $request_media_url );
					if ( is_array( $media_response ) && ! is_wp_error( $media_response ) ) {
						$media_body = json_decode( $media_response['body'] );
					}
					if ( in_array( $media_body->media_type, $restrict, true ) ) {
						$i ++;
						$data[] = $media_body;
					}
				}
			}
		}
		// Store the data in the transient and keep if for an hour.
		set_transient( 'instagram_feed_' . $user, $data, HOUR_IN_SECONDS );

		// Refresh the token to make sure it never expires (see: https://developers.facebook.com/docs/instagram-basic-display-api/guides/long-lived-access-tokens#refresh-a-long-lived-token)
		wp_safe_remote_get( 'https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=' . $token );
		$output = $data;
	}

	return $output;

}
// Add ACF Options Page
function my_acf_op_init() {
	// Check function exists.
	if (function_exists('acf_add_options_page')) {

		// Register options page.
		$option_page = acf_add_options_page(
			array(
				'page_title' => __('General Settings', 'live'),
				'menu_title' => __('General Settings', 'live'),
				'menu_slug'  => 'theme-general-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
			)
		);
	}
}
add_action('acf/init', 'my_acf_op_init');
/**
 * cleanup.
 */
require get_template_directory() . '/inc/cleanup.php';

/**
 * Custom post types
 */
require get_template_directory() . '/inc/cpt.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * ACF Extras.
 */
require get_template_directory() . '/inc/initial-acf-extras.php';


