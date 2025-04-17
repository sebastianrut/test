<?php
/**
 * @package Ticket Booking
 */

/**
 * Footer
 */
if (! function_exists( 'ticket_booking_footer_copyrights' ) ):
    function ticket_booking_footer_copyrights() {
        ?>
            <div class="row">
                <div class="copyrights">
                    <p>
                        <?php
                            if("" != esc_html(get_theme_mod( 'ticket_booking_footer_copyright_text'))) :
                                echo esc_html(get_theme_mod( 'ticket_booking_footer_copyright_text'));
                                if(get_theme_mod('ticket_booking_en_footer_credits',true)) :
                                    ?> 
                                    <span class="copyrg-link"><a href="<?php echo esc_url(TICKET_BOOKING_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Ticket Booking WordPress Theme','ticket-booking') ?></a><?php esc_html_e(' by Legacy Themes','ticket-booking') ?></span>
                                    <?php   
                                endif;
                            else :
                                echo date_i18n(
                                    /* translators: Copyright date format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'ticket-booking' )
                                );
                                ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                    <span class="copyrg-link"><a href="<?php echo esc_url(TICKET_BOOKING_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Ticket Booking WordPress Theme','ticket-booking') ?></a><?php esc_html_e(' by Legacy Themes','ticket-booking') ?></span>
                                <?php
                            endif;
                        ?>
                    </p>
                </div>
            </div>
        <?php    
    }
endif;
add_action( 'ticket_booking_action_footer', 'ticket_booking_footer_copyrights' );


/**
 * Page Title Settings
 */
if (!function_exists('ticket_booking_show_page_title')):
    function ticket_booking_show_page_title( $ticket_booking_blogtitle=false,$ticket_booking_archivetitle=false,$ticket_booking_searchtitle=false,$ticket_booking_pagenotfoundtitle=false ) {
        if(!is_front_page()){
            if ('color' === esc_html(get_theme_mod( 'ticket_booking_page_bg_radio','color' ))) {
                ?>
                    <div class="page-title" style="background:<?php echo sanitize_hex_color(get_theme_mod( 'ticket_booking_page_bg_color','#9449f3' )); ?>;">
                <?php
            }
            else if('image' === esc_html(get_theme_mod( 'ticket_booking_page_bg_radio','color' ))){
                $image= esc_url(get_template_directory_uri().'/img/start-bg.jpg');
                ?>
                <?php
                    if ( has_post_thumbnail()) {
                        $ticket_booking_featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        ?>
                            <div class="page-title" style="background:url('<?php echo esc_url($ticket_booking_featured_img_url) ?>') no-repeat scroll center center / cover;"> 
                        <?php }
                    else{
                        ?>
                            <div class="page-title"  style="background:url('<?php echo esc_url($image ); ?>') no-repeat scroll center center / cover;">    
                        <?php } ?>                    
                <?php }
            else{ ?>
                <div class="page-title" style="background:#9449f3;"> 
                <?php } ?>
                <div class="content-section img-overlay">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="section-title page-title"> 
                                    <?php
                                        if($ticket_booking_blogtitle){
                                            ?><h1 class="main-title"><?php single_post_title(); ?></h1><?php
                                        }
                                        if($ticket_booking_archivetitle){
                                            ?><h1 class="main-title"><?php the_archive_title(); ?></h1><?php
                                        }
                                        if($ticket_booking_searchtitle){
                                            ?><h1 class="main-title"><?php esc_html_e('SEARCH RESULTS','ticket-booking') ?></h1><?php
                                        }
                                        if($ticket_booking_pagenotfoundtitle){
                                            ?><h1 class="main-title"><?php esc_html_e('PAGE NOT FOUND','ticket-booking') ?></h1><?php
                                        }                                       
                                        
                                        if($ticket_booking_blogtitle==false && $ticket_booking_archivetitle==false && $ticket_booking_searchtitle==false && $ticket_booking_pagenotfoundtitle==false){
                                            ?><h1 class="main-title"><?php the_title(); ?></h1><?php
                                        }
                                    ?>                                                       
                                </div>                      
                            </div>
                        </div>
                    </div>  
                </div>
                </div>  <!-- End page-title --> 
            <?php
        }
    }
endif;
add_action('ticket_booking_get_page_title', 'ticket_booking_show_page_title');


/**
 * Home Banner Section
 */
if (! function_exists( 'ticket_booking_home_banner_section' ) ):
    function ticket_booking_home_banner_section() {
        ?>
        <section id="main-banner-wrap">
            <div class="slider-sec">
                <div class="owl-carousel">
                    <?php $ticket_booking_banner_count = get_theme_mod("ticket_booking_slider_increase");
                    for ($i = 1; $i <= $ticket_booking_banner_count; $i++) { ?>
                    <?php
                    $ticket_booking_banner_image = get_theme_mod( 'ticket_booking_banner_image'.$i, '' );
                    if ( ! empty( $ticket_booking_banner_image ) ) { ?>
                        <div class="banner-side-margin position-relative px-lg-4 px-md-4 px-2">
                            <div class="overlay-slider"></div>
                            <div class="main-banner-inner-box">                   
                                <img src="<?php echo esc_url( $ticket_booking_banner_image ); ?>">
                            </div>
                            <?php
                            $ticket_booking_alignment_class = get_theme_mod( 'ticket_booking_slider_content_alignment', 'right' );
                            ?>
                            <div class="main-banner-content-box content-<?php echo esc_attr( $ticket_booking_alignment_class ); ?>">
                                <?php
                                    $ticket_booking_banner_heading = get_theme_mod( 'ticket_booking_banner_heading'.$i, '' );                        
                                    if ( ! empty( $ticket_booking_banner_heading ) ) { ?>
                                        <h2 id="banner-heading" class="bnr-hd1 p-0 mb-0 mb-lg-4"><?php echo esc_html( $ticket_booking_banner_heading ); ?></h2>
                                <?php } ?> 
                               <div class="btn-box-slid">
                                    <?php
                                    $ticket_booking_banner_button_link = get_theme_mod( 'ticket_booking_banner_button_link'.$i, '' );
                                        if ( ! empty( $ticket_booking_banner_button_link ) ) { ?>
                                        <a class="btn-slid btn" href="<?php echo esc_url( $ticket_booking_banner_button_link ); ?>"><?php echo esc_html('Read More','ticket-booking'); ?></a>
                                    <?php } ?>                                 
                                </div>
                            </div>    
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'ticket_booking_action_home_banner', 'ticket_booking_home_banner_section' );


/**
 * Home destination Section
 */
if (! function_exists( 'ticket_booking_home_destination_section' ) ):
    function ticket_booking_home_destination_section() {
        ?>
    <section id="destination-wrap">
        <div class="container">
            <div class="inner-wrap">
                <div class="destination-head-box text-center mb-5">
                    <?php
                        $ticket_booking_destination_small_heading = get_theme_mod( 'ticket_booking_destination_small_heading', '' );
                        if ( ! empty( $ticket_booking_destination_small_heading ) ) { ?>
                        <h6 class="destn-sm-hd"><?php echo esc_html( $ticket_booking_destination_small_heading ); ?></h6>
                    <?php } ?>
                    <?php
                        $ticket_booking_destination_main_heading = get_theme_mod( 'ticket_booking_destination_main_heading', '' );
                        if ( ! empty( $ticket_booking_destination_main_heading ) ) { ?>
                        <h3 class="destn-main-hd pt-0"><?php echo esc_html( $ticket_booking_destination_main_heading ); ?></h3>
                    <?php } ?>
                </div>
                <div class="destination-box">
                    <div class="center-slider">
                    <?php
                    $ticket_booking_selected_category = get_theme_mod('ticket_booking_destination_category', '');                               
                    $ticket_booking_destination_topics_number = get_theme_mod('ticket_booking_destination_topics_number', 6);  

                    if ($ticket_booking_selected_category) {               
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => $ticket_booking_destination_topics_number,
                            'order'          => 'ASC',
                            'category_name'  => sanitize_text_field($ticket_booking_selected_category),    
                        );                                
                        $ticket_booking_loop = new WP_Query($args);
                        while ($ticket_booking_loop->have_posts()) : $ticket_booking_loop->the_post();
                    ?>                         
                    <div class="destination-inn text-center">
                        <div class="img-box-destn">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php 
                                if (has_post_thumbnail()) { 
                                    echo get_the_post_thumbnail(get_the_ID(), ''); 
                                } else { 
                                    if (function_exists('wc_placeholder_img_src')) {
                                        echo '<img src="' . esc_url(wc_placeholder_img_src()) . '" />';
                                    } else {
                                        echo '<img src="' . esc_url(get_template_directory_uri() . '/img/placeholder.jpg') . '" />';
                                    }
                                } 
                                ?>
                            </a>
                        </div>
                    </div>                                                 
                    <?php 
                        endwhile; 
                        wp_reset_postdata(); 
                    } 
                    ?>
                    </div>                  
                </div>
            </div>                
        </div>
    </section>
    <?php    
    }
endif;
add_action( 'ticket_booking_action_home_destination', 'ticket_booking_home_destination_section' );

/**
 * Home page another adding Section
 */
if (! function_exists( 'ticket_booking_home_extra_section' ) ):
    function ticket_booking_home_extra_section() {
        ?>
        <div id="custom-home-extra-content" class="py-5 my-5">
            <div class="container">
              <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; ?>
            </div>
        </div>
        <?php    
    }
endif;
add_action( 'ticket_booking_action_home_extra', 'ticket_booking_home_extra_section' );