<?php get_header(); ?>
<div class="row side-padded">
    <div class="col-xs-12" id="elegance-author-page-heading">
        <div class="elegance-author-avatar"><?php echo get_avatar(get_the_author_meta('email'), 120); ?></div>
        <h2>Posts written by <?php the_author(); ?></h2>
        <p><?php echo get_the_author_meta('description'); ?></p>
        <div class="elegance-author-social-links">
            <a class="btn btn-primary btn-responsive" href="<?php echo get_the_author_meta('facebook_url'); ?>" target="_blank">Facebook</a>
            <a class="btn btn-info btn-responsive" href="<?php echo get_the_author_meta('twitter_url'); ?>" target="_blank">Twitter</a>
            <a class="btn btn-primary btn-responsive" href="<?php echo get_the_author_meta('linkedin_url'); ?>" target="_blank">LinkedIn</a>
        </div>
    </div>
</div>
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
