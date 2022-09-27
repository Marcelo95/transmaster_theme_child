<?php


define('VERSION', "2.3.0.2");
define('CHILD_NT_AMAZE_INC', get_stylesheet_directory_uri());
define('CHILD_NTAMAZE_CSS', get_stylesheet_directory_uri());
define('CHILD_NTAMAZE_JS',  get_stylesheet_directory_uri());


/**
 * Theme functions and definitions.
 * This child theme was generated by Merlin WP.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/*
        * If your child theme has more than one .css file (eg. ie.css, style.css, main.css) then
        * you will have to make sure to maintain all of the parent theme dependencies.
        *
        * Make sure you're using the correct handle for loading the parent theme's styles.
        * Failure to use the proper tag will result in a CSS file needlessly being loaded twice.
        * This will usually not affect the site appearance, but it's inefficient and extends your page's loading time.
        *
        * @link https://codex.wordpress.org/Child_Themes
        */




function ntamaze_child_enqueue_styles()
{
    wp_enqueue_style(
        'nt-amaze-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        false,
        VERSION
    );
    wp_enqueue_style(
        'nt-amaze-child-style-2',
        get_stylesheet_directory_uri() . '/css/light-style.css',
        false,
        VERSION
    );
}

add_action('wp_enqueue_scripts', 'ntamaze_child_enqueue_styles');


add_action('widgets_init', 'my_register_sidebars');
function my_register_sidebars()
{
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'name' => esc_html__('Blog Sidebar English', 'nt-amaze'),
            'id' => 'sidebar-english',
            'description' => esc_html__('These are widgets for the Blog page.', 'nt-amaze'),
            'before_widget' => '<div class="sidebar-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '<div class="border-width"></div><div class="space-10"></div></h4>'
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}


function pointcom_carregando_scripts()
{

    wp_enqueue_script('pointcom_maskJS', get_stylesheet_directory_uri() . '/js/masks_jquery.js', array('jquery'), VERSION, true);
    wp_enqueue_script('pointcom_mask', get_stylesheet_directory_uri() . '/js/mask.js', array('jquery'), VERSION, true);

    // Template-custom js
    wp_deregister_script('template-custom');
    wp_enqueue_script('template-custom', CHILD_NTAMAZE_JS . '/js/template-custom.js', array('jquery'), VERSION, true);
}
add_action('wp_enqueue_scripts', 'pointcom_carregando_scripts');

function ti_custom_javascript() {
    if (is_home() || is_front_page()) { 
      ?>
          <script type="text/javascript">
            console.log("add bg")
            jQuery("document").ready(function(){
                jQuery(".contact-details")
                .css('background-image', "url('<?php echo CHILD_NTAMAZE_CSS; ?>/imgs/loja1.jpg')")
                .addClass("background-image"); 
            });    
          </script>
      <?php
    }
  }
  add_action('wp_footer', 'ti_custom_javascript');

function get_url_page_translate($path = "/")
{
    $url = home_url($path);


    if (!is_home() && !is_front_page() && !is_page("en")) {
        $url .= get_post_field('post_name', get_post());
    }

    return $url;
}

function replace_url_menu($url)
{

    if (strpos($url, get_home_url()) === false) {
        $url = str_replace('/novo', get_home_url(), $url);
    }

    return $url;
}


function mmn_main_item_rewrite($items, $args)
{
    foreach ($items as $key => $item) {

        $item->url = replace_url_menu($item->url);
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'mmn_main_item_rewrite', 1, 2);
