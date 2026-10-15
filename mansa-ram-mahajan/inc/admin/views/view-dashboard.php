<?php
/**
 * Mansa Ram Mahajan & Co — Admin Dashboard View
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$theme = wp_get_theme();
$product_count = wp_count_posts( 'product' )->publish ?? 0;
$order_count = 0;
if ( function_exists( 'wc_get_orders' ) ) {
    $order_count = count( wc_get_orders( array( 'limit' => -1, 'return' => 'ids' ) ) );
}
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">HAUTE COUTURE ADMIN</span>
      <h1>Mansa Ram Mahajan & Co — Website Control Hub</h1>
      <div class="mrm-admin-header-desc">
        Complete executive management system for storefront layout, split payment deposits, hero banners, store boutiques, and brand aesthetics.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="button mrm-btn-secondary">
      <span class="dashicons dashicons-external" style="vertical-align:text-bottom; margin-right:4px;"></span>
      View Live Website
    </a>
  </div>
</div>

<!-- WooCommerce Quick Stats -->
<div class="mrm-card">
  <div class="mrm-card-header">
    <div>
      <h2 class="mrm-card-title"><span class="dashicons dashicons-chart-bar" style="color:var(--mrm-admin-crimson);"></span> Store Overview & Commerce Metrics</h2>
      <div class="mrm-card-subtitle">Real-time status synced with native WooCommerce catalogs, orders, and customer databases.</div>
    </div>
    <div>
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=wc-admin' ) ); ?>" class="button mrm-btn-secondary">WooCommerce Analytics &rarr;</a>
    </div>
  </div>

  <div class="mrm-grid-3">
    <div class="mrm-stat-box">
      <div class="mrm-stat-icon"><span class="dashicons dashicons-products"></span></div>
      <div class="mrm-stat-info">
        <h3>Catalog Products</h3>
        <p class="mrm-val"><?php echo esc_html( $product_count ); ?> Products</p>
        <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=product' ) ); ?>">Manage Products &rarr;</a>
      </div>
    </div>

    <div class="mrm-stat-box">
      <div class="mrm-stat-icon" style="background:#2E7D32;"><span class="dashicons dashicons-cart"></span></div>
      <div class="mrm-stat-info">
        <h3>Store Orders</h3>
        <p class="mrm-val"><?php echo esc_html( $order_count ); ?> Orders</p>
        <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=shop_order' ) ); ?>">View Orders &rarr;</a>
      </div>
    </div>

    <div class="mrm-stat-box">
      <div class="mrm-stat-icon" style="background:#D4AF37;"><span class="dashicons dashicons-location"></span></div>
      <div class="mrm-stat-info">
        <h3>NCR Boutiques</h3>
        <p class="mrm-val">6 Flagship Stores</p>
        <a href="<?php echo esc_url( admin_url( 'admin.php?page=mrm-store-locations' ) ); ?>">Edit Locations &rarr;</a>
      </div>
    </div>
  </div>
</div>

<!-- Quick Navigation Cards to Key Panels -->
<div class="mrm-grid-2">
  <div class="mrm-card">
    <h3 class="mrm-card-title"><span class="dashicons dashicons-layout" style="color:var(--mrm-admin-crimson);"></span> Homepage & Sections</h3>
    <p style="color:#666; font-size:13px; line-height:1.5;">Configure hero banners, video overlays, festive sale highlights, wedding showcases, and product category sections without touching code.</p>
    <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:16px;">
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=mrm-homepage-builder' ) ); ?>" class="button mrm-btn-primary">Homepage Builder</a>
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=mrm-promotional-banners' ) ); ?>" class="button mrm-btn-secondary">Hero Banner</a>
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=mrm-homepage-sections' ) ); ?>" class="button mrm-btn-secondary">Collections</a>
    </div>
  </div>

  <div class="mrm-card">
    <h3 class="mrm-card-title"><span class="dashicons dashicons-money-alt" style="color:var(--mrm-admin-crimson);"></span> Buy Now Split Payment</h3>
    <p style="color:#666; font-size:13px; line-height:1.5;">Manage the Odhni-inspired 2-column modal: ₹199 token deposit, ₹299 part-payment, and 100% full payment thresholds and descriptions.</p>
    <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:16px;">
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=mrm-payment-popup' ) ); ?>" class="button mrm-btn-primary">Configure Payment Modal</a>
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=wc-settings&tab=checkout' ) ); ?>" class="button mrm-btn-secondary">WooCommerce Gateways</a>
    </div>
  </div>

  <div class="mrm-card">
    <h3 class="mrm-card-title"><span class="dashicons dashicons-art" style="color:var(--mrm-admin-crimson);"></span> Brand Palette & Header</h3>
    <p style="color:#666; font-size:13px; line-height:1.5;">Customize primary crimson, royal gold, background hues, announcement bar rotating offers, concierge WhatsApp, and footer legal links.</p>
    <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:16px;">
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=mrm-store-settings' ) ); ?>" class="button mrm-btn-primary">Color Palette</a>
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=mrm-header-navigation' ) ); ?>" class="button mrm-btn-secondary">Header & Nav</a>
    </div>
  </div>

  <div class="mrm-card">
    <h3 class="mrm-card-title"><span class="dashicons dashicons-admin-tools" style="color:var(--mrm-admin-crimson);"></span> Backup & Diagnostics</h3>
    <p style="color:#666; font-size:13px; line-height:1.5;">Export your complete store customization configuration to JSON, restore factory defaults, or inspect server PHP & WooCommerce status.</p>
    <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:16px;">
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=mrm-import-export' ) ); ?>" class="button mrm-btn-primary">Export / Import</a>
      <a href="<?php echo esc_url( admin_url( 'admin.php?page=mrm-system-status' ) ); ?>" class="button mrm-btn-secondary">System Status</a>
    </div>
  </div>
</div>
