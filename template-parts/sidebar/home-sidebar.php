<div class="row lmh-home-sidebar">
    <div class="col-sm-4 lmh-home-sidebar-cell">
        <h2><?php _e('Post categories'); ?></h2>
        <ul class="lmh-home-sidebar-list">
            <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
        </ul>
    </div>
    <div class="col-sm-4 lmh-home-sidebar-cell">
        <h2><?php _e('Blog archives'); ?></h2>
        <ul class="">
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
    </div>
    <div class="col-sm-4 lmh-home-sidebar-cell">
        <?php 
            if(is_active_sidebar('lmh-primary')){
                dynamic_sidebar('lmh-primary');
            } 
        ?>
    </div>
</div>
