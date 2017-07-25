<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
    
    echo get_single_post_byline();

    printf("<div class='single-content elegance-format-status'>%s</div>",
        apply_filters('the_content', get_the_content())
    );
    
    if(is_active_sidebar('lmh-single')) dynamic_sidebar('lmh-single');
    
    if(has_post_thumbnail(get_the_ID())){
        $thumbnail = get_post(get_post_thumbnail_id());
        if($thumbnail->post_excerpt) $thumbnail->post_excerpt = "<figcaption>".$thumbnail->post_excerpt."</figcaption>";
        echo sprintf("<figure class='single-featured-image'> <img src='%s' alt='%s' /> %s </figure>",
            get_the_post_thumbnail_url(get_the_ID(), 'post-hero'),
            $thumbnail->post_title,
            $thumbnail->post_excerpt
        );
    }
?>

</article>
