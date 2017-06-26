<?php 
    if(is_front_page() && 'page' != get_option('show_on_front'))
    {
        get_template_part('template-parts/sidebar/home','sidebar');
    }
    else
    {
        get_template_part('template-parts/sidebar/site','sidebar');
    }
?>
