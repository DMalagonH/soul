<?php get_header(); ?>

<div id="innerTop">
		<div class="innerTitle clearfix"><h1><?php the_title(); ?></h1></div>
		<?php $pagedesc = get_post_meta($post->ID, 'page_description', $single = true);?>
		<?php if($pagedesc !=''){?>
		<div class="innerDesc"><?php echo $pagedesc ?></div>
		<?php }?>
</div>

<!-- begin colLeft -->
	<div id="colLeft">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php the_content(__('(more...)')); ?>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</div>
	<!-- end colleft -->
	
	<?php get_sidebar(); ?>	 

<?php get_footer(); ?>