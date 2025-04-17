<?php
/**
 * Template part for displaying header menu
 *
 * @package Ticket Booking
 */

?>
<?php
    $ticket_booking_page_val= is_front_page() ? 'home':'page' ;

?>

<header id="<?php echo esc_attr($ticket_booking_page_val);?>-inner" class="elementer-menu-anchor theme-menu-wrapper full-width-menu style1 page" role="banner">
    <?php
        if(true===get_theme_mod('ticket_booking_enable_highlighted area',true) && is_front_page()){
            ?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('skip to content','ticket-booking'); ?> </a> <?php
        }
        else{
        ?><a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('skip to content','ticket-booking');?></a> <?php
    }
    ?>
    <div id="header-main" class="header-wrapper">
        <div id="custom-header">
            <?php if ( display_header_text() ) : ?>
            <div id="topbar">
                <div class="container-fluid px-lg-4">
                    <div class="row py-2">
                        <div class="col-lg-2 col-md-2 col-5 align-self-center text-center text-lg-start text-md-start ri8-logo">
                            <div class="logo <?php echo (has_custom_logo() ? 'has-logo' : 'no-logo'); ?>" itemscope itemtype="https://schema.org/Organization">
                                <?php 
                                    if (has_custom_logo()) :
                                        ticket_booking_custom_logo();
                                    endif;                                          
                                ?>
                                <?php 
                                    if ( get_theme_mod( 'ticket_booking_enable_logo_stickyheader', false )) :
                                        $ticket_booking_alt_logo=esc_url(get_theme_mod( 'ticket_booking_logo_stickyheader' ));
                                        if(!empty($ticket_booking_alt_logo)) :
                                            ?>
                                                <a id="logo-alt" class="logo-alt" href="<?php echo esc_url(home_url( '/' )); ?>"><img src="<?php echo esc_url( get_theme_mod( 'ticket_booking_logo_stickyheader' ) ); ?>" alt="<?php esc_attr_e( 'logo', 'ticket-booking' ); ?>"></a>
                                            <?php
                                        endif;
                                    endif; ?>
                                <?php
                                    $ticket_booking_show_title   = ( true === get_theme_mod( 'ticket_booking_display_site_title_tagline', true ) );
                                    $ticket_booking_header_class = $ticket_booking_show_title ? 'site-title' : 'screen-reader-text';
                                    if(!empty(get_bloginfo( 'name' ))) {
                                        if ( is_front_page() ) { ?>
                                            <h1 class="<?php echo esc_attr( $ticket_booking_header_class ); ?>">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
                                            </h1>
                                    <?php
                                        if(true === get_theme_mod( 'ticket_booking_display_site_title_tagline', true )) {
                                                $ticket_booking_description = esc_html(get_bloginfo( 'description', 'display' ));
                                                if ( $ticket_booking_description || is_customize_preview() ) { 
                                                    ?>
                                                        <p class="site-description"><?php echo $ticket_booking_description; ?></p>
                                                    <?php 
                                                }
                                            }
                                        }
                                        else { ?>
                                            <p class="<?php echo esc_attr( $ticket_booking_header_class ); ?>">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
                                            </p>
                                            <?php
                                            if(true === get_theme_mod( 'ticket_booking_display_site_title_tagline', true )) {
                                                $ticket_booking_description = esc_html(get_bloginfo( 'description', 'display' ));
                                                if ( $ticket_booking_description || is_customize_preview() ) { 
                                                    ?>
                                                        <p class="site-description"><?php echo $ticket_booking_description; ?></p>
                                                    <?php 
                                                }
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-1 col-2 text-lg-end text-center text-md-center align-self-center">
                            <div class="top-menu-wrapper">
                                <div class="navigation_header">
                                <div class="toggle-nav mobile-menu">
                                    <button onclick="ticket_booking_openNav()"><i class="bi bi-list"></i></button>
                                </div>
                                <div id="mySidenav" class="nav sidenav">
                                    <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'ticket-booking' ); ?>">
                                        <?php {
                                                wp_nav_menu(
                                                    array(
                                                        'theme_location' => 'primary',
                                                        'container_class' => 'navi clearfix navbar-nav' ,
                                                        'menu_class'     => 'menu clearfix', 
                                                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                                        'fallback_cb' => 'wp_page_menu',
                                                    )
                                                );
                                            } ?>
                                    </nav>
                                    <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="ticket_booking_closeNav()"><i class="bi bi-x"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-3 col-5 align-self-center text-end">
                            <div class="tbr-book-btn">
                                <?php
                                    $ticket_booking_topbar_book_button_link = get_theme_mod( 'ticket_booking_topbar_book_button_link', '' );
                                    if ( ! empty( $ticket_booking_topbar_book_button_link ) ) { ?>
                                    <div class="topbar-button py-2">
                                        <a href="<?php echo esc_url( $ticket_booking_topbar_book_button_link ); ?>"><?php echo esc_html('Book Now','ticket-booking'); ?></a>
                                    </div> 
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 align-self-center text-start">
                            <div class="row call-detail mb-3 mb-lg-0 mb-md-0">
                                <?php $ticket_booking_header_phone_number = get_theme_mod('ticket_booking_header_phone_number', '' );
                                    $ticket_booking_header_phone_head = get_theme_mod('ticket_booking_header_phone_head', '' );
                                if ( ! empty( $ticket_booking_header_phone_number ) ) { ?>
                                    <div class="col-lg-2 col-md-1 col-4 text-end pe-0 pt-2 align-self-center ri8-call">
                                        <i class="bi bi-telephone call-icn"></i>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-8 align-self-center ri8-num">
                                        <p class="hd-call mb-0">
                                        <?php echo esc_html( $ticket_booking_header_phone_head ); ?></p>
                                        <p class="hd-call-no mb-0">
                                        <?php echo esc_html( $ticket_booking_header_phone_number ); ?></p>
                                    </div>
                                <?php } ?>
                                <div class="col-lg-6 col-md-6 col-12 text-lg-end text-center text-md-end align-self-center">
                                    <div class="follow-us my-2 my-lg-0">
                                        <?php
                                            $ticket_booking_social_media1_heading = get_theme_mod( 'ticket_booking_social_media1_heading', '' );
                                            if ( ! empty( $ticket_booking_social_media1_heading ) ) { ?>
                                            <a href="<?php echo esc_url( $ticket_booking_social_media1_heading ); ?>"><i class="bi bi-facebook me-4 me-md-3 fb"></i></a>
                                        <?php } ?>
                                        <?php
                                            $ticket_booking_social_media2_heading = get_theme_mod( 'ticket_booking_social_media2_heading', '' );
                                            if ( ! empty( $ticket_booking_social_media2_heading ) ) { ?>
                                            <a href="<?php echo esc_url( $ticket_booking_social_media2_heading ); ?>"><i class="bi bi-instagram me-4 me-md-3 inst"></i></a>
                                        <?php } ?>
                                        <?php
                                            $ticket_booking_social_media3_heading = get_theme_mod( 'ticket_booking_social_media3_heading', '' );
                                            if ( ! empty( $ticket_booking_social_media3_heading ) ) { ?>
                                            <a href="<?php echo esc_url( $ticket_booking_social_media3_heading ); ?>"><i class="bi bi-twitter-x me-4 me-md-3 twt"></i></a>
                                        <?php } ?>
                                        <?php
                                            $ticket_booking_social_media4_heading = get_theme_mod( 'ticket_booking_social_media4_heading', '' );
                                            if ( ! empty( $ticket_booking_social_media4_heading ) ) { ?>
                                            <a href="<?php echo esc_url( $ticket_booking_social_media4_heading ); ?>"><i class="bi bi-youtube me-4 me-md-3 utb"></i></a>
                                        <?php } ?>
                                        <?php
                                            $ticket_booking_social_media5_heading = get_theme_mod( 'ticket_booking_social_media5_heading', '' );
                                            if ( ! empty( $ticket_booking_social_media5_heading ) ) { ?>
                                            <a href="<?php echo esc_url( $ticket_booking_social_media5_heading ); ?>"><i class="bi bi-pinterest me-4 me-md-3 pin"></i></a>
                                        <?php } ?>
                                        <?php
                                            $ticket_booking_social_media6_heading = get_theme_mod( 'ticket_booking_social_media6_heading', '' );
                                            if ( ! empty( $ticket_booking_social_media6_heading ) ) { ?>
                                            <a href="<?php echo esc_url( $ticket_booking_social_media6_heading ); ?>"><i class="bi bi-linkedin me-4 me-md-3 lnk"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>    
</header>

<div class="clearfix"></div>
<div id="content" class="elementor-menu-anchor"></div>

<div class="content-wrap">