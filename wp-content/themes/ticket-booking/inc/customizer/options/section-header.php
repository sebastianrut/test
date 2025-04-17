<?php
/**
 * Theme Customizer Controls
 *
 * @package Ticket Booking
 */

if ( ! function_exists( 'ticket_booking_customizer_header_register' ) ) :
function ticket_booking_customizer_header_register( $wp_customize ) {

    $wp_customize->add_section(
        'ticket_booking_home_header_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Settings', 'ticket-booking' )
        )
    );

    // topbar buttons

    // Title label
    $wp_customize->add_setting( 
        'ticket_booking_label_header_button_settings_title', 
        array(
            'sanitize_callback' => 'ticket_booking_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_header_button_settings_title', 
        array(
            'label'       => esc_html__( 'Tobar Button', 'ticket-booking' ),
            'section'     => 'ticket_booking_home_header_settings',
            'type'        => 'ticket-booking-title',
            'settings'    => 'ticket_booking_label_header_button_settings_title',
        ) 
    ));

    $wp_customize->add_setting(
        'ticket_booking_topbar_book_button_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_topbar_book_button_link',
        array(
            'label'           => sprintf( esc_html__( 'Topbar Book Button Link', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_header_settings',
            'settings'        => 'ticket_booking_topbar_book_button_link' ,
            'type'            => 'url',
        )
    );

     // Title label
    $wp_customize->add_setting( 
        'ticket_booking_label_header_settings_title', 
        array(
            'sanitize_callback' => 'ticket_booking_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_header_settings_title', 
        array(
            'label'       => esc_html__( 'Contact Details', 'ticket-booking' ),
            'section'     => 'ticket_booking_home_header_settings',
            'type'        => 'ticket-booking-title',
            'settings'    => 'ticket_booking_label_header_settings_title',
        ) 
    ));

    $wp_customize->add_setting(
        'ticket_booking_header_phone_head',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_header_phone_head',
        array(
            'label'           => sprintf( esc_html__( 'Calling Details Heading', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_header_settings',
            'settings'        => 'ticket_booking_header_phone_head' ,
            'type'            => 'text',
        )
    );

    // Phone Number
    $wp_customize->add_setting(
        'ticket_booking_header_phone_number',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_header_phone_number',
        array(
            'label'           => sprintf( esc_html__( 'Phone Number', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_header_settings',
            'settings'        => 'ticket_booking_header_phone_number' ,
            'type'            => 'text',
        )
    );

    
    // Title label
    $wp_customize->add_setting( 
        'ticket_booking_label_social_meida_settings_title', 
        array(
            'sanitize_callback' => 'ticket_booking_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_social_meida_settings_title', 
        array(
            'label'       => esc_html__( 'Social Media Links', 'ticket-booking' ),
            'section'     => 'ticket_booking_home_header_settings',
            'type'        => 'ticket-booking-title',
            'settings'    => 'ticket_booking_label_social_meida_settings_title',
        ) 
    ));

    // Facebook Link
    $wp_customize->add_setting(
        'ticket_booking_social_media1_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_social_media1_heading',
        array(
            'label'           => sprintf( esc_html__( 'Facebook Link', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_header_settings',
            'settings'        => 'ticket_booking_social_media1_heading' ,
            'type'            => 'url',
        )
    );

    // Instagram Link
    $wp_customize->add_setting(
        'ticket_booking_social_media2_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_social_media2_heading',
        array(
            'label'           => sprintf( esc_html__( 'Instagram Link', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_header_settings',
            'settings'        => 'ticket_booking_social_media2_heading' ,
            'type'            => 'url',
        )
    );

    // Twitter Link
    $wp_customize->add_setting(
        'ticket_booking_social_media3_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_social_media3_heading',
        array(
            'label'           => sprintf( esc_html__( 'Twitter Link', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_header_settings',
            'settings'        => 'ticket_booking_social_media3_heading' ,
            'type'            => 'url',
        )
    );

    // Youtube Link
    $wp_customize->add_setting(
        'ticket_booking_social_media4_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_social_media4_heading',
        array(
            'label'           => sprintf( esc_html__( 'Youtube Link', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_header_settings',
            'settings'        => 'ticket_booking_social_media4_heading' ,
            'type'            => 'url',
        )
    );

    // Pinterest Link
    $wp_customize->add_setting(
        'ticket_booking_social_media5_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_social_media5_heading',
        array(
            'label'           => sprintf( esc_html__( 'Pinterest Link', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_header_settings',
            'settings'        => 'ticket_booking_social_media5_heading' ,
            'type'            => 'url',
        )
    );

    // Linkedin Link
    $wp_customize->add_setting(
        'ticket_booking_social_media6_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_social_media6_heading',
        array(
            'label'           => sprintf( esc_html__( 'Linkedin Link', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_header_settings',
            'settings'        => 'ticket_booking_social_media6_heading' ,
            'type'            => 'url',
        )
    );
}
endif;

add_action( 'customize_register', 'ticket_booking_customizer_header_register' );