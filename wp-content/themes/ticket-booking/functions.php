<?php
/**
 * Ticket Booking functions and definitions.
 *
 * @package Ticket Booking
 */

/**
 *  Defining Constants
 */

// Core Constants
define('TICKET_BOOKING_REQUIRED_PHP_VERSION', '5.6' );
define('TICKET_BOOKING_DIR_PATH', get_template_directory());
define('TICKET_BOOKING_DIR_URI', get_template_directory_uri());
define('TICKET_BOOKING_AUT','https://www.legacytheme.net/products/free-travel-booking-wordpress-theme/');

if ( ! function_exists( 'ticket_booking_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ticket_booking_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // support alig-wide
    add_theme_support( 'align-wide' );

    add_theme_support( "wp-block-styles" );

    load_theme_textdomain( 'ticket-booking', get_template_directory() . '/languages' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'ticket-booking' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(      
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Gallery post format
    add_theme_support( 'post-formats', array( 'gallery' ));

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
    add_action( 'after_setup_theme', 'ticket_booking_setup' );

// custom header
    add_theme_support('custom-header', array(
            'width'                  => 1920, 
            'height'                 => 400,  
            'flex-height'            => true,
            'flex-width'             => true,
            'header-text'            => true, // Enable or disable header text
            'default-text-color'     => '000000', // Default header text color
            'wp-head-callback'       => 'ticket_booking_header_style',
        ) );

// custom-background
    add_theme_support( 'custom-background', array(
          'default-color' => 'ffffff',
        ));

// Style the header
function ticket_booking_header_style() {
    $ticket_booking_header_image = get_header_image();    
    $ticket_booking_header_text_color = get_header_textcolor();
   
     if (get_theme_support('custom-header', 'default-text-color') !== $ticket_booking_header_text_color || !empty($ticket_booking_header_image)) {
            ?>
        <style type="text/css" id="entr-header-css">
            <?php
            // Has a Custom Header been added?
            if (!empty($ticket_booking_header_image)) :
                ?>
                 #custom-header {
                    background-image: url(<?php header_image(); ?>);
                    background-repeat: no-repeat;
                    background-position: 50% 50%;
                    -webkit-background-size: cover;
                    -moz-background-size:    cover;
                    -o-background-size:      cover;
                    background-size:         cover;
                }
            <?php endif; ?> 
            <?php
                if ('blank' === $ticket_booking_header_text_color) :
                ?>
                    .site-title a,.site-description {
                        color: #<?php echo esc_attr( $ticket_booking_header_text_color ); ?>;
                    }
                <?php elseif ('' !== $ticket_booking_header_text_color) : ?>
                    .site-title a,.site-description {
                        color: #<?php echo esc_attr($ticket_booking_header_text_color); ?>;
                    }            
                <?php endif; ?>
        </style>
    <?php
        }
    }
// site-title-checkbox
// Remove "Display Site Title and Tagline" checkbox from Customizer
function ticket_booking_remove_header_text_display_checkbox( $wp_customize ) {
    $wp_customize->remove_control( 'display_header_text' ); // Removes the checkbox
}
add_action( 'customize_register', 'ticket_booking_remove_header_text_display_checkbox', 11 );

/**
* Custom logo
*/
function ticket_booking_logo_setup(){
    add_theme_support('custom-logo', array(
        'height' => 65,
        'width' => 350,
        'flex-height' => true,
        'flex-width' => true,
    ));
}
add_action('after_setup_theme', 'ticket_booking_logo_setup');

// logo resizer
function ticket_booking_logo_dynamic_css() {
    $ticket_booking_logo_width = get_theme_mod( 'ticket_booking_logo_width', 150 );
    ?>
    <style type="text/css">
        .logo .custom-logo {
            max-width: <?php echo esc_attr( $ticket_booking_logo_width ); ?>px;
            height: auto;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'ticket_booking_logo_dynamic_css' );

// buttons
function ticket_booking_custom_button_styles() {
    $ticket_booking_radius = get_theme_mod( 'ticket_booking_button_border_radius', '6px' );
    $ticket_booking_padding = get_theme_mod( 'ticket_booking_button_padding', '10px 35px' );
    ?>
    <style type="text/css">
        .btn,
        .button,
        button,
        input[type="submit"],
        .wp-block-button__link,#blog-section .read-more a,.read-more a,a.btn-slid.btn {
            border-radius: <?php echo esc_attr($ticket_booking_radius); ?>;
            padding: <?php echo esc_attr($ticket_booking_padding); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'ticket_booking_custom_button_styles' );

function ticket_booking_customize_fonts() {
    $ticket_booking_body_font = get_theme_mod('ticket_booking_body_font_family', 'Arial, sans-serif');
    $ticket_booking_heading_font = get_theme_mod('ticket_booking_heading_font_family', 'Arial, sans-serif');

    // Extract Google font names (e.g., Roboto from "Roboto, sans-serif")
    $ticket_booking_body_font_name = trim(explode(',', $ticket_booking_body_font)[0]);
    $ticket_booking_heading_font_name = trim(explode(',', $ticket_booking_heading_font)[0]);

    // Generate Google Fonts URL
    $ticket_booking_google_font_url = 'https://fonts.googleapis.com/css2?family=' . urlencode($ticket_booking_body_font_name) . '&family=' . urlencode($ticket_booking_heading_font_name) . '&display=swap';

    // Enqueue fonts
    wp_enqueue_style('ticket-booking-fonts', $ticket_booking_google_font_url, array(), null);

    // Custom inline style for font application
    $custom_css = "
        body, p, span, label, div {
            font-family: {$ticket_booking_body_font};
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: {$ticket_booking_heading_font};
        }
    ";
    wp_add_inline_style('ticket-booking-fonts', $custom_css);
}
add_action('wp_enqueue_scripts', 'ticket_booking_customize_fonts');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ticket_booking_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ticket_booking_content_width', 640 );
}
add_action( 'after_setup_theme', 'ticket_booking_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ticket_booking_widgets_init() {
	//Footer widget columns
    $ticket_booking_widget_num = absint(get_theme_mod( 'ticket_booking_footer_widgets', '4' ));
    for ( $i=1; $i <= $ticket_booking_widget_num; $i++ ) :
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Column', 'ticket-booking' ) . $i,
            'id'            => 'footer-' . $i,
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title" itemprop="name">',
            'after_title'   => '</h4>',
        ) );
    endfor;

    register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'ticket-booking' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ticket-booking' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 2', 'ticket-booking' ),
        'id'            => 'sidebar-2',
        'description'   => esc_html__( 'Add widgets here.', 'ticket-booking' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 3', 'ticket-booking' ),
        'id'            => 'sidebar-3',
        'description'   => esc_html__( 'Add widgets here.', 'ticket-booking' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'ticket_booking_widgets_init' );

/** 
* Excerpt More
*/
function ticket_booking_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
    return '&hellip;';
}
add_filter('excerpt_more', 'ticket_booking_excerpt_more');


/** 
* Custom excerpt length.
*/
function ticket_booking_excerpt_length() {
	$length= intval(get_theme_mod('ticket_booking_posts_excerpt_length',30));
    return $length;
}
add_filter('excerpt_length', 'ticket_booking_excerpt_length');

/*
script goes here
*/
function ticket_booking_scripts() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.3');
    wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/css/bootstrap-icons.css', array(), '5.3.3');
    wp_enqueue_style( 'ticket-booking-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
    wp_style_add_data('ticket-booking-style', 'rtl', 'replace');
	wp_enqueue_style( 'm-customscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', array(), '3.1.5');    
    wp_enqueue_style( 'outfit-google-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap"', array(), '1.0');
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel' . '.css', array(), '2.3.4' );

    wp_enqueue_style( 'slick-slider-styles', get_template_directory_uri() . '/css/slick.min.css' ); 
    wp_enqueue_style( 'slick-slider-theme-styles', get_template_directory_uri() . '/css/slick-theme.min.css' ); 

    // Block stylesheet.
    wp_enqueue_style( 'ticket-booking-block-style', get_theme_file_uri( '/css/blocks-styles.css' ), array( 'ticket-booking-style' ), '1.0' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	
	wp_enqueue_script( 'resize-sensor', get_template_directory_uri() . '/js/ResizeSensor.js',array(),'1.0.0', true );
	wp_enqueue_script( 'm-customscrollbar-js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.js',array(),'3.1.5', true );	
    
	wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.js',array(), '3.7.3');
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '5.3.3', true );

    wp_enqueue_script( 'ticket-booking-main-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'customize-preview'), '1.0', true );
    wp_enqueue_script( 'owl-carouselscript', get_template_directory_uri() . '/js/owl.carousel' . '.js', array( 'jquery' ), '2.3.4', true );

    wp_enqueue_script('slick-slider-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '', true );

add_action( 'customize_preview_init', 'my_customizer_live_preview' );

    
}
add_action( 'wp_enqueue_scripts', 'ticket_booking_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ticket_booking_pingback_header() {
    if ( is_singular() && pings_open() ) {
       printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'ticket_booking_pingback_header' );

// Add WooCommerce support to the theme
function ticket_booking_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'ticket_booking_add_woocommerce_support' );

// Change the number of product columns in WooCommerce shop page
function ticket_booking_change_woocommerce_shop_columns( $columns ) {
    $columns = 3; // Change this number to your desired column count (e.g., 2, 3, 4, etc.)
    return $columns;
}
add_filter( 'loop_shop_columns', 'ticket_booking_change_woocommerce_shop_columns', 999 );

function ticket_booking_custom_woocommerce_cart_icon() {
    
    if ( class_exists( 'WooCommerce' ) && WC()->cart ) {
        
        $ticket_booking_cart_count = WC()->cart->get_cart_contents_count();
        $ticket_booking_cart_url = wc_get_cart_url();
        ?>
        
        <span class="cart-icon-wrapper">
            <a class="cart-contents" href="<?php echo esc_url($ticket_booking_cart_url); ?>">
                <i class="bi bi-bag"></i>
                <?php if ($ticket_booking_cart_count > 0) { ?>
                    <span class="cart-count"><?php echo esc_html($ticket_booking_cart_count); ?></span>
                <?php } ?>
            </a>
        </span>
        
        <?php
    }
}

add_filter( 'woocommerce_add_to_cart_fragments', 'ticket_booking_custom_woocommerce_cart_icon_fragments' );

function ticket_booking_custom_woocommerce_cart_icon_fragments( $fragments ) {
    
    if ( class_exists( 'WooCommerce' ) ) {
        ob_start();
        ticket_booking_custom_woocommerce_cart_icon();
        $fragments['div.cart-icon-wrapper'] = ob_get_clean();
    }
    return $fragments;
}

/**
 * Customizer additions.
 */
require get_parent_theme_file_path() . '/inc/customizer/customizer.php';

/**
 * Template functions
 */
require get_parent_theme_file_path() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path() . '/inc/template-tags.php';

/**
 * Custom template hooks for this theme.
 */
require get_parent_theme_file_path() . '/inc/template-hooks.php';

/**
 * Extra classes for this theme.
 */
require get_parent_theme_file_path() . '/inc/extras.php';

 /**getstart*/
require get_template_directory() . '/inc/ticket-booking-get-theme-info.php';

if ( ! function_exists( 'ticket_booking_admin_scripts' ) ) :
    function ticket_booking_admin_scripts($hook) {
        wp_enqueue_style( 'ticket-booking-get-theme-info-css', get_template_directory_uri() . '/css/ticket-booking-get-theme-info.css', false ); 
    }
endif;
add_action( 'admin_enqueue_scripts', 'ticket_booking_admin_scripts' );
/**
 * Upgrade to Pro
 */
require_once( trailingslashit( get_template_directory() ) . 'ticket-booking-pro/class-customize.php' );