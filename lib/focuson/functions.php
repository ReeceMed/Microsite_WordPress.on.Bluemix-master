<?php

/*  CONSTANTAS
/*======================*/

    define( 'FOCUSON_NINZIO_TEMPPATH', get_template_directory_uri());
    define( 'FOCUSON_NINZIO_IMAGES', FOCUSON_NINZIO_TEMPPATH. "/images");

    // WPML CONSTANTAS
    define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

    function focuson_ninzio_global_variables(){
        global $focuson_ninzio, $woocommerce, $post, $product,$wp_query, $query_string;
    }

/*  HANDLE EXTERNAL PLUGINS
/*======================*/
    
    add_action( 'tgmpa_register', 'focuson_ninzio_register_required_plugins' );
    function focuson_ninzio_register_required_plugins() {

        $plugins = array(

            array(
                'name'      => esc_html__('Contact Form 7', 'focuson'),
                'slug'      => 'contact-form-7',
                'required'  => true,
                'dismissable' => true
            ),

            array(
                'name'        => esc_html__('Woocommerce', 'focuson'),
                'slug'        => 'woocommerce',
                'required'    => false,
                'dismissable' => true
            ),

            array(
                'name'      => esc_html__('One Click Demo Import', 'focuson'),
                'slug'      => 'one-click-demo-import',
                'required'  => true
            ),

            array(
                'name'      => esc_html__('Regenerate Thumbnails', 'focuson'),
                'slug'      => 'regenerate-thumbnails',
                'required'  => true,
                'dismissable' => true
            ),

            array(
                'name'      => esc_html__('Envato WordPress Toolkit', 'focuson'),
                'slug'      => 'envato-wordpress-toolkit-master',
                'source'    => get_template_directory() . '/plugins/envato-wordpress-toolkit-master.zip',
                'required'  => true,
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
                'dismissable' => true
            ),

            array(
                'name'      => esc_html__('WPBakery Visual Composer', 'focuson'),
                'slug'      => 'js_composer',
                'source'    => get_template_directory() . '/plugins/js_composer.zip',
                'required'  => true,
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => ''
            ),

            array(
                'name'      => esc_html__('Ninzio add-ons', 'focuson'),
                'slug'      => 'ninzio-addons',
                'source'    => get_template_directory() . '/plugins/ninzio-addons.zip',
                'required'  => true,
                'force_activation' => true,
                'force_deactivation' => true,
                'external_url' => ''
            ),

            array(
                'name'      => esc_html__('Revolution slider', 'focuson'),
                'slug'      => 'revslider',
                'source'    => get_template_directory() . '/plugins/revslider.zip',
                'required'  => true,
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
                'dismissable' => true
            )

        );

        $config = array(
            'id'                => 'focuson',
            'default_path'      => '',                          // Default absolute path to pre-packaged plugins
            'parent_slug'       => 'themes.php',                // Default parent menu slug
            'capability'        => 'edit_theme_options',
            'menu'              => 'install-required-plugins',  // Menu slug
            'has_notices'       => true,                        // Show admin notices or not
            'dismissable'       => false,
            'is_automatic'      => false,                       // Automatically activate plugins after installation or not
            'message'           => '',                          // Message to output right before the plugins table
            'strings'           => array(
                'page_title'                                => esc_html__( 'Install Required Plugins', 'focuson' ),
                'menu_title'                                => esc_html__( 'Install Plugins', 'focuson' ),
                'installing'                                => esc_html__( 'Installing Plugin: %s', 'focuson' ), // %1$s = plugin name
                'oops'                                      => esc_html__( 'Something went wrong with the plugin API.', 'focuson' ),
                'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'focuson' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'focuson' ), // %1$s = plugin name(s)
                'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'focuson' ), // %1$s = plugin name(s)
                'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'focuson' ), // %1$s = plugin name(s)
                'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'focuson' ), // %1$s = plugin name(s)
                'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'focuson' ), // %1$s = plugin name(s)
                'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'focuson' ), // %1$s = plugin name(s)
                'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'focuson' ), // %1$s = plugin name(s)
                'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'focuson' ),
                'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'focuson' ),
                'return'                                    => esc_html__( 'Return to Required Plugins Installer', 'focuson' ),
                'plugin_activated'                          => esc_html__( 'Plugin activated successfully.', 'focuson' ),
                'complete'                                  => esc_html__( 'All plugins installed and activated successfully. %s', 'focuson' ), // %1$s = dashboard link
                'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );

        tgmpa( $plugins, $config );

    }

/*  INCLUDES
/*======================*/

    if (!class_exists('MultiPostThumbnails') && file_exists( get_template_directory() . '/includes/multi-post-thumbnails.php' ) ) {
        require_once(get_template_directory() . '/includes/multi-post-thumbnails.php');
    }

    if (!class_exists('TGM_Plugin_Activation') && file_exists( get_template_directory() . '/includes/class-tgm-plugin-activation.php' ) ) {
        require_once(get_template_directory() . '/includes/class-tgm-plugin-activation.php');
    }

    if (defined( 'WPB_VC_VERSION' ) && file_exists( get_template_directory() . '/plugins/js_composer.zip' ) ) {
        require_once(get_template_directory() . '/includes/ninzio_vc.php' );
    }

    require_once(get_template_directory() . '/includes/custom-menu/custom-menu.php' );
    require_once(get_template_directory() . '/includes/ninzio-functions.php' );
    require_once(get_template_directory() . '/includes/page-extended-options.php' );
    require_once(get_template_directory() . '/includes/post-extended-options.php' );
    require_once(get_template_directory() . '/includes/widgets/custom-schedule.php' );
    require_once(get_template_directory() . '/includes/widgets/custom-reglog.php' );
    require_once(get_template_directory() . '/includes/widgets/custom-mailchimp.php' );
    require_once(get_template_directory() . '/includes/widgets/custom-recent-entries.php' );
    require_once(get_template_directory() . '/includes/widgets/custom-flickr.php' );
    require_once(get_template_directory() . '/includes/widgets/custom-recent-projects.php' );
    require_once(get_template_directory() . '/includes/widgets/custom-facebook.php' );

/*  THEME SUPPORTS
/*======================*/

    /*  Thumbnail support
    /*-------------------*/

        if ( function_exists( 'add_theme_support' ) ) {

            add_theme_support( 'post-thumbnails');
            add_image_size( 'Focuson-Ninzio-Half', 640, 520, true );           // Half
            add_image_size( 'Focuson-Ninzio-Square', 440, 440, true );         // Square
            add_image_size( 'Focuson-Ninzio-One-Third', 390, 300, true );      // One third
            add_image_size( 'Focuson-Ninzio-Two-Third', 780, 480, true );      // Two thirds
            add_image_size( 'Focuson-Ninzio-Three-Quarters', 870, 570, true ); // Two thirds
            add_image_size( 'Focuson-Ninzio-Whole', 1170, 570, true );         // Whole

        }

        function focuson_ninzio_custom_image_sizes( $sizes ) {
        
            $new_sizes = array();
            
            $added_sizes = get_intermediate_image_sizes();

            foreach( $added_sizes as $key => $value) {
                if($value != 'post-thumbnails' || $value != 'shop_thumbnail' || $value != 'shop_catalog' || $value != 'shop_single'){
                    $new_sizes[$value] = $value;
                }
            }

            $new_sizes = array_merge( $new_sizes, $sizes );
            
            return $new_sizes;
        }
        add_filter('image_size_names_choose', 'focuson_ninzio_custom_image_sizes', 11, 1);

    /*  Multiple post/projects thumbnails
    /*-------------------*/

        if (class_exists('MultiPostThumbnails')) {

            // MultiPostThumbnails for posts
            new MultiPostThumbnails(
                array(
                    'label'     => esc_html__('2nd Featured Image', 'focuson'),
                    'id'        => 'feature-image-2',
                    'post_type' => 'post'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => esc_html__('3rd Featured Image', 'focuson'),
                    'id'        => 'feature-image-3',
                    'post_type' => 'post'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => esc_html__('4th Featured Image', 'focuson'),
                    'id'        => 'feature-image-4',
                    'post_type' => 'post'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => esc_html__('5th Featured Image', 'focuson'),
                    'id'        => 'feature-image-5',
                    'post_type' => 'post'
                )
            );

            // MultiPostThumbnails for projects
            new MultiPostThumbnails(
                array(
                    'label'     => esc_html__('2nd Featured Image', 'focuson'),
                    'id'        => 'project-feature-image-2',
                    'post_type' => 'projects'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => esc_html__('3rd Featured Image', 'focuson'),
                    'id'        => 'project-feature-image-3',
                    'post_type' => 'projects'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => esc_html__('4th Featured Image', 'focuson'),
                    'id'        => 'project-feature-image-4',
                    'post_type' => 'projects'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => esc_html__('5th Featured Image', 'focuson'),
                    'id'        => 'project-feature-image-5',
                    'post_type' => 'projects'
                )
            );

            // MultiPostThumbnails for product
            new MultiPostThumbnails(
                array(
                    'label'     => esc_html__(' second product image', 'focuson'),
                    'id'        => 'feature-image-2',
                    'post_type' => 'product'
                )
            );
        }

    /*  HTML5 gallery and caption support (3.9 addition)
    /*-------------------*/

        add_theme_support( 'html5', array( 'gallery', 'caption' ) );

    /*  Content width
    /*-------------------*/

        if ( ! isset( $content_width ) ) {
            $content_width = 1170;
        }

    /*  Enable excerpt for pages
    /*-------------------*/

        add_action('init', 'focuson_ninzio_page_excerpt');
        function focuson_ninzio_page_excerpt() {
            add_post_type_support( 'page', 'excerpt' );
        }

    /*  Enable post formats for posts
    /*-------------------*/

        add_theme_support( 'post-formats', array( 'aside', 'audio', 'video', 'gallery', 'link', 'quote', 'status', 'chat') );
        add_post_type_support( 'post', 'post-formats' );

    /*  Enable automatic feed links
    /*-------------------*/

        add_theme_support( 'automatic-feed-links' );

    /*  Languages
    /*-------------------*/

        add_action('after_setup_theme', 'focuson_ninzio_language_setup');
        function focuson_ninzio_language_setup(){
            load_theme_textdomain('focuson', get_template_directory() . '/languages');
        }

    /*  Menu
    /*-------------------*/

        function focuson_ninzio_register_menu() {

            register_nav_menus(
                array(
                  'header-menu'      => esc_html__( 'Header Menu', 'focuson' ),
                  'header-top-menu'  => esc_html__( 'Header Top Menu', 'focuson' ),
                  'one-page-bullets' => esc_html__( 'One Page Bullets', 'focuson' ),
                  'footer-menu'      => esc_html__( 'Footer Menu', 'focuson' ),
                )
            );

        }
        add_action( 'after_setup_theme', 'focuson_ninzio_register_menu' );

    /*  Sidebar
    /*-------------------*/

            if ( function_exists( 'register_sidebar' ) ){

                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Blog sidebar', 'focuson'),
                    'id'            => 'blog-widget-area',
                    'description'   => esc_html__('Main widget area', 'focuson'),
                    'class'         => 'blog-widget-area',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h6 class="widget_title">',
                    'after_title'   => '</h6>' )
                );

                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Blog sidebar single', 'focuson'),
                    'id'            => 'blog-widget-area-single',
                    'description'   => esc_html__('Blog widget area single', 'focuson'),
                    'class'         => 'blog-widget-area-single',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h6 class="widget_title">',
                    'after_title'   => '</h6>' )
                );

                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Projects sidebar', 'focuson'),
                    'id'            => 'projects-widget-area',
                    'description'   => esc_html__('Projects widget area', 'focuson'),
                    'class'         => 'projects-widget-area',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h6 class="widget_title">',
                    'after_title'   => '</h6>' )
                );

                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Shop sidebar', 'focuson'),
                    'id'            => 'shop-widget-area',
                    'description'   => esc_html__('Shop widget area', 'focuson'),
                    'class'         => 'shop-widget-area',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h6 class="widget_title">',
                    'after_title'   => '</h6>' )
                );

                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Shop sidebar single product', 'focuson'),
                    'id'            => 'shop-widget-area-single',
                    'description'   => esc_html__('Shop widget area single', 'focuson'),
                    'class'         => 'shop-widget-area',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h6 class="widget_title">',
                    'after_title'   => '</h6>' )
                );

                for ($i=1; $i < 4; $i++) { 
                    register_sidebar( 
                        array (
                        'name'          => esc_html__( 'Page sidebar #','focuson').$i,
                        'id'            => 'page-sidebar-'.$i,
                        'description'   => esc_html__('Page widget area', 'focuson'),
                        'class'         => 'page-widget-area',
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h6 class="widget_title">',
                        'after_title'   => '</h6>' )
                    );
                }

                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Footer sidebar', 'focuson'),
                    'id'            => 'footer-widget-area',
                    'description'   => esc_html__('Footer widget area', 'focuson'),
                    'class'         => 'footer-widget-area',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h6 class="widget_title">',
                    'after_title'   => '</h6>' )
                );

            }

    /*  WooCommerce
    /*-------------------*/

        if (class_exists('Woocommerce')){

            focuson_ninzio_global_variables();

            if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'focuson_ninzio_woo_img', 1 );

            function focuson_ninzio_woo_img() {
                $catalog = array(
                    'width'     => '440',
                    'height'    => '440',
                    'crop'      => 0
                );
                $single = array(
                    'width'     => '460',
                    'height'    => '520',
                    'crop'      => 1
                );
                $thumbnail = array(
                    'width'     => '90',
                    'height'    => '90',
                    'crop'      => 1 
                );

                update_option( 'shop_catalog_image_size', $catalog );
                update_option( 'shop_single_image_size', $single );
                update_option( 'shop_thumbnail_image_size', $thumbnail );
            }

            //change the position of add to cart
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
            remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
            add_action('woocommerce_before_shop_loop_item', 'focuson_ninzio_product_thumb', 10 );
            add_action('woocommerce_after_shop_loop_item', 'focuson_ninzio_product_det', 10 );


            function focuson_ninzio_product_thumb() { ?>
                <?php 
                    global $post, $product;
                ?>
                <?php if ( $product->is_on_sale() ) : ?>
                    <?php
                    
                        $sale_price = get_post_meta( $product->id, '_price', true);
                        $regular_price = get_post_meta( $product->id, '_regular_price', true);

                        if (empty($regular_price)){ //then this is a variable product
                            $available_variations = $product->get_available_variations();
                            $variation_id=$available_variations[0]['variation_id'];
                            $variation= new WC_Product_Variation( $variation_id );
                            $regular_price = $variation ->regular_price;
                            $sale_price = $variation ->sale_price;
                        }
                        $sale = ceil(( ($regular_price - $sale_price) / $regular_price ) * 100);
                    ?>
                    <?php if ( !empty( $regular_price ) && !empty( $sale_price ) && $regular_price > $sale_price ) : ?>
                        <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="product-status onsale">-' . $sale . '%</span>', $post, $product ); ?>
                    <?php endif ?>
                <?php endif; ?>
                <div class="nz-thumbnail">
                    <?php echo woocommerce_get_product_thumbnail();?>
                    <?php
                        if (class_exists('MultiPostThumbnails')) {
                            if (MultiPostThumbnails::has_post_thumbnail('product', 'feature-image-2')) {
                            $thumb_2 = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post->ID);

                            echo '<img class="hover-img" src="'.$thumb_2.'" alt="'.get_the_title().'">';
                            }
                        }
                    ?>
                </div>
                <div class="product-details">
            <?php }

            function focuson_ninzio_product_det() { ?>
                    <div class="cart-wrap nz-clearfix">
                        <?php woocommerce_template_loop_add_to_cart(); ?>
                        <div class="shop-loader">&nbsp;</div>
                    </div>
                </div>
            <?php }

            //change the product-category structure
            add_action('woocommerce_before_subcategory_title', 'focuson_ninzio_procut_cat_thumb_start', 5 );
            add_action('woocommerce_before_subcategory_title', 'focuson_ninzio_procut_cat_thumb_end', 10 );
            add_action('woocommerce_after_subcategory_title', 'focuson_ninzio_procut_cat_thumb_end2', 10 );

            function focuson_ninzio_procut_cat_thumb_start() { ?>
                <div class="nz-thumbnail">
                    <div class="ninzio-overlay">
                        <span class="nz-overlay-before portfolio-link"></span>
                    </div>
            <?php 
            }

            function focuson_ninzio_procut_cat_thumb_end() { ?>
                </div>
                <div class="category-details">
            <?php 
            }

            function focuson_ninzio_procut_cat_thumb_end2() { ?>
                </div>
            <?php 
            }


            // Remove shop title
            add_filter( 'woocommerce_show_page_title' , 'focuson_ninzio_hide_page_title' );
            function focuson_ninzio_hide_page_title() {return false;}

            // Remove woocommerce breadcrumbs
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

            // Ensure cart contents update when products are added to the cart via AJAX
            add_filter('add_to_cart_fragments', 'focuson_ninzio_add_to_cart');
            function focuson_ninzio_add_to_cart( $fragments ) {
                
                global $woocommerce;

                ob_start(); ?>
                <a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_html__('View your shopping cart', 'focuson'); ?>">
                    <span class="cart-info"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
                </a>
                <?php

                $fragments['a.cart-contents'] = ob_get_clean();
                return $fragments;

            }

            //wrap single product image in column div
            remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
            add_action( 'woocommerce_before_single_product_summary', 'focuson_ninzio_column_open_div', 2);
            add_action( 'woocommerce_before_single_product_summary', 'focuson_ninzio_column_close_div', 20);
            add_action( 'woocommerce_after_single_product_summary',  'focuson_ninzio_clearfix_div', 2);

            function focuson_ninzio_column_open_div(){  ?>
                <div class="single-image-content nz-clearfix">
                <div class='single-product-image'>
            <?php }
            function focuson_ninzio_column_close_div(){
                echo "</div><div class='single-product-summary'>"; ?>
            <?php }
            function focuson_ninzio_clearfix_div(){echo '</div></div>';}

            function focuson_ninzio_social_share( $content ) { 
                global $post;
            ?>
                <?php if ($post->post_excerpt): ?>
                    <div class="description"><?php echo $post->post_excerpt; ?></div>
                <?php endif ?>
                <?php if (is_single()): ?>
                    <div class="post-social-share nz-clearfix">
                        <div class="share-label"><?php echo esc_html__("Share:", 'focuson'); ?></div>
                        <div class="social-links left nz-clearfix">
                            <a title="<?php echo esc_html__("Share on Facebook", 'focuson'); ?>" class="post-facebook-share icon-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"></a>
                            <a title="<?php echo esc_html__("Tweet this!", 'focuson'); ?>" class="post-twitter-share icon-twitter" target="_blank" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>"></a>
                            <a title="<?php echo esc_html__("Share on Pinterest", 'focuson'); ?>" class="post-pinterest-share icon-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>"></a>
                            <a title="<?php echo esc_html__("Share on LinkedIn", 'focuson'); ?>" class="post-linkedin-share icon-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"></a>
                            <a title="<?php echo esc_html__("Share on Google+", 'focuson'); ?>" class="post-google-share icon-googleplus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a>
                        </div>
                    </div>
                <?php endif ?>
            <?php }
            add_filter('woocommerce_short_description', 'focuson_ninzio_social_share', 10, 2);
                
            function focuson_ninzio_remove_pretty_photo(){
                wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
                wp_dequeue_style( 'woocommerce_chosen_styles' );
                wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
                wp_dequeue_script( 'prettyPhoto-init' );
                wp_dequeue_script( 'prettyPhoto' );
                wp_dequeue_script( 'wc-chosen' );
            }
            
            add_action( 'wp_enqueue_scripts', 'focuson_ninzio_remove_pretty_photo', 99 );

            if (isset($GLOBALS['focuson_ninzio']['shop-rp']) && $GLOBALS['focuson_ninzio']['shop-rp'] == 0) {
                // remove related products
                remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
            }

            // related products number
            function focuson_ninzio_remove_related_products( $args ) {
                return array();
            }
            add_filter('woocommerce_related_products_args','focuson_ninzio_remove_related_products', 10);
            
            add_theme_support( 'woocommerce' );

            add_filter( 'woocommerce_enqueue_styles', '__return_false' );

        }

    /*  Visual Composer
    /*-------------------*/

        if(function_exists('vc_set_as_theme')) vc_set_as_theme();

    /*  Title Tag
    /*-------------------*/

        add_action( 'after_setup_theme', 'focuson_ninzio_theme_slug_setup' );
        function focuson_ninzio_theme_slug_setup() {
            add_theme_support( 'title-tag' );
        }

    /*  Redux
    /*-------------------*/

        function focuson_ninzio_remove_redux_news() {
            remove_meta_box( 'redux_dashboard_widget', 'dashboard', 'side' );
        } 
        add_action('wp_dashboard_setup', 'focuson_ninzio_remove_redux_news' );

        function focuson_ninzio_redux_menu_page_removing() {
            remove_submenu_page( 'tools.php', 'redux-about' );
        }
        add_action( 'admin_menu', 'focuson_ninzio_redux_menu_page_removing' );

