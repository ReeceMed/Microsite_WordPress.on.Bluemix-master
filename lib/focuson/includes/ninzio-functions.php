<?php
/*  Ninzio title
/*-------------------*/

    add_filter( 'wp_title', 'focuson_ninzio_filter_wp_title' );
    function focuson_ninzio_filter_wp_title( $title ) {
        global $page, $paged;

        if ( is_feed() ){
            return $title;
        }
            
        $site_description = get_bloginfo( 'description' );

        $filtered_title = $title . get_bloginfo( 'name' );
        $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
        $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( esc_html__( 'Page %s', 'focuson'), max( $paged, $page ) ) : '';

        return $filtered_title;
    }

/*  Post format chat
/*-------------------*/

    function focuson_ninzio_post_chat_format($content) {
        global $post;
        if (has_post_format('chat')) {
            $chatoutput = "<ul class=\"chat\">\n";
            $split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);

            foreach($split as $haystack) {
                if (strpos($haystack, ":")) {
                    $string = explode(":", trim($haystack), 2);
                    $who = strip_tags(trim($string[0]));
                    $what = strip_tags(trim($string[1]));
                    $row_class = empty($row_class)? " class=\"chat-highlight\"" : "";
                    $chatoutput = $chatoutput . "<li><span class='name'>$who</span><p>$what</p></li>\n";
                } else {
                    $chatoutput = $chatoutput . $haystack . "\n";
                }
            }

            $content = $chatoutput . "</ul>\n";
            return $content;
        } else { 
            return $content;
        }
    }
    add_filter( "the_content", "focuson_ninzio_post_chat_format", 9);

/*  Column converter
/*-------------------*/

    function focuson_ninzio_column_convert( $width, $front = true ) {
        if ( preg_match( '/^(\d{1,2})\/12$/', $width, $match ) ) {
            $w = 'col'.$match[1];
        } else {
            $w = 'col';
            switch ( $width ) {
                case "1/6" :
                    $w .= '2';
                    break;
                case "1/4" :
                    $w .= '3';
                    break;
                case "1/3" :
                    $w .= '4';
                    break;
                case "1/2" :
                    $w .= '6';
                    break;
                case "2/3" :
                    $w .= '8';
                    break;
                case "3/4" :
                    $w .= '9';
                    break;
                case "5/6" :
                    $w .= '10';
                    break;
                case "1/1" :
                    $w .= '12';
                    break;
                default :
                    $w = $width;
            }
        }
        return $w;
    }

/*  Get the widget
/*-------------------*/

    if( !function_exists('focuson_ninzio_get_the_widget') ){
  
        function focuson_ninzio_get_the_widget( $widget, $instance = '', $args = '' ){
            ob_start();
            the_widget($widget, $instance, $args);
            return ob_get_clean();
        }
        
    }

