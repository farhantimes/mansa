<?php
/**
 * Mansa Ram Mahajan & Co — Store Locations Admin View
 * Flagship Boutiques in Delhi NCR Repeater
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-store-locations';
$raw_stores = mrm_get_option( 'store_locations' );
$stores = is_array( $raw_stores ) ? $raw_stores : json_decode( $raw_stores, true );
if ( ! is_array( $stores ) ) {
    $stores = mrm_get_stores();
}
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">RETAIL PRESENCE</span>
      <h1>Delhi NCR Flagship Store Boutiques</h1>
      <div class="mrm-admin-header-desc">
        Manage addresses, phone numbers, opening timings, photographs, and Google Maps links for all retail boutiques.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <button type="button" class="button mrm-btn-secondary" id="mrm_add_store_row">
      <span class="dashicons dashicons-plus-alt" style="vertical-align:text-bottom; margin-right:4px;"></span>
      Add Store Location
    </button>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">
  <input type="hidden" id="store_locations_json" name="store_locations" value="<?php echo esc_attr( wp_json_encode( $stores ) ); ?>">

  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-location-alt" style="color:var(--mrm-admin-crimson);"></span> Boutiques & Atelier Studios (Section 13)</h2>
      <div class="mrm-card-subtitle">These stores appear in the interactive tabbed boutique locator on the homepage.</div>
    </div>

    <div style="overflow-x:auto;">
      <table class="mrm-repeater-table" id="mrm_stores_table">
        <thead>
          <tr>
            <th style="width:120px;">City / Area</th>
            <th style="width:180px;">Studio Title</th>
            <th style="width:200px;">Full Address</th>
            <th style="width:130px;">Phone</th>
            <th style="width:140px;">Timings</th>
            <th style="width:210px;">Store Photo</th>
            <th style="width:140px;">Google Maps URL</th>
            <th style="width:80px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ( $stores as $index => $store ) : ?>
            <tr class="mrm-store-row mrm-repeater-row">
              <td>
                <input type="text" class="mrm-input-text store-city" value="<?php echo esc_attr( $store['city'] ?? '' ); ?>" style="width:100%;">
              </td>
              <td>
                <input type="text" class="mrm-input-text store-title" value="<?php echo esc_attr( $store['title'] ?? '' ); ?>" style="width:100%;">
              </td>
              <td>
                <input type="text" class="mrm-input-text store-address" value="<?php echo esc_attr( $store['address'] ?? '' ); ?>" style="width:100%;">
              </td>
              <td>
                <input type="text" class="mrm-input-text store-phone" value="<?php echo esc_attr( $store['phone'] ?? '' ); ?>" style="width:100%;">
              </td>
              <td>
                <input type="text" class="mrm-input-text store-timing" value="<?php echo esc_attr( $store['timing'] ?? '' ); ?>" style="width:100%;">
              </td>
              <td>
                <div class="mrm-media-row">
                  <input type="text" id="store_img_<?php echo $index; ?>" class="mrm-input-text store-image" value="<?php echo esc_attr( $store['image'] ?? '' ); ?>" style="width:120px;">
                  <button type="button" class="button mrm-upload-btn" data-target="store_img_<?php echo $index; ?>">Upload</button>
                </div>
              </td>
              <td>
                <input type="text" class="mrm-input-text store-maps" value="<?php echo esc_attr( $store['maps_url'] ?? '' ); ?>" style="width:100%;">
              </td>
              <td>
                <button type="button" class="button mrm-btn-danger mrm-remove-row">Remove</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to apply updated store locations to your website.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
