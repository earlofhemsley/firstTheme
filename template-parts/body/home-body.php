<?php 
    $locations = get_nav_menu_locations();
    //var_dump($locations);
    //echo '<br />' . isset($locations["root"]).'<br />' ;
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
    <h2><?php the_title(); ?></h2>
    <div><?php the_content(); ?></div>
<?php
            //write some html
            $query->next();
        endwhile;

    endif;
?>
<div class=""></div>
