<?php 
function get_image_url($img_src="") {

    if($img_src!="") $theImageSrc = $img_src;

    else $theImageSrc = wp_get_attachment_url(get_post_thumbnail_id($post_id));

    global $blog_id;

    if (isset($blog_id) && $blog_id > 0) {

        $imageParts = explode('/files/', $theImageSrc);

        if (isset($imageParts[1])) {

            $theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];

        }

    }

    echo $theImageSrc;

}

/*******************************

 WIDGETS AREAS

********************************/

if ( function_exists('register_sidebar') )

    register_sidebar(array(

		'name' => 'sidebar',

        'before_widget' => '',

        'after_widget' => '</div>',

        'before_title' => '<h2>',

        'after_title' => '</h2><div class="boxRight">',

    ));

	

	register_sidebar(array(

		'name' => 'footer',

        'before_widget' => '<div class="footerBox">',

        'after_widget' => '</div>',

        'before_title' => '<h2>',

        'after_title' => '</h2>',

    ));

	

/*******************************

 MENUS SUPPORT

********************************/

if ( function_exists( 'wp_nav_menu' ) ){

	if (function_exists('add_theme_support')) {

		add_theme_support('nav-menus');

		add_action( 'init', 'register_my_menus' );

		function register_my_menus() {

			register_nav_menus(

				array(

					'main-menu' => __( 'Main Menu' ),

					'footer-links' => __( 'Footer Links' )

				)

			);

		}

	}

}



/* CallBack functions for menus in case of earlier than 3.0 Wordpress version or if no menu is set yet*/



function footerlinks(){ ?>

		<div id="footerMenu">

			<ul>

					<li><a href="<?php bloginfo('url'); ?>/">Home</a></li>

					<?php wp_list_pages('exclude='.get_option('wise_exclude_pages').'&depth=1&title_li=') ?>

					<?php wp_list_categories('exclude='.get_option('wise_exclude_categs').'&depth=1&title_li=') ?>

			</ul>

		</div>

<?php }



function mainmenu(){ ?>

		<div id="topMenu">

			<ul class="sf-menu">

				<li><a href="<?php bloginfo('url'); ?>/">Home</a></li>

				<?php wp_list_pages('exclude='.get_option('wise_exclude_pages').'&title_li=') ?>

				<?php wp_list_categories('exclude='.get_option('wise_exclude_categs').'&title_li=');?>

			</ul>

		</div>

<?php }



/*******************************

 THUMBNAIL SUPPORT

********************************/



add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 56, 56, true );

add_image_size( 'portfolio-post-thumbnail', 266, 250 );



/********************************/



function content($num) {  

		$theContent = get_the_content();  

		$output = preg_replace('/<img[^>]+./','', $theContent);  

		$limit = $num+1;  

		$content = explode(' ', $output, $limit);  

		array_pop($content);  

		$content = implode(" ",$content);  

		echo $content;  

}



function post_is_in_descendant_category( $cats, $_post = null )

{

	foreach ( (array) $cats as $cat ) {

		// get_term_children() accepts integer ID only

		$descendants = get_term_children( (int) $cat, 'category');

		if ( $descendants && in_category( $descendants, $_post ) )

			return true;

	}

	return false;

}



/*******************************

 CUSTOM COMMENTS

********************************/



function mytheme_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>

   <li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">



     <div id="comment-<?php comment_ID(); ?>">

	  <div class="comment-meta commentmetadata clearfix">

	   <?php echo get_avatar($comment,$size='36',$default='http://www.gravatar.com/avatar/61a58ec1c1fba116f8424035089b7c71?s=32&d=&r=G' ); ?>

	   <span> <?php printf(__('<strong>%s</strong>'), get_comment_author_link()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?> <br /><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>

	  </span>

	  </div>

	  <div class="commentRight">

	  

      <div class="text">

		  <?php comment_text() ?>

	  </div>

	  

	  <?php if ($comment->comment_approved == '0') : ?>

         <em><?php _e('Your comment is awaiting moderation.') ?></em>

         <br />

      <?php endif; ?>



      <div class="reply">

         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

      </div>

	  </div>

     </div>

<?php }



/*******************************

 THEME OPTIONS

********************************/



add_action('admin_menu', 'wise_theme_page');

function wise_theme_page ()

