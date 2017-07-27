<?php

require_once('assets/classes/Elegance_Comment_Walker.class.php');

if(!isset($content_width)) $content_width = 1200;

function elegance_setup(){

    //add_image_size('root-logo-image', 150, 150);
    add_image_size('post-hero', 1000, 563, array('center','top'));
    
    add_theme_support('post-thumbnails');
	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'status', 'aside', 'link'));

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

    add_theme_support('custom-logo', array(
        'width'=> 150,
        'height' => 150,
    ));

    add_post_type_support('post', array('excerpt','title','author','custom-fields','comments','post-formats','revisions'));
    add_post_type_support('page', array('excerpt','title','author','custom-fields','comments','post-formats','revisions'));
}
add_action('after_setup_theme', 'elegance_setup');

function elegance_customizer_setup($wp_customize){
    /*
        Have a "front page" section that allows for up to five pages to be set
        The page title appears on the home page menu at the bottom
        The page excerpt and content appears in the lower sections of the home page
        The standard loop appears at the bottom 
        Settings: front page parts 1-5
        Controls: front page parts 1-5
        Sections: Front page customization 
     */ 
    $wp_customize->remove_panel('widgets');
    $wp_customize->remove_section('static_front_page');
    
    $wp_customize->add_section('home_page_sections', array(
        'title'         =>      "Front page customization",
        'description'   =>      "Set the pages you want to appear on the home page, and activate home page widget areas. Leave blank for no page to be assigned. Check <a href='".get_admin_url()."widgets.php'>the widgets panel</a> to adjust widgets after saving.",
        'priority'      =>      30,
    ));
    
    for($i = 1; $i<=5; $i++){
        $wp_customize->add_setting('front_page_'.$i);
        $wp_customize->add_control('front_page_'.$i, array(
            'manager'       =>      $wp_customize,
            'type'          =>      'dropdown-pages',
            'description'   =>      "Section $i:", 
            'id'            =>      'front_page_'.$i,
            'section'       =>      'home_page_sections',
            'priority'      =>      $i,
        ));
        $wp_customize->add_setting('front_page_widget_enable_'.$i);
        $wp_customize->add_control('front_page_widget_enable_'.$i, array(
            'label'         =>      "Enable Section $i widget area",
            'description'   =>      "If enabled, a widget area will appear within Section $i.",
            'section'       =>      'home_page_sections',
            'priority'      =>      $i,
            'type'          =>      'checkbox',
        ));
    }

    //TODO: figure out how to dynamically add a new home page section beyond these five.
}
add_action('customize_register','elegance_customizer_setup');

function elegance_widget_setup(){
    for($i = 1; $i <= 5; $i++){
        if(get_theme_mod('front_page_widget_enable_'.$i)){
            register_sidebar( array( 
                'name' => 'Front Page Widget Area for Section '.$i,
                'id' => 'front-page-widget-'.$i,
                'description' => 'This widget area corresponds with front page section '.$i,
                'before_widget' => '<div>',
                'after_widget' => '</div>',
            ));
        }
    }

    register_sidebar(array(
        'name' => 'Home Page Widget Area',
        'id' => 'lmh-home-page',
        'description' => 'Appears at the bottom of the home page.',
        'before_widget' => '',
        'after_widget' => '',
    ));
    register_sidebar(array(
        'name' => 'Primary Sidebar Widget Area',
        'id' => 'lmh-primary',
        'description' => 'Appears in the right rail of post pages.',
        'before_widget' => '',
        'after_widget' => '',
    ));
    register_sidebar(array(
        'name' => 'Secondary Sidebar Widget Area',
        'id' => 'lmh-secondary',
        'description' => 'Appears in the right rail of post pages.',
        'before_widget' => '',
        'after_widget' => '',
    ));
    register_sidebar(array(
        'name' => 'Tertiary Sidebar Widget Area',
        'id' => 'lmh-tertiary',
        'description' => 'Appears in the right rail of post pages.',
        'before_widget' => '',
        'after_widget' => '',
    ));
    register_sidebar(array(
        'name' => 'Post & Page',
        'id' => 'lmh-single',
        'description' => 'Appears on single posts and pages',
        'before_widget' => '',
        'after_widget' => '',
    ));
}
add_action('widgets_init', 'elegance_widget_setup');

