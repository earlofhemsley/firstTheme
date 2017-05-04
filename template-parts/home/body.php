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
    

    $query = get_home_section_query();
    while($query->have_posts()):
        $query->the_post();
?>
    <div class="home-separated home-padded text-center" id="<?php echo 'front-page-section-'.get_the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
        <?php if(has_excerpt(get_the_ID())) echo "<h4>".get_the_excerpt()."</h4>"; ?>
        <div class="lmh-home-page-section-content"><?php the_content(); ?></div>
<?php
        for($i = 1; $i <= 5; $i++)
        {
            $pageid = get_theme_mod('front_page_'.$i);
            if($pageid == get_the_ID()){
                if( is_active_sidebar('front-page-widget-'.$i)){
                    dynamic_sidebar('front-page-widget-'.$i);
                }
                break;
            }
        }
?>
    </div>
<?php
    endwhile;
    //TODO: pull in the standard blog loop
        $standard = new WP_Query(array(
            'post_type' =>  'post',
            'post_status' => 'publish'
        ));
?>
    <div class="home-padded text-center" id="blogroll">
        <h2>Blog</h2>
<?php
        if($standard->have_posts()){
            while($standard->have_posts()){
                $standard->the_post();
                echo sprintf("<h3><a href='%s'>%s</a></h3><p class='no-margin'>%s</p>",
                    get_permalink(),
                    get_the_title(),
                    get_the_date()
                );
            }
        }else{
            echo "<h3>Nothing here yet. Check back soon!</h3>";
        }
?>
    </div>
<?php get_sidebar(); ?>