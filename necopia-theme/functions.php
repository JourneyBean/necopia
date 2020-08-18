<?php
/**
 * Necopia Theme functions and definitions
 */

/**
 * Theme Supports
 * Generated From: https://generatewp.com/theme-support/
 * Partly from: WordPress/Twenty
 */

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
    $content_width = 600;

if ( ! function_exists('necopia_theme_support') ) {

// Register Theme Features
function necopia_theme_support()  {

    // Add theme support for Automatic Feed Links
    add_theme_support( 'automatic-feed-links' );

    // Add theme support for Post Formats
    add_theme_support( 'post-formats', array( 
        'status', 
        'quote', 
        'gallery', 
        'image', 
        'video', 
        'audio', 
        'link', 
        'aside', 
        'chat' 
    ) );

    // Add theme support for Featured Images
    add_theme_support( 'post-thumbnails' );

    // Add theme support for Custom Background
    $background_args = array(
        'default-color'          => '#ffffff',
        'default-image'          => '',
        'default-repeat'         => '',
        'default-position-x'     => '',
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-background', $background_args );

    // Add theme support for Custom Header
    $header_args = array(
        'default-image'          => '',
        'width'                  => 0,
        'height'                 => 0,
        'flex-width'             => false,
        'flex-height'            => false,
        'uploads'                => true,
        'random-default'         => false,
        'header-text'            => false,
        'default-text-color'     => '',
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
        'video'                  => true,
        'video-active-callback'  => '',
    );
    add_theme_support( 'custom-header', $header_args );

    // Add theme support for HTML5 Semantic Markup
    add_theme_support( 'html5', array( 
        'search-form', 
        'comment-form', 
        'comment-list', 
        'gallery', 
        'caption' 
    ) );

    // Add theme support for document Title tag
    add_theme_support( 'title-tag' );

    // Add theme support for custom CSS in the TinyMCE visual editor
    add_editor_style();

    // Add theme support for Translation
    load_theme_textdomain( 'necopia_theme', 
                           get_template_directory() . '/language' );
    
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    /**
     * Starter Content
     */
    // if ( is_customize_preview() ) {
    //     add_theme_support( 'starter-content', [
    //         'widgets' => [],
    //         'attatchments' => [],
    //         'options' => [],
    //         'nav_menus' => []
    //     ] );
    // }
}
add_action( 'after_setup_theme', 'necopia_theme_support' );

}

/**
 * Theme Menus
 */

if ( ! function_exists('necopia_theme_menu') ) {

function necopia_theme_menu() {

    register_nav_menus ( [
        'navbarmenu' => __('Navigation Menu', 'necopia_theme'),
        'sidebarmenu' => __('Side Menu', 'necopia_theme'),
        'prefsmenu' => __('Theme Preferences', 'necopia_theme')
    ] );

}

add_action('init', 'necopia_theme_menu');

}


/**
 * Applying body_open
 */
if ( ! function_exists( 'wp_body_open' ) ) {

    /**
     * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Theme Customizer API Configurations
 */

if ( ! function_exists('necopia_theme_customize') ) {

function necopia_theme_customize( $wp_customize ) {
    
    // Colors - Background color (already provided)

    // Colors - Theme color
    $wp_customize->add_setting('theme_color', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '#1e73be',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_color',
            [
                'label' => __('Theme color', 'necopia_theme'),
                'section' => 'colors'
            ]
        )
    );

    // Colors - Light/Dark auto switch
    $wp_customize->add_setting('enable_dark_autoswitch', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control('enable_dark_autoswitch', [
        'type' => 'checkbox',
        'label' => __('Light/Dark auto switch', 'necopia_theme'),
        'section' => 'colors'
    ]);

    // Colors - Allow customing dark theme colors
    $wp_customize->add_setting('enable_dark_color_customize', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => true,
        'transport' => '',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control('enable_dark_color_customize', [
        'type' => 'checkbox',
        'label' => __('Customize dark theme colors', 'necopia_theme'),
        'section' => 'colors'
    ]);

    // Colors - Dark theme background color customize
    $wp_customize->add_setting('background_color_dark', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '#606060',
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'background_color_dark',
            [
                'label' => __('Dark mode background color', 'necopia_theme'),
                'section' => 'colors'
            ]
        )
    );

    // Colors - Dark theme theme color costomize
    $wp_customize->add_setting('theme_color_dark', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '#afafaf',
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_color_dark',
            [
                'label' => __('Dark mode theme color', 'necopia_theme'),
                'section' => 'colors'
            ]
        )
    );

    // Background Image - Using featured images as background
    $wp_customize->add_setting('using_featured_img_as_bg', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control('using_featured_img_as_bg', [
        'type' => 'checkbox',
        'label' => __('Using featured image as background in posts or pages', 'necopia_theme'),
        'section' => 'background_image'
    ]);

    // Background Image - Enabling Arcylic Effect
    $wp_customize->add_setting('enable_arcylic', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control('enable_arcylic', [
        'type' => 'checkbox',
        'label' => __('Enabling Arcylic Effect', 'necopia_theme'),
        'section' => 'background_image'
    ]);

    // Background Image - Arcylic blur
    $wp_customize->add_setting('arcylic_blur', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => 0.3,
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control('arcylic_blur', [
        'type' => 'range',
        'label' => __('Arcylic blur size', 'necopia_theme'),
        'description' => __('Changing background clearity', 'necopia_theme'),
        'section' => 'background_image',
        'input-attrs' => [
            'min' => 0,
            'step' => 0.1,
            'max' => 1
        ]
    ]);

    // Background Image - Arcylic transparency
    $wp_customize->add_setting('arcylic_transparency', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => 0.8,
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control('arcylic_transparency', [
        'type' => 'range',
        'label' => __('Arcylic transparency', 'necopia_theme'),
        //'description' => __('Changing background clearity', 'necopia_theme'),
        'section' => 'background_image',
        'input-attrs' => [
            'min' => 0,
            'step' => 0.1,
            'max' => 1
        ]
    ]);

    // Widgets
    $wp_customize->add_panel('widgets', [
        'title' => __('Widgets', 'necopia_theme'),
        'priority' => 110
    ]);

    // Widgets - Sidebar Contents
    $wp_customize->add_section('sidebar_contents', [
        'title' => __('Sidebar Contents', 'necopia_theme'),
        'description' => __('Auto generate post contents as a sidebar', 'necopia_theme'),
        'panel' => 'widgets',
        'capability' => 'edit_theme_options',
        'theme_supports' => ''
    ]);

    // Widgets - Sidebar Contents - Enabling sidebar contents
    $wp_customize->add_setting('enable_sidebar_contents', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control('enable_sidebar_contents', [
        'type' => 'checkbox',
        'label' => __('Enabling sidebar contents', 'necopia_theme'),
        'section' => 'sidebar_contents'
    ]);

    // Widgets - Sidebar contents depth
    $wp_customize->add_setting('sidebar_content_depth', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => 3,
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control('sidebar_content_depth', [
        'type' => 'number',
        'section' => 'sidebar_contents',
        'label' => __('Sidebar contents depth', 'necopia_theme'),
        //'input_attrs' => []
    ]);

    // Widgets - Browser-side settings menu
    $wp_customize->add_section('browser_settings_menu', [
        'title' => __('Browser-side settings menu', 'necopia_theme'),
        'description' => __('Allowing user to change theme settings offline', 'necopia_theme'),
        'panel' => 'widgets',
        'capability' => 'edit_theme_options',
        'theme_supports' => ''
    ]);

    // Widgets - Browser-side settings menu - Enable
    $wp_customize->add_setting('enable_browser_settings', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => '',
        'sanitize_js_callback' => ''
    ]);
    $wp_customize->add_control('enable_browser_settings', [
        'type' => 'checkbox',
        'label' => __('Enable browser settings panel', 'necopia_theme'),
        'section' => 'browser_settings_menu'
    ]);
}

add_action('customize_register', 'necopia_theme_customize');

}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function necopia_widgets_init() {
//     register_sidebar(
//         array(
//             'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
//             'id'            => 'sidebar-1',
//             'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
//             'before_widget' => '<section id="%1$s" class="widget %2$s">',
//             'after_widget'  => '</section>',
//             'before_title'  => '<h2 class="widget-title">',
//             'after_title'   => '</h2>',
//         )
//     );

//     register_sidebar(
//         array(
//             'name'          => __( 'Footer 1', 'twentyseventeen' ),
//             'id'            => 'sidebar-2',
//             'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
//             'before_widget' => '<section id="%1$s" class="widget %2$s">',
//             'after_widget'  => '</section>',
//             'before_title'  => '<h2 class="widget-title">',
//             'after_title'   => '</h2>',
//         )
//     );

//     register_sidebar(
//         array(
//             'name'          => __( 'Footer 2', 'twentyseventeen' ),
//             'id'            => 'sidebar-3',
//             'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
//             'before_widget' => '<section id="%1$s" class="widget %2$s">',
//             'after_widget'  => '</section>',
//             'before_title'  => '<h2 class="widget-title">',
//             'after_title'   => '</h2>',
//         )
//     );
// }
// add_action( 'widgets_init', 'necopia_widgets_init' );


/**
 * Theme Styles and Scripts
 */

if ( ! function_exists('necopia_theme_scripts') ) {

function necopia_theme_script() {

    wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'necopia_theme_scripts');

}

?>