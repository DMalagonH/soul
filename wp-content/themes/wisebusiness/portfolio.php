<?php 

		$current = get_the_category(); 

		$current_id= $current[0] ->cat_ID; 

		$categs_list = get_category_parents($current_id);

		$pieces = explode("/", $categs_list);

		$parent_name = $pieces[0];

		$parent_id = get_cat_id($pieces[0]);
        

		?>	

<div id="innerTop">

		<div class="innerTitle clearfix"><?php echo $parent_name; ?></div>

		<?php if(category_description($parent_id) !=''){?>

		<div class="innerDesc"><?php echo category_description($parent_id);?> </div>

	<?php }?>

</div>







<!-- begin colLeft -->

		<div id="colLeft">



		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="boxgrid thecombo">

				<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_url(get_first_image()); ?>&h=250&w=266&zc=1" alt="<?php the_title(); ?>" class="cover"/>

					<p><a href="<?php echo get_first_image() ?>" class="lightbox title"><?php the_title(); ?></a></p>

					<?php the_excerpt(); ?>

					<p><a href="<?php the_permalink() ?>">Read more &raquo;</a></p>

						

			</div>

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

