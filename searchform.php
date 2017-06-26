<?php
if(is_front_page() && 'page' != get_option('show_on_front')) get_template_part('template-parts/search/home');
else get_template_part('template-parts/search/site');
?>
