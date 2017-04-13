<!-- home-header -->
    <div id="home-header-container" class="home-section home-separated" style="height:3000px">
        <div id="home-header-mask" style="display:none;">
            <div id="home-leadbox">
                <div class="text-center slightly-padded"><?php the_custom_logo(); ?></div>
                <h1 class="text-center slightly-padded"><?php bloginfo("name"); ?></h1>
                <h2 class="text-center slightly-padded"><?php bloginfo("description"); ?></h2>
            </div>
            <div class="lmh-home-root-menu-container">
                <ul>
                <?php 
                    $query = get_home_section_query();
                    while($query->have_posts()){
                        $query->the_post();
                        echo sprintf("<li class='menu-item'><a class='section-link' onclick=\"scrollTo('#front-page-section-%d');\">%s</a></li>",
                            get_the_ID(),
                            get_the_title()
                        );
                    }
                    echo "<li class='menu-item'><a class='section-link' onclick=\"scrollTo('#blogroll')\">Blog</a></li>";
                ?>
                </ul>
            </div>
        </div>
	</div>