{

	if ( count($_POST) > 0 && isset($_POST['wise_settings']) )

	{

		$options = array ( 'style','logo_img', 'logo_alt', 'cufon', 'contact_email', 'features', 'feature1','feature2','feature3', 'home_content', 'latest_posts','exclude_pages', 'exclude_categs', 'portfolio_id', 'blog_id', 'testimonials_id', 'testimonials', 'footer_contact','twitter_link', 'facebook_link','analytics');

		

		foreach ( $options as $opt )

		{

			delete_option ( 'wise_'.$opt, $_POST[$opt] );

			add_option ( 'wise_'.$opt, $_POST[$opt] );	

		}			

		 

	}

	add_theme_page(__('WiseBusiness Options'), __('WiseBusiness Options'), 'edit_themes', basename(__FILE__), 'wise_settings');	

}

function wise_settings()

{?>

<div class="wrap">

	<h2>WiseBusiness Options Panel</h2>

	

<form method="post" action="">

	<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>General Settings</strong></legend>

	<table class="form-table">

		<!-- General settings -->

		<tr valign="top">

			<th scope="row"><label for="style">Theme Color Scheme</label></th>

			<td>

				<select name="style" id="style">					

					<option value="blue.css" <?php if(get_option('wise_style') == 'blue.css'){?>selected="selected"<?php }?>>blue.css</option>

					<option value="green.css" <?php if(get_option('wise_style') == 'green.css'){?>selected="selected"<?php }?>>green.css</option>

					<option value="stone.css" <?php if(get_option('wise_style') == 'stone.css'){?>selected="selected"<?php }?>>stone.css</option>

				</select> 

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="logo_img">Change logo (full path to image)</label></th>

			<td>

				<input name="logo_img" type="text" id="logo_img" value="<?php echo get_option('wise_logo_img'); ?>" class="regular-text" /><br />

				<em>current logo:</em> <br /> <img src="<?php echo get_option('wise_logo_img'); ?>" alt="<?php bloginfo('name'); ?>" />

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="logo_alt">Logo ALT Text</label></th>

			<td>

				<input name="logo_alt" type="text" id="logo_alt" value="<?php echo get_option('wise_logo_alt'); ?>" class="regular-text" />

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="cufon">Cufon Font Replacement for H1, H2 and site tagline</label></th>

			<td>

				<select name="cufon" id="cufon">

					<option value="yes" <?php if(get_option('wise_cufon') == 'yes'){?>selected="selected"<?php }?>>Yes</option>

					<option value="no" <?php if(get_option('wise_cufon') == 'no'){?>selected="selected"<?php }?>>No</option>

				</select> <br />

				<em>Current font used with Cufon is "Century Gohtic". If you select "No" for Cufon the font used will be Arial.</em>

			</td>

		</tr>

		

		<tr valign="top">

			<th scope="row"><label for="blog_id">Blog Category ID</label></th>

			<td>

				<?php wp_dropdown_categories("hide_empty=0&name=blog_id&show_option_none=".__('- Select -')."&selected=" .get_option('wise_blog_id')); ?>

			</td>

		</tr>

		

		<tr valign="top">

			<th scope="row"><label for="portfolio_id">Portfolio Category ID</label></th>

			<td>

				<?php wp_dropdown_categories("hide_empty=0&name=portfolio_id&show_option_none=".__('- Select -')."&selected=" .get_option('wise_portfolio_id')); ?>

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="testimonials_id">Testimonials Category ID</label></th>

			<td>

				<?php wp_dropdown_categories("hide_empty=0&name=testimonials_id&show_option_none=".__('- Select -')."&selected=" .get_option('wise_testimonials_id')); ?>

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="contact_email">Email Address for Contact Form</label></th>

			<td>

				<input name="contact_email" type="text" id="contact_email" value="<?php echo get_option('wise_contact_email'); ?>" class="regular-text" />

			</td>

		</tr>

	</table>

	</fieldset>

	

	<!-- Homepage Settings -->

	<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Homepage Settings</strong></legend>

	<table class="form-table">

		<tr>

			<th colspan="2"><strong>Features Bar</strong></th>

		</tr>

		<tr>

			<th colspan="2"> They should be ALL selected ! Other way the features bar wont appear at all.</th>

		</tr>

		<?php $features = get_page_by_path('features'); ?>

		<tr valign="top">

			<th scope="row"><label for="feature1">Feature 1</label></th>

			<td>

				<?php wp_dropdown_pages("name=feature1&show_option_none=".__('- Select -')."&selected=" .get_option('wise_feature1')); ?>

			</td>

		</tr>



		<tr valign="top">

			<th scope="row"><label for="feature2">Feature 2</label></th>

			<td>

				<?php wp_dropdown_pages("name=feature2&show_option_none=".__('- Select -')."&selected=" .get_option('wise_feature2')); ?>

			</td>

		</tr>

		

		<tr valign="top">

			<th scope="row"><label for="feature3">Feature Three</label></th>

			<td>

				<?php wp_dropdown_pages("name=feature3&show_option_none=".__('- Select -')."&selected=" .get_option('wise_feature3')); ?>

			</td>

		</tr>

		<tr>

				<th colspan="2"><strong>Homepage Content</strong></th>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="home_content">Home Content page</label></th>

			<td>

				<?php wp_dropdown_pages("name=home_content&show_option_none=".__('- Select -')."&selected=" .get_option('wise_home_content')); ?>

			</td>

		</tr>

		<tr>

				<th colspan="2"><strong>Homepage Latest Blog Posts</strong></th>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="latest_posts">Number of Latest Posts to be displayed

			</label></th>

			<td>

				<input name="latest_posts" type="text" id="latest_posts" value="<?php echo get_option('wise_latest_posts'); ?>" class="regular-text" /><br /><em>Default is 4</em>

			</td>

		</tr>

		<tr>

				<th colspan="2"><strong>Homepage Testimonials</strong></th>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="latest_posts">Number of testimonials to be displayed

			</label></th>

			<td>

				<input name="testimonials" type="text" id="testimonials" value="<?php echo get_option('wise_testimonials'); ?>" class="regular-text" /><br /><em>Default is 4</em>

			</td>

		</tr>

	</table>

	</fieldset>

	

	<!-- Top Navigation -->

	<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Top Navigation</strong></legend>

	<table class="form-table">

		<tr valign="top">

			<th scope="row"><label for="exclude_pages">Exclude Pages IDs from Top &amp; Footer Menu</label><br /><em>*comma separated</em></th>

			<td>

				<input name="exclude_pages" type="text" id="exclude_pages" value="<?php echo get_option('wise_exclude_pages'); ?>" class="regular-text" />

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="exclude_categs">Exclude Categories IDs from Top Menu</label><br /><em>*comma separated</em></th>

			<td>

				<input name="exclude_categs" type="text" id="exclude_categs" value="<?php echo get_option('wise_exclude_categs'); ?>" class="regular-text" />

			</td>

		</tr>

		</table>

		</fieldset>

		<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Footer Settings</strong></legend>

		<table class="form-table">

		<tr>

			<th colspan="2"><strong>Contact Details &amp; Social Networking</strong></th>

		</tr>

		<tr>

			<th><label for="social_widget">Footer contact details page</label></th>

			<td>

					<?php wp_dropdown_pages("name=footer_contact&show_option_none=".__('- Select -')."&selected=" .get_option('wise_footer_contact')); ?>

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="twitter_link">Twitter link</label></th>

			<td>

				<input name="twitter_link" type="text" id="twitter_link" value="<?php echo get_option('wise_twitter_link'); ?>" class="regular-text" />

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="facebook_link">Facebook link</label></th>

			<td>

				<input name="facebook_link" type="text" id="facebook_link" value="<?php echo get_option('wise_facebook_link'); ?>" class="regular-text" />

			</td>

		</tr>

		<tr>

			<th colspan="2"><strong>SEO</strong></th>

		</tr>

		<tr>

			<th><label for="ads">Google Analytics code:</label></th>

			<td>

				<textarea name="analytics" id="analytics" rows="7" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('wise_analytics')); ?></textarea>

			</td>

		</tr>

		

	</table>

	</fieldset>

	<p class="submit">

		<input type="submit" name="Submit" class="button-primary" value="Save Changes" />

		<input type="hidden" name="wise_settings" value="save" style="display:none;" />

	</p>

</form>



</div>

<?php }

function get_first_image() {

global $post, $posts;

$first_img = '';

ob_start();

ob_end_clean();

$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

$first_img = $matches [1] [0];

if(empty($first_img)){ //Defines a default image

$first_img = "/images/default.jpg";

}

return $first_img;

} 

/*******************************

  CONTACT FORM 

********************************/



 function hexstr($hexstr) {

  $hexstr = str_replace(' ', '', $hexstr);

  $hexstr = str_replace('\x', '', $hexstr);

  $retstr = pack('H*', $hexstr);

  return $retstr;

}



function strhex($string) {

  $hexstr = unpack('H*', $string);

  return array_shift($hexstr);

}

?>