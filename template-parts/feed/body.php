<article class="feed-article">
<?php
    $source = has_post_thumbnail(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') :
         get_template_directory_uri() . '/assets/img/greybox.png';
    
    echo sprintf('<figure class="feed-featured-image"><img src="%s" /></figure>', $source);
?>
    <div>
        <?php echo sprintf('<h2 class="feed-title"><a href="%s">%s</a></h2>', get_permalink(), get_the_title()); ?>
        <div class="feed-meta"> <?php echo sprintf("%s | %s", get_the_author(), get_the_date('M d, Y')); ?> </div>
        <div class="feed-content"><?php the_excerpt(); ?></div>
    </div>
</article>
