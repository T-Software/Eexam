<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SwipeWP
 */

get_header();
?>
<div class="mt-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<div class="error-text">
						<span class="error-icon">
							<i class="fas fa-exclamation-circle"></i>
						</span>
						404 <span> Error</span>
				</div><!-- 404-text -->
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'swipewp' ); ?></h1>
				</header><!-- .page-header -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- mt mt-container -->
<?php
get_footer();
