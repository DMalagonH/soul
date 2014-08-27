
        	<div id="slider">
            	<?php
				$captions = array();
				$tmp = $wp_query;
				$slider = get_term_by('id', of_get_option('webfolio_slidertag'), 'sliders' ) ;
				$slider = $slider->slug;
				$wp_query = new WP_Query('post_type=featured&orderby=menu_order&order=ASC&showposts=-1&sliders='. $slider);
				if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();
				$fitemlink = get_post_meta($post->ID,'webfoliof_fitemlink',true);
				$fitemcaption = get_post_meta($post->ID,'webfoliof_fitemcaption',true);

    			?>
            	
    
    			<?php
    				$thumbId = get_image_id_by_link ( get_post_meta($post->ID, 'webfoliof_slideimage_src', true) );
    				$thumb = wp_get_attachment_image_src($thumbId, 'slide', false);
    
    			?>
        			<a href="<?php echo $fitemlink;?>">
        			<img src="<?php echo $thumb[0] ?>" alt="<?php echo $fitemcaption ?>" title="<?php echo $fitemcaption ?>"/>
        			</a>
        			<?php
    		    endwhile; wp_reset_query();
    		    endif;
    		    $wp_query = $tmp;
    	    	?>
        	  </div>
              
        	  <!-- END SLIDER -->
        	  <!-- SLIDER SETTINGS -->
    	   <script type="text/javascript">
                $j = jQuery.noConflict();
    			$j(window).load(function() {
    				$j('#slider').nivoSlider({
    					effect:'random',
    					slices:15,
    					animSpeed:<?php if(of_get_option('webfolio_slideranimationspeed')==''): echo '500';
    						  else: echo of_get_option('webfolio_slideranimationspeed');
    						  endif;?>,
    					pauseTime:<?php if(of_get_option('webfolio_sliderpausetime')==''): echo '3000';
    						  else: echo of_get_option('webfolio_sliderpausetime');
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
    					captionOpacity:0.8, //Universal caption opacity
    					beforeChange: function(){},
    					afterChange: function(){},
    					slideshowEnd: function(){} //Triggers after all slides have been shown
    				});
    			});
    			</script>
    	   <!-- END SLIDER -->