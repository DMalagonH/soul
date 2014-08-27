<!doctype html>



<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->

<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->

<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->

<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->

<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	

	<head>

		<meta charset="utf-8">

		<!--[if ie]><meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'/><![endif]-->

		

		<title><?php wp_title( ' - ', true, 'right' ); ?> <?php bloginfo('name'); ?></title>

		

		<?php if ( of_get_option('webfolio_enablemeta')== '1') { ?>

		

		<!-- meta -->

		<meta name="description" content="<?php echo of_get_option('webfolio_metadescription')  ?>" />

		<meta name="keywords" content="<?php wp_title(); ?>, <?php echo of_get_option('webfolio_metakeywords')  ?>" />

		<meta name="revisit-after" content="<?php echo of_get_option('webfolio_revisitafter')  ?> days" />

		<meta name="author" content="www.site5.com" />

		<?php } ?>

		

		<?php if ( of_get_option('webfolio_enablerobot')== '1') { ?>

		

		<!-- robots -->

		<meta name="robots" content="<?php echo of_get_option('webfolio_metabots')  ?>" />

		<meta name="googlebot" content="<?php echo of_get_option('webfolio_metagooglebot')  ?>" />

		<?php } ?>

		

		<!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />	

				

  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />

		

        <?php if(of_get_option('webfolio_colorscheme') != '') { ?> 

        	<link rel="stylesheet" href="<?php echo  get_template_directory_uri() .'/library/css/'. of_get_option('webfolio_colorscheme'); ?>" />

        <?php }else{?>

        	<link rel="stylesheet" href="<?php echo  get_template_directory_uri() .'/library/css/blue.css'; ?>" />

        <?php }?>

        

        <!-- wordpress head functions -->

		<?php wp_head(); ?>

		<!-- end of wordpress head -->

        

        <?php if(of_get_option('webfolio_css_code') != '') { ?> 

        <!-- custom css -->  

        	<?php load_template( get_template_directory() . '/custom.css.php' );?>

        <!-- custom css -->

        <?php } ?>

        

        <?php if(of_get_option('webfolio_customtypography') == '1') { ?>     

        <!-- custom typography-->   

        	<?php if(of_get_option('webfolio_headingfontlink') != '') { ?>

        	<?php echo html_entity_decode(of_get_option('webfolio_headingfontlink'));?>

        <!-- custom typography -->

        	<?php } ?>

        	<?php load_template( get_template_directory() . '/custom.typography.css.php' );?>

        <?php } ?>

		

	</head>



<body <?php body_class(); ?>>



<!-- begin wrapper -->

<div id="wrapper" >



	<!-- begin header -->

	<header>



	<!-- logo -->

		<div id="logo">

		<h1>

        <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

                <?php if ( !of_get_option('webfolio_clogo')== '') { ?>

					<img src="<?php echo of_get_option('webfolio_clogo'); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />

				<?php } elseif( !of_get_option('webfolio_clogo_text')== '') {

				        echo of_get_option('webfolio_clogo_text');

                    } else {

					bloginfo( 'name' );

				    }?>

        </a>

    	</h1>

        <span><?php echo get_settings('blogdescription');?></span>

        </div>

       

	<!-- end logo -->



	<!-- tag line -->

		<div id="topTagline"></div>

	<!-- end tag line-->



	<!-- begin top search -->

		<div id="searchTop">

        	<form id="searchform" method="get" action="<?php bloginfo( 'url' ); ?>">

				<input id="s" type="text" name="s" value="<?php _e( 'Buscar', 'site5framework' ); ?>" onFocus="this.value=''">

			</form>

		</div>

	<!-- end top search -->



	<!-- begin nav -->

	<?php if ( function_exists( 'site5_main_nav' ) ){

				site5_main_nav();

	       }

    ?>

	<!-- end nav -->

	<!-- begin #socialIcons -->

 	<ul id="socialIcons">

        	<?php if(of_get_option('webfolio_twitter_link')!=""){?>

        	<li><a href="<?php echo of_get_option('webfolio_twitter_link'); ?>" title="Twitter" class="twitter tooltip"><?php _e("Follow us on Twitter", "site5framework"); ?></a></li>

        	 <?php } ?>

        	<?php if(of_get_option('webfolio_facebook_link')!=""){?>

        	<li><a href="<?php echo of_get_option('webfolio_facebook_link'); ?>" title="Facebook" class="facebook tooltip"><?php _e("Join us on Facebook", "site5framework"); ?></a></li>

        	 <?php } ?>

        	<?php if(of_get_option('webfolio_linkedin_link')!=""){?>

	        <li><a href="<?php echo of_get_option('webfolio_linkedin_link'); ?>" title="LinkedIn" class="linkedin tooltip"><?php _e("Join us on LinkedIn", "site5framework"); ?></a></li>

	        <?php } ?>

	         <?php if(of_get_option('webfolio_google_link')!=""){?>

	        <li><a href="<?php echo of_get_option('webfolio_google_link'); ?>" title="Google+" class="googleplus tooltip"><?php _e("Join us on Google+", "site5framework"); ?></a></li>

	        <?php } ?>

	        <?php if(of_get_option('webfolio_flickr_link')!=""){?>

	        <li><a href="<?php echo of_get_option('webfolio_flickr_link'); ?>" title="Flickr" class="flickr tooltip"><?php _e("Watch us on Flickr", "site5framework"); ?></a></li>

	        <?php } ?>

	         <?php if(of_get_option('webfolio_vimeo_link')!=""){?>

	        <li><a href="<?php echo of_get_option('webfolio_vimeo_link'); ?>" title="Vimeo" class="vimeo tooltip"><?php _e("Watch us on Vimeo", "site5framework"); ?></a></li>

	        <?php } ?>

	        <!--<li><?php if(of_get_option('webfolio_extrss')!=""){ ?>

			      <a href="<?php echo of_get_option('webfolio_extrss'); ?>" title="RSS" class="rss tooltip"><?php _e("RSS Feeds", "site5framework"); ?></a>

			<?php } else { ?>

			      <a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rss tooltip"><?php _e("RSS Feeds", "site5framework"); ?></a>

	        <?php } ?></li>-->
        

    	</ul>

    <!-- end #socialIcons -->

	</header>

	<!-- end header -->

	

	<!-- begin content -->

	<div id="content" class="clearfix">