<?php 
    /*
    first, get the social media menu (and assign images if possible) output as a home page section. 
        --idea ... set these in the customizer? or make a widget area that could contain a social menu?
    set up an array of arrays that obtains the page/post ids we will need for each home page section
    loop through them
    in each loop iteration, write wp_query logic dependent upon the ids in that iteration's array
    special cases are the resume experience/project items
    por final, have a blog section that rolls off the standard blog roll
     */
    
    $locations = get_nav_menu_locations();
    

    if( isset ($locations["root"]) ):
        $root_menu_items = wp_get_nav_menu_items($locations["root"]);
        //var_dump($root_menu_items); echo '<br />';
        foreach($root_menu_items as $item){
            $page_ids[] = get_post_meta( $item->ID, '_menu_item_object_id', true);
        }
        $query = new WP_Query( array(
            'post_type' => 'page',
            'post__in' => $page_ids,
            'orderby' => 'post__in', 
        ) );

        while($query->have_posts()):
            $query->the_post();
?>
    <div class="home-separated">
        <h2><?php the_title(); ?></h2>
        <div><?php the_content(); ?></div>
    </div>
<?php
            //write some html
            $query->next();
        endwhile;

    endif;
?>
<div class=""></div>
