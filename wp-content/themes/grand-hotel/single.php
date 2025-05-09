<?php
/**
 * Displaying all single posts.
 * @package Grand Hotel
 */

get_header(); ?>

<main id="main" role="main">
	<?php do_action( 'grand_hotel_single_header' ); ?>
		<div class="container">
		    <div class="wrapper">
			    <?php
			        $grand_hotel_layout = get_theme_mod( 'grand_hotel_theme_options','One Column');
			        if($grand_hotel_layout == 'One Column'){?>
			        	<div class="singlebox" id="main-content">
							<?php if ( have_posts() ) :
				              	/* Start the Loop */
				                while ( have_posts() ) : the_post();
				                  get_template_part( 'template-parts/post/single-content' ); 
				                endwhile;
				                else :
				                  get_template_part( 'no-results' ); 
				                endif; 
		            		?>
				       	</div>
				    <?php }else if($grand_hotel_layout == 'Three Columns'){?>
				   		<div class="row">
					    	<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
					       	<div class="col-lg-6 col-md-6 singlebox" id="main-content">
								<?php if ( have_posts() ) :
					              	/* Start the Loop */
					                while ( have_posts() ) : the_post();
					                  get_template_part( 'template-parts/post/single-content' ); 
					                endwhile;
					                else :
					                  get_template_part( 'no-results' ); 
					                endif; 
		            			?>
					       	</div>
							<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
						</div>
					<?php }else if($grand_hotel_layout == 'Four Columns'){?>
						<div class="row">
					    	<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2'); ?></div>
					       	<div class="col-lg-3 col-md-3 singlebox" id="main-content">
								<?php if ( have_posts() ) :
					              	/* Start the Loop */
					                while ( have_posts() ) : the_post();
					                  get_template_part( 'template-parts/post/single-content' );
					                endwhile;
					                else :
					                  get_template_part( 'no-results' ); 
					                endif; 
			            		?>
					       	</div>
							<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2'); ?></div>
							<div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-3'); ?></div>
						</div>
		       		<?php }else if($grand_hotel_layout == 'Right Sidebar'){?>
		       			<div class="row">
					       	<div class="col-lg-8 col-md-8 singlebox" id="main-content">
								<?php if ( have_posts() ) :
					              	/* Start the Loop */
					                while ( have_posts() ) : the_post();
					                  get_template_part( 'template-parts/post/single-content' ); 
					                endwhile;
					                else :
					                  get_template_part( 'no-results' ); 
					                endif; 
			            		?>
					       	</div>
							<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
						</div>
					<?php }else if($grand_hotel_layout == 'Left Sidebar'){?>
						<div class="row">
				       		<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
							<div class="col-lg-8 col-md-8 singlebox" id="main-content">
								<?php if ( have_posts() ) :
					              	/* Start the Loop */
					                while ( have_posts() ) : the_post();
					                  get_template_part( 'template-parts/post/single-content' ); 
					                endwhile;
					                else :
					                  get_template_part( 'no-results' ); 
					                endif; 
			            		?>
					       	</div>
					    </div>
					<?php }else if($grand_hotel_layout == 'Grid Layout'){?>
						<div class="row">
					       	<div class="col-lg-8 col-md-8 singlebox" id="main-content">
								<?php if ( have_posts() ) :
					              	/* Start the Loop */
					                while ( have_posts() ) : the_post();
					                  get_template_part( 'template-parts/post/single-content' );
					                endwhile;
					                else :
					                  get_template_part( 'no-results' ); 
					                endif; 
			            		?>
					       	</div>
							<div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
						</div>
					<?php } ?>
		        <div class="clearfix"></div>
		    </div>
		</div>
	<?php do_action( 'grand_hotel_single_footer' ); ?>
</main>

<?php get_footer(); ?>