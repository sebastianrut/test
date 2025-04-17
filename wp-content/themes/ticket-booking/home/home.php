<?php
/**
 * Template Name: Home
 */

get_header();
?>

<main id="primary">
        
    <?php
        /**
         * Hook - ticket_booking_action_home_banner.
         *
         * @hooked ticket_booking_home_banner_section - 10
         */
        do_action( 'ticket_booking_action_home_banner' );

        /**
         * Hook - ticket_booking_action_home_destination.
         *
         * @hooked ticket_booking_home_destination_section - 10
         */
        do_action( 'ticket_booking_action_home_destination' );

        /**
         * Hook - ticket_booking_action_home_extra.
         *
         * @hooked ticket_booking_home_extra_section - 10
         */
        do_action( 'ticket_booking_action_home_extra' );
    ?>
    
</main>

<?php
get_footer();