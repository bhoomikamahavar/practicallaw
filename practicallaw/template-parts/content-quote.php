<?php
/**
 * Template part for displaying quote post format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package practicallawlite
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-block post-quote">
		<!-- post-image -->
		 
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
		 
		<!-- #post-image -->
		 
	</div><!-- #post-block -->
</div><!-- #post-<?php the_ID(); ?> -->