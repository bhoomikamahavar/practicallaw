<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package practicallawlite
 */

get_header();
?>
<div class="padding-top-bottom-80">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php
							if ( have_posts() ) :
								
								while ( have_posts() ) :
									the_post();

									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;
								
								the_posts_pagination( array(
								    'mid_size'  => 2,
								    'prev_text' => __( '<<', 'practicallawlite' ),
								    'next_text' => __( '>>', 'practicallawlite' ),
								    'type'      => 'list',
								) );
								
							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- #column -->
			<?php get_sidebar(); ?>
		</div><!-- #row -->
	</div><!-- #container -->
</div><!-- #padding-top-bottom-80 -->
<?php get_footer(); ?>