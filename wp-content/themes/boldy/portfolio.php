<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>
	<div id="colFull">


		<h1><?php the_title(); ?></h1>
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<ul class="filters">
                    			<li class="segment-1"><a href="#" data-value="all" class="selected"><?php _e('All projects', 'site5framework'); ?></a></li>
                    								<?php  
                    								$categories=  get_categories('taxonomy=types&title_li='); foreach ($categories as $category){ ?>
                    								
                    								<li class="segment-<?php echo $category->term_id;?>"><a href="#" data-value="<?php echo $category->category_nicename;?>"><?php echo $category->name;?></a></li>
                    								<?php }?>
                    		</ul>
        							
							<!-- begin .gallery -->
                    		<div class="gallery">
                                <ul id="itemList">
                    			<?php global $post; $args=array('post_type'=> 'portfolio','post_status'=> 'publish','orderby'=> 'menu_order','posts_per_page'=>6,'caller_get_posts'=>1,'paged'=>$paged,); query_posts($args); 
                                    $nr_p = 1; 
                                    while (have_posts()): the_post();
										$taxo = wp_get_object_terms( get_the_ID(), 'types');
										?>
                    					<li class="portfolioItem <?php foreach ($taxo as $taxx) { echo strtolower(preg_replace('/\s+/', '-', $taxx->slug)). ' '; } ?>" data-id="id-<?php the_ID(); ?>">
                    						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    						<a href="<?php the_permalink() ?>" title="<?php the_title();?>">
    										<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_image_url(get_post_meta($post->ID,'boldyp_pitemlurl',TRUE)); ?>&amp;h=200&amp;w=300&amp;zc=1" alt="<?php the_title(); ?>" />    
                                            </a>
                    						<p><?php  theme_excerpt(20) ?></p>
                    					</li>
                                    <?php 
                                        if($nr_p%3==0) echo '<span class="clear"></span>'; 
                                        $nr_p++;
                                    ?>
                    			<?php endwhile; ?>
                                </ul>
                    		</div>
							<!-- end .gallery -->
							

							<!-- begin #pagination -->
							<?php if (function_exists("wpthemess_paginate")) { wpthemess_paginate(); } ?>
							<!-- end #pagination -->

							<?php wp_reset_query(); ?>
																			
					<?php endwhile; ?>	

					<?php else : ?>
					
					<p><?php _e("Sorry, What you were looking for is not here.", "site5framework"); ?></p>
					
					<?php endif; ?>
        
		

	
	</div>
    <script> 
        $j = jQuery.noConflict();
		$j(document).ready(function(){ 
					animatedSorting(); // Init animated sorting
				});
		</script>
<?php get_footer(); ?>