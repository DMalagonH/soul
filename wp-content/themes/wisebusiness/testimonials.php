<?php 
		$current = get_the_category(); 
		$current_id= $current[0] ->cat_ID; 
		$categs_list = get_category_parents($current_id);
		$pieces = explode("/", $categs_list);
		$parent_name = $pieces[0];
		$parent_id = get_cat_id($pieces[0]);
		?>	
<div id="innerTop">
		<div class="innerTitle clearfix"><?php echo $parent_name; ?></div>
		<?php if(category_description($parent_id) !=''){?>
		<div class="innerDesc"><?php echo category_description($parent_id);?> </div>
	<?php }?>
</div>

<!-- begin colLeft -->
		<div id="colLeft">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="testimonial clearfix">
			<h2><?php the_title(); ?></h2>
						<p><?php the_post_thumbnail(); ?>"<?php content('1000'); ?>"</p>
			</div>
		<?php endwhile; ?>
		<!-- <div class="navigation">
			<div class="alignleft"><?php next_posts_link('Older') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer') ?></div>
		</div> -->
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
	<?php else : ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
		</div>
<!-- end colLeft -->

<?php get_sidebar(); ?>	


<?php get_footer(); ?>
