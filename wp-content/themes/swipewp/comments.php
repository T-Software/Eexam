<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
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

<div id="comments" class="comments-area" itemscope itemtype="http://schema.org/UserComments">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$swipewp_comment_count = get_comments_number();
			if ( '1' === $swipewp_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( '1 Comment', 'swipewp' ),
					''
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comments', '%1$s Comments', $swipewp_comment_count, 'comments title', 'swipewp' ) ),
					number_format_i18n( $swipewp_comment_count ),
					''
				);
			}
			?>
		</h2><!-- .comments-title -->

		<div class="comment-box">
			<?php the_comments_navigation(); ?>

			<ol class="comment-list">
				<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
				?>
			</ol><!-- .comment-list -->

			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'swipewp' ); ?></p>
				<?php
			endif; ?>
		</div><!-- class="comment-box" -->
		<?php
		endif; // Check for have_comments().

		comment_form();
		?>
	

</div><!-- #comments -->
