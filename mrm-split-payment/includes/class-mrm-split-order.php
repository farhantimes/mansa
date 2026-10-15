<?php
/**
 * MRM Split Order Logic & WooCommerce Hooks
 *
 * @package MRM_Split_Payment
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class MRM_Split_Order {

    /**
     * Calculate 3 split payment options server-side
     */
    public static function calculate_options( $total_price ) {
        $settings = MRM_Split_Settings::get_settings();
        
        // Option 1
        $opt1_deposit = ($settings['opt1_type'] === 'percent') 
            ? round( ($total_price * $settings['opt1_val']) / 100, 2 ) 
            : min( $settings['opt1_val'], $total_price );
        $opt1_remaining = max( 0, $total_price - $opt1_deposit );

        // Option 2
        $opt2_deposit = ($settings['opt2_type'] === 'percent') 
            ? round( ($total_price * $settings['opt2_val']) / 100, 2 ) 
            : min( $settings['opt2_val'], $total_price );
        $opt2_remaining = max( 0, $total_price - $opt2_deposit );

        // Option 3: Full Payment
        $opt3_deposit = $total_price;
        $opt3_remaining = 0.00;

        return array(
            'opt1' => array(
                'deposit'           => $opt1_deposit,
                'remaining'         => $opt1_remaining,
                'formatted_deposit' => '₹ ' . number_format( $opt1_deposit, 2 ),
                'formatted_rem'     => '₹ ' . number_format( $opt1_remaining, 2 ),
            ),
            'opt2' => array(
                'deposit'           => $opt2_deposit,
                'remaining'         => $opt2_remaining,
                'formatted_deposit' => '₹ ' . number_format( $opt2_deposit, 2 ),
                'formatted_rem'     => '₹ ' . number_format( $opt2_remaining, 2 ),
            ),
            'opt3' => array(
                'deposit'           => $opt3_deposit,
                'remaining'         => $opt3_remaining,
                'formatted_deposit' => '₹ ' . number_format( $opt3_deposit, 2 ),
                'formatted_rem'     => '₹ 0.00',
            ),
        );
    }

    /**
     * Create or setup order with split payment
     */
    public static function create_split_order( $data ) {
        if ( ! class_exists( 'WooCommerce' ) ) {
            // Mock response for standalone verification
            return array(
                'order_id'     => rand( 1000, 9999 ),
                'checkout_url' => home_url( '/checkout' ),
                'status'       => 'success',
                'deposit_now'  => '₹ 199.00',
                'balance_due'  => '₹ 6,796.00',
            );
        }

        try {
            $total_price = floatval( $data['total_price'] );
            $calc = self::calculate_options( $total_price );
            $chosen = $calc[ $data['option_key'] ] ?? $calc['opt1'];

            // Clear current cart and add this buy-now product
            WC()->cart->empty_cart();
            WC()->cart->add_to_cart( $data['product_id'], $data['quantity'] );

            // Store session parameters for checkout
            WC()->session->set( 'mrm_split_payment_data', array(
                'option'    => $data['option_key'],
                'deposit'   => $chosen['deposit'],
                'remaining' => $chosen['remaining'],
                'color'     => $data['color'],
                'size'      => $data['size'],
            ) );

            return array(
                'status'       => 'success',
                'checkout_url' => wc_get_checkout_url(),
                'deposit'      => $chosen['deposit'],
                'remaining'    => $chosen['remaining'],
            );
        } catch ( Exception $e ) {
            return new WP_Error( 'order_creation_failed', $e->getMessage() );
        }
    }

    /**
     * Save metadata to WooCommerce order upon creation
     */
    public static function init() {
        add_action( 'woocommerce_checkout_update_order_meta', array( __CLASS__, 'save_order_split_meta' ) );
        add_action( 'woocommerce_admin_order_data_after_billing_address', array( __CLASS__, 'display_admin_order_split_meta' ) );
        add_action( 'woocommerce_email_after_order_table', array( __CLASS__, 'display_email_split_meta' ), 10, 2 );
    }

    public static function save_order_split_meta( $order_id ) {
        if ( ! function_exists( 'WC' ) || ! WC()->session ) return;
        $split_data = WC()->session->get( 'mrm_split_payment_data' );
        if ( $split_data ) {
            $order = wc_get_order( $order_id );
            if ( $order ) {
                $order->update_meta_data( '_mrm_payment_type', sanitize_text_field( $split_data['option'] ) );
                $order->update_meta_data( '_mrm_deposit_paid', floatval( $split_data['deposit'] ) );
                $order->update_meta_data( '_mrm_balance_due', floatval( $split_data['remaining'] ) );
                $order->update_meta_data( '_mrm_selected_color', sanitize_text_field( $split_data['color'] ) );
                $order->update_meta_data( '_mrm_selected_size', sanitize_text_field( $split_data['size'] ) );

                if ( floatval( $split_data['remaining'] ) > 0 ) {
                    $order->set_status( 'wc-deposit-paid', __( 'Deposit paid online. Balance due upon delivery.', 'mrm-split-payment' ) );
                }
                $order->save();
            }
        }
    }

    public static function display_admin_order_split_meta( $order ) {
        $deposit = $order->get_meta( '_mrm_deposit_paid' );
        $balance = $order->get_meta( '_mrm_balance_due' );
        if ( $deposit || $balance ) {
            ?>
            <div class="mrm-admin-order-split" style="margin-top:16px; padding:12px; background:#FAF8F5; border:1px solid #D4AF37; border-radius:4px;">
              <h4 style="margin:0 0 8px 0; color:#C42B59;">✨ MRM Split Payment Arrangement</h4>
              <p style="margin:4px 0;"><strong>Online Deposit Paid:</strong> ₹ <?php echo esc_html( number_format( floatval($deposit), 2 ) ); ?></p>
              <p style="margin:4px 0;"><strong>Balance to Collect on COD:</strong> <span style="color:#E65100; font-weight:bold;">₹ <?php echo esc_html( number_format( floatval($balance), 2 ) ); ?></span></p>
            </div>
            <?php
        }
    }

    public static function display_email_split_meta( $order, $sent_to_admin ) {
        $deposit = $order->get_meta( '_mrm_deposit_paid' );
        $balance = $order->get_meta( '_mrm_balance_due' );
        if ( $deposit || $balance ) {
            ?>
            <div style="margin-top:20px; padding:15px; background:#FAF8F5; border-left:4px solid #C42B59;">
              <h3 style="margin:0 0 10px; color:#C42B59;">Payment Breakdown</h3>
              <p style="margin:4px 0;"><strong>Deposit Paid Online:</strong> ₹ <?php echo esc_html( number_format( floatval($deposit), 2 ) ); ?></p>
              <p style="margin:4px 0;"><strong>Remaining Balance Payable on Delivery:</strong> ₹ <?php echo esc_html( number_format( floatval($balance), 2 ) ); ?></p>
            </div>
            <?php
        }
    }
}

MRM_Split_Order::init();
