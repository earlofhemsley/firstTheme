<!-- home-header -->
    <div id="" class="home-section home-separated">
        <div id="home-leadbox">
            <div class="text-center slightly-padded"><?php the_custom_logo(); ?></div>
            <h1 class="text-center slightly-padded"><?php bloginfo("name"); ?></h1>
            <h2 class="text-center slightly-padded"><?php bloginfo("description"); ?></h2>
		</div>
        <?php 
            //echo get_theme_mod('front_page_1');
            wp_nav_menu( array( 
                'theme_location' => 'root',
                'menu_class' => '',
                'container' => 'div',
                'container_class' => 'lmh-home-root-menu-container',
                'container_id' => ''
            )); 
        ?>
	</div>
