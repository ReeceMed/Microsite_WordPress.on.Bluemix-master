<?php

if (!class_exists('Redux_Framework_config')) {
	class Redux_Framework_config {

		public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            $this->theme = wp_get_theme();
            $this->setArguments();
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections() {
        	ob_start();

        	$ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(esc_html__('Customize &#8220;%s&#8221;', 'ninzio-addons'), $this->theme->display('Name'));

            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'ninzio-addons'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'ninzio-addons'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
					<ul class="theme-info">
						<li><?php printf( esc_html__('By %s','ninzio-addons'), $ct->display('Author') ); ?></li>
						<li><?php printf( esc_html__('Version %s','ninzio-addons'), $ct->display('Version') ); ?></li>
						<li><?php echo '<strong>'.esc_html__('Tags', 'ninzio-addons').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
					</ul>
					<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
					<?php if ( $ct->parent() ) {
						printf( ' <p class="howto">' . esc_html__( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'focuson_ninzio' ) . '</p>',
							esc_html__( 'http://codex.wordpress.org/Child_Themes', 'focuson_ninzio' ),
							$ct->parent()->display( 'Name' ) );
					} ?>

				</div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            // General
            $this->sections[] = array(
				'title'      => esc_html__('General', 'ninzio-addons'),
				'fields' => array(

					array(
						'id'       =>'layout',
						'type'     => 'radio',
						'title'    => esc_html__('Main layout', 'ninzio-addons'),
						'options'  => array(
							'wide'  => esc_html__('Wide', 'ninzio-addons'),
							'boxed' => esc_html__('Boxed', 'ninzio-addons')
						),
						'default'  => 'wide',
					),

					array(
						'id'       =>'rh-version',
						'type'     => 'radio',
						'title'    => esc_html__('Page title section', 'ninzio-addons'),
						'options'  => array(
							'version1'  => esc_html__('Version 1', 'ninzio-addons'),
							'version2'  => esc_html__('Version 2', 'ninzio-addons')
						),
						'default'  => 'version1',
					),

					array(
						'id'      =>'page-comments',
						'type'    => 'switch',
						'title'   => esc_html__('Comments on pages', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'one-page-navigation',
						'type'     => 'select',
						'title'    => esc_html__('One page navigation', 'ninzio-addons'),
						'options'  => array(
							"top"   => "Top menu",
							"side"  => "Bullets"
						),
						'default' => "top"
					),

					array(
						'id'       =>'one-page-speed',
						'type'     => 'spinner',
						'title'    => esc_html__('One page scroll speed in ms', 'ninzio-addons'),
						'min'      =>'500',
						'max'      =>'1500',
						'step'     =>'100',
						'default'  => '800'
					),

					array(
						'id'      =>'one-page-hash',
						'type'    => 'switch',
						'title'   => esc_html__('One page layout hash', 'ninzio-addons'),
						'subtitle'=> esc_html__("Toggle one page layout hash. In browsers that support the history object, update the url's hash when clicking on the links ", 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'       =>'one-page-filter',
						'type'     => 'text',
						'title'    => esc_html__('One page menu filter (if one page navigation is top menu)', 'ninzio-addons'),
						'subtitle'=> esc_html__("Exclude links from one page menu by entering comma-separated menu items' ids", 'ninzio-addons'),
					),

					array(
						'id'       =>'google-map-api',
						'type'     => 'text',
						'title'    => esc_html__("Google map API Key", 'ninzio-addons'),
						'subtitle'=> esc_html__("Enter google map API Key", 'ninzio-addons'),
					)
				)
			);

			// Header
			$this->sections[] = array(
				'title'      => esc_html__('Header', 'ninzio-addons'),
				'fields' => array(

					array(
						'id'       =>'header-version',
						'type'     => 'select',
						'title'    => esc_html__('Choose header verion', 'ninzio-addons'),
						'options'  => array(
							'version1' =>'Version 1',
							'version2' =>'Version 2',
							'version3' =>'Version 3'
						),
						'default'  => 'version1'
					)
				)
			);

			// Header version 1
			$this->sections[] = array(
				'title'      => esc_html__('Desktop Header 1', 'ninzio-addons'),
			    'subsection' => true,
				'fields' => array(

					array(
						'id'       =>'h1-stucked',
						'type'     => 'switch',
						'title'    => esc_html__('Stucked header', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle stucked header', 'ninzio-addons'),
						"default"  => 0
					),

					array(
						'id'      =>'h1-header-top',
						'type'    => 'switch',
						'title'   => esc_html__('Header top section', 'ninzio-addons'),
						"default" => 1,
					),

					array(
						'id'       =>'h1-header-top-back-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header top background color', 'ninzio-addons'),
						'default'   => array(
					        'color'     => '#90c948',
					        'alpha'     => 1
					    )
					),

					array(
						'id'       =>'h1-header-top-border-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header top border bottom color', 'ninzio-addons'),
					),

					array(
						'id'       =>'h1-header-top-menu-color',
						'type'     => 'color',
						'title'    => esc_html__('Header top menu color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
						'id'      =>'h1-header-top-social-links',
						'type'    => 'switch',
						'title'   => esc_html__('Header top social links', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'       =>'h1-header-top-social-links-color',
						'type'     => 'color',
						'title'    => esc_html__('Header top social links color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
						'id'       =>'h1-desk-slogan',
						'type'     => 'textarea',
						'title'    => __('Slogan goes here', 'ninzio-addons')
					),

					array(
						'id'       =>'h1-top-button-url',
						'type'     => 'text',
						'title'    => __('Header top button url', 'ninzio-addons')
					),

					array(
						'id'       =>'h1-top-button-text',
						'type'     => 'text',
						'title'    => __('Header top button text', 'ninzio-addons')
					),

					array(
						'id'       =>'h1-top-button-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header top button text color', 'ninzio-addons'),
						'default'  => '#999999',
					),

					array(
						'id'       =>'h1-top-button-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header top button background color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
					    'id'   => 'h1-info-desk-logo',
					    'type' => 'info',
					    'desc' => esc_html__('Upload .jpg, .png or .gif image that will be your logo.', 'ninzio-addons')
					),

					array(
						'id'       =>'h1-desk-logo',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Header top logo upload', 'ninzio-addons'),
					),

					array(
						'id'       =>'h1-desk-logo-retina',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Header top retina logo upload', 'ninzio-addons'),
					),

					array(
						'id'      =>'h1-desk-search',
						'type'    => 'switch',
						'title'   => esc_html__('Header search', 'ninzio-addons'),
						"default" => 1,
					),

					array(
						'id'      =>'h1-desk-shop-cart',
						'type'    => 'switch',
						'title'   => esc_html__('Toggle shopping cart in header', 'ninzio-addons'),
						'subtitle'=> esc_html__('Available with WooCommerce installed and active', 'ninzio-addons'),
						"default" => 0
					),

					array(
						'id'       =>'h1-desk-lw',
						'type'     => 'dimensions',
						'title'    => esc_html__('Set width of dropdown list of languagies in px', 'ninzio-addons'),
						'subtitle' => esc_html__('WPML Language switch has different content, so list width will vary with the content. (Add language switcher to top menu)', 'ninzio-addons'),
						'height'   => false,
						'units'    => 'px',
						"default" => '149px',
					),

					array(
						'id'      =>'h1-desk-icons-version',
						'type'     => 'select',
						'title'    => esc_html__('Choose icons version', 'ninzio-addons'),
						'options'  => array(
							"dark"  => "Dark",
							"light" => "Light"
						),
						'default' => "dark"
					),

					array(
						'id'       =>'h1-desk-cart-bubble-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble background color', 'ninzio-addons'),
						'default'  => '#8cc443',
					),

					array(
						'id'       =>'h1-desk-cart-bubble-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble text color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
						'id'       =>'h1-desk-cart-buttons-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart buttons background color', 'ninzio-addons'),
						'default'  => '#8cc443',
					),

					array(
						'id'       =>'h1-desk-cart-buttons-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart buttons text color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
						'id'       =>'h1-desk-back-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header menu background color', 'ninzio-addons'),
						'default'   => array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
					    )
					),

					array(
						'id'       =>'h1-desk-border-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header menu border bottom color', 'ninzio-addons'),
					),

					array(
						'id'      =>'h1-desk-menu-effect',
						'type'     => 'select',
						'title'    => esc_html__('Choose menu effect version', 'ninzio-addons'),
						'options'  => array(
							"underline" => "Underline",
							"overline"  => "Overline",
							"outline"   => "Outline",
							"fill"      => "Fill"
						),
						'default' => "underline"
					),

					array(
						'id'       =>'h1-desk-menu-effect-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header menu effect color', 'ninzio-addons'),
						'default'   => array(
					        'color'     => '#90c948',
					        'alpha'     => 1
					    )
					),

					array(
						'id'      =>'h1-desk-menu-color',
						'type'    => 'link_color',
						'title'   => esc_html__('Header menu links color', 'ninzio-addons'),
						'active'   => false,
						'visited'  => false,
						'default'  => array(
					        'regular'  => '#999999',
					        'hover'    => '#999999',
					    )
					),

					array(
						'id'       =>'h1-desk-submenu-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header submenu background color', 'ninzio-addons'),
						'default'  => '#292929',
					),

					array(
						'id'      =>'h1-desk-submenu-color',
						'type'    => 'link_color',
						'title'   => esc_html__('Header submenu links color', 'ninzio-addons'),
						'active'   => false,
						'visited'  => false,
						'default'  => array(
					        'regular'  => '#999999',
					        'hover'    => '#e2e2e2',
					    )
					),

					array(
						'id'       =>'h1-desk-submenu-effect',
						'type'     => 'select',
						'title'    => esc_html__('Choose submenu', 'ninzio-addons'),
						'options'  => array(
							'ghost' =>'Ghost',
							'fade'  =>'Fade',
							'slide' =>'Slide',
							'move'  =>'Move'
						),
						'default'  => 'ghost'
					),

					array(
						'id'       =>'h1-desk-menu-m',
						'type'     => 'spinner',
						'title'    => esc_html__('Set menu margin in px', 'ninzio-addons'),
						'min'      =>'-10',
						'max'      =>'250',
						'step'     =>'1',
						'default'  =>'20'
					),

					array(
						'id'       =>'h1-desk-menu-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Menu typography', 'ninzio-addons'),
						'subtitle' => esc_html__('Adjust menu typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => true,
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'line-height'    => false,
						'color'          => false,
						'text-align'     => false,
						'default'     => array(
					        'font-weight'    => '400',
					        'font-family'    => 'Arial, Helvetica, sans-serif',
					        'font-size'      => '14px'
					    )
					),

					array(
						'id'       =>'h1-desk-submenu-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Submenu typography', 'ninzio-addons'),
						'subtitle' => esc_html__('Adjust submenu typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => true,
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'color'          => false,
						'text-align'     => false,
						'default'     => array(
					        'font-weight'    => '400',
					        'font-family'    => 'Arial, Helvetica, sans-serif',
					        'font-size'      => '13px',
					        'line-height'    => '22px'
					    )
					),

					array(
						'id'       =>'h1-desk-megamenu-top-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Megamenu top level typography', 'ninzio-addons'),
						'subtitle' => esc_html__('Adjust megamenu top level typography', 'ninzio-addons'),
						'units'          => 'px',
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'line-height'    => false,
						'color'          => true,
						'text-align'     => false,
						'font-size'      => true,
						'font-family'    => false,
						'font-style'     => false
					),

					array(
					    'id'   => 'h1-info-fixed',
					    'type' => 'info',
					    'style' => 'warning',
					    'desc' => esc_html__('STICKY HEADER OPTIONS', 'ninzio-addons')
					),

					array(
						'id'       =>'h1-fixed',
						'type'     => 'switch',
						'title'    => esc_html__('Sticky header', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle sticky header', 'ninzio-addons'),
						"default"  => 0
					),

					array(
					    'id'   => 'h1-info-fixed-logo',
					    'type' => 'info',
					    'desc' => esc_html__('Upload .jpg, .png or .gif image that will be your logo.', 'ninzio-addons')
					),

					array(
						'id'       =>'h1-desk-fixed-logo',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Sticky Header logo upload', 'ninzio-addons'),
					),

					array(
						'id'       =>'h1-desk-fixed-logo-retina',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Sticky Header retina logo upload', 'ninzio-addons'),
					),

					array(
						'id'       =>'h1-desk-fixed-back-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Sticky Header menu background color', 'ninzio-addons'),
					),

					array(
						'id'      =>'h1-desk-fixed-icons-version',
						'type'     => 'select',
						'title'    => esc_html__('Choose sticky header icons version', 'ninzio-addons'),
						'options'  => array(
							"dark"  => "Dark",
							"light" => "Light"
						),
						'default' => "dark"
					),

					array(
						'id'       =>'h1-desk-fixed-cart-bubble-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble background color', 'ninzio-addons'),
					),

					array(
						'id'       =>'h1-desk-fixed-cart-bubble-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble text color', 'ninzio-addons'),
					),

					array(
						'id'       =>'h1-desk-fixed-menu-effect-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Sticky header menu effect color', 'ninzio-addons'),
					),

					array(
						'id'      =>'h1-desk-fixed-menu-color',
						'type'    => 'link_color',
						'title'   => esc_html__('Sticky header menu links color', 'ninzio-addons'),
						'active'   => false,
						'visited'  => false,
					)
				)
			);

			// Header version 2
			$this->sections[] = array(
				'title'      => esc_html__('Desktop Header 2', 'ninzio-addons'),
			    'subsection' => true,
				'fields' => array(

					array(
						'id'       =>'h2-stucked',
						'type'     => 'switch',
						'title'    => esc_html__('Stucked header', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle stucked header', 'ninzio-addons'),
						"default"  => 0
					),

					array(
						'id'       =>'h2-header-top-menu-color',
						'type'     => 'color',
						'title'    => esc_html__('Header top menu color', 'ninzio-addons'),
						'default'  => '#999999',
					),

					array(
						'id'      =>'h2-header-top-social-links',
						'type'    => 'switch',
						'title'   => esc_html__('Header top social links', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'       =>'h2-header-top-social-links-color',
						'type'     => 'color',
						'title'    => esc_html__('Header top social links color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
						'id'       =>'h2-desk-slogan',
						'type'     => 'textarea',
						'title'    => __('Slogan goes here', 'ninzio-addons')
					),

					array(
						'id'       =>'h2-top-button-url',
						'type'     => 'text',
						'title'    => __('Header top button url', 'ninzio-addons')
					),

					array(
						'id'       =>'h2-top-button-text',
						'type'     => 'text',
						'title'    => __('Header top button text', 'ninzio-addons')
					),

					array(
						'id'       =>'h2-top-button-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header top button text color', 'ninzio-addons'),
						'default'  => '#999999',
					),

					array(
						'id'       =>'h2-top-button-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header top button background color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
					    'id'   => 'h2-info-desk-logo',
					    'type' => 'info',
					    'desc' => esc_html__('Upload .jpg, .png or .gif image that will be your logo.', 'ninzio-addons')
					),

					array(
						'id'       =>'h2-desk-logo',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Header top logo upload', 'ninzio-addons'),
					),

					array(
						'id'       =>'h2-desk-logo-retina',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Header top retina logo upload', 'ninzio-addons'),
					),

					array(
						'id'      =>'h2-desk-search',
						'type'    => 'switch',
						'title'   => esc_html__('Header search', 'ninzio-addons'),
						"default" => 1,
					),

					array(
						'id'      =>'h2-desk-shop-cart',
						'type'    => 'switch',
						'title'   => esc_html__('Toggle shopping cart in header', 'ninzio-addons'),
						'subtitle'=> esc_html__('Available with WooCommerce installed and active', 'ninzio-addons'),
						"default" => 0
					),

					array(
						'id'       =>'h2-desk-cart-search-border-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header cart/search toggle border color', 'ninzio-addons'),
						'default'   => array(
					        'color'     => '#dddddd',
					        'alpha'     => 1
					    )
					),

					array(
						'id'       =>'h2-desk-cart-bubble-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble background color', 'ninzio-addons'),
						'default'  => '#8cc443',
					),

					array(
						'id'       =>'h2-desk-cart-bubble-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble text color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
						'id'       =>'h2-desk-cart-buttons-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart buttons background color', 'ninzio-addons'),
						'default'  => '#8cc443',
					),

					array(
						'id'       =>'h2-desk-cart-buttons-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart buttons text color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
						'id'       =>'h2-desk-lw',
						'type'     => 'dimensions',
						'title'    => esc_html__('Set width of dropdown list of languagies in px', 'ninzio-addons'),
						'subtitle' => esc_html__('WPML Language switch has different content, so list width will vary with the content. (Add language switcher to top menu)', 'ninzio-addons'),
						'height'   => false,
						'units'    => 'px',
						"default" => '149px',
					),

					array(
						'id'      =>'h2-desk-icons-version',
						'type'     => 'select',
						'title'    => esc_html__('Choose icons version', 'ninzio-addons'),
						'options'  => array(
							"dark"  => "Dark",
							"light" => "Light"
						),
						'default' => "dark"
					),

					array(
						'id'       =>'h2-desk-back-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header background color', 'ninzio-addons'),
						'default'   => array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
					    )
					),

					array(
						'id'       =>'h2-desk-border-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header border bottom color', 'ninzio-addons'),
					),

					array(
						'id'      =>'h2-desk-menu-effect',
						'type'     => 'select',
						'title'    => esc_html__('Choose menu effect version', 'ninzio-addons'),
						'options'  => array(
							"underline" => "Underline",
							"overline"  => "Overline",
							"outline"   => "Outline",
							"fill"      => "Fill"
						),
						'default' => "underline"
					),

					array(
						'id'       =>'h2-desk-menu-effect-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header menu effect color', 'ninzio-addons'),
						'default'   => array(
					        'color'     => '#90c948',
					        'alpha'     => 1
					    )
					),

					array(
						'id'       =>'h2-desk-menu-back-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header menu area background color', 'ninzio-addons'),
						'default'   => array(
					        'color'     => '#444444',
					        'alpha'     => 1
					    )
					),

					array(
						'id'      =>'h2-desk-menu-color',
						'type'    => 'link_color',
						'title'   => esc_html__('Header menu links color', 'ninzio-addons'),
						'active'   => false,
						'visited'  => false,
						'default'  => array(
					        'regular'  => '#ffffff',
					        'hover'    => '#ffffff',
					    )
					),

					array(
						'id'       =>'h2-desk-submenu-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header submenu background color', 'ninzio-addons'),
						'default'  => '#292929',
					),

					array(
						'id'      =>'h2-desk-submenu-color',
						'type'    => 'link_color',
						'title'   => esc_html__('Header submenu links color', 'ninzio-addons'),
						'active'   => false,
						'visited'  => false,
						'default'  => array(
					        'regular'  => '#999999',
					        'hover'    => '#ffffff',
					    )
					),

					array(
						'id'       =>'h2-desk-submenu-effect',
						'type'     => 'select',
						'title'    => esc_html__('Choose submenu', 'ninzio-addons'),
						'options'  => array(
							'ghost' =>'Ghost',
							'fade'  =>'Fade',
							'slide' =>'Slide',
							'move'  =>'Move'
						),
						'default'  => 'ghost'
					),

					array(
						'id'       =>'h2-desk-menu-m',
						'type'     => 'spinner',
						'title'    => esc_html__('Set menu margin in px', 'ninzio-addons'),
						'min'      =>'-10',
						'max'      =>'250',
						'step'     =>'1',
						'default'  =>'20'
					),

					array(
						'id'       =>'h2-desk-menu-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Menu typography', 'ninzio-addons'),
						'subtitle' => esc_html__('Adjust menu typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => true,
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'line-height'    => false,
						'color'          => false,
						'text-align'     => false,
						'default'     => array(
					        'font-weight'    => '400',
					        'font-family'    => 'Arial, Helvetica, sans-serif',
					        'font-size'      => '14px'
					    )
					),

					array(
						'id'       =>'h2-desk-submenu-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Submenu typography', 'ninzio-addons'),
						'subtitle' => esc_html__('Adjust submenu typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => true,
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'color'          => false,
						'text-align'     => false,
						'default'     => array(
					        'font-weight'    => '400',
					        'font-family'    => 'Arial, Helvetica, sans-serif',
					        'font-size'      => '13px',
					        'line-height'    => '22px'
					    )
					),

					array(
						'id'       =>'h2-desk-megamenu-top-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Megamenu top level typography', 'ninzio-addons'),
						'subtitle' => esc_html__('Adjust megamenu top level typography', 'ninzio-addons'),
						'units'          => 'px',
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'line-height'    => false,
						'color'          => true,
						'text-align'     => false,
						'font-size'      => true,
						'font-family'    => false,
						'font-style'     => false
					),

					array(
					    'id'   => 'h2-info-fixed',
					    'type' => 'info',
					    'style' => 'warning',
					    'desc' => esc_html__('STICKY HEADER OPTIONS', 'ninzio-addons')
					),

					array(
						'id'       =>'h2-fixed',
						'type'     => 'switch',
						'title'    => esc_html__('Sticky header', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle sticky header', 'ninzio-addons'),
						"default"  => 0
					),

					array(
						'id'       =>'h2-desk-fixed-menu-back-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Sticky Header menu area background color', 'ninzio-addons'),
					),

					array(
						'id'       =>'h2-desk-fixed-menu-effect-color',
						'type'     => 'color',
						'title'    => esc_html__('Sticky header menu effect color', 'ninzio-addons'),
					),

					array(
						'id'      =>'h2-desk-fixed-menu-color',
						'type'    => 'link_color',
						'title'   => esc_html__('Sticky header menu links color', 'ninzio-addons'),
						'active'   => false,
						'visited'  => false,
					)
				)
			);

			// Header version 3
			$this->sections[] = array(
				'title'      => esc_html__('Desktop Header 3', 'ninzio-addons'),
			    'subsection' => true,
				'fields' => array(

					array(
					    'id'   => 'h3-info-desk-logo',
					    'type' => 'info',
					    'desc' => esc_html__('Upload .jpg, .png or .gif image that will be your logo.', 'ninzio-addons')
					),

					array(
						'id'       =>'h3-desk-logo',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Header top logo upload', 'ninzio-addons'),
					),

					array(
						'id'       =>'h3-desk-logo-retina',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Header top retina logo upload', 'ninzio-addons'),
					),

					array(
						'id'      =>'h3-header-social-links',
						'type'    => 'switch',
						'title'   => esc_html__('Header social links', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'       =>'h3-header-social-links-color',
						'type'     => 'color',
						'title'    => esc_html__('Header social links color', 'ninzio-addons'),
						'default'  => '#999999',
					),

					array(
						'id'      =>'h3-desk-search',
						'type'    => 'switch',
						'title'   => esc_html__('Header search', 'ninzio-addons'),
						"default" => 1,
					),

					array(
						'id'      =>'h3-desk-shop-cart',
						'type'    => 'switch',
						'title'   => esc_html__('Toggle shopping cart in header', 'ninzio-addons'),
						'subtitle'=> esc_html__('Available with WooCommerce installed and active', 'ninzio-addons'),
						"default" => 0
					),

					array(
						'id'       =>'h3-desk-lw',
						'type'     => 'dimensions',
						'title'    => esc_html__('Set width of dropdown list of languagies in px', 'ninzio-addons'),
						'subtitle' => esc_html__('WPML Language switch has different content, so list width will vary with the content. (Add language switcher to top menu)', 'ninzio-addons'),
						'height'   => false,
						'units'    => 'px',
						"default" => '149px',
					),

					array(
						'id'      =>'h3-desk-icons-version',
						'type'     => 'select',
						'title'    => esc_html__('Choose icons version', 'ninzio-addons'),
						'options'  => array(
							"dark"  => "Dark",
							"light" => "Light"
						),
						'default' => "dark"
					),

					array(
						'id'       =>'h3-desk-cart-bubble-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble background color', 'ninzio-addons'),
						'default'  => '#8cc443',
					),

					array(
						'id'       =>'h3-desk-cart-bubble-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble text color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
						'id'       =>'h3-desk-cart-buttons-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart buttons background color', 'ninzio-addons'),
						'default'  => '#8cc443',
					),

					array(
						'id'       =>'h3-desk-cart-buttons-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart buttons text color', 'ninzio-addons'),
						'default'  => '#ffffff',
					),

					array(
						'id'       =>'h3-desk-back-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header menu background color', 'ninzio-addons'),
						'default'   => array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
					    )
					),

					array(
						'id'      =>'h3-desk-menu-effect',
						'type'     => 'select',
						'title'    => esc_html__('Choose menu effect version', 'ninzio-addons'),
						'options'  => array(
							"underline" => "Underline",
							"overline"  => "Overline",
							"outline"   => "Outline",
							"fill"      => "Fill"
						),
						'default' => "underline"
					),

					array(
						'id'       =>'h3-desk-menu-effect-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Header menu effect color', 'ninzio-addons'),
						'default'   => array(
					        'color'     => '#90c948',
					        'alpha'     => 1
					    )
					),

					array(
						'id'      =>'h3-desk-menu-color',
						'type'    => 'link_color',
						'title'   => esc_html__('Header menu links color', 'ninzio-addons'),
						'active'   => false,
						'visited'  => false,
						'default'  => array(
					        'regular'  => '#999999',
					        'hover'    => '#999999',
					    )
					),

					array(
						'id'       =>'h3-desk-submenu-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header submenu background color', 'ninzio-addons'),
						'default'  => '#292929',
					),

					array(
						'id'      =>'h3-desk-submenu-color',
						'type'    => 'link_color',
						'title'   => esc_html__('Header submenu links color', 'ninzio-addons'),
						'active'   => false,
						'visited'  => false,
						'default'  => array(
					        'regular'  => '#999999',
					        'hover'    => '#e2e2e2',
					    )
					),

					array(
						'id'       =>'h3-desk-submenu-effect',
						'type'     => 'select',
						'title'    => esc_html__('Choose submenu', 'ninzio-addons'),
						'options'  => array(
							'ghost' =>'Ghost',
							'fade'  =>'Fade',
							'slide' =>'Slide',
							'move'  =>'Move'
						),
						'default'  => 'ghost'
					),

					array(
						'id'       =>'h3-desk-menu-m',
						'type'     => 'spinner',
						'title'    => esc_html__('Set menu margin in px', 'ninzio-addons'),
						'min'      =>'-10',
						'max'      =>'250',
						'step'     =>'1',
						'default'  =>'20'
					),

					array(
						'id'       =>'h3-desk-menu-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Menu typography', 'ninzio-addons'),
						'subtitle' => esc_html__('Adjust menu typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => true,
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'line-height'    => false,
						'color'          => false,
						'text-align'     => false,
						'default'     => array(
					        'font-weight'    => '400',
					        'font-family'    => 'Arial, Helvetica, sans-serif',
					        'font-size'      => '14px'
					    )
					),

					array(
						'id'       =>'h3-desk-submenu-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Submenu typography', 'ninzio-addons'),
						'subtitle' => esc_html__('Adjust submenu typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => true,
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'color'          => false,
						'text-align'     => false,
						'default'     => array(
					        'font-weight'    => '400',
					        'font-family'    => 'Arial, Helvetica, sans-serif',
					        'font-size'      => '13px',
					        'line-height'    => '22px'
					    )
					),

					array(
						'id'       =>'h3-desk-megamenu-top-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Megamenu top level typography', 'ninzio-addons'),
						'subtitle' => esc_html__('Adjust megamenu top level typography', 'ninzio-addons'),
						'units'          => 'px',
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'line-height'    => false,
						'color'          => true,
						'text-align'     => false,
						'font-size'      => true,
						'font-family'    => false,
						'font-style'     => false
					),

					array(
					    'id'   => 'h3-info-fixed',
					    'type' => 'info',
					    'style' => 'warning',
					    'desc' => esc_html__('STICKY HEADER OPTIONS', 'ninzio-addons')
					),

					array(
						'id'       =>'h3-fixed',
						'type'     => 'switch',
						'title'    => esc_html__('Sticky header', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle sticky header', 'ninzio-addons'),
						"default"  => 0
					),

					array(
					    'id'   => 'h3-info-fixed-logo',
					    'type' => 'info',
					    'desc' => esc_html__('Upload .jpg, .png or .gif image that will be your logo.', 'ninzio-addons')
					),

					array(
						'id'       =>'h3-desk-fixed-logo',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Sticky Header logo upload', 'ninzio-addons'),
					),

					array(
						'id'       =>'h3-desk-fixed-logo-retina',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Sticky Header retina logo upload', 'ninzio-addons'),
					),

					array(
						'id'       =>'h3-header-fixed-social-links-color',
						'type'     => 'color',
						'title'    => esc_html__('sticky Header social links color', 'ninzio-addons'),
						'default'  => '#999999',
					),

					array(
						'id'       =>'h3-desk-fixed-back-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Sticky Header menu background color', 'ninzio-addons'),
					),

					array(
						'id'      =>'h3-desk-fixed-icons-version',
						'type'     => 'select',
						'title'    => esc_html__('Choose sticky header icons version', 'ninzio-addons'),
						'options'  => array(
							"dark"  => "Dark",
							"light" => "Light"
						),
						'default' => "dark"
					),

					array(
						'id'       =>'h3-desk-fixed-cart-bubble-back-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble background color', 'ninzio-addons'),
					),

					array(
						'id'       =>'h3-desk-fixed-cart-bubble-text-color',
						'type'     => 'color',
						'title'    => esc_html__('Header cart bubble text color', 'ninzio-addons'),
					),

					array(
						'id'       =>'h3-desk-fixed-menu-effect-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Sticky header menu effect color', 'ninzio-addons'),
					),

					array(
						'id'      =>'h3-desk-fixed-menu-color',
						'type'    => 'link_color',
						'title'   => esc_html__('Sticky header menu links color', 'ninzio-addons'),
						'active'   => false,
						'visited'  => false,
					)
				)
			);

			// Mobile header
			$this->sections[] = array(
				'title'      => esc_html__('Mobile header', 'ninzio-addons'),
			    'subsection' => true,
				'fields' => array(

					array(
						'id'       =>'mob-logo',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Mobile logo upload', 'ninzio-addons')
					),

					array(
						'id'       =>'mob-logo-retina',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__('Mobile retina logo upload', 'ninzio-addons')
					)
				)
			);

			// Footer
			$this->sections[] = array(
				'title'      => esc_html__('Footer', 'ninzio-addons'),
				'fields' => array(

					array(
						'id'       =>'footer-copy',
						'type'     => 'textarea',
						'title'    => __('Footer copyright', 'ninzio-addons'),
					),

					array(
						'id'       =>'footer-social',
						'type'     => 'switch',
						'title'    => esc_html__('Toggle social links in footer', 'ninzio-addons'),
						"default"  => 0
					)
				)
			);

			// Styling
			$this->sections[] = array(
				'title'      => esc_html__('Styling', 'ninzio-addons'),
				'fields' => array(

					array(
						'id'       =>'main-color',
						'type'     => 'color',
						'title'    => esc_html__('Main color', 'ninzio-addons'),
						'default'  => '#8cc443',
					),

					array(
						'id'       =>'site-background',
						'type'     => 'background',
						'title'    => esc_html__('Site background options', 'ninzio-addons'),
					),

					array(
			            'id'       => 'custom-css',
			            'type'     => 'ace_editor',
						'mode'     => 'css',
						'theme'    => 'monokai',
			            'title'    => esc_html__('Custom CSS Styles', 'ninzio-addons'),
			            'subtitle' => esc_html__('Enter custom css code here.', 'ninzio-addons'),
			        ),
				)
			);

			// Typography
			$this->sections[] = array(
				'title'      => esc_html__('Typography', 'ninzio-addons'),
				'fields' => array(

					array(
						'id'       =>'main-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Main typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => true,
						'subsets'        => false,
						'text-transform' => false,
						'letter-spacing' => false,
						'font-style'     => false,
						'font-weight'    => false,
						'color'          => false,
						'text-align'     => false,
						'font-family'    => true,
						'all_styles'     => false,
						'default'     => array(
							'font-family'    => 'Arial, Helvetica, sans-serif',
					        'font-size'      => '13px',
					        'line-height'    => '22px'
					    )
					),

					array(
						'id'       =>'headings-typo',
						'type'     => 'typography',
						'title'    => esc_html__('Headings typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => true,
						'subsets'        => false,
						'text-transform' => true,
						'letter-spacing' => false,
						'line-height'    => false,
						'font-style'     => false,
						'font-size'      => false,
						'font-weight'    => false,
						'color'          => false,
						'text-align'     => false,
						'font-family'    => true,
						'all_styles'     => false,
						'default'     => array(
					        'text-transform' => 'none'
					    )
					),

					array(
						'id'       =>'h1-typo',
						'type'     => 'typography',
						'title'    => esc_html__('H1 typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => false,
						'subsets'        => false,
						'text-transform' => false,
						'letter-spacing' => false,
						'line-height'    => true,
						'font-style'     => false,
						'font-size'      => true,
						'font-weight'    => false,
						'color'          => false,
						'text-align'     => false,
						'font-family'    => false,
						'default'     => array(
					        'font-size'   => '24px',
					        'line-height' => '34px'
					    )
					),

					array(
						'id'       =>'h2-typo',
						'type'     => 'typography',
						'title'    => esc_html__('H2 typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => false,
						'subsets'        => false,
						'text-transform' => false,
						'letter-spacing' => false,
						'line-height'    => true,
						'font-style'     => false,
						'font-size'      => true,
						'font-weight'    => false,
						'color'          => false,
						'text-align'     => false,
						'font-family'    => false,
						'default'     => array(
					        'font-size'   => '22px',
					        'line-height' => '32px'
					    )
					),

					array(
						'id'       =>'h3-typo',
						'type'     => 'typography',
						'title'    => esc_html__('H3 typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => false,
						'subsets'        => false,
						'text-transform' => false,
						'letter-spacing' => false,
						'line-height'    => true,
						'font-style'     => false,
						'font-size'      => true,
						'font-weight'    => false,
						'color'          => false,
						'text-align'     => false,
						'font-family'    => false,
						'default'     => array(
					        'font-size'   => '20px',
					        'line-height' => '30px'
					    )
					),

					array(
						'id'       =>'h4-typo',
						'type'     => 'typography',
						'title'    => esc_html__('H4 typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => false,
						'subsets'        => false,
						'text-transform' => false,
						'letter-spacing' => false,
						'line-height'    => true,
						'font-style'     => false,
						'font-size'      => true,
						'font-weight'    => false,
						'color'          => false,
						'text-align'     => false,
						'font-family'    => false,
						'default'     => array(
					        'font-size'   => '18px',
					        'line-height' => '28px'
					    )
					),

					array(
						'id'       =>'h5-typo',
						'type'     => 'typography',
						'title'    => esc_html__('H5 typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => false,
						'subsets'        => false,
						'text-transform' => false,
						'letter-spacing' => false,
						'line-height'    => true,
						'font-style'     => false,
						'font-size'      => true,
						'font-weight'    => false,
						'color'          => false,
						'text-align'     => false,
						'font-family'    => false,
						'default'     => array(
					        'font-size'   => '16px',
					        'line-height' => '26px'
					    )
					),

					array(
						'id'       =>'h6-typo',
						'type'     => 'typography',
						'title'    => esc_html__('H6 typography', 'ninzio-addons'),
						'units'          => 'px',
						'google'         => false,
						'subsets'        => false,
						'text-transform' => false,
						'letter-spacing' => false,
						'line-height'    => true,
						'font-style'     => false,
						'font-weight'    => false,
						'font-size'      => true,
						'color'          => false,
						'text-align'     => false,
						'font-family'    => false,
						'default'     => array(
					        'font-size'   => '14px',
					        'line-height' => '24px'
					    )
					),

					array(
		                'id'        => 'custom-fonts',
		                'type'      => 'media',
		                'title'     => esc_html__('Upload custom fonts', 'ninzio-addons'),
		                'subtitle'  => esc_html__('Upload custom fonts here (eot, woff,truetype, svg formats)', 'ninzio-addons'),
		                'compiler'  => 'true',
		                'mode'      => false
		            ),

		            array(
			            'id'       => 'font-custom-css',
			            'type'     => 'ace_editor',
						'mode'     => 'css',
						'theme'    => 'monokai',
			            'title'    => esc_html__('Custom @font-face CSS Styles', 'ninzio-addons'),
			            'subtitle' => esc_html__('Enter custom @font-face css code here. Step by step instruction of custom font @font-face definitions can be found in help file (Customization >> Typography options)', 'ninzio-addons'),
			        ),

				)
			);

			// Social
			$this->sections[] = array(
				'title'      => esc_html__('Social', 'ninzio-addons'),
				'fields'     => array(

					array(
						'id'      =>'tweets-consumer-key',
						'type'     => 'text',
						'title'    => esc_html__('Recent tweets consumer key', 'ninzio-addons'),
						'default'  => ''
					),

					array(
						'id'      =>'tweets-consumer-secret',
						'type'     => 'text',
						'title'    => esc_html__('Recent tweets consumer secret', 'ninzio-addons'),
						'subtitle' => esc_html__('Enter your consumer key here', 'ninzio-addons'),
						'default'  => ''
					),

					array(
						'id'      =>'tweets-access-token',
						'type'     => 'text',
						'title'    => esc_html__('Recent tweets access token', 'ninzio-addons'),
						'subtitle' => esc_html__('Enter your access token here', 'ninzio-addons'),
						'default'  => ''
					),

					array(
						'id'      =>'tweets-access-token-secret',
						'type'     => 'text',
						'title'    => esc_html__('Recent tweets access token secret', 'ninzio-addons'),
						'subtitle' => esc_html__('Enter your access token secret here', 'ninzio-addons'),
						'default'  => ''
					),

					array(
						'id'      =>'social-rss',
						'type'     => 'text',
						'title'    => __('RSS Feed URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-facebook',
						'type'     => 'text',
						'title'    => __('Facebook URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-twitter',
						'type'     => 'text',
						'title'    => __('Twitter URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-googleplus',
						'type'     => 'text',
						'title'    => __('Google Plus URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-youtube',
						'type'     => 'text',
						'title'    => __('Yotube URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-vimeo',
						'type'     => 'text',
						'title'    => __('Vimeo URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-linkedin',
						'type'     => 'text',
						'title'    => __('LinkedIn URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-pinterest',
						'type'     => 'text',
						'title'    => __('Pinterest URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-flickr',
						'type'     => 'text',
						'title'    => __('Flickr URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-instagram',
						'type'     => 'text',
						'title'    => __('Instagram URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-apple',
						'type'     => 'text',
						'title'    => __('Apple URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-dribbble',
						'type'     => 'text',
						'title'    => __('Dribbble URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-android',
						'type'     => 'text',
						'title'    => __('Android URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-behance',
						'type'     => 'text',
						'title'    => __('Behance URL', 'ninzio-addons'),
						'validate' => 'url',
						'default'  => ''
					),

					array(
						'id'      =>'social-email',
						'type'     => 'text',
						'title'    => __('Email URL', 'ninzio-addons'),
						'default'  => ''
					)
				)
			);

			// Blog
			$this->sections[] = array(
				'title'      => esc_html__('Blog', 'ninzio-addons'),
				'fields' => array(

					array(
						'id'      =>'blog-title',
						'type'     => 'text',
						'title'    => esc_html__('Blog title', 'ninzio-addons'),
						'default'  => 'Blog',
					),

					array(
						'id'       =>'blog_rh_back',
						'type'     => 'background',
						'title'    => esc_html__('Blog page title options', 'ninzio-addons'),
					),

					array(
						'id'       =>'blog_rh_text_color',
						'type'     => 'color',
						'title'    => esc_html__('Blog page title color', 'ninzio-addons'),
					),

					array(
						'id'       =>'blog_rh_text_back_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Blog page title background color', 'ninzio-addons'),
						'subtitle' => esc_html__('Available only for Page title section version 2. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'      =>'blog_breadcrumbs_icon',
						'type'     => 'select',
						'title'    => esc_html__('Choose breadcrumbs icons version', 'ninzio-addons'),
						'options'  => array(
							"dark"  => "Dark",
							"light" => "Light"
						),
						'default' => "dark",
						'subtitle' => esc_html__('Available only for Page title section version 1. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'       =>'blog_breadcrumbs_text_color',
						'type'     => 'color',
						'title'    => esc_html__('Blog breadcrumbs text color', 'ninzio-addons'),
					),

					array(
						'id'       =>'blog_breadcrumbs_back_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Blog breadcrumbs background color', 'ninzio-addons'),
						'subtitle' => esc_html__('Available only for Page title section version 2. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'      =>'blog-parallax',
						'type'    => 'switch',
						'title'   => esc_html__('Parallax effect for blog page header section', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'blog-layout',
						'type'     => 'select',
						'title'    => esc_html__('Choose blog layout', 'ninzio-addons'),
						'options'  => array(
							"small"   => "1/4",
							"medium"  => "1/3",
							"large"   => "1/2",
							"list"    => "List",
							"standard"    => "Standard",
						),
						'default' => "medium",
					),

					array(
						'id'      =>'blog-animation',
						'type'    =>'switch',
						'title'   => esc_html__('Blog posts animation in archive', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle blog posts animation in archive', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'blog-wa',
						'type'    =>'switch',
						'title'   => esc_html__('Blog widget area', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle blog widget area in blog archive page', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'blog-was',
						'type'    =>'switch',
						'title'   => esc_html__('Blog single post widget area', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle blog single post widget area', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'blog-comments',
						'type'    =>'switch',
						'title'   => esc_html__('Comment box', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle comments on single post page (after post, there is a "Leave a comment" section)', 'ninzio-addons'),
						"default" => 1,
					),

					array(
						'id'      =>'blog-rp',
						'type'    => 'switch',
						'title'   => esc_html__('Toggle related posts in single post page', 'ninzio-addons'),
						"default" => 1,
					)
				)
			);

			// Projects
			$this->sections[] = array(
				'title'      => esc_html__('Projects', 'ninzio-addons'),
				'fields' => array(

					array(
						'id'      =>'projects-title',
						'type'    => 'text',
						'title'   => esc_html__('Projects title', 'ninzio-addons'),
						'default' => 'Projects'
					),

					array(
						'id'       =>'project_rh_back',
						'type'     => 'background',
						'title'    => esc_html__('Project page title options', 'ninzio-addons'),
					),

					array(
						'id'       =>'project_rh_text_color',
						'type'     => 'color',
						'title'    => esc_html__('Project page title color', 'ninzio-addons'),
					),

					array(
						'id'       =>'project_rh_text_back_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Project page title background color', 'ninzio-addons'),
						'subtitle' => esc_html__('Available only for Page title section version 2. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'      =>'project_breadcrumbs_icon',
						'type'     => 'select',
						'title'    => esc_html__('Choose breadcrumbs icons version', 'ninzio-addons'),
						'options'  => array(
							"dark"  => "Dark",
							"light" => "Light"
						),
						'default' => "dark",
						'subtitle' => esc_html__('Available only for Page title section version 1. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'       =>'project_breadcrumbs_text_color',
						'type'     => 'color',
						'title'    => esc_html__('Project breadcrumbs text color', 'ninzio-addons'),
					),

					array(
						'id'       =>'project_breadcrumbs_back_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Project breadcrumbs background color', 'ninzio-addons'),
						'subtitle' => esc_html__('Available only for Page title section version 2. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'      =>'project-parallax',
						'type'    => 'switch',
						'title'   => esc_html__('Parallax effect for project page header section', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'projects-slug',
						'type'     => 'text',
						'title'    => esc_html__('Projects slug', 'ninzio-addons'),
						'subtitle' => esc_html__('Enter projects slug here', 'ninzio-addons'),
						'default'  => 'projects'
					),

					array(
						'id'      =>'projects-cat-slug',
						'type'     => 'text',
						'title'    => esc_html__('Projects category slug', 'ninzio-addons'),
						'subtitle' => esc_html__('Enter projects category slug here', 'ninzio-addons'),
						'default'  => 'projects-category'
					),

					array(
						'id'      =>'projects-tag-slug',
						'type'     => 'text',
						'title'    => esc_html__('Projects tag slug', 'ninzio-addons'),
						'subtitle' => esc_html__('Enter projects tag slug here', 'ninzio-addons'),
						'default'  => 'projects-tag'
					),

					array(
						'id'      =>'projects-layout',
						'type'     => 'select',
						'title'    => esc_html__('Choose projects layout', 'ninzio-addons'),
						'options'  => array(
							"small-standard"     => "1/4 -standard",
							"medium-standard"    => "1/3 -standard",
							"large-standard"     => "1/2 -standard",
							"small-image"        => "1/4 -image",
							"medium-image"       => "1/3 -image",
							"large-image"        => "1/2 -image",
							"small-image-nogap"  => "1/4 -image no gap",
							"medium-image-nogap" => "1/3 -image no gap",
						),
						'default' => "small-image-nogap",
					),

					array(
						'id'      =>'projects-filter',
						'type'    =>'switch',
						'title'   => esc_html__('Projects filter', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle projects filter', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'projects-animation',
						'type'    =>'switch',
						'title'   => esc_html__('Projects posts animation in archive', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle projects posts animation in archive', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'projects-pagination',
						'type'    =>'switch',
						'title'   => esc_html__('Projects pagination in archive', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'projects-ss',
						'type'    =>'switch',
						'title'   => esc_html__('Social sharing', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle social sharing on single project page', 'ninzio-addons'),
						"default" => 1
					),

					array(
						'id'      =>'projects-rp',
						'type'    => 'switch',
						'title'   => esc_html__('Toggle related projects in single project page', 'ninzio-addons'),
						"default" => 1,
					),

					array(
						'id'       =>'projects-rpn',
						'type'     => 'select',
						'title'    => esc_html__('Single project related projects number', 'ninzio-addons'),
						'options'  => array(
							'3' =>'3',
							'4' =>'4'
						),
						'default'  => '4',
					)
				)
			);

			// Commerce
			$this->sections[] = array(
				'title'      => esc_html__('Woocommerce', 'ninzio-addons'),
				'fields' => array(

					array(
						'id'      =>'shop-title',
						'type'    => 'text',
						'title'   => esc_html__('Shop title', 'ninzio-addons'),
						'default' => 'Shop'
					),

					array(
						'id'       =>'shop_rh_back',
						'type'     => 'background',
						'title'    => esc_html__('Shop page title options', 'ninzio-addons'),
					),

					array(
						'id'       =>'shop_rh_text_color',
						'type'     => 'color',
						'title'    => esc_html__('Shop page title color', 'ninzio-addons'),
					),

					array(
						'id'       =>'shop_rh_text_back_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Shop page title background color', 'ninzio-addons'),
						'subtitle' => esc_html__('Available only for Page title section version 2. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'      =>'shop_breadcrumbs_icon',
						'type'     => 'select',
						'title'    => esc_html__('Choose breadcrumbs icons version', 'ninzio-addons'),
						'options'  => array(
							"dark"  => "Dark",
							"light" => "Light"
						),
						'default' => "dark",
						'subtitle' => esc_html__('Available only for Page title section version 1. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'       =>'shop_breadcrumbs_text_color',
						'type'     => 'color',
						'title'    => esc_html__('Shop breadcrumbs text color', 'ninzio-addons'),
					),

					array(
						'id'       =>'shop_breadcrumbs_back_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('Shop breadcrumbs background color', 'ninzio-addons'),
						'subtitle' => esc_html__('Available only for Page title section version 2. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'      =>'shop-parallax',
						'type'    => 'switch',
						'title'   => esc_html__('Parallax effect for shop page header section', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'shop-layout',
						'type'     => 'select',
						'title'    => esc_html__('Choose shop layout', 'ninzio-addons'),
						'options'  => array(
							"small"   => "1/4",
							"medium"  => "1/3",
						),
						'default' => "medium",
					),

					array(
						'id'       =>'shop-sidebar',
						'type'     => 'select',
						'title'    => esc_html__('Shop sidebar', 'ninzio-addons'),
						'subtitle' => esc_html__('Select sidebar for shop', 'ninzio-addons'),
						'options'  => array(
							'none'  =>'none',
							'left'  =>'left',
							'right' =>'right'
						),
						'default'  => 'none',
					),

					array(
						'id'       =>'shop-sidebar-single',
						'type'     => 'select',
						'title'    => esc_html__('Shop sidebar in single product page', 'ninzio-addons'),
						'subtitle' => esc_html__('Select sidebar for shop single product page', 'ninzio-addons'),
						'options'  => array(
							'none'  =>'none',
							'left'  =>'left',
							'right' =>'right'
						),
						'default'  => 'none',
					),

					array(
						'id'      =>'shop-animation',
						'type'    =>'switch',
						'title'   => esc_html__('Shop posts animation in archive', 'ninzio-addons'),
						'subtitle' => esc_html__('Toggle shop products animation in archive', 'ninzio-addons'),
						"default" => 0,
					),

					array(
						'id'      =>'shop-rp',
						'type'    => 'switch',
						'title'   => esc_html__('Toggle related products in single product page', 'ninzio-addons'),
						"default" => 1,
					),

					array(
						'id'       =>'shop-rpn',
						'type'     => 'select',
						'title'    => esc_html__('Single product related products number', 'ninzio-addons'),
						'options'  => array(
							'3' =>'3',
							'4' =>'4'
						),
						'default'  => '4',
					)
				)
			);

			// 404/Search
			$this->sections[] = array(
				'title'      => esc_html__('404/Search', 'ninzio-addons'),
				'fields' => array(

					array(
						'id'       =>'tech_rh_back',
						'type'     => 'background',
						'title'    => esc_html__('404/Search page title options', 'ninzio-addons'),
					),

					array(
						'id'       =>'tech_rh_text_color',
						'type'     => 'color',
						'title'    => esc_html__('404/Search page title color', 'ninzio-addons'),
					),

					array(
						'id'       =>'tech_rh_text_back_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('404/Search page title background color', 'ninzio-addons'),
						'subtitle' => esc_html__('Available only for Page title section version 2. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'      =>'tech_breadcrumbs_icon',
						'type'     => 'select',
						'title'    => esc_html__('Choose breadcrumbs icons version', 'ninzio-addons'),
						'options'  => array(
							"dark"  => "Dark",
							"light" => "Light"
						),
						'default' => "dark",
						'subtitle' => esc_html__('Available only for Page title section version 1. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'       =>'tech_breadcrumbs_text_color',
						'type'     => 'color',
						'title'    => esc_html__('404/Search breadcrumbs text color', 'ninzio-addons'),
					),

					array(
						'id'       =>'tech_breadcrumbs_back_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__('404/Search breadcrumbs background color', 'ninzio-addons'),
						'subtitle' => esc_html__('Available only for Page title section version 2. (Theme options >> General >> Page title section)', 'ninzio-addons'),
					),

					array(
						'id'      =>'tech-parallax',
						'type'    => 'switch',
						'title'   => esc_html__('Parallax effect for tech page header section', 'ninzio-addons'),
						"default" => 0,
					)

				)
			);

			$theme_info  = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . esc_html__('<strong>Theme URL:</strong> ', 'ninzio-addons') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . esc_html__('<strong>Author:</strong> ', 'ninzio-addons') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . esc_html__('<strong>Version:</strong> ', 'ninzio-addons') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . esc_html__('<strong>Tags:</strong> ', 'ninzio-addons') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';

        }

        public function setArguments() {

            $theme = wp_get_theme();

            $this->args = array(
                'opt_name'          => 'focuson_ninzio',
                'display_name'      => $theme->get('Name'),
                'display_version'   => $theme->get('Version'),
                'menu_type'         => 'submenu',
                'allow_sub_menu'    => true,
                'menu_title'        => esc_html__('Theme Settings', 'ninzio-addons'),
                'page_title'        => esc_html__('Theme Settings', 'ninzio-addons'),
                'google_api_key'    => '',
                'async_typography'  => true,
                'admin_bar'         => true,
                'global_variable'   => 'focuson_ninzio',
                'dev_mode'          => false,
                'disable_tracking'  => true,
                'update_notice'     => false,
                'customizer'        => false,
                'page_priority'     => null,
                'page_parent'       => 'themes.php',
                'page_permissions'  => 'manage_options',
                'page_slug'         => 'focuson_ninzio_options',
                'save_defaults'     => true,
                'default_show'      => false,
                'default_mark'      => '',
                'system_info'       => false,
            );
        }

	}

	global $reduxConfig;
    $reduxConfig = new Redux_Framework_config();
}
