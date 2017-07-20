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
        $previous = get_previous_posts_link('&laquo; Newer posts');
        $next = get_next_posts_link('Older posts &raquo;');
        if($previous || $next):
    ?>
        <div class="elegance-feed-post-links">
            <span class="elegance-feed-previous-posts"><?php echo $previous; ?>&nbsp;</span>
            <span class="elegance-feed-next-posts">&nbsp;<?php echo $next; ?></span>
        </div>
    <?php endif; ?>
    </div>
    <div class="col-sm-4 col-md-3 feed-sidebar"><?php get_sidebar();?></div>
</div>
<?php get_footer(); ?>
