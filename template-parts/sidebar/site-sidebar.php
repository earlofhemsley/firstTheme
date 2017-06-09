<div class="site-sidebar">
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
