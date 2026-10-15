<?php
/**
 * Mansa Ram Mahajan & Co — Testimonials & Reviews Admin View
 * Editorial Client Reviews & Verified Patron Feedback
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-testimonials';
$raw_reviews = mrm_get_option( 'customer_reviews' );
$reviews = is_array( $raw_reviews ) ? $raw_reviews : json_decode( $raw_reviews, true );
if ( ! is_array( $reviews ) ) {
    $reviews = array();
}
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">PATRON PRAISE</span>
      <h1>Testimonials & Verified Bride Reviews</h1>
      <div class="mrm-admin-header-desc">
        Manage customer quotes, star ratings, and bridal styling stories displayed in the homepage testimonial carousel.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <button type="button" class="button mrm-btn-secondary" id="mrm_add_review_row">
      <span class="dashicons dashicons-plus-alt" style="vertical-align:text-bottom; margin-right:4px;"></span>
      Add Review
    </button>
    <a href="<?php echo esc_url( admin_url( 'edit-comments.php?comment_type=review' ) ); ?>" class="button mrm-btn-secondary">
      WooCommerce Product Reviews
    </a>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">
  <input type="hidden" id="customer_reviews_json" name="customer_reviews" value="<?php echo esc_attr( wp_json_encode( $reviews ) ); ?>">

  <div class="mrm-card">
    <div class="mrm-card-header">
      <h2 class="mrm-card-title"><span class="dashicons dashicons-testimonial" style="color:var(--mrm-admin-crimson);"></span> Editorial Testimonials (Section 14)</h2>
      <div class="mrm-card-subtitle">Editorial bridal testimonials featured on the homepage. Verified product reviews are managed natively via WooCommerce comments.</div>
    </div>

    <div style="overflow-x:auto;">
      <table class="mrm-repeater-table" id="mrm_reviews_table">
        <thead>
          <tr>
            <th style="width:140px;">Patron Name</th>
            <th style="width:160px;">Verification / City</th>
            <th style="width:180px;">Purchased Ensemble</th>
            <th style="width:80px;">Rating</th>
            <th>Review Quote</th>
            <th style="width:80px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ( $reviews as $rev ) : ?>
            <tr class="mrm-review-row mrm-repeater-row">
              <td>
                <input type="text" class="mrm-input-text review-name" value="<?php echo esc_attr( $rev['name'] ?? '' ); ?>" style="width:100%;">
              </td>
              <td>
                <input type="text" class="mrm-input-text review-city" value="<?php echo esc_attr( $rev['city'] ?? '' ); ?>" style="width:100%;">
              </td>
              <td>
                <input type="text" class="mrm-input-text review-tag" value="<?php echo esc_attr( $rev['tag'] ?? '' ); ?>" style="width:100%;">
              </td>
              <td>
                <select class="mrm-input-select review-rating" style="width:100%;">
                  <option value="5" <?php selected( '5', $rev['rating'] ?? 5 ); ?>>5 ★</option>
                  <option value="4" <?php selected( '4', $rev['rating'] ?? 5 ); ?>>4 ★</option>
                  <option value="3" <?php selected( '3', $rev['rating'] ?? 5 ); ?>>3 ★</option>
                </select>
              </td>
              <td>
                <textarea class="mrm-input-textarea review-quote" rows="2" style="width:100%; min-height:60px;"><?php echo esc_textarea( $rev['quote'] ?? '' ); ?></textarea>
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
    <span><?php esc_html_e( 'Click "Save Changes" to update customer testimonials.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
