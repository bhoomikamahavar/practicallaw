<?php
/**
 * Template part for displaying aside post format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package practicallawlite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-block">
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