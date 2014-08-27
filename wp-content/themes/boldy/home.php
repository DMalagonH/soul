<?php get_header(); ?>
	<!-- BEGIN SLIDER -->
	  		<?php if(of_get_option('boldy_displayslider')==1){
	  		   $slideshowloop = new WP_Query( array( 'post_type' => 'sliderpost', 'order' => 'ASC', 'showposts' => '-1' ) ); ?>
	<div id="slider">
	<?php 
			if($slideshowloop -> have_posts()){
			while ( $slideshowloop->have_posts() ) : $slideshowloop->the_post();
			$linkto = get_post_meta($post->ID,'boldys_slidelink',TRUE);
			?>
			<a href="<?php echo $linkto;?>">
			<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo  get_image_url(get_post_meta($post->ID,'boldys_slideimage_src',TRUE)); ?>&amp;h=370&amp;w=960&amp;zc=1" alt="<?php the_title(); ?>" title="<?php echo get_post_meta($post->ID,'boldys_slidecaption',TRUE);?>" />
			</a>
			<?php 
			endwhile;
			}else{?>
				<div style="border:1px solid #ddd; background:#000; opacity:0.5;text-align:center; padding:150px 100px 0; height:219px; font-size:14px; ">				<span style="opacity:1;color:#fff;text-shadow:none;"><?php _e("This is the slider. In order to have items here you need to create them in Admin &gt; Slider section, on the left side menu. For proper display use images 960px x 370px.", "site5framework"); ?></span>
				</div>
			<?php }?>
			
	  </div>
      
	   <!-- END SLIDER -->
	    <!-- SLIDER SETTINGS -->
	   <script type="text/javascript">
            $j = jQuery.noConflict();
			$j(window).load(function() {
				$j('#slider').nivoSlider({
					effect:'<?php if(of_get_option('boldy_slidereffect')==''): echo 'random';
						  else: echo of_get_option('boldy_slidereffect');
						  endif;?>',
					slices:<?php if(of_get_option('boldy_showslide')==''): echo '15';
						  else: echo of_get_option('boldy_showslide');
						  endif;?>,
					animSpeed:<?php if(of_get_option('boldy_slideranimationspeed')==''): echo '500';
						  else: echo of_get_option('boldy_slideranimationspeed');
						  endif;?>,
					pauseTime:<?php if(of_get_option('boldy_sliderpausetime')==''): echo '3000';
						  else: echo of_get_option('boldy_sliderpausetime');
						  endif;?>,
					startSlide:0, //Set starting Slide (0 index)
					directionNav:true, //Next &amp; Prev
					directionNavHide:true, //Only show on hover
					controlNav:true, //1,2,3...
					controlNavThumbs:false, //Use thumbnails for Control Nav
					controlNavThumbsFromRel:false, //Use image rel for thumbs
					controlNavThumbsSearch: '.jpg', //Replace this with...
					controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
					keyboardNav:true, //Use left &amp; right arrows
					pauseOnHover:true, //Stop animation while hovering
					manualAdvance:false, //Force manual transitions
					captionOpacity:<?php if(of_get_option('boldy_slidercaptionopacity')==''): echo '0.8';
						  else: echo of_get_option('boldy_slidercaptionopacity');
						  endif;?>, //Universal caption opacity
					beforeChange: function(){},
					afterChange: function(){},
					slideshowEnd: function(){} //Triggers after all slides have been shown
				});
			});
			</script>
	   <!-- END SLIDER -->
		<?php	} else{?>
				<div style="border:1px solid #ddd; text-align:center; padding:150px 100px 0; height:219px; font-size:14px;">
					<?php _e("This is the slider. In order to have items here you need to create them in Admin &gt; Slider section, on the left side menu. For proper display use images 960px x 370px.", "site5framework"); ?>
				</div>
			<?php }?>
            <div style="width:960px; margin:0 auto; background:url(<?php bloginfo('template_directory'); ?>/images/bk_shadow_slider.png) 0 0 no-repeat; height:50px;"></div>
	   
	   <!-- BEGIN BLURB -->
	   <?php if(of_get_option('boldy_blurb_enable')=="1" && of_get_option('boldy_blurb_text')!=""){ ?>
	   <div id="blurb">
			<p>
			<a href="<?php 
			if(of_get_option('boldy_blurb_page')!=""){
				echo get_permalink(of_get_option('boldy_blurb_page'));
			}elseif(of_get_option('boldy_blurb_link')!=""){
				echo of_get_option('boldy_blurb_link');
			} ?>"><img src="<?php bloginfo('template_directory'); ?>/images/but_blurb.png" alt="" /></a>
			<?php echo of_get_option('boldy_blurb_text'); ?> 
			</p>
	   </div>
	   <?php }?>
	   <!-- END BLURB -->
	   <!-- BEGIN HOME CONTENT -->
	   <!-- begin home boxes -->
		<?php 
				  if(of_get_option('boldy_homebox1title')!="" || of_get_option('boldy_homebox2title')!="" || of_get_option('boldy_homebox3title')!=""){?>
		<div id="homeBoxes" class="clearfix">
			<div class="homeBox">
				<h2><?php echo of_get_option('boldy_homebox1title')?></h2>
                <?php if(of_get_option('boldy_homebox1img')!="") { ?>
                <p><a href="<?php echo of_get_option('boldy_homebox1url')?>"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo  get_image_url(of_get_option('boldy_homebox1img')); ?>&amp;h=101&amp;w=274&amp;zc=1" alt="<?php echo of_get_option('boldy_homebox1title');?>" /></a></p>
                <?php } ?>
				<p><?php echo of_get_option('boldy_homebox1')?></p>
				<a href="<?php echo of_get_option('boldy_homebox1url')?>"><strong>Read more &raquo;</strong></a>
			</div>
			<div class="homeBox">
				<h2><?php echo of_get_option('boldy_homebox2title')?></h2>
                <?php if(of_get_option('boldy_homebox2img')!="") { ?>
                <p><a href="<?php echo of_get_option('boldy_homebox2url')?>"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo  get_image_url(of_get_option('boldy_homebox2img')); ?>&amp;h=101&amp;w=274&amp;zc=1" alt="<?php echo of_get_option('boldy_homebox2title');?>"/></a></p>
                <?php } ?>
				<?php echo of_get_option('boldy_homebox2')?></p>
				<a href="<?php echo of_get_option('boldy_homebox2url')?>"><strong>Read more &raquo;</strong></a>
			</div>
			<div class="homeBox last">
				<h2><?php echo of_get_option('boldy_homebox3title')?></h2>
                <?php if(of_get_option('boldy_homebox3img')!="") { ?>
                <p><a href="<?php echo of_get_option('boldy_homebox3url')?>"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo  get_image_url(of_get_option('boldy_homebox3img')); ?>&amp;h=101&amp;w=274&amp;zc=1" alt="<?php echo of_get_option('boldy_homebox3title');?>"/></a></p>
                <?php } ?>
				<p><?php echo of_get_option('boldy_homebox3')?></p>
				<a href="<?php echo of_get_option('boldy_homebox3url')?>"><strong>Read more &raquo;</strong></a>
			</div>
		</div>
		<?php }?>
		<!-- end home boxes -->
	   <!-- END HOME CONTENT -->
	   

<?php get_footer(); ?>