//enqueue needed styles and scripts
function elegance_scripts_styles(){
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/css/bootstrap-theme.min.css');
    wp_enqueue_style('core',get_stylesheet_uri(), array('bootstrap', 'bootstrap-theme'));


    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/js/vendor/modernizr-2.6.2.min.js', array('jquery'));
    
    wp_enqueue_script('plugins',get_template_directory_uri().'/assets/js/plugins.js', array('jquery'));
    
    if(is_front_page()) wp_enqueue_script('main',get_template_directory_uri().'/assets/js/main.js', array('jquery'));
    if(!is_front_page()) wp_enqueue_script('nav',get_template_directory_uri().'/assets/js/nav.js', array('jquery'));
    wp_enqueue_script('scroll', get_template_directory_uri().'/assets/js/scroll.js', array('jquery'));

    //photoswipe libraries
    wp_register_script('photoswipe-core', get_template_directory_uri().'/assets/js/photoswipe.min.js');
    wp_register_script('photoswipe-ui', get_template_directory_uri().'/assets/js/photoswipe-ui-default.min.js');
    wp_register_script('photoswipe-render', get_template_directory_uri().'/assets/js/ps-render.js', array('jquery','photoswipe-core','photoswipe-ui'));
    wp_register_style('photoswipe-css', get_template_directory_uri().'/assets/css/photoswipe.css');
    wp_register_style('photoswipe-default-skin-css', get_template_directory_uri().'/assets/css/default-photoswipe-skin/default-skin.css');

}
add_action('wp_enqueue_scripts','elegance_scripts_styles');

function register_menus(){
    register_nav_menus( array(
        'root' => 'Root Menu'
    ));
}
add_action('init', 'register_menus');


function get_home_section_query(){
    for($i = 1; $i<=5; $i++){
        $ids[] = get_theme_mod("front_page_$i");
    }
    $query = new WP_Query(array(
        'post_type' => 'page',
        'post__in' => $ids,
        'orderby' => 'post__in',
    ));
    return $query;
}

/**********************
 * get_single_post_byline
 * gets the byline.
 * must be used within the loop
 * intended to be used for single content with single content
 **********************/

if(!function_exists('get_single_post_byline')):
function get_single_post_byline(){
    global $multipage;
    $editLink = "";
    if(current_user_can('edit_post', get_the_ID())) { 
        $editLink = sprintf('&nbsp;|&nbsp;<a href="%s" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>',  
            get_edit_post_link());
    }
    $commentLink = '<a class="scrollable" data-destination="#elegance-comments-area" href="#">' . (get_comments_number() > 0 ? get_comments_number() . _n(' comment', ' comments', get_comments_number(), 'elegance') : 'Leave a comment') . '</a>';

    $pagesLink = '';
    if($multipage){
        $pagesLink = '&nbsp;|&nbsp;' . wp_link_pages(array(
            'before'    =>  "<span class='elegance-link-pages'>".__('Pages:'),
            'after'     =>  "</span>",
            'echo'      =>  0
        ));
    }

    return sprintf('<h1 class="entry-title">%1$s</h1><div class="single-meta">by %2$s | %3$s | %4$s%5$s%6$s</div>',
        get_the_title(),
        get_the_author(),
        get_the_date('M d, Y'),
        $commentLink,
        $editLink,
        $pagesLink
    );
}
endif;

if(!function_exists('getPhotoSwipeFrame')):
function getPhotoSwipeFrame(){
    return <<< EOT
        <div class="pswp" id="photoswipe" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="pswp__bg"></div>

            <div class="pswp__scroll-wrap">

                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <div class="pswp__ui pswp__ui--hidden">

                    <div class="pswp__top-bar">

                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                        <button class="pswp__button pswp__button--share" title="Share"></button>

                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                        <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                        <!-- element will get class pswp__preloader--active when preloader is running -->
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                              <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div> 
                    </div>

                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>

                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>

                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>

                </div>

            </div>

        </div>
EOT;
}
endif;

