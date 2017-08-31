<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
    if(has_post_thumbnail(get_the_ID()) && !is_single_paged()){
        $thumbnail = get_post(get_post_thumbnail_id());
        if($thumbnail->post_excerpt) $thumbnail->post_excerpt = "<figcaption>".$thumbnail->post_excerpt."</figcaption>";
        echo sprintf("<figure class='single-featured-image'> <img src='%s' alt='%s' /> %s </figure>",
            get_the_post_thumbnail_url(get_the_ID(), 'post-hero'),
            $thumbnail->post_title,
            $thumbnail->post_excerpt
        );
    }

    
    printf("<div class='single-content elegance-format-aside'>%s</div>",
        apply_filters('the_content', get_the_content())
    );

    $editLink = "";
    if(is_single() && current_user_can('edit_post', get_the_ID())) { 
        $editLink = sprintf('&nbsp;|&nbsp;<a href="%s" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>',  
            get_edit_post_link()
        );
    }

    printf('<p class="elegance-format-aside-title">%s: %s</p><div class="single-meta">by %s, published on %s%s</div>',
        __('This update published under the title', 'elegance'),
        get_the_title(),
        get_the_author(),
        get_the_date('M d, Y'),
        $editLink
    );
    wp_link_pages(array(
        'before'            =>  '<p class="elegance-single-pagination">',
        'after'             =>  '</p>',
        'next_or_number'    =>  'next'
    ));
    
    if(is_active_sidebar('lmh-single')) dynamic_sidebar('lmh-single');
?>
</article>
