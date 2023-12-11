<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package practicallawlite
 */

?>
<!doctype html>
<?php global $wc_setting ?>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'practicallawlite' ); ?></a>

<header id="masthead" class="site-header">
  <div class="header-transparent">
    <div class="container-fluid">
      <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <nav class="navbar navbar-expand-lg navbar-transparent" role="navigation">
            <div class="logo-top">
              <?php if( class_exists( 'Redux' ) && $wc_setting['logo_upload']['url'] != '' ){

                ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $wc_setting['logo_upload']['url']; ?>"></a><?php 
                  
              }elseif( has_custom_logo() ){
              
                the_custom_logo();
              
              }else{

                ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a><?php
              
              } ?>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-transparent" aria-controls="navbar-transparent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar top-bar mt-0"></span>
              <span class="icon-bar middle-bar"></span>
              <span class="icon-bar bottom-bar"></span>
            </button>
                <?php
                if ( has_nav_menu( 'primary' ) ) :
                      wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 4,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'navbar-transparent',
                        'menu_class'        => 'navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                      ) );
                endif;
                ?>
          </nav>
        </div><!-- #column -->

      </div><!-- #row -->
    </div><!-- #container-fluid -->
  </div><!-- #header-transparent -->
</header><!-- #masthead -->

<?php get_template_part( 'template-parts/content-page-header' ); ?>

<!-- header-section--> 
<div id="content" class="site-content">