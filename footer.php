<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Techfind
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-widgets">
			<div class="container">
				<div class="footer-row">
					<?php
						if ( is_active_sidebar( 'footer' ) ) {
							dynamic_sidebar( 'footer' );
						}
					?>
				</div>
			</div>
		</div>

		<div class="site-info">
			<div class="container">

				<div class="website-copyright">
					<p><?php printf( esc_html__( 'All Site Contents &copy; Copyright 2016 %1$s WordPress. All Rights Reserved. Powered by %2$s.', 'techfind' ), get_bloginfo( 'name' ) ,'WordPress' ); ?>
					<p><?php echo esc_html( 'WordPress is web software you can use to create a beautiful website or blog.', 'techfind' ) ?></p>
				</div>

				<div class="site-copyright">
					<p>
						<?php printf( esc_html__( 'Theme by %2$s.', 'techfind' ), 'techfind', '<a href="https://wpstash.com" rel="designer">WPStash</a>' ); ?>
					</p>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
