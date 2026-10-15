<?php
/**
 * Mansa Ram Mahajan & Co — Homepage Builder View
 * Section on/off toggles and layout control
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$page = 'mrm-homepage-builder';
?>

<div class="mrm-admin-header">
  <div class="mrm-admin-header-title">
    <div>
      <span class="mrm-badge">SECTION CONTROLLER</span>
      <h1>Homepage Builder & Section Manager</h1>
      <div class="mrm-admin-header-desc">
        Enable, disable, and manage individual storefront sections. Disabling a section will immediately hide it from the public homepage.
      </div>
    </div>
  </div>
  <div class="mrm-admin-header-actions">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="button mrm-btn-secondary">
      <span class="dashicons dashicons-visibility" style="vertical-align:text-bottom; margin-right:4px;"></span>
      Preview Homepage
    </a>
  </div>
</div>

<form method="post" action="" class="mrm-form">
  <?php wp_nonce_field( 'mrm_save_settings_nonce', 'mrm_nonce_field' ); ?>
  <input type="hidden" name="mrm_save_action" value="save_options">
  <input type="hidden" name="mrm_current_page" value="<?php echo esc_attr( $page ); ?>">

  <div class="mrm-card">
    <div class="mrm-card-header">
      <div>
        <h2 class="mrm-card-title"><span class="dashicons dashicons-slides" style="color:var(--mrm-admin-crimson);"></span> Homepage Section Visibility Toggles</h2>
        <div class="mrm-card-subtitle">Control the display of each section on the homepage without touching code.</div>
      </div>
    </div>

    <table class="mrm-form-table">
      <!-- Hero -->
      <tr>
        <th>
          Section 3: Hero Festive Banner
          <small>Main promotional hero header with luxury callouts, CTA buttons, and high-fashion video reel overlay.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_hero" value="0">
              <input type="checkbox" name="enable_sec_hero" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_hero' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Trust Highlights -->
      <tr>
        <th>
          Section 4: Trust Highlights Bar
          <small>Four luxury trust pillars: Handcrafted Heritage, Worldwide Shipping, Free Domestic Delivery, and 100% Authentic Quality.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_trust" value="0">
              <input type="checkbox" name="enable_sec_trust" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_trust' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Lookbook -->
      <tr>
        <th>
          Section 5: Lookbook & Social Carousel
          <small>Instagram feed showcase (@mansaram_official) with smooth horizontal auto-scrolling couture cards.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_lookbook" value="0">
              <input type="checkbox" name="enable_sec_lookbook" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_lookbook' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Wedding Collection -->
      <tr>
        <th>
          Section 6: Wedding Collection Grid
          <small>Showcases 4 premier bridal lehengas with ₹199 split payment badges, discount percentages, and quick add-to-cart.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_wedding" value="0">
              <input type="checkbox" name="enable_sec_wedding" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_wedding' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Lehenga Collection -->
      <tr>
        <th>
          Section 7: Lehenga Collection Grid
          <small>Handpicked partywear and sangeet designer lehenga ensembles with interactive image hover transitions.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_lehenga" value="0">
              <input type="checkbox" name="enable_sec_lehenga" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_lehenga' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Arched Categories -->
      <tr>
        <th>
          Section 8: Arched Category Showcase
          <small>Signature Odhni-style arched couture category cards: Sarees, Lehengas, Suits & Shararas, Dresses & Gowns.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_categories" value="0">
              <input type="checkbox" name="enable_sec_categories" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_categories' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Saree Collection -->
      <tr>
        <th>
          Section 9: Saree Collection Grid
          <small>Six yards of pure elegance: Banarasi, Kanjeevaram, Organza, and Georgette ready-to-wear sarees.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_saree" value="0">
              <input type="checkbox" name="enable_sec_saree" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_saree' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Editorial Campaign -->
      <tr>
        <th>
          Section 10: Editorial Campaign Banner
          <small>"Khushiyan Har Pal — Bridal Splendour" story layout with curated photography and atelier artisan callouts.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_campaign" value="0">
              <input type="checkbox" name="enable_sec_campaign" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_campaign' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Cinematic Video -->
      <tr>
        <th>
          Section 11: Cinematic Video Feature
          <small>Full-width or framed atelier craftsmanship video banner with custom MP4 playback, controls, and sound toggle.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_video" value="0">
              <input type="checkbox" name="enable_sec_video" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_video' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Concierge & Appointments -->
      <tr>
        <th>
          Section 12: VIP Concierge Cards
          <small>Personal Shopper on WhatsApp and 1-on-1 Bridal Video Consultation scheduling appointment links.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_support" value="0">
              <input type="checkbox" name="enable_sec_support" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_support' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Store Locations -->
      <tr>
        <th>
          Section 13: Store Locations (Delhi NCR)
          <small>Interactive boutique tabs for Pitampura, Karol Bagh, Chandni Chowk, South Ex, Kohat, and Rajouri Garden.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_stores" value="0">
              <input type="checkbox" name="enable_sec_stores" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_stores' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Reviews -->
      <tr>
        <th>
          Section 14: Testimonials & Reviews
          <small>Verified bride testimonials, star ratings, and real customer wedding feedback quotes.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_reviews" value="0">
              <input type="checkbox" name="enable_sec_reviews" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_reviews' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>

      <!-- Statistics -->
      <tr>
        <th>
          Section 15: Heritage Statistics
          <small>4 key brand milestones: 25+ Years Legacy, 100k+ Brides, 50k+ Custom Fits, 6 Delhi Flagships.</small>
        </th>
        <td>
          <label class="mrm-toggle-wrap">
            <span class="mrm-toggle">
              <input type="hidden" name="enable_sec_stats" value="0">
              <input type="checkbox" name="enable_sec_stats" value="1" <?php checked( '1', mrm_get_option( 'enable_sec_stats' ) ); ?>>
              <span class="mrm-slider"></span>
            </span>
            <span class="mrm-toggle-label">Enable Section</span>
          </label>
        </td>
      </tr>
    </table>
  </div>

  <div class="mrm-sticky-bar">
    <span><?php esc_html_e( 'Click "Save Changes" to apply updated section visibility to your storefront.', 'mansa-ram-mahajan' ); ?></span>
    <button type="submit" class="button button-primary mrm-btn-primary"><?php esc_html_e( 'Save Changes', 'mansa-ram-mahajan' ); ?></button>
  </div>
</form>
