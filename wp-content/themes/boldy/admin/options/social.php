<?php
    $options[] = array( "name" => "Social",
    					"sicon" => "social.png",
						"type" => "heading");

    $options[] = array( "name" => "Twitter username",
                        "desc" => "",
                        "id" => $shortname."_twitter_user",
                        "std" => "",
                        "type" => "text");
                        
    $options[] = array( "name" => "Latest tweets",
                        "desc" => "Show latest tweets in the footer",
                        "id" => $shortname."_latest_tweet",
                        "std" => "yes",
                        "type" => "select",
                        "options" => array("yes"=>"yes","no"=>"no"));
                        
                        
    $options[] = array( "name" => "Facebook Link",
                        "desc" => "",
                        "id" => $shortname."_facebook_link",
                        "std" => "",
                        "type" => "text");
                        
    $options[] = array( "name" => "LinkedIn Link",
                        "desc" => "",
                        "id" => $shortname."_linkedin_link",
                        "std" => "",
                        "type" => "text");



?>