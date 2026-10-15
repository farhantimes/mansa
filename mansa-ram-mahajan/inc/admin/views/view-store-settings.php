<?php
/**
 * Mansa Ram Mahajan & Co — Store Settings & Color Palette Admin View
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-store-settings';
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">GLOBAL DESIGN SYSTEM</span>
      <h1>Store Design Settings & Brand Palette</h1>
      <div class="mrm-admin-header-desc">
        Customize the luxury color scheme, brand tokens, and e-commerce shipping threshold. All changes update frontend CSS variables dynamically.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <a href="<?php echo esc_url( admin_url( 'admin.php?page=wc-settings' ) ); ?>" class="button mrm-btn-secondary">
      <span class="dashicons dashicons-admin-generic" style="vertical-align:text-bottom; margin-right:4px;"></span>
      WooCommerce Settings
    </a>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">

  <!-- Color Palette -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-art" style="color:var(--mrm-admin-crimson);"></span> Brand Color Palette</h2>
      <div class="mrm-card-subtitle">These colors inject directly into CSS root variables, updating buttons, badges, banners, and links across the site.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Primary Brand Crimson<small>Main CTA buttons, active tabs, header icons</small></th>
        <td>
          <div class="mrm-color-wrap">
            <input type="color" class="mrm-color-picker" value="<?php echo esc_attr( mrm_get_option( 'color_primary' ) ); ?>">
            <input type="text" name="color_primary" class="mrm-input-text mrm-color-text" value="<?php echo esc_attr( mrm_get_option( 'color_primary' ) ); ?>" style="width:120px;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Primary Hover Crimson<small>Button hover state</small></th>
        <td>
          <div class="mrm-color-wrap">
            <input type="color" class="mrm-color-picker" value="<?php echo esc_attr( mrm_get_option( 'color_primary_hover' ) ); ?>">
            <input type="text" name="color_primary_hover" class="mrm-input-text mrm-color-text" value="<?php echo esc_attr( mrm_get_option( 'color_primary_hover' ) ); ?>" style="width:120px;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Royal Gold Accent<small>Borders, badges, star ratings, luxury accents</small></th>
        <td>
          <div class="mrm-color-wrap">
            <input type="color" class="mrm-color-picker" value="<?php echo esc_attr( mrm_get_option( 'color_gold' ) ); ?>">
            <input type="text" name="color_gold" class="mrm-input-text mrm-color-text" value="<?php echo esc_attr( mrm_get_option( 'color_gold' ) ); ?>" style="width:120px;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Deep Regal Secondary<small>Dark footer, banner overlay backgrounds</small></th>
        <td>
          <div class="mrm-color-wrap">
            <input type="color" class="mrm-color-picker" value="<?php echo esc_attr( mrm_get_option( 'color_secondary' ) ); ?>">
            <input type="text" name="color_secondary" class="mrm-input-text mrm-color-text" value="<?php echo esc_attr( mrm_get_option( 'color_secondary' ) ); ?>" style="width:120px;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Sale Badge Accent<small>Sale tags, percentage discount bubbles</small></th>
        <td>
          <div class="mrm-color-wrap">
            <input type="color" class="mrm-color-picker" value="<?php echo esc_attr( mrm_get_option( 'color_accent_sale' ) ); ?>">
            <input type="text" name="color_accent_sale" class="mrm-input-text mrm-color-text" value="<?php echo esc_attr( mrm_get_option( 'color_accent_sale' ) ); ?>" style="width:120px;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Warm Light Background<small>Page background and hero section tint</small></th>
        <td>
          <div class="mrm-color-wrap">
            <input type="color" class="mrm-color-picker" value="<?php echo esc_attr( mrm_get_option( 'color_bg_light' ) ); ?>">
            <input type="text" name="color_bg_light" class="mrm-input-text mrm-color-text" value="<?php echo esc_attr( mrm_get_option( 'color_bg_light' ) ); ?>" style="width:120px;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Alternate Section Background<small>Secondary cards and subtle contrast areas</small></th>
        <td>
          <div class="mrm-color-wrap">
            <input type="color" class="mrm-color-picker" value="<?php echo esc_attr( mrm_get_option( 'color_bg_alt' ) ); ?>">
            <input type="text" name="color_bg_alt" class="mrm-input-text mrm-color-text" value="<?php echo esc_attr( mrm_get_option( 'color_bg_alt' ) ); ?>" style="width:120px;">
          </div>
        </td>
      </tr>
    </table>
  </div>

  <!-- Store Logistics & Delivery -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-car" style="color:var(--mrm-admin-crimson);"></span> Store Thresholds & Brand Tagline</h2>
      <div class="mrm-card-subtitle">E-commerce delivery rules and brand subtitle.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Brand Subtitle / Tagline</th>
        <td>
          <input type="text" name="brand_tagline" value="<?php echo esc_attr( mrm_get_option( 'brand_tagline' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>Free Domestic Shipping Minimum (₹)<small>Orders above this value receive complimentary domestic express delivery</small></th>
        <td>
          <input type="number" name="free_shipping_min" value="<?php echo esc_attr( mrm_get_option( 'free_shipping_min' ) ); ?>" class="mrm-input-text" style="max-width:200px;">
        </td>
      </tr>
    </table>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to apply updated colors and store settings.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
