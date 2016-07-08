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

		<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
		<div class="footer-posts">
			<div class="container">
				<div class="footer-row">
					<?php

						dynamic_sidebar( 'footer-1' );

					?>
				</div>
			</div>
		</div>
		<?php } ?>

		<?php if ( is_active_sidebar( 'footer' ) ) { ?>
		<div class="footer-widgets">
			<div class="container">
				<div class="footer-row">
					<?php

							dynamic_sidebar( 'footer' );

					?>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="site-info">
			<div class="container">

				<?php
				do_action( 'techfind_footer_site_info' );
				 ?>

			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
