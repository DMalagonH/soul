<?php
require_once('library/siteframework.php');		// core functions
require('theme-options.php');          			// theme options

/* CallBack functions for menus in case of earlier than 3.0 Wordpress version or if no menu is set yet*/

function footerlinks(){ ?>
		<div id="footerMenu">
			<ul>
				<li><a href="#">Home</a></li>
				<?php wp_list_pages('exclude='.get_option('webfolio_exclude_pages').'&title_li=') ?>
			</ul>
		</div>
<?php }

function mainmenu(){ ?>
		<div id="topMenu">
			<ul class="sf-menu">
				<li><a href="<?php bloginfo('url'); ?>/">Home</a></li>
				<?php wp_list_pages('exclude='.get_option('webfolio_exclude_pages').'&title_li=') ?>
				<?php wp_list_categories('exclude='.get_option('webfolio_exclude_categs').'&title_li=');?>
			</ul>
		</div>
<?php }
?>