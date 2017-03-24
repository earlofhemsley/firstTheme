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
    
    //TODO: widget area for custom social menu


    $query = get_home_section_query();
    $counter = 1;
    while($query->have_posts()):
        $query->the_post();
?>
    <div class="home-separated home-padded text-center">
        <h2><?php the_title(); ?></h2>
        <div><?php the_content(); ?></div>
<?php
        if( is_active_sidebar('front-page-widget-'.$counter)){
            dynamic_sidebar('front-page-widget-'.$counter);
        }
?>
    </div>
<?php
        $counter++;
    endwhile;
    //TODO: pull in the standard blog loop
?>
<div class=""></div>
