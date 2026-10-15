<?php
/**
 * Mansa Ram Mahajan & Co Header Template
 *
 * @package Mansa_Ram_Mahajan
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="mrm-page-wrapper" class="mrm-site">

  <!-- =========================================================================
       SECTION 1: ROTATING PROMOTIONAL ANNOUNCEMENT BAR
       ========================================================================= -->
  <aside class="mrm-announcement-bar" aria-label="<?php esc_attr_e( 'Announcements', 'mansa-ram-mahajan' ); ?>">
    <div class="mrm-container">
      <div class="mrm-announcement-track" id="mrmAnnouncementTrack">
        <?php
        $announcement_raw = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'announcement_messages' ) : '';
        $announcements = ! empty( $announcement_raw ) ? explode( "\n", str_replace( "\r", "", $announcement_raw ) ) : mrm_get_announcements();
        foreach ( $announcements as $index => $msg ) :
            $msg = trim( $msg );
            if ( empty( $msg ) ) continue;
        ?>
          <div class="mrm-announcement-slide <?php echo $index === 0 ? 'active' : ''; ?>">
            <span class="mrm-announcement-text"><?php echo esc_html( $msg ); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </aside>

  <!-- =========================================================================
       SECTION 2: HEADER & NAVIGATION
       ========================================================================= -->
  <header class="mrm-header" id="mrmMainHeader">
    <div class="mrm-container">
      
      <!-- Top Utility Header Row -->
      <div class="mrm-header-top-row">
        
        <!-- Left: Quick Links (Store & Contact) -->
        <div class="mrm-header-left">
          <button class="mrm-mobile-toggle" id="mrmMobileToggle" aria-label="<?php esc_attr_e( 'Open Navigation Menu', 'mansa-ram-mahajan' ); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="3" y1="12" x2="21" y2="12"></line>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
          </button>

          <nav class="mrm-utility-nav" aria-label="<?php esc_attr_e( 'Utility Links', 'mansa-ram-mahajan' ); ?>">
            <?php
            $top_store_link = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'top_store_link', '#mrmStoresSection' ) : '#mrmStoresSection';
            $top_phone = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'top_phone', '+91 98111 22334' ) : '+91 98111 22334';
            ?>
            <a href="<?php echo esc_url( $top_store_link ); ?>" class="mrm-utility-link">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              <span><?php esc_html_e( 'FIND STORE', 'mansa-ram-mahajan' ); ?></span>
            </a>
            <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $top_phone ) ); ?>" class="mrm-utility-link">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
              <span><?php esc_html_e( 'CONTACT US', 'mansa-ram-mahajan' ); ?></span>
            </a>
          </nav>
        </div>

        <!-- Center: Brand Logo -->
        <div class="mrm-header-center">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mrm-brand-logo" rel="home">
            <?php
            $custom_logo_url = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'custom_logo_url' ) : '';
            if ( has_custom_logo() ) :
              the_custom_logo();
            elseif ( ! empty( $custom_logo_url ) ) :
            ?>
              <img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="380" height="44">
            <?php else : ?>
              <img src="<?php echo esc_url( MRM_THEME_URI . '/assets/images/logo.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="380" height="44">
            <?php endif; ?>
          </a>
        </div>

        <!-- Right: Search, Account, Wishlist, Cart -->
        <div class="mrm-header-right">
          <?php
          $enable_search   = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'enable_search', '1' ) : '1';
          $enable_account  = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'enable_account', '1' ) : '1';
          $enable_wishlist = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'enable_wishlist', '1' ) : '1';
          $enable_cart     = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'enable_cart', '1' ) : '1';
          ?>
          
          <!-- Live Product Search -->
          <?php if ( '1' === $enable_search ) : ?>
          <div class="mrm-header-search" id="mrmHeaderSearch">
            <form role="search" method="get" class="mrm-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input type="search" class="mrm-search-field" placeholder="<?php esc_attr_e( 'Search for Sarees, Lehengas...', 'mansa-ram-mahajan' ); ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" id="mrmSearchInput">
              <input type="hidden" name="post_type" value="product">
              <button type="submit" class="mrm-search-submit" aria-label="<?php esc_attr_e( 'Search', 'mansa-ram-mahajan' ); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
              </button>
            </form>
            <!-- Autocomplete Results Container -->
            <div class="mrm-search-autocomplete" id="mrmSearchAutocomplete" style="display:none;"></div>
          </div>
          <?php endif; ?>

          <!-- Customer Account -->
          <?php if ( '1' === $enable_account ) : ?>
          <a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'myaccount' ) : '#' ); ?>" class="mrm-icon-btn" aria-label="<?php esc_attr_e( 'Account', 'mansa-ram-mahajan' ); ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </a>
          <?php endif; ?>

          <!-- Wishlist -->
          <?php if ( '1' === $enable_wishlist ) : ?>
          <a href="#" class="mrm-icon-btn mrm-wishlist-btn" id="mrmWishlistHeaderBtn" aria-label="<?php esc_attr_e( 'Wishlist', 'mansa-ram-mahajan' ); ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
            <span class="mrm-badge-count" id="mrmWishlistCount">0</span>
          </a>
          <?php endif; ?>

          <!-- Cart Bag -->
          <?php if ( '1' === $enable_cart ) : ?>
          <a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_cart_url() : '#mrmCart' ); ?>" class="mrm-icon-btn mrm-cart-btn" aria-label="<?php esc_attr_e( 'Shopping Bag', 'mansa-ram-mahajan' ); ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            <span class="mrm-cart-count"><?php echo ( class_exists( 'WooCommerce' ) && WC()->cart ) ? esc_html( WC()->cart->get_cart_contents_count() ) : '0'; ?></span>
          </a>
          <?php endif; ?>

        </div>

      </div>

      <!-- Main Navigation Menu Bar -->
      <nav class="mrm-primary-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'mansa-ram-mahajan' ); ?>">
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
          <?php wp_nav_menu( array(
              'theme_location' => 'primary',
              'container'      => false,
              'menu_class'     => 'mrm-nav-list',
          ) ); ?>
        <?php else : ?>
          <!-- High-End Luxury Default Navigation matching Reference -->
          <ul class="mrm-nav-list">
            <li><a href="<?php echo esc_url( home_url( '/category/sarees' ) ); ?>"><?php esc_html_e( 'SAREES', 'mansa-ram-mahajan' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/category/lehengas' ) ); ?>"><?php esc_html_e( 'LEHENGAS', 'mansa-ram-mahajan' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/category/suits' ) ); ?>"><?php esc_html_e( 'SUITS', 'mansa-ram-mahajan' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/category/kurtis' ) ); ?>"><?php esc_html_e( 'KURTIS', 'mansa-ram-mahajan' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/category/dresses' ) ); ?>"><?php esc_html_e( 'DRESSES', 'mansa-ram-mahajan' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/new-arrivals' ) ); ?>"><?php esc_html_e( 'NEW ARRIVAL', 'mansa-ram-mahajan' ); ?></a></li>
            <li>
              <a href="<?php echo esc_url( home_url( '/category/luxury' ) ); ?>" class="mrm-nav-luxury">
                <span><?php esc_html_e( 'LUXURY', 'mansa-ram-mahajan' ); ?></span>
              </a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/sale' ) ); ?>" class="mrm-nav-sale">
                <span><?php esc_html_e( 'SALE', 'mansa-ram-mahajan' ); ?></span>
              </a>
            </li>
          </ul>
        <?php endif; ?>
      </nav>

    </div>
  </header>

  <!-- Mobile Drawer Overlay & Panel -->
  <div class="mrm-drawer-overlay" id="mrmDrawerOverlay"></div>
  <aside class="mrm-mobile-drawer" id="mrmMobileDrawer" aria-label="<?php esc_attr_e( 'Mobile Menu', 'mansa-ram-mahajan' ); ?>">
    <div class="mrm-drawer-header">
      <img src="<?php echo esc_url( MRM_THEME_URI . '/assets/images/logo.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="mrm-drawer-logo">
      <button class="mrm-drawer-close" id="mrmDrawerClose" aria-label="<?php esc_attr_e( 'Close Navigation Menu', 'mansa-ram-mahajan' ); ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <div class="mrm-drawer-body">
      <div class="mrm-drawer-search">
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
          <input type="search" placeholder="<?php esc_attr_e( 'Search sarees, lehengas...', 'mansa-ram-mahajan' ); ?>" name="s">
          <button type="submit"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
        </form>
      </div>

      <ul class="mrm-drawer-nav">
        <li><a href="<?php echo esc_url( home_url( '/category/sarees' ) ); ?>"><?php esc_html_e( 'Sarees', 'mansa-ram-mahajan' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/category/lehengas' ) ); ?>"><?php esc_html_e( 'Lehengas', 'mansa-ram-mahajan' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/category/suits' ) ); ?>"><?php esc_html_e( 'Suits & Anarkalis', 'mansa-ram-mahajan' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/category/kurtis' ) ); ?>"><?php esc_html_e( 'Kurtis & Tunics', 'mansa-ram-mahajan' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/category/dresses' ) ); ?>"><?php esc_html_e( 'Gowns & Dresses', 'mansa-ram-mahajan' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/new-arrivals' ) ); ?>"><?php esc_html_e( 'New Arrivals 2026', 'mansa-ram-mahajan' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/category/luxury' ) ); ?>" class="mrm-highlight-gold"><?php esc_html_e( 'Haute Couture Luxury', 'mansa-ram-mahajan' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/sale' ) ); ?>" class="mrm-highlight-pink"><?php esc_html_e( 'Festive Sale (Up to 40% Off)', 'mansa-ram-mahajan' ); ?></a></li>
      </ul>

      <div class="mrm-drawer-footer">
        <a href="#mrmStoresSection" class="mrm-drawer-link">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
          <span><?php esc_html_e( 'Our Delhi NCR Stores', 'mansa-ram-mahajan' ); ?></span>
        </a>
        <a href="tel:+919811122334" class="mrm-drawer-link">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          <span><?php esc_html_e( '+91 98111 22334', 'mansa-ram-mahajan' ); ?></span>
        </a>
      </div>
    </div>
  </aside>

  <main id="mrmPrimaryContent" class="mrm-content">
