<?php
/**
 * Mansa Ram Mahajan & Co — Top-Level Admin Menu & Controller
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class MRM_Admin_Menu {

    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'register_admin_menus' ) );
        add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_assets' ) );
        add_action( 'admin_init', array( __CLASS__, 'handle_form_submissions' ) );
    }

    /**
     * Register Top Level Menu & 13 Submenus
     */
    public static function register_admin_menus() {
        // Top-Level Menu
        add_menu_page(
            __( 'MRM Website Control', 'mansa-ram-mahajan' ),
            __( 'MRM Control', 'mansa-ram-mahajan' ),
            'manage_options',
            'mrm-dashboard',
            array( __CLASS__, 'render_page' ),
            'dashicons-store',
            2
        );

        // Submenus
        $submenus = array(
            'mrm-dashboard'             => __( 'Dashboard', 'mansa-ram-mahajan' ),
            'mrm-homepage-builder'      => __( 'Homepage Builder', 'mansa-ram-mahajan' ),
            'mrm-header-navigation'     => __( 'Header & Navigation', 'mansa-ram-mahajan' ),
            'mrm-promotional-banners'   => __( 'Promotional Banners', 'mansa-ram-mahajan' ),
            'mrm-homepage-sections'     => __( 'Homepage Sections', 'mansa-ram-mahajan' ),
            'mrm-campaigns-videos'      => __( 'Campaigns & Videos', 'mansa-ram-mahajan' ),
            'mrm-categories-collections'=> __( 'Categories & Collections', 'mansa-ram-mahajan' ),
            'mrm-store-locations'       => __( 'Store Locations', 'mansa-ram-mahajan' ),
            'mrm-testimonials'          => __( 'Testimonials & Reviews', 'mansa-ram-mahajan' ),
            'mrm-payment-popup'         => __( 'Payment Popup', 'mansa-ram-mahajan' ),
            'mrm-store-settings'        => __( 'Store Settings', 'mansa-ram-mahajan' ),
            'mrm-seo-settings'          => __( 'SEO Settings', 'mansa-ram-mahajan' ),
            'mrm-import-export'         => __( 'Import & Export', 'mansa-ram-mahajan' ),
            'mrm-system-status'         => __( 'System Status', 'mansa-ram-mahajan' ),
        );

        foreach ( $submenus as $slug => $title ) {
            add_submenu_page(
                'mrm-dashboard',
                $title . ' — ' . __( 'MRM Website Control', 'mansa-ram-mahajan' ),
                $title,
                'manage_options',
                $slug,
                array( __CLASS__, 'render_page' )
            );
        }
    }

    /**
     * Enqueue Admin Styles, Scripts, and Media Library Picker
     */
    public static function enqueue_admin_assets( $hook ) {
        if ( strpos( $hook, 'mrm-' ) === false ) {
            return;
        }

        // Native WP Media Library Picker
        wp_enqueue_media();

        // Admin Styles & Scripts
        wp_enqueue_style( 'mrm-admin-css', get_template_directory_uri() . '/assets/admin/css/mrm-admin.css', array(), MRM_THEME_VERSION );
        wp_enqueue_script( 'mrm-admin-js', get_template_directory_uri() . '/assets/admin/js/mrm-admin.js', array( 'jquery' ), MRM_THEME_VERSION, true );

        wp_localize_script( 'mrm-admin-js', 'mrmAdminData', array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'mrm_admin_ajax_nonce' ),
        ) );
    }

    /**
     * Handle Form Post Submissions Securely
     */
    public static function handle_form_submissions() {
        if ( ! isset( $_POST['mrm_save_action'] ) ) {
            return;
        }

        check_admin_referer( 'mrm_save_settings_nonce', 'mrm_nonce_field' );

        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'Unauthorized user action.', 'mansa-ram-mahajan' ) );
        }

        $action = sanitize_text_field( $_POST['mrm_save_action'] );

        if ( 'save_options' === $action ) {
            MRM_Options::update_all( $_POST );
            wp_safe_redirect( add_query_arg( array( 'page' => sanitize_text_field( $_POST['mrm_current_page'] ), 'updated' => 'true' ), admin_url( 'admin.php' ) ) );
            exit;
        }

        if ( 'reset_defaults' === $action ) {
            MRM_Options::reset_to_defaults();
            wp_safe_redirect( add_query_arg( array( 'page' => 'mrm-dashboard', 'reset' => 'true' ), admin_url( 'admin.php' ) ) );
            exit;
        }

        if ( 'import_json' === $action && ! empty( $_POST['import_json_data'] ) ) {
            $json = wp_unslash( $_POST['import_json_data'] );
            $decoded = json_decode( $json, true );
            if ( is_array( $decoded ) ) {
                update_option( MRM_Options::OPTION_KEY, $decoded );
                wp_safe_redirect( add_query_arg( array( 'page' => 'mrm-import-export', 'imported' => 'true' ), admin_url( 'admin.php' ) ) );
                exit;
            }
        }
    }

    /**
     * Render the active admin view template
     */
    public static function render_page() {
        $page = isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : 'mrm-dashboard';
        $view_file = get_template_directory() . '/inc/admin/views/view-' . str_replace( 'mrm-', '', $page ) . '.php';

        echo '<div class="wrap mrm-admin-wrap">';
        
        // Success or Action Notices
        if ( isset( $_GET['updated'] ) && 'true' === $_GET['updated'] ) {
            echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__( '✓ Mansa Ram Mahajan settings saved successfully.', 'mansa-ram-mahajan' ) . '</strong></p></div>';
        }
        if ( isset( $_GET['reset'] ) && 'true' === $_GET['reset'] ) {
            echo '<div class="notice notice-warning is-dismissible"><p><strong>' . esc_html__( '✓ Settings restored to factory defaults.', 'mansa-ram-mahajan' ) . '</strong></p></div>';
        }
        if ( isset( $_GET['imported'] ) && 'true' === $_GET['imported'] ) {
            echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__( '✓ Configuration imported successfully.', 'mansa-ram-mahajan' ) . '</strong></p></div>';
        }

        // Render specific view or dashboard fallback
        if ( file_exists( $view_file ) ) {
            require_once $view_file;
        } else {
            require_once get_template_directory() . '/inc/admin/views/view-dashboard.php';
        }

        echo '</div>';
    }
}

MRM_Admin_Menu::init();
