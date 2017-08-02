<h1><?php the_title(); ?></h1>
<?php
        if(has_post_thumbnail(get_the_ID())):
?>            
            <figure class="single-featured-image">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-hero'); ?>" />
    <?php
                $caption = get_post(get_post_thumbnail_id())->post_excerpt;
                if($caption) printf('<figcaption>%s</figcaption>', $caption);
    ?>
            </figure>
<?php
        endif;
?>
    <div class="single-content"><?php the_content(); ?></div>
<?php
?>
