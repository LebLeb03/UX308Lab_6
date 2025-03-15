<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Resume kit
 */

?>

<footer id="colophon" class="site-footer pt-3 pb-3">
	<div class="container">
		<div class="site-info text-center">
			<a href="<?php echo esc_url(__('https://wordpress.org/', 'resume-kit')); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf(esc_html__('Proudly powered by %s', 'resume-kit'), 'WordPress');
				?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf(esc_html__('%1$s by %2$s.', 'resume-kit'), '<a href="https://wpthemespace.com/product/resume-kit/">Resume kit</a>', 'Wp Theme Space');
			?>

		</div><!-- .site-info -->
	</div><!-- .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>