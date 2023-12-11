<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package practicallawlite
 */
get_header();
?>
<div class="padding-top-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                
                <?php if( class_exists( 'Redux' ) && $wc_setting['error_img']['url'] != '' ){

                ?><div class="mb60"><img src="<?php echo $wc_setting['error_img']['url']; ?>"></div><?php 
                      
                }elseif( has_custom_logo() ){
                  
                    the_custom_logo();
                  
                  }else{

                    ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a><?php
                  
                  } ?>
                    
                <div class="error-block">

                    <?php if( class_exists( 'Redux' ) && $wc_setting['error_title'] != '' ){ ?>

                        <h1 class="error-title"><?php echo $wc_setting['error_title']; ?></h1> <?php

                    }else{

                        ?><h1 class="error-title"><?php esc_html_e('404 Error', 'practicallawlite'); ?></h1><?php

                    } ?>

                    <?php if( class_exists( 'Redux' ) && $wc_setting['error_subtitle'] != '' ){ ?>

                        <h2 class="error-text"><?php echo $wc_setting['error_subtitle']; ?></h2> <?php

                    }else{

                        ?><h2 class="error-text"><?php esc_html_e('Sorry, the page not found', 'practicallawlite'); ?></h2><?php

                    } ?>
                    
                            
                    <?php if( class_exists( 'Redux' ) && $wc_setting['error_desc'] != '' ){ ?>

                        <p><?php echo $wc_setting['error_desc']; ?></p> <?php

                    }else{

                        ?><p><?php esc_html_e('The link you followed may be broken, or the page may have been removed.', 'practicallawlite' );?></p><?php

                    } ?>

                    <?php if( class_exists( 'Redux' ) && $wc_setting['error_btn'] != '' ){

                        ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default">
                                <?php echo $wc_setting['error_btn']; ?>
                            </a>
                        <?php

                    }else{

                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default">
                            <?php esc_html_e('View our results', 'practicallawlite'); ?>  
                        </a>
                        <?php
                    } ?>
                    
                </div>
            </div><!-- #column -->
        </div><!-- #row -->
    </div><!-- #container -->
</div><!-- #padding-top-bottom-80 -->
<?php
get_footer();
