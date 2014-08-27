<?php get_header(); ?>

<!-- begin section -->
	<section class="clearfix">
			<div class="searchQuery"><?php _e("Search results for", "site5framework"); ?> <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<strong>'); echo $key; _e('</strong>'); wp_reset_query(); ?></div>
			
			
	<?php if (have_posts()) : while (have_posts()) : the_post();
		  ?>
		<!-- begin article -->
		<article class="clearfix">
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/ico_file.png" alt="<?php _e("Posted", "site5framework"); ?>" /> <?php _e("Posted by", "site5framework"); ?> <?php the_author(); ?> <?php _e("in", "site5framework"); ?> <?php the_category(', ') ?> &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/library/images/ico_comments.png" alt="<?php _e("Comments", "site5framework"); ?>" /> <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") );?>
				<div class="date"><?php the_time('M') ?><br/><strong><?php the_time('j') ?></strong></div>
			</div>
			<?php the_excerpt(__('Read more', "site5framework")); ?> 
		</article>
		<!-- end article -->
		<?php endwhile; ?>

		<?php if (function_exists("wpthemess_paginate")) {
				wpthemess_paginate();
			} ?>

	<?php else : ?>

		<p><?php _e("Sorry, but you are looking for something that isn't here.", "site5framework"); ?></p>

	<?php endif; ?>

			
</section>
<!-- end section -->
<?php get_sidebar(); ?>	


<?php get_footer(); ?>
