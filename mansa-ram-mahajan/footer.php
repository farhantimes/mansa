<?php
/**
 * Mansa Ram Mahajan & Co Footer Template
 *
 * @package Mansa_Ram_Mahajan
 */
?>
  </main><!-- #mrmPrimaryContent -->

  <!-- =========================================================================
       SECTION 16: EDITORIAL FOOTER & HERITAGE SKYLINE
       ========================================================================= -->
  <footer class="mrm-footer" id="mrmFooter">
    
    <!-- Indian Monuments Architectural Skyline Artwork -->
    <div class="mrm-footer-skyline-wrapper">
      <?php $skyline = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'skyline_svg_url' ) : MRM_THEME_URI . '/assets/images/skyline.svg'; ?>
      <img src="<?php echo esc_url( $skyline ); ?>" alt="<?php esc_attr_e( 'Delhi Heritage Monuments Skyline', 'mansa-ram-mahajan' ); ?>" class="mrm-footer-skyline" width="1440" height="180" loading="lazy">
    </div>

    <!-- Main Footer Links Grid -->
    <div class="mrm-footer-main">
      <div class="mrm-container">
        <div class="mrm-footer-grid">

          <!-- Col 1: Brand Story & Monogram -->
          <div class="mrm-footer-col mrm-footer-brand">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mrm-footer-logo-link">
              <?php $footer_logo = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'footer_logo_url' ) : MRM_THEME_URI . '/assets/images/logo.svg'; ?>
              <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="mrm-footer-logo" width="340" height="40">
            </a>
            <p class="mrm-footer-desc">
              <?php esc_html_e( 'Mansa Ram Mahajan & Co presents a refined range of ethnic couture, thoughtfully handcrafted to reflect centuries of Indian artisanal sophistication, unparalleled textile heritage, and modern grace.', 'mansa-ram-mahajan' ); ?>
            </p>
            <div class="mrm-trust-stamps">
              <span class="mrm-trust-stamp">✨ 100% Handcrafted</span>
              <span class="mrm-trust-stamp">🔒 Safe &amp; Secure Checkout</span>
            </div>
          </div>

          <!-- Col 2: SHOP -->
          <div class="mrm-footer-col">
            <h4 class="mrm-footer-title"><?php esc_html_e( 'SHOP', 'mansa-ram-mahajan' ); ?></h4>
            <ul class="mrm-footer-links">
              <li><a href="<?php echo esc_url( home_url( '/category/sarees' ) ); ?>"><?php esc_html_e( 'Sarees', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/category/lehengas' ) ); ?>"><?php esc_html_e( 'Lehengas', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/category/suits' ) ); ?>"><?php esc_html_e( 'Suits &amp; Shararas', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/category/kurtis' ) ); ?>"><?php esc_html_e( 'Kurtis &amp; Tunics', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/category/dresses' ) ); ?>"><?php esc_html_e( 'Dresses &amp; Gowns', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/new-arrivals' ) ); ?>"><?php esc_html_e( 'New Arrivals', 'mansa-ram-mahajan' ); ?></a></li>
            </ul>
          </div>

          <!-- Col 3: ABOUT -->
          <div class="mrm-footer-col">
            <h4 class="mrm-footer-title"><?php esc_html_e( 'ABOUT', 'mansa-ram-mahajan' ); ?></h4>
            <ul class="mrm-footer-links">
              <li><a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>"><?php esc_html_e( 'About Us', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/luxury' ) ); ?>"><?php esc_html_e( 'Haute Couture', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="#mrmStoresSection"><?php esc_html_e( 'Our Delhi NCR Stores', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/careers' ) ); ?>"><?php esc_html_e( 'Careers', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Editorial Lookbook', 'mansa-ram-mahajan' ); ?></a></li>
            </ul>
          </div>

          <!-- Col 4: OUR POLICY -->
          <div class="mrm-footer-col">
            <h4 class="mrm-footer-title"><?php esc_html_e( 'OUR POLICY', 'mansa-ram-mahajan' ); ?></h4>
            <ul class="mrm-footer-links">
              <li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/terms-conditions' ) ); ?>"><?php esc_html_e( 'Terms &amp; Conditions', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/shipping-policy' ) ); ?>"><?php esc_html_e( 'Shipping Policy', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/refund-policy' ) ); ?>"><?php esc_html_e( 'Refund &amp; Exchange', 'mansa-ram-mahajan' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/custom-orders' ) ); ?>"><?php esc_html_e( 'Bespoke Bridal Orders', 'mansa-ram-mahajan' ); ?></a></li>
            </ul>
          </div>

          <!-- Col 5: HELP & CONTACT -->
          <div class="mrm-footer-col mrm-footer-contact">
            <h4 class="mrm-footer-title"><?php esc_html_e( 'HELP &amp; CONCIERGE', 'mansa-ram-mahajan' ); ?></h4>
            <?php
            $email = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'support_email', 'care@mansaram.com' ) : 'care@mansaram.com';
            $phone = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'support_phone', '+91 98111 22334' ) : '+91 98111 22334';
            $hours = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'business_hours', '10:30 AM – 8:00 PM IST' ) : '10:30 AM – 8:00 PM IST';
            $fb    = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'social_fb', 'https://facebook.com' ) : 'https://facebook.com';
            $insta = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'social_insta', 'https://instagram.com' ) : 'https://instagram.com';
            $yt    = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'social_yt', 'https://youtube.com' ) : 'https://youtube.com';
            $wa    = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'whatsapp_number', '+919811122334' ) : '+919811122334';
            $wa_clean = preg_replace( '/[^0-9]/', '', $wa );
            $copyright = function_exists( 'mrm_get_option' ) ? mrm_get_option( 'copyright_text' ) : '';
            if ( empty( $copyright ) ) {
                $copyright = sprintf( 'Copyright © %1$s, MANSA RAM MAHAJAN & CO | All Rights Reserved | Handcrafted Luxury Ethnic Couture', date( 'Y' ) );
            }
            ?>
            <div class="mrm-contact-info">
              <p><strong><?php esc_html_e( 'Email:', 'mansa-ram-mahajan' ); ?></strong> <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
              <p><strong><?php esc_html_e( 'Phone:', 'mansa-ram-mahajan' ); ?></strong> <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
              <p><strong><?php esc_html_e( 'Hours:', 'mansa-ram-mahajan' ); ?></strong> <?php echo esc_html( $hours ); ?></p>
            </div>

            <div class="mrm-social-links-wrap">
              <h5 class="mrm-social-title"><?php esc_html_e( 'Follow Us:', 'mansa-ram-mahajan' ); ?></h5>
              <div class="mrm-social-icons">
                <a href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                </a>
                <a href="<?php echo esc_url( $insta ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                </a>
                <a href="<?php echo esc_url( $yt ); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="#FFFFFF"></polygon></svg>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Bottom Pink Copyright Bar -->
    <div class="mrm-footer-bottom">
      <div class="mrm-container">
        <p class="mrm-copyright">
          <?php echo esc_html( $copyright ); ?>
        </p>
      </div>
    </div>

  </footer>

  <!-- Floating WhatsApp Concierge Button -->
  <a href="https://wa.me/<?php echo esc_attr( $wa_clean ); ?>?text=<?php echo rawurlencode( 'Hello Mansa Ram Mahajan & Co! I would like bridal styling and shopping assistance.' ); ?>" class="mrm-whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Chat with our stylist on WhatsApp', 'mansa-ram-mahajan' ); ?>">
    <svg width="32" height="32" viewBox="0 0 24 24" fill="#FFFFFF">
      <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
    </svg>
  </a>

  <!-- Global Video Modal (for section 11 & lookbook video previews) -->
  <div class="mrm-modal-backdrop" id="mrmVideoModal" style="display:none;" aria-hidden="true" role="dialog">
    <div class="mrm-video-modal-dialog">
      <button class="mrm-modal-close-btn" id="mrmVideoModalClose" aria-label="Close Video">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      </button>
      <div class="mrm-video-modal-container">
        <video id="mrmGlobalVideoPlayer" controls playsinline>
          <source src="<?php echo esc_url( MRM_THEME_URI . '/assets/video/video-campaign-pink.mp4' ); ?>" type="video/mp4">
        </video>
      </div>
    </div>
  </div>

  <!-- Global Size Guide Modal -->
  <div class="mrm-modal-backdrop" id="mrmSizeGuideModal" style="display:none;" aria-hidden="true" role="dialog">
    <div class="mrm-size-guide-dialog">
      <div class="mrm-size-guide-header">
        <h3><?php esc_html_e( 'Mansa Ram Mahajan Size & Measurement Guide', 'mansa-ram-mahajan' ); ?></h3>
        <button class="mrm-modal-close-btn" id="mrmSizeGuideClose" aria-label="Close Size Guide">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
      </div>
      <div class="mrm-size-guide-body">
        <p class="mrm-size-guide-note"><?php esc_html_e( 'All measurements are in inches. Custom tailoring and bridal blouse stitching is available upon request.', 'mansa-ram-mahajan' ); ?></p>
        <div class="mrm-table-responsive">
          <table class="mrm-size-table">
            <thead>
              <tr>
                <th><?php esc_html_e( 'Size', 'mansa-ram-mahajan' ); ?></th>
                <th><?php esc_html_e( 'Bust (Inches)', 'mansa-ram-mahajan' ); ?></th>
                <th><?php esc_html_e( 'Waist (Inches)', 'mansa-ram-mahajan' ); ?></th>
                <th><?php esc_html_e( 'Hip (Inches)', 'mansa-ram-mahajan' ); ?></th>
                <th><?php esc_html_e( 'Blouse Length', 'mansa-ram-mahajan' ); ?></th>
              </tr>
            </thead>
            <tbody>
              <tr><td><strong>XS</strong></td><td>32 - 33</td><td>26 - 27</td><td>35 - 36</td><td>14</td></tr>
              <tr><td><strong>S</strong></td><td>34 - 35</td><td>28 - 29</td><td>37 - 38</td><td>14.5</td></tr>
              <tr><td><strong>M</strong></td><td>36 - 37</td><td>30 - 31</td><td>39 - 40</td><td>15</td></tr>
              <tr><td><strong>L</strong></td><td>38 - 40</td><td>32 - 34</td><td>41 - 43</td><td>15.5</td></tr>
              <tr><td><strong>XL</strong></td><td>41 - 43</td><td>35 - 37</td><td>44 - 46</td><td>16</td></tr>
              <tr><td><strong>FREE SIZE</strong></td><td>Adjustable (34-42)</td><td>Adjustable (28-36)</td><td>Flared / Free</td><td>15</td></tr>
            </tbody>
          </table>
        </div>
        <div class="mrm-size-guide-cta">
          <span>Need help finding your exact fit?</span>
          <a href="https://wa.me/919811122334?text=<?php echo rawurlencode( 'Hi, I need assistance with my measurements for Mansa Ram Mahajan outfits.' ); ?>" class="mrm-btn mrm-btn-primary" target="_blank"><?php esc_html_e( 'Chat with Stylist', 'mansa-ram-mahajan' ); ?></a>
        </div>
      </div>
    </div>
  </div>

  <!-- =========================================================================
       SLIDE-IN CART DRAWER (RIGHT SIDE)
       ========================================================================= -->
  <div class="mrm-cart-overlay" id="mrmCartOverlay"></div>
  <aside class="mrm-cart-drawer" id="mrmCartDrawer" aria-label="<?php esc_attr_e( 'Shopping Bag', 'mansa-ram-mahajan' ); ?>">
    <div class="mrm-cart-header">
      <div class="mrm-cart-title-wrap">
        <h3 class="mrm-cart-title"><?php esc_html_e( 'SHOPPING BAG', 'mansa-ram-mahajan' ); ?></h3>
        <span class="mrm-cart-count-badge" id="mrmCartDrawerCountBadge">1 item</span>
      </div>
      <button class="mrm-cart-close" id="mrmCartClose" aria-label="<?php esc_attr_e( 'Close Shopping Bag', 'mansa-ram-mahajan' ); ?>">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Free Shipping Progress Bar -->
    <div class="mrm-shipping-bar-wrapper" id="mrmShippingBarWrapper">
      <div class="mrm-shipping-bar-text" id="mrmShippingBarText">
        <span>Add <strong>₹ 8,004.00</strong> more to unlock <strong>FREE Express Shipping</strong>!</span>
      </div>
      <div class="mrm-shipping-progress">
        <div class="mrm-shipping-progress-fill" id="mrmShippingProgressFill" style="width: 47%;"></div>
      </div>
    </div>

    <!-- Drawer Body -->
    <div class="mrm-cart-body" id="mrmCartBody">
      <div class="mrm-cart-items" id="mrmCartItemsList"></div>

      <!-- Empty State -->
      <div class="mrm-cart-empty" id="mrmCartEmpty" style="display:none;">
        <div class="mrm-cart-empty-icon">
          <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#C42B59" stroke-width="1.5">
            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <path d="M16 10a4 4 0 0 1-8 0"></path>
          </svg>
        </div>
        <h4><?php esc_html_e( 'Your Shopping Bag is Empty', 'mansa-ram-mahajan' ); ?></h4>
        <p><?php esc_html_e( 'Indulge in our exquisite handcrafted bridal lehengas, silk sarees, and festive designer suits.', 'mansa-ram-mahajan' ); ?></p>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="mrm-btn mrm-btn-primary"><?php esc_html_e( 'EXPLORE NEW ARRIVALS', 'mansa-ram-mahajan' ); ?></a>
      </div>

      <!-- Cross-Sell Section -->
      <div class="mrm-cross-sell-section" id="mrmCrossSellSection">
        <div class="mrm-cross-sell-header">
          <span class="mrm-cross-sell-badge"><?php esc_html_e( 'RECOMMENDED PAIRING', 'mansa-ram-mahajan' ); ?></span>
          <h4 class="mrm-cross-sell-title"><?php esc_html_e( 'Complete Your Royal Look', 'mansa-ram-mahajan' ); ?></h4>
        </div>
        <div class="mrm-cross-sell-list">
          <div class="mrm-cross-card">
            <div class="mrm-cross-thumb">
              <img src="<?php echo esc_url( MRM_THEME_URI . '/assets/images/Female_model_wearing_blue_lehenga_20261015215044.jpg' ); ?>" alt="Zari Silk Dupatta">
            </div>
            <div class="mrm-cross-meta">
              <h5>Royal Gold Zari Silk Dupatta</h5>
              <div class="mrm-cross-price">₹ 1,895.00</div>
            </div>
            <button type="button" class="mrm-cross-add-btn" data-id="901" data-title="Royal Gold Zari Silk Dupatta" data-price="1895" data-color="GOLD" data-size="FREE SIZE" data-img="<?php echo esc_url( MRM_THEME_URI . '/assets/images/Female_model_wearing_blue_lehenga_20261015215044.jpg' ); ?>">
              <span>+ Add</span>
            </button>
          </div>

          <div class="mrm-cross-card">
            <div class="mrm-cross-thumb">
              <img src="<?php echo esc_url( MRM_THEME_URI . '/assets/images/Model_posing_in_lehenga_choli_20261015215038.jpg' ); ?>" alt="Velvet Embroidered Potli Bag">
            </div>
            <div class="mrm-cross-meta">
              <h5>Velvet Handcrafted Potli Bag</h5>
              <div class="mrm-cross-price">₹ 1,295.00</div>
            </div>
            <button type="button" class="mrm-cross-add-btn" data-id="902" data-title="Velvet Handcrafted Potli Bag" data-price="1295" data-color="MAROON" data-size="STANDARD" data-img="<?php echo esc_url( MRM_THEME_URI . '/assets/images/Model_posing_in_lehenga_choli_20261015215038.jpg' ); ?>">
              <span>+ Add</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Drawer Footer -->
    <div class="mrm-cart-footer" id="mrmCartFooter">
      <div class="mrm-cart-subtotal-row">
        <span class="mrm-subtotal-label"><?php esc_html_e( 'Subtotal', 'mansa-ram-mahajan' ); ?></span>
        <span class="mrm-subtotal-value" id="mrmCartSubtotalVal">₹ 6,995.00</span>
      </div>
      <div class="mrm-cart-tax-notice"><?php esc_html_e( 'Taxes included. Free domestic courier delivery.', 'mansa-ram-mahajan' ); ?></div>
      
      <div class="mrm-cart-actions">
        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="mrm-btn mrm-btn-primary mrm-btn-checkout" id="mrmCheckoutBtn">
          <span><?php esc_html_e( 'CONTINUE TO CHECKOUT', 'mansa-ram-mahajan' ); ?></span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
      </div>

      <div class="mrm-cart-split-badge" id="mrmCartSplitTrigger">
        <span>✨ Or Pay only <strong>₹199 token deposit</strong> now &amp; balance on delivery</span>
      </div>

      <div class="mrm-cart-trust-row">
        <span>🔒 256-Bit SSL Encrypted</span>
        <span>📦 Insured Delivery</span>
        <span>↩ 7-Day Easy Exchange</span>
      </div>
    </div>
  </aside>

</div><!-- #mrm-page-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
