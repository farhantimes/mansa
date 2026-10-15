<?php
/**
 * Mansa Ram Mahajan & Co WooCommerce Single Product Template
 *
 * Matching Reference Screenshot 2 in exact visual hierarchy, proportions, and interactive details
 *
 * @package Mansa_Ram_Mahajan
 */

get_header();

$theme_img = MRM_THEME_URI . '/assets/images/';
$theme_vid = MRM_THEME_URI . '/assets/video/';

// Dynamic Delivery Date Computation
$current_time = current_time( 'timestamp' );
$date_purchased = date( 'M d', $current_time );
$date_proc_start = date( 'M d', strtotime( '+1 day', $current_time ) );
$date_proc_end = date( 'd', strtotime( '+3 days', $current_time ) );
$date_deliv_start = date( 'M d', strtotime( '+5 days', $current_time ) );
$date_deliv_end = date( 'd', strtotime( '+9 days', $current_time ) );
?>

<div class="mrm-product-detail-page">
  <div class="mrm-container">
    
    <!-- Breadcrumbs matching Screenshot 2 -->
    <nav class="mrm-breadcrumbs" aria-label="Breadcrumbs">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'mansa-ram-mahajan' ); ?></a>
      <span class="mrm-breadcrumb-sep">/</span>
      <span class="mrm-breadcrumb-current"><?php esc_html_e( 'Glamorous Crimson Red Embellished Draped', 'mansa-ram-mahajan' ); ?></span>
    </nav>

    <!-- Main Product Two-Column Layout -->
    <div class="mrm-product-main-grid">
      
      <!-- ===================================================================
           LEFT COLUMN: LARGE PRODUCT IMAGE GALLERY & VIDEO
           =================================================================== -->
      <div class="mrm-gallery-column">
        <div class="mrm-gallery-wrapper">
          
          <!-- Main Large Image Container -->
          <div class="mrm-main-image-container" id="mrmMainImageContainer">
            <img src="<?php echo esc_url( $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg' ); ?>" alt="Glamorous Crimson Red Embellished Draped Saree Gown" id="mrmActiveProductImage" class="mrm-active-img" width="896" height="1200">
            
            <!-- Video Player in Gallery (Hidden by default, shown when video thumb clicked) -->
            <div class="mrm-gallery-video-wrapper" id="mrmGalleryVideoWrapper" style="display:none;">
              <video id="mrmGalleryInlineVideo" controls playsinline loop>
                <source src="<?php echo esc_url( $theme_vid . 'video-product-gallery.mp4' ); ?>" type="video/mp4">
              </video>
            </div>

            <!-- Navigation Chevron Arrows on Image -->
            <button class="mrm-gallery-nav-btn mrm-nav-prev" id="mrmGalleryPrev" aria-label="Previous Image">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            <button class="mrm-gallery-nav-btn mrm-nav-next" id="mrmGalleryNext" aria-label="Next Image">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>

            <!-- Zoom Indicator -->
            <span class="mrm-zoom-indicator">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
            </span>
          </div>

          <!-- Thumbnail Strip Navigation -->
          <div class="mrm-thumbnails-row" id="mrmThumbnailsRow">
            
            <div class="mrm-thumb-item active" data-src="<?php echo esc_url( $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg' ); ?>" data-type="image">
              <img src="<?php echo esc_url( $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg' ); ?>" alt="View 1">
            </div>

            <div class="mrm-thumb-item" data-src="<?php echo esc_url( $theme_img . 'Woman_modeling_red_bridal_lehenga_20261015215042.jpg' ); ?>" data-type="image">
              <img src="<?php echo esc_url( $theme_img . 'Woman_modeling_red_bridal_lehenga_20261015215042.jpg' ); ?>" alt="View 2">
            </div>

            <div class="mrm-thumb-item" data-src="<?php echo esc_url( $theme_img . 'Model_wearing_red_bridal_lehenga_20261015215105.jpg' ); ?>" data-type="image">
              <img src="<?php echo esc_url( $theme_img . 'Model_wearing_red_bridal_lehenga_20261015215105.jpg' ); ?>" alt="View 3">
            </div>

            <!-- Video Thumbnail -->
            <div class="mrm-thumb-item mrm-thumb-video" data-video="<?php echo esc_url( $theme_vid . 'video-product-gallery.mp4' ); ?>" data-type="video">
              <img src="<?php echo esc_url( $theme_img . 'Model_wearing_embroidered_outfit_20261015215056.jpg' ); ?>" alt="Video Lookbook">
              <span class="mrm-thumb-play-badge">▶</span>
            </div>

            <div class="mrm-thumb-item" data-src="<?php echo esc_url( $theme_img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg' ); ?>" data-type="image">
              <img src="<?php echo esc_url( $theme_img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg' ); ?>" alt="View 4">
            </div>

          </div>

        </div>
      </div>

      <!-- ===================================================================
           RIGHT COLUMN: PRODUCT DETAILS & PURCHASE ACTIONS
           =================================================================== -->
      <div class="mrm-product-info-column">
        
        <!-- Product Title -->
        <h1 class="mrm-single-title"><?php esc_html_e( 'Glamorous Crimson Red Embellished Draped', 'mansa-ram-mahajan' ); ?></h1>

        <!-- Price Display -->
        <div class="mrm-single-price-box">
          <span class="mrm-main-price" id="mrmProductDisplayPrice">₹ 6,995.00</span>
          <span class="mrm-mrp-price">₹ 8,995.00</span>
          <span class="mrm-discount-pill"><?php esc_html_e( '22% OFF', 'mansa-ram-mahajan' ); ?></span>
          <span class="mrm-tax-note"><?php esc_html_e( 'Inclusive of all taxes', 'mansa-ram-mahajan' ); ?></span>
        </div>

        <!-- Color Variation Selector -->
        <div class="mrm-variation-group">
          <div class="mrm-variation-header">
            <span class="mrm-variation-label"><?php esc_html_e( 'Color:', 'mansa-ram-mahajan' ); ?></span>
            <span class="mrm-variation-current" id="mrmSelectedColorName">RED</span>
          </div>
          <div class="mrm-color-pills" id="mrmColorPills">
            <button type="button" class="mrm-pill mrm-pill-color active" data-color="RED" data-color-code="#C42B59" data-price="6995">RED</button>
            <button type="button" class="mrm-pill mrm-pill-color" data-color="ROYAL TEAL" data-color-code="#1E5C60" data-price="7295">ROYAL TEAL</button>
            <button type="button" class="mrm-pill mrm-pill-color" data-color="ROSE PINK" data-color-code="#D82C6C" data-price="6995">ROSE PINK</button>
          </div>
        </div>

        <!-- Size Variation Selector -->
        <div class="mrm-variation-group">
          <div class="mrm-variation-header">
            <span class="mrm-variation-label"><?php esc_html_e( 'Size:', 'mansa-ram-mahajan' ); ?></span>
            <span class="mrm-variation-current" id="mrmSelectedSizeName">FREE SIZE</span>
            <button type="button" class="mrm-size-guide-trigger" id="mrmSizeGuideBtn">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.3 15.3l-6.6-6.6a2 2 0 0 0-2.8 0L2.7 17.9a2 2 0 0 0 0 2.8l.6.6a2 2 0 0 0 2.8 0l9.2-9.2 1.4 1.4-2.8 2.8 1.4 1.4 2.8-2.8 1.4 1.4-2.8 2.8 1.4 1.4 2.8-2.8 1.4 1.4a2 2 0 0 0 2.8 0l.6-.6a2 2 0 0 0 0-2.8z"></path></svg>
              <span><?php esc_html_e( 'Size Guide', 'mansa-ram-mahajan' ); ?></span>
            </button>
          </div>
          <div class="mrm-size-pills" id="mrmSizePills">
            <button type="button" class="mrm-pill mrm-pill-size active" data-size="FREE SIZE">FREE SIZE</button>
            <button type="button" class="mrm-pill mrm-pill-size" data-size="S">S</button>
            <button type="button" class="mrm-pill mrm-pill-size" data-size="M">M</button>
            <button type="button" class="mrm-pill mrm-pill-size" data-size="L">L</button>
            <button type="button" class="mrm-pill mrm-pill-size" data-size="XL">XL</button>
            <button type="button" class="mrm-pill mrm-pill-size" data-size="CUSTOM">CUSTOM</button>
          </div>
        </div>

        <!-- Quantity & Purchase Action Buttons -->
        <div class="mrm-actions-row">
          <button type="button" class="mrm-btn mrm-btn-add-cart" id="mrmAddToCartBtn">
            <span><?php esc_html_e( 'Add to cart', 'mansa-ram-mahajan' ); ?></span>
          </button>

          <button type="button" class="mrm-icon-action-btn mrm-wishlist-action" id="mrmProductWishlistBtn" aria-label="Add to Wishlist">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
          </button>

          <button type="button" class="mrm-icon-action-btn mrm-share-action" id="mrmProductShareBtn" aria-label="Share Product">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
          </button>

          <!-- Critical Buy Now Button (Triggers Split Payment Popup) -->
          <button type="button" class="mrm-btn mrm-btn-buy-now" id="mrmBuyNowBtn" data-product-id="101" data-product-title="Glamorous Crimson Red Embellished Draped" data-product-price="6995" data-product-img="<?php echo esc_url( $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg' ); ?>">
            <span><?php esc_html_e( 'Buy it now', 'mansa-ram-mahajan' ); ?></span>
          </button>
        </div>

        <!-- Stock Scarcity Urgency Alert -->
        <div class="mrm-urgency-notice">
          <span class="mrm-flame-icon">🔥</span>
          <span class="mrm-urgency-text"><?php esc_html_e( 'Hurry! Only 1 left', 'mansa-ram-mahajan' ); ?></span>
        </div>

        <!-- Live Viewers Social Proof -->
        <div class="mrm-viewers-notice">
          <span class="mrm-eye-icon">👁</span>
          <span class="mrm-viewers-text"><?php esc_html_e( '112 customers are viewing this product', 'mansa-ram-mahajan' ); ?></span>
        </div>

        <!-- Scalloped Wave Free Shipping Banner -->
        <div class="mrm-free-shipping-banner">
          <div class="mrm-banner-wave-bg"></div>
          <div class="mrm-banner-content">
            <strong><?php esc_html_e( 'Free Shipping', 'mansa-ram-mahajan' ); ?></strong>
            <span><?php esc_html_e( 'Free Shipping on Orders Above ₹14,999', 'mansa-ram-mahajan' ); ?></span>
          </div>
        </div>

        <!-- Dynamic 3-Step Delivery Timeline -->
        <div class="mrm-delivery-timeline">
          <div class="mrm-timeline-step completed">
            <div class="mrm-step-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line></svg>
            </div>
            <div class="mrm-step-text">
              <span class="mrm-step-date"><?php echo esc_html( $date_purchased ); ?></span>
              <span class="mrm-step-title"><?php esc_html_e( 'Purchased', 'mansa-ram-mahajan' ); ?></span>
            </div>
          </div>
          <div class="mrm-timeline-line"></div>
          <div class="mrm-timeline-step">
            <div class="mrm-step-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            </div>
            <div class="mrm-step-text">
              <span class="mrm-step-date"><?php echo esc_html( $date_proc_start . ' - ' . $date_proc_end ); ?></span>
              <span class="mrm-step-title"><?php esc_html_e( 'Processing', 'mansa-ram-mahajan' ); ?></span>
            </div>
          </div>
          <div class="mrm-timeline-line"></div>
          <div class="mrm-timeline-step">
            <div class="mrm-step-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            </div>
            <div class="mrm-step-text">
              <span class="mrm-step-date"><?php echo esc_html( $date_deliv_start . ' - ' . $date_deliv_end ); ?></span>
              <span class="mrm-step-title"><?php esc_html_e( 'Delivered', 'mansa-ram-mahajan' ); ?></span>
            </div>
          </div>
        </div>

        <!-- Product Style Code & Detailed Specifications -->
        <div class="mrm-product-specs">
          <p class="mrm-style-code"><strong><?php esc_html_e( 'Style Code:', 'mansa-ram-mahajan' ); ?></strong> MRM-150-D-4</p>
          <p class="mrm-spec-summary">
            <?php esc_html_e( 'Make a show-stopping entrance in this modern crimson red draped saree gown designed for contemporary luxury.', 'mansa-ram-mahajan' ); ?>
          </p>
          <ul class="mrm-spec-bullets">
            <li><strong><?php esc_html_e( 'Bodice:', 'mansa-ram-mahajan' ); ?></strong> <?php esc_html_e( 'Sleeveless bustier bodice richly embellished with gold zari work, colorful stone studs, kundan highlights, and delicate shoulder fringe tassels.', 'mansa-ram-mahajan' ); ?></li>
            <li><strong><?php esc_html_e( 'Skirt & Drape:', 'mansa-ram-mahajan' ); ?></strong> <?php esc_html_e( 'Floor-length flared georgette silhouette featuring fluid asymmetric cowl draping and an attached matching scarf drape.', 'mansa-ram-mahajan' ); ?></li>
            <li><strong><?php esc_html_e( 'Occasion:', 'mansa-ram-mahajan' ); ?></strong> <?php esc_html_e( 'Perfect for cocktail parties, sangeet nights, receptions, and glam festive celebrations.', 'mansa-ram-mahajan' ); ?></li>
            <li><strong><?php esc_html_e( 'Fabric & Care:', 'mansa-ram-mahajan' ); ?></strong> <?php esc_html_e( 'Pure Viscose Georgette & Raw Silk Lining. Professional Dry Clean Only.', 'mansa-ram-mahajan' ); ?></li>
          </ul>
        </div>

        <!-- Accordions: Shipping & Returns -->
        <div class="mrm-accordions-group">
          <div class="mrm-accordion-item">
            <button type="button" class="mrm-accordion-toggle" aria-expanded="false">
              <span><?php esc_html_e( 'Shipping &amp; Returns', 'mansa-ram-mahajan' ); ?></span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </button>
            <div class="mrm-accordion-content">
              <p><?php esc_html_e( 'We dispatch domestic orders within 24–48 hours via premium express couriers (BlueDart / Delhivery / DTDC). Standard domestic delivery takes 3–5 business days.', 'mansa-ram-mahajan' ); ?></p>
              <p><?php esc_html_e( 'Worldwide shipping via DHL Express takes 5–8 business days with door-to-door tracking. We offer hassle-free 7-day exchanges on standard sized garments.', 'mansa-ram-mahajan' ); ?></p>
            </div>
          </div>
        </div>

      </div>

    </div>

    <!-- ===================================================================
         CUSTOMER REVIEWS SECTION
         =================================================================== -->
    <section class="mrm-product-reviews-section">
      <div class="mrm-reviews-header-row">
        <h3><?php esc_html_e( 'Customer Reviews', 'mansa-ram-mahajan' ); ?></h3>
      </div>
      <div class="mrm-reviews-empty-state">
        <p><?php esc_html_e( 'Be the first to write a review', 'mansa-ram-mahajan' ); ?></p>
        <button type="button" class="mrm-btn mrm-btn-teal" id="mrmWriteReviewBtn">
          <?php esc_html_e( 'Write a review', 'mansa-ram-mahajan' ); ?>
        </button>
      </div>
    </section>

    <!-- ===================================================================
         YOU MAY ALSO LIKE (6 Product Recommendations)
         =================================================================== -->
    <section class="mrm-recommended-section">
      <div class="mrm-recommended-title">
        <h2><?php esc_html_e( 'You May Also Like', 'mansa-ram-mahajan' ); ?></h2>
      </div>

      <div class="mrm-product-grid mrm-grid-6">
        
        <!-- Rec 1 -->
        <div class="mrm-product-card">
          <div class="mrm-product-thumb">
            <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">
              <img src="<?php echo esc_url( $theme_img . 'Model_wearing_red_bridal_lehenga_20261015215105.jpg' ); ?>" alt="Regal Crimson Red Embroidered Anarkali & Sharara Set" loading="lazy">
            </a>
          </div>
          <div class="mrm-product-info">
            <h4 class="mrm-product-title"><a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">Regal Crimson Red Embroidered Anarkali &amp; Sharara Set</a></h4>
            <div class="mrm-product-price-row"><span class="mrm-price">₹ 9,585.00</span></div>
          </div>
        </div>

        <!-- Rec 2 -->
        <div class="mrm-product-card">
          <div class="mrm-product-thumb">
            <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">
              <img src="<?php echo esc_url( $theme_img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg' ); ?>" alt="Brown Draped Indo-Western Set with Embellished Crop Top" loading="lazy">
            </a>
          </div>
          <div class="mrm-product-info">
            <h4 class="mrm-product-title"><a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">Brown Draped Indo-Western Set with Embellished Crop Top</a></h4>
            <div class="mrm-product-price-row"><span class="mrm-price">₹ 5,895.00</span></div>
          </div>
        </div>

        <!-- Rec 3 -->
        <div class="mrm-product-card">
          <div class="mrm-product-thumb">
            <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">
              <img src="<?php echo esc_url( $theme_img . 'Model_posing_in_pink_outfit_20261015215033.jpg' ); ?>" alt="Dusty Taupe Pre-Draped Saree Set with Embroidered Waist Drape" loading="lazy">
            </a>
          </div>
          <div class="mrm-product-info">
            <h4 class="mrm-product-title"><a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">Dusty Taupe Pre-Draped Saree Set with Embroidered Waist Drape</a></h4>
            <div class="mrm-product-price-row"><span class="mrm-price">₹ 6,695.00</span></div>
          </div>
        </div>

        <!-- Rec 4 -->
        <div class="mrm-product-card">
          <div class="mrm-product-thumb">
            <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">
              <img src="<?php echo esc_url( $theme_img . 'Model_wearing_teal_outfit_20261015215017.jpg' ); ?>" alt="Royal Teal Silk Brocade Halter Sharara Set" loading="lazy">
            </a>
          </div>
          <div class="mrm-product-info">
            <h4 class="mrm-product-title"><a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">Royal Teal Silk Brocade Halter Sharara Set</a></h4>
            <div class="mrm-product-price-row"><span class="mrm-price">₹ 9,185.00</span></div>
          </div>
        </div>

        <!-- Rec 5 -->
        <div class="mrm-product-card">
          <div class="mrm-product-thumb">
            <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">
              <img src="<?php echo esc_url( $theme_img . 'Model_posing_in_lehenga_choli_20261015215038.jpg' ); ?>" alt="Taupe Brown Embroidered Cape Lehenga Set" loading="lazy">
            </a>
          </div>
          <div class="mrm-product-info">
            <h4 class="mrm-product-title"><a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">Taupe Brown Embroidered Cape Lehenga Set</a></h4>
            <div class="mrm-product-price-row"><span class="mrm-price">₹ 6,995.00</span></div>
          </div>
        </div>

        <!-- Rec 6 -->
        <div class="mrm-product-card">
          <div class="mrm-product-thumb">
            <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">
              <img src="<?php echo esc_url( $theme_img . 'Female_model_wearing_blue_lehenga_20261015215044.jpg' ); ?>" alt="Metallic Champagne Pre-Draped Saree-Lehenga" loading="lazy">
            </a>
          </div>
          <div class="mrm-product-info">
            <h4 class="mrm-product-title"><a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">Metallic Champagne Pre-Draped Saree-Lehenga &amp; Embellished Corset Bustier Set</a></h4>
            <div class="mrm-product-price-row"><span class="mrm-price">₹ 14,985.00</span></div>
          </div>
        </div>

      </div>

      <div class="mrm-recommended-action">
        <a href="<?php echo esc_url( home_url( '/category/sarees' ) ); ?>" class="mrm-btn mrm-btn-primary mrm-btn-pink">
          <?php esc_html_e( 'View More', 'mansa-ram-mahajan' ); ?>
        </a>
      </div>

    </section>

  </div>
</div>

<?php
get_footer();
