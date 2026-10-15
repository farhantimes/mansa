<?php
/**
 * Mansa Ram Mahajan Customizer Controls
 *
 * @package Mansa_Ram_Mahajan
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mrm_customize_register( $wp_customize ) {
    // Section: Announcement Bar
    $wp_customize->add_section( 'mrm_announcement_section', array(
        'title'    => __( 'MRM Announcement Bar', 'mansa-ram-mahajan' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'mrm_announcements_text', array(
        'default'           => "✨ Festive Sale is Here! Enjoy 20% OFF on Your Favourites | Use Code: FESTIVE20\n✈️ Worldwide Express Shipping Available | Free Domestic Shipping Above ₹14,999\n👑 Royal Bridal Collection 2026 Now Live | Book a Personalized Video Styling Appointment",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'mrm_announcements_text', array(
        'label'       => __( 'Rotating Announcements (One per line)', 'mansa-ram-mahajan' ),
        'section'     => 'mrm_announcement_section',
        'type'        => 'textarea',
        'description' => __( 'Each line will rotate smoothly across the top announcement strip.', 'mansa-ram-mahajan' ),
    ) );

    // Section: Shopping & Shipping Rules
    $wp_customize->add_section( 'mrm_commerce_rules_section', array(
        'title'    => __( 'MRM Commerce & Shipping Offers', 'mansa-ram-mahajan' ),
        'priority' => 32,
    ) );

    $wp_customize->add_setting( 'mrm_free_shipping_threshold', array(
        'default'           => '14999',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'mrm_free_shipping_threshold', array(
        'label'   => __( 'Free Shipping Min Order (₹)', 'mansa-ram-mahajan' ),
        'section' => 'mrm_commerce_rules_section',
        'type'    => 'number',
    ) );

    $wp_customize->add_setting( 'mrm_whatsapp_number', array(
        'default'           => '+919811122334',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'mrm_whatsapp_number', array(
        'label'   => __( 'WhatsApp Customer Support Number (with Country Code)', 'mansa-ram-mahajan' ),
        'section' => 'mrm_commerce_rules_section',
        'type'    => 'text',
    ) );
}
add_action( 'customize_register', 'mrm_customize_register' );
