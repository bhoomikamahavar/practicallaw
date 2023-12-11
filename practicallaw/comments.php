<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package practicallawlite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
	<div id="comments" class="mb30">

		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>
			<h2 class="comments-title">
				<?php
				$practicallawlite_comment_count = get_comments_number();
				if ( '1' === $practicallawlite_comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'practicallawlite' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $practicallawlite_comment_count, 'comments title', 'practicallawlite' ) ),
						number_format_i18n( $practicallawlite_comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}
				?>
			</h2><!-- .comments-title -->

			<?php the_comments_navigation(); ?>

			<ol class="comment-list list-unstyled">
				<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size'=> 80,
				) );
				?>
			</ol><!-- .comment-list -->

			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'practicallawlite' ); ?></p>
				<?php
			endif;

		endif; // Check for have_comments().
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$fields = array(

			'author' => '<div class="form-group">' . '<input id="author" name="author" placeholder="Name" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
    		'email'  => '<div class="form-group"> ' . '<input id="email" name="email" placeholder="Email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
    		'url'    => '<div class="form-group"><p class="comment-form-url"> ' .
                     '<input id="url" name="url" type="url"' . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="" class="form-control" placeholder="Websie" /></p></div>',
		);

		$args = array(
			'fields' => apply_filters( 'comment_form_default_fields' ,$fields ),
			'class_submit' => 'btn btn-default',
			'comment_field' => '<div class="form-group"><p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Comments" rows="5" aria-required="true" class="form-control"></textarea></p></div>',
		);

		comment_form( $args );
		?>

	</div><!-- #comments -->