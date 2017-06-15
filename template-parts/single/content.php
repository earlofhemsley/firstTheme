<article>
<?php
    $titleTag =   'h1' ;
    $editLink = "";
    if(is_single() && current_user_can('edit_post', get_the_ID())) { 
        $editLink = sprintf('&nbsp;|&nbsp;<a href="%s" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>',  
            get_edit_post_link());
    }
    echo sprintf('<%s class="entry-title">%s</%s><div class="single-meta">by %s, published on %s%s</div>',
        $titleTag,
        get_the_title(),
        $titleTag,
        get_the_author(),
        get_the_date('M d, Y'),
        $editLink
    );
    if(is_active_sidebar('lmh-single')) dynamic_sidebar('lmh-single');

    if(has_post_thumbnail(get_the_ID()) ):
?>            
        <figure class="single-featured-image">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-hero'); ?>" />
<?php
            $caption = get_post(get_post_thumbnail_id())->post_excerpt;
            if($caption) echo sprintf('<figcaption>%s</figcaption>', $caption);
?>
        </figure>
<?php
    endif;
    echo sprintf('<div class="%s">%s</div>',
        "single-content",
        apply_filters('the_content', get_the_content()) 
    );
    elegance_post_links();
?>
</article>
