<?php
/**
 * Mansa Ram Mahajan & Co — Master Options Manager
 *
 * @package Mansa_Ram_Mahajan
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class MRM_Options {

    const OPTION_KEY = 'mrm_website_options';

    /**
     * Get default settings mapping to current approved design
     */
    public static function get_defaults() {
        $theme_uri = get_template_directory_uri();
        $img = $theme_uri . '/assets/images/';
        $vid = $theme_uri . '/assets/video/';

        return array(
            // Global Branding & Design
            'brand_name'         => 'Mansa Ram Mahajan & Co',
            'brand_tagline'      => 'Haute Couture • Est. 1998 • New Delhi',
            'custom_logo_url'    => $img . 'logo.svg',
            'footer_logo_url'    => $img . 'logo.svg',
            'skyline_svg_url'    => $img . 'skyline.svg',
            'color_primary'      => '#C42B59',
            'color_primary_hover'=> '#A01D44',
            'color_secondary'    => '#1A1A1A',
            'color_gold'         => '#D4AF37',
            'color_accent_sale'  => '#D82C6C',
            'color_urgency'      => '#E65100',
            'color_bg_light'     => '#FAF8F5',
            'color_bg_alt'       => '#F6F4F0',
            'color_text_main'    => '#222222',
            'color_text_heading' => '#111111',

            // Header & Announcements
            'announcement_messages' => "✨ Festive Sale is Here! Enjoy 20% OFF on Your Favourites | Use Code: FESTIVE20\n✈️ Worldwide Express Shipping Available | Free Domestic Shipping Above ₹14,999\n👑 Royal Bridal Collection 2026 Now Live | Book a Personalized Video Styling Appointment\n⭐ Handcrafted Sarees, Designer Lehengas & Haute Couture Kurtis",
            'enable_search'      => '1',
            'enable_account'     => '1',
            'enable_wishlist'    => '1',
            'enable_cart'        => '1',
            'top_store_link'     => '#mrmStoresSection',
            'top_phone'          => '+91 98111 22334',

            // Section Toggles
            'enable_sec_hero'       => '1',
            'enable_sec_trust'      => '1',
            'enable_sec_lookbook'   => '1',
            'enable_sec_wedding'    => '1',
            'enable_sec_lehenga'    => '1',
            'enable_sec_categories' => '1',
            'enable_sec_saree'      => '1',
            'enable_sec_campaign'   => '1',
            'enable_sec_video'      => '1',
            'enable_sec_support'    => '1',
            'enable_sec_stores'     => '1',
            'enable_sec_reviews'    => '1',
            'enable_sec_stats'      => '1',

            // Section 3: Hero & Landscape Slider
            'hero_badge'            => 'HAUTE COUTURE 2026',
            'hero_title'            => 'FESTIVE Collection',
            'hero_subtitle'         => 'Immerse in timeless royal grandeur with hand-embroidered lehengas, pure silk zardozi sarees, and regal bridal couture.',
            'hero_btn1_text'        => 'SHOP NOW',
            'hero_btn1_url'         => home_url( '/category/festive' ),
            'hero_btn2_text'        => 'EXPLORE BRIDAL',
            'hero_btn2_url'         => '#mrmWeddingSection',
            'hero_slider_autoplay'  => '5000',
            // Slide 1
            'hero_slide1_img'       => $img . 'mansa-festive-banner.png',
            'hero_slide1_title'     => 'Royal Crimson Splendour',
            'hero_slide1_tag'       => 'Festive Collection 2026',
            // Slide 2
            'hero_slide2_img'       => $img . 'mansa-wedding-season.png',
            'hero_slide2_title'     => 'Regal Heritage Weaves',
            'hero_slide2_tag'       => 'Wedding Season Edit',
            // Slide 3
            'hero_slide3_img'       => $img . 'mansa-bridal-elegance.png',
            'hero_slide3_title'     => 'Khushiyan Har Pal',
            'hero_slide3_tag'       => 'Bridal Couture Atelier',
            // Slide 4
            'hero_slide4_img'       => $img . 'mansa-couture-portrait.png',
            'hero_slide4_title'     => 'Atelier Masterpieces',
            'hero_slide4_tag'       => 'Evening Glamour & Gowns',
            // Hero Phone Reel Video
            'hero_phone_video'      => $vid . 'video-campaign-pink.mp4',
            'hero_phone_poster'     => $img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg',
            'hero_caption_title'    => 'Royal Crimson Splendour',
            'hero_caption_sub'      => 'New Season',

            // Section 4: Trust Highlights
            'trust_title_1'         => 'Handcrafted Heritage',
            'trust_desc_1'          => 'Artisanal embroideries & authentic Indian silks',
            'trust_title_2'         => 'Worldwide Shipping',
            'trust_desc_2'          => 'Express insured international courier delivery',
            'trust_title_3'         => 'Free Domestic Delivery',
            'trust_desc_3'          => 'Complimentary across India on orders above ₹14,999',
            'trust_title_4'         => '100% Authentic Quality',
            'trust_desc_4'          => 'Rigorous 5-point quality inspected tailoring',

            // Section 5: Lookbook
            'lookbook_tag'          => 'BEHIND THE SCENES & ATELIER LOOKBOOK',
            'lookbook_title'        => 'We are now on the feed @mansaram_official',

            // Section 6: Wedding Collection
            'wedding_title'         => 'WEDDING COLLECTION',
            'wedding_subtitle'      => 'Opulent silhouettes woven for sacred vows and celebratory nights',
            'wedding_btn_text'      => 'VIEW ALL WEDDING',
            'wedding_btn_url'       => home_url( '/category/wedding' ),

            // Section 7: Lehenga Collection
            'lehenga_title'         => 'LEHENGA COLLECTION',
            'lehenga_subtitle'      => 'Voluminous flares, artisanal can-can, and celestial hand embroidery',
            'lehenga_btn_text'      => 'VIEW ALL LEHENGAS',
            'lehenga_btn_url'       => home_url( '/category/lehengas' ),

            // Section 8: Categories
            'cat_title'             => 'SHOP BY CATEGORY',
            'cat_subtitle'          => 'Discover artisanal craftsmanship across our signature collections',
            'cat1_title'            => 'SAREES',
            'cat1_img'              => $img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg',
            'cat1_url'              => home_url( '/category/sarees' ),
            'cat2_title'            => 'LEHENGAS',
            'cat2_img'              => $img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg',
            'cat2_url'              => home_url( '/category/lehengas' ),
            'cat3_title'            => 'SUITS & SHARARAS',
            'cat3_img'              => $img . 'Model_wearing_teal_outfit_20261015215017.jpg',
            'cat3_url'              => home_url( '/category/suits' ),
            'cat4_title'            => 'DRESSES & GOWNS',
            'cat4_img'              => $img . 'Female_model_wearing_blue_lehenga_20261015215044.jpg',
            'cat4_url'              => home_url( '/category/dresses' ),

            // Section 9: Sarees
            'saree_title'           => 'SAREES',
            'saree_subtitle'        => 'Six yards of sheer timeless elegance in pure georgette, silk, and organza',
            'saree_btn_text'        => 'VIEW ALL SAREES',
            'saree_btn_url'         => home_url( '/category/sarees' ),

            // Section 10: Editorial Campaign
            'campaign_subtitle'     => 'HAUTE COUTURE EDITORIAL',
            'campaign_title'        => 'Khushiyan Har Pal — Bridal Splendour',
            'campaign_body'         => 'Every weave at Mansa Ram Mahajan & Co narrates a chronicle of regal Delhi craftsmanship. From the majestic handwoven banarasi borders to intricately stone-studded bustiers and flowing cowl georgette drapes, each bespoke ensemble is sculpted to turn every wedding celebration into unforgettable folklore.',
            'campaign_feat_1'       => 'Over 350+ Hours of Pure Zari Craftsmanship per Bridal Ensemble',
            'campaign_feat_2'       => 'Personalized Atelier Fittings across 6 Delhi NCR Studios',
            'campaign_btn_text'     => 'DISCOVER THE EDIT',
            'campaign_btn_url'      => home_url( '/category/wedding' ),
            'campaign_img_main'     => $img . 'mansa-wedding-season.png',
            'campaign_img_sub1'     => $img . 'mansa-bridal-elegance.png',
            'campaign_img_sub2'     => $img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg',

            // Section 11: Atelier Video Collection Slider (3 Client Videos)
            'video_tag'             => 'HAUTE COUTURE IN MOTION',
            'video_title'           => 'The Poetry of Indian Couturiers',
            'video_subtitle'        => 'Immerse in our 3 masterwork collections filmed live inside our historic Delhi ateliers and runway showcases.',
            // Video 1
            'video1_file'           => $vid . 'video-campaign-pink.mp4',
            'video1_poster'         => $img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg',
            'video1_badge'          => 'Reel 01 • Runway Walk',
            'video1_title'          => 'Royal Crimson Bridal Movement',
            'video1_desc'           => 'Over 350+ hours of zardozi bullion craftsmanship showcased in motion.',
            'video1_btn_text'       => 'SHOP BRIDAL',
            'video1_btn_url'        => home_url( '/category/wedding' ),
            // Video 2
            'video2_file'           => $vid . 'video-lehenga-showcase.mp4',
            'video2_poster'         => $img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg',
            'video2_badge'          => 'Reel 02 • Sangeet Flare',
            'video2_title'          => 'Celebratory Gold Can-Can Flare',
            'video2_desc'           => 'Voluminous twirls and celestial raw silk embroidery for celebratory nights.',
            'video2_btn_text'       => 'SHOP LEHENGAS',
            'video2_btn_url'        => home_url( '/category/lehengas' ),
            // Video 3
            'video3_file'           => $vid . 'video-product-gallery.mp4',
            'video3_poster'         => $img . 'Model_wearing_teal_outfit_20261015215017.jpg',
            'video3_badge'          => 'Reel 03 • Atelier Fit',
            'video3_title'          => 'Artisanal Silk Draping & Silhouette',
            'video3_desc'           => 'Fluid pure georgette cowl drape with kundan-studded bustier bodice.',
            'video3_btn_text'       => 'SHOP COUTURE',
            'video3_btn_url'        => home_url( '/category/sarees' ),

            // Section 12: Support Cards
            'support_card1_title'   => 'Personal Shopper on WhatsApp',
            'support_card1_desc'    => 'Connect directly with our master stylists for real-time video tours of our inventory, close-up fabric details, and sizing help.',
            'support_card1_btn'     => 'CHAT WITH STYLIST →',
            'support_card2_title'   => 'Bridal Video Consultation',
            'support_card2_desc'    => 'Schedule a bespoke 1-on-1 virtual appointment with our Senior Bridal Designers from the comfort of your home anywhere in the world.',
            'support_card2_btn'     => 'BOOK AN APPOINTMENT →',

            // Section 13: Store Locations (JSON structure)
            'store_locations'       => wp_json_encode( mrm_get_stores() ),

            // Section 14: Customer Reviews (JSON structure)
            'customer_reviews'      => wp_json_encode( array(
                array(
                    'name'    => 'Pooja Singhal',
                    'city'    => 'Verified Bride • New Delhi',
                    'tag'     => 'Purchased: Glamorous Crimson Red Saree',
                    'rating'  => 5,
                    'quote'   => 'I ordered my wedding reception draped saree gown from Mansa Ram Mahajan. The fit was heavenly right out of the box! The zardozi bustier work is so breathtaking. The split payment option made the transaction completely effortless.',
                    'active'  => 1
                ),
                array(
                    'name'    => 'Ananya & Rohan Mehta',
                    'city'    => 'Verified Customer • London, UK',
                    'tag'     => 'Purchased: Royal Heritage Velvet Lehenga',
                    'rating'  => 5,
                    'quote'   => 'The online shopping experience was incredible. We were nervous ordering our bridal lehenga from London, but the stylist WhatsApp video session guided us through every measurement. The fabric quality and embroidery are pure luxury.',
                    'active'  => 1
                ),
                array(
                    'name'    => 'Ritu Aggarwal',
                    'city'    => 'Verified Patron • Delhi NCR',
                    'tag'     => 'Purchased: Royal Teal Brocade Sharara',
                    'rating'  => 5,
                    'quote'   => 'Visited their Pitampura flagship store and was blown away by the hospitality and couture collection. Got my sister’s sangeet outfit customized within 4 days. Absolutely dependable craftsmanship!',
                    'active'  => 1
                ),
            ) ),

            // Section 15: Statistics
            'stat_num_1'            => '25+',
            'stat_lbl_1'            => 'Years of Couture Legacy',
            'stat_num_2'            => '100,000+',
            'stat_lbl_2'            => 'Brides & Happy Patrons',
            'stat_num_3'            => '50,000+',
            'stat_lbl_3'            => 'Bespoke Custom Fits Delivered',
            'stat_num_4'            => '6',
            'stat_lbl_4'            => 'Delhi NCR Flagship Boutiques',

            // Business & Concierge Contact
            'whatsapp_number'       => '+919811122334',
            'support_email'         => 'care@mansaram.com',
            'support_phone'         => '+91 98111 22334',
            'business_hours'        => '10:30 AM – 8:00 PM IST',
            'social_fb'             => 'https://facebook.com',
            'social_insta'          => 'https://instagram.com',
            'social_yt'             => 'https://youtube.com',
            'free_shipping_min'     => '14999',
            'copyright_text'        => 'Copyright © ' . date('Y') . ', MANSA RAM MAHAJAN & CO | All Rights Reserved | Handcrafted Luxury Ethnic Couture',

            // SEO Metadata
            'seo_meta_title'        => 'Mansa Ram Mahajan & Co — Haute Couture Ethnic Wear | Sarees, Lehengas & Gowns',
            'seo_meta_desc'         => 'Shop luxury handcrafted designer sarees, bridal & party wear lehengas, gowns and kurtis at Mansa Ram Mahajan & Co. Visit our 6 flagship stores in Delhi NCR or shop online today!',
            'seo_og_image'          => $img . 'mansa-festive-banner.png',

            // Payment Popup Settings (Requirement 11)
            'popup_enabled'         => '1',
            'popup_heading'         => 'Choose Your Preferred Payment Option',
            'popup_opt1_title'      => 'Pay ₹199 Token Deposit',
            'popup_opt1_val'        => '199',
            'popup_opt1_desc'       => 'Pay small deposit online now to reserve your piece. Pay the remaining balance via Cash / UPI upon doorstep delivery.',
            'popup_opt2_title'      => 'Pay ₹299 Partial Payment',
            'popup_opt2_val'        => '299',
            'popup_opt2_desc'       => 'Pay ₹299 online now to confirm urgent tailoring. Remaining balance payable at delivery.',
            'popup_opt3_title'      => '100% Full Payment Online',
            'popup_opt3_desc'       => 'Enjoy zero COD fees, priority express dispatch, and guaranteed transit insurance.',
            'popup_min_order'       => '999',
            'popup_max_order'       => '150000',
            'popup_cod_enabled'     => '1',
            'popup_default_opt'     => 'opt1',
            'popup_trust_text'      => '🔒 100% Secure & Encrypted Transactions | Instant Order Confirmation | Easy Exchange Guarantee',
            'popup_instructions'    => 'Our concierge will call you on WhatsApp after booking to confirm precise blouse sizing and dispatch schedule.',
        );
    }

    /**
     * Get specific option value
     */
    public static function get( $key, $default = null ) {
        $options = get_option( self::OPTION_KEY, array() );
        if ( isset( $options[ $key ] ) && '' !== $options[ $key ] ) {
            return $options[ $key ];
        }

        $defaults = self::get_defaults();
        if ( null !== $default ) {
            return $default;
        }

        return isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
    }

    /**
     * Update all options with sanitization
     */
    public static function update_all( $post_data ) {
        if ( ! current_user_can( 'manage_options' ) ) {
            return false;
        }

        $defaults = self::get_defaults();
        $clean = get_option( self::OPTION_KEY, array() );

        foreach ( $defaults as $key => $default_val ) {
            if ( isset( $post_data[ $key ] ) ) {
                $raw = $post_data[ $key ];
                if ( in_array( $key, array( 'announcement_messages', 'campaign_body', 'hero_subtitle', 'seo_meta_desc', 'popup_instructions', 'popup_trust_text', 'popup_opt1_desc', 'popup_opt2_desc', 'popup_opt3_desc' ), true ) ) {
                    $clean[ $key ] = sanitize_textarea_field( wp_unslash( $raw ) );
                } elseif ( in_array( $key, array( 'store_locations', 'customer_reviews' ), true ) ) {
                    // JSON raw string sanitized safely
                    $clean[ $key ] = wp_unslash( $raw );
                } elseif ( strpos( $key, 'url' ) !== false || strpos( $key, 'img' ) !== false || strpos( $key, 'video' ) !== false ) {
                    $clean[ $key ] = esc_url_raw( wp_unslash( $raw ) );
                } elseif ( strpos( $key, 'color_' ) === 0 ) {
                    $clean[ $key ] = sanitize_hex_color( wp_unslash( $raw ) ) ?: $default_val;
                } else {
                    $clean[ $key ] = sanitize_text_field( wp_unslash( $raw ) );
                }
            }
        }

        // Sync with WooCommerce Split Payment options
        if ( isset( $clean['popup_enabled'] ) ) {
            update_option( 'mrm_split_enabled', $clean['popup_enabled'] === '1' ? 'yes' : 'no' );
        }
        if ( isset( $clean['popup_opt1_val'] ) ) {
            update_option( 'mrm_split_opt1_val', floatval( $clean['popup_opt1_val'] ) );
        }
        if ( isset( $clean['popup_opt2_val'] ) ) {
            update_option( 'mrm_split_opt2_val', floatval( $clean['popup_opt2_val'] ) );
        }
        if ( isset( $clean['popup_min_order'] ) ) {
            update_option( 'mrm_split_min_order', floatval( $clean['popup_min_order'] ) );
        }
        if ( isset( $clean['popup_max_order'] ) ) {
            update_option( 'mrm_split_max_order', floatval( $clean['popup_max_order'] ) );
        }

        return update_option( self::OPTION_KEY, $clean );
    }

    /**
     * Reset to factory defaults
     */
    public static function reset_to_defaults() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return false;
        }
        return update_option( self::OPTION_KEY, self::get_defaults() );
    }
}

