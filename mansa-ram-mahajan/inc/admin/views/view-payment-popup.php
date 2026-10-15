<?php
/**
 * Mansa Ram Mahajan & Co — Payment Popup Admin View
 * Buy Now Split Payment 2-Column Modal Rules & Configuration
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-payment-popup';
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">CONVERSION ENGINE</span>
      <h1>Buy Now Split Payment Modal Settings</h1>
      <div class="mrm-admin-header-desc">
        Configure the Odhni-inspired 2-column Buy Now modal: token deposit amounts (₹199 / ₹299), full payment incentives, and order eligibility limits.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <a href="<?php echo esc_url( admin_url( 'admin.php?page=wc-settings&tab=checkout' ) ); ?>" class="button mrm-btn-secondary">
      <span class="dashicons dashicons-admin-generic" style="vertical-align:text-bottom; margin-right:4px;"></span>
      WooCommerce Gateways
    </a>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">

  <!-- Modal Enablement & Master Title -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-money-alt" style="color:var(--mrm-admin-crimson);"></span> Modal Activation & Global Heading</h2>
      <div class="mrm-card-subtitle">Controls whether the centered 2-column modal triggers on "BUY NOW" click.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>
          Enable Payment Modal
          <small>If disabled, clicking "BUY NOW" will immediately direct the customer straight to standard WooCommerce checkout.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="popup_enabled" value="0">
              <input type="checkbox" name="popup_enabled" value="1" <?php checked( '1', mrm_get_option( 'popup_enabled' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Centered Buy Now Payment Modal</span>
          </label>
        </td>
      </tr>

      <tr>
        <th>Modal Heading</th>
        <td>
          <input type="text" name="popup_heading" value="<?php echo esc_attr( mrm_get_option( 'popup_heading' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>Default Pre-selected Option</th>
        <td>
          <select name="popup_default_opt" class="mrm-input-select" style="max-width:320px;">
            <option value="opt1" <?php selected( 'opt1', mrm_get_option( 'popup_default_opt' ) ); ?>>Option 1: Token Deposit (₹199)</option>
            <option value="opt2" <?php selected( 'opt2', mrm_get_option( 'popup_default_opt' ) ); ?>>Option 2: Partial Payment (₹299)</option>
            <option value="opt3" <?php selected( 'opt3', mrm_get_option( 'popup_default_opt' ) ); ?>>Option 3: 100% Full Payment Online</option>
          </select>
        </td>
      </tr>
    </table>
  </div>

  <!-- Option 1: Token Deposit -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-tag" style="color:var(--mrm-admin-crimson);"></span> Option 1: Token Deposit</h2>
      <div class="mrm-card-subtitle">Low barrier booking deposit. Customer pays deposit online, balance is collected on delivery.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Deposit Amount (₹)</th>
        <td>
          <input type="number" name="popup_opt1_val" value="<?php echo esc_attr( mrm_get_option( 'popup_opt1_val' ) ); ?>" class="mrm-input-text" style="max-width:200px;">
        </td>
      </tr>
      <tr>
        <th>Option 1 Display Title</th>
        <td>
          <input type="text" name="popup_opt1_title" value="<?php echo esc_attr( mrm_get_option( 'popup_opt1_title' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
      <tr>
        <th>Option 1 Description</th>
        <td>
          <textarea name="popup_opt1_desc" class="mrm-input-textarea" rows="2"><?php echo esc_textarea( mrm_get_option( 'popup_opt1_desc' ) ); ?></textarea>
        </td>
      </tr>
    </table>
  </div>

  <!-- Option 2: Higher Part-Payment -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-tag" style="color:var(--mrm-admin-crimson);"></span> Option 2: Partial Payment</h2>
      <div class="mrm-card-subtitle">Higher online commitment deposit for urgent custom tailoring.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Deposit Amount (₹)</th>
        <td>
          <input type="number" name="popup_opt2_val" value="<?php echo esc_attr( mrm_get_option( 'popup_opt2_val' ) ); ?>" class="mrm-input-text" style="max-width:200px;">
        </td>
      </tr>
      <tr>
        <th>Option 2 Display Title</th>
        <td>
          <input type="text" name="popup_opt2_title" value="<?php echo esc_attr( mrm_get_option( 'popup_opt2_title' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
      <tr>
        <th>Option 2 Description</th>
        <td>
          <textarea name="popup_opt2_desc" class="mrm-input-textarea" rows="2"><?php echo esc_textarea( mrm_get_option( 'popup_opt2_desc' ) ); ?></textarea>
        </td>
      </tr>
    </table>
  </div>

  <!-- Option 3: Full Payment Online -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-saved" style="color:var(--mrm-admin-crimson);"></span> Option 3: 100% Full Payment Online</h2>
      <div class="mrm-card-subtitle">Full prepaid payment via UPI, Credit/Debit Card, Netbanking, or EMI.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Option 3 Display Title</th>
        <td>
          <input type="text" name="popup_opt3_title" value="<?php echo esc_attr( mrm_get_option( 'popup_opt3_title' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
      <tr>
        <th>Option 3 Description</th>
        <td>
          <textarea name="popup_opt3_desc" class="mrm-input-textarea" rows="2"><?php echo esc_textarea( mrm_get_option( 'popup_opt3_desc' ) ); ?></textarea>
        </td>
      </tr>
    </table>
  </div>

  <!-- Rules, Limits & Trust -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-shield" style="color:var(--mrm-admin-crimson);"></span> Order Limits & Trust Messaging</h2>
      <div class="mrm-card-subtitle">Minimum/maximum order thresholds for split deposit eligibility.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Minimum Order Eligible (₹)</th>
        <td>
          <input type="number" name="popup_min_order" value="<?php echo esc_attr( mrm_get_option( 'popup_min_order' ) ); ?>" class="mrm-input-text" style="max-width:200px;">
        </td>
      </tr>
      <tr>
        <th>Maximum Order Eligible (₹)</th>
        <td>
          <input type="number" name="popup_max_order" value="<?php echo esc_attr( mrm_get_option( 'popup_max_order' ) ); ?>" class="mrm-input-text" style="max-width:200px;">
        </td>
      </tr>
      <tr>
        <th>Cash on Delivery (COD) for Balance</th>
        <td>
          <label>
            <input type="hidden" name="popup_cod_enabled" value="0">
            <input type="checkbox" name="popup_cod_enabled" value="1" <?php checked( '1', mrm_get_option( 'popup_cod_enabled' ) ); ?>>
            <?php esc_html_e( 'Allow remaining balance collection via Cash / Doorstep UPI upon delivery', 'mansa-ram-mahajan' ); ?>
          </label>
        </td>
      </tr>
      <tr>
        <th>Supporting Trust Text</th>
        <td>
          <input type="text" name="popup_trust_text" value="<?php echo esc_attr( mrm_get_option( 'popup_trust_text' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
      <tr>
        <th>Post-Booking Instructions</th>
        <td>
          <textarea name="popup_instructions" class="mrm-input-textarea" rows="2"><?php echo esc_textarea( mrm_get_option( 'popup_instructions' ) ); ?></textarea>
        </td>
      </tr>
    </table>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to apply updated payment modal settings and sync with WooCommerce.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
