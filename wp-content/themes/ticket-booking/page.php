<?php
/**
 * The template for displaying all pages.
 * 
 * @package Ticket Booking
 */

get_header();
ticket_booking_before_title();
if(true===get_theme_mod( 'ticket_booking_enable_page_title',true)) :
	do_action('ticket_booking_get_page_title',false,false,false,false);
endif;
ticket_booking_after_title();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="content-inner">
            <?php
                $ticket_booking_elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
                if ( (bool)$ticket_booking_elementor_page ) {
                    ?><div class="containerno"><?php  
                } 
                else {
                    ?><div class="container"><?php
                }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        while(have_posts() ) : the_post();
                            get_template_part( 'template-parts/page/content', 'page' );
                            // If comments are open or we have at least one comment, load up the comment template.
                            if(comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        endwhile; //End of the loop.
                    ?>
                </div>
            </div></div>
        </div>     
    </main>
</div>

<?php
get_footer();