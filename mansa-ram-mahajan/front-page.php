<?php
/**
 * Mansa Ram Mahajan & Co Front Page Template
 *
 * Matching all 16 sections from Reference Screenshot 1 & Odhni Live Architecture
 *
 * @package Mansa_Ram_Mahajan
 */

get_header();

$theme_img = MRM_THEME_URI . '/assets/images/';
$theme_vid = MRM_THEME_URI . '/assets/video/';
$demo_products = mrm_get_demo_products();
?>

<?php if ( '1' === mrm_get_option( 'enable_sec_hero', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 3: LUXURY EDITORIAL HERO BANNER SLIDER (4 LANDSCAPE IMAGES)
     ========================================================================= -->
<section class="mrm-hero-section mrm-hero-fullwidth" id="mrmHeroSection">
  <div class="mrm-hero-slider-wrapper" id="mrmHeroSliderWrapper">
      
      <!-- 4 Landscape Hero Slides -->
      <div class="mrm-hero-slider" id="mrmHeroSlider" data-autoplay="<?php echo esc_attr( mrm_get_option( 'hero_slider_autoplay', '5000' ) ); ?>">
        <?php
        $hero_slides = array(
            array(
                'img'   => mrm_get_option( 'hero_slide1_img', $theme_img . 'mansa-festive-banner.png' ),
                'title' => 'Mansa Festive Collection',
                'url'   => mrm_get_option( 'hero_btn1_url', home_url( '/category/festive' ) ),
            ),
            array(
                'img'   => mrm_get_option( 'hero_slide2_img', $theme_img . 'mansa-wedding-season.png' ),
                'title' => 'Mansa Wedding Season Edit',
                'url'   => mrm_get_option( 'hero_btn2_url', '#mrmWeddingSection' ),
            ),
            array(
                'img'   => mrm_get_option( 'hero_slide3_img', $theme_img . 'mansa-bridal-elegance.png' ),
                'title' => 'Khushiyan Har Pal Bridal Elegance',
                'url'   => home_url( '/category/wedding' ),
            ),
            array(
                'img'   => mrm_get_option( 'hero_slide4_img', $theme_img . 'mansa-couture-portrait.png' ),
                'title' => 'Atelier Couture Gowns',
                'url'   => home_url( '/category/dresses' ),
            ),
        );
        foreach ( $hero_slides as $index => $slide ) :
            if ( empty( $slide['img'] ) ) continue;
        ?>
          <div class="mrm-hero-slide <?php echo 0 === $index ? 'active' : ''; ?>" data-slide-index="<?php echo esc_attr( $index ); ?>">
            <a href="<?php echo esc_url( $slide['url'] ); ?>" class="mrm-hero-slide-link" aria-label="<?php echo esc_attr( $slide['title'] ); ?>">
              <img src="<?php echo esc_url( $slide['img'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" width="1774" height="887" loading="<?php echo 0 === $index ? 'eager' : 'lazy'; ?>">
            </a>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Hero Call-To-Action Two Buttons -->
      <div class="mrm-hero-floating-actions">
        <a href="<?php echo esc_url( mrm_get_option( 'hero_btn1_url', home_url( '/category/festive' ) ) ); ?>" class="mrm-btn mrm-btn-primary mrm-btn-hero">
          <?php echo esc_html( mrm_get_option( 'hero_btn1_text', 'SHOP NOW' ) ); ?>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
        <a href="<?php echo esc_url( mrm_get_option( 'hero_btn2_url', '#mrmWeddingSection' ) ); ?>" class="mrm-btn mrm-btn-outline-hero mrm-btn-hero">
          <?php echo esc_html( mrm_get_option( 'hero_btn2_text', 'EXPLORE BRIDAL' ) ); ?>
        </a>
      </div>

      <!-- Slider Navigation Arrows (Left & Right) -->
      <button class="mrm-hero-slider-arrow prev" id="mrmHeroPrevBtn" aria-label="<?php esc_attr_e( 'Previous Slide', 'mansa-ram-mahajan' ); ?>">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
      </button>
      <button class="mrm-hero-slider-arrow next" id="mrmHeroNextBtn" aria-label="<?php esc_attr_e( 'Next Slide', 'mansa-ram-mahajan' ); ?>">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </button>

      <!-- Slider Indicator Dots -->
      <div class="mrm-hero-slider-dots" id="mrmHeroDots">
        <?php foreach ( $hero_slides as $i => $slide ) : if ( empty( $slide['img'] ) ) continue; ?>
          <button class="mrm-hero-dot <?php echo 0 === $i ? 'active' : ''; ?>" data-index="<?php echo esc_attr( $i ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Slide %d', 'mansa-ram-mahajan' ), $i + 1 ) ); ?>"></button>
        <?php endforeach; ?>
      </div>

    </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_trust', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 4: TRUST AND SHOPPING HIGHLIGHTS
     ========================================================================= -->
<section class="mrm-trust-section" id="mrmTrustSection">
  <div class="mrm-container">
    <div class="mrm-trust-grid">
      
      <div class="mrm-trust-card">
        <div class="mrm-trust-icon-box">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
        </div>
        <div class="mrm-trust-content">
          <h4><?php echo esc_html( mrm_get_option( 'trust_title_1', 'Handcrafted Heritage' ) ); ?></h4>
          <p><?php echo esc_html( mrm_get_option( 'trust_desc_1', 'Artisanal embroideries & authentic Indian silks' ) ); ?></p>
        </div>
      </div>

      <div class="mrm-trust-card">
        <div class="mrm-trust-icon-box">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
        </div>
        <div class="mrm-trust-content">
          <h4><?php echo esc_html( mrm_get_option( 'trust_title_2', 'Worldwide Shipping' ) ); ?></h4>
          <p><?php echo esc_html( mrm_get_option( 'trust_desc_2', 'Express insured international courier delivery' ) ); ?></p>
        </div>
      </div>

      <div class="mrm-trust-card">
        <div class="mrm-trust-icon-box">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
        </div>
        <div class="mrm-trust-content">
          <h4><?php echo esc_html( mrm_get_option( 'trust_title_3', 'Free Domestic Delivery' ) ); ?></h4>
          <p><?php echo esc_html( mrm_get_option( 'trust_desc_3', 'Complimentary across India on orders above ₹14,999' ) ); ?></p>
        </div>
      </div>

      <div class="mrm-trust-card">
        <div class="mrm-trust-icon-box">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
        </div>
        <div class="mrm-trust-content">
          <h4><?php echo esc_html( mrm_get_option( 'trust_title_4', '100% Authentic Quality' ) ); ?></h4>
          <p><?php echo esc_html( mrm_get_option( 'trust_desc_4', 'Rigorous 5-point quality inspected tailoring' ) ); ?></p>
        </div>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_lookbook', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 5: SOCIAL AND EDITORIAL LOOKBOOK GALLERY
     ========================================================================= -->
<section class="mrm-lookbook-section" id="mrmLookbookSection">
  <div class="mrm-container">
    <div class="mrm-lookbook-header">
      <span class="mrm-lookbook-tag"><?php echo esc_html( mrm_get_option( 'lookbook_tag', 'BEHIND THE SCENES & ATELIER LOOKBOOK' ) ); ?></span>
      <h3><?php echo esc_html( mrm_get_option( 'lookbook_title', 'We are now on the feed @mansaram_official' ) ); ?></h3>
    </div>

    <!-- Horizontally Scrollable 8-Tile Fashion Lookbook -->
    <div class="mrm-lookbook-scroll-wrapper">
      <div class="mrm-lookbook-track">
        
        <div class="mrm-lookbook-card" data-video="<?php echo esc_url( $theme_vid . 'video-campaign-pink.mp4' ); ?>">
          <img src="<?php echo esc_url( $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg' ); ?>" alt="Bridal Crimson" loading="lazy">
          <div class="mrm-lookbook-overlay">
            <span class="mrm-play-icon">▶</span>
            <span>Bridal Edit</span>
          </div>
        </div>

        <div class="mrm-lookbook-card">
          <img src="<?php echo esc_url( $theme_img . 'Female_model_wearing_blue_lehenga_20261015215044.jpg' ); ?>" alt="Midnight Blue Lehenga" loading="lazy">
          <div class="mrm-lookbook-overlay">
            <span>Royal Velvet</span>
          </div>
        </div>

        <div class="mrm-lookbook-card" data-video="<?php echo esc_url( $theme_vid . 'video-lehenga-showcase.mp4' ); ?>">
          <img src="<?php echo esc_url( $theme_img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg' ); ?>" alt="Gold Lehenga Choli" loading="lazy">
          <div class="mrm-lookbook-overlay">
            <span class="mrm-play-icon">▶</span>
            <span>Sangeet Glam</span>
          </div>
        </div>

        <div class="mrm-lookbook-card">
          <img src="<?php echo esc_url( $theme_img . 'Model_wearing_teal_outfit_20261015215017.jpg' ); ?>" alt="Teal Brocade Sharara" loading="lazy">
          <div class="mrm-lookbook-overlay">
            <span>Festive Edit</span>
          </div>
        </div>

        <div class="mrm-lookbook-card">
          <img src="<?php echo esc_url( $theme_img . 'Model_posing_in_pink_outfit_20261015215033.jpg' ); ?>" alt="Rani Pink Saree" loading="lazy">
          <div class="mrm-lookbook-overlay">
            <span>Cocktail Hour</span>
          </div>
        </div>

        <div class="mrm-lookbook-card" data-video="<?php echo esc_url( $theme_vid . 'video-product-gallery.mp4' ); ?>">
          <img src="<?php echo esc_url( $theme_img . 'Woman_modeling_red_bridal_lehenga_20261015215042.jpg' ); ?>" alt="Red Bridal Detail" loading="lazy">
          <div class="mrm-lookbook-overlay">
            <span class="mrm-play-icon">▶</span>
            <span>Zari Detailing</span>
          </div>
        </div>

        <div class="mrm-lookbook-card">
          <img src="<?php echo esc_url( $theme_img . 'Model_wearing_salwar_kameez_20261015215113.jpg' ); ?>" alt="Ivory Anarkali" loading="lazy">
          <div class="mrm-lookbook-overlay">
            <span>Daytime Grace</span>
          </div>
        </div>

        <div class="mrm-lookbook-card">
          <img src="<?php echo esc_url( $theme_img . 'Model_posing_in_lehenga_choli_20261015215038.jpg' ); ?>" alt="Mirror Work Lehenga" loading="lazy">
          <div class="mrm-lookbook-overlay">
            <span>Artisan Atelier</span>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_wedding', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 6: WEDDING COLLECTION
     ========================================================================= -->
<section class="mrm-section mrm-products-section" id="mrmWeddingSection">
  <div class="mrm-container">
    <div class="mrm-section-title">
      <h2><?php echo esc_html( mrm_get_option( 'wedding_title', 'WEDDING COLLECTION' ) ); ?></h2>
      <p><?php echo esc_html( mrm_get_option( 'wedding_subtitle', 'Opulent silhouettes woven for sacred vows and celebratory nights' ) ); ?></p>
    </div>

    <div class="mrm-product-grid mrm-grid-4">
      <?php
      // 4 Curated Wedding Products
      $wedding_products = array_slice( $demo_products, 0, 4 );
      foreach ( $wedding_products as $p ) :
      ?>
        <div class="mrm-product-card">
          <div class="mrm-product-thumb">
            <span class="mrm-badge mrm-badge-luxury"><?php echo esc_html( $p['badge'] ); ?></span>
            <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">
              <img src="<?php echo esc_url( $p['image'] ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" class="mrm-main-img" loading="lazy">
              <img src="<?php echo esc_url( $p['hover_image'] ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" class="mrm-hover-img" loading="lazy">
            </a>
            <div class="mrm-product-quick-actions">
              <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>" class="mrm-quick-btn"><?php esc_html_e( 'Quick View', 'mansa-ram-mahajan' ); ?></a>
            </div>
          </div>
          <div class="mrm-product-info">
            <span class="mrm-product-category"><?php echo esc_html( $p['category'] ); ?></span>
            <h3 class="mrm-product-title">
              <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>"><?php echo esc_html( $p['title'] ); ?></a>
            </h3>
            <div class="mrm-product-price-row">
              <span class="mrm-price"><?php echo esc_html( $p['price'] ); ?></span>
              <span class="mrm-regular-price"><?php echo esc_html( $p['regular_price'] ); ?></span>
              <span class="mrm-discount"><?php echo esc_html( $p['discount'] ); ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="mrm-section-action">
      <a href="<?php echo esc_url( mrm_get_option( 'wedding_btn_url', home_url( '/category/wedding' ) ) ); ?>" class="mrm-btn mrm-btn-primary">
        <?php echo esc_html( mrm_get_option( 'wedding_btn_text', 'VIEW ALL WEDDING' ) ); ?>
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_lehenga', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 7: LEHENGA COLLECTION
     ========================================================================= -->
<section class="mrm-section mrm-products-section mrm-bg-alt" id="mrmLehengaSection">
  <div class="mrm-container">
    <div class="mrm-section-title">
      <h2><?php echo esc_html( mrm_get_option( 'lehenga_title', 'LEHENGA COLLECTION' ) ); ?></h2>
      <p><?php echo esc_html( mrm_get_option( 'lehenga_subtitle', 'Voluminous flares, artisanal can-can, and celestial hand embroidery' ) ); ?></p>
    </div>

    <div class="mrm-product-grid mrm-grid-5">
      <?php
      // 5 Curated Lehenga Products
      $lehengas = array(
          array(
              'title' => 'Imperial Crimson Zardozi Bridal Lehenga',
              'price' => '₹ 14,995.00', 'regular' => '₹ 18,995.00', 'discount' => '21% OFF',
              'image' => $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg',
              'hover' => $theme_img . 'Model_wearing_red_bridal_lehenga_20261015215105.jpg',
              'badge' => 'Couture',
          ),
          array(
              'title' => 'Midnight Indigo Hand-Embroidered Velvet Lehenga',
              'price' => '₹ 13,485.00', 'regular' => '₹ 16,995.00', 'discount' => '20% OFF',
              'image' => $theme_img . 'Female_model_wearing_blue_lehenga_20261015215044.jpg',
              'hover' => $theme_img . 'Model_wearing_blue_lehenga_20261015215049.jpg',
              'badge' => 'Exclusive',
          ),
          array(
              'title' => 'Marigold Sunset Raw Silk Lehenga Set',
              'price' => '₹ 11,995.00', 'regular' => '₹ 14,995.00', 'discount' => '20% OFF',
              'image' => $theme_img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg',
              'hover' => $theme_img . 'Model_wearing_lehenga_choli_20261015215046.jpg',
              'badge' => 'Trending',
          ),
          array(
              'title' => 'Blush Pink Resham Threadwork Kalidar Lehenga',
              'price' => '₹ 10,995.00', 'regular' => '₹ 13,995.00', 'discount' => '21% OFF',
              'image' => $theme_img . 'Model_posing_in_pink_outfit_20261015215033.jpg',
              'hover' => $theme_img . 'Model_posing_in_lehenga_choli_20261015215038.jpg',
              'badge' => 'Pastel Edit',
          ),
          array(
              'title' => 'Regal Peacock Teal Embroidered Sharara Lehenga',
              'price' => '₹ 9,995.00', 'regular' => '₹ 12,995.00', 'discount' => '23% OFF',
              'image' => $theme_img . 'Model_wearing_teal_outfit_20261015215017.jpg',
              'hover' => $theme_img . 'Model_wearing_traditional_outfit_20261015215051.jpg',
              'badge' => 'Best Seller',
          ),
      );

      foreach ( $lehengas as $item ) :
      ?>
        <div class="mrm-product-card">
          <div class="mrm-product-thumb">
            <span class="mrm-badge mrm-badge-sale"><?php echo esc_html( $item['badge'] ); ?></span>
            <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">
              <img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" class="mrm-main-img" loading="lazy">
              <img src="<?php echo esc_url( $item['hover'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" class="mrm-hover-img" loading="lazy">
            </a>
          </div>
          <div class="mrm-product-info">
            <h3 class="mrm-product-title">
              <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
            </h3>
            <div class="mrm-product-price-row">
              <span class="mrm-price"><?php echo esc_html( $item['price'] ); ?></span>
              <span class="mrm-regular-price"><?php echo esc_html( $item['regular'] ); ?></span>
              <span class="mrm-discount"><?php echo esc_html( $item['discount'] ); ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="mrm-section-action">
      <a href="<?php echo esc_url( mrm_get_option( 'lehenga_btn_url', home_url( '/category/lehengas' ) ) ); ?>" class="mrm-btn mrm-btn-primary">
        <?php echo esc_html( mrm_get_option( 'lehenga_btn_text', 'VIEW ALL LEHENGAS' ) ); ?>
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_categories', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 8: SHOP BY CATEGORY (4 Large Arched Tiles)
     ========================================================================= -->
<section class="mrm-section mrm-category-section" id="mrmCategorySection">
  <div class="mrm-container">
    <div class="mrm-section-title">
      <h2><?php echo esc_html( mrm_get_option( 'cat_title', 'SHOP BY CATEGORY' ) ); ?></h2>
      <p><?php echo esc_html( mrm_get_option( 'cat_subtitle', 'Discover artisanal craftsmanship across our signature collections' ) ); ?></p>
    </div>

    <div class="mrm-category-grid">
      
      <!-- Category 1 -->
      <a href="<?php echo esc_url( mrm_get_option( 'cat1_url', home_url( '/category/sarees' ) ) ); ?>" class="mrm-category-card">
        <div class="mrm-category-image-wrap">
          <img src="<?php echo esc_url( mrm_get_option( 'cat1_img', $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg' ) ); ?>" alt="<?php echo esc_attr( mrm_get_option( 'cat1_title', 'SAREES' ) ); ?>" loading="lazy">
        </div>
        <div class="mrm-category-title-bar">
          <h3><?php echo esc_html( mrm_get_option( 'cat1_title', 'SAREES' ) ); ?></h3>
          <span><?php esc_html_e( 'EXPLORE →', 'mansa-ram-mahajan' ); ?></span>
        </div>
      </a>

      <!-- Category 2 -->
      <a href="<?php echo esc_url( mrm_get_option( 'cat2_url', home_url( '/category/lehengas' ) ) ); ?>" class="mrm-category-card">
        <div class="mrm-category-image-wrap">
          <img src="<?php echo esc_url( mrm_get_option( 'cat2_img', $theme_img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg' ) ); ?>" alt="<?php echo esc_attr( mrm_get_option( 'cat2_title', 'LEHENGAS' ) ); ?>" loading="lazy">
        </div>
        <div class="mrm-category-title-bar">
          <h3><?php echo esc_html( mrm_get_option( 'cat2_title', 'LEHENGAS' ) ); ?></h3>
          <span><?php esc_html_e( 'EXPLORE →', 'mansa-ram-mahajan' ); ?></span>
        </div>
      </a>

      <!-- Category 3 -->
      <a href="<?php echo esc_url( mrm_get_option( 'cat3_url', home_url( '/category/suits' ) ) ); ?>" class="mrm-category-card">
        <div class="mrm-category-image-wrap">
          <img src="<?php echo esc_url( mrm_get_option( 'cat3_img', $theme_img . 'Model_wearing_teal_outfit_20261015215017.jpg' ) ); ?>" alt="<?php echo esc_attr( mrm_get_option( 'cat3_title', 'SUITS & SHARARAS' ) ); ?>" loading="lazy">
        </div>
        <div class="mrm-category-title-bar">
          <h3><?php echo esc_html( mrm_get_option( 'cat3_title', 'SUITS & SHARARAS' ) ); ?></h3>
          <span><?php esc_html_e( 'EXPLORE →', 'mansa-ram-mahajan' ); ?></span>
        </div>
      </a>

      <!-- Category 4 -->
      <a href="<?php echo esc_url( mrm_get_option( 'cat4_url', home_url( '/category/dresses' ) ) ); ?>" class="mrm-category-card">
        <div class="mrm-category-image-wrap">
          <img src="<?php echo esc_url( mrm_get_option( 'cat4_img', $theme_img . 'Female_model_wearing_blue_lehenga_20261015215044.jpg' ) ); ?>" alt="<?php echo esc_attr( mrm_get_option( 'cat4_title', 'DRESSES & GOWNS' ) ); ?>" loading="lazy">
        </div>
        <div class="mrm-category-title-bar">
          <h3><?php echo esc_html( mrm_get_option( 'cat4_title', 'DRESSES & GOWNS' ) ); ?></h3>
          <span><?php esc_html_e( 'EXPLORE →', 'mansa-ram-mahajan' ); ?></span>
        </div>
      </a>

    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_saree', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 9: SAREE COLLECTION
     ========================================================================= -->
<section class="mrm-section mrm-products-section" id="mrmSareeSection">
  <div class="mrm-container">
    <div class="mrm-section-title">
      <h2><?php echo esc_html( mrm_get_option( 'saree_title', 'SAREES' ) ); ?></h2>
      <p><?php echo esc_html( mrm_get_option( 'saree_subtitle', 'Six yards of sheer timeless elegance in pure georgette, silk, and organza' ) ); ?></p>
    </div>

    <div class="mrm-product-grid mrm-grid-5">
      <?php
      $sarees = array(
          array(
              'title' => 'Glamorous Crimson Red Embellished Draped Saree',
              'price' => '₹ 6,995.00', 'regular' => '₹ 8,995.00', 'discount' => '22% OFF',
              'image' => $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg',
              'hover' => $theme_img . 'Woman_modeling_red_bridal_lehenga_20261015215042.jpg',
              'badge' => 'Featured',
          ),
          array(
              'title' => 'Dusty Taupe Pre-Draped Saree with Embroidered Waist Drape',
              'price' => '₹ 6,495.00', 'regular' => '₹ 7,995.00', 'discount' => '19% OFF',
              'image' => $theme_img . 'Model_posing_in_pink_outfit_20261015215033.jpg',
              'hover' => $theme_img . 'Model_wearing_salwar_kameez_20261015215113.jpg',
              'badge' => 'Ready to Wear',
          ),
          array(
              'title' => 'Emerald Green Organza Saree with Cutwork Borders',
              'price' => '₹ 8,495.00', 'regular' => '₹ 10,995.00', 'discount' => '23% OFF',
              'image' => $theme_img . 'Model_wearing_teal_outfit_20261015215017.jpg',
              'hover' => $theme_img . 'Model_wearing_traditional_outfit_20261015215051.jpg',
              'badge' => 'Handcrafted',
          ),
          array(
              'title' => 'Champagne Tissue Metallic Pre-Draped Saree',
              'price' => '₹ 9,995.00', 'regular' => '₹ 12,495.00', 'discount' => '20% OFF',
              'image' => $theme_img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg',
              'hover' => $theme_img . 'Model_posing_in_lehenga_choli_20261015215038.jpg',
              'badge' => 'Cocktail Edit',
          ),
          array(
              'title' => 'Regal Royal Blue Kanjeevaram Weave Saree',
              'price' => '₹ 11,495.00', 'regular' => '₹ 14,995.00', 'discount' => '23% OFF',
              'image' => $theme_img . 'Female_model_wearing_blue_lehenga_20261015215044.jpg',
              'hover' => $theme_img . 'Model_wearing_blue_lehenga_20261015215049.jpg',
              'badge' => 'Pure Weave',
          ),
      );

      foreach ( $sarees as $item ) :
      ?>
        <div class="mrm-product-card">
          <div class="mrm-product-thumb">
            <span class="mrm-badge mrm-badge-luxury"><?php echo esc_html( $item['badge'] ); ?></span>
            <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>">
              <img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" class="mrm-main-img" loading="lazy">
              <img src="<?php echo esc_url( $item['hover'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" class="mrm-hover-img" loading="lazy">
            </a>
          </div>
          <div class="mrm-product-info">
            <h3 class="mrm-product-title">
              <a href="<?php echo esc_url( home_url( '/product/glamorous-crimson-red' ) ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
            </h3>
            <div class="mrm-product-price-row">
              <span class="mrm-price"><?php echo esc_html( $item['price'] ); ?></span>
              <span class="mrm-regular-price"><?php echo esc_html( $item['regular'] ); ?></span>
              <span class="mrm-discount"><?php echo esc_html( $item['discount'] ); ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="mrm-section-action">
      <a href="<?php echo esc_url( mrm_get_option( 'saree_btn_url', home_url( '/category/sarees' ) ) ); ?>" class="mrm-btn mrm-btn-primary">
        <?php echo esc_html( mrm_get_option( 'saree_btn_text', 'VIEW ALL SAREES' ) ); ?>
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_campaign', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 10: EDITORIAL CAMPAIGN COLLAGE
     ========================================================================= -->
<section class="mrm-campaign-section" id="mrmCampaignSection">
  <div class="mrm-container">
    <div class="mrm-campaign-collage-grid">
      
      <!-- Asymmetric Left Large Primary Photo -->
      <div class="mrm-collage-col-primary">
        <?php $camp_main = mrm_get_option( 'campaign_img_main', $theme_img . 'mansa-wedding-season.png' ); ?>
        <img src="<?php echo esc_url( $camp_main ); ?>" alt="Royal Heritage Campaign" class="mrm-collage-hero-img" loading="lazy">
      </div>

      <!-- Asymmetric Middle Stacked Photos -->
      <div class="mrm-collage-col-stacked">
        <div class="mrm-stacked-item">
          <?php $camp_sub1 = mrm_get_option( 'campaign_img_sub1', $theme_img . 'mansa-bridal-elegance.png' ); ?>
          <img src="<?php echo esc_url( $camp_sub1 ); ?>" alt="Bridal Elegance" loading="lazy">
        </div>
        <div class="mrm-stacked-item">
          <?php $camp_sub2 = mrm_get_option( 'campaign_img_sub2', $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg' ); ?>
          <img src="<?php echo esc_url( $camp_sub2 ); ?>" alt="Crimson Detail" loading="lazy">
        </div>
      </div>

      <!-- Right Column: Campaign Story & CTA -->
      <div class="mrm-collage-col-text">
        <span class="mrm-campaign-subtitle"><?php echo esc_html( mrm_get_option( 'campaign_subtitle', 'HAUTE COUTURE EDITORIAL' ) ); ?></span>
        <h2 class="mrm-campaign-heading">
          <?php echo nl2br( esc_html( mrm_get_option( 'campaign_title', "Khushiyan Har Pal\nBridal Splendour" ) ) ); ?>
        </h2>
        <p class="mrm-campaign-body">
          <?php echo esc_html( mrm_get_option( 'campaign_body', 'Every weave at Mansa Ram Mahajan & Co narrates a chronicle of regal Delhi craftsmanship. From the majestic handwoven banarasi borders to intricately stone-studded bustiers and flowing cowl georgette drapes, each bespoke ensemble is sculpted to turn every wedding celebration into unforgettable folklore.' ) ); ?>
        </p>
        <div class="mrm-campaign-features">
          <div class="mrm-campaign-feat-item">
            <span class="mrm-feat-bullet">✦</span>
            <span><?php echo esc_html( mrm_get_option( 'campaign_feat_1', 'Over 350+ Hours of Pure Zari Craftsmanship per Bridal Ensemble' ) ); ?></span>
          </div>
          <div class="mrm-campaign-feat-item">
            <span class="mrm-feat-bullet">✦</span>
            <span><?php echo esc_html( mrm_get_option( 'campaign_feat_2', 'Personalized Atelier Fittings across 6 Delhi NCR Studios' ) ); ?></span>
          </div>
        </div>
        <a href="<?php echo esc_url( mrm_get_option( 'campaign_btn_url', home_url( '/category/wedding' ) ) ); ?>" class="mrm-btn mrm-btn-primary">
          <?php echo esc_html( mrm_get_option( 'campaign_btn_text', 'DISCOVER THE EDIT' ) ); ?>
        </a>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_video', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 11: ATELIER VIDEO COLLECTION SLIDER (3 CLIENT VIDEOS)
     ========================================================================= -->
<section class="mrm-video-collection-section" id="mrmVideoSection">
  <div class="mrm-container">
    
    <div class="mrm-section-header mrm-video-header">
      <span class="mrm-tag"><?php echo esc_html( mrm_get_option( 'video_tag', 'HAUTE COUTURE IN MOTION' ) ); ?></span>
      <h2 class="mrm-heading-serif"><?php echo esc_html( mrm_get_option( 'video_title', 'The Poetry of Indian Couturiers' ) ); ?></h2>
      <p class="mrm-subheading"><?php echo esc_html( mrm_get_option( 'video_subtitle', 'Immerse in our 3 masterwork collections filmed live inside our historic Delhi ateliers and runway showcases.' ) ); ?></p>
    </div>

    <!-- Video Reels Collection Slider -->
    <div class="mrm-video-collection-wrapper">
      <div class="mrm-video-collection-slider" id="mrmVideoCollectionSlider">
        <?php
        $video_items = array(
            array(
                'id'       => 1,
                'file'     => mrm_get_option( 'video1_file', $theme_vid . 'video-campaign-pink.mp4' ),
                'poster'   => mrm_get_option( 'video1_poster', $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg' ),
                'badge'    => mrm_get_option( 'video1_badge', 'Reel 01 • Runway Walk' ),
                'title'    => mrm_get_option( 'video1_title', 'Royal Crimson Bridal Movement' ),
                'desc'     => mrm_get_option( 'video1_desc', 'Over 350+ hours of zardozi bullion craftsmanship showcased in motion.' ),
                'btn_text' => mrm_get_option( 'video1_btn_text', 'SHOP BRIDAL' ),
                'btn_url'  => mrm_get_option( 'video1_btn_url', home_url( '/category/wedding' ) ),
            ),
            array(
                'id'       => 2,
                'file'     => mrm_get_option( 'video2_file', $theme_vid . 'video-lehenga-showcase.mp4' ),
                'poster'   => mrm_get_option( 'video2_poster', $theme_img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg' ),
                'badge'    => mrm_get_option( 'video2_badge', 'Reel 02 • Sangeet Flare' ),
                'title'    => mrm_get_option( 'video2_title', 'Celebratory Gold Can-Can Flare' ),
                'desc'     => mrm_get_option( 'video2_desc', 'Voluminous twirls and celestial raw silk embroidery for celebratory nights.' ),
                'btn_text' => mrm_get_option( 'video2_btn_text', 'SHOP LEHENGAS' ),
                'btn_url'  => mrm_get_option( 'video2_btn_url', home_url( '/category/lehengas' ) ),
            ),
            array(
                'id'       => 3,
                'file'     => mrm_get_option( 'video3_file', $theme_vid . 'video-product-gallery.mp4' ),
                'poster'   => mrm_get_option( 'video3_poster', $theme_img . 'Model_wearing_teal_outfit_20261015215017.jpg' ),
                'badge'    => mrm_get_option( 'video3_badge', 'Reel 03 • Atelier Fit' ),
                'title'    => mrm_get_option( 'video3_title', 'Artisanal Silk Draping & Silhouette' ),
                'desc'     => mrm_get_option( 'video3_desc', 'Fluid pure georgette cowl drape with kundan-studded bustier bodice.' ),
                'btn_text' => mrm_get_option( 'video3_btn_text', 'SHOP COUTURE' ),
                'btn_url'  => mrm_get_option( 'video3_btn_url', home_url( '/category/sarees' ) ),
            ),
        );

        foreach ( $video_items as $index => $item ) :
            if ( empty( $item['file'] ) ) continue;
        ?>
          <div class="mrm-video-card" data-video-index="<?php echo esc_attr( $index ); ?>">
            <div class="mrm-video-media-box">
              <video loop muted playsinline poster="<?php echo esc_url( $item['poster'] ); ?>" class="mrm-card-video" id="mrmCardVideo_<?php echo esc_attr( $item['id'] ); ?>">
                <source src="<?php echo esc_url( $item['file'] ); ?>" type="video/mp4">
              </video>
              
              <!-- Video Controls Overlay -->
              <div class="mrm-video-card-overlay">
                <!-- Top Badge & Sound Toggle -->
                <div class="mrm-video-top-bar">
                  <span class="mrm-video-pill"><?php echo esc_html( $item['badge'] ); ?></span>
                  <button type="button" class="mrm-sound-toggle-btn" data-target="mrmCardVideo_<?php echo esc_attr( $item['id'] ); ?>" aria-label="<?php esc_attr_e( 'Toggle Sound', 'mansa-ram-mahajan' ); ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="icon-muted"><path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/></svg>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="icon-unmuted" style="display:none;"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/></svg>
                  </button>
                </div>

                <!-- Center Play / Pause Indicator Button -->
                <button type="button" class="mrm-video-center-btn" data-target="mrmCardVideo_<?php echo esc_attr( $item['id'] ); ?>" aria-label="<?php esc_attr_e( 'Play Video', 'mansa-ram-mahajan' ); ?>">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon-play"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon-pause" style="display:none;"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg>
                </button>

                <!-- Bottom Captions & Action -->
                <div class="mrm-video-bottom-info">
                  <h3 class="mrm-video-card-title"><?php echo esc_html( $item['title'] ); ?></h3>
                  <p class="mrm-video-card-desc"><?php echo esc_html( $item['desc'] ); ?></p>
                  <div class="mrm-video-card-actions">
                    <a href="<?php echo esc_url( $item['btn_url'] ); ?>" class="mrm-btn mrm-btn-primary mrm-btn-sm">
                      <?php echo esc_html( $item['btn_text'] ); ?>
                    </a>
                    <button type="button" class="mrm-btn mrm-btn-outline-white mrm-btn-sm mrm-expand-reel-btn" data-video="<?php echo esc_url( $item['file'] ); ?>" data-title="<?php echo esc_attr( $item['title'] ); ?>">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 3 21 3 21 9"></polyline><polyline points="9 21 3 21 3 15"></polyline><line x1="21" y1="3" x2="14" y2="10"></line><line x1="3" y1="21" x2="10" y2="14"></line></svg>
                      <?php esc_html_e( 'Full Reel', 'mansa-ram-mahajan' ); ?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Navigation Arrows for Slider -->
      <button class="mrm-video-nav-btn prev" id="mrmVideoSliderPrev" aria-label="<?php esc_attr_e( 'Previous Video', 'mansa-ram-mahajan' ); ?>">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
      </button>
      <button class="mrm-video-nav-btn next" id="mrmVideoSliderNext" aria-label="<?php esc_attr_e( 'Next Video', 'mansa-ram-mahajan' ); ?>">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </button>

      <!-- Dots for Mobile & Quick Navigation -->
      <div class="mrm-video-slider-dots" id="mrmVideoDots">
        <button class="mrm-video-dot active" data-index="0" aria-label="<?php esc_attr_e( 'Video 1', 'mansa-ram-mahajan' ); ?>"></button>
        <button class="mrm-video-dot" data-index="1" aria-label="<?php esc_attr_e( 'Video 2', 'mansa-ram-mahajan' ); ?>"></button>
        <button class="mrm-video-dot" data-index="2" aria-label="<?php esc_attr_e( 'Video 3', 'mansa-ram-mahajan' ); ?>"></button>
      </div>
    </div>

  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_support', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 12: SHOPPING SUPPORT & BRIDAL ASSISTANCE
     ========================================================================= -->
<section class="mrm-support-cards-section" id="mrmSupportSection">
  <div class="mrm-container">
    <div class="mrm-support-cards-grid">
      
      <!-- Card 1: WhatsApp Shopping -->
      <div class="mrm-support-card">
        <div class="mrm-support-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="#25D366"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        </div>
        <div class="mrm-support-body">
          <h3><?php echo esc_html( mrm_get_option( 'support_card1_title', 'Personal Shopper on WhatsApp' ) ); ?></h3>
          <p><?php echo esc_html( mrm_get_option( 'support_card1_desc', 'Connect directly with our master stylists for real-time video tours of our inventory, close-up fabric details, and sizing help.' ) ); ?></p>
          <?php $wa_num = mrm_get_option( 'whatsapp_number', '+919811122334' ); ?>
          <a href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $wa_num ) ); ?>?text=<?php echo rawurlencode( 'Hello Mansa Ram Mahajan! I would like personal shopping assistance.' ); ?>" target="_blank" class="mrm-support-cta">
            <?php echo esc_html( mrm_get_option( 'support_card1_btn', 'CHAT WITH STYLIST →' ) ); ?>
          </a>
        </div>
      </div>

      <!-- Card 2: Bridal Styling Consultation -->
      <div class="mrm-support-card">
        <div class="mrm-support-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#C42B59" stroke-width="2"><path d="M23 7l-7 5 7 5V7z"></path><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
        </div>
        <div class="mrm-support-body">
          <h3><?php echo esc_html( mrm_get_option( 'support_card2_title', 'Bridal Video Consultation' ) ); ?></h3>
          <p><?php echo esc_html( mrm_get_option( 'support_card2_desc', 'Schedule a bespoke 1-on-1 virtual appointment with our Senior Bridal Designers from the comfort of your home anywhere in the world.' ) ); ?></p>
          <a href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $wa_num ) ); ?>?text=<?php echo rawurlencode( 'Hello Mansa Ram Mahajan! I would like to book a bridal video consultation.' ); ?>" target="_blank" class="mrm-support-cta">
            <?php echo esc_html( mrm_get_option( 'support_card2_btn', 'BOOK AN APPOINTMENT →' ) ); ?>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_stores', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 13: VISIT OUR STORES (6 Delhi NCR Flagships)
     ========================================================================= -->
<section class="mrm-section mrm-stores-section" id="mrmStoresSection">
  <div class="mrm-container">
    <div class="mrm-section-title">
      <h2><?php esc_html_e( 'VISIT OUR STORES', 'mansa-ram-mahajan' ); ?></h2>
      <p><?php esc_html_e( 'Experience haute couture hospitality across 6 iconic destinations in Delhi NCR', 'mansa-ram-mahajan' ); ?></p>
    </div>

    <div class="mrm-stores-grid">
      <?php
      $raw_stores = mrm_get_option( 'store_locations' );
      $stores = is_array( $raw_stores ) ? $raw_stores : json_decode( $raw_stores, true );
      if ( ! is_array( $stores ) || empty( $stores ) ) {
          $stores = mrm_get_stores();
      }
      foreach ( $stores as $s ) :
      ?>
        <div class="mrm-store-tile">
          <div class="mrm-store-thumb">
            <img src="<?php echo esc_url( $s['image'] ?? '' ); ?>" alt="<?php echo esc_attr( $s['title'] ?? '' ); ?>" loading="lazy">
            <span class="mrm-store-city-badge"><?php echo esc_html( $s['city'] ?? '' ); ?></span>
          </div>
          <div class="mrm-store-details">
            <h4><?php echo esc_html( $s['title'] ?? '' ); ?></h4>
            <p class="mrm-store-address"><?php echo esc_html( $s['address'] ?? '' ); ?></p>
            <p class="mrm-store-timing"><?php echo esc_html( $s['timing'] ?? '' ); ?></p>
            <div class="mrm-store-links">
              <a href="tel:<?php echo esc_attr( str_replace(' ', '', $s['phone'] ?? '') ); ?>" class="mrm-store-phone">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                <span><?php echo esc_html( $s['phone'] ?? '' ); ?></span>
              </a>
              <?php if ( ! empty( $s['maps_url'] ) ) : ?>
              <a href="<?php echo esc_url( $s['maps_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="mrm-btn mrm-btn-outline mrm-btn-sm">
                <?php esc_html_e( 'GET DIRECTIONS', 'mansa-ram-mahajan' ); ?>
              </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_reviews', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 14: CUSTOMER REVIEWS
     ========================================================================= -->
<section class="mrm-section mrm-reviews-section" id="mrmReviewsSection">
  <div class="mrm-container">
    <div class="mrm-section-title">
      <h2><?php esc_html_e( 'VOICES OF OUR PATRONS', 'mansa-ram-mahajan' ); ?></h2>
      <p><?php esc_html_e( 'Real bridal and festive reviews from women across the globe', 'mansa-ram-mahajan' ); ?></p>
    </div>

    <div class="mrm-reviews-grid">
      <?php
      $raw_reviews = mrm_get_option( 'customer_reviews' );
      $reviews = is_array( $raw_reviews ) ? $raw_reviews : json_decode( $raw_reviews, true );
      if ( is_array( $reviews ) && ! empty( $reviews ) ) :
        foreach ( $reviews as $rev ) :
          $stars = str_repeat( '★', intval( $rev['rating'] ?? 5 ) );
      ?>
        <div class="mrm-review-card">
          <div class="mrm-review-stars"><?php echo esc_html( $stars ); ?></div>
          <p class="mrm-review-quote">
            “<?php echo esc_html( $rev['quote'] ?? '' ); ?>”
          </p>
          <div class="mrm-reviewer-info">
            <strong><?php echo esc_html( $rev['name'] ?? '' ); ?></strong>
            <span><?php echo esc_html( $rev['city'] ?? '' ); ?></span>
            <?php if ( ! empty( $rev['tag'] ) ) : ?>
              <span class="mrm-product-tag"><?php echo esc_html( $rev['tag'] ); ?></span>
            <?php endif; ?>
          </div>
        </div>
      <?php
        endforeach;
      endif;
      ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( '1' === mrm_get_option( 'enable_sec_stats', '1' ) ) : ?>
<!-- =========================================================================
     SECTION 15: BUSINESS STATISTICS (Approved Brand Heritage Metrics)
     ========================================================================= -->
<section class="mrm-stats-section" id="mrmStatsSection">
  <div class="mrm-container">
    <div class="mrm-stats-grid">
      <div class="mrm-stat-item">
        <span class="mrm-stat-num"><?php echo esc_html( mrm_get_option( 'stat_num_1', '25+' ) ); ?></span>
        <span class="mrm-stat-label"><?php echo esc_html( mrm_get_option( 'stat_lbl_1', 'Years of Couture Legacy' ) ); ?></span>
      </div>
      <div class="mrm-stat-item">
        <span class="mrm-stat-num"><?php echo esc_html( mrm_get_option( 'stat_num_2', '100,000+' ) ); ?></span>
        <span class="mrm-stat-label"><?php echo esc_html( mrm_get_option( 'stat_lbl_2', 'Brides & Happy Patrons' ) ); ?></span>
      </div>
      <div class="mrm-stat-item">
        <span class="mrm-stat-num"><?php echo esc_html( mrm_get_option( 'stat_num_3', '50,000+' ) ); ?></span>
        <span class="mrm-stat-label"><?php echo esc_html( mrm_get_option( 'stat_lbl_3', 'Bespoke Custom Fits Delivered' ) ); ?></span>
      </div>
      <div class="mrm-stat-item">
        <span class="mrm-stat-num"><?php echo esc_html( mrm_get_option( 'stat_num_4', '6' ) ); ?></span>
        <span class="mrm-stat-label"><?php echo esc_html( mrm_get_option( 'stat_lbl_4', 'Delhi NCR Flagship Boutiques' ) ); ?></span>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
get_footer();
