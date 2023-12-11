<?php
/**
 * Page Header Code
 */
?>
<?php

global $posts, $post, $post_type, $portfolio_term, $wc_setting;

if( is_front_page() ){

	echo '';

}elseif( is_archive() ){?>

        <?php

        if( class_exists( 'Redux' ) && $wc_setting['ph_bgimg']['url'] != '' ){ ?>

            <div class="page-header" style="background-image: url(<?php echo $wc_setting['ph_bgimg']['url'] ?>);"> <?php

        }else{ ?>

            <div class="page-header" style="background-image: url(<?php echo esc_url( get_template_directory_uri().'/images/page_header.jpg' ); ?>);">

        <?php }

        ?>

        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-caption">>
                        <h1 class="page-title"><?php the_archive_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <?php
        
        if( class_exists( 'Redux' ) && $wc_setting['ph_bgimg']['url'] != '' ){ ?>

            </div> <?php

        }else{ ?>

            </div>

        <?php }
    
}elseif( is_home() ){ ?>

        <?php

        if( class_exists( 'Redux' ) && $wc_setting['ph_bgimg']['url'] != '' ){ ?>

            <div class="page-header" style="background-image: url(<?php echo $wc_setting['ph_bgimg']['url'] ?>);"> <?php

        }else{ ?>

            <div class="page-header" style="background-image: url(<?php echo esc_url( get_template_directory_uri().'/images/page_header.jpg' ); ?>);">

        <?php }

        ?>

        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-caption">>
                        <h1 class="page-title"><?php single_post_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        
        if( class_exists( 'Redux' ) && $wc_setting['ph_bgimg']['url'] != '' ){ ?>

            </div> <?php

        }else{ ?>

            </div>

        <?php }

}elseif( is_page() ){ ?>

        <?php

        if( class_exists( 'Redux' ) && $wc_setting['ph_bgimg']['url'] != '' ){ ?>

            <div class="page-header" style="background-image: url(<?php echo $wc_setting['ph_bgimg']['url'] ?>);"> <?php

        }else{ ?>

            <div class="page-header" style="background-image: url(<?php echo esc_url( get_template_directory_uri().'/images/page_header.jpg' ); ?>);">

        <?php }

        ?>

        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-caption">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <?php
        
        if( class_exists( 'Redux' ) && $wc_setting['ph_bgimg']['url'] != '' ){ ?>

            </div> <?php

        }else{ ?>

            </div>

        <?php }

}

elseif( is_singular() ){

    echo '';

}