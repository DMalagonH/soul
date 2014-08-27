<?php get_header(); ?>
<?php if ( 'portfolio' == get_post_type() ) include ('template.portfolio.php');
else { ?> 
		<section>
				
					<div id="archive-title">
                    
					<?php if (is_category()) { ?>
								<?php _e("Posts Categorized", "site5framework"); ?> / <span><?php single_cat_title(); ?></span> 
						<?php } elseif (is_tag()) { ?> 
								<?php _e("Posts Tagged", "site5framework"); ?> / <span><?php single_cat_title(); ?></span>
						<?php } elseif (is_author()) { ?>
								<?php _e("Posts By", "site5framework"); ?> / <span><?php the_author_meta('display_name', $post->post_author) ?> </span> 
						<?php } elseif (is_day()) { ?>
								<?php _e("Daily Archives", "site5framework"); ?> / <span><?php the_time('l, F j, Y'); ?></span>
						<?php } elseif (is_month()) { ?>
						    	<?php _e("Monthly Archives", "site5framework"); ?> / <span><?php the_time('F Y'); ?></span>
						<?php } elseif (is_year()) { ?>
						    	<?php _e("Yearly Archives", "site5framework"); ?> / <span><?php the_time('Y'); ?></span> 
						<?php } elseif (is_Search()) { ?>
						    	<?php _e("Search Results", "site5framework"); ?> / <span><?php echo esc_attr(get_search_query()); ?></span> 
						<?php } ?>
					 </div>

				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!-- begin article -->
		<article class="clearfix">
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/ico_file.png" alt="<?php _e("Posted", "site5framework"); ?>" /> <?php _e("Posted by", "site5framework"); ?> <?php the_author(); ?> <?php _e("in", "site5framework"); ?> <?php the_category(', ') ?> &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/library/images/ico_comments.png" alt="<?php _e("Comments", "site5framework"); ?>" /> <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") );?>
				<div class="date"><?php the_time('M') ?><br/><strong><?php the_time('j') ?></strong></div>
			</div>
			<?php the_content(__('read more', "site5framework")); ?> 
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
    <?php get_sidebar(); ?>	
<?php get_footer(); ?>
<?php } ?>