<?php
get_header();
?>
<div class="row side-padded;">
    <div class="col-sm-8 col-md-9 single-body">
    <?php 
        if ( have_posts() ) { 
            while ( have_posts() ) {
                the_post();
                get_template_part('template-parts/single/content', get_post_format(get_the_ID()));
            }
        }
    ?>
    </div>
    <div class="col-sm-4 col-md-3 single-sidebar"><?php get_sidebar();?></div>
</div>
<?php
get_footer();