if(!function_exists('elegance_gallery_shortcode')):
function elegance_gallery_shortcode($output = '', $atts, $instance){
    wp_enqueue_script('photoswipe-core');
    wp_enqueue_script('photoswipe-ui');
    wp_enqueue_script('photoswipe-render');
    wp_enqueue_style('photoswipe-css');
    wp_enqueue_style('photoswipe-default-skin-css');
    $return = $output; //as a fallback

    //documentation on the gallery shortcode ==> 
    //https://developer.wordpress.org/reference/functions/gallery_shortcode/
    /* The needful:
     * get all the specified ids
     * get all the post objects
     * frame / order them according to shortcode attributes
     * remember to maintain the styling schema that has already been written
     * make it so that when clicked, full-page image gallery actually pops up with captions
     * that people can click through if they want.
     */

    $settings = shortcode_atts( array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'itemtag'    => 'figure',
        'icontag'    => 'div',
        'captiontag' => 'figcaption',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $atts, 'gallery' );

    $attachments = array();
    $query_vars = array(
            'post_status' => 'inherit', 
            'post_type' => 'attachment', 
            'post_mime_type' => 'image', 
            'order' => $settings['order'], 
            'orderby' => $settings['orderby'],  
    );

    if ( ! empty( $settings['include'] ) ) {
        $query_vars['include'] = $settings['include'];
    } elseif ( ! empty( $settings['exclude'] ) ) {
        $query_vars['exclude'] = $settings['exclude'];
    }
    $sortedIds = array_map( function($p){return $p->ID;}, get_posts($query_vars));
    
    
    $return = getPhotoSwipeFrame();
    $guid = uniqid();
    $return .= <<< EOT
        <div data-guid="$guid" class="gallery gallery-columns-{$settings['columns']} gallery-size-{$settings['size']}">
EOT;
    foreach($sortedIds as $id){
        $thumbnail = wp_get_attachment_image_src($id);
        $fullSize = wp_get_attachment_image_src($id, $settings['size']);
        $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt',$id));
        $return .= <<< EOT
            <{$settings['itemtag']} class="gallery-item">
                <{$settings['icontag']} class="gallery-icon landscape">
                    <a href="#" class="photoswipe-activate" data-src="{$fullSize[0]}" data-size="{$fullSize[1]}x{$fullSize[2]}">
                        <img src="{$thumbnail[0]}" />
                    </a>
                    <{$settings['captiontag']} class="gallery-caption">
                        $excerpt
                    </{$settings['captiontag']}>
                </{$settings['icontag']}>    
            </{$settings['itemtag']}>
EOT;

    }
    $return .= "</div>";

    return $return;
}
add_filter('post_gallery', 'elegance_gallery_shortcode', 10, 3);
endif;

if(!function_exists('elegance_iframe_oembed_filter')):
function elegance_iframe_oembed_filter($cachedHtml, $url, $attr, $post_ID){
    //regex on html to see if there's an iframe
    //if there's an iframe, wrap the html in a div such that it can be presented
    //return it
    if(1 == preg_match('/^<iframe.*/', $cachedHtml)){
        $cachedHtml = '<div class="iframe-responsive">'.$cachedHtml.'</div>';
    }
    return $cachedHtml;
}
add_filter("embed_oembed_html", 'elegance_iframe_oembed_filter', 10, 4);
endif;

if(!function_exists('elegance_first_link_in_link_posts')):
function elegance_first_link_in_link_posts($url){
    global $post;
    if(get_post_format($post->ID) !== 'link') return $url;
    return elegance_parse_content_for_link(apply_filters('the_content', $post->post_content));
}
add_filter('the_permalink', 'elegance_first_link_in_link_posts');
endif;

if(!function_exists('elegance_parse_content_for_link')):
function elegance_parse_content_for_link($content_to_parse){
    $dom = new DOMDocument;
    $dom->loadHTML($content_to_parse);
    $anchors = $dom->getElementsByTagName('a');
    if($anchors->length <= 0) return $url;
    return $anchors->item(0)->getAttribute('href');
}
endif;

