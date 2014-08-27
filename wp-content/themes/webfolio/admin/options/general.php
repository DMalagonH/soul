<?php
$options[] = array( "name" => "General",
						"sicon" => "advancedsettings.png",
                        "type" => "heading");

    $options[] = array( "name" => "Theme Color Scheme",
                        "id" => $shortname."_colorscheme",
                        "std" => "green.css",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => array("green.css"=>"green.css","blue.css"=>"blue.css","orange.css"=>"orange.css"));
                        
      $options[] = array( "name" => "Your Company Logo",
                        "desc" => "You can use your own company logo. Click to 'Upload Image' button and upload your logo.",
                        "id" => $shortname."_clogo",
                        "std" => "$blogpath/library/images/logo.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Text as Logo",
                        "desc" => "If you don't upload your own company logo, this text will show up in it's place.",
                        "id" => $shortname."_clogo_text",
                        "std" => "SimpleCorp",
                        "type" => "text");
						
	$options[] = array( "name" => "Custom Favicon",
                        "desc" => "You can use your own custom favicon. Click to 'Upload Image' button and upload your favicon.",
                        "id" => $shortname."_custom_shortcut_favicon",
                        "std" => "",
                        "type" => "upload");

?>