<?php
/**
 * Theme Customizer Controls
 *
 * @package Ticket Booking
 */

if ( ! function_exists( 'ticket_booking_customizer_home_destination_register' ) ) :
function ticket_booking_customizer_home_destination_register( $wp_customize ) {

    $wp_customize->add_section(
        'ticket_booking_home_destination_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Destination Settings', 'ticket-booking' )
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'ticket_booking_label_product_settings_title', 
        array(
            'sanitize_callback' => 'ticket_booking_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_product_settings_title', 
        array(
            'label'       => esc_html__( 'Destination Settings', 'ticket-booking' ),
            'section'     => 'ticket_booking_home_destination_settings',
            'type'        => 'ticket-booking-title',
            'settings'    => 'ticket_booking_label_product_settings_title',
        ) 
    ));

    $wp_customize->add_setting(
        'ticket_booking_destination_small_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_destination_small_heading',
        array(
            'label'           => sprintf( esc_html__( 'Small Heading', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_destination_settings',
            'settings'        => 'ticket_booking_destination_small_heading' ,
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'ticket_booking_destination_main_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_destination_main_heading',
        array(
            'label'           => sprintf( esc_html__( 'Main Heading', 'ticket-booking' ), ),
            'section'         => 'ticket_booking_home_destination_settings',
            'settings'        => 'ticket_booking_destination_main_heading' ,
            'type'            => 'text',
        )
    );
    
    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0; 
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting(
        'ticket_booking_destination_category',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_destination_category',
        array(
            'label'    => esc_html__( 'Select Post Category', 'ticket-booking' ),
            'section'  => 'ticket_booking_home_destination_settings',
            'settings' => 'ticket_booking_destination_category',
            'type'     => 'select',
            'choices'  => $cat_post,
        )
    );

   $wp_customize->add_setting( 'ticket_booking_destination_topics_number', array(
        'default'           => 6, 
        'sanitize_callback' => 'absint',
    ));

    // Add control for number of products
    $wp_customize->add_control( 'ticket_booking_destination_topics_number', array(
        'label'       => __( 'Number of Post to Display', 'ticket-booking' ),
        'section'     => 'ticket_booking_home_destination_settings', 
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 8,
        ),
    ));
}
endif;

add_action( 'customize_register', 'ticket_booking_customizer_home_destination_register' );