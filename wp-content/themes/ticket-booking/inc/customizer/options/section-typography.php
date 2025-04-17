<?php
/**
 * Theme Customizer Controls
 *
 * @package Ticket Booking
 */

if ( ! function_exists( 'ticket_booking_customizer_typography_setting_register' ) ) :
function ticket_booking_customizer_typography_setting_register( $wp_customize ) {

    // Add Typography Panel for Body and Heading
    $wp_customize->add_panel(
        'ticket_booking_typography_settings_panel',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Typography Settings', 'ticket-booking' ),
        )
    );

    // Section Body Typography
    $wp_customize->add_section(
        'ticket_booking_body_typography_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Body', 'ticket-booking' ),
            'panel'         => 'ticket_booking_typography_settings_panel',
        )
    );

    // Body Font Family Setting
    $wp_customize->add_setting(
        'ticket_booking_body_font_family',
        array(
            'default'           => 'Arial, sans-serif', // Default font
            'sanitize_callback' => 'ticket_booking_sanitize_font_family', // Custom sanitize function
        )
    );

    $wp_customize->add_control(
        'ticket_booking_body_font_family',
        array(
            'label'   => esc_html__( 'Body Font Family', 'ticket-booking' ),
            'section' => 'ticket_booking_body_typography_settings',
            'type'    => 'select',
            'choices' => ticket_booking_get_google_fonts(), // Fetch available Google Fonts
        )
    );

    // Section Heading Typography
    $wp_customize->add_section(
        'ticket_booking_heading_typography_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Heading', 'ticket-booking' ),
            'panel'         => 'ticket_booking_typography_settings_panel',
        )
    );

    // Heading Font Family Setting
    $wp_customize->add_setting(
        'ticket_booking_heading_font_family',
        array(
            'default'           => 'Arial, sans-serif', // Default font
            'sanitize_callback' => 'ticket_booking_sanitize_font_family', // Custom sanitize function
        )
    );

    $wp_customize->add_control(
        'ticket_booking_heading_font_family',
        array(
            'label'   => esc_html__( 'Heading Font Family', 'ticket-booking' ),
            'section' => 'ticket_booking_heading_typography_settings',
            'type'    => 'select',
            'choices' => ticket_booking_get_google_fonts(), // Fetch available Google Fonts
        )
    );
}
endif;

add_action( 'customize_register', 'ticket_booking_customizer_typography_setting_register' );

// Function to fetch Google Fonts
function ticket_booking_get_google_fonts() {
    // Add Google Fonts to be available for selection
    return array(
        'Arial, sans-serif'   => 'Arial',
        'Georgia, serif'      => 'Georgia',
        'Verdana, sans-serif' => 'Verdana',
        'Times New Roman, serif' => 'Times New Roman',
        'Roboto, sans-serif'  => 'Roboto',
        'Open Sans, sans-serif' => 'Open Sans',
        'Lora, serif'         => 'Lora',
        'Merriweather, serif' => 'Merriweather',
        'Montserrat, sans-serif' => 'Montserrat',
        'Outfit, serif' => 'Outfit', 
        // Add more Google fonts as needed
    );
}

// Sanitize Google Fonts input
function ticket_booking_sanitize_font_family( $value ) {
    $allowed_fonts = array(
        'Arial, sans-serif', 'Georgia, serif', 'Verdana, sans-serif', 
        'Times New Roman, serif', 'Roboto, sans-serif', 'Open Sans, sans-serif',
        'Lora, serif', 'Merriweather, serif', 'Montserrat, sans-serif','Outfit, serif',
        // Add more allowed fonts to this array
    );

    if ( in_array( $value, $allowed_fonts ) ) {
        return $value;
    } else {
        return 'Arial, sans-serif'; // Default fallback font
    }
}

function ticket_booking_sanitize_title( $value ) {
    return sanitize_text_field( $value );
}
