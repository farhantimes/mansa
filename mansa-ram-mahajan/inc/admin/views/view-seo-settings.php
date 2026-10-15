<?php
/**
 * Mansa Ram Mahajan & Co — SEO Settings Admin View
 * Meta tags, social graph cards, and search optimization
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-seo-settings';
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">SEARCH & SOCIAL GRAPH</span>
      <h1>Search Engine Optimization (SEO) & Social Sharing</h1>
      <div class="mrm-admin-header-desc">
        Configure meta titles, meta descriptions, and OpenGraph social sharing images for search engines and social platforms.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="button mrm-btn-secondary">Check Live Meta</a>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">

  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-search" style="color:var(--mrm-admin-crimson);"></span> Homepage SEO Metadata</h2>
      <div class="mrm-card-subtitle">These tags are automatically rendered into the HTML &lt;head&gt; of your storefront.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>
          Homepage Meta Title
          <small>Recommended length: 50–60 characters. Appears as search result headline in Google.</small>
        </th>
        <td>
          <input type="text" name="seo_meta_title" value="<?php echo esc_attr( mrm_get_option( 'seo_meta_title' ) ); ?>" class="mrm-input-text" style="font-weight:600;">
        </td>
      </tr>

      <tr>
        <th>
          Homepage Meta Description
          <small>Recommended length: 140–160 characters. Summarizes your luxury offering in Google snippets.</small>
        </th>
        <td>
          <textarea name="seo_meta_desc" class="mrm-input-textarea" rows="3"><?php echo esc_textarea( mrm_get_option( 'seo_meta_desc' ) ); ?></textarea>
        </td>
      </tr>

      <tr>
        <th>
          Social Share Image (OG:Image)
          <small>The image displayed when your store URL is shared on WhatsApp, Facebook, LinkedIn, and iMessage (Recommended: 1200x630px).</small>
        </th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="seo_og_image" name="seo_og_image" value="<?php echo esc_attr( mrm_get_option( 'seo_og_image' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="seo_og_image">Select from Media</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_seo_og_image" style="width:240px; height:120px;">
              <?php if ( mrm_get_option( 'seo_og_image' ) ) : ?>
                <img src="<?php echo esc_url( mrm_get_option( 'seo_og_image' ) ); ?>" alt="SEO Social Preview">
              <?php else : ?>
                <span class="empty">No Image</span>
              <?php endif; ?>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to apply updated SEO tags.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
