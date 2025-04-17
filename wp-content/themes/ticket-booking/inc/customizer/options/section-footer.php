<?php
/**
 * Theme Customizer Controls
 *
 * @package Ticket Booking
 */

if ( ! function_exists( 'ticket_booking_customizer_footer_register' ) ) :
function ticket_booking_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'ticket_booking_footer_settings',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'ticket-booking' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Settings', 'ticket-booking' ),
		    'section'     => 'ticket_booking_footer_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'ticket_booking_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'ticket_booking_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'ticket_booking_footer_copyright_text',
        array(
            'settings'      => 'ticket_booking_footer_copyright_text',
            'section'       => 'ticket_booking_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'ticket-booking' )
        )
    );
}
endif;

add_action( 'customize_register', 'ticket_booking_customizer_footer_register' );