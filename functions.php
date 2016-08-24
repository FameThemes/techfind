<?php
/**
 * Techfind functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Techfind
 */

if ( ! function_exists( 'techfind_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function techfind_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Techfind, use a find and replace
	 * to change 'techfind' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'techfind', get_template_directory() . '/languages' );

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
	 * Enable support for custom logo.
	 *
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 49,
		'width'       => 162,
		'flex-height' => true,
	) );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	/* Homepage Default */
	add_image_size( 'thumb-200x155', 200, 155, true );
	add_image_size( 'thumb-580x250', 580, 250, true );

	/* Featured Posts */
	add_image_size( 'thumb-560x280', 560, 280, true );
	add_image_size( 'thumb-296x280', 296, 280, true );

	/* Sidebar Widgets */
	add_image_size( 'thumb-234x125', 234, 125, true );
	add_image_size( 'thumb-90x80', 90, 80, true );

	/* Related Posts, Footer Posts */
	add_image_size( 'thumb-210x140', 210, 140, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'techfind' ),
		'secondary' => __('Secondary', 'techfind'),
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
	add_theme_support( 'custom-background', apply_filters( 'techfind_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'techfind_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @techfindal int $content_width
 */
function techfind_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'techfind_content_width', 640 );
}
add_action( 'after_setup_theme', 'techfind_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function techfind_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'techfind' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'techfind' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Metro', 'techfind' ),
		'id'            => 'metro',
		'description'   => esc_html__( 'Add widgets here.', 'techfind' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home 1', 'techfind' ),
		'id'            => 'home-1',
		'description'   => esc_html__( 'Add widgets here.', 'techfind' ),
		'before_widget' => '<section id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="home-widget-title widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home 2', 'techfind' ),
		'id'            => 'home-2',
		'description'   => esc_html__( 'Add widgets here.', 'techfind' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'techfind' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'techfind' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'techfind' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'techfind' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'techfind_widgets_init' );

if ( ! function_exists( 'techfind_fonts_url' ) ) :
/**
 * @return string Google fonts URL for the theme.
 */
function techfind_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'techfind' ) ) {
		$fonts[] = 'Lato:400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Merriweather, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'techfind' ) ) {
		$fonts[] = 'Merriweather:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'techfind' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function techfind_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'techfind-fonts', techfind_fonts_url(), array(), null );
	// Add Font Awesome, used in the main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/font-awesome.min.css', array(), '4.5' );

	wp_enqueue_style( 'techfind-style', get_stylesheet_uri() );
	$primary   = esc_attr( get_theme_mod( 'primary_color', '#c70909' ) );
	$secondary = esc_attr( get_theme_mod( 'secondary_color', '#333' ) );
	$custom_css = "
			button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"],
			.st-menu .btn-close-home .home-button,
			.st-menu .btn-close-home .close-button {
				background-color: {$primary};
				border-color : {$primary};
			}
			.menu-sticky, .top-bar { background-color: {$primary}; }
			.widget-title { border-color : {$primary}; }
			.widget-title, .widget-title a,
			#respond h3#reply-title,
			.secondary-navigation ul li a:hover,
			.secondary-navigation ul li a:hover i { color : {$primary};}


			.main-navigation a:hover,
			.main-navigation .current_page_item > a,
			.main-navigation .current-menu-item > a,
			.main-navigation .current_page_ancestor > a {
				background-color : {$primary};
				color : #fff;
			}
			a,
			h2.entry-title a,
			h1.entry-title,
			.footer-staff-picks h3
			{
				color: {$secondary};
			}
			button:hover, input[type=\"button\"]:hover,
			input[type=\"reset\"]:hover,
			input[type=\"submit\"]:hover,
			.st-menu .btn-close-home .home-button:hover,
			.st-menu .btn-close-home .close-button:hover {
					background-color: {$secondary};
					border-color: {$secondary};
			}";
	wp_add_inline_style( 'techfind-style', $custom_css );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'techfind-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'techfind-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), '20151215', true );
	wp_enqueue_script( 'themes', get_template_directory_uri() . '/assets/js/themes.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'techfind_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 *  Widgets
 */
require get_template_directory() . '/inc/widgets/metro_widget.php';
require get_template_directory() . '/inc/widgets/recent_posts_widget.php';
require get_template_directory() . '/inc/widgets/listed_post_widget.php';
require get_template_directory() . '/inc/widgets/footer_posts_widget.php';
