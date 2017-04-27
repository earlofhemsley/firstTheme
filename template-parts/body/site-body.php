<div class="row">
    <div class="col-sm-8 col-md-9 single-body">
<?php 
    if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
    <h1><?php the_title(); ?></h1>
<?php
        if(has_post_thumbnail(get_the_ID())):
?>            
            <div class="single-image">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-hero'); ?>" />
            </div>
<?php
        endif;
?>
    <div class="single-content"><?php the_content(); ?></div>

<?php
        if(get_post_type() == 'page'){
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
        }
        endwhile; 
    else:
?>
    <p>The post you are looking for cannot be found.</p>
<?php
    endif;
?>
    </div>
    <div class="col-sm-4 col-md-3">
        <?php get_sidebar(); ?>
    </div>
</div>