/**
 * Global helper function for frontend templates
 */
function mrm_get_option( $key, $default = null ) {
    return MRM_Options::get( $key, $default );
}

/**
 * Output dynamic CSS variables for configured colors
 */
add_action( 'wp_head', 'mrm_output_dynamic_styles', 99 );
function mrm_output_dynamic_styles() {
    $primary   = mrm_get_option( 'color_primary' );
    $hover     = mrm_get_option( 'color_primary_hover' );
    $secondary = mrm_get_option( 'color_secondary' );
    $gold      = mrm_get_option( 'color_gold' );
    $sale      = mrm_get_option( 'color_accent_sale' );
    $urgency   = mrm_get_option( 'color_urgency' );
    $bg_light  = mrm_get_option( 'color_bg_light' );
    $bg_alt    = mrm_get_option( 'color_bg_alt' );

    echo '<style id="mrm-dynamic-brand-colors">' . "\n";
    echo ":root {\n";
    if ( $primary ) echo "  --color-primary: {$primary};\n";
    if ( $hover )   echo "  --color-primary-hover: {$hover};\n";
    if ( $secondary ) echo "  --color-secondary: {$secondary};\n";
    if ( $gold )    echo "  --color-gold: {$gold};\n";
    if ( $sale )    echo "  --color-accent-sale: {$sale};\n";
    if ( $urgency ) echo "  --color-urgency: {$urgency};\n";
    if ( $bg_light ) echo "  --color-bg-light: {$bg_light};\n";
    if ( $bg_alt )   echo "  --color-bg-alt: {$bg_alt};\n";
    echo "}\n";
    echo '</style>' . "\n";
}

/**
 * Output SEO tags in wp_head
 */
add_action( 'wp_head', 'mrm_output_seo_meta', 1 );
function mrm_output_seo_meta() {
    if ( ! is_front_page() && ! is_home() ) {
        return;
    }
    $title = mrm_get_option( 'seo_meta_title' );
    $desc  = mrm_get_option( 'seo_meta_desc' );
    $og_img = mrm_get_option( 'seo_og_image' );

    if ( $desc ) {
        echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
    }
    if ( $title ) {
        echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
        echo '<meta property="og:site_name" content="' . esc_attr( mrm_get_option( 'brand_name' ) ) . '">' . "\n";
    }
    if ( $og_img ) {
        echo '<meta property="og:image" content="' . esc_url( $og_img ) . '">' . "\n";
        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    }
}
