<?php 

/*

 * Template Name: Portfolio

 */

get_header(); ?>



<!-- begin section -->

		<section class="colFull">

		<h1><?php the_title(); ?></h1>															

			

            <ul class="filterable" id="<?php echo of_get_option('webfolio_portfoliofilters')=='javascript' ? 'filterable' : '' ?>">

				<li class="active"><a href="http://209.239.112.213/~diegomal/portafolio" data-value="all" data-type="all" class="all"><?php _e('Todos', 'site5framework'); ?></a></li>

				<?php  

				$categories=  get_categories('taxonomy=types&title_li='); foreach ($categories as $category){ ?>

				<?php //print_r(get_term_link($category->slug, 'types')) ?>

				<li><a href="<?php echo get_term_link($category->slug, 'types') ?>" class="<?php echo $category->category_nicename;?>" data-type="<?php echo $category->category_nicename;?>"><?php echo $category->name;?></a></li>

				<?php }?>

									

			</ul>



			<div class="portfolio-container">



				<ul id="portfolio-items-one-third"  class="portfolio-items clearfix">

					

					<?php 

					global $post;

					$term = get_query_var('term'); 

					$tax = get_query_var('taxonomy'); 

					$args=array('post_type'=> 'portfolio','post_status'=> 'publish', 'orderby'=> 'menu_order', 'caller_get_posts'=>1, 'paged'=>$paged, 'posts_per_page'=>of_get_option('webfolio_portfolioitemsperpage')); 

					$taxargs = array($tax=>$term);

					if($term!='' && $tax!='') { $args  = array_merge($args, $taxargs); }



					query_posts($args); 

					

					while ( have_posts()):the_post();

						$categories = wp_get_object_terms( get_the_ID(), 'types');

					?>

					

					<li class="item <?php foreach ($categories as $category) { echo $category->slug. ' '; } ?>" data-id="id-<?php the_ID(); ?>" data-type="<?php foreach ($categories as $category) { echo $category->slug. ' '; } ?>">

                    

                        <div class="boxgrid">

                            <?php

											$thumbId = get_image_id_by_link ( get_post_meta($post->ID, 'webfoliop_pitemlink', true) );

								

											$thumb = wp_get_attachment_image_src($thumbId, 'featured-thumbnail', false);

											$large = wp_get_attachment_image_src($thumbId, 'featured-large', false);

                                                                                       

											if (!$thumb == ''){ ?>

											

											<a href="<?php echo $large[0] ?>" title="<?php the_title(); ?>" data-rel="prettyPhoto"><img src="<?php echo $thumb[0] ?>" alt="<?php the_title(); ?>"  class="portfolio-img" width="290" /></a>

                                            

											<?php } else { ?>

											<img src="<?php echo get_template_directory_uri(); ?>/library/images/sampleimages/portfolio-img.jpg" alt="<?php the_title(); ?>" width="290"  class="portfolio-img" />	

											<?php } ?>

            			</div>

        					<a href="<?php the_permalink() ?>" class="title"><strong><?php the_title(); ?></strong></a>

        					<p><?php echo excerpt(25); ?></p>

					</li>



					<?php endwhile;  ?>	



				</ul>

                



				<!-- begin #pagination -->

				<?php if (function_exists("wpthemess_paginate")) { wpthemess_paginate(); } ?>

				<!-- end #pagination -->

                

				<?php 

					wp_reset_query();

					wp_reset_postdata();	

				?>

			</div>

		</section >

<!-- end section -->

<?php get_footer() ?>