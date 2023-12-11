<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package practicallawlite
 */

get_header();
?>

<div class="padding-top-bottom-80">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
						<?php if ( have_posts() ) : ?>
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

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