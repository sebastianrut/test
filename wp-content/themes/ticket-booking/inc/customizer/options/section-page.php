<?php
/**
 * Theme Customizer Controls
 *
 * @package Ticket Booking
 */

if ( ! function_exists( 'ticket_booking_customizer_page_register' ) ) :
function ticket_booking_customizer_page_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'ticket_booking_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Page Settings', 'ticket-booking' )
        )
    );

    // Info label
     $wp_customize->add_setting( 
        'ticket_booking_label_page_title_hide_settings', 
        array(
            'sanitize_callback' => 'ticket_booking_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_page_title_hide_settings', 
        array(
            'label'       => esc_html__( 'Hide Page Title', 'ticket-booking' ),
            'section'     => 'ticket_booking_page_settings',
            'type'        => 'ticket-booking-title',
            'settings'    => 'ticket_booking_label_page_title_hide_settings',
        ) 
    ));  

    // Hide page title section
    $wp_customize->add_setting(
        'ticket_booking_enable_page_title',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'ticket_booking_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_page_title', 
        array(
            'settings'      => 'ticket_booking_enable_page_title',
            'section'       => 'ticket_booking_page_settings',
            'type'          => 'ticket-booking-toggle',
            'label'         => esc_html__( 'Show Page Title Section:', 'ticket-booking' ),
            'description'   => '',           
        )
    ));

    // Info label
    $wp_customize->add_setting( 
        'ticket_booking_label_page_title_bg_settings', 
        array(
            'sanitize_callback' => 'ticket_booking_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_page_title_bg_settings', 
        array(
            'label'       => esc_html__( 'Page Title Background', 'ticket-booking' ),
            'section'     => 'ticket_booking_page_settings',
            'type'        => 'title',
            'settings'    => 'ticket_booking_label_page_title_bg_settings',
            'active_callback' => 'ticket_booking_page_title_enable',
        ) 
    ));

    // Background selection
    $wp_customize->add_setting(
        'ticket_booking_page_bg_radio',
        array(
            'type' => 'theme_mod',
            'default'           => 'color',
            'sanitize_callback' => 'ticket_booking_sanitize_select'
        )
    );

    $wp_customize->add_control(
    	new Ticket_Booking_Text_Radio_Control( $wp_customize, 'ticket_booking_page_bg_radio',
        array(
            'settings'      => 'ticket_booking_page_bg_radio',
            'section'       => 'ticket_booking_page_settings',
            'type'          => 'radio',
            'label'         => esc_html__( 'Choose Page Title Background Color or Background Image:', 'ticket-booking' ),
            'description'   => esc_html__('This setting will change the background of the page title area.', 'ticket-booking'),
            'choices' => array(
                            'color' => esc_html__('Background Color','ticket-booking'),
                            'image' => esc_html__('Background Image','ticket-booking'),
                            ),
            'active_callback' => 'ticket_booking_page_title_enable',
        )
    ));

    // Background color
    $wp_customize->add_setting(
        'ticket_booking_page_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#9449f3',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'ticket_booking_page_bg_color',
            array(
                'label'      => esc_html__( 'Select Background Color', 'ticket-booking' ),
                'description'   => esc_html__('This setting will add background color to the page title area if Background Color was selected above.', 'ticket-booking'),
                'section'    => 'ticket_booking_page_settings',
                'settings'   => 'ticket_booking_page_bg_color',
                'active_callback' => 'ticket_booking_page_title_color_enable',
            )
        )
    );
    
}
endif;

add_action( 'customize_register', 'ticket_booking_customizer_page_register' );