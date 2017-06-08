<article class="feed-article">
<?php
    echo sprintf('<figure class="feed-featured-image" style="background-image: url(%s);"></figure>', get_feed_image_url());
?>
    <div>
        <?php echo sprintf('<h2 class="feed-title"><a href="%s">%s</a></h2>', apply_filters('the_permalink',get_permalink()), get_the_title()); ?>
        <div class="feed-meta"> <?php echo sprintf("%s | %s", get_the_author(), get_the_date('M d, Y')); ?> </div>
        <div class="feed-content"><?php the_excerpt(); ?></div>
    </div>
</article>
