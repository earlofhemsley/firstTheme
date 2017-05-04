<?php
    //this template needs to be able to handle both a queue of articles as well as a single post of non-special quality
    if(has_post_thumbnail(get_the_ID()) && !is_single())
    {
        echo sprintf('<figure class="multiple-featured-image"><img src="%s" /></figure>',
            get_the_post_thumbnail_url(get_the_ID(), 'post-hero')
        );
    }
?>

<article>
<?php
    $titleTag = is_single() ? 'h1' : 'h3';
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
?>
<?php
    if(has_post_thumbnail(get_the_ID()) && is_single()):
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
        is_single() ? "single-content" : "multiple-content",
            is_single() ? apply_filters('the_content', get_the_content()) : get_the_excerpt()
    );
            
?>
</article>
