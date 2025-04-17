<?php
/**
 * @package Ticket Booking
 */

//Return if the first widget area has no widgets
if ( !is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<?php //user selected widget columns

	$ticket_booking_widget_num = esc_html(get_theme_mod('ticket_booking_footer_widgets', '4'));
	
	if ($ticket_booking_widget_num == '4') :
		$ticket_booking_col1 ='col-md-3';
		$ticket_booking_col2 ='col-md-3';
		$ticket_booking_col3 ='col-md-3';
		$ticket_booking_col4 ='col-md-3';
	elseif ($ticket_booking_widget_num == '3') :
		$ticket_booking_col1 ='col-md-4';
		$ticket_booking_col2 ='col-md-4';
		$ticket_booking_col3 ='col-md-4';
		
	elseif ($ticket_booking_widget_num == '2') :
		 $ticket_booking_col1 ='col-md-6';
		 $ticket_booking_col2 ='col-md-6';
	else :
		$ticket_booking_col1 ='col-md-12';
	endif;
?>
		
<?php 
	if ( is_active_sidebar( 'footer-1' ) && ( $ticket_booking_widget_num == '4' || $ticket_booking_widget_num == '3' || $ticket_booking_widget_num == '2' || $ticket_booking_widget_num == '1')) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($ticket_booking_col1); ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-2' ) && ( $ticket_booking_widget_num == '4' || $ticket_booking_widget_num == '3' || $ticket_booking_widget_num == '2')) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($ticket_booking_col2); ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-3' ) && ( $ticket_booking_widget_num == '4' || $ticket_booking_widget_num == '3' )) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($ticket_booking_col3); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-4' ) && ( $ticket_booking_widget_num == '4' )) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($ticket_booking_col4); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	endif;
?>