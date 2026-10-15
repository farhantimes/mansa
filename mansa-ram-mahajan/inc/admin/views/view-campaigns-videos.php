<?php
/**
 * Mansa Ram Mahajan & Co — Campaigns & Videos Admin View
 * Editorial Campaign & Cinematic Atelier Video
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-campaigns-videos';
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">HAUTE COUTURE EDITORIAL</span>
      <h1>Campaigns & Video Storytelling</h1>
      <div class="mrm-admin-header-desc">
        Configure the high-fashion editorial story layout ("Khushiyan Har Pal") and the cinematic atelier video banner with custom MP4 playback.
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

  <!-- Section 10: Editorial Campaign -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-format-gallery" style="color:var(--mrm-admin-crimson);"></span> Editorial Campaign: "Khushiyan Har Pal" (Section 10)</h2>
      <div class="mrm-card-subtitle">Asymmetrical luxury bridal layout with heritage craft highlights.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Campaign Pre-title</th>
        <td><input type="text" name="campaign_subtitle" value="<?php echo esc_attr( mrm_get_option( 'campaign_subtitle' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>Campaign Headline</th>
        <td><input type="text" name="campaign_title" value="<?php echo esc_attr( mrm_get_option( 'campaign_title' ) ); ?>" class="mrm-input-text" style="font-weight:600; font-size:15px;"></td>
      </tr>
      <tr>
        <th>Campaign Story Body</th>
        <td><textarea name="campaign_body" class="mrm-input-textarea" rows="4"><?php echo esc_textarea( mrm_get_option( 'campaign_body' ) ); ?></textarea></td>
      </tr>
      <tr>
        <th>Atelier Feature 1</th>
        <td><input type="text" name="campaign_feat_1" value="<?php echo esc_attr( mrm_get_option( 'campaign_feat_1' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>Atelier Feature 2</th>
        <td><input type="text" name="campaign_feat_2" value="<?php echo esc_attr( mrm_get_option( 'campaign_feat_2' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>Campaign CTA Button</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="campaign_btn_text" placeholder="Button Text" value="<?php echo esc_attr( mrm_get_option( 'campaign_btn_text' ) ); ?>" class="mrm-input-text" style="width:35%;">
            <input type="text" name="campaign_btn_url" placeholder="Destination URL" value="<?php echo esc_attr( mrm_get_option( 'campaign_btn_url' ) ); ?>" class="mrm-input-text" style="width:65%;">
          </div>
        </td>
      </tr>
      <tr>
        <th>Main Campaign Image</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="campaign_img_main" name="campaign_img_main" value="<?php echo esc_attr( mrm_get_option( 'campaign_img_main' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="campaign_img_main">Select from Media</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_campaign_img_main" style="width:200px; height:120px;">
              <?php if ( mrm_get_option( 'campaign_img_main' ) ) : ?>
                <img src="<?php echo esc_url( mrm_get_option( 'campaign_img_main' ) ); ?>" alt="Main Campaign">
              <?php else : ?>
                <span class="empty">No Image</span>
              <?php endif; ?>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>Secondary Campaign Image 1</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="campaign_img_sub1" name="campaign_img_sub1" value="<?php echo esc_attr( mrm_get_option( 'campaign_img_sub1' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="campaign_img_sub1">Select from Media</button>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>Secondary Campaign Image 2</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="campaign_img_sub2" name="campaign_img_sub2" value="<?php echo esc_attr( mrm_get_option( 'campaign_img_sub2' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="campaign_img_sub2">Select from Media</button>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <!-- Section 11: Atelier Video Collection Slider (3 Client Videos) -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-video-alt3" style="color:var(--mrm-admin-crimson);"></span> Atelier Video Collection Slider — 3 Client Videos (Section 11)</h2>
      <div class="mrm-card-subtitle">Atmospheric 3-video reels collection slider showcasing haute couture in motion with play/pause and sound toggles.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Video Sub-badge</th>
        <td><input type="text" name="video_tag" value="<?php echo esc_attr( mrm_get_option( 'video_tag', 'HAUTE COUTURE IN MOTION' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>Video Section Title</th>
        <td><input type="text" name="video_title" value="<?php echo esc_attr( mrm_get_option( 'video_title', 'The Poetry of Indian Couturiers' ) ); ?>" class="mrm-input-text" style="font-weight:600; font-size:15px;"></td>
      </tr>
      <tr>
        <th>Video Subtitle</th>
        <td><textarea name="video_subtitle" class="mrm-input-textarea" rows="2"><?php echo esc_textarea( mrm_get_option( 'video_subtitle', 'Immerse in our 3 masterwork collections filmed live inside our historic Delhi ateliers and runway showcases.' ) ); ?></textarea></td>
      </tr>

      <!-- Video Reel 1 -->
      <tr>
        <th colspan="2" style="background:#FAF8F5; padding:10px 14px; font-weight:700; color:#800020; border-top:1px solid #E5E5E5; border-bottom:1px solid #E5E5E5;">
          VIDEO REEL 01 (Runway Walk)
        </th>
      </tr>
      <tr>
        <th>Video 1 MP4 File</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="video1_file" name="video1_file" value="<?php echo esc_attr( mrm_get_option( 'video1_file' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="video1_file">Select Video</button>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>Video 1 Poster Image</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="video1_poster" name="video1_poster" value="<?php echo esc_attr( mrm_get_option( 'video1_poster' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="video1_poster">Select Image</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_video1_poster" style="width:140px; height:180px;">
              <?php if ( mrm_get_option( 'video1_poster' ) ) : ?><img src="<?php echo esc_url( mrm_get_option( 'video1_poster' ) ); ?>" alt="Video 1 Poster"><?php else : ?><span class="empty">No Image</span><?php endif; ?>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>Video 1 Badge & Title</th>
        <td>
          <div style="display:flex; gap:10px; margin-bottom:8px;">
            <input type="text" name="video1_badge" placeholder="Badge (e.g. Reel 01 • Runway Walk)" value="<?php echo esc_attr( mrm_get_option( 'video1_badge', 'Reel 01 • Runway Walk' ) ); ?>" class="mrm-input-text" style="width:40%;">
            <input type="text" name="video1_title" placeholder="Title (e.g. Royal Crimson Bridal Movement)" value="<?php echo esc_attr( mrm_get_option( 'video1_title', 'Royal Crimson Bridal Movement' ) ); ?>" class="mrm-input-text" style="width:60%; font-weight:600;">
          </div>
          <input type="text" name="video1_desc" placeholder="Short Description" value="<?php echo esc_attr( mrm_get_option( 'video1_desc', 'Over 350+ hours of zardozi bullion craftsmanship showcased in motion.' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
      <tr>
        <th>Video 1 CTA Button</th>
        <td>
          <div style="display:flex; gap:10px;">
            <input type="text" name="video1_btn_text" placeholder="Button Text" value="<?php echo esc_attr( mrm_get_option( 'video1_btn_text', 'SHOP BRIDAL' ) ); ?>" class="mrm-input-text" style="width:35%;">
            <input type="text" name="video1_btn_url" placeholder="Destination URL" value="<?php echo esc_attr( mrm_get_option( 'video1_btn_url' ) ); ?>" class="mrm-input-text" style="width:65%;">
          </div>
        </td>
      </tr>

      <!-- Video Reel 2 -->
      <tr>
        <th colspan="2" style="background:#FAF8F5; padding:10px 14px; font-weight:700; color:#800020; border-top:1px solid #E5E5E5; border-bottom:1px solid #E5E5E5;">
          VIDEO REEL 02 (Sangeet Flare)
        </th>
      </tr>
      <tr>
        <th>Video 2 MP4 File</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="video2_file" name="video2_file" value="<?php echo esc_attr( mrm_get_option( 'video2_file' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="video2_file">Select Video</button>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>Video 2 Poster Image</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="video2_poster" name="video2_poster" value="<?php echo esc_attr( mrm_get_option( 'video2_poster' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="video2_poster">Select Image</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_video2_poster" style="width:140px; height:180px;">
              <?php if ( mrm_get_option( 'video2_poster' ) ) : ?><img src="<?php echo esc_url( mrm_get_option( 'video2_poster' ) ); ?>" alt="Video 2 Poster"><?php else : ?><span class="empty">No Image</span><?php endif; ?>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>Video 2 Badge & Title</th>
        <td>
          <div style="display:flex; gap:10px; margin-bottom:8px;">
            <input type="text" name="video2_badge" placeholder="Badge (e.g. Reel 02 • Sangeet Flare)" value="<?php echo esc_attr( mrm_get_option( 'video2_badge', 'Reel 02 • Sangeet Flare' ) ); ?>" class="mrm-input-text" style="width:40%;">
            <input type="text" name="video2_title" placeholder="Title (e.g. Celebratory Gold Can-Can Flare)" value="<?php echo esc_attr( mrm_get_option( 'video2_title', 'Celebratory Gold Can-Can Flare' ) ); ?>" class="mrm-input-text" style="width:60%; font-weight:600;">
          </div>
          <input type="text" name="video2_desc" placeholder="Short Description" value="<?php echo esc_attr( mrm_get_option( 'video2_desc', 'Voluminous twirls and celestial raw silk embroidery for celebratory nights.' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
      <tr>
        <th>Video 2 CTA Button</th>
        <td>
          <div style="display:flex; gap:10px;">
            <input type="text" name="video2_btn_text" placeholder="Button Text" value="<?php echo esc_attr( mrm_get_option( 'video2_btn_text', 'SHOP LEHENGAS' ) ); ?>" class="mrm-input-text" style="width:35%;">
            <input type="text" name="video2_btn_url" placeholder="Destination URL" value="<?php echo esc_attr( mrm_get_option( 'video2_btn_url' ) ); ?>" class="mrm-input-text" style="width:65%;">
          </div>
        </td>
      </tr>

      <!-- Video Reel 3 -->
      <tr>
        <th colspan="2" style="background:#FAF8F5; padding:10px 14px; font-weight:700; color:#800020; border-top:1px solid #E5E5E5; border-bottom:1px solid #E5E5E5;">
          VIDEO REEL 03 (Atelier Fit)
        </th>
      </tr>
      <tr>
        <th>Video 3 MP4 File</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="video3_file" name="video3_file" value="<?php echo esc_attr( mrm_get_option( 'video3_file' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="video3_file">Select Video</button>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>Video 3 Poster Image</th>
        <td>
          <div class="mrm-media-field">
            <div class="mrm-media-row">
              <input type="text" id="video3_poster" name="video3_poster" value="<?php echo esc_attr( mrm_get_option( 'video3_poster' ) ); ?>" class="mrm-input-text">
              <button type="button" class="button mrm-upload-btn" data-target="video3_poster">Select Image</button>
            </div>
            <div class="mrm-media-preview-box" id="preview_video3_poster" style="width:140px; height:180px;">
              <?php if ( mrm_get_option( 'video3_poster' ) ) : ?><img src="<?php echo esc_url( mrm_get_option( 'video3_poster' ) ); ?>" alt="Video 3 Poster"><?php else : ?><span class="empty">No Image</span><?php endif; ?>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>Video 3 Badge & Title</th>
        <td>
          <div style="display:flex; gap:10px; margin-bottom:8px;">
            <input type="text" name="video3_badge" placeholder="Badge (e.g. Reel 03 • Atelier Fit)" value="<?php echo esc_attr( mrm_get_option( 'video3_badge', 'Reel 03 • Atelier Fit' ) ); ?>" class="mrm-input-text" style="width:40%;">
            <input type="text" name="video3_title" placeholder="Title (e.g. Artisanal Silk Draping & Silhouette)" value="<?php echo esc_attr( mrm_get_option( 'video3_title', 'Artisanal Silk Draping & Silhouette' ) ); ?>" class="mrm-input-text" style="width:60%; font-weight:600;">
          </div>
          <input type="text" name="video3_desc" placeholder="Short Description" value="<?php echo esc_attr( mrm_get_option( 'video3_desc', 'Fluid pure georgette cowl drape with kundan-studded bustier bodice.' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
      <tr>
        <th>Video 3 CTA Button</th>
        <td>
          <div style="display:flex; gap:10px;">
            <input type="text" name="video3_btn_text" placeholder="Button Text" value="<?php echo esc_attr( mrm_get_option( 'video3_btn_text', 'SHOP COUTURE' ) ); ?>" class="mrm-input-text" style="width:35%;">
            <input type="text" name="video3_btn_url" placeholder="Destination URL" value="<?php echo esc_attr( mrm_get_option( 'video3_btn_url' ) ); ?>" class="mrm-input-text" style="width:65%;">
          </div>
        </td>
      </tr>
    </table>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to update campaign & video settings.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
