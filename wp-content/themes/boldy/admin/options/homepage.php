<?php
	$options[] = array( "name" => "Homepage",
	                    "sicon" => "user-home.png",
	                    "type" => "heading");
					
	$options[] = array( "name" => "Display Blurb on Homepage",
						"id" => $shortname."_blurb_enable",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Blurb Content",
                        "id" => $shortname."_blurb_text",
                        "std" => "Ut enim ad minim veniam, quis nostrud exercitation ullamco sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ",
                        "type" => "textarea");
    
    $options[] = array( "name" => "Request quote link",
                        "id" => $shortname."_blurb_link",
                        "std" => "",
                        "type" => "text");
    
    $options[] = array( "name" => "Request quote page",
                        "id" => $shortname."_blurb_page",
                        "std" => "",
                        "type" => "select",
                        "options" => $options_pages);
    
    $options[] = array( "name" => "Box 1 Title",
                        "id" => $shortname."_homebox1title",
                        "std" => "Home Box 1",
                        "type" => "text");
						
	$options[] = array( "name" => "Box 1",
                        "id" => $shortname."_homebox1",
                        "std" => "Lorem ipsum dolor sit etconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Box 1 Image",
                        "desc" => "Click to 'Upload Image' button and upload Box 1 image.",
                        "id" => $shortname."_homebox1img",
                        "std" => "",
                        "type" => "upload");
						
	$options[] = array( "name" => "Box 1 URL",
                        "id" => $shortname."_homebox1url",
                        "std" => "#",
                        "type" => "text");
					
	$options[] = array( "name" => "Box 2 Title",
                        "id" => $shortname."_homebox2title",
                        "std" => "Home Box 2",
                        "type" => "text");

	$options[] = array( "name" => "Box 2",
                        "id" => $shortname."_homebox2",
                        "std" => "Lorem ipsum dolor sit etconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Box 2 Image",
                        "desc" => "Click to 'Upload Image' button and upload Box 2 image.",
                        "id" => $shortname."_homebox2img",
                        "std" => "$blogpath/library/images/sampleimages/ico_creative.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Box 2 URL",
                        "id" => $shortname."_homebox2url",
                        "std" => "#",
                        "type" => "text");	

	$options[] = array( "name" => "Box 3 Title",
                        "id" => $shortname."_homebox3title",
                        "std" => "Home Box 3",
                        "type" => "text");
	
	$options[] = array( "name" => "Box 3",
                        "id" => $shortname."_homebox3",
                        "std" => "Lorem ipsum dolor sit etconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Box 3 Image",
                        "desc" => "Click to 'Upload Image' button and upload Box 3 image.",
                        "id" => $shortname."_homebox3img",
                        "std" => "$blogpath/library/images/sampleimages/ico_technical.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Box 3 URL",
                        "id" => $shortname."_homebox3url",
                        "std" => "#",
                        "type" => "text");
						
						

?>