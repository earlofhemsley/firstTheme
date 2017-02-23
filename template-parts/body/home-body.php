<?php 
    
    if( $locations = get_nav_menu_locations() && isset ($locations["root"]) ):
        $root_menu_items = wp_get_nav_menu_items($locations["root"]);
        foreach($root_menu_items as $item){
            $page_ids[] = $item->ID;
        }
        $query = new WP_Query( array(
            'post_type' => 'page',
            'post__in' => $page_ids 
        ) );
        while($query->have_posts()):
            $query->the_post();
            //write some html
            $query->next();
        endif;

    endif;
?>
<div class=""></div>
