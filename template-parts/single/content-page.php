<h1><?php the_title(); ?></h1>
<?php echo get_elegance_link_pages(); ?>
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
    <?php echo get_elegance_link_pages(); ?>
