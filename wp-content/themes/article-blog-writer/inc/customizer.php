<?php
/**
 * Article Blog Writer Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Article Blog Writer
 */

if ( ! function_exists( 'article_blog_writer_file_setup' ) ) :

    function article_blog_writer_file_setup() {

        if ( ! defined( 'ARTICLE_BLOG_WRITER_URL' ) ) {
            define( 'ARTICLE_BLOG_WRITER_URL', esc_url( 'https://www.themagnifico.net/products/blog-writer-wordpress-theme', 'article-blog-writer') );
        }
        if ( ! defined( 'ARTICLE_BLOG_WRITER_TEXT' ) ) {
            define( 'ARTICLE_BLOG_WRITER_TEXT', __( 'Blog Writer Pro','article-blog-writer' ));
        }
        if ( ! defined( 'ARTICLE_BLOG_WRITER_BUY_TEXT' ) ) {
            define( 'ARTICLE_BLOG_WRITER_BUY_TEXT', __( 'Buy Blog Writer Pro','article-blog-writer' ));
        }

    }
endif;
add_action( 'after_setup_theme', 'article_blog_writer_file_setup' );

use WPTRT\Customize\Section\Article_Blog_Writer_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Article_Blog_Writer_Button::class );

    $manager->add_section(
        new Article_Blog_Writer_Button( $manager, 'article_blog_writer_pro', [
            'title'       => esc_html( ARTICLE_BLOG_WRITER_TEXT,'article-blog-writer' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'article-blog-writer' ),
            'button_url'  => esc_url( ARTICLE_BLOG_WRITER_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'article-blog-writer-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'article-blog-writer-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function article_blog_writer_customize_register($wp_customize){

    // Pro Version
    class Article_Blog_Writer_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( ARTICLE_BLOG_WRITER_BUY_TEXT  ,'article-blog-writer' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function article_blog_writer_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('article_blog_writer_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'article_blog_writer_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'article-blog-writer' ),
        'section'        => 'title_tagline',
        'settings'       => 'article_blog_writer_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('article_blog_writer_logo_title_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'article_blog_writer_sanitize_number_absint'
    ));
    $wp_customize->add_control('article_blog_writer_logo_title_font_size',array(
        'label' => esc_html__('Title Font Size','article-blog-writer'),
        'section' => 'title_tagline',
        'type'    => 'number'
    ));

    $wp_customize->add_setting('article_blog_writer_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'article_blog_writer_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'article-blog-writer' ),
        'section'        => 'title_tagline',
        'settings'       => 'article_blog_writer_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('article_blog_writer_logo_tagline_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'article_blog_writer_sanitize_number_absint'
    ));
    $wp_customize->add_control('article_blog_writer_logo_tagline_font_size',array(
        'label' => esc_html__('Tagline Font Size','article-blog-writer'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    //Logo
    $wp_customize->add_setting('article_blog_writer_logo_max_height',array(
        'default'   => '200',
        'sanitize_callback' => 'article_blog_writer_sanitize_number_absint'
    ));
    $wp_customize->add_control('article_blog_writer_logo_max_height',array(
        'label' => esc_html__('Logo Width','article-blog-writer'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Global Color Settings
     $wp_customize->add_section('article_blog_writer_global_color_settings',array(
        'title' => esc_html__('Global Settings','article-blog-writer'),
        'priority'   => 28,
    ));

    $wp_customize->add_setting( 'article_blog_writer_global_color', array(
        'default' => '#BF00FF',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_blog_writer_global_color', array(
        'description' => __('Change the global color of the theme in one click.', 'article-blog-writer'),
        'section' => 'article_blog_writer_global_color_settings',
        'settings' => 'article_blog_writer_global_color',
    )));

    //Typography option
    $article_blog_writer_font_array = array(
        ''                       => 'No Fonts',
        'Abril Fatface'          => 'Abril Fatface',
        'Acme'                   => 'Acme',
        'Anton'                  => 'Anton',
        'Architects Daughter'    => 'Architects Daughter',
        'Arimo'                  => 'Arimo',
        'Arsenal'                => 'Arsenal',
        'Arvo'                   => 'Arvo',
        'Alegreya'               => 'Alegreya',
        'Alfa Slab One'          => 'Alfa Slab One',
        'Averia Serif Libre'     => 'Averia Serif Libre',
        'Bangers'                => 'Bangers',
        'Boogaloo'               => 'Boogaloo',
        'Bad Script'             => 'Bad Script',
        'Bitter'                 => 'Bitter',
        'Bree Serif'             => 'Bree Serif',
        'BenchNine'              => 'BenchNine',
        'Cabin'                  => 'Cabin',
        'Cardo'                  => 'Cardo',
        'Courgette'              => 'Courgette',
        'Cherry Swash'           => 'Cherry Swash',
        'Cormorant Garamond'     => 'Cormorant Garamond',
        'Crimson Text'           => 'Crimson Text',
        'Cuprum'                 => 'Cuprum',
        'Cookie'                 => 'Cookie',
        'Chewy'                  => 'Chewy',
        'Days One'               => 'Days One',
        'Dosis'                  => 'Dosis',
        'Droid Sans'             => 'Droid Sans',
        'Economica'              => 'Economica',
        'Fredoka One'            => 'Fredoka One',
        'Fjalla One'             => 'Fjalla One',
        'Francois One'           => 'Francois One',
        'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
        'Gloria Hallelujah'      => 'Gloria Hallelujah',
        'Great Vibes'            => 'Great Vibes',
        'Handlee'                => 'Handlee',
        'Hammersmith One'        => 'Hammersmith One',
        'Inconsolata'            => 'Inconsolata',
        'Indie Flower'           => 'Indie Flower',
        'IM Fell English SC'     => 'IM Fell English SC',
        'Julius Sans One'        => 'Julius Sans One',
        'Josefin Slab'           => 'Josefin Slab',
        'Josefin Sans'           => 'Josefin Sans',
        'Kanit'                  => 'Kanit',
        'Lobster'                => 'Lobster',
        'Lato'                   => 'Lato',
        'Lora'                   => 'Lora',
        'Libre Baskerville'      => 'Libre Baskerville',
        'Lobster Two'            => 'Lobster Two',
        'Merriweather'           => 'Merriweather',
        'Monda'                  => 'Monda',
        'Montserrat'             => 'Montserrat',
        'Muli'                   => 'Muli',
        'Marck Script'           => 'Marck Script',
        'Noto Serif'             => 'Noto Serif',
        'Open Sans'              => 'Open Sans',
        'Overpass'               => 'Overpass',
        'Overpass Mono'          => 'Overpass Mono',
        'Oxygen'                 => 'Oxygen',
        'Orbitron'               => 'Orbitron',
        'Patua One'              => 'Patua One',
        'Pacifico'               => 'Pacifico',
        'Padauk'                 => 'Padauk',
        'Playball'               => 'Playball',
        'Playfair Display'       => 'Playfair Display',
        'PT Sans'                => 'PT Sans',
        'Philosopher'            => 'Philosopher',
        'Permanent Marker'       => 'Permanent Marker',
        'Poiret One'             => 'Poiret One',
        'Quicksand'              => 'Quicksand',
        'Quattrocento Sans'      => 'Quattrocento Sans',
        'Raleway'                => 'Raleway',
        'Rubik'                  => 'Rubik',
        'Roboto'                 => 'Roboto',
        'Rokkitt'                => 'Rokkitt',
        'Russo One'              => 'Russo One',
        'Righteous'              => 'Righteous',
        'Slabo'                  => 'Slabo',
        'Source Sans Pro'        => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light'     => 'Shadows Into Light',
        'Sacramento'             => 'Sacramento',
        'Shrikhand'              => 'Shrikhand',
        'Tangerine'              => 'Tangerine',
        'Ubuntu'                 => 'Ubuntu',
        'VT323'                  => 'VT323',
        'Varela Round'           => 'Varela Round',
        'Vampiro One'            => 'Vampiro One',
        'Vollkorn'               => 'Vollkorn',
        'Volkhov'                => 'Volkhov',
        'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
    );

    // Heading Typography
    $wp_customize->add_setting( 'article_blog_writer_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_blog_writer_heading_color', array(
        'label' => __('Heading Color', 'article-blog-writer'),
        'section' => 'article_blog_writer_global_color_settings',
        'settings' => 'article_blog_writer_heading_color',
    )));

    $wp_customize->add_setting('article_blog_writer_heading_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'article_blog_writer_sanitize_choices',
    ));
    $wp_customize->add_control( 'article_blog_writer_heading_font_family', array(
        'section' => 'article_blog_writer_global_color_settings',
        'label'   => __('Heading Fonts', 'article-blog-writer'),
        'type'    => 'select',
        'choices' => $article_blog_writer_font_array,
    ));

    $wp_customize->add_setting('article_blog_writer_heading_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_heading_font_size',array(
        'label' => esc_html__('Heading Font Size','article-blog-writer'),
        'section' => 'article_blog_writer_global_color_settings',
        'setting' => 'article_blog_writer_heading_font_size',
        'type'  => 'text'
    ));

    // Paragraph Typography
    $wp_customize->add_setting( 'article_blog_writer_paragraph_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_blog_writer_paragraph_color', array(
        'label' => __('Paragraph Color', 'article-blog-writer'),
        'section' => 'article_blog_writer_global_color_settings',
        'settings' => 'article_blog_writer_paragraph_color',
    )));

    $wp_customize->add_setting('article_blog_writer_paragraph_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'article_blog_writer_sanitize_choices',
    ));
    $wp_customize->add_control( 'article_blog_writer_paragraph_font_family', array(
        'section' => 'article_blog_writer_global_color_settings',
        'label'   => __('Paragraph Fonts', 'article-blog-writer'),
        'type'    => 'select',
        'choices' => $article_blog_writer_font_array,
    ));

    $wp_customize->add_setting('article_blog_writer_paragraph_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_paragraph_font_size',array(
        'label' => esc_html__('Paragraph Font Size','article-blog-writer'),
        'section' => 'article_blog_writer_global_color_settings',
        'setting' => 'article_blog_writer_paragraph_font_size',
        'type'  => 'text'
    ));

    // General Settings
     $wp_customize->add_section('article_blog_writer_general_settings',array(
        'title' => esc_html__('General Settings','article-blog-writer'),
        'priority'   => 30,
    ));

     $wp_customize->add_setting('article_blog_writer_width_option',array(
        'default' => 'Full Width',
        'transport' => 'refresh',
        'sanitize_callback' => 'article_blog_writer_sanitize_choices'
    ));
    $wp_customize->add_control('article_blog_writer_width_option',array(
        'type' => 'select',
        'section' => 'article_blog_writer_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','article-blog-writer'),
            'Wide Width' => __('Wide Width','article-blog-writer'),
            'Boxed Width' => __('Boxed Width','article-blog-writer')
        ),
    ) );

    $wp_customize->add_setting('article_blog_writer_nav_menu_text_transform',array(
        'default'=> 'Capitalize',
        'sanitize_callback' => 'article_blog_writer_sanitize_choices'
    ));
    $wp_customize->add_control('article_blog_writer_nav_menu_text_transform',array(
        'type' => 'radio',
        'choices' => array(
            'Uppercase' => __('Uppercase','article-blog-writer'),
            'Capitalize' => __('Capitalize','article-blog-writer'),
            'Lowercase' => __('Lowercase','article-blog-writer'),
        ),
        'section'=> 'article_blog_writer_general_settings',
    ));

    $wp_customize->add_setting('article_blog_writer_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'article_blog_writer_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'article-blog-writer' ),
        'section'        => 'article_blog_writer_general_settings',
        'settings'       => 'article_blog_writer_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'article_blog_writer_preloader_bg_color', array(
        'default' => '#BF00FF',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_blog_writer_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','article-blog-writer'),
        'section' => 'article_blog_writer_general_settings',
        'settings' => 'article_blog_writer_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'article_blog_writer_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_blog_writer_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','article-blog-writer'),
        'section' => 'article_blog_writer_general_settings',
        'settings' => 'article_blog_writer_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'article_blog_writer_preloader_dot_2_color', array(
        'default' => '#222222',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_blog_writer_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','article-blog-writer'),
        'section' => 'article_blog_writer_general_settings',
        'settings' => 'article_blog_writer_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('article_blog_writer_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'article_blog_writer_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'article-blog-writer' ),
        'section'        => 'article_blog_writer_general_settings',
        'settings'       => 'article_blog_writer_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('article_blog_writer_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'article_blog_writer_sanitize_choices'
    ));
    $wp_customize->add_control('article_blog_writer_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'article_blog_writer_general_settings',
        'choices' => array(
            'Right' => __('Right','article-blog-writer'),
            'Left' => __('Left','article-blog-writer'),
            'Center' => __('Center','article-blog-writer')
        ),
    ) );

    $wp_customize->add_setting( 'article_blog_writer_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_blog_writer_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','article-blog-writer'),
        'section' => 'article_blog_writer_general_settings',
        'settings' => 'article_blog_writer_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'article_blog_writer_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_blog_writer_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','article-blog-writer'),
        'section' => 'article_blog_writer_general_settings',
        'settings' => 'article_blog_writer_scroll_color'
    )));

    $wp_customize->add_setting('article_blog_writer_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','article-blog-writer'),
        'description' => __('Put in px','article-blog-writer'),
        'section'   => 'article_blog_writer_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('article_blog_writer_scroll_border_radius',array(
        'default'   => '0',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_scroll_border_radius',array(
        'label' => __('Scroll Top Border Radius','article-blog-writer'),
        'description' => __('Put in %','article-blog-writer'),
        'section'   => 'article_blog_writer_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting( 'article_blog_writer_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'article_blog_writer_sanitize_select',
    ) );

    $wp_customize->add_control('article_blog_writer_products_per_row', array(
       'label' => __( 'Product per row', 'article-blog-writer' ),
       'section'  => 'article_blog_writer_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    $wp_customize->add_setting('article_blog_writer_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_product_per_page',array(
        'label' => __('Product per page','article-blog-writer'),
        'section'   => 'article_blog_writer_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number_per_row',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number_per_row',array(
        'label'       => esc_html__('Related Products Column Count', 'article-blog-writer'),
        'section'     => 'article_blog_writer_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 4,
        ),
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number',array(
        'label'       => esc_html__('Number of Related Products Per Page', 'article-blog-writer'),
        'section'     => 'article_blog_writer_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 10,
        ),
    ));

    $wp_customize->add_setting('article_blog_writer_related_product_display_setting', array(
        'default' => true,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'article_blog_writer_related_product_display_setting',array(
        'label'          => __( 'Show Related Products', 'article-blog-writer' ),
        'section'        => 'article_blog_writer_general_settings',
        'settings'       => 'article_blog_writer_related_product_display_setting',
        'type'           => 'checkbox',
    )));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('article_blog_writer_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'article_blog_writer_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'article-blog-writer' ),
        'section'        => 'article_blog_writer_general_settings',
        'settings'       => 'article_blog_writer_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('article_blog_writer_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'article_blog_writer_sanitize_choices'
    ));
    $wp_customize->add_control('article_blog_writer_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','article-blog-writer'),
        'section' => 'article_blog_writer_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','article-blog-writer'),
            'Right Sidebar' => __('Right Sidebar','article-blog-writer'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('article_blog_writer_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'article_blog_writer_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'article-blog-writer' ),
        'section'        => 'article_blog_writer_general_settings',
        'settings'       => 'article_blog_writer_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('article_blog_writer_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'article_blog_writer_sanitize_choices'
    ));
    $wp_customize->add_control('article_blog_writer_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','article-blog-writer'),
        'section' => 'article_blog_writer_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','article-blog-writer'),
            'Right Sidebar' => __('Right Sidebar','article-blog-writer'),
        ),
    ) );

    // Social Link
    $wp_customize->add_section('article_blog_writer_social_link',array(
        'title' => esc_html__('Social Links','article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_facebook_icon',array(
        'label' => esc_html__('Facebook Icon','article-blog-writer'),
        'section' => 'article_blog_writer_social_link',
        'setting' => 'article_blog_writer_facebook_icon',
        'type'  => 'text',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','article-blog-writer')
    ));

    $wp_customize->add_setting('article_blog_writer_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('article_blog_writer_facebook_url',array(
        'label' => esc_html__('Facebook Link','article-blog-writer'),
        'section' => 'article_blog_writer_social_link',
        'setting' => 'article_blog_writer_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('article_blog_writer_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_twitter_icon',array(
        'label' => esc_html__('Twitter Icon','article-blog-writer'),
        'section' => 'article_blog_writer_social_link',
        'setting' => 'article_blog_writer_twitter_icon',
        'type'  => 'text',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','article-blog-writer')
    ));

    $wp_customize->add_setting('article_blog_writer_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('article_blog_writer_twitter_url',array(
        'label' => esc_html__('Twitter Link','article-blog-writer'),
        'section' => 'article_blog_writer_social_link',
        'setting' => 'article_blog_writer_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('article_blog_writer_intagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_intagram_icon',array(
        'label' => esc_html__('Intagram Icon','article-blog-writer'),
        'section' => 'article_blog_writer_social_link',
        'setting' => 'article_blog_writer_intagram_icon',
        'type'  => 'text',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','article-blog-writer')
    ));

    $wp_customize->add_setting('article_blog_writer_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('article_blog_writer_intagram_url',array(
        'label' => esc_html__('Intagram Link','article-blog-writer'),
        'section' => 'article_blog_writer_social_link',
        'setting' => 'article_blog_writer_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('article_blog_writer_youtube_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_youtube_icon',array(
        'label' => esc_html__('Youtube Icon','article-blog-writer'),
        'section' => 'article_blog_writer_social_link',
        'setting' => 'article_blog_writer_youtube_icon',
        'type'  => 'text',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-youtube','article-blog-writer')
    ));

    $wp_customize->add_setting('article_blog_writer_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('article_blog_writer_youtube_url',array(
        'label' => esc_html__('Youtube Link','article-blog-writer'),
        'section' => 'article_blog_writer_social_link',
        'setting' => 'article_blog_writer_youtube_url',
        'type'  => 'url'
    ));

    //Top Header
    $wp_customize->add_section('article_blog_writer_top_header',array(
        'title' => esc_html__(' Header Option','article-blog-writer')
    ));

    $wp_customize->add_setting('article_blog_writer_subscribe_btn_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_subscribe_btn_text',array(
        'label' => esc_html__('Subscribe Button Text','article-blog-writer'),
        'section' => 'article_blog_writer_top_header',
        'setting' => 'article_blog_writer_subscribe_btn_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('article_blog_writer_subscribe_btn_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('article_blog_writer_subscribe_btn_url',array(
        'label' => esc_html__('Subscribe Button URL','article-blog-writer'),
        'section' => 'article_blog_writer_top_header',
        'setting' => 'article_blog_writer_subscribe_btn_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('article_blog_writer_subscribe_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_subscribe_text',array(
        'label' => esc_html__('Subscribe Text','article-blog-writer'),
        'section' => 'article_blog_writer_top_header',
        'setting' => 'article_blog_writer_subscribe_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('article_blog_writer_subscribe_link_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_subscribe_link_text',array(
        'label' => esc_html__('Subscribe Link Text','article-blog-writer'),
        'section' => 'article_blog_writer_top_header',
        'setting' => 'article_blog_writer_subscribe_link_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('article_blog_writer_subscribe_link_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('article_blog_writer_subscribe_link_url',array(
        'label' => esc_html__('Subscribe Link URL','article-blog-writer'),
        'section' => 'article_blog_writer_top_header',
        'setting' => 'article_blog_writer_subscribe_link_url',
        'type'  => 'url'
    ));

    //Banner
    $wp_customize->add_section('article_blog_writer_top_banner',array(
        'title' => esc_html__('Banner Settings','article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_banner_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'article_blog_writer_banner_section_setting',array(
        'label'    => __( 'Show Banner', 'article-blog-writer' ),
        'section'  => 'article_blog_writer_top_banner',
        'settings' => 'article_blog_writer_banner_section_setting',
        'type'     => 'checkbox',
    )));

    $wp_customize->add_setting('article_blog_writer_banner_image',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'article_blog_writer_banner_image',array(
        'label' => __('Banner Image ','article-blog-writer'),
        'section' => 'article_blog_writer_top_banner',
        'settings' => 'article_blog_writer_banner_image',
    )));

    $wp_customize->add_setting('article_blog_writer_banner_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_banner_heading',array(
        'label' => esc_html__('Heading','article-blog-writer'),
        'section' => 'article_blog_writer_top_banner',
        'setting' => 'article_blog_writer_banner_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('article_blog_writer_banner_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_banner_content',array(
        'label' => esc_html__('Content','article-blog-writer'),
        'section' => 'article_blog_writer_top_banner',
        'setting' => 'article_blog_writer_banner_content',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('article_blog_writer_banner_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'article_blog_writer_sanitize_select',
    ));
    $wp_customize->add_control('article_blog_writer_banner_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display posts','article-blog-writer'),
        'section' => 'article_blog_writer_top_banner',
    ));

    //Popular Classes Section
    $wp_customize->add_section('article_blog_writer_chooseus_section',array(
        'title' => esc_html__('Choose Us Section','article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_chooseus_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'article_blog_writer_chooseus_section_setting',array(
        'label'          => __( 'Show Choose Us Section', 'article-blog-writer' ),
        'section'        => 'article_blog_writer_chooseus_section',
        'settings'       => 'article_blog_writer_chooseus_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('article_blog_writer_chooseus_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('article_blog_writer_chooseus_heading',array(
        'label' => esc_html__('Heading','article-blog-writer'),
        'section' => 'article_blog_writer_chooseus_section',
        'setting' => 'article_blog_writer_chooseus_heading',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('article_blog_writer_chooseus_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'article_blog_writer_sanitize_select',
    ));
    $wp_customize->add_control('article_blog_writer_chooseus_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display posts','article-blog-writer'),
        'section' => 'article_blog_writer_chooseus_section',
    ));

    $wp_customize->add_setting('article_blog_writer_chooseus_number',array(
        'default' => '4',
        'sanitize_callback' => 'article_blog_writer_sanitize_number_absint'
    ));
    $wp_customize->add_control('article_blog_writer_chooseus_number',array(
        'label' => esc_html__('Post Count','article-blog-writer'),
        'section' => 'article_blog_writer_chooseus_section',
        'setting' => 'article_blog_writer_chooseus_number',
        'type'  => 'number'
    ));

    for ($article_blog_writer_count=1; $article_blog_writer_count <= get_theme_mod('article_blog_writer_chooseus_number',4); $article_blog_writer_count++) { 

        $wp_customize->add_setting('article_blog_writer_chooseus_icon'.$article_blog_writer_count,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('article_blog_writer_chooseus_icon'.$article_blog_writer_count,array(
            'label' => esc_html__('Choose Us Icon ','article-blog-writer'),
            'section' => 'article_blog_writer_chooseus_section',
            'setting' => 'article_blog_writer_chooseus_icon'.$article_blog_writer_count,
            'type'  => 'text',
            'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-file','article-blog-writer')
        ));
    }

    // Post Settings
     $wp_customize->add_section('article_blog_writer_post_settings',array(
        'title' => esc_html__('Post Settings','article-blog-writer'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('article_blog_writer_post_page_title',array(
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('article_blog_writer_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'article-blog-writer'),
        'section'     => 'article_blog_writer_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_post_page_meta',array(
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('article_blog_writer_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'article-blog-writer'),
        'section'     => 'article_blog_writer_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_post_page_thumb',array(
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('article_blog_writer_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'article-blog-writer'),
        'section'     => 'article_blog_writer_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_post_page_content',array(
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('article_blog_writer_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'article-blog-writer'),
        'section'     => 'article_blog_writer_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_post_page_excerpt_length',array(
        'sanitize_callback' => 'article_blog_writer_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('article_blog_writer_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'article-blog-writer'),
        'section'     => 'article_blog_writer_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('article_blog_writer_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('article_blog_writer_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'article-blog-writer'),
        'section'     => 'article_blog_writer_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_post_page_pagination',array(
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('article_blog_writer_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'article-blog-writer'),
        'section'     => 'article_blog_writer_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_single_post_page_content',array(
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('article_blog_writer_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'article-blog-writer'),
        'section'     => 'article_blog_writer_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'article-blog-writer'),
    ));
    
    // Footer
    $wp_customize->add_section('article_blog_writer_site_footer_section', array(
        'title' => esc_html__('Footer', 'article-blog-writer'),
    ));

    $wp_customize->add_setting('article_blog_writer_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'article_blog_writer_sanitize_choices'
    ));
    $wp_customize->add_control('article_blog_writer_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','article-blog-writer'),
        'section' => 'article_blog_writer_site_footer_section',
        'choices' => array(
            'Left' => __('Left','article-blog-writer'),
            'Center' => __('Center','article-blog-writer'),
            'Right' => __('Right','article-blog-writer')
        ),
    ) );

    $wp_customize->add_setting('article_blog_writer_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'article_blog_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control('article_blog_writer_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','article-blog-writer'),
        'section' => 'article_blog_writer_site_footer_section',
    ));

    $wp_customize->add_setting('article_blog_writer_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('article_blog_writer_footer_text_setting', array(
        'label' => __('Replace the footer text', 'article-blog-writer'),
        'section' => 'article_blog_writer_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('article_blog_writer_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'article_blog_writer_sanitize_choices'
    ));
    $wp_customize->add_control('article_blog_writer_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','article-blog-writer'),
        'section' => 'article_blog_writer_site_footer_section',
        'choices' => array(
            'Left' => __('Left','article-blog-writer'),
            'Center' => __('Center','article-blog-writer'),
            'Right' => __('Right','article-blog-writer')
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'article_blog_writer_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Article_Blog_Writer_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'article_blog_writer_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'article-blog-writer' ),
        'description' => esc_url( ARTICLE_BLOG_WRITER_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'article_blog_writer_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function article_blog_writer_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function article_blog_writer_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function article_blog_writer_customize_preview_js(){
    wp_enqueue_script('article-blog-writer-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'article_blog_writer_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function article_blog_writer_panels_js() {
    wp_enqueue_style( 'article-blog-writer-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'article-blog-writer-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'article_blog_writer_panels_js' );