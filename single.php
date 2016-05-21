<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Techfind
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="main-posts">
				<div class="main-posts-left">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>

				<div class="main-posts-right">
					<?php if ( is_active_sidebar( 'home-2' ) ) { ?>
						<div class="home-sidebar home-sidebar-2">
							<?php dynamic_sidebar( 'home-2' ); ?>
						</div>
					<?php } ?>
				</div>
				
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
