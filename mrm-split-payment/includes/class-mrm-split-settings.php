<?php
/**
 * MRM Split Payment Settings Class
 *
 * @package MRM_Split_Payment
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class MRM_Split_Settings {

    public static function get_settings() {
        return array(
            'enabled'        => get_option( 'mrm_split_enabled', 'yes' ),
            'opt1_type'      => get_option( 'mrm_split_opt1_type', 'fixed' ), // fixed or percent
            'opt1_val'       => floatval( get_option( 'mrm_split_opt1_val', 199 ) ),
            'opt1_title'     => get_option( 'mrm_split_opt1_title', 'Pay Token Deposit Online' ),
            'opt2_type'      => get_option( 'mrm_split_opt2_type', 'fixed' ),
            'opt2_val'       => floatval( get_option( 'mrm_split_opt2_val', 299 ) ),
            'opt2_title'     => get_option( 'mrm_split_opt2_title', 'Pay Part-Payment Online' ),
            'min_order'      => floatval( get_option( 'mrm_split_min_order', 999 ) ),
            'max_order'      => floatval( get_option( 'mrm_split_max_order', 150000 ) ),
            'cod_fee'        => floatval( get_option( 'mrm_split_cod_fee', 0 ) ),
        );
    }

    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'add_admin_menu' ) );
        add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
    }

    public static function add_admin_menu() {
        add_submenu_page(
            'woocommerce',
            __( 'Split Payment Settings', 'mrm-split-payment' ),
            __( 'MRM Split Payment', 'mrm-split-payment' ),
            'manage_woocommerce',
            'mrm-split-settings',
            array( __CLASS__, 'render_settings_page' )
        );
    }

    public static function register_settings() {
        register_setting( 'mrm_split_settings_group', 'mrm_split_enabled' );
        register_setting( 'mrm_split_settings_group', 'mrm_split_opt1_val' );
        register_setting( 'mrm_split_settings_group', 'mrm_split_opt2_val' );
        register_setting( 'mrm_split_settings_group', 'mrm_split_min_order' );
        register_setting( 'mrm_split_settings_group', 'mrm_split_max_order' );
    }

    public static function render_settings_page() {
        ?>
        <div class="wrap">
          <h1><?php esc_html_e( 'Mansa Ram Mahajan — Split Payment Rules & Configuration', 'mrm-split-payment' ); ?></h1>
          <form method="post" action="options.php">
            <?php settings_fields( 'mrm_split_settings_group' ); ?>
            <table class="form-table">
              <tr>
                <th scope="row"><?php esc_html_e( 'Enable Split Payment Modal', 'mrm-split-payment' ); ?></th>
                <td>
                  <label><input type="checkbox" name="mrm_split_enabled" value="yes" <?php checked( 'yes', get_option( 'mrm_split_enabled', 'yes' ) ); ?>> <?php esc_html_e( 'Enable centered payment-options modal on Buy Now', 'mrm-split-payment' ); ?></label>
                </td>
              </tr>
              <tr>
                <th scope="row"><?php esc_html_e( 'Option 1 Deposit (₹)', 'mrm-split-payment' ); ?></th>
                <td>
                  <input type="number" name="mrm_split_opt1_val" value="<?php echo esc_attr( get_option( 'mrm_split_opt1_val', '199' ) ); ?>" class="regular-text">
                  <p class="description"><?php esc_html_e( 'Default: ₹199 (Online deposit, balance on delivery)', 'mrm-split-payment' ); ?></p>
                </td>
              </tr>
              <tr>
                <th scope="row"><?php esc_html_e( 'Option 2 Higher Deposit (₹)', 'mrm-split-payment' ); ?></th>
                <td>
                  <input type="number" name="mrm_split_opt2_val" value="<?php echo esc_attr( get_option( 'mrm_split_opt2_val', '299' ) ); ?>" class="regular-text">
                  <p class="description"><?php esc_html_e( 'Default: ₹299 (Higher online deposit, balance on delivery)', 'mrm-split-payment' ); ?></p>
                </td>
              </tr>
              <tr>
                <th scope="row"><?php esc_html_e( 'Minimum Order Total Eligible (₹)', 'mrm-split-payment' ); ?></th>
                <td>
                  <input type="number" name="mrm_split_min_order" value="<?php echo esc_attr( get_option( 'mrm_split_min_order', '999' ) ); ?>" class="regular-text">
                </td>
              </tr>
            </table>
            <?php submit_button(); ?>
          </form>
        </div>
        <?php
    }
}

MRM_Split_Settings::init();
