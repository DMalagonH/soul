<?php
get_header();
?>

<?php 
		$current = get_the_category(); 
		$current_id= $current[0] ->cat_ID; 
		$categs_list = get_category_parents($current_id);
		$pieces = explode("/", $categs_list);
		$category_name = $pieces[0];
		$parent_name = $pieces[0];
		$parent_id = get_cat_id($pieces[0]);
		?>	
<div id="innerTop">
	<?php if(is_category() || in_category($parent_id) || post_is_in_descendant_category($parent_id)){?>
		<div class="innerTitle clearfix"><?php echo $parent_name; ?></div>
		<?php if(category_description($parent_id) !=''){?>
		<div class="innerDesc"><?php echo category_description($parent_id);?> </div>
	<?php }
	 }?>
</div>

<!-- begin col left -->
	<div id="colLeft">		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="blogItem clearfix">
			<div class="postComments">
				<?php comments_popup_link('0', '1', '%'); ?>
			</div>
				<div class="meta">
				<span class="metadata"><img src="<?php bloginfo('template_url'); ?>/images/ico_folder.png" alt="Posted" /> <?php the_time('F j, Y') ?> in <?php the_category(', ') ?> by <?php the_author() ?></span>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				</div>
				<?php the_content(); ?> 
			
		</div>
		<!-- end post -->
		<!-- Social Sharing Icons -->
		<div class="social">
		<strong>Share this article:</strong><br />
				<a href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php the_permalink(); ?>" title="Tweet this!">
				<img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="Tweet this!" />
				</a>
				
				<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="StumbleUpon.">
				<img src="<?php bloginfo('template_directory'); ?>/images/stumbleupon.png" alt="StumbleUpon" />
				</a>
				<a href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Digg this!">
				<img src="<?php bloginfo('template_directory'); ?>/images/digg.png" alt="Digg This!" />
				</a>
				
				<a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Bookmark on Delicious.">
				<img src="<?php bloginfo('template_directory'); ?>/images/delicious.png" alt="Bookmark on Delicious" />
				</a>
				
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;amp;t=<?php the_title(); ?>" title="Share on Facebook.">
				<img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="Share on Facebook" id="sharethis-last" />
				</a>
				
			</div>
		
		<!-- end Social Sharing Icons -->
		
		
		
		
        <?php comments_template(); ?>
		<?php endwhile; else: ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
			
			</div>
			<!-- end col left -->
	
	<?php get_sidebar(); ?>	



<?php get_footer(); ?>