/*  Attach a class to linked images' parent anchors
/*-------------------*/

    function focuson_ninzio_give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){

        $classes = 'nz-single-image nz-clearfix';
        // check if there are already classes assigned to the anchor
        if ( preg_match('/<a.*? class=".*?">/', $html) ) {
        $html = preg_replace('/(<a.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $html);
        } else {
        $html = preg_replace('/(<a.*?)>/', '$1 class="'.$classes.'" >', $html);
        }
        return $html;
    }
    add_filter('image_send_to_editor','focuson_ninzio_give_linked_images_class',10,8);

/*  Pagination
/*-------------------*/

    function focuson_ninzio_post_nav_num(){
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
    
    function focuson_ninzio_post_nav($post_id){

            $prev_post = get_adjacent_post(false, '', true);
            $next_post = get_adjacent_post(false, '', false);
        ?>
        <nav class="ninzio-nav-single nz-clearfix">  
          <?php if(!empty($prev_post)) {echo '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . esc_html__("Prev article", "focuson") . '</a>'; } ?>
          <?php if(!empty($next_post)) {echo '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . esc_html__("Next article", "focuson") . '</a>'; } ?>
        </nav>
        <?php 
    }

/*  Excerpt
/*-------------------*/

    function focuson_ninzio_excerpt($limit) {
        
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

    function focuson_ninzio_not_found($post_type){

        $output = '';

        $output .= '<p class="ninzio-not-found">';

        switch ($post_type) {

            case 'recipes':
                $output .= esc_html__('No recipes found.', 'focuson');
                break;

            case 'products':
                $output .= esc_html__('No products found.', 'focuson');
                break;

            case 'events':
                $output .= esc_html__('No events found.', 'focuson');
                break;

            case 'general':
                $output .= esc_html__('No search results found. Try a different search', 'focuson');
                break;
            
            default:
                $output .= esc_html__('No posts found.', 'focuson');
                break;
        }

        $output .= '</p>';

        return $output;
    }

/*  Breadcrumbs
/*-------------------*/

    function focuson_ninzio_breadcrumbs() {

        /* === OPTIONS === */
        $text['home']     = esc_html__('Home','focuson'); // text for the 'Home' link
        $text['category'] = esc_html__('Archive by Category "%s"','focuson'); // text for a category page
        $text['search']   = esc_html__('Search Results for "%s" Query','focuson'); // text for a search results page
        $text['tag']      = esc_html__('Posts Tagged "%s"','focuson'); // text for a tag page
        $text['author']   = esc_html__('Articles Posted by %s','focuson'); // text for an author page
        $text['404']      = esc_html__('Error 404','focuson'); // text for the 404 page

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
                        $label     = esc_html__('Shop','focuson');
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
                        $label     = esc_html__('Shop','focuson');
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
                echo $before.esc_html__('Page','focuson') . ' ' . get_query_var('paged').$after;
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }

        }

    }

/*  Hex to rgba
/*-------------------*/

    function focuson_ninzio_hex_to_rgba($hex, $o) {
        $hex = (string) $hex;
        $hex = str_replace("#", "", $hex);
        $hex = array_map('hexdec', str_split($hex, 2));
        return 'rgba('.implode(",", $hex).','.$o.')';
    }

/*  Hex to rgb shade
/*-------------------*/

    function focuson_ninzio_hex_to_rgb_shade($hex, $o) {
        $hex = (string) $hex;
        $hex = str_replace("#", "", $hex);
        $hex = array_map('hexdec', str_split($hex, 2));
        $hex[0] -= $o;
        $hex[1] -= $o;
        $hex[2] -= $o;
        return 'rgb('.implode(",", $hex).')';
    }

/*  Post thumbnail
/*-------------------*/

    function focuson_ninzio_thumbnail ($layout, $post_id){

        $thumb_size = 'Focuson-Ninzio-Half';

        if (is_single()) {
                $thumb_size = 'full';
        } else {
            switch ($layout) {
                case 'large' :
                case 'medium':
                case 'small' :
                case 'list' :
                    $thumb_size = 'Focuson-Ninzio-Half';
                    break;
                    break;
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

                if ($layout == "list") {
                    $output .='<div class="post-date-custom"><span>'.date_i18n("d").'</span><span>'.date_i18n("M").'</span></div>';
                }

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

/*  Post gallery
/*-------------------*/

    function focuson_ninzio_post_gallery ($layout, $post_id){

        global $focuson_ninzio;
        $post_gallery_array = array();
        $thumb_size = 'Focuson-Ninzio-Half';

        if (!is_single()) {
            switch ($layout) {
                case 'large':
                case 'medium':
                case 'small' :
                case 'list' :
                $thumb_size = 'Focuson-Ninzio-Half';
                break;
                case 'standard':
                $thumb_size = 'Focuson-Ninzio-Whole';
                break;
            }
        } elseif (is_single()) {
            $thumb_size = 'Focuson-Ninzio-Whole';
        }

        if (class_exists('MultiPostThumbnails')) {

            if (MultiPostThumbnails::has_post_thumbnail('post', 'feature-image-2')) {
                $thumb_2 = array(
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post_id, $size = $thumb_size),
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post_id, $size = 'full')
                );
                array_push($post_gallery_array, $thumb_2);
            }

            if (MultiPostThumbnails::has_post_thumbnail('post', 'feature-image-3')) {
                $thumb_3 = array(
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-3', $post_id, $size = $thumb_size),
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-3', $post_id, $size = 'full')
                );
                array_push($post_gallery_array, $thumb_3);
            }

            if (MultiPostThumbnails::has_post_thumbnail('post', 'feature-image-4')) {
                $thumb_4 = array(
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-4', $post_id, $size = $thumb_size),
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-4', $post_id, $size = 'full')
                );
                array_push($post_gallery_array, $thumb_4);
            }

            if (MultiPostThumbnails::has_post_thumbnail('post', 'feature-image-5')) {
                $thumb_5 = array(
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-5', $post_id, $size = $thumb_size),
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-5', $post_id, $size = 'full')
                );
                array_push($post_gallery_array, $thumb_5);
            }

        }

        $output = "";

        if (has_post_thumbnail()){
            $output .= '<div class="post-gallery media">';

                if ($layout == "list") {
                    $output .='<div class="post-date-custom"><span>'.date_i18n("d").'</span><span>'.date_i18n("M").'</span></div>';
                }

                $post_format       = get_post_format($post_id);

                $output .= '<ul class="slides">';

                    $output .= '<li>';
                        
                        $output .= '<div class="nz-thumbnail">';
                            $output .= get_the_post_thumbnail( $post_id, $thumb_size );
                            if (!is_single()) {
                                $output .= '<div class="ninzio-overlay">';
                                    $output .= '<a class="nz-overlay-before portfolio-link" title="View details" href="'.get_permalink().'"></a>';
                                $output .= '</div>';
                            }
                        $output .= '</div>';

                    $output .= '</li>';
                    foreach ($post_gallery_array as $thumb) {
                        $output .='<li>';
                            $output .= '<div class="nz-thumbnail">';
                            $output .='<img src="'.$thumb[0].'" alt="'.get_the_title().'">';
                                if (!is_single()) {
                                    $output .= '<div class="ninzio-overlay">';
                                        $output .= '<a class="nz-overlay-before portfolio-link" title="View details" href="'.get_permalink().'"></a>';
                                    $output .= '</div>';
                                }
                            $output .= '</div>';
                        $output .='</li>';
                    }
                        
                $output .= '</ul>';
            $output .= '</div>';

            return $output;
        }

        ?>
    <?php }

    function focuson_ninzio_port_gallery ($layout, $post_id){

        global $focuson_ninzio;
        $post_gallery_array = array();
        $thumb_size = 'Focuson-Ninzio-Three-Quarters';

        if (class_exists('MultiPostThumbnails')) {

            if (MultiPostThumbnails::has_post_thumbnail('portfolio', 'feature-image-2')) {
                $thumb_2 = array(
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post_id, $size = $thumb_size),
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post_id, $size = 'full')
                );
                array_push($post_gallery_array, $thumb_2);
            }

            if (MultiPostThumbnails::has_post_thumbnail('portfolio', 'feature-image-3')) {
                $thumb_3 = array(
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-3', $post_id, $size = $thumb_size),
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-3', $post_id, $size = 'full')
                );
                array_push($post_gallery_array, $thumb_3);
            }

            if (MultiPostThumbnails::has_post_thumbnail('portfolio', 'feature-image-4')) {
                $thumb_4 = array(
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-4', $post_id, $size = $thumb_size),
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-4', $post_id, $size = 'full')
                );
                array_push($post_gallery_array, $thumb_4);
            }

            if (MultiPostThumbnails::has_post_thumbnail('portfolio', 'feature-image-5')) {
                $thumb_5 = array(
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-5', $post_id, $size = $thumb_size),
                    MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-5', $post_id, $size = 'full')
                );
                array_push($post_gallery_array, $thumb_5);
            }

        }

        ?>
        <?php if (has_post_thumbnail()): ?>
            <div class="post-gallery media">
                <ul class="slides">
                    <li>
                        <?php
                            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                            $href            = (is_single()) ? $large_image_url[0] : get_permalink();
                        ?>
                        <a class="nz-more" data-lightbox-gallery="gallery4" href="<?php echo $href; ?>">
                            <div class="nz-thumbnail">
                                <?php echo get_the_post_thumbnail( $post_id, $thumb_size );?>
                                <div class="ninzio-overlay"><div class="overlay-content"><span class="nz-overlay-before icon-plus4"></span></div></div>
                            </div>
                        </a>
                    </li>
                    <?php foreach ($post_gallery_array as $thumb): ?>
                        <li>
                            <?php $href2 = (is_single()) ? $thumb[1] : get_permalink(); ?>
                            <a class="nz-more" data-lightbox-gallery="gallery4" href="<?php echo $href2; ?>">
                                <div class="nz-thumbnail">
                                    <img src="<?php echo $thumb[0]; ?>" alt="<?php echo get_the_title(); ?>">
                                    <div class="ninzio-overlay"><div class="overlay-content"><span class="nz-overlay-before icon-plus4"></span></div></div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
    <?php }

/*  Post views
/*-------------------*/

    function focuson_ninzio_get_post_views($postID){
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0";
        }
        return $count;
    }

    function focuson_ninzio_set_post_views($postID) {
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