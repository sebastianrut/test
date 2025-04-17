<?php
/**
 * Ticket Booking Theme Customizer
 *
 * @package Ticket Booking
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'ticket_booking_customize_register' ) ) :
function ticket_booking_customize_register( $wp_customize ) {

    // Add custom controls.
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-title-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/toggle-button/class-login-designer-toggle-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/radio-images/class-radio-image-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/text-radio/class-text-radio-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/slider/class-slider-control.php' );

    // Register the custom control type.
    $wp_customize->register_control_type( 'Ticket_Booking_Toggle_Control' );

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'ticket-booking' );

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'ticket_booking_site_title_callback',
            'fallback_refresh'    => false,
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'ticket_booking_site_description_callback',
            'fallback_refresh'    => false, 
        ) );
    }

    // Display Site Title and Tagline
    $wp_customize->add_setting( 
        'ticket_booking_display_site_title_tagline', 
        array(
            'default'           => true,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_display_site_title_tagline', 
        array(
            'label'       => esc_html__( 'Display Site Title and Tagline', 'ticket-booking' ),
            'section'     => 'title_tagline',
            'type'        => 'ticket-booking-toggle',
            'settings'    => 'ticket_booking_display_site_title_tagline',
        ) 
    ));

    // Add setting
    $wp_customize->add_setting( 'ticket_booking_logo_width', array(
        'default'           => 150,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage', // Optional for live preview
    ) );

    // Add control (range slider)
    $wp_customize->add_control( 'ticket_booking_logo_width', array(
        'label'       => __( 'Logo Resizer (px)', 'ticket-booking' ),
        'section'     => 'title_tagline',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 400,
            'step' => 1,
        ),
    ) );
    
}
endif;
add_action( 'customize_register', 'ticket_booking_customize_register' );

//General settings
get_template_part( 'inc/customizer/options/section-general' );

//typography settings
get_template_part( 'inc/customizer/options/section-typography' );

//header settings
get_template_part( 'inc/customizer/options/section-header' );

//banner settings
get_template_part( 'inc/customizer/options/section-banner' );

//product settings
get_template_part( 'inc/customizer/options/section-destination' );

//blog settings
get_template_part( 'inc/customizer/options/section-blog' );

//page settings
get_template_part( 'inc/customizer/options/section-page' );

//footer settings
get_template_part( 'inc/customizer/options/section-footer' );

//customizer helper
get_template_part( 'inc/customizer/customizer-helpers' );

//data sanitization
get_template_part( 'inc/customizer/data-sanitization' );

/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'ticket_booking_enqueue_customizer_stylesheets' ) ) :
function ticket_booking_enqueue_customizer_stylesheets() {
    wp_register_style( 'ticket-booking-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/customizer.css', array(), '1.0.9', 'all' );
    wp_enqueue_style( 'ticket-booking-customizer-css' );
}
endif;
add_action( 'customize_controls_print_styles', 'ticket_booking_enqueue_customizer_stylesheets' );