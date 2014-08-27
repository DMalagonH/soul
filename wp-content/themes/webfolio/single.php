<?php
get_header();
?>

<!-- begin section -->
	<section>		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!-- begin article -->
		<article class="clearfix">
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/ico_file.png" alt="<?php _e("Posted", "site5framework"); ?>" /> <?php _e("Posted by", "site5framework"); ?> <?php the_author(); ?> <?php _e("in", "site5framework"); ?> <?php the_category(', ') ?> &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/library/images/ico_comments.png" alt="<?php _e("Comments", "site5framework"); ?>" /> <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") );?>
				<div class="date"><?php the_time('M') ?><br/><strong><?php the_time('j') ?></strong></div>
			</div>
				<?php the_content(); ?> 
		</article>
		<!-- end article -->
		<!-- Social Sharing Icons -->
		<div class="social">
			 <?php _e("If you enjoyed this article please consider", "site5framework"); ?><strong> <?php _e("sharing it", "site5framework"); ?>!</strong>
				<a href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php the_permalink(); ?>" title="Tweet this!">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/twitter.png" alt="Tweet this!" />
				</a>
				
				<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="StumbleUpon.">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/stumbleupon.png" alt="StumbleUpon" />
				</a>
				
				<a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Vote on Reddit.">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/reddit.png" alt="Reddit" />
				</a>
				<a href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Digg this!">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/digg.png" alt="Digg This!" />
				</a>
				
				<a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Bookmark on Delicious.">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/delicious.png" alt="Bookmark on Delicious" />
				</a>
				
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;amp;t=<?php the_title(); ?>" title="Share on Facebook.">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/facebook.png" alt="Share on Facebook" id="sharethis-last" />
				</a>
				
			</div>
		
		<!-- end Social Sharing Icons -->
		
		
		
		
        <?php comments_template(); ?>
		<?php endwhile; else: ?>

		<p><?php _e("Sorry, but you are looking for something that isn't here.", "site5framework"); ?></p>

	<?php endif; ?>
			
			</section>
			<!-- end section -->
	
	<?php get_sidebar(); ?>	



<?php get_footer(); ?>
