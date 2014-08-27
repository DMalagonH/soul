<?php get_header(); ?>

<!-- begin colLeft -->
	<div id="colLeft" class="clearfix">
			<div class="searchQuery">Search results for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<strong>'); echo $key; _e('</strong>'); wp_reset_query(); ?></div>
			
			
	<?php if (have_posts()) : while (have_posts()) : the_post();
		  ?>
		<!-- begin post -->
		<div class="blogItem clearfix">
			<div class="postComments">
				<?php comments_popup_link('0', '1', '%'); ?>
			</div>
				<div class="meta">
				<span class="metadata"><img src="<?php bloginfo('template_url'); ?>/images/ico_folder.png" alt="Posted" /> <?php the_time('F j, Y') ?> in <?php the_category(', ') ?> by <?php the_author() ?></span>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				</div>
				<?php the_excerpt(); ?> 
			
		</div>
		<!-- end post -->
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
