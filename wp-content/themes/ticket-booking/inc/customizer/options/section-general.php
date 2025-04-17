<?php
/**
 * Theme Customizer Controls
 *
 * @package Ticket Booking
 */

if ( ! function_exists( 'ticket_booking_customizer_general_setting_register' ) ) :
function ticket_booking_customizer_general_setting_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'ticket_booking_general_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'General Settings', 'ticket-booking' )
        )
    );

 	// Add general Panel for preloader and scrolltop
    $wp_customize->add_panel(
        'ticket_booking_general_settings_panel',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'General Settings', 'ticket-booking' ),
        )
    );

    // Section preloader
    $wp_customize->add_section(
        'ticket_booking_prelodr_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Preloader', 'ticket-booking' ),
            'panel'         => 'ticket_booking_general_settings_panel',
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'ticket_booking_preloader_settings', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_preloader_settings', 
		array(
		    'label'       => esc_html__( 'Preloader Settings', 'ticket-booking' ),
		    'section'     => 'ticket_booking_prelodr_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_preloader_settings',
		) 
	));

	// Add an option to enable the preloader
	$wp_customize->add_setting( 
		'ticket_booking_enable_preloader', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_preloader', 
		array(
		    'label'       => esc_html__( 'Show Preloader', 'ticket-booking' ),
		    'section'     => 'ticket_booking_prelodr_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_preloader',
		) 
	));


    // Section Body Typography
    $wp_customize->add_section(
        'ticket_booking_scrol_settings',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Scroll Top', 'ticket-booking' ),
            'panel'         => 'ticket_booking_general_settings_panel',
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'ticket_booking_scroll_top_settings', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_scroll_top_settings', 
		array(
		    'label'       => esc_html__( 'Scroll Top Settings', 'ticket-booking' ),
		    'section'     => 'ticket_booking_scrol_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_scroll_top_settings',
		) 
	));

	// Add an option to enable the scrolltop
	$wp_customize->add_setting( 
		'ticket_booking_enable_scrolltop', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_scrolltop', 
		array(
		    'label'       => esc_html__( 'Show Scroll Top', 'ticket-booking' ),
		    'section'     => 'ticket_booking_scrol_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_scrolltop',
		) 
	));

	 $wp_customize->add_section(
        'ticket_booking_button_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Buttons', 'ticket-booking' ),
            'panel'         => 'ticket_booking_general_settings_panel',
        )
    );

	 // Border Radius Setting
	$wp_customize->add_setting(
	    'ticket_booking_button_border_radius',
	    array(
	        'default'           => '6px',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'ticket_booking_button_border_radius',
	    array(
	        'type'     => 'text',
	        'label'    => esc_html__( 'Button Border Radius (e.g. 4px, 50%)', 'ticket-booking' ),
	        'section'  => 'ticket_booking_button_settings',
	    )
	);

	// Button Padding Setting
	$wp_customize->add_setting(
	    'ticket_booking_button_padding',
	    array(
	        'default'           => '10px 35px',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'ticket_booking_button_padding',
	    array(
	        'type'     => 'text',
	        'label'    => esc_html__( 'Button Padding (e.g. 10px 20px)', 'ticket-booking' ),
	        'section'  => 'ticket_booking_button_settings',
	    )
	);


}
endif;

add_action( 'customize_register', 'ticket_booking_customizer_general_setting_register' );