<?php
/**
 * Mansa Ram Mahajan & Co Theme Functions and Definitions
 *
 * @package Mansa_Ram_Mahajan
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'MRM_THEME_VERSION', '1.0.0' );
define( 'MRM_THEME_DIR', get_template_directory() );
define( 'MRM_THEME_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function mrm_theme_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'mansa-ram-mahajan', MRM_THEME_DIR . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Custom Logo support.
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 480,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // HTML5 markup support.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Selective Refresh for Customizer Widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Block editor features.
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );

    // Register Navigation Menus.
    register_nav_menus( array(
        'primary'       => __( 'Primary Header Menu', 'mansa-ram-mahajan' ),
        'mobile'        => __( 'Mobile Drawer Menu', 'mansa-ram-mahajan' ),
        'footer_shop'   => __( 'Footer Shop Menu', 'mansa-ram-mahajan' ),
        'footer_about'  => __( 'Footer About Menu', 'mansa-ram-mahajan' ),
        'footer_policy' => __( 'Footer Policy Menu', 'mansa-ram-mahajan' ),
    ) );

    // WooCommerce Theme Support.
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'mrm_theme_setup' );

/**
 * Register Widget Areas
 */
function mrm_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Shop Sidebar Filters', 'mansa-ram-mahajan' ),
        'id'            => 'sidebar-shop',
        'description'   => __( 'Widgets added here will appear in the product catalog sidebar.', 'mansa-ram-mahajan' ),
        'before_widget' => '<section id="%1$s" class="mrm-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="mrm-widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'mrm_widgets_init' );

/**
 * Enqueue Styles and Scripts
 */
