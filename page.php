<?php
get_header();
?>
<div class="row">
<div class="col-sm-8 col-md-9 single-body">
<?php 
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part('template-parts/single/content', 'page');
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
        wp_link_pages(array(
            'before'            =>  '<p class="elegance-single-pagination">',
            'after'             =>  '</p>',
            'next_or_number'    =>  'next'
        ));
        
    endwhile; endif;
?>
</div>
    <div class="col-sm-4 col-md-3 single-sidebar"><?php get_sidebar();?></div>
</div>
<?php
get_footer();
