<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */

?>
<div class="search-post-wrapper">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		if( has_post_thumbnail() ){ ?>
			<div class="image-wrapper">
				<div class="image-wrap" style="background:url( <?php the_post_thumbnail_url(); ?> ) no-repeat top center; background-size:cover; ">
				</div><!-- image-wrap -->
			</div><!-- image wrapper -->
		<?php 
		} ?>
		<div class="search-result-detail">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<div class="entry-meta-wrapper">
				<div class="entry-meta">
					<?php
					swipewp_posted_on();
					swipewp_posted_by();
					?>
				</div><!-- .entry-meta -->
				<?php swipewp_read_more_button(); ?>
			</div><!-- entry-meta wrapper -->
		</div><!-- search-result-detail -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- search-post-wrapper -->
