<?php
/**
 * Plugin Name: MRM Split Payment
 * Plugin URI: https://mansaram.com/plugins/mrm-split-payment
 * Description: High-conversion split deposit and partial payment system for WooCommerce with centered 2-column modal checkout, server-side balance calculation, and COD balance tracking.
 * Version: 1.0.0
 * Author: Mansa Ram Mahajan & Co
 * Author URI: https://mansaram.com/
 * Text Domain: mrm-split-payment
 * Domain Path: /languages
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * WC requires at least: 6.0
 * WC tested up to: 9.3
 *
 * @package MRM_Split_Payment
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'MRM_SPLIT_VERSION', '1.0.0' );
define( 'MRM_SPLIT_DIR', plugin_dir_path( __FILE__ ) );
define( 'MRM_SPLIT_URI', plugin_dir_url( __FILE__ ) );

require_once MRM_SPLIT_DIR . 'includes/class-mrm-split-settings.php';
require_once MRM_SPLIT_DIR . 'includes/class-mrm-split-order.php';

class MRM_Split_Payment {

    private static $instance = null;

    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        // Enqueue modal styles and scripts
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );

        // Render modal HTML in footer on product pages
        add_action( 'wp_footer', array( $this, 'render_split_payment_modal' ) );

        // AJAX handlers for calculation & order creation
        add_action( 'wp_ajax_mrm_calculate_split_amounts', array( $this, 'ajax_calculate_split' ) );
        add_action( 'wp_ajax_nopriv_mrm_calculate_split_amounts', array( $this, 'ajax_calculate_split' ) );

        add_action( 'wp_ajax_mrm_submit_split_order', array( $this, 'ajax_submit_split_order' ) );
        add_action( 'wp_ajax_nopriv_mrm_submit_split_order', array( $this, 'ajax_submit_split_order' ) );

        // Register custom order status for Split Deposit
        add_action( 'init', array( $this, 'register_deposit_order_status' ) );
        add_filter( 'wc_order_statuses', array( $this, 'add_deposit_to_order_statuses' ) );
    }

    public function enqueue_assets() {
        wp_enqueue_style( 'mrm-split-modal', MRM_SPLIT_URI . 'assets/css/mrm-modal.css', array(), MRM_SPLIT_VERSION );
        wp_enqueue_script( 'mrm-split-modal', MRM_SPLIT_URI . 'assets/js/mrm-modal.js', array( 'jquery' ), MRM_SPLIT_VERSION, true );

        $settings = MRM_Split_Settings::get_settings();

        wp_localize_script( 'mrm-split-modal', 'mrmSplitData', array(
            'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
            'nonce'     => wp_create_nonce( 'mrm_split_nonce' ),
            'settings'  => $settings,
            'currency'  => class_exists( 'WooCommerce' ) ? get_woocommerce_currency_symbol() : '₹',
            'checkoutUrl' => class_exists( 'WooCommerce' ) ? wc_get_checkout_url() : '#',
        ) );
    }

    public function register_deposit_order_status() {
        register_post_status( 'wc-deposit-paid', array(
            'label'                     => _x( 'Deposit Paid (Balance Due)', 'Order status', 'mrm-split-payment' ),
            'public'                    => true,
            'exclude_from_search'       => false,
            'show_in_admin_all_list'    => true,
            'show_in_admin_status_list' => true,
            'label_count'               => _n_noop( 'Deposit Paid <span class="count">(%s)</span>', 'Deposit Paid <span class="count">(%s)</span>', 'mrm-split-payment' ),
        ) );
    }

    public function add_deposit_to_order_statuses( $order_statuses ) {
        $order_statuses['wc-deposit-paid'] = _x( 'Deposit Paid (Balance Due)', 'Order status', 'mrm-split-payment' );
        return $order_statuses;
    }

    /**
     * Server-Side Price Calculation AJAX Handler
     */
    public function ajax_calculate_split() {
        check_ajax_referer( 'mrm_split_nonce', 'nonce' );

        $product_id = absint( $_POST['product_id'] ?? 0 );
        $quantity   = max( 1, absint( $_POST['quantity'] ?? 1 ) );
        $unit_price = floatval( $_POST['unit_price'] ?? 6995 );

        // If product ID exists in WooCommerce, verify live price server-side
        if ( function_exists( 'wc_get_product' ) && $product_id > 0 ) {
            $product = wc_get_product( $product_id );
            if ( $product ) {
                $unit_price = floatval( $product->get_price() );
            }
        }

        $total_price = $unit_price * $quantity;
        $calculations = MRM_Split_Order::calculate_options( $total_price );

        wp_send_json_success( array(
            'total_price'   => $total_price,
            'formatted_total' => '₹ ' . number_format( $total_price, 2 ),
            'options'       => $calculations,
        ) );
    }

    /**
     * Submit Split Order AJAX Handler
     */
    public function ajax_submit_split_order() {
        check_ajax_referer( 'mrm_split_nonce', 'nonce' );

        $product_id   = absint( $_POST['product_id'] ?? 101 );
        $product_name = sanitize_text_field( $_POST['product_name'] ?? 'Glamorous Crimson Red Embellished Draped' );
        $quantity     = max( 1, absint( $_POST['quantity'] ?? 1 ) );
        $color        = sanitize_text_field( $_POST['color'] ?? 'RED' );
        $size         = sanitize_text_field( $_POST['size'] ?? 'FREE SIZE' );
        $option_key   = sanitize_key( $_POST['option_key'] ?? 'opt1' );
        $total_price  = floatval( $_POST['total_price'] ?? 6995 );

        $order_result = MRM_Split_Order::create_split_order( array(
            'product_id'   => $product_id,
            'product_name' => $product_name,
            'quantity'     => $quantity,
            'color'        => $color,
            'size'         => $size,
            'option_key'   => $option_key,
            'total_price'  => $total_price,
        ) );

        if ( is_wp_error( $order_result ) ) {
            wp_send_json_error( array( 'message' => $order_result->get_error_message() ) );
        }

        wp_send_json_success( $order_result );
    }

    /**
     * Render the 2-Column Buy Now Modal Dialog (Matching Screenshot 3)
     */
    public function render_split_payment_modal() {
        if ( function_exists( 'mrm_get_option' ) && '0' === mrm_get_option( 'popup_enabled', '1' ) ) {
            return;
        }

        $heading    = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'popup_heading', 'Choose Your Payment Option' ) : 'Choose Your Payment Option';
        $opt1_title = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'popup_opt1_title', 'Pay Token Deposit Online' ) : 'Pay Token Deposit Online';
        $opt2_title = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'popup_opt2_title', 'Pay Part-Payment Online' ) : 'Pay Part-Payment Online';
        $opt3_title = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'popup_opt3_title', 'Full Online Payment' ) : 'Full Online Payment';
        $trust_text = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'popup_trust_text', '100% Bank Grade 256-bit SSL Encrypted Payment' ) : '100% Bank Grade 256-bit SSL Encrypted Payment';
        ?>
        <div class="mrm-modal-backdrop mrm-split-modal-backdrop" id="mrmSplitPaymentModal" style="display:none;" aria-hidden="true" role="dialog" aria-modal="true">
          <div class="mrm-split-modal-dialog">
            
            <!-- Left Summary Panel -->
            <div class="mrm-split-summary-panel">
              <div class="mrm-split-brand-header">
                <span class="mrm-brand-crest">✦</span>
                <span class="mrm-brand-name">MANSA RAM MAHAJAN &amp; CO</span>
              </div>

              <div class="mrm-split-product-card">
                <div class="mrm-split-thumb-box">
                  <img src="" alt="" id="mrmModalProductThumb">
                </div>
                <div class="mrm-split-product-meta">
                  <h4 id="mrmModalProductTitle">Glamorous Crimson Red Embellished Draped</h4>
                  <div class="mrm-split-variations">
                    <span class="mrm-split-var-tag">Color: <strong id="mrmModalVarColor">RED</strong></span>
                    <span class="mrm-split-var-tag">Size: <strong id="mrmModalVarSize">FREE SIZE</strong></span>
                  </div>
                  <div class="mrm-split-qty-row">
                    <span>Qty: <strong id="mrmModalQtyDisplay">1</strong></span>
                  </div>
                  <div class="mrm-split-price-display">
                    <span class="mrm-split-label">Total Amount</span>
                    <span class="mrm-split-total-amount" id="mrmModalTotalDisplay">₹ 6,995.00</span>
                  </div>
                </div>
              </div>

              <div class="mrm-split-perks">
                <div class="mrm-split-perk-item">
                  <span>✓ 100% Genuine Handcrafted Fabric</span>
                </div>
                <div class="mrm-split-perk-item">
                  <span>✓ Express Courier Tracking Included</span>
                </div>
                <div class="mrm-split-perk-item">
                  <span>✓ Flexible 7-Day Hassle-Free Exchange</span>
                </div>
              </div>
            </div>

            <!-- Right Payment Options Panel -->
            <div class="mrm-split-options-panel">
              
              <div class="mrm-split-panel-header">
                <h3><?php echo esc_html( $heading ); ?></h3>
                <button type="button" class="mrm-split-close-btn" id="mrmSplitModalClose" aria-label="Close modal">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
              </div>

              <div class="mrm-split-choices-list" id="mrmSplitChoicesList">
                
                <!-- Option 1: Partial Deposit (Reference: ₹199 deposit) -->
                <label class="mrm-choice-card active" data-option="opt1">
                  <input type="radio" name="mrm_payment_choice" value="opt1" checked>
                  <div class="mrm-choice-radio-visual"></div>
                  <div class="mrm-choice-content">
                    <div class="mrm-choice-header-row">
                      <span class="mrm-choice-title"><?php echo esc_html( $opt1_title ); ?></span>
                      <span class="mrm-choice-badge">Popular</span>
                    </div>
                    <div class="mrm-choice-breakdown">
                      <div class="mrm-amount-line">
                        <span>Pay Online Now:</span>
                        <strong class="mrm-amount-highlight" id="mrmOpt1Deposit">₹ 199.00</strong>
                      </div>
                      <div class="mrm-amount-line mrm-amount-sub">
                        <span>Balance on Cash on Delivery:</span>
                        <span id="mrmOpt1Remaining">₹ 6,796.00</span>
                      </div>
                    </div>
                  </div>
                </label>

                <!-- Option 2: Higher Partial Deposit (Reference: ₹299 deposit) -->
                <label class="mrm-choice-card" data-option="opt2">
                  <input type="radio" name="mrm_payment_choice" value="opt2">
                  <div class="mrm-choice-radio-visual"></div>
                  <div class="mrm-choice-content">
                    <div class="mrm-choice-header-row">
                      <span class="mrm-choice-title"><?php echo esc_html( $opt2_title ); ?></span>
                    </div>
                    <div class="mrm-choice-breakdown">
                      <div class="mrm-amount-line">
                        <span>Pay Online Now:</span>
                        <strong class="mrm-amount-highlight" id="mrmOpt2Deposit">₹ 299.00</strong>
                      </div>
                      <div class="mrm-amount-line mrm-amount-sub">
                        <span>Balance on Cash on Delivery:</span>
                        <span id="mrmOpt2Remaining">₹ 6,696.00</span>
                      </div>
                    </div>
                  </div>
                </label>

                <!-- Option 3: Full Online Payment -->
                <label class="mrm-choice-card" data-option="opt3">
                  <input type="radio" name="mrm_payment_choice" value="opt3">
                  <div class="mrm-choice-radio-visual"></div>
                  <div class="mrm-choice-content">
                    <div class="mrm-choice-header-row">
                      <span class="mrm-choice-title"><?php echo esc_html( $opt3_title ); ?></span>
                      <span class="mrm-choice-badge mrm-badge-green">Fastest Dispatch</span>
                    </div>
                    <div class="mrm-choice-breakdown">
                      <div class="mrm-amount-line">
                        <span>Total Payable Now:</span>
                        <strong class="mrm-amount-highlight" id="mrmOpt3Deposit">₹ 6,995.00</strong>
                      </div>
                      <div class="mrm-amount-line mrm-amount-sub">
                        <span>Balance on Delivery:</span>
                        <span>₹ 0.00 (Zero COD hassle)</span>
                      </div>
                    </div>
                  </div>
                </label>

              </div>

              <!-- Continue To Payment Button -->
              <div class="mrm-split-action-wrap">
                <button type="button" class="mrm-btn mrm-btn-continue-pay" id="mrmContinuePaymentBtn">
                  <span class="mrm-btn-text">Continue to Payment</span>
                  <span class="mrm-btn-spinner" style="display:none;"></span>
                </button>
              </div>

              <!-- Trust & Security Badges -->
              <div class="mrm-split-trust-footer">
                <div class="mrm-trust-row">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#25D366" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                  <span><?php echo esc_html( $trust_text ); ?></span>
                </div>
                <div class="mrm-payment-icons-row">
                  <span class="mrm-pay-tag">UPI (GPay / PhonePe / Paytm)</span>
                  <span class="mrm-pay-tag">Debit &amp; Credit Cards</span>
                  <span class="mrm-pay-tag">NetBanking</span>
                </div>
              </div>

            </div>

          </div>
        </div>
        <?php
    }
}

// Initialize Plugin
add_action( 'plugins_loaded', array( 'MRM_Split_Payment', 'get_instance' ) );
