<?php
/**
 * IFN functions and definitions
 *
 * @package IFN
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'ifn_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ifn_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on IFN, use a find and replace
	 * to change 'ifn' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ifn', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ifn' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ifn_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // ifn_setup
add_action( 'after_setup_theme', 'ifn_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function ifn_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ifn' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ifn_widgets_init' );

function ifn_header_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Header Widgets', 'ifn' ),
		'id'            => 'sidebar-2',
		'class' 		=>	'header-widgets',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'ifn_header_widgets_init' );

/**
 * Custom Post Types.
 */



add_action( 'init', 'register_ifn_announcement' );

function register_ifn_announcement() {

    $labels = array( 
        'name' => _x( 'Announcements', 'ifn_announcement' ),
        'singular_name' => _x( 'Announcement', 'ifn_announcement' ),
        'add_new' => _x( 'Add New', 'ifn_announcement' ),
        'add_new_item' => _x( 'Add New Announcement', 'ifn_announcement' ),
        'edit_item' => _x( 'Edit Announcement', 'ifn_announcement' ),
        'new_item' => _x( 'New Announcement', 'ifn_announcement' ),
        'view_item' => _x( 'View Announcement', 'ifn_announcement' ),
        'search_items' => _x( 'Search Announcements', 'ifn_announcement' ),
        'not_found' => _x( 'No details announcements found', 'ifn_announcement' ),
        'not_found_in_trash' => _x( 'No Announcements found in Trash', 'ifn_announcement' ),
        'parent_item_colon' => _x( 'Parent Announcement:', 'ifn_announcement' ),
        'menu_name' => _x( 'Announcements', 'ifn_announcement' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Announcement',
        'supports' => array( 'title', 'editor', 'custom-fields' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'slug' => announcements,
        'capability_type' => 'post'
    );

    register_post_type( 'ifn_announcement', $args );
}


/**
 * Enqueue scripts and styles.
 */
function ifn_scripts() {
	wp_enqueue_style( 'ifn-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ifn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ifn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.0.1', true );

     wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.0.1', 'all' );
     
     wp_register_style( 'ifn-custom-css', get_template_directory_uri() . '/styles/ifn-custom.css', array(), '3.0.1', 'all' );

     wp_enqueue_script( 'bootstrap-js' );

     wp_enqueue_style( 'bootstrap-css' );
     
     wp_enqueue_style( 'ifn-custom-css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ifn_scripts' );

//remove_filter ('the_content', 'wpautop');
remove_filter("the_content", "wptexturize");
remove_filter("the_content", "convert_chars");

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Register Custom Navigation Walker
 */
require_once('wp_bootstrap_navwalker.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
