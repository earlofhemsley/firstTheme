<div class="site-sidebar">
    <div class="site-sidebar-section">
        <h2><?php _e('Blog archives'); ?></h2>
        <ul class="">
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
    </div>
<?php 
    $names = array('lmh-primary','lmh-secondary','lmh-tertiary');
    foreach($names as $name):
?>
    <div class="site-sidebar-section">
        <?php 
            if(is_active_sidebar($name)){
                dynamic_sidebar($name);
            } 
        ?>
    </div>
<?php endforeach; ?>
</div>
