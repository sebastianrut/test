<?php 
/*
* Display Logo and contact details
*/
?>
<div class="logo">
  <?php if ( has_custom_logo() ) : ?>
    <div class="site-logo"><?php the_custom_logo(); ?></div>
  <?php endif; ?>
  <?php if( get_theme_mod('grand_hotel_site_title_tagline',true) != false){ ?>
    <?php $blog_info = get_bloginfo( 'name' ); ?>
    <?php if ( ! empty( $blog_info ) ) : ?>
      <?php if ( is_front_page() && is_home() ) : ?>
        <h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <?php else : ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
      <?php endif; ?>
    <?php endif; ?>
    <?php
      $description = get_bloginfo( 'description', 'display' );
      if ( $description || is_customize_preview() ) :
    ?>
      <p class="site-description">
        <?php echo esc_html($description); ?>
      </p>
    <?php endif; ?>
  <?php } ?>
</div>