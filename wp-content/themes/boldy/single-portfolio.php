<?php get_header(); ?>
			
			<div id="colFull">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="portfolio-single">
						<header>
							<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
						</header>
					
						<section class="post_content" itemprop="articleBody">
						
							<?php
							$thumb = get_image_path(get_post_meta($post->ID, 'boldyp_pitemlurl', true));
							if (!$thumb == '')
							{ ?>
							
							<div class="portfolioimg">
									<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_image_path(get_post_meta($post->ID, 'boldyp_pitemlurl', true)); ?>&amp;w=960&amp;zc=1" alt="<?php the_title(); ?>"/>
							</div>
												
							<?php }?>
							
							<?php the_content(); ?>
					       <div class="clear"></div>
						</section> <!-- end article section -->
                        </article>
											
					<?php endwhile; ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "site5framework"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "site5framework"); ?></p>
					    </section>
					</article>
					
					<?php endif; ?>
			
				
    
			</div> 
<script> 
		$(document).ready(function(){ 
					showOverlay();
				});
		</script>
<?php get_footer(); ?>