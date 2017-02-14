<!-- site-header -->
    <nav class="nav">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-2 text-center">
                <?php the_custom_logo(); ?>
                <button class="lmhcustom-nav-toggle btn btn-xs" data-toggle="collapse" data-target="#nav-collapse">
                    <span class="">Show Menu</span>
                </button>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-10">
                <h1 class="site-name text-center"><?php bloginfo('name'); ?></h1>
                <?php 
                    wp_nav_menu( array( 
                        'theme_location' => 'root',
                        'menu_class' => '',
                        'container' => 'div',
                        'container_class' => 'lmhcustom-root-menu-container collapse',
                        'container_id' => 'nav-collapse'
                    )); 
                ?>
            </div>
        </div>
    </nav>
