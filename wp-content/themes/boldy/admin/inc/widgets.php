<?php
/*********************************************************************************************

Register Global Sidebars

*********************************************************************************************/
function site5framework_widgets_init() {
	
	register_sidebar( array (
    'name' => __( 'Sidebar', 'site5framework' ),
    'id' => 'sidebar',
	'before_widget' => '<div class="rightBox">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	) );
	
	register_sidebar( array (
    'name' => __( 'Footer', 'site5framework' ),
    'id' => 'footer-1',
	'before_widget' => '<div class="boxFooter">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	) );
}

add_action( 'init', 'site5framework_widgets_init' );



?>