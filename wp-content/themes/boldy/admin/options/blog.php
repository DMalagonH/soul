<?php
    $options[] = array( "name" => "Blog",
    					"sicon" => "blog.png",
						"type" => "heading");

    $options[] = array( "name" => "Blog Post Category",
						"desc" => "Select blog category for blog section.",
						"id" => $shortname."_blog",
                        "type" => "select",
                        "options" => $options_categories);
?>