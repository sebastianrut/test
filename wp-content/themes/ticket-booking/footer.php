<?php
/**
 * The template for displaying the footer.
 *
 * @package Ticket Booking
 */

?>
	</div>
	<!-- Begin Footer Section -->
	<footer id="footer" class="ticket-booking-footer" itemscope itemtype="https://schema.org/WPFooter">
		<div class="container footer-widgets">
			<div class="row">
				<div class="footer-widgets-wrapper">
	                <?php get_sidebar( 'footer' ); ?>
	            </div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container copyrights">
				<div class="row">
					<div class="footer-copyrights-wrapper">
						<?php
							/**
							 * Hook - ticket_booking_action_footer.
							 *
							 * @hooked ticket_booking_footer_copyrights - 10
							 */
							do_action( 'ticket_booking_action_footer' );
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="scrl-to-top">
			<?php if(get_theme_mod('ticket_booking_enable_scrolltop',false)=="1"){ ?>
	   			<a id="scrolltop" class="btntoTop"><i class="bi bi-arrow-up-short"></i></a>
	  		<?php } ?>
		</div>
    </footer>
	<?php wp_footer(); ?>
</body>