function mrm_enqueue_scripts() {
    // Google Fonts: Playfair Display + Outfit
    wp_enqueue_style(
        'mrm-google-fonts',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&display=swap',
        array(),
        null
    );

    // Theme Stylesheets
    wp_enqueue_style( 'mrm-style', get_stylesheet_uri(), array(), MRM_THEME_VERSION );
    wp_enqueue_style( 'mrm-header', MRM_THEME_URI . '/assets/css/header.css', array( 'mrm-style' ), MRM_THEME_VERSION );
    wp_enqueue_style( 'mrm-homepage', MRM_THEME_URI . '/assets/css/homepage.css', array( 'mrm-style' ), MRM_THEME_VERSION );

    if ( class_exists( 'WooCommerce' ) || is_page() ) {
        wp_enqueue_style( 'mrm-woocommerce', MRM_THEME_URI . '/assets/css/woocommerce.css', array( 'mrm-style' ), MRM_THEME_VERSION );
    }

    wp_enqueue_style( 'mrm-responsive', MRM_THEME_URI . '/assets/css/responsive.css', array( 'mrm-style' ), MRM_THEME_VERSION );

    // Scripts
    wp_enqueue_script( 'mrm-main', MRM_THEME_URI . '/assets/js/main.js', array( 'jquery' ), MRM_THEME_VERSION, true );

    if ( function_exists( 'is_product' ) && is_product() ) {
        wp_enqueue_script( 'mrm-gallery', MRM_THEME_URI . '/assets/js/gallery.js', array( 'mrm-main' ), MRM_THEME_VERSION, true );
    }

    // Pass AJAX and localized variables to JS
    wp_localize_script( 'mrm-main', 'mrmData', array(
        'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        'themeUrl'  => MRM_THEME_URI,
        'cartUrl'   => class_exists( 'WooCommerce' ) ? wc_get_cart_url() : '',
        'shopUrl'   => class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : '',
        'currency'  => class_exists( 'WooCommerce' ) ? get_woocommerce_currency_symbol() : '₹',
        'nonce'     => wp_create_nonce( 'mrm_theme_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'mrm_enqueue_scripts' );

/**
 * Customizer and WooCommerce Helpers
 */
require_once MRM_THEME_DIR . '/inc/customizer.php';
require_once MRM_THEME_DIR . '/inc/woocommerce-setup.php';

/**
 * Announcement Messages Provider
 */
function mrm_get_announcements() {
    $default = array(
        '✨ Festive Sale is Here! Enjoy 20% OFF on Your Favourites | Use Code: FESTIVE20',
        '✈️ Worldwide Express Shipping Available | Free Domestic Shipping Above ₹14,999',
        '👑 Royal Bridal Collection 2026 Now Live | Book a Personalized Video Styling Appointment',
        '⭐ Handcrafted Sarees, Designer Lehengas & Haute Couture Kurtis',
    );
    return get_theme_mod( 'mrm_announcement_messages', $default );
}

/**
 * Brand Store Locations Provider
 */
function mrm_get_stores() {
    return array(
        array(
            'city'     => 'Pitampura',
            'title'    => 'Mansa Ram Mahajan — Flagship Store',
            'address'  => 'Plot 33, Main Ring Road, Pitampura, Delhi 110034',
            'phone'    => '+91 98111 22334',
            'timing'   => '11:00 AM – 9:00 PM (All 7 Days)',
            'image'    => MRM_THEME_URI . '/assets/images/Woman_wearing_red_bridal_lehenga_20261015215058.jpg',
            'maps_url' => 'https://maps.google.com/?q=Pitampura+Delhi',
        ),
        array(
            'city'     => 'Chandni Chowk',
            'title'    => 'Mansa Ram Mahajan — Heritage Bridal Couture',
            'address'  => 'Katra Neel, Main Chandni Chowk, Old Delhi 110006',
            'phone'    => '+91 98111 22335',
            'timing'   => '10:30 AM – 8:30 PM (Sun Closed)',
            'image'    => MRM_THEME_URI . '/assets/images/Model_wearing_red_bridal_lehenga_20261015215105.jpg',
            'maps_url' => 'https://maps.google.com/?q=Chandni+Chowk+Delhi',
        ),
        array(
            'city'     => 'Karol Bagh',
            'title'    => 'Mansa Ram Mahajan — Wedding Studio',
            'address'  => 'Ajmal Khan Road, Karol Bagh, Central Delhi 110005',
            'phone'    => '+91 98111 22336',
            'timing'   => '11:00 AM – 9:00 PM (Monday Closed)',
            'image'    => MRM_THEME_URI . '/assets/images/Female_model_wearing_blue_lehenga_20261015215044.jpg',
            'maps_url' => 'https://maps.google.com/?q=Karol+Bagh+Delhi',
        ),
        array(
            'city'     => 'South Extension',
            'title'    => 'Mansa Ram Mahajan — Haute Couture Lounge',
            'address'  => 'Part 1, Main Market, South Extension, New Delhi 110049',
            'phone'    => '+91 98111 22337',
            'timing'   => '11:00 AM – 9:00 PM (All 7 Days)',
            'image'    => MRM_THEME_URI . '/assets/images/Model_posing_in_lehenga_choli_20261015215038.jpg',
            'maps_url' => 'https://maps.google.com/?q=South+Extension+Delhi',
        ),
        array(
            'city'     => 'Kohat Enclave',
            'title'    => 'Mansa Ram Mahajan — Festive & Saree Studio',
            'address'  => 'Near Metro Station, Kohat Enclave, Delhi 110034',
            'phone'    => '+91 98111 22338',
            'timing'   => '11:00 AM – 9:00 PM (All 7 Days)',
            'image'    => MRM_THEME_URI . '/assets/images/Model_wearing_orange_gold_lehenga_20261015215028.jpg',
            'maps_url' => 'https://maps.google.com/?q=Kohat+Enclave+Delhi',
        ),
        array(
            'city'     => 'Rajouri Garden',
            'title'    => 'Mansa Ram Mahajan — Occasion Wear Boutique',
            'address'  => 'Main Ring Road, Rajouri Garden, West Delhi 110027',
            'phone'    => '+91 98111 22339',
            'timing'   => '11:00 AM – 9:00 PM (All 7 Days)',
            'image'    => MRM_THEME_URI . '/assets/images/Model_wearing_teal_outfit_20261015215017.jpg',
            'maps_url' => 'https://maps.google.com/?q=Rajouri+Garden+Delhi',
        ),
    );
}

/**
 * Filter WooCommerce Image Sizes
 */
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width'  => 140,
        'height' => 180,
        'crop'   => 1,
    );
} );

/**
 * Load MRM Website Control Admin System
 */
require_once MRM_THEME_DIR . '/inc/admin/class-mrm-options.php';
require_once MRM_THEME_DIR . '/inc/admin/class-mrm-admin-menu.php';
