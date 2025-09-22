<?php
/**
 * Article Blog Writer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Article Blog Writer
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Article_Blog_Writer_Loader.php' );

$Article_Blog_Writer_Loader = new \WPTRT\Autoload\Article_Blog_Writer_Loader();

$Article_Blog_Writer_Loader->article_blog_writer_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Article_Blog_Writer_Loader->article_blog_writer_register();

if ( ! function_exists( 'article_blog_writer_setup' ) ) :

	function article_blog_writer_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'article-blog-writer', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('article-blog-writer-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','article-blog-writer' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'article_blog_writer_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 200,
			'width'       => 200,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_article_blog_writer_dismissable_notice', 'article_blog_writer_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'article_blog_writer_setup' );

function article_blog_writer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'article_blog_writer_content_width', 1170 );
}
add_action( 'after_setup_theme', 'article_blog_writer_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function article_blog_writer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'article-blog-writer' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'article-blog-writer' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'article-blog-writer' ),
		'id'            => 'article-blog-writer-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'article-blog-writer' ),
		'id'            => 'article-blog-writer-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'article-blog-writer' ),
		'id'            => 'article-blog-writer-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'article_blog_writer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function article_blog_writer_scripts() {

	wp_enqueue_style(
		'instrument-serif',
		article_blog_writer_wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap'),  //  font-family: "Instrument serif", serif;
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'inter',
		article_blog_writer_wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap'),  //  font-family: "Inter", sans-serif;
		array(),
		'1.0'
	);

	wp_enqueue_style( 'article-blog-writer-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'article-blog-writer-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'article-blog-writer-style',$article_blog_writer_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('article-blog-writer-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'article_blog_writer_scripts' );

/**
 * Enqueue Preloader.
 */
function article_blog_writer_preloader() {

  $article_blog_writer_theme_color_css = '';
  $article_blog_writer_preloader_bg_color = get_theme_mod('article_blog_writer_preloader_bg_color');
  $article_blog_writer_preloader_dot_1_color = get_theme_mod('article_blog_writer_preloader_dot_1_color');
  $article_blog_writer_preloader_dot_2_color = get_theme_mod('article_blog_writer_preloader_dot_2_color');
  $article_blog_writer_preloader2_dot_color = get_theme_mod('article_blog_writer_preloader2_dot_color');
  $article_blog_writer_logo_max_height = get_theme_mod('article_blog_writer_logo_max_height');
  $article_blog_writer_scroll_bg_color = get_theme_mod('article_blog_writer_scroll_bg_color');
  $article_blog_writer_scroll_color = get_theme_mod('article_blog_writer_scroll_color');
  $article_blog_writer_scroll_font_size = get_theme_mod('article_blog_writer_scroll_font_size');
  $article_blog_writer_scroll_border_radius = get_theme_mod('article_blog_writer_scroll_border_radius');
  $article_blog_writer_related_product_display_setting = get_theme_mod('article_blog_writer_related_product_display_setting', true);

  	if(get_theme_mod('article_blog_writer_logo_max_height') == '') {
		$article_blog_writer_logo_max_height = '200';
	}

	if(get_theme_mod('article_blog_writer_preloader_bg_color') == '') {
		$article_blog_writer_preloader_bg_color = '#BF00FF';
	}
	if(get_theme_mod('article_blog_writer_preloader_dot_1_color') == '') {
		$article_blog_writer_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('article_blog_writer_preloader_dot_2_color') == '') {
		$article_blog_writer_preloader_dot_2_color = '#222222';
	}

	// Start CSS build
	$article_blog_writer_theme_color_css = '';

	
	if (!$article_blog_writer_related_product_display_setting) {
	    $article_blog_writer_theme_color_css .= '
	        .related.products,
	        .related h2 {
	            display: none !important;
	        }
	    ';
	}

	$article_blog_writer_theme_color_css .= '
		.custom-logo-link img{
			max-height: '.esc_attr($article_blog_writer_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($article_blog_writer_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($article_blog_writer_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($article_blog_writer_preloader_dot_2_color).';
		  }
		}
		.load hr {
			background-color: '.esc_attr($article_blog_writer_preloader2_dot_color).';
		}
		a#button{
			background-color: '.esc_attr($article_blog_writer_scroll_bg_color).';
			color: '.esc_attr($article_blog_writer_scroll_color).' !important;
			font-size: '.esc_attr($article_blog_writer_scroll_font_size).'px;
			border-radius: '.esc_attr($article_blog_writer_scroll_border_radius).'%;
		}
	';
    wp_add_inline_style( 'article-blog-writer-style',$article_blog_writer_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'article_blog_writer_preloader' );

function article_blog_writer_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function article_blog_writer_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function article_blog_writer_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function article_blog_writer_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function article_blog_writer_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'article_blog_writer_loop_columns');
if (!function_exists('article_blog_writer_loop_columns')) {
	function article_blog_writer_loop_columns() {
		$columns = get_theme_mod( 'article_blog_writer_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'article_blog_writer_shop_per_page', 9 );
function article_blog_writer_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'article_blog_writer_product_per_page', 9 );
	return $cols;
}

// Filter to change the number of related products displayed
add_filter( 'woocommerce_output_related_products_args', 'article_blog_writer_products_args' );
function article_blog_writer_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

function article_blog_writer_get_page_id_by_title($article_blog_writer_pagename){

    $args = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'title' => $article_blog_writer_pagename
    );
    $query = new WP_Query( $args );

    $page_id = '1';
    if (isset($query->post->ID)) {
        $page_id = $query->post->ID;
    }

    return $page_id;
}

function article_blog_writer_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'pro_version_footer_setting' );
    $wp_customize->remove_control( 'pro_version_footer_setting' );

}
add_action( 'customize_register', 'article_blog_writer_remove_customize_register', 11 );


require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';