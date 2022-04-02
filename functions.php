<?php
/**
 * icstc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package icstc
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function icstc_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on icstc, use a find and replace
		* to change 'icstc' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'icstc', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'icstc' ),
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
			'icstc_custom_background_args',
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
add_action( 'after_setup_theme', 'icstc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function icstc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'icstc_content_width', 640 );
}
add_action( 'after_setup_theme', 'icstc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function icstc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'icstc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'icstc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'icstc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function icstc_scripts() {
	wp_enqueue_style( 'icstc-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'icstc-style', 'rtl', 'replace' );

	wp_enqueue_script( 'icstc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'icstc_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register custom post types.
 */
function register_custom_post_types() {

	// Register Driver post type
	register_post_type( 'driver', array(
		'supports' => array( 'title' ),
		'rewrite' => array( 'slug' => 'drivers' ),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => 'Drivers',
			'add_new_item' => 'Add new Driver',
			'edit_item' => 'Edit Driver',
			'all_items' => 'All Drivers',
			'singular_name' => 'Driver'
		),
		'menu_icon' => 'dashicons-admin-users'
	) );
	
	// Register Track post type
	register_post_type( 'track', array(
		'supports' => array( 'title' ),
		'rewrite' => array( 'slug' => 'tracks' ),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => 'Tracks',
			'add_new_item' => 'Add new Track',
			'edit_item' => 'Edit Track',
			'all_items' => 'All Tracks',
			'singular_name' => 'Track'
		),
		'menu_icon' => 'dashicons-location'
	) );
	
	// Register Car post type
	register_post_type( 'car', array(
		'supports' => array( 'title' ),
		'rewrite' => array( 'slug' => 'cars' ),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => 'Cars',
			'add_new_item' => 'Add new Car',
			'edit_item' => 'Edit Car',
			'all_items' => 'All Cars',
			'singular_name' => 'Car'
		),
		'menu_icon' => 'dashicons-car'
	) );
}
add_action( 'init', 'register_custom_post_types' );

/**
 * Add Track class.
 */

 Class Driver {

	public function __construct( $id ) {
		$this->id = $id;
		$this->data = $this->get_driver_data();
	}

	private function get_driver_data() {
		global $wpdb;
		return $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}driver WHERE driver_id=$this->id" );
	}

	public function get_all_records() {
		global $wpdb;
		return $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}car_track_driver WHERE driver_id=$this->id" );
	}

	// Current proper format TO BE HANDLED?: set_time(1, 3, '00:01:07.575', '2022-04-02 21:06:41' )
	public function set_time( $track_id, $car_id, $result, $set_at ) {
		echo 'dupa';
		global $wpdb;
		$wpdb->insert( 'wp_car_track_driver', array(
			'track_id' => $track_id,
			'car_id' => $car_id,
			'driver_id' => $this->id,
			'result' => $result,
			'set_at' => $set_at
		) );
	}
	
 }
