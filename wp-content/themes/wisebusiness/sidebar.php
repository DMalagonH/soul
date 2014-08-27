<!-- begin colRight -->
		<div id="colRight">
		<!-- Search box -->
		<div id="searchBox">
			<h2>Search the site</h2>
			<form id="searchform" action="" method="get">
				<input id="s" type="text" name="s" value=""/>
				<input id="searchsubmit" type="submit" value="SEARCH"/>
			</form>
		</div>
		
	<?php 
	/* Widgetized sidebar */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
							
<?php endif; ?>
	
	<!-- Random Testimonial -->
			<h2 class="testimonials">Random Testimonial</h2>
			<div class="boxRight testimonialsList">
				<ul>
				
		<?php
			$testimonial = new WP_Query($query_string.'&cat='.get_option('wise_testimonials_id').'&showposts=1&orderby=rand');
			if ($testimonial -> have_posts()) : while ($testimonial -> have_posts()) : $testimonial -> the_post(); 			
		?>
					<li><span>~ <?php the_title(); ?></span>
						<p><?php the_post_thumbnail();?>"<?php content('1000'); ?>"</p>
					</li>
			<?php endwhile;
				  endif; ?>
					<li><a href="<?php echo get_category_link(get_option('wise_testimonials_id') )?>"><strong>Read more testimonials &raquo;</strong></a></li>
			
				</ul>
			</div>
		<!-- end random testimonial -->
		<!-- Twitter box -->
		<h2 class="twitter">What's the little bird saying?</h2>
			<div class="boxRight twitterList">
				 <!-- <li><p># <a href="#">@conorpegypt</a> why not just access it from Rockwell's theme documentation? <a href="#">http://bit.ly/6owa235</a><br /> <span>about 4 hours ago</span></p></li> -->
				 <?php aktt_sidebar_tweets(); ?>
				<!-- <li><span><?php aktt_latest_tweet(); ?></span></li>
				  <li><a href="<?php echo get_category_link(get_option('wise_twitter_link') )?>"><strong><a href="<?php echo get_option('wise_twitter_link') ?>">Follow us &raquo;</a></strong></a></li> -->
			</div>
		<!-- end twitter box -->
		</div>
		<!-- end colRight -->