function elegance_get_feed_image_url(){
    global $post;
    //if has defined thumbnail, return url of thumbnail
    if(has_post_thumbnail($post)) return get_the_post_thumbnail_url($post, 'thumbnail');
    else{
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(apply_filters('the_content',$post->post_content));
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        if($images->length >= 1){
            //else if content has img tag, return url of image
            return $images->item(0)->getAttribute('src');
        }
        else{
            //else if content has youtube video, return url of youtube preview img
            $iframes = $dom->getElementsByTagName('iframe');
            foreach($iframes as $iframe){
                $src = $iframe->getAttribute('src');
                if(preg_match('/youtube\.com\/embed\/(\w+)/', $src, $matches)){
                    return "https://img.youtube.com/vi/{$matches[1]}/0.jpg";
                }
            }
            //else return default image, based on post type
            return get_template_directory_uri().'/assets/img/feed-default-'.get_post_format($post->ID).'.png';
        }
    }
}
function elegance_sanitize_code_content($content){
    if(preg_match('/\<code.*\>(.*)\<\/code\>/isU', $content)){
        return preg_replace_callback('/\<code.*\>(.*)\<\/code\>/isU',
            function($match){ return "<code>" . str_replace('<', '&lt;', $match[1]) . "</code>"; }, 
            $content);
    } 
    else return $content;
}
add_filter('the_content', 'elegance_sanitize_code_content', 8);

function elegance_sanitize_pre_content($content){
    if(preg_match('/\<pre.*\>(.*)\<\/pre\>/isU', $content)){
        return preg_replace_callback('/\<pre.*\>(.*)\<\/pre\>/isU',
            function($match){ return "<pre>" . str_replace('<', '&lt;', $match[1]) . "</pre>"; }, 
            $content);
    } 
    else return $content;
}
add_filter('the_content', 'elegance_sanitize_pre_content', 9);

function elegance_add_pre_quicktag(){
    if(wp_script_is('quicktags')){
        echo <<< EOT
        <script type="text/javascript">
            QTags.addButton("elegance_pre", "pre", "<pre lang='php'>", "</pre>", "p", "Preformatted text", 111);
        </script>
EOT;

    }
}
add_action('admin_print_footer_scripts', 'elegance_add_pre_quicktag');

if(!function_exists('elegance_post_links')):
function elegance_post_links(){
    global $post;
    $prev = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post();
    $next = get_adjacent_post(false, '', false);
    if(!prev && !next) return;

    $plink = $prev ? sprintf('<span class="single-prev-post-link"><a href="%s">%s</a></span>', 
        get_post_format($prev->ID) == 'link' ?
            elegance_parse_content_for_link(apply_filters('the_content', $prev->post_content)) . '" target="_blank' : 
            get_permalink($prev->ID),
        "&laquo; {$prev->post_title}"
    ) : '<span class="single-prev-post-link"></span>';
    $nlink = $next ? sprintf('<span class="single-next-post-link"><a href="%s">%s</a></span>', 
        get_post_format($next->ID) == 'link' ?
            elegance_parse_content_for_link(apply_filters('the_content', $next->post_content)) . '" target="_blank' :
            get_permalink($next->ID),
        "{$next->post_title} &raquo;"
    ) : '<span class="single-next-post-link"></span>';

    echo <<< EOT
    <div class="single-post-links">
        $plink
        $nlink     
    </div>
EOT;

}
endif;

if(!function_exists('elegance_post_categories')):
function elegance_post_categories(){
    $categories = wp_get_post_categories(get_the_ID(), array('fields' => 'all'));
    $count = 1;
    echo '<div class="elegance-single-post-categories">Filed under: ';
    foreach($categories as $cat){
        $comma = ($count != count($categories)) ? ', ' : '';
        $url = get_category_link($cat->term_id);
        echo <<< EOT
            <span class="elegance-post-category"><a href="$url">{$cat->name}$comma</a></span>
EOT;
        $count++;
    }
    echo '</div><!-- .elegance-post-categories -->';
}
endif;

if(!function_exists('elegance_add_class_to_comment_link')):
function elegance_add_class_to_comment_link($link, $args, $comment, $post){
    $link = str_replace("class='comment-reply-link'", "class='comment-reply-link btn btn-xs btn-primary'", $link);
    return $link;
}
add_filter('comment_reply_link', 'elegance_add_class_to_comment_link', 10, 4);
endif;

if(!function_exists('is_single_paged')):
function is_single_paged(){
    global $multipage, $page;
    return ($multipage && $page > 1);
}
endif;


?>