/*  SCRIPTS
/*======================*/

    function focuson_ninzio_script()
    {
        global $focuson_ninzio;

        wp_enqueue_style( 'focuson-style', get_stylesheet_uri() );

        if ( is_singular() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        if (isset($GLOBALS['focuson_ninzio']['google-map-api']) && !empty($GLOBALS['focuson_ninzio']['google-map-api'])) {
            wp_enqueue_script( 'gmap', '//maps.google.com/maps/api/js?key='.$GLOBALS['focuson_ninzio']['google-map-api'], array(), false);
        } else {
            wp_enqueue_script( 'gmap', '//maps.google.com/maps/api/js', array(), false);
        }

        wp_enqueue_script( 'modernizr', FOCUSON_NINZIO_TEMPPATH . '/js/modernizr.js', array(), false);
        wp_enqueue_script( 'shuffle', FOCUSON_NINZIO_TEMPPATH . '/js/jquery.shuffle.js', array('jquery'), '', true);
        wp_enqueue_script( 'controller', FOCUSON_NINZIO_TEMPPATH . '/js/controller.js', array('jquery'), '', true);

    }
    add_action( 'wp_enqueue_scripts', 'focuson_ninzio_script' );

/* ADMIN STYLES/SCRIPTS
/*======================*/

    function focuson_admin_scripts_styles() {
        wp_enqueue_script( 'ninzio-admin', FOCUSON_NINZIO_TEMPPATH . '/js/admin-scripts.js', array('jquery'), '', true);
        wp_enqueue_style( 'admin-styles', FOCUSON_NINZIO_TEMPPATH . '/css/admin-styles.css', array(), '', 'all' );
        wp_enqueue_style( 'jquery-ui', FOCUSON_NINZIO_TEMPPATH . '/css/jquery-ui.css', array(), '', 'all' );
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'jquery-ui-spinner' );
        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style( 'thickbox' );
        wp_enqueue_script( 'thickbox' );
        wp_enqueue_media();

        return;
    }
    add_action('admin_enqueue_scripts','focuson_admin_scripts_styles');

?>