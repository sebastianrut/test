<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package Ticket Booking
 */

?>

<section class="no-results not-found">
    <div class="search-content">
        <h1 class="page-search"><?php esc_html_e('Nothing Found','ticket-booking');?> </h1>
    </div> <!--page-header -->
    
    <div class="page-content">
        <?php
        if ( is_home() && current_user_can('publish_posts')) : ?>

            <p>
                <?php                
                $ticket_booking_link = sprintf(
                    esc_html__(/* translators: %1$s: Link to create a new post */ 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ticket-booking' ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
                echo wp_kses( $ticket_booking_link, array( 'a' => array( 'href' => array() ) ) );
                ?>
            </p>

        <?php elseif(is_search()) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ticket-booking' ); ?></p>
			<?php get_search_form(); ?>
			<?php
        else : ?>

            p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ticket-booking' ); ?></p>
            <?php
                get_search_form();

		endif; ?>
    </div><!--.page-content-->
</section><!-- .no-results -->