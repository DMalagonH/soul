<?php get_header(); ?>
<!-- home header -->
	<div id="homeHeader">
<?php include (TEMPLATEPATH . '/home_header.php'); ?>
	</div>
<!-- end home header -->
		<!-- features -->
		<?php $feature1=get_post(get_option('wise_feature1'));
		      $feature2=get_post(get_option('wise_feature2'));
			  $feature3=get_post(get_option('wise_feature3')); 
			  if(get_option('wise_feature1')!= null && get_option('wise_feature2')!= null && get_option('wise_feature3')!= null){?>
		<div id="features" class="clearfix">
			<div class="featuresInner first">
				<h2><?php echo $feature1->post_title?></h2>
				<?php echo apply_filters('the_content', $feature1->post_content);?>
			</div>
			<div class="featuresInner">
				<h2><?php echo $feature2->post_title?></h2>
				<?php echo apply_filters('the_content', $feature2->post_content);?>
			</div>
			<div class="featuresInner">
				<h2><?php echo $feature3->post_title?></h2>
				<?php echo apply_filters('the_content', $feature3->post_content);?>
			</div>
		</div>
		<div id="featuresBottom"></div>
		<?php }?>
		<!-- end features -->
		
		<!-- begin colLeft -->
		<div id="colLeft">
		
		<!-- home custom content -->
		<?php if(get_option('wise_home_content')) { 
			$homecontent=get_post(get_option('wise_home_content'));?>
			<h1 class="home"><?php echo $homecontent -> post_title?></h1>
			<?php echo apply_filters('the_content', $homecontent->post_content);?>
		<?php }?>
		
		<!-- lastest from the blog -->
		<h1 class="home">FROM THE BLOG
		<span class="links">
			<img src="<?php bloginfo('template_url'); ?>/images/ico_rss.png" alt="RSS" /><a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a> &nbsp; | &nbsp;
			<a href="<?php echo get_category_link(get_option('wise_blog_id') )?>">Visit our blog &raquo;</a>
		</span>
		</h1>
		<ul class="latestPosts">
		<?php
			if(get_option('wise_latest_posts')!=''){
			$posts_query = new WP_Query($query_string.'&cat='.get_option('wise_blog_id').'&orderby=date&showposts='.get_option('wise_latest_posts'));
			}else{
			$posts_query = new WP_Query($query_string.'&cat='.get_option('wise_blog_id').'&orderby=date&showposts=4');
			}
			if ($posts_query -> have_posts()) : while ($posts_query -> have_posts()) : $posts_query -> the_post(); 
		?>
			<li>
				<?php the_post_thumbnail(); ?><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a><br /> <?php content('25'); ?> 
				<br /><span>Posted on <?php the_time('F j, Y') ?></span>
			</li>
		<?php endwhile;
			  endif; 
		?>
		</ul>
		</div>
		<!-- end colLeft -->
		
		<!-- begin colRight -->
		<div id="colRight">
			<h2 class="testimonials">CLIENTS THAT LOVE US</h2>
			<div class="boxRight testimonialsList">
				<ul>
				
		<?php
			if(get_option('wise_testimonials')!=''){
			$posts_query = new WP_Query($query_string.'&cat='.get_option('wise_testimonials_id').'&orderby=date&showposts='.get_option('wise_testimonials'));
			}else{
			$posts_query = new WP_Query($query_string.'&cat='.get_option('wise_testimonials_id').'&orderby=date&order=ASC&showposts=4');
			}
			if ($posts_query -> have_posts()) : while ($posts_query -> have_posts()) : $posts_query -> the_post(); 
		?>
					<li><span>~ <?php the_title(); ?></span>
						<p><?php the_post_thumbnail(); ?>"<?php content('1000'); ?>"</p>
					</li>
					<?php endwhile;
					  endif; 
					?>
					<li><a href="<?php echo get_category_link(get_option('wise_testimonials_id') )?>"><strong>Read more testimonials &raquo;</strong></a></li>
			
				</ul>
			</div>
		</div>
		<!-- end colRight -->
<?php get_footer(); ?>