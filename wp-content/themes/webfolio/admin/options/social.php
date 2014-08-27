<?php
    $options[] = array( "name" => "Social",
    					"sicon" => "social.png",
						"type" => "heading");
    
    $options[] = array( "name" => "Display Social Widget",
                        "id" => $shortname."_social_widget",
                        "std" => "yes",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => array("yes"=>"yes","no"=>"no"));
    
    $options[] = array( "name" => "Twitter URL",
                        "id" => $shortname."_twitter_link",
                        "std" => "",
                        "type" => "text");
						
	$options[] = array( "name" => "Facebook URL",
                        "id" => $shortname."_facebook_link",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Google+",
                        "id" => $shortname."_google_link",
                        "std" => "",
                        "type" => "text");
                        
    $options[] = array( "name" => "Flickr Link",
                        "desc" => "",
                        "id" => $shortname."_flickr_link",
                        "std" => "",
                        "type" => "text");
                        

    $options[] = array( "name" => "LinkedIn URL",
                        "id" => $shortname."_linkedin_link",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Vimeo URL",
                        "id" => $shortname."_vimeo_link",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "External RSS URL",
                        "desc" => "Add external RSS URL, like Feedburner, etc. This will overwrite the regular blog RSS, if enabled.",
                        "id" => $shortname."_extrss",
                        "std" => "",
                        "type" => "text");




?>