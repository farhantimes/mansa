<?php
/**
 * Mansa Ram Mahajan & Co — Import & Export Admin View
 * Complete JSON backup and restore system
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-import-export';
$current_options = get_option( MRM_Options::OPTION_KEY, MRM_Options::get_defaults() );
$json_export = wp_json_encode( $current_options, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES );
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">DATA GOVERNANCE</span>
      <h1>Configuration Backup, Import & Factory Reset</h1>
      <div class="mrm-admin-header-desc">
        Export your complete storefront settings to JSON, restore previous backups across staging and production, or revert to factory defaults.
      </div>
    </div>
  </div>
</div>

<div class="mrm-grid-2">
  <!-- Export Section -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-download" style="color:var(--mrm-admin-crimson);"></span> Export Active Settings (JSON)</h2>
      <div class="mrm-card-subtitle">Copy this JSON payload to backup your custom banners, store locations, colors, and payment rules.</div>
    </div>

    <p style="font-size:13px; color:#555;">Copy the JSON snippet below to archive your settings before major campaign updates.</p>
    <textarea class="mrm-input-textarea" rows="14" readonly style="font-family:monospace; font-size:12px; background:#F8F8F8;" onclick="this.select();"><?php echo esc_textarea( $json_export ); ?></textarea>
  </div>

  <!-- Import Section -->
  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-upload" style="color:var(--mrm-admin-crimson);"></span> Import Configuration (JSON)</h2>
      <div class="mrm-card-subtitle">Paste a valid JSON export to overwrite current settings with your imported setup.</div>
    </div>

    <form method="post" action="">
      <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
      <input type="hidden" name="mrm_save_action" value="import_json">
      <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">

      <p style="font-size:13px; color:#555;">Paste JSON configuration here:</p>
      <textarea name="import_json_data" class="mrm-input-textarea" rows="10" placeholder="{ &quot;brand_name&quot;: &quot;...&quot; }" style="font-family:monospace; font-size:12px;"></textarea>
      
      <div style="margin-top:14px;">
        <button type="submit" class="button button-primary mrm-btn-primary" onclick="return confirm('Are you sure you want to import this configuration? Current settings will be overwritten.');">
          Import & Apply Settings
        </button>
      </div>
    </form>

    <hr style="border:0; border-top:1px solid #E2DDD5; margin:24px 0;">

    <!-- Factory Reset -->
    <div class="mrm-card-header" style="border-bottom:none; padding-bottom:0; margin-bottom:8px;">
      <h3 class="mrm-card-title" style="color:#D32F2F;"><span class="dashicons dashicons-trash"></span> Restore Factory Defaults</h3>
    </div>
    <p style="font-size:13px; color:#666;">Revert all banners, store locations, reviews, colors, and sections back to the approved Odhni-inspired default theme styling.</p>
    <form method="post" action="">
      <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
      <input type="hidden" name="mrm_save_action" value="reset_defaults">
      <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">
      <button type="submit" class="button mrm-btn-danger" onclick="return confirm('WARNING: Are you sure you want to reset all MRM settings to factory defaults?');">
        Restore All Factory Defaults
      </button>
    </form>
  </div>
</div>
