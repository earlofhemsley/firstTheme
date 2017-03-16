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
    $counter = 0;
    while($query->have_posts()):
        $query->the_post();
?>
    <div class="home-separated home-padded text-center">
        <h2><?php the_title(); ?></h2>
        <div><?php the_content(); ?></div>
<?php
        if($counter == 0){
            $social = get_social_links_array();
            
            echo '<div class="home-padded">';
            if(!empty($social)){
                echo '<div class="social-links text-center"><ul class="image-list">';
                foreach($social as $name => $url){
                    $image_path = get_template_directory_uri() . '/assets/img/'.$name.'.png';
                    echo "<li><a href='$url' target='_blank'><img src='$image_path' alt='$name'/></a></li>";
                }
                echo '</ul></div>';
            }
            echo '</div>';
        }

?>
    </div>
<?php
        $counter++;
    endwhile;
        if( is_active_sidebar('home-page-widget-1')){
            dynamic_sidebar('home-page-widget-1');
        }
    //TODO: pull in the standard blog loop
?>
<div class=""></div>
