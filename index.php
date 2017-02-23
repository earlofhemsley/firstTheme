<?php get_header(); ?>
<?php 
    if(is_front_page())
    {
        get_template_part('template-parts/body/home','body');
    }
    else
    {
        get_template_part('template-parts/body/site','body');
    }
    get_sidebar();
?>
<?php get_footer(); ?>
