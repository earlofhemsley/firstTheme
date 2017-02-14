<!-- home-header -->
    <div id="" class="section">
        <div id="lmhcustom-leadbox">
            <div class="text-center"><?php the_custom_logo(); ?></div>
            <h1 class="text-center"><?php bloginfo("name"); ?></h1>
            <h2 class="text-center"><?php bloginfo("description"); ?></h2>
		</div>
        <?php 
            wp_nav_menu( array( 
                'theme_location' => 'root',
                'menu_class' => '',
                'container' => 'div',
                'container_class' => '',
                'container_id' => ''
            )); 
        ?>
	</div>
