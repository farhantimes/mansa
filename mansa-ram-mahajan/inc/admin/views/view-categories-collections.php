<?php
/**
 * Mansa Ram Mahajan & Co — Categories & Collections Admin View
 * Arched Category Grid & Collection Navigation
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-categories-collections';
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">COUTURE TAXONOMY</span>
      <h1>Categories & Collection Management</h1>
      <div class="mrm-admin-header-desc">
        Configure the signature Odhni-style arched category cards on the homepage and manage product category links.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <a href="<?php echo esc_url( admin_url( 'edit-tags.php?taxonomy=product_cat&post_type=product' ) ); ?>" class="button mrm-btn-secondary">
      <span class="dashicons dashicons-category" style="vertical-align:text-bottom; margin-right:4px;"></span>
      WooCommerce Categories
    </a>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">

  <!-- Section 8: Arched Categories -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-grid-view" style="color:var(--mrm-admin-crimson);"></span> Arched Category Showcase (Section 8)</h2>
      <div class="mrm-card-subtitle">The four iconic arched cards leading shoppers into the primary couture categories.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Section Title</th>
        <td><input type="text" name="cat_title" value="<?php echo esc_attr( mrm_get_option( 'cat_title' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>Section Subtitle</th>
        <td><input type="text" name="cat_subtitle" value="<?php echo esc_attr( mrm_get_option( 'cat_subtitle' ) ); ?>" class="mrm-input-text"></td>
      </tr>
    </table>

    <hr style="border:0; border-top:1px solid #E2DDD5; margin:20px 0;">

    <div class="mrm-grid-2">
      <!-- Card 1 -->
      <div style="background:#FAF8F5; border:1px solid #EAE5DE; border-radius:6px; padding:16px;">
        <h4 style="margin:0 0 12px 0; font-size:14px; color:#111;">Arch Tile 1</h4>
        <div style="margin-bottom:10px;">
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Title</label>
          <input type="text" name="cat1_title" value="<?php echo esc_attr( mrm_get_option( 'cat1_title' ) ); ?>" class="mrm-input-text" style="width:100%;">
        </div>
        <div style="margin-bottom:10px;">
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Target URL</label>
          <input type="text" name="cat1_url" value="<?php echo esc_attr( mrm_get_option( 'cat1_url' ) ); ?>" class="mrm-input-text" style="width:100%;">
        </div>
        <div>
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Image</label>
          <div class="mrm-media-row">
            <input type="text" id="cat1_img" name="cat1_img" value="<?php echo esc_attr( mrm_get_option( 'cat1_img' ) ); ?>" class="mrm-input-text" style="width:75%;">
            <button type="button" class="button mrm-upload-btn" data-target="cat1_img">Upload</button>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div style="background:#FAF8F5; border:1px solid #EAE5DE; border-radius:6px; padding:16px;">
        <h4 style="margin:0 0 12px 0; font-size:14px; color:#111;">Arch Tile 2</h4>
        <div style="margin-bottom:10px;">
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Title</label>
          <input type="text" name="cat2_title" value="<?php echo esc_attr( mrm_get_option( 'cat2_title' ) ); ?>" class="mrm-input-text" style="width:100%;">
        </div>
        <div style="margin-bottom:10px;">
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Target URL</label>
          <input type="text" name="cat2_url" value="<?php echo esc_attr( mrm_get_option( 'cat2_url' ) ); ?>" class="mrm-input-text" style="width:100%;">
        </div>
        <div>
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Image</label>
          <div class="mrm-media-row">
            <input type="text" id="cat2_img" name="cat2_img" value="<?php echo esc_attr( mrm_get_option( 'cat2_img' ) ); ?>" class="mrm-input-text" style="width:75%;">
            <button type="button" class="button mrm-upload-btn" data-target="cat2_img">Upload</button>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div style="background:#FAF8F5; border:1px solid #EAE5DE; border-radius:6px; padding:16px;">
        <h4 style="margin:0 0 12px 0; font-size:14px; color:#111;">Arch Tile 3</h4>
        <div style="margin-bottom:10px;">
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Title</label>
          <input type="text" name="cat3_title" value="<?php echo esc_attr( mrm_get_option( 'cat3_title' ) ); ?>" class="mrm-input-text" style="width:100%;">
        </div>
        <div style="margin-bottom:10px;">
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Target URL</label>
          <input type="text" name="cat3_url" value="<?php echo esc_attr( mrm_get_option( 'cat3_url' ) ); ?>" class="mrm-input-text" style="width:100%;">
        </div>
        <div>
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Image</label>
          <div class="mrm-media-row">
            <input type="text" id="cat3_img" name="cat3_img" value="<?php echo esc_attr( mrm_get_option( 'cat3_img' ) ); ?>" class="mrm-input-text" style="width:75%;">
            <button type="button" class="button mrm-upload-btn" data-target="cat3_img">Upload</button>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div style="background:#FAF8F5; border:1px solid #EAE5DE; border-radius:6px; padding:16px;">
        <h4 style="margin:0 0 12px 0; font-size:14px; color:#111;">Arch Tile 4</h4>
        <div style="margin-bottom:10px;">
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Title</label>
          <input type="text" name="cat4_title" value="<?php echo esc_attr( mrm_get_option( 'cat4_title' ) ); ?>" class="mrm-input-text" style="width:100%;">
        </div>
        <div style="margin-bottom:10px;">
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Target URL</label>
          <input type="text" name="cat4_url" value="<?php echo esc_attr( mrm_get_option( 'cat4_url' ) ); ?>" class="mrm-input-text" style="width:100%;">
        </div>
        <div>
          <label style="font-size:12px; font-weight:600; display:block; margin-bottom:4px;">Image</label>
          <div class="mrm-media-row">
            <input type="text" id="cat4_img" name="cat4_img" value="<?php echo esc_attr( mrm_get_option( 'cat4_img' ) ); ?>" class="mrm-input-text" style="width:75%;">
            <button type="button" class="button mrm-upload-btn" data-target="cat4_img">Upload</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to update arched categories.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
