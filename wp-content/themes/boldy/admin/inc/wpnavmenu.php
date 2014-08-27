<?php
/*********************************************************************************************

This theme uses wp_nav_menu() in one location.

*********************************************************************************************/
register_nav_menus(                      		// wp3+ menus
		array(
			'main_nav' => 'The Main Menu',   // main nav in header
			'footer_links' => 'Footer Links' // secondary nav in footer
		)
	);
	
function fallbackmenu(){
	//echo'<div id="topMenu">';
    echo'<ul class="sf-menu">';
    wp_list_pages('title_li=');
    echo'</ul>';
	//echo'</div>';
}

function site5_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    		'menu' => 'main_nav', /* menu name */
    		'theme_location' => 'main_nav', /* where in the theme it's assigned */
			'container' =>false,
			'menu_class' => 'sf-menu', /* menu class */
    		'fallback_cb' => 'site5_main_nav_fallback' /* menu fallback */
    	)
    );
}

function site5_footer_links() {
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    		'menu' => 'footer_links', /* menu name */
    		'theme_location' => 'footer_links', /* where in the theme it's assigned */
    		'container_class' => 'footer-links clearfix', /* container class */
    		'fallback_cb' => 'site5_footer_links_fallback' /* menu fallback */
    	)
	);
}

// this is the fallback for header menu
function site5_main_nav_fallback() {
	echo'<ul class="sf-menu">';
    wp_page_menu( 'show_home=Home' );
	echo'</ul>';
}

// this is the fallback for footer menu
function site5_footer_links_fallback() {
	/* you can put a default here if you like */
}


?>