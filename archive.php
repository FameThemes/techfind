<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
					$count = 0;
					if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							$count++;
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							if ( $count == 1 ) :
			 	        		get_template_part( 'template-parts/content', 'list-first' );
			     				continue;
			     			endif;

							get_template_part( 'template-parts/content', 'list' );

						endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>

					<?php
					global $wp_query;
					if (  $wp_query->max_num_pages > 1 ) {
						echo '<div class="post-pagination">';
						the_posts_pagination(array(
							'prev_next' => true,
							'prev_text' => '',
							'next_text' => '',
							'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'techfind') . ' </span>',
						));
						echo '</div>';
					}

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
