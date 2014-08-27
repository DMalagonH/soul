<?php
	$options[] = array( "name" => "Homepage",
	                    "sicon" => "user-home.png",
	                    "type" => "heading");
						
	$options[] = array( "name" => "Display Content Boxes on Homepage",
						"id" => $shortname."_homecontent",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Content Box 1 Title",
                        "id" => $shortname."_homecontent1title",
                        "std" => "Home Box1",
                        "type" => "text");
						
	$options[] = array( "name" => "Content Box 1 Text",
                        "id" => $shortname."_homecontent1",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Box 1 Image",
                        "desc" => "Click to 'Upload Image' button and upload Content Box 1 image.",
                        "id" => $shortname."_homecontent1img",
                        "std" => "$blogpath/library/images/delete_48.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Box 1 URL",
                        "id" => $shortname."_homecontent1url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");
					
	$options[] = array( "name" => "Content Box 2 Title",
                        "id" => $shortname."_homecontent2title",
                        "std" => "Home Box2",
                        "type" => "text");

	$options[] = array( "name" => "Content Box 2 Text",
                        "id" => $shortname."_homecontent2",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Box 2 Image",
                        "desc" => "Click to 'Upload Image' button and upload Content Box 2 image.",
                        "id" => $shortname."_homecontent2img",
                        "std" => "$blogpath/library/images/buy_48.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Box 2 URL",
                        "id" => $shortname."_homecontent2url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");	

	$options[] = array( "name" => "Content Box 3 Title",
                        "id" => $shortname."_homecontent3title",
                        "std" => "Home Box3",
                        "type" => "text");
	
	$options[] = array( "name" => "Content Box 3",
                        "id" => $shortname."_homecontent3",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Box 3 Image",
                        "desc" => "Click to 'Upload Image' button and upload Content Box 3 image.",
                        "id" => $shortname."_homecontent3img",
                        "std" => "$blogpath/library/images/briefcase_48.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Box 3 URL",
                        "id" => $shortname."_homecontent3url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");
	


?>