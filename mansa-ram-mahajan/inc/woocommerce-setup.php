<?php
/**
 * Mansa Ram Mahajan WooCommerce Integration & Hooks
 *
 * @package Mansa_Ram_Mahajan
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Remove default WooCommerce wrappers and replace with custom theme containers
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'mrm_wc_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'mrm_wc_wrapper_end', 10 );

function mrm_wc_wrapper_start() {
    echo '<div class="mrm-wc-page-wrapper"><div class="mrm-container">';
}

function mrm_wc_wrapper_end() {
    echo '</div></div>';
}

/**
 * Customize WooCommerce Breadcrumbs
 */
add_filter( 'woocommerce_breadcrumb_defaults', function() {
    return array(
        'delimiter'   => '<span class="mrm-breadcrumb-sep">/</span>',
        'wrap_before' => '<nav class="mrm-breadcrumbs" aria-label="Breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '<span class="mrm-breadcrumb-item">',
        'after'       => '</span>',
        'home'        => _x( 'Home', 'breadcrumb', 'mansa-ram-mahajan' ),
    );
} );

/**
 * Update Mini Cart Count via AJAX
 */
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
    ob_start();
    ?>
    <span class="mrm-cart-count"><?php echo WC()->cart ? esc_html( WC()->cart->get_cart_contents_count() ) : '0'; ?></span>
    <?php
    $fragments['span.mrm-cart-count'] = ob_get_clean();
    return $fragments;
} );

/**
 * AJAX Live Product Search Handler
 */
add_action( 'wp_ajax_mrm_live_search', 'mrm_ajax_live_search' );
add_action( 'wp_ajax_nopriv_mrm_live_search', 'mrm_ajax_live_search' );

function mrm_ajax_live_search() {
    check_ajax_referer( 'mrm_theme_nonce', 'nonce' );

    $query = sanitize_text_field( $_POST['keyword'] ?? '' );
    if ( empty( $query ) || strlen( $query ) < 2 ) {
        wp_send_json_error( array( 'message' => 'Query too short' ) );
    }

    $results = array();

    if ( class_exists( 'WC_Product_Query' ) ) {
        $args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => 5,
            's'              => $query,
        );
        $products = new WP_Query( $args );

        if ( $products->have_posts() ) {
            while ( $products->have_posts() ) {
                $products->the_post();
                $product = wc_get_product( get_the_ID() );
                $results[] = array(
                    'title' => get_the_title(),
                    'url'   => get_permalink(),
                    'price' => $product ? $product->get_price_html() : '',
                    'image' => get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ),
                );
            }
            wp_reset_postdata();
        }
    }

    wp_send_json_success( $results );
}

/**
 * Catalog Mock Products Provider (Fallback when empty database)
 */
function mrm_get_demo_products() {
    $theme_img = MRM_THEME_URI . '/assets/images/';
    return array(
        array(
            'id'          => 101,
            'title'       => 'Glamorous Crimson Red Embellished Draped Saree Gown',
            'category'    => 'Sarees',
            'price'       => '₹ 6,995.00',
            'regular_price' => '₹ 8,995.00',
            'discount'    => '22% OFF',
            'image'       => $theme_img . 'Woman_wearing_red_bridal_lehenga_20261015215058.jpg',
            'hover_image' => $theme_img . 'Woman_modeling_red_bridal_lehenga_20261015215042.jpg',
            'badge'       => 'Best Seller',
            'stock'       => 1,
            'sku'         => 'MRM-CR-150',
            'rating'      => 5,
            'reviews'     => 18,
        ),
        array(
            'id'          => 102,
            'title'       => 'Regal Crimson Red Embroidered Anarkali & Sharara Set',
            'category'    => 'Suits',
            'price'       => '₹ 9,585.00',
            'regular_price' => '₹ 11,995.00',
            'discount'    => '20% OFF',
            'image'       => $theme_img . 'Model_wearing_red_bridal_lehenga_20261015215105.jpg',
            'hover_image' => $theme_img . 'Model_wearing_embroidered_outfit_20261015215056.jpg',
            'badge'       => 'Festive New',
            'stock'       => 4,
            'sku'         => 'MRM-SU-204',
            'rating'      => 4.9,
            'reviews'     => 12,
        ),
        array(
            'id'          => 103,
            'title'       => 'Royal Teal Silk Brocade Halter Sharara Set',
            'category'    => 'Suits',
            'price'       => '₹ 9,185.00',
            'regular_price' => '₹ 10,995.00',
            'discount'    => '16% OFF',
            'image'       => $theme_img . 'Model_wearing_teal_outfit_20261015215017.jpg',
            'hover_image' => $theme_img . 'Model_wearing_traditional_outfit_20261015215051.jpg',
            'badge'       => 'Trending',
            'stock'       => 3,
            'sku'         => 'MRM-TL-308',
            'rating'      => 4.8,
            'reviews'     => 9,
        ),
        array(
            'id'          => 104,
            'title'       => 'Royal Heritage Embroidered Bridal Lehenga in Midnight Blue',
            'category'    => 'Lehengas',
            'price'       => '₹ 14,985.00',
            'regular_price' => '₹ 18,995.00',
            'discount'    => '21% OFF',
            'image'       => $theme_img . 'Female_model_wearing_blue_lehenga_20261015215044.jpg',
            'hover_image' => $theme_img . 'Model_wearing_blue_lehenga_20261015215049.jpg',
            'badge'       => 'Bridal Couture',
            'stock'       => 2,
            'sku'         => 'MRM-BL-401',
            'rating'      => 5,
            'reviews'     => 27,
        ),
        array(
            'id'          => 105,
            'title'       => 'Zari Embroidered Sunset Orange & Gold Bridal Lehenga',
            'category'    => 'Lehengas',
            'price'       => '₹ 12,495.00',
            'regular_price' => '₹ 15,995.00',
            'discount'    => '22% OFF',
            'image'       => $theme_img . 'Model_wearing_orange_gold_lehenga_20261015215028.jpg',
            'hover_image' => $theme_img . 'Model_posing_in_lehenga_choli_20261015215038.jpg',
            'badge'       => 'Special Edit',
            'stock'       => 3,
            'sku'         => 'MRM-OG-509',
            'rating'      => 4.9,
            'reviews'     => 14,
        ),
        array(
            'id'          => 106,
            'title'       => 'Dusty Rose Gota Patti Embellished Georgette Saree',
            'category'    => 'Sarees',
            'price'       => '₹ 7,495.00',
            'regular_price' => '₹ 9,995.00',
            'discount'    => '25% OFF',
            'image'       => $theme_img . 'Model_posing_in_pink_outfit_20261015215033.jpg',
            'hover_image' => $theme_img . 'Model_wearing_lehenga_choli_20261015215046.jpg',
            'badge'       => 'Limited Stock',
            'stock'       => 1,
            'sku'         => 'MRM-PK-602',
            'rating'      => 5,
            'reviews'     => 22,
        ),
    );
}
