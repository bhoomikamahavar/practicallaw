<?php
/**
 * practicallawlite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package practicallawlite
 */

if ( ! function_exists( 'practicallawlite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function practicallawlite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on practicallawlite, use a find and replace
		 * to change 'practicallawlite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'practicallawlite', get_template_directory() . '/languages' );

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
		add_theme_support( 'custom-background', apply_filters( 'practicallawlite_custom_background_args', array(
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
			'header-text' => array(),
		) );
	}
endif;
add_action( 'after_setup_theme', 'practicallawlite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function practicallawlite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'practicallawlite_content_width', 640 );
}
add_action( 'after_setup_theme', 'practicallawlite_content_width', 0 );

// This theme uses wp_nav_menu() in one location.
	
	function header_nav(){

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'practicallawlite' ),
		) );

	}
	add_action('init', 'header_nav');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function practicallawlite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'practicallawlite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'practicallawlite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'practicallawlite' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'practicallawlite' ),
		'before_widget' => '<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6"><div class="footer-widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'practicallawlite_widgets_init' );
 

/**
 * Enqueue scripts and styles.
 */
function practicallawlite_scripts() {


	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );

	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/css/owl.carousel.min.css' );

	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/css/fontawesome-all.min.css' );

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7cNoto+Serif:400,400i,700,700i', true );

	wp_enqueue_script( 'practicallawlite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );

	wp_enqueue_script( 'practicallawlite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0.0', true );

	wp_enqueue_script( 'owl-carousel-script', get_template_directory_uri() . '/js/owl.carousel.js', array(), '2.3.4', true );

	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(''), '4.0.0', true );

	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'return-to-top', get_template_directory_uri() . '/js/return-to-top.js', array(), '4.0.0', true );

	wp_enqueue_script( array('jquery') );

	wp_enqueue_style( 'practicallawlite-style', get_stylesheet_uri() );

	/**
	 *   Theme style
	 */ 
	wp_enqueue_style( 'themestyle', get_template_directory_uri() . '/css/themestyle.css', array('bootstrap-style'), '1.0.0', 'all' );

	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/theme-script.js', array(), '1.0.0', true);

	

}
add_action( 'wp_enqueue_scripts', 'practicallawlite_scripts' );

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
 * Load Bootstrap Navwalker Menu
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load TGM Plugin Activation
 */
require get_template_directory() . '/inc/tgm-plugin/required-plugin.php';

/**
 * Load - redux meta
 */
require get_template_directory() . '/inc/redux-options.php';

/**
 * Blog post Format
 */
function register_blog_format(){
	
	add_theme_support( 'post-formats', array( 'image', 'aside', 'audio', 'video', 'gallery', 'status', 'quote', 'link', 'chat') );

}
add_action( 'after_setup_theme', 'register_blog_format');

/**
 * If you want to add new class in category field : Use this code
 */
function add_class_to_category( $thelist, $separator, $parents){
    $class_to_add = 'meta-categories';
    return str_replace('<a href="',  '<a class="'. $class_to_add. '" href="', $thelist);
}

add_filter('the_category', '' . 'add_class_to_category',10,3);

/**
 * If you want to add new class in tags field : Use this code
 */
function add_class_to_tags( $thelist, $separator, $parents){
    $class_to_add = 'meta-tags';
    return str_replace('<a href="',  '<a class="'. $class_to_add. '" href="', $thelist);
}

add_filter('the_tags', '' . 'add_class_to_tags',10,3);

/* Blog Post Excerpt Length */
function custom_length_excerpt($word_count_limit) {
    $content = wp_strip_all_tags(get_the_excerpt() , true );
    echo wp_trim_words($content, $word_count_limit);
}


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" class="search-form">
				<div class="input-group mb-3">
					<input type="search" class="search-field form-control" placeholder="Search&#46;&#46;&#46;" value="" name="s">
				    <div class="input-group-append">
				    	<input type="submit" class="search-submit search-submit btn btn-default" value="Go">
				    </div>
				</div>
			</form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );