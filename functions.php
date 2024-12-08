<?php
require get_template_directory() . '/inc/custom-post-types.php';
/**
 * Bikain Fitness Functions
 * Theme setup and custom theme supports.
 *
 * @package BikainFitness
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue styles and scripts.
 */
function bikain_enqueue_assets() {
    // Register and enqueue styles.
    wp_enqueue_style('bikain-main-style', get_template_directory_uri() . '/assets/css/main.css', [], '1.0', 'all');
    wp_enqueue_style('bikain-google-fonts', 'https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@400;700&display=swap', [], null);

    // Register and enqueue scripts.
    wp_enqueue_script('bikain-main-js', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'bikain_enqueue_assets');

/**
 * Theme setup.
 */
function bikain_theme_setup() {
    // Add support for dynamic <title> tag.
    add_theme_support('title-tag');

    // Add support for post thumbnails.
    add_theme_support('post-thumbnails');

    // Register navigation menus.
    register_nav_menus([
        'primary' => __('Primary Menu', 'bikainfitness'),
        'footer'  => __('Footer Menu', 'bikainfitness'),
    ]);

    // Add support for HTML5 output for specific elements.
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);

    // Add support for custom logo.
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
}
add_action('after_setup_theme', 'bikain_theme_setup');

/**
 * Register widget areas.
 */
function bikain_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar', 'bikainfitness'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'bikainfitness'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'bikain_widgets_init');

/**
 * Add custom image sizes.
 */
function bikain_custom_image_sizes() {
    add_image_size('featured-large', 1200, 800, true); // Hard crop
    add_image_size('featured-small', 640, 480, true);  // Hard crop
}
add_action('after_setup_theme', 'bikain_custom_image_sizes');

/**
 * Disable WordPress admin bar on the frontend.
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Custom excerpt length.
 */
function bikain_custom_excerpt_length($length) {
    return 20; // Number of words.
}
add_filter('excerpt_length', 'bikain_custom_excerpt_length', 999);

/**
 * Add a "Read More" link to excerpts.
 */
function bikain_excerpt_more($more) {
    return '... <a href="' . get_permalink() . '">' . __('Read More', 'bikainfitness') . '</a>';
}
add_filter('excerpt_more', 'bikain_excerpt_more');

/**
 * Load text domain for translations.
 */
function bikain_load_textdomain() {
    load_theme_textdomain('bikainfitness', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'bikain_load_textdomain');

/**
 * Enqueue block editor styles (Gutenberg).
 */
function bikain_block_editor_assets() {
    wp_enqueue_style('bikain-editor-style', get_template_directory_uri() . '/assets/css/editor-style.css', [], '1.0', 'all');
}
add_action('enqueue_block_editor_assets', 'bikain_block_editor_assets');

/**
 * Add a custom class to menu items.
 */
function bikain_menu_item_classes($classes, $item, $args) {
    if ($args->theme_location === 'primary') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'bikain_menu_item_classes', 10, 3);

/**
 * Add WhatsApp link to classes (dynamic content).
 */
function bikain_add_whatsapp_link($class_name) {
    $phone_number = '+123456789'; // Replace with your WhatsApp number.
    $message = urlencode("Hello! I want to register for the class: $class_name");

    return "https://wa.me/$phone_number?text=$message";
}

/**
 * Debug mode for development (optional).
 */
if (defined('WP_DEBUG') && WP_DEBUG) {
    error_log('Bikain Fitness: Debugging is enabled.');
}

