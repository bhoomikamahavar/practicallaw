<?php
/**
 * Template part for displaying video post format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package practicallawlite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-block">
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
		<!-- </div> -->
		<!-- #post-image -->
		<!-- post-content -->
	    <div class="post-content">
	        <div class="meta">
	            <span class="meta-date"><?php echo get_the_date( 'j F, Y' ); ?></span>
	            
	            <span class="meta-comments"><?php echo get_comments_number(); ?> <?php esc_html_e('Comments', 'practicallawlite'); ?></span>
	            
	            <?php
	            	edit_post_link( __( 'edit', 'practicallawlite' ), '<span>', '</span>' );
	            ?>
	            
	            	<span class="float-right"><?php the_category(', '); ?></span>
	        </div><!-- #meta -->
	        <h3 class="post-title mb20">
	        	<a href="<?php the_permalink(); ?>" class="title">
	        		<?php the_title(); ?>
	        	</a>
	        </h3> 
	        <?php custom_length_excerpt(20); ?>
	    </div><!-- #post-content -->
	</div><!-- #post-block -->
</article><!-- #post-<?php the_ID(); ?> -->