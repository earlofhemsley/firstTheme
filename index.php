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
?>
<?php get_footer(); ?>
