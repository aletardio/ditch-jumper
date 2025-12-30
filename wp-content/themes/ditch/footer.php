<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ditch_Jumper
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="col-4">
				<div class="heading-footer">
					<p class="text-xxs black py-b">CONTATTACI</p>
					<a class="text-sm black" href="tel:+3933812345678">338 12345678</a>
					<a class="text-sm black" href="mailto:info@ditchjumper.it">info@ditchjumper.it</a>
				</div>
			</div>
			<div class="col-4">
				<div class="heading-footer">
					<p class="text-xxs black py-b">DOVE TROVARCI</p>
					<p class="text-sm black">Ditch Jumper SRL Viale Bassani 87/G 36016, Thiene (VI)</p>
					<p class="text-sm black">P.IVA / C.F.: 04229630241</p>
				</div>
			</div>
			<div class="col-4">
				<div class="heading-footer align-end">
					<p class="text-xxs black">
						<a class="black text-initial" href="">Privacy Policy</a>
					</p>
					<div class="text-xxs black">
						<a class="black text-initial" href="">Cookie Policy</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<img
				src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/ditch-jumper-footer.svg' ); ?>"
				alt="Ditch Jumper"
				>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
