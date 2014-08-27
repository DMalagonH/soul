<?php get_header(); ?>
		<!-- Begin #colLeft -->
		<section>
		<!-- archive-title -->				
						<?php if(is_month()) { ?>
						<div id="archive-title">
						<?php _e("Archive from", "site5framework"); ?> <strong><?php the_time('F, Y') ?></strong>
						</div>
						<?php } ?>
						<?php if(is_category()) { ?>
						<div id="archive-title">
						<?php _e("Browsing", "site5framework"); ?> "<strong><?php $current_category = single_cat_title("", true); ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_tag()) { ?>
						<div id="archive-title">
						<?php _e("Tagged with", "site5framework"); ?> "<strong><?php wp_title('',true,''); ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_author()) { ?>
						<div id="archive-title">
						<?php _e(">Articles by", "site5framework");?> "<strong><?php wp_title('',true,''); ?></strong>"
						</div>
						<?php } ?>
					<!-- /archive-title -->
					
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
		
		<!-- Begin .postBox -->
		<article>
		      <header>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
				<div class="meta">
							<?php the_time('M j, Y') ?> &nbsp;&nbsp;//&nbsp;&nbsp; by <span class="author"><?php the_author_link(); ?></span> &nbsp;&nbsp;//&nbsp;&nbsp;  <?php the_category(', ') ?>  &nbsp;//&nbsp;  <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") ); ?> 
						</div>
                </header>
				<?php the_content(__("Read More &raquo;", "site5framework")); ?> 
				
		</article>
		
		<!-- End .postBox -->
		
		<?php endwhile; ?>

	<?php else : ?>

		<p><?php _e("Sorry, but you are looking for something that isn't here.", "site5framework"); ?></p>

	<?php endif; ?>
			<?php if (function_exists("wpthemess_paginate")) {
				wpthemess_paginate();
			} ?>

		</section>
		<!-- End #colLeft -->
	
<?php get_sidebar(); ?>	
<?php get_footer(); ?>