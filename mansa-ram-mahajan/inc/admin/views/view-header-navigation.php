<?php
/**
 * Mansa Ram Mahajan & Co — Header, Navigation & Footer Admin View
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-header-navigation';
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">GLOBAL NAVIGATION</span>
      <h1>Header, Navigation & Footer Controls</h1>
      <div class="mrm-admin-header-desc">
        Configure the top promotional announcement ticker, brand logos, quick search & cart icons, navigation menus, and footer legal info.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="button mrm-btn-secondary">
      <span class="dashicons dashicons-menu" style="vertical-align:text-bottom; margin-right:4px;"></span>
      Edit WP Menus
    </a>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">

  <!-- Section 1: Header & Announcement Ticker -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-megaphone" style="color:var(--mrm-admin-crimson);"></span> Announcement Bar & Top Header</h2>
      <div class="mrm-card-subtitle">Manage rotating promotional headlines at the very top of every page.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>
          Announcement Messages
          <small>Enter one announcement per line. The top bar will smoothly cycle through these messages every 4 seconds.</small>
        </th>
        <td>
          <textarea name="announcement_messages" class="mrm-input-textarea" rows="4"><?php echo esc_textarea( mrm_get_option( 'announcement_messages' ) ); ?></textarea>
        </td>
      </tr>

      <tr>
        <th>
          Header Action Icons
          <small>Choose which utility icons appear on the right side of the main desktop and mobile header.</small>
        </th>
        <td>
          <div style="display:flex; flex-direction:column; gap:10px;">
            <label>
              <input type="hidden" name="enable_search" value="0">
              <input type="checkbox" name="enable_search" value="1" <?php checked( '1', mrm_get_option( 'enable_search' ) ); ?>>
              <?php esc_html_e( 'Display Search Bar & Modal Icon', 'mansa-ram-mahajan' ); ?>
            </label>
            <label>
              <input type="hidden" name="enable_account" value="0">
              <input type="checkbox" name="enable_account" value="1" <?php checked( '1', mrm_get_option( 'enable_account' ) ); ?>>
              <?php esc_html_e( 'Display Customer Account Icon', 'mansa-ram-mahajan' ); ?>
            </label>
            <label>
              <input type="hidden" name="enable_wishlist" value="0">
              <input type="checkbox" name="enable_wishlist" value="1" <?php checked( '1', mrm_get_option( 'enable_wishlist' ) ); ?>>
              <?php esc_html_e( 'Display Wishlist Icon', 'mansa-ram-mahajan' ); ?>
            </label>
            <label>
              <input type="hidden" name="enable_cart" value="0">
              <input type="checkbox" name="enable_cart" value="1" <?php checked( '1', mrm_get_option( 'enable_cart' ) ); ?>>
              <?php esc_html_e( 'Display Shopping Bag / Cart Counter Icon', 'mansa-ram-mahajan' ); ?>
            </label>
          </div>
        </td>
      </tr>

      <tr>
        <th>
          Header Store Link
          <small>Destination URL for "Store Locator" in top header bar (e.g. #mrmStoresSection or a dedicated page).</small>
        </th>
        <td>
          <input type="text" name="top_store_link" value="<?php echo esc_attr( mrm_get_option( 'top_store_link' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
    </table>
  </div>

  <!-- Section 2: Brand Logos -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-format-image" style="color:var(--mrm-admin-crimson);"></span> Brand Logos & Skyline Graphic</h2>
      <div class="mrm-card-subtitle">Upload or select SVG / PNG brand emblems from the WordPress Media Library.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>
          Main Header Brand Logo
          <small>Displayed prominently in the center of the navigation bar.</small>
        </th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="custom_logo_url" name="custom_logo_url" value="<?php echo esc_attr( mrm_get_option( 'custom_logo_url' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="custom_logo_url">Select from Media</button>
              <button type="button" class="button mrm-clear-media-btn" data-target="custom_logo_url">Clear</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_custom_logo_url">
              <?php if ( mrm_get_option( 'custom_logo_url' ) ) : ?>
                <img src="<?php echo esc_url( mrm_get_option( 'custom_logo_url' ) ); ?>" alt="Logo Preview">
              <?php else : ?>
                <span class="empty">No Image</span>
              <?php endif; ?>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <th>
          Footer Brand Logo
          <small>Displayed in the grand dark footer above the company address.</small>
        </th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="footer_logo_url" name="footer_logo_url" value="<?php echo esc_attr( mrm_get_option( 'footer_logo_url' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="footer_logo_url">Select from Media</button>
              <button type="button" class="button mrm-clear-media-btn" data-target="footer_logo_url">Clear</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_footer_logo_url">
              <?php if ( mrm_get_option( 'footer_logo_url' ) ) : ?>
                <img src="<?php echo esc_url( mrm_get_option( 'footer_logo_url' ) ); ?>" alt="Footer Logo Preview">
              <?php else : ?>
                <span class="empty">No Image</span>
              <?php endif; ?>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <th>
          Heritage Skyline Illustration
          <small>The architectural skyline graphic appearing directly above the dark footer.</small>
        </th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="skyline_svg_url" name="skyline_svg_url" value="<?php echo esc_attr( mrm_get_option( 'skyline_svg_url' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="skyline_svg_url">Select from Media</button>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <!-- Section 3: Footer Contact & Legal -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-admin-generic" style="color:var(--mrm-admin-crimson);"></span> Footer Details & Copyright</h2>
      <div class="mrm-card-subtitle">Global contact info, WhatsApp concierge link, and legal copyright bar.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>
          WhatsApp Concierge Number
          <small>Phone number format with country code (e.g. +919811122334) for WhatsApp chats.</small>
        </th>
        <td>
          <input type="text" name="whatsapp_number" value="<?php echo esc_attr( mrm_get_option( 'whatsapp_number' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>
          Customer Support Email
        </th>
        <td>
          <input type="email" name="support_email" value="<?php echo esc_attr( mrm_get_option( 'support_email' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>
          Customer Support Phone
        </th>
        <td>
          <input type="text" name="support_phone" value="<?php echo esc_attr( mrm_get_option( 'support_phone' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>
          Business / Atelier Hours
        </th>
        <td>
          <input type="text" name="business_hours" value="<?php echo esc_attr( mrm_get_option( 'business_hours' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>
          Social Media Profiles
          <small>Links to Facebook, Instagram, and YouTube.</small>
        </th>
        <td>
          <div style="display:flex; flex-direction:column; gap:8px;">
            <input type="url" name="social_fb" placeholder="https://facebook.com/mansaram" value="<?php echo esc_attr( mrm_get_option( 'social_fb' ) ); ?>" class="mrm-input-text">
            <input type="url" name="social_insta" placeholder="https://instagram.com/mansaram_official" value="<?php echo esc_attr( mrm_get_option( 'social_insta' ) ); ?>" class="mrm-input-text">
            <input type="url" name="social_yt" placeholder="https://youtube.com/@mansaram" value="<?php echo esc_attr( mrm_get_option( 'social_yt' ) ); ?>" class="mrm-input-text">
          </div>
        </td>
      </tr>

      <tr>
        <th>
          Copyright Notice Text
          <small>Appears at the very bottom bar of the website.</small>
        </th>
        <td>
          <input type="text" name="copyright_text" value="<?php echo esc_attr( mrm_get_option( 'copyright_text' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
    </table>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to apply updated header and navigation settings.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
