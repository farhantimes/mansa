<?php
/**
 * Mansa Ram Mahajan & Co — Homepage Sections Admin View
 * Wedding, Lehenga, Saree Collections, Concierge Cards & Statistics
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-homepage-sections';
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">COLLECTION GRIDS</span>
      <h1>Homepage Product Collections & Sections</h1>
      <div class="mrm-admin-header-desc">
        Configure titles, subtitles, call-to-actions, concierge booking cards, and milestone statistics for the homepage.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=product' ) ); ?>" class="button mrm-btn-secondary">WooCommerce Products</a>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">

  <!-- Section 6: Wedding Collection -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-heart" style="color:var(--mrm-admin-crimson);"></span> Wedding Collection (Section 6)</h2>
      <div class="mrm-card-subtitle">Opulent bridal lehengas with token deposit badges and instant cart actions.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Section Title</th>
        <td><input type="text" name="wedding_title" value="<?php echo esc_attr( mrm_get_option( 'wedding_title' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>Section Subtitle</th>
        <td><input type="text" name="wedding_subtitle" value="<?php echo esc_attr( mrm_get_option( 'wedding_subtitle' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>CTA Button</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="wedding_btn_text" placeholder="Button Text" value="<?php echo esc_attr( mrm_get_option( 'wedding_btn_text' ) ); ?>" class="mrm-input-text" style="width:35%;">
            <input type="text" name="wedding_btn_url" placeholder="Destination URL" value="<?php echo esc_attr( mrm_get_option( 'wedding_btn_url' ) ); ?>" class="mrm-input-text" style="width:65%;">
          </div>
        </td>
      </tr>
    </table>
  </div>

  <!-- Section 7: Lehenga Collection -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-tag" style="color:var(--mrm-admin-crimson);"></span> Lehenga Collection (Section 7)</h2>
      <div class="mrm-card-subtitle">Hand-embroidered bridal and celebratory flare lehengas.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Section Title</th>
        <td><input type="text" name="lehenga_title" value="<?php echo esc_attr( mrm_get_option( 'lehenga_title' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>Section Subtitle</th>
        <td><input type="text" name="lehenga_subtitle" value="<?php echo esc_attr( mrm_get_option( 'lehenga_subtitle' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>CTA Button</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="lehenga_btn_text" placeholder="Button Text" value="<?php echo esc_attr( mrm_get_option( 'lehenga_btn_text' ) ); ?>" class="mrm-input-text" style="width:35%;">
            <input type="text" name="lehenga_btn_url" placeholder="Destination URL" value="<?php echo esc_attr( mrm_get_option( 'lehenga_btn_url' ) ); ?>" class="mrm-input-text" style="width:65%;">
          </div>
        </td>
      </tr>
    </table>
  </div>

  <!-- Section 9: Saree Collection -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-images-alt2" style="color:var(--mrm-admin-crimson);"></span> Saree Collection (Section 9)</h2>
      <div class="mrm-card-subtitle">Timeless banarasi, organza, and embroidered georgette sarees.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Section Title</th>
        <td><input type="text" name="saree_title" value="<?php echo esc_attr( mrm_get_option( 'saree_title' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>Section Subtitle</th>
        <td><input type="text" name="saree_subtitle" value="<?php echo esc_attr( mrm_get_option( 'saree_subtitle' ) ); ?>" class="mrm-input-text"></td>
      </tr>
      <tr>
        <th>CTA Button</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="saree_btn_text" placeholder="Button Text" value="<?php echo esc_attr( mrm_get_option( 'saree_btn_text' ) ); ?>" class="mrm-input-text" style="width:35%;">
            <input type="text" name="saree_btn_url" placeholder="Destination URL" value="<?php echo esc_attr( mrm_get_option( 'saree_btn_url' ) ); ?>" class="mrm-input-text" style="width:65%;">
          </div>
        </td>
      </tr>
    </table>
  </div>

  <!-- Section 12: Concierge & Styling -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-phone" style="color:var(--mrm-admin-crimson);"></span> Concierge & Styling Support (Section 12)</h2>
      <div class="mrm-card-subtitle">VIP WhatsApp Personal Shopper and Bridal Video Consultation cards.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Card 1: WhatsApp Shopper</th>
        <td>
          <input type="text" name="support_card1_title" value="<?php echo esc_attr( mrm_get_option( 'support_card1_title' ) ); ?>" class="mrm-input-text" style="margin-bottom:6px;">
          <textarea name="support_card1_desc" class="mrm-input-textarea" rows="2" style="margin-bottom:6px;"><?php echo esc_textarea( mrm_get_option( 'support_card1_desc' ) ); ?></textarea>
          <input type="text" name="support_card1_btn" value="<?php echo esc_attr( mrm_get_option( 'support_card1_btn' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>

      <tr>
        <th>Card 2: Video Consultation</th>
        <td>
          <input type="text" name="support_card2_title" value="<?php echo esc_attr( mrm_get_option( 'support_card2_title' ) ); ?>" class="mrm-input-text" style="margin-bottom:6px;">
          <textarea name="support_card2_desc" class="mrm-input-textarea" rows="2" style="margin-bottom:6px;"><?php echo esc_textarea( mrm_get_option( 'support_card2_desc' ) ); ?></textarea>
          <input type="text" name="support_card2_btn" value="<?php echo esc_attr( mrm_get_option( 'support_card2_btn' ) ); ?>" class="mrm-input-text">
        </td>
      </tr>
    </table>
  </div>

  <!-- Section 15: Heritage Statistics -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-awards" style="color:var(--mrm-admin-crimson);"></span> Heritage Statistics (Section 15)</h2>
      <div class="mrm-card-subtitle">Key brand milestones displayed in the dark gold-accented band.</div>
    </div>

    <table class="mrm-form-table">
      <tr>
        <th>Stat 1: Legacy Years</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="stat_num_1" value="<?php echo esc_attr( mrm_get_option( 'stat_num_1' ) ); ?>" class="mrm-input-text" style="width:25%;">
            <input type="text" name="stat_lbl_1" value="<?php echo esc_attr( mrm_get_option( 'stat_lbl_1' ) ); ?>" class="mrm-input-text" style="width:75%;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Stat 2: Happy Brides</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="stat_num_2" value="<?php echo esc_attr( mrm_get_option( 'stat_num_2' ) ); ?>" class="mrm-input-text" style="width:25%;">
            <input type="text" name="stat_lbl_2" value="<?php echo esc_attr( mrm_get_option( 'stat_lbl_2' ) ); ?>" class="mrm-input-text" style="width:75%;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Stat 3: Custom Fits Delivered</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="stat_num_3" value="<?php echo esc_attr( mrm_get_option( 'stat_num_3' ) ); ?>" class="mrm-input-text" style="width:25%;">
            <input type="text" name="stat_lbl_3" value="<?php echo esc_attr( mrm_get_option( 'stat_lbl_3' ) ); ?>" class="mrm-input-text" style="width:75%;">
          </div>
        </td>
      </tr>

      <tr>
        <th>Stat 4: Flagship Boutiques</th>
        <td>
          <div style="display:flex; gap:12px; max-width:680px;">
            <input type="text" name="stat_num_4" value="<?php echo esc_attr( mrm_get_option( 'stat_num_4' ) ); ?>" class="mrm-input-text" style="width:25%;">
            <input type="text" name="stat_lbl_4" value="<?php echo esc_attr( mrm_get_option( 'stat_lbl_4' ) ); ?>" class="mrm-input-text" style="width:75%;">
          </div>
        </td>
      </tr>
    </table>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to apply updated collection settings.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
