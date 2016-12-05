<?php 
    /*
    Plugin Name: Ninzio add-ons
    Plugin URI: http://www.ninzio.com
    Text Domain: ninzio-addons
    Domain Path: /languages/
    Description: Plugin comes with Ninzio Themes to extend theme functionality (shortcodes, portfolio, ninzio slider)
    Author: Ninzio Themes
    Version: 1.4
    Author URI: http://ninzio.com
    */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function ninzio_addons_load_plugin_textdomain() {
    load_plugin_textdomain( 'ninzio-addons', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'ninzio_addons_load_plugin_textdomain' );

define( 'NINZIO_ADDONS', plugin_dir_path( __FILE__ ));

if ( !class_exists( 'ReduxFramework' ) && file_exists( NINZIO_ADDONS . '/optionpanel/framework.php' ) ) {
    require_once('optionpanel/framework.php' );
}

if ( !isset( $redux_demo ) && file_exists( NINZIO_ADDONS . '/optionpanel/config.php' ) ) {
    require_once('optionpanel/config.php' );
}

require_once('projects/projects.php' );
require_once('shortcodes/shortcodes.php' );
require_once('widgets/custom-twitter.php' );

function ninzio_addons_add_menu_icons_styles(){
?>
<style>
    #adminmenu .menu-icon-projects div.wp-menu-image:before {content: "\f322";}
</style>
<?php
}
add_action( 'admin_head', 'ninzio_addons_add_menu_icons_styles' );

function ninzio_addons_projects_single_template($single_template) {
    global $post;
    if ($post->post_type == 'projects') {
        if ( $theme_file = locate_template( array ( 'single-projects.php' ) ) ) {
            $single_template = $theme_file;
        } else {
            $single_template = NINZIO_ADDONS . 'projects/single-projects.php';
        }
    }
    return $single_template;
}
add_filter( "single_template", "ninzio_addons_projects_single_template", 20 );

function ninzio_addons_projects_archive_template($archive_template) {
    global $post;
    if ($post->post_type == 'projects') {
        if ( $theme_file = locate_template( array ( 'archive-projects.php' ) ) ) {
            $archive_template = $theme_file;
        } else {
            $archive_template = NINZIO_ADDONS . 'projects/archive-projects.php';
        }
    }
    return $archive_template;
}
add_filter( "archive_template", "ninzio_addons_projects_archive_template", 20 );

function ninzio_addons_projects_taxonomy_template($taxonomy_template) {
    if (is_tax('projects-category') || is_tax('projects-tag')) {

        if ( $theme_file = locate_template( array ( 'taxonomy-projects.php' ) ) ) {
            $taxonomy_template = $theme_file;
        } else {

            $taxonomy_template = NINZIO_ADDONS . 'projects/taxonomy-projects.php';
        }

    }
    return $taxonomy_template;
}
add_filter( "taxonomy_template", "ninzio_addons_projects_taxonomy_template", 20 );


if ( !function_exists( 'ninzio_addons_wbc_extended' ) ) {
    function ninzio_addons_wbc_extended( $demo_active_import , $demo_directory_path ) {

        reset( $demo_active_import );
        $current_key = key( $demo_active_import );

        /************************************************************************
        * Import slider(s) for the current demo being imported
        *************************************************************************/

        // if ( class_exists( 'RevSlider' ) ) {

        //     $wbc_sliders_array = array(
        //         'demo1' => 'revolution_slider.zip', //Set slider zip name
        //     );

        //     if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
        //         $wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];

        //         if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
        //             $slider = new RevSlider();
        //             $slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
        //         }
        //     }
        // }

        /************************************************************************
        * Setting Menus
        *************************************************************************/

        // If it's demo1 - demo6
        $wbc_menu_array = array( 'demo1');

        if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
            
            $header_menu     = get_term_by('name', 'Header Menu', 'nav_menu');
            $header_top_menu = get_term_by('name', 'Header Top Menu', 'nav_menu');
            $footer_menu     = get_term_by('name', 'Footer Menu', 'nav_menu');

            if ( isset( $top_menu->term_id ) ) {

                set_theme_mod( 'nav_menu_locations', array(
                        'header-menu'     => $header_menu->term_id,
                        'header-top-menu' => $header_top_menu->term_id,
                        'footer-menu'     => $footer_menu->term_id
                    )
                );
            }

        }

        /************************************************************************
        * Set HomePage
        *************************************************************************/

        // array of demos/homepages to check/select from
        $wbc_home_pages = array(
            'demo1' => 'Home',
        );

        if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
            $page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
            if ( isset( $page->ID ) ) {
                update_option( 'page_on_front', $page->ID );
                update_option( 'show_on_front', 'page' );
            }
        }

    }


    add_action( 'wbc_importer_after_content_import', 'ninzio_addons_wbc_extended', 10, 2 );
}






