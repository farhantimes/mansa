<?php
/**
 * Mansa Ram Mahajan & Co WooCommerce Catalog / Archive Product Template
 *
 * Section 5: Fully Functional Product Listing & Category Pages
 *
 * @package Mansa_Ram_Mahajan
 */

get_header();

$theme_img = MRM_THEME_URI . '/assets/images/';
$demo_products = mrm_get_demo_products();
?>

<div class="mrm-catalog-page">
  <div class="mrm-container">
    
    <!-- Breadcrumbs -->
    <nav class="mrm-breadcrumbs" aria-label="Breadcrumbs">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'mansa-ram-mahajan' ); ?></a>
      <span class="mrm-breadcrumb-sep">/</span>
      <span class="mrm-breadcrumb-current"><?php esc_html_e( 'Haute Couture Collections', 'mansa-ram-mahajan' ); ?></span>
    </nav>

    <!-- Category Header -->
    <div class="mrm-catalog-header">
      <h1 class="mrm-catalog-title"><?php esc_html_e( 'Designer Ethnic Wear for Women', 'mansa-ram-mahajan' ); ?></h1>
      <p class="mrm-catalog-desc">
        <?php esc_html_e( 'Explore our signature bridal lehengas, hand-embroidered draped saree gowns, regal anarkalis, and festive luxury sets crafted in pure georgette, silk brocades, and organza.', 'mansa-ram-mahajan' ); ?>
      </p>

      <!-- Subcategory Pills -->
      <div class="mrm-subcategory-pills">
        <a href="<?php echo esc_url( home_url( '/category/sarees' ) ); ?>" class="mrm-subcat-pill active"><?php esc_html_e( 'All Collections (24)', 'mansa-ram-mahajan' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/category/sarees' ) ); ?>" class="mrm-subcat-pill"><?php esc_html_e( 'Sarees & Drapes', 'mansa-ram-mahajan' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/category/lehengas' ) ); ?>" class="mrm-subcat-pill"><?php esc_html_e( 'Bridal Lehengas', 'mansa-ram-mahajan' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/category/suits' ) ); ?>" class="mrm-subcat-pill"><?php esc_html_e( 'Anarkalis & Shararas', 'mansa-ram-mahajan' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/category/dresses' ) ); ?>" class="mrm-subcat-pill"><?php esc_html_e( 'Gowns & Indo-Western', 'mansa-ram-mahajan' ); ?></a>
      </div>
    </div>

    <!-- Catalog Control Bar (Product Count & Sort) -->
    <div class="mrm-catalog-controls">
      <div class="mrm-catalog-count">
        <span><?php esc_html_e( 'Showing all 24 curated handcrafted designs', 'mansa-ram-mahajan' ); ?></span>
      </div>
      <div class="mrm-catalog-sorting">
        <label for="mrmCatalogSort"><?php esc_html_e( 'Sort By:', 'mansa-ram-mahajan' ); ?></label>
        <select id="mrmCatalogSort" class="mrm-sort-select">
          <option value="featured"><?php esc_html_e( 'Featured & Recommended', 'mansa-ram-mahajan' ); ?></option>
          <option value="price-low"><?php esc_html_e( 'Price: Low to High', 'mansa-ram-mahajan' ); ?></option>
          <option value="price-high"><?php esc_html_e( 'Price: High to Low', 'mansa-ram-mahajan' ); ?></option>
          <option value="newest"><?php esc_html_e( 'New Arrivals 2026', 'mansa-ram-mahajan' ); ?></option>
        </select>
      </div>
    </div>

    <!-- Catalog Body Grid with Sidebar Filters -->
    <div class="mrm-catalog-layout">
      
      <!-- Filter Sidebar -->
      <aside class="mrm-filter-sidebar" id="mrmFilterSidebar">
        
        <div class="mrm-filter-group">
          <h4 class="mrm-filter-title"><?php esc_html_e( 'Category', 'mansa-ram-mahajan' ); ?></h4>
          <ul class="mrm-filter-list">
            <li><label><input type="checkbox" checked> <span>Sarees &amp; Gowns (10)</span></label></li>
            <li><label><input type="checkbox"> <span>Bridal Lehengas (8)</span></label></li>
            <li><label><input type="checkbox"> <span>Shararas &amp; Suits (4)</span></label></li>
            <li><label><input type="checkbox"> <span>Kurtis &amp; Tunics (2)</span></label></li>
          </ul>
        </div>

        <div class="mrm-filter-group">
          <h4 class="mrm-filter-title"><?php esc_html_e( 'Size', 'mansa-ram-mahajan' ); ?></h4>
          <div class="mrm-filter-pills">
            <span class="mrm-filter-pill active">Free Size</span>
            <span class="mrm-filter-pill">XS</span>
            <span class="mrm-filter-pill">S</span>
            <span class="mrm-filter-pill">M</span>
            <span class="mrm-filter-pill">L</span>
            <span class="mrm-filter-pill">XL</span>
            <span class="mrm-filter-pill">Custom</span>
          </div>
        </div>

        <div class="mrm-filter-group">
          <h4 class="mrm-filter-title"><?php esc_html_e( 'Color', 'mansa-ram-mahajan' ); ?></h4>
          <div class="mrm-filter-colors">
            <span class="mrm-color-dot" style="background:#C42B59;" title="Crimson Red"></span>
            <span class="mrm-color-dot" style="background:#1E5C60;" title="Teal"></span>
            <span class="mrm-color-dot" style="background:#1D2B53;" title="Midnight Blue"></span>
            <span class="mrm-color-dot" style="background:#D82C6C;" title="Rani Pink"></span>
            <span class="mrm-color-dot" style="background:#D4AF37;" title="Gold / Marigold"></span>
            <span class="mrm-color-dot" style="background:#4A5320;" title="Olive Green"></span>
          </div>
        </div>

        <div class="mrm-filter-group">
          <h4 class="mrm-filter-title"><?php esc_html_e( 'Fabric', 'mansa-ram-mahajan' ); ?></h4>
          <ul class="mrm-filter-list">
            <li><label><input type="checkbox"> <span>Pure Georgette</span></label></li>
            <li><label><input type="checkbox"> <span>Raw Silk &amp; Brocade</span></label></li>
            <li><label><input type="checkbox"> <span>Organza Tissue</span></label></li>
            <li><label><input type="checkbox"> <span>Royal Velvet</span></label></li>
          </ul>
        </div>

        <div class="mrm-filter-group">
          <h4 class="mrm-filter-title"><?php esc_html_e( 'Occasion', 'mansa-ram-mahajan' ); ?></h4>
          <ul class="mrm-filter-list">
            <li><label><input type="checkbox"> <span>Bridal Wedding</span></label></li>
            <li><label><input type="checkbox"> <span>Sangeet &amp; Mehendi</span></label></li>
            <li><label><input type="checkbox"> <span>Cocktail &amp; Reception</span></label></li>
            <li><label><input type="checkbox"> <span>Festive Puja</span></label></li>
          </ul>
        </div>

      </aside>

      <!-- Product Cards Grid -->
      <div class="mrm-catalog-products">
        <div class="mrm-product-grid mrm-grid-4">
          
          <?php
          // Render product catalog cards
          foreach ( $demo_products as $p ) :
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

        <!-- Pagination -->
        <div class="mrm-pagination">
          <span class="mrm-page-num current">1</span>
          <a href="#" class="mrm-page-num">2</a>
          <a href="#" class="mrm-page-num">3</a>
          <a href="#" class="mrm-page-next">Next →</a>
        </div>
      </div>

    </div>

  </div>
</div>

<?php
get_footer();
