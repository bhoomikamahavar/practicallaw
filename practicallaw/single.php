<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package practicallawlite
 */

get_header();
?>
<?php
if( has_post_thumbnail() ) :
?>
<div class="post-pageheader" style="background-image: url(<?php the_post_thumbnail_url(); ?>);background-position: center; background-repeat: no-repeat; background-size: cover; ">
	<div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div data-aos="fade-down" class="post-pagecaption aos-init aos-animate">
                    <div class="post-content">
                        <div class="meta">
                        	<?php
	                        	printf('<span class="meta-date text-white">%1$s</span>',
	                        		// 1
	                        		get_the_date( 'j F, Y' )
	                        	);
	                        ?>
			                
				            <span class="meta-comments text-white"><?php echo get_comments_number(); ?> <?php esc_html_e('Comments', 'practicallawlite'); ?></span>
				            <span class="pull-right"><?php the_category(', '); ?></span>
				            <span class="pull-right"><?php the_tags(', '); ?></span>
                        </div><!-- #meta -->
                        <h1 class="text-white"><?php the_title(); ?></h1>

                    </div>
                </div><!-- #post-content -->
            </div><!-- #column -->
        </div><!-- #row -->
    </div><!-- #container -->
</div><!-- #post-pageheader -->
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			    <?php if(function_exists('bcn_display'))
			    {
			        bcn_display();
			    }?>
			</div>
		</div>
	</div>
</div>
<?php
else:
?>
<div class="page-header" style="background-image: url(<?php echo esc_url( get_template_directory_uri().'/images/page_header.jpg' ); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-caption">>
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
	  <?php
endif; 
?>
<div class="padding-top-bottom-80">
<div class="container">
<div class="row">
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
<div id="primary" class="content-area">
<main id="main" class="site-main">
<?php
while ( have_posts() ) :
the_post(); ?>
<div class="row">
<div class="col-12">
<div class="post-holder">
<?php
the_content( sprintf(
wp_kses(
/* translators: %s: Name of current post. Only visible to screen readers */
__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'practicallawlite' ),
array(
'span' => array(
'class' => array(),
),
)
),
get_the_title()
) );

wp_link_pages( array(
'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'practicallawlite' ),
'after'  => '</div>',
) );
?>
</div><!-- post-holder -->
</div><!-- #column -->
</div><!-- #row -->

<div class="post-navigation row">
<div class="text-left col-6">
<?php previous_post_link(); ?>
</div>
<div class="text-right col-6">
<?php next_post_link(); ?>
</div> 
</div><!-- #post-navigation #row -->

<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div data-aos="fade-up" class="author-block aos-init aos-animate">
<div class="row">
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
<div class="author-img">
<?php
printf('<a href="%1$s" class="rounded-circle">%2$s</a>',
// 1
get_author_posts_url(get_the_author_meta('ID')),

// 2
get_avatar($id)
);
?>
</div><!-- #author-img -->
</div><!-- #column -->
<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
<div class="author-content">
<div class="author-header">
<h5 class="author-title"><?php the_author(); ?></h5>
<span class="author-meta ">
<?php $user_info = get_userdata( get_the_author_meta('ID') );
echo '' . implode(', ', $user_info->roles) . "\n";
?>
</span>
</div><!-- #author-header -->
<p class="author-text"><?php the_author_meta('description'); ?></p>
<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="btn btn-default btn-sm"><?php esc_html_e('View All Posts', 'practicallawlite'); ?></a>
</div><!-- #author-content -->
</div><!-- #column -->
</div><!-- #row -->
</div><!-- #author-block -->
</div><!-- #column -->
</div><!-- #row -->

<?php

// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
comments_template();
endif;

endwhile; // End of the loop.
?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #column -->
<?php get_sidebar(); ?>
</div><!-- #row -->
</div><!-- #container -->
</div><!-- #padding-top-bottom-80 -->	
<?php get_footer(); ?>
