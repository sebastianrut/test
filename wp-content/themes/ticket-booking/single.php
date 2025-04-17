<?php
/**
 * The template for displaying all single posts.
 *
 * @package Ticket Booking
 */

get_header();
ticket_booking_before_title();
if(true===get_theme_mod( 'ticket_booking_enable_page_title',true)) :
    do_action('ticket_booking_get_page_title',false,false,false,false);
endif;
ticket_booking_after_title();

$ticket_booking_prevarticle = esc_html(get_theme_mod( 'ticket_booking_single_post_previous_article_text', esc_html__('Previous Article','ticket-booking')));
$ticket_booking_nextarticle = esc_html(get_theme_mod( 'ticket_booking_single_post_next_article_text', esc_html__('Next Article','ticket-booking')));

?>
<div class="content-section img-overlay"></div>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="content-inner">
			<div id="blog-section">
				<div class="container">
			        <div class="row">
			        	<?php
			        		if('right'===esc_html(get_theme_mod('ticket_booking_blog_single_sidebar_layout','right'))) {
			        			?>
			        				<?php
			        					if ( is_active_sidebar('sidebar-1')){
			        						?>
			        							<div id="post-wrapper" class="col-md-9">
													<?php
														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/post/content', 'single');

															the_post_navigation(
															    array(
															        'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="bi bi-arrow-left-circle"></i>'. $ticket_booking_prevarticle .'</span> ' .
																					'<span class="screen-reader-text"> '. $ticket_booking_prevarticle .' </span> ' .
																					'<h5 class="post-title">%title</h5>',
															        'next_text' => '<span class="meta-nav" aria-hidden="true">'. $ticket_booking_nextarticle .'</span> ' .
																					'<span class="screen-reader-text">'. $ticket_booking_nextarticle .'</span> <i class="bi bi-arrow-right-circle"></i> ' .
																					'<h5 class="post-title">%title</h5>',
															        'screen_reader_text' => esc_html__('Posts navigation', 'ticket-booking')
															    )
															);

															// If comments are open or we have at least one comment, load up the comment template.
															if ( comments_open() || get_comments_number() ) :
																comments_template();
															endif;

														endwhile; // End of the loop.
													?>							
												</div>
												<div id="sidebar-wrapper" class="col-md-3">
													<?php get_sidebar('sidebar-1'); ?>
												</div>	
			        						<?php
			        					}
			        					else{
			        						?>
			        							<div class="col-md-12">
													<?php
														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/post/content', 'single');

															the_post_navigation(
															    array(
															        'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="bi bi-arrow-left-circle"></i>'. $ticket_booking_prevarticle .'</span> ' .
																					'<span class="screen-reader-text">'. $ticket_booking_prevarticle .' </span> ' .
																					'<h5 class="post-title">%title</h5>',
															        'next_text' => '<span class="meta-nav" aria-hidden="true">'. $ticket_booking_nextarticle .'</span> ' .
																					'<span class="screen-reader-text">'. $ticket_booking_nextarticle .'</span><i class="bi bi-arrow-right-circle"></i> ' .
																					'<h5 class="post-title">%title</h5>',
															        'screen_reader_text' => esc_html__('Posts navigation', 'ticket-booking')
															    )
															);

															// If comments are open or we have at least one comment, load up the comment template.
															if ( comments_open() || get_comments_number() ) :
																comments_template();
															endif;

														endwhile; // End of the loop.
													?>							
												</div>
			        						<?php
			        					}
	                				?>			        				
			        			<?php
			        		}
			        		else if('left'===esc_html(get_theme_mod('ticket_booking_blog_single_sidebar_layout','right'))) {
			        			?>
			        				<?php
			        					if ( is_active_sidebar('sidebar-1')){
			        						?>
			        							<div id="sidebar-wrapper" class="col-md-3">
													<?php get_sidebar('sidebar-1'); ?>
												</div>
						        				<div id="post-wrapper" class="col-md-9">
													<?php
														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/post/content', 'single');

															the_post_navigation(
															    array(
															        'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="bi bi-arrow-left-circle"></i>'. $ticket_booking_prevarticle .'</span> ' .
																					'<span class="screen-reader-text"> '. $ticket_booking_prevarticle .' </span> ' .
																					'<h5 class="post-title">%title</h5>',
															        'next_text' => '<span class="meta-nav" aria-hidden="true">'. $ticket_booking_nextarticle .'</span> ' .
																					'<span class="screen-reader-text">'. $ticket_booking_nextarticle .'</span><i class="bi bi-arrow-right-circle"></i> ' .
																					'<h5 class="post-title">%title</h5>',
															        'screen_reader_text' => esc_html__('Posts navigation', 'ticket-booking')
															    )
															);

															// If comments are open or we have at least one comment, load up the comment template.
															if ( comments_open() || get_comments_number() ) :
																comments_template();
															endif;

														endwhile; // End of the loop.
													?>							
												</div>									
			        						<?php
			        					}
			        					else{
			        						?>
			        							<div class="col-md-12">
													<?php
														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/post/content', 'single');

															the_post_navigation(
															    array(
															        'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="bi bi-arrow-left-circle"></i>'. $ticket_booking_prevarticle .'</span> ' .
																					'<span class="screen-reader-text"> '. $ticket_booking_prevarticle .' </span> ' .
																					'<h5 class="post-title">%title</h5>',
															        'next_text' => '<span class="meta-nav" aria-hidden="true">'. $ticket_booking_nextarticle .'</span> ' .
																					'<span class="screen-reader-text">'. $ticket_booking_nextarticle .'</span><i class="bi bi-arrow-right-circle"></i> ' .
																					'<h5 class="post-title">%title</h5>',
															        'screen_reader_text' => esc_html__('Posts navigation', 'ticket-booking')
															    )
															);
															
															// If comments are open or we have at least one comment, load up the comment template.
															if ( comments_open() || get_comments_number() ) :
																comments_template();
															endif;

														endwhile; // End of the loop.
													?>							
												</div>
			        						<?php
			        					}
			        				?>			        				
			        			<?php
			        		}
			        		else {
			        			?>
									<div class="col-md-12">
										<?php
											while ( have_posts() ) : the_post();

												get_template_part( 'template-parts/post/content', 'single');

												the_post_navigation(
												    array(
												        'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="bi bi-arrow-left-circle"></i>'. $ticket_booking_prevarticle .'</span> ' .
																		'<span class="screen-reader-text"> '. $ticket_booking_prevarticle .' </span> ' .
																		'<h5 class="post-title">%title</h5>',
												        'next_text' => '<span class="meta-nav" aria-hidden="true">'. $ticket_booking_nextarticle .'</span> ' .
																		'<span class="screen-reader-text">'. $ticket_booking_nextarticle .'</span><i class="bi bi-arrow-right-circle"></i> ' .
																		'<h5 class="post-title">%title</h5>',
												        'screen_reader_text' => esc_html__('Posts navigation', 'ticket-booking')
												    )
												);
												
												// If comments are open or we have at least one comment, load up the comment template.
												if ( comments_open() || get_comments_number() ) :
													comments_template();
												endif;

											endwhile; // End of the loop.
										?>
						            </div>
								<?php
			        		}
			        	?>							
					</div>
				</div>
			</div>
		</div>		
	</main>
</div>

<?php
get_footer();
