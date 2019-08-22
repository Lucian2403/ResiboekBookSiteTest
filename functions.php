<?php
/**
 * Resiboek functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Resiboek
 */

//IMPORT CPT_Taxonomy.php
define( 'cpt_taxonomies', get_template_directory() );
/////////////////////////

if ( ! function_exists( 'resiboek_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function resiboek_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Resiboek, use a find and replace
		 * to change 'resiboek' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'resiboek', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'resiboek' ),
            'menu-2' => esc_html__( 'Mobile', 'resiboek' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'resiboek_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'resiboek_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function resiboek_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'resiboek_content_width', 640 );
}
add_action( 'after_setup_theme', 'resiboek_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function resiboek_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'resiboek' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'resiboek' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'resiboek_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function resiboek_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, null, false );
    wp_enqueue_script( 'jquery' );

	wp_enqueue_style( 'resiboek-style', get_stylesheet_uri() );

    wp_enqueue_script( 'resiboek-main', get_template_directory_uri() . '/js/main.js', array(), '1.1', true );
	wp_enqueue_script( 'resiboek-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_style( 'fontawesome', '//use.fontawesome.com/releases/v5.8.1/css/all.css' );

    //    MMENU
    wp_enqueue_style ( 'mmenu_style', '//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/6.1.7/jquery.mmenu.all.css' );
    wp_enqueue_script( 'mmenu_js', '//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/6.1.7/jquery.mmenu.all.js', array('jquery'), '', true );

    //OWL CAROUSEL
//    wp_enqueue_script( 'carousel',  get_template_directory_uri() . '/js/Carousel.js', array(), '20151215', true );
    wp_enqueue_script( 'owl',       get_template_directory_uri() . '/OwlCarousel/dist/owl.carousel.js', array(), '20151215', true );
    wp_enqueue_style( 'owl.style1', get_template_directory_uri() . '/OwlCarousel/dist/assets/owl.carousel.css', false, '1.1', 'all');
    wp_enqueue_style( 'owl.style2', get_template_directory_uri() . '/OwlCarousel/dist/assets/owl.theme.default.css', false, '1.1', 'all');

    wp_enqueue_script( 'resiboek-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'resiboek_scripts' );

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


if( function_exists('acf_add_options_page') ) {

    // add parent
    $parent = acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title' 	=> 'Theme Settings',
        'redirect' 		=> false
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Header Settings',
        'menu_title' 	=> 'Header',
        'parent_slug' 	=> $parent['menu_slug'],
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Footer Settings',
        'menu_title' 	=> 'The Footer',
        'parent_slug' 	=> $parent['menu_slug'],
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Error Page Settings',
        'menu_title' 	=> 'Error Page',
        'parent_slug' 	=> $parent['menu_slug'],
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Boeken Page Settings',
        'menu_title' 	=> 'Boeken Page',
        'parent_slug' 	=> $parent['menu_slug'],
    ));

}


require_once cpt_taxonomies . '/template-parts/CPT_Taxonomy.php';