/*  Pagination
/*-------------------*/

    function ninzio_addons_post_nav_num(){
        if( is_singular() ){
            return;
        }

        global $wp_query;
        $big = 99999999;

        echo "<nav class=ninzio-navigation>";
            echo paginate_links(array(
                'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
                'format'    => '?paged=%#%',
                'total'     => $wp_query->max_num_pages,
                'current'   => max(1, get_query_var('paged')),
                'show_all'  => false,
                'end_size'  => 2,
                'mid_size'  => 3,
                'prev_next' => true,
                'prev_text' => '<span class="icon icon-arrow-left8"></span>',
                'next_text' => '<span class="icon icon-arrow-right8"></span>',
                'type'      => 'list'
            ));
        echo "</nav>";
    }

/*  Simple pagination
/*-------------------*/

    function ninzio_addons_post_nav($post_id){

            $prev_post = get_adjacent_post(false, '', true);
            $next_post = get_adjacent_post(false, '', false);
        ?>
        <nav class="ninzio-nav-single nz-clearfix">  
          <?php if(!empty($prev_post)) {echo '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . esc_html__("Prev article", 'ninzio-addons') . '</a>'; } ?>
          <?php if(!empty($next_post)) {echo '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . esc_html__("Next article", 'ninzio-addons') . '</a>'; } ?>
        </nav>
        <?php 
    }

/*  Excerpt
/*-------------------*/

    function ninzio_addons_excerpt($limit) {
        
        $excerpt = get_the_excerpt();
        $limit++;

        $output = "";

        if ( mb_strlen( $excerpt ) > $limit ) {
            $subex = mb_substr( $excerpt, 0, $limit - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );

            if ( $excut < 0 ) {
                $output .= mb_substr( $subex, 0, $excut );
            } else {
                $output .= $subex;
            }

            $output .= '[...]';

        } else {
            $output .= $excerpt;
        }

        return $output;
    }

/*  Not found
/*-------------------*/

    function ninzio_addons_not_found($post_type){

        $output = '';

        $output .= '<p class="ninzio-not-found">';

        switch ($post_type) {

            case 'recipes':
                $output .= esc_html__('No recipes found.', 'ninzio-addons');
                break;

            case 'products':
                $output .= esc_html__('No products found.', 'ninzio-addons');
                break;

            case 'events':
                $output .= esc_html__('No events found.', 'ninzio-addons');
                break;

            case 'general':
                $output .= esc_html__('No search results found. Try a different search', 'ninzio-addons');
                break;
            
            default:
                $output .= esc_html__('No posts found.', 'ninzio-addons');
                break;
        }

        $output .= '</p>';

        return $output;
    }

/*  Breadcrumbs
/*-------------------*/

    function ninzio_addons_breadcrumbs() {

        /* === OPTIONS === */
        $text['home']     = esc_html__('Home','ninzio-addons'); // text for the 'Home' link
        $text['category'] = esc_html__('Archive by Category "%s"','ninzio-addons'); // text for a category page
        $text['search']   = esc_html__('Search Results for "%s" Query','ninzio-addons'); // text for a search results page
        $text['tag']      = esc_html__('Posts Tagged "%s"','ninzio-addons'); // text for a tag page
        $text['author']   = esc_html__('Articles Posted by %s','ninzio-addons'); // text for an author page
        $text['404']      = esc_html__('Error 404','ninzio-addons'); // text for the 404 page

        $show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
        $show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
        $show_title     = 1; // 1 - show the title for the links, 0 - don't show
        $delimiter      = ''; // delimiter between crumbs
        $before         = '<span class="current">'; // tag before the current crumb
        $after          = '</span>'; // tag after the current crumb
        /* === END OF OPTIONS === */

        global $post;
        $home_link    = esc_url(home_url('/'));
        $link_before  = '<span typeof="v:Breadcrumb">';
        $link_after   = '</span>';
        $link_attr    = ' rel="v:url" property="v:title"';
        $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
        
        if (get_post_type() == 'post' || get_post_type() == 'page') {
            $parent_id    = $parent_id_2 = $post->post_parent;
        }

        $frontpage_id = get_option('page_on_front');

        if (is_home() || is_front_page()) {

            if ($show_on_home == 1) {echo '<a href="' . $home_link . '">' . $text['home'] . '</a>';}

        } else {

            if ($show_home_link == 1) {
                echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
            }

            if ( is_category() ) {
                $this_cat = get_category(get_query_var('cat'), false);
                if ($this_cat->parent != 0) {
                    $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                    if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo $cats;
                }
                if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

            } elseif ( is_search() ) {
                echo $before . sprintf($text['search'], get_search_query()) . $after;

            } elseif ( is_day() ) {
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
                echo $before . get_the_time('d') . $after;

            } elseif ( is_month() ) {
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo $before . get_the_time('F') . $after;

            } elseif ( is_year() ) {
                echo $before . get_the_time('Y') . $after;

            } elseif ( is_single() && !is_attachment() ) {
                if ( get_post_type() != 'post' ) {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    $label = $post_type->labels->singular_name;
                    if ($slug['slug'] == 'product') {
                        global $focuson_ninzio;
                        $label     = esc_html__('Shop','ninzio-addons');
                        if (isset($GLOBALS['focuson_ninzio']['shop-title']) && !empty($GLOBALS['focuson_ninzio']['shop-title'])){
                            $label = esc_attr($GLOBALS['focuson_ninzio']['shop-title']);
                        }
                        echo '<span><a rel="v:url" property="v:title" href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'">'.$label.'</a></span>';
                    } else {
                        printf($link, $home_link . $slug['slug'] . '/', $label); 
                    }
                    if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category(); $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo $cats;
                    if ($show_current == 1) echo $before . get_the_title() . $after;
                }

            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

                if (class_exists('Woocommerce')){

                    if (is_product_category() || is_product_tag()) {
                        global $focuson_ninzio;
                        $label     = esc_html__('Shop','ninzio-addons');
                        if (isset($GLOBALS['focuson_ninzio']['shop-title']) && !empty($GLOBALS['focuson_ninzio']['shop-title'])){
                            $label = esc_attr($GLOBALS['focuson_ninzio']['shop-title']);
                        }
                        echo '<span><a rel="v:url" property="v:title" href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'">'.$label.'</a></span>';
                        echo '<span>'.single_cat_title("", false).'</span>';
                    } elseif(is_shop()) {
                        $label     = esc_html__('Shop','ninzio-addons');
                        if (isset($GLOBALS['focuson_ninzio']['shop-title']) && !empty($GLOBALS['focuson_ninzio']['shop-title'])){
                            $label = esc_attr($GLOBALS['focuson_ninzio']['shop-title']);
                        }
                        echo $before . $label . $after;
                    } else {

                        if (is_tax()) {
                           echo $before . single_cat_title("", false) . $after;
                        } else {
                            $post_type = get_post_type_object(get_post_type());
                            $slug = $post_type->rewrite;
                            $label = $slug['slug'];
                            echo $before . $label . $after;  
                        }
                    }
                   
                } else {

                    if (is_tax()) {
                       echo $before . single_cat_title("", false) . $after;
                    } else {
                        $post_type = get_post_type_object(get_post_type());
                        $slug = $post_type->rewrite;
                        $label = $slug['slug'];
                        echo $before . $label . $after;  
                    }
                    
                }

                
                
            } elseif ( is_attachment() ) {
                $parent = get_post($parent_id);
                $cat = get_the_category($parent->ID); $cat = $cat[0];
                if ($cat) {
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo $cats;
                }
                printf($link, get_permalink($parent), $parent->post_title);
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

            } elseif ( is_page() && !$parent_id ) {
                if ($show_current == 1) echo $before . get_the_title() . $after;

            } elseif ( is_page() && $parent_id ) {
                if ($parent_id != $frontpage_id) {
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        if ($parent_id != $frontpage_id) {
                            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                        }
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo $breadcrumbs[$i];
                        if ($i != count($breadcrumbs)-1) echo $delimiter;
                    }
                }
                if ($show_current == 1) {
                    if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                    echo $before . get_the_title() . $after;
                }

            } elseif ( is_tag() ) {
                echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . sprintf($text['author'], $userdata->display_name) . $after;

            } elseif ( is_404() ) {
                echo $before . $text['404'] . $after;

            } elseif ( has_post_format() && !is_singular() ) {
                echo get_post_format_string( get_post_format() );
            }

            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                echo $before.esc_html__('Page','ninzio-addons') . ' ' . get_query_var('paged').$after;
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }

        }

    }

