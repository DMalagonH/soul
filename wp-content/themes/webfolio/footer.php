</div>

	<!-- end content -->

</div>

<!-- end wrapper -->

<!-- begin footer -->

<footer>

		<div id="innerFooter">

		<?php 

		/* Widgetized sidebar */

		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>					

		<?php endif; ?>

			<div id="copy"><?php echo of_get_option('webfolio_footer_copyright');?></div>

			<?php if ( function_exists( 'wp_nav_menu' ) ){

				wp_nav_menu( array( 'theme_location' => 'footer-links', 'container_id' => 'footerMenu', 'fallback_cb'=>'footerlinks') );

				}else{

					footerlinks();

				}?>

			

		

</footer>

<!-- end footer -->

<?php wp_footer(); ?>

</body>

</html>

