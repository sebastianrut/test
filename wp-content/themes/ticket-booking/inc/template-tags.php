<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ticket Booking
 */

if ( ! function_exists( 'ticket_booking_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function ticket_booking_posted_on() {
	$ticket_booking_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$ticket_booking_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>&nbsp;<span>Updated on</span> <time class="updated" datetime="%3$s">%4$s</time>';
	}

	$ticket_booking_time_string = sprintf( $ticket_booking_time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_attr( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_attr( get_the_modified_date() )
	);

	$ticket_booking_posted_on = sprintf(
		esc_html_x(/* translators: %s: Post date with permalink */ 'Posted on %s', 'post date', 'ticket-booking' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $ticket_booking_time_string . '</a>'
	);

	$ticket_booking_byline = sprintf(
		esc_html_x(/* translators: %s: Post author name with a link */ 'by %s', 'post author', 'ticket-booking' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_attr( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $ticket_booking_posted_on . '</span><span class="byline"> ' . $ticket_booking_byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'ticket_booking_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function ticket_booking_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$ticket_booking_categories_list = get_the_category_list( esc_html__( ', ', 'ticket-booking' ) );
		if ( $ticket_booking_categories_list && ticket_booking_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__(/* translators: %1$s: Category list */ 'Posted in %1$s', 'ticket-booking' ) . '</span>', $ticket_booking_categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$ticket_booking_tags_list = get_the_tag_list( '', esc_html__( ', ', 'ticket-booking' ) );
		if ( $ticket_booking_tags_list ) {
			printf( '<span class="tags-links">' . __(/* translators: %1$s: Tag list */ 'Tagged %1$s', 'ticket-booking' ) . '</span>', $ticket_booking_tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ticket-booking' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'ticket-booking' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ticket_booking_categorized_blog() {
	if ( false === ( $ticket_booking_all_the_cool_cats = get_transient( 'ticket_booking_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$ticket_booking_all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$ticket_booking_all_the_cool_cats = count( $ticket_booking_all_the_cool_cats );

		set_transient( 'ticket_booking_categories', $ticket_booking_all_the_cool_cats );
	}

	if ( $ticket_booking_all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ticket_booking_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so ticket_booking_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in ticket_booking_categorized_blog.
 */
function ticket_booking_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ticket_booking_categories' );
}
add_action( 'edit_category', 'ticket_booking_category_transient_flusher' );
add_action( 'save_post',     'ticket_booking_category_transient_flusher' );


if ( ! function_exists( 'ticket_booking_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function ticket_booking_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;