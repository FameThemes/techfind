<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techfind
 */

get_header(); ?>


<div class="metro-box">
	<div class="container">
		<?php if ( is_active_sidebar( 'metro' ) ) { ?>
		<div class="home-sidebar home-metro">
			<?php dynamic_sidebar( 'metro' ); ?>
		</div>
		<?php } ?>
	</div>
</div>


<div class="container">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <div class="main-posts">

				<div class="main-posts-left">
					<?php if ( is_active_sidebar( 'home-1' ) ) { ?>
						<div class="home-sidebar home-sidebar-1">
							<?php dynamic_sidebar( 'home-1' ); ?>
						</div>
					<?php } ?>
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
