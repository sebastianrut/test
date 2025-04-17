<?php
/**
 * Custom template hooks for this theme.
 *
 * @package Ticket Booking
 */


/**
 * Before title meta hook
 */
if ( ! function_exists( 'ticket_booking_before_title' ) ) :
function ticket_booking_before_title() {
	do_action('ticket_booking_before_title');
}
endif;


/**
 * Before title content hook
 */
if ( ! function_exists( 'ticket_booking_before_title_content' ) ) :
	function ticket_booking_before_title_content() {
		do_action('ticket_booking_before_title_content');
	}
endif;


/**
 * After title content hook
 */
if ( ! function_exists( 'ticket_booking_after_title_content' ) ) :
	function ticket_booking_after_title_content() {
		do_action('ticket_booking_after_title_content');
	}
endif;


/**
 * After title meta hook
 */
if ( ! function_exists( 'ticket_booking_after_title' ) ) :
function ticket_booking_after_title() {
	do_action('ticket_booking_after_title');
}
endif;

/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'ticket_booking_single_post_after_content' ) ) :
	function ticket_booking_single_post_after_content($postID) {
		do_action('ticket_booking_single_post_after_content',$postID);
	}
endif;