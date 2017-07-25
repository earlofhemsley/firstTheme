<?php 

    printf("<div class='elegance-home-blog-entry %s'><h3><a href='%s'>%s</a></h3><p class='no-margin feed-meta'>%s</p></div>",
        implode(' ', get_post_class()), 
        apply_filters('the_permalink', get_permalink()),
        get_the_title(),
        get_the_date()
    );
?>
