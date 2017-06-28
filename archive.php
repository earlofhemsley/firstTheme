<?php get_header(); ?>
<div class="row side-padded" >
    <div class="col-sm-8 col-md-9 feed-body">
    <?php 
        if ( have_posts() ) { 
            while ( have_posts() ) {
                the_post();
                get_template_part('template-parts/feed/body');
            }
        }
    ?>
        <div class="elegance-feed-post-links">
            <span class="elegance-feed-previous-posts"><?php previous_posts_link('&laquo; Newer posts'); ?>&nbsp;</span>
            <span class="elegance-feed-next-posts">&nbsp;<?php next_posts_link('Older posts &raquo;'); ?></span>
        </div>
    </div>
    <div class="col-sm-4 col-md-3 feed-sidebar"><?php get_sidebar();?></div>
</div>
<?php get_footer(); ?>
