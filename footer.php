<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency_Ecommerce
 */

	/**
	 * Hook - agency_ecommerce_after_content.
	 *
	 * @hooked agency_ecommerce_after_content_action - 10
	 */
	do_action( 'agency_ecommerce_after_content' );


	get_template_part( 'template-parts/footer-widgets' );


    /**
     * Hook - agency_ecommerce_before_footer_copyright_area.
     *
     * @hooked agency_ecommerce_before_footer_copyright_area_action - 10
     */
    do_action('agency_ecommerce_before_footer_copyright_area');
    ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
            <?php
            $footer_payment_image = agency_ecommerce_get_option('footer_payment_image');

            ?>
			<div class="site-footer-wrap <?php echo !empty($footer_payment_image) ? 'ae-footer-payment':'' ?>">
				<?php

				$copyright_text = agency_ecommerce_get_option( 'copyright_text' );

				if ( ! empty( $copyright_text ) ) : ?>

					<div class="copyright">

						<?php echo wp_kses_data( $copyright_text ); ?>

					</div><!-- .copyright -->

					<?php

				endif;

				do_action( 'agency_ecommerce_credit' );

				?>
			</div>
		</div><!-- .container -->
	</footer><!-- #colophon -->
<?php
/**
 * Hook - agency_ecommerce_after_footer.
 *
 * @hooked agency_ecommerce_after_footer - 10
 */

do_action('agency_ecommerce_after_footer');

?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
