<?php get_header(); ?>
<?php 
    if(of_get_option('webfolio_displayslider')==1 and of_get_option('webfolio_slidertype')!="none") {
?>
    <?php if(of_get_option('webfolio_slidertype')=='nivo') { ?>
        <?php get_template_part( 'homepage', 'slider-nivo' ); ?>
    <?php } elseif(of_get_option('webfolio_slidertype')=='flex') { ?>
        <?php get_template_part( 'homepage', 'slider-flex' ); ?>
    <?php } ?>
<?php
    }
?>

            
   <?php if(of_get_option('webfolio_homecontent') == '1') { ?>            
	<!-- begin home boxes -->
	<div id="homeBoxes" class="clearfix">
		<div class="homeBox">
			<h2><?php echo of_get_option('webfolio_homecontent1title') ?></h2>
            <p><img src="<?php echo of_get_option('webfolio_homecontent1img') ?>" class="alignleft" alt="<?php echo of_get_option('webfolio_homecontent1title') ?>" /> <?php echo of_get_option('webfolio_homecontent1') ?></p>
            <?php if (of_get_option('webfolio_homecontent1url')!='') { ?>
			<a href="<?php echo of_get_option('webfolio_homecontent1url') ?>" class="more-link"><?php _e('Leer más', 'site5framework') ?></a>
			<?php } ?>
		</div>
		<div class="homeBox">
			<h2><?php echo of_get_option('webfolio_homecontent2title') ?></h2>
            <p><img src="<?php echo of_get_option('webfolio_homecontent2img') ?>" class="alignleft" alt="<?php echo of_get_option('webfolio_homecontent2title') ?>" /> <?php echo of_get_option('webfolio_homecontent2') ?></p>
            <?php if (of_get_option('webfolio_homecontent2url')!='') { ?>
			<a href="<?php echo of_get_option('webfolio_homecontent2url') ?>" class="more-link"><?php _e('Leer m&aacute;s', 'site5framework') ?></a>
			<?php } ?>
		</div>
		<div class="homeBox last">
			<h2><?php echo of_get_option('webfolio_homecontent3title') ?></h2>
            <p><img src="<?php echo of_get_option('webfolio_homecontent3img') ?>" class="alignleft" alt="<?php echo of_get_option('webfolio_homecontent3title') ?>" /> <?php echo nl2br(of_get_option('webfolio_homecontent3')) ?></p>
            <?php if (of_get_option('webfolio_homecontent3url')!='') { ?>
			<a href="<?php echo of_get_option('webfolio_homecontent3url') ?>" class="more-link"><?php _e('Contacto', 'site5framework') ?></a>
			<?php } ?>
		</div>
	</div>
	<!-- end home boxes -->
    <?php }?>


<?php get_footer(); ?>