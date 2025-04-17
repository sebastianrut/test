<?php
/**
 * Theme Customizer Controls
 *
 * @package Ticket Booking
 */

if ( ! function_exists( 'ticket_booking_customizer_home_banner_register' ) ) :
function ticket_booking_customizer_home_banner_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'ticket_booking_home_banner_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Banner Settings', 'ticket-booking' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_banner_settings_title', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_banner_settings_title', 
		array(
		    'label'       => esc_html__( 'Banner Settings', 'ticket-booking' ),
		    'section'     => 'ticket_booking_home_banner_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_banner_settings_title',
		) 
	));

     $wp_customize->add_setting('ticket_booking_slider_increase',array(
        'default' => '',
        'sanitize_callback' => 'ticket_booking_sanitize_number',
    ));
    $wp_customize->add_control('ticket_booking_slider_increase',array(
        'label' => __('Number of slides to show','ticket-booking'),
        'section' => 'ticket_booking_home_banner_settings',
        'type'    => 'number'
    ));
      $ticket_booking_banner_count =  get_theme_mod('ticket_booking_slider_increase');

        for($i=1; $i<=$ticket_booking_banner_count; $i++ ) {  

    // Button Image
    $wp_customize->add_setting(
        'ticket_booking_banner_image'.$i,
        array(
            'default'           => '',
            'sanitize_callback' => 'ticket_booking_sanitize_image',

        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'ticket_booking_banner_image'.$i, 
            array(
                'label'           => sprintf( esc_html__( 'Banner Image', 'ticket-booking' ).$i, ),
                'settings'  => 'ticket_booking_banner_image'.$i,
                'section'   => 'ticket_booking_home_banner_settings'
            ) 
        )
    );

    // Banner Heading
	$wp_customize->add_setting(
        'ticket_booking_banner_heading'.$i,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_banner_heading'.$i,
        array(
            'label'           => sprintf( esc_html__( 'Banner Heading', 'ticket-booking' ).$i, ),
            'section'         => 'ticket_booking_home_banner_settings',
            'settings'        => 'ticket_booking_banner_heading'.$i ,
            'type'            => 'text',
        )
    );
    // banner Button
    $wp_customize->add_setting(
        'ticket_booking_banner_button_link'.$i,
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_banner_button_link'.$i,
        array(
            'label'           => sprintf( esc_html__( 'Banner Button Link', 'ticket-booking' ).$i, ),
            'section'         => 'ticket_booking_home_banner_settings',
            'settings'        => 'ticket_booking_banner_button_link'.$i ,
            'type'            => 'url',
        )
    );

    }
    // Slider Content Alignment Setting
    $wp_customize->add_setting(
        'ticket_booking_slider_content_alignment',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'ticket_booking_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_slider_content_alignment',
        array(
            'label'    => esc_html__( 'Slider Content Alignment', 'ticket-booking' ),
            'section'  => 'ticket_booking_home_banner_settings',
            'settings' => 'ticket_booking_slider_content_alignment',
            'type'     => 'select',
            'choices'  => array(
                'left'   => esc_html__( 'Left', 'ticket-booking' ),
                'center' => esc_html__( 'Center', 'ticket-booking' ),
                'right'  => esc_html__( 'Right', 'ticket-booking' ),
            ),
        )
    );
}
endif;

add_action( 'customize_register', 'ticket_booking_customizer_home_banner_register' );