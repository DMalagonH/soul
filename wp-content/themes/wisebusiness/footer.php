</div>
	<!-- end content -->
	
	<!-- begin footer -->
<div id="footer">
	<div id="footerInner" class="clearfix">
				<?php 
		/* Widgetized sidebar */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>					
		<?php endif; ?>
		<?php if(get_option('wise_footer_contact')!=''){
				$footercontact=get_post(get_option('wise_footer_contact'));?> 
				<div class="footerBox contact"><h2><?php echo $footercontact->post_title?></h2>
					<?php echo apply_filters('the_content', $footercontact->post_content);?>
					<p class="social">
					<?php if(get_option('wise_twitter_link')!=''){?>
					<img src="<?php bloginfo('template_url'); ?>/images/twitter.png" alt="Follow us" /> <a href="<?php echo get_option('wise_twitter_link') ?>">Follow us</a>&nbsp;&nbsp;&nbsp;
					<?php }?>
					<?php if(get_option('wise_facebook_link')!=''){?>
					<img src="<?php bloginfo('template_url'); ?>/images/facebook.png" alt="Become a fan" /> <a href="<?php echo get_option('wise_facebook_link') ?>">Become a fan</a>
					<?php }?>
					</p>
				
				</div>
			<?php }?>
	</div>
			<div id="footerInnerBottom">
				<div id="copy">&copy; 2009 Wisebusiness. All Right Reserved. </div>
				<?php if ( function_exists( 'wp_nav_menu' ) ){
				wp_nav_menu( array( 'theme_location' => 'footer-links', 'container_id' => 'footerMenu', 'fallback_cb'=>'footerlinks') );
				}else{
					footerlinks();
				}?>
				<div id="site5bottom">Created by <a href="http://www.s5themes.com/">Site5 WordPress
Themes</a>. <br>Experts in <a href="http://gk.site5.com/t/535">WordPress Hosting</a>.</div>
			</div>
</div>
<!-- end footer -->
</div>
<!-- end wrapper -->
<?php if (get_option('wise_analytics') <> "") { 
		echo stripslashes(stripslashes(get_option('wise_analytics'))); 
	} ?>
<?php wp_footer(); ?>
</body>
</html>
