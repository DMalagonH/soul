<?php get_header(); ?>

<?php if (get_option('wise_portfolio_id')!='' && is_category(get_option('wise_portfolio_id'))){?>
<?php include (TEMPLATEPATH . '/portfolio.php'); ?>
<?php } elseif(get_option('wise_testimonials_id')!='' && is_category(get_option('wise_testimonials_id'))){?>
<?php include (TEMPLATEPATH . '/testimonials.php'); ?>
<?php }else{?>

<?php 
		$current = get_the_category(); 
		$current_id= $current[0] ->cat_ID; 
		$categs_list = get_category_parents($current_id);
		$pieces = explode("/", $categs_list);
		$parent_name = $pieces[0];
		$parent_id = get_cat_id($pieces[0]);
		?>	
<div id="innerTop">
	<?php if(is_month()){?>
		 <div class="innerTitle clearfix">Archive</div>
		 <div class="innerDesc"><?php the_time('F, Y') ?></div>
	<?php }elseif(is_category() || post_is_in_descendant_category($parent_id)){?>
		<div class="innerTitle clearfix"><?php echo $parent_name; ?></div>
		<?php if(category_description($parent_id) !=''){?>
		<div class="innerDesc"><?php echo category_description($parent_id);?> </div>
	 <?php }
	 	}?>
</div>

<!-- begin colLeft -->
	<div id="colLeft">
	<!-- archive-title -->				
						<?php if(is_month()) { ?>
						<div id="archive-title">
						<strong></strong> Browsing all articles from <strong><?php the_time('F, Y') ?></strong>
						</div>
						<?php } ?>
						<?php if(is_category()) { ?>
						<div id="archive-title">
						<strong></strong> Browsing all articles in <strong><?php $current_category = single_cat_title("", true); ?></strong>
						</div>
						<?php } ?>
						<?php if(is_tag()) { ?>
						<div id="archive-title">
						<strong></strong> Browsing all articles tagged with <strong><?php wp_title('',true,''); ?></strong>
						</div>
						<?php } ?>
						<?php if(is_author()) { ?>
						<div id="archive-title">
						<strong></strong> Browsing all articles by <strong><?php wp_title('',true,''); ?></strong>
						</div>
						<?php } ?>
					<!-- /archive-title -->
		<?php if(is_month()){
		$posts_query = new WP_Query($query_string.'&cat='.get_option('wise_blog_id'));
		}else{
		$posts_query = new WP_Query($query_string);}
		if ($posts_query -> have_posts()) : while ($posts_query -> have_posts()) : $posts_query -> the_post();?>
		<!-- begin post -->
		<div class="blogItem clearfix">
			<div class="postComments">
				<?php comments_popup_link('0', '1', '%'); ?>
			</div>
				<div class="meta">
				<span class="metadata"><img src="<?php bloginfo('template_url'); ?>/images/ico_folder.png" alt="Posted" /> <?php the_time('F j, Y') ?> in <?php the_category(', ') ?> by <?php the_author() ?></span>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				</div>
				<?php the_content(__('<strong>Read more &raquo;</strong>')); ?> 
			
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
<?php }?>


<?php get_footer(); ?>