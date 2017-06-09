<article class="feed-article">
<?php
    echo sprintf('<figure class="feed-featured-image" style="background-image: url(%s);"></figure>', get_feed_image_url());

    $editLink = (current_user_can('edit_post', get_the_ID())) ? 
        sprintf("&nbsp;|&nbsp;<a href='%s' target='_blank'><span class='glyphicon glyphicon-pencil' ></span></a>",
            get_edit_post_link()
        ) : "";
?>
    <div>
        <?php echo sprintf('<h2 class="feed-title"><a href="%s">%s</a></h2>', apply_filters('the_permalink',get_permalink()), get_the_title()); ?>
        <div class="feed-meta"> <?php echo sprintf("%s | %s%s", get_the_author(), get_the_date('M d, Y'), $editLink); ?> </div>
        <div class="feed-content"><?php the_excerpt(); ?></div>
    </div>
</article>
