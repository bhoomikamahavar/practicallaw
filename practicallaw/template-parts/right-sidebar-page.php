<?php
/*
* Template Name: Right Sidebar Page
*
* @package practicallawlite
*
*/
get_header(); ?>

<div class="padding-top-bottom-80">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

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
</div>

<?php get_footer(); ?>