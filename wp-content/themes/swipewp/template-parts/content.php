<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
	<?php 
		if( has_post_thumbnail() ){ ?>
			<div class="image-wrapper">
				<div class="image-wrap" style="background:url( <?php the_post_thumbnail_url(); ?> ) no-repeat top center; background-size:cover; ">
				</div><!-- image-wrap -->
			</div><!-- image wrapper -->
		<?php 
		} ?>
	<div class="post-detail-wrapper">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
				<?php
					swipewp_posted_on();
					swipewp_posted_by();
				?>
				</div><!-- .entry-meta -->
			<?php endif;
			 ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_excerpt( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'swipewp' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'swipewp' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<div class="entry-footer">
			<?php
				swipewp_entry_footer();
				swipewp_read_more_button();
			?>
		</div><!-- .entry-footer -->
	</div><!-- post-detail-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