/*  Post thumbnail
/*-------------------*/

    function ninzio_addons_thumbnail ($layout, $post_id){

        $thumb_size = 'Focuson-Ninzio-Half';

        if (is_single()) {
                $thumb_size = 'full';
        } else {
            switch ($layout) {
                case 'large' :
                case 'medium':
                case 'small' :
                    $thumb_size = 'Focuson-Ninzio-Half';
                    break;
                    break;
                case 'full' :
                case 'standard':
                    $thumb_size = 'Focuson-Ninzio-Whole';
                    break;
            }
        }

        $output = '';

        if (has_post_thumbnail()){

            $values = get_post_custom( $post_id );
            $post_format       = get_post_format($post_id);
            $nz_link_url       = isset($values["link_url"][0]) ? $values["link_url"][0] : "";

            $link = ($post_format == "link") ? $nz_link_url : get_permalink();

            $output .= '<div class="nz-thumbnail">';
                $output .= get_the_post_thumbnail( $post_id, $thumb_size );
                if (!is_single()) {
                    $output .= '<div class="ninzio-overlay">';
                        $output .= '<a class="nz-overlay-before" title="View details" href="'. $link.'"></a>';
                    $output .= '</div>';
                }
            $output .= '</div>';

            return $output;
        }

        ?>

    <?php }

/*  Get the widget
/*-------------------*/

    if( !function_exists('ninzio_addons_get_the_widget') ){

        function ninzio_addons_get_the_widget( $widget, $instance = '', $args = '' ){
            ob_start();
            the_widget($widget, $instance, $args);
            return ob_get_clean();
        }
        
    }

/*  Post views
/*-------------------*/

    function ninzio_addons_get_post_views($postID){
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0";
        }
        return $count;
    }

    function ninzio_addons_set_post_views($postID) {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
?>