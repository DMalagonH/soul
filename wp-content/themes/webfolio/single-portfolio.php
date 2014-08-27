<?php get_header(); ?>
			
			<section class="colFull">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!-- begin article -->
		<article class="clearfix">
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<?php
            $thumbId = get_image_id_by_link ( get_post_meta($post->ID, 'webfoliop_pitemlink', true) );
            $large = wp_get_attachment_image_src($thumbId, 'featured-large', false);
			if (!$large == '')
			{ ?>
			
			<div class="portfolioimg">
					<img src="<?php echo $large[0];?>" alt="<?php the_title(); ?>"/>
			</div>
								
			<?php }?>
				<?php the_content(); ?> 
		</article>
		<!-- end article -->
		
		<?php endwhile; else: ?>

		<p><?php _e("Sorry, but you are looking for something that isn't here.", "site5framework"); ?></p>

	<?php endif; ?>
			
				
    
			</section> 
<?php get_footer(); ?>