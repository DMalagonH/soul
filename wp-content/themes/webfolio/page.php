<?php get_header(); ?>

<!-- begin section -->
	<section>
		<h1><?php the_title(); ?></h1>	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php the_content(__('(more...)', "site5framework")); ?>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</section>
	<!-- end section -->
	
	<?php get_sidebar(); ?>	 

<?php get_footer(); ?>