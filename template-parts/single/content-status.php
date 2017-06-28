<article>
<?php
    $editLink = "";
    if(is_single() && current_user_can('edit_post', get_the_ID())) { 
        $editLink = sprintf('&nbsp;|&nbsp;<a href="%s" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>',  
            get_edit_post_link()
        );
    }
    echo sprintf('<h1 class="entry-title">%s</h1><div class="single-meta">by %s, published on %s%s</div>',
        get_the_title(),
        get_the_author(),
        get_the_date('M d, Y'),
        $editLink
    );

    echo sprintf("<div class='single-content format-status'>%s</div>",
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
