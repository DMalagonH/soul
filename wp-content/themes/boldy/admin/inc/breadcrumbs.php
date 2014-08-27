<?php
/*********************************************************************************************

Breadcrumbs

*********************************************************************************************/
function the_breadcrumb() {
                $category = get_the_category();
                echo '<a href="'.get_bloginfo('url').'">Home</a> &raquo; ';
                if(!is_home() && !is_page()) {

                        echo '<a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a> &raquo; ';
                        echo get_the_title();
                }
                elseif(is_page()) {
                        $page = get_page(get_the_ID());

                        if ($page->post_parent == 0){
                                echo $page->post_name;
                        }
                        else {
                                echo '<a href="'.get_permalink($page->post_parent).'">'.get_the_title($page->post_parent).'</a> &raquo; ';
                                echo get_the_title();
                        }
                }
        }
?>