<?php
/**
 * Mansa Ram Mahajan & Co — Promotional Banners & Hero Admin View
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-promotional-banners';
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">HERO ATELIER</span>
      <h1>Promotional Banners & Trust Highlights</h1>
      <div class="mrm-admin-header-desc">
        Configure the 4-slide luxury landscape hero image slider, two call-to-action buttons, and the 4 trust highlight badges.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="button mrm-btn-secondary">View Frontend</a>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">

  <!-- Section 3: Hero Banner Controls -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-star-filled" style="color:var(--mrm-admin-crimson);"></span> Main Hero Banner (Section 3)</h2>
      <div class="mrm-card-subtitle">Edit the primary headline, copy, and buttons appearing above the fold on the homepage.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Hero Top Badge</th>
        <td>
          <input type="text" name="hero_badge" value="<?php echo esc_attr( mrm_get_option( 'hero_badge' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>Hero Main Title</th>
        <td>
          <input type="text" name="hero_title" value="<?php echo esc_attr( mrm_get_option( 'hero_title' ) ); ?>" class="mrm-input-text" style="font-weight:600; font-size:16px;">
        </td>
      </tr>

      <tr>
        <th>Hero Subtitle / Description</th>
        <td>
          <textarea name="hero_subtitle" class="mrm-input-textarea" rows="3"><?php echo esc_textarea( mrm_get_option( 'hero_subtitle' ) ); ?></textarea>
        </td>
      </tr>

      <tr>
        <th>Primary CTA Button</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="hero_btn1_text" placeholder="Button Label (e.g. SHOP NOW)" value="<?php echo esc_attr( mrm_get_option( 'hero_btn1_text' ) ); ?>" class="mrm-input-text" style="width:35%;">
            <input type="text" name="hero_btn1_url" placeholder="Destination URL" value="<?php echo esc_attr( mrm_get_option( 'hero_btn1_url' ) ); ?>" class="mrm-input-text" style="width:65%;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Secondary CTA Button</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="hero_btn2_text" placeholder="Button Label (e.g. EXPLORE BRIDAL)" value="<?php echo esc_attr( mrm_get_option( 'hero_btn2_text' ) ); ?>" class="mrm-input-text" style="width:35%;">
            <input type="text" name="hero_btn2_url" placeholder="Destination URL" value="<?php echo esc_attr( mrm_get_option( 'hero_btn2_url' ) ); ?>" class="mrm-input-text" style="width:65%;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Slider Autoplay Interval</th>
        <td>
          <input type="number" name="hero_slider_autoplay" value="<?php echo esc_attr( mrm_get_option( 'hero_slider_autoplay', '5000' ) ); ?>" class="mrm-input-text" style="width:160px;" min="2000" step="500">
          <span style="font-size:12px; color:#666; margin-left:8px;">Milliseconds between slides (Default: 5000ms = 5s)</span>
        </td>
      </tr>

      <!-- Slide 1 -->
      <tr>
        <th>Hero Slide 1 (Landscape)</th>
        <td>
          <div style="display:flex; gap:10px; margin-bottom:8px;">
            <input type="text" name="hero_slide1_title" placeholder="Slide Title (e.g. Royal Crimson Splendour)" value="<?php echo esc_attr( mrm_get_option( 'hero_slide1_title', 'Royal Crimson Splendour' ) ); ?>" class="mrm-input-text" style="width:50%;">
            <input type="text" name="hero_slide1_tag" placeholder="Slide Tag (e.g. Festive Collection 2026)" value="<?php echo esc_attr( mrm_get_option( 'hero_slide1_tag', 'Festive Collection 2026' ) ); ?>" class="mrm-input-text" style="width:50%;">
          </div>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="hero_slide1_img" name="hero_slide1_img" value="<?php echo esc_attr( mrm_get_option( 'hero_slide1_img' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="hero_slide1_img">Select Image</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_hero_slide1_img" style="width:240px; height:120px;">
              <?php if ( mrm_get_option( 'hero_slide1_img' ) ) : ?>
                <img src="<?php echo esc_url( mrm_get_option( 'hero_slide1_img' ) ); ?>" alt="Slide 1">
              <?php else : ?><span class="empty">No Image</span><?php endif; ?>
            </div>
          </div>
        </td>
      </tr>

      <!-- Slide 2 -->
      <tr>
        <th>Hero Slide 2 (Landscape)</th>
        <td>
          <div style="display:flex; gap:10px; margin-bottom:8px;">
            <input type="text" name="hero_slide2_title" placeholder="Slide Title (e.g. Regal Heritage Weaves)" value="<?php echo esc_attr( mrm_get_option( 'hero_slide2_title', 'Regal Heritage Weaves' ) ); ?>" class="mrm-input-text" style="width:50%;">
            <input type="text" name="hero_slide2_tag" placeholder="Slide Tag (e.g. Wedding Season Edit)" value="<?php echo esc_attr( mrm_get_option( 'hero_slide2_tag', 'Wedding Season Edit' ) ); ?>" class="mrm-input-text" style="width:50%;">
          </div>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="hero_slide2_img" name="hero_slide2_img" value="<?php echo esc_attr( mrm_get_option( 'hero_slide2_img' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="hero_slide2_img">Select Image</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_hero_slide2_img" style="width:240px; height:120px;">
              <?php if ( mrm_get_option( 'hero_slide2_img' ) ) : ?>
                <img src="<?php echo esc_url( mrm_get_option( 'hero_slide2_img' ) ); ?>" alt="Slide 2">
              <?php else : ?><span class="empty">No Image</span><?php endif; ?>
            </div>
          </div>
        </td>
      </tr>

      <!-- Slide 3 -->
      <tr>
        <th>Hero Slide 3 (Landscape)</th>
        <td>
          <div style="display:flex; gap:10px; margin-bottom:8px;">
            <input type="text" name="hero_slide3_title" placeholder="Slide Title (e.g. Khushiyan Har Pal)" value="<?php echo esc_attr( mrm_get_option( 'hero_slide3_title', 'Khushiyan Har Pal' ) ); ?>" class="mrm-input-text" style="width:50%;">
            <input type="text" name="hero_slide3_tag" placeholder="Slide Tag (e.g. Bridal Couture Atelier)" value="<?php echo esc_attr( mrm_get_option( 'hero_slide3_tag', 'Bridal Couture Atelier' ) ); ?>" class="mrm-input-text" style="width:50%;">
          </div>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="hero_slide3_img" name="hero_slide3_img" value="<?php echo esc_attr( mrm_get_option( 'hero_slide3_img' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="hero_slide3_img">Select Image</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_hero_slide3_img" style="width:240px; height:120px;">
              <?php if ( mrm_get_option( 'hero_slide3_img' ) ) : ?>
                <img src="<?php echo esc_url( mrm_get_option( 'hero_slide3_img' ) ); ?>" alt="Slide 3">
              <?php else : ?><span class="empty">No Image</span><?php endif; ?>
            </div>
          </div>
        </td>
      </tr>

      <!-- Slide 4 -->
      <tr>
        <th>Hero Slide 4 (Landscape)</th>
        <td>
          <div style="display:flex; gap:10px; margin-bottom:8px;">
            <input type="text" name="hero_slide4_title" placeholder="Slide Title (e.g. Atelier Masterpieces)" value="<?php echo esc_attr( mrm_get_option( 'hero_slide4_title', 'Atelier Masterpieces' ) ); ?>" class="mrm-input-text" style="width:50%;">
            <input type="text" name="hero_slide4_tag" placeholder="Slide Tag (e.g. Evening Glamour & Gowns)" value="<?php echo esc_attr( mrm_get_option( 'hero_slide4_tag', 'Evening Glamour & Gowns' ) ); ?>" class="mrm-input-text" style="width:50%;">
          </div>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="hero_slide4_img" name="hero_slide4_img" value="<?php echo esc_attr( mrm_get_option( 'hero_slide4_img' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="hero_slide4_img">Select Image</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_hero_slide4_img" style="width:240px; height:120px;">
              <?php if ( mrm_get_option( 'hero_slide4_img' ) ) : ?>
                <img src="<?php echo esc_url( mrm_get_option( 'hero_slide4_img' ) ); ?>" alt="Slide 4">
              <?php else : ?><span class="empty">No Image</span><?php endif; ?>
            </div>
          </div>
        </td>
      </tr>

      <!-- Smartphone Reel Video -->
      <tr>
        <th>Hero Phone Reel Video (MP4)</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="hero_phone_video" name="hero_phone_video" value="<?php echo esc_attr( mrm_get_option( 'hero_phone_video' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="hero_phone_video">Select Video</button>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <th>Hero Phone Poster Image</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="hero_phone_poster" name="hero_phone_poster" value="<?php echo esc_attr( mrm_get_option( 'hero_phone_poster' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="hero_phone_poster">Select Image</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_hero_phone_poster">
              <?php if ( mrm_get_option( 'hero_phone_poster' ) ) : ?>
                <img src="<?php echo esc_url( mrm_get_option( 'hero_phone_poster' ) ); ?>" alt="Poster Preview">
              <?php else : ?>
                <span class="empty">No Image</span>
              <?php endif; ?>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <!-- Section 4: Trust Highlights Bar -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-shield" style="color:var(--mrm-admin-crimson);"></span> Trust Highlights Bar (Section 4)</h2>
      <div class="mrm-card-subtitle">Manage the 4 trust pillars displayed directly beneath the hero banner.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Pillar 1: Handcrafted</th>
        <td>
          <input type="text" name="trust_title_1" value="<?php echo esc_attr( mrm_get_option( 'trust_title_1' ) ); ?>" class="mrm-input-text" style="margin-bottom:6px;">
          <input type="text" name="trust_desc_1" value="<?php echo esc_attr( mrm_get_option( 'trust_desc_1' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>Pillar 2: Worldwide Shipping</th>
        <td>
          <input type="text" name="trust_title_2" value="<?php echo esc_attr( mrm_get_option( 'trust_title_2' ) ); ?>" class="mrm-input-text" style="margin-bottom:6px;">
          <input type="text" name="trust_desc_2" value="<?php echo esc_attr( mrm_get_option( 'trust_desc_2' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>Pillar 3: Free Delivery</th>
        <td>
          <input type="text" name="trust_title_3" value="<?php echo esc_attr( mrm_get_option( 'trust_title_3' ) ); ?>" class="mrm-input-text" style="margin-bottom:6px;">
          <input type="text" name="trust_desc_3" value="<?php echo esc_attr( mrm_get_option( 'trust_desc_3' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>Pillar 4: Authentic Quality</th>
        <td>
          <input type="text" name="trust_title_4" value="<?php echo esc_attr( mrm_get_option( 'trust_title_4' ) ); ?>" class="mrm-input-text" style="margin-bottom:6px;">
          <input type="text" name="trust_desc_4" value="<?php echo esc_attr( mrm_get_option( 'trust_desc_4' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
    </table>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to update hero banner & trust highlights.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
