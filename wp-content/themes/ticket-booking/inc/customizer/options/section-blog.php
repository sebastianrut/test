<?php
/**
 * Theme Customizer Controls
 *
 * @package Ticket Booking
 */

if ( ! function_exists( 'ticket_booking_customizer_blog_register' ) ) :
function ticket_booking_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'ticket_booking_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'ticket-booking' ),
        )
    );

	// Section Posts
    $wp_customize->add_section(
        'ticket_booking_posts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'ticket-booking' ),
            'panel'          => 'ticket_booking_blog_settings_panel',
        )
    ); 

	// Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_post_meta_show', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_post_meta_show', 
		array(
		    'label'       => esc_html__( 'Posts Meta', 'ticket-booking' ),
		    'section'     => 'ticket_booking_posts_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_post_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'ticket_booking_enable_posts_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_posts_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'ticket-booking' ),
		    'section'     => 'ticket_booking_posts_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_posts_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'ticket_booking_enable_posts_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_posts_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'ticket-booking' ),
		    'section'     => 'ticket_booking_posts_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_posts_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'ticket_booking_enable_posts_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_posts_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'ticket-booking' ),
		    'section'     => 'ticket_booking_posts_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_posts_meta_comments',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'ticket-booking' ),
		    'section'     => 'ticket_booking_posts_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'ticket_booking_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'ticket_booking_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Ticket_Booking_Radio_Image_Control( $wp_customize,'ticket_booking_blog_sidebar_layout',
            array(
                'settings'		=> 'ticket_booking_blog_sidebar_layout',
                'section'		=> 'ticket_booking_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'ticket-booking' ),
                'choices'		=> array(
                    'right'	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'three_colm'	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/c3.png',
                    'four_colm'	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/c4.png',
                    'grid_layout'	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/c5.png',
                    'grid_left_sidebar'	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/c6.png',
                    'grid_right_sidebar'	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/c7.png',
                    'no' 	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_blog_excerpt', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_blog_excerpt', 
		array(
		    'label'       => esc_html__( 'Post Excerpt', 'ticket-booking' ),
		    'section'     => 'ticket_booking_posts_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_blog_excerpt',
		) 
	));

	// add post excerpt textbox
    $wp_customize->add_setting(
        'ticket_booking_posts_excerpt_length',
        array(
            'type' => 'theme_mod',
            'default'           => 30,
            'sanitize_callback' => 'ticket_booking_sanitize_number',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_posts_excerpt_length',
        array(
            'settings'      => 'ticket_booking_posts_excerpt_length',
            'section'       => 'ticket_booking_posts_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Post Excerpt Length', 'ticket-booking' ),
        )
    );

    // add readmore textbox
    $wp_customize->add_setting(
        'ticket_booking_posts_readmore_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'READ MORE', 'ticket-booking' ),
            'sanitize_callback' => 'ticket_booking_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_posts_readmore_text',
        array(
            'settings'      => 'ticket_booking_posts_readmore_text',
            'section'       => 'ticket_booking_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Read More Text', 'ticket-booking' ),
        )
    );

    //=========================================================================

	// Section Single Post
    $wp_customize->add_section(
        'ticket_booking_single_post_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'ticket-booking' ),
            'panel'          => 'ticket_booking_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_single_post_category_show', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_single_post_category_show', 
		array(
		    'label'       => esc_html__( 'Post Category', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_single_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'ticket_booking_enable_single_post_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_single_post_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_single_post_cat',
		) 
	));

	// add category textbox
    $wp_customize->add_setting(
        'ticket_booking_single_post_category_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Category:', 'ticket-booking' ),
            'sanitize_callback' => 'ticket_booking_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_single_post_category_text',
        array(
            'settings'      => 'ticket_booking_single_post_category_text',
            'section'       => 'ticket_booking_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Category Text', 'ticket-booking' ),
        )
    );

	// Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_single_post_tag_show', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_single_post_tag_show', 
		array(
		    'label'       => esc_html__( 'Post Tags', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_single_post_tag_show',
		) 
	));

	// Add an option to enable the tags
	$wp_customize->add_setting( 
		'ticket_booking_enable_single_post_tags', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_single_post_tags', 
		array(
		    'label'       => esc_html__( 'Show Tags', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_single_post_tags',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_single_pos_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'ticket_booking_enable_single_post_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_single_post_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_single_post_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'ticket_booking_enable_single_post_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_single_post_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_single_post_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'ticket_booking_enable_single_post_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ticket_booking_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Toggle_Control( $wp_customize, 'ticket_booking_enable_single_post_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-toggle',
		    'settings'    => 'ticket_booking_enable_single_post_meta_comments',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_single_pos_nav_show', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_single_pos_nav_show', 
		array(
		    'label'       => esc_html__( 'Post Navigation', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_single_pos_nav_show',
		) 
	));

    // add next article textbox
    $wp_customize->add_setting(
        'ticket_booking_single_post_next_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Next Article', 'ticket-booking' ),
            'sanitize_callback' => 'ticket_booking_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_single_post_next_article_text',
        array(
            'settings'      => 'ticket_booking_single_post_next_article_text',
            'section'       => 'ticket_booking_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Next Article Text', 'ticket-booking' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'ticket-booking' ),
        )
    );

    // add previous article textbox
    $wp_customize->add_setting(
        'ticket_booking_single_post_previous_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Previous Article', 'ticket-booking' ),
            'sanitize_callback' => 'ticket_booking_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ticket_booking_single_post_previous_article_text',
        array(
            'settings'      => 'ticket_booking_single_post_previous_article_text',
            'section'       => 'ticket_booking_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Previous Article Text', 'ticket-booking' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'ticket-booking' ),
        )
    );
    
	// Title label
	$wp_customize->add_setting( 
		'ticket_booking_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'ticket_booking_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ticket_Booking_Title_Info_Control( $wp_customize, 'ticket_booking_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'ticket-booking' ),
		    'section'     => 'ticket_booking_single_post_settings',
		    'type'        => 'ticket-booking-title',
		    'settings'    => 'ticket_booking_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'ticket_booking_blog_single_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'ticket_booking_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Ticket_Booking_Radio_Image_Control( $wp_customize,'ticket_booking_blog_single_sidebar_layout',
            array(
                'settings'		=> 'ticket_booking_blog_single_sidebar_layout',
                'section'		=> 'ticket_booking_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'ticket-booking' ),
                'choices'		=> array(
                    'right'	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => TICKET_BOOKING_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );
}
endif;

add_action( 'customize_register', 'ticket_booking_customizer_blog_register' );