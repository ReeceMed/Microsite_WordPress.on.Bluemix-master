<?php

	focuson_ninzio_global_variables();
	$nz_layout         		= (isset($GLOBALS['focuson_ninzio']['layout']) && !empty($GLOBALS['focuson_ninzio']['layout']) ) ? $GLOBALS['focuson_ninzio']['layout'] : "wide";
	$nz_header_version 		= (isset($GLOBALS['focuson_ninzio']['header-version']) && !empty($GLOBALS['focuson_ninzio']['header-version'])) ? $GLOBALS['focuson_ninzio']['header-version'] : 'version1';
	$nz_woo_cart       	 	= "false";
	$nz_one_page_navigation = (isset($GLOBALS['focuson_ninzio']['one-page-navigation']) && !empty($GLOBALS['focuson_ninzio']['one-page-navigation'])) ? $GLOBALS['focuson_ninzio']['one-page-navigation'] : 'top';

	$nz_mob_logo            = (isset($GLOBALS['focuson_ninzio']['mob-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['mob-logo']['url'])) ? esc_url($GLOBALS['focuson_ninzio']['mob-logo']['url']) : '';
	if (isset($GLOBALS['focuson_ninzio']['mob-logo-retina']['url']) && !empty($GLOBALS['focuson_ninzio']['mob-logo-retina']['url'])) {$nz_mob_logo = esc_url($GLOBALS['focuson_ninzio']['mob-logo-retina']['url']);}

	$nz_mob_logo_w          = (isset($GLOBALS['focuson_ninzio']['mob-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['mob-logo']['url'])) ? $GLOBALS['focuson_ninzio']['mob-logo']['width'] : '';
	$nz_mob_logo_h          = (isset($GLOBALS['focuson_ninzio']['mob-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['mob-logo']['url'])) ? $GLOBALS['focuson_ninzio']['mob-logo']['height'] : '';


	// VERSION 1 OPTIONS
		
		$nz_h1_desk_logo                 = (isset($GLOBALS['focuson_ninzio']['h1-desk-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-logo']['url'])) ? esc_url($GLOBALS['focuson_ninzio']['h1-desk-logo']['url']) : "";
		if (isset($GLOBALS['focuson_ninzio']['h1-desk-logo-retina']['url']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-logo-retina']['url'])) 
		{$nz_h1_desk_logo = esc_url($GLOBALS['focuson_ninzio']['h1-desk-logo-retina']['url']);}
		$nz_h1_desk_logo_w               = (isset($GLOBALS['focuson_ninzio']['h1-desk-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h1-desk-logo']['width']: "";
		$nz_h1_desk_logo_h               = (isset($GLOBALS['focuson_ninzio']['h1-desk-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h1-desk-logo']['height'] : "";
		
		$nz_h1_desk_fixed_logo                 = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo']['url'])) ? esc_url($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo']['url']) : $nz_h1_desk_logo;
		if (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo-retina']['url']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo-retina']['url'])) 
		{$nz_h1_desk_fixed_logo = esc_url($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo-retina']['url']);}
		$nz_h1_desk_fixed_logo_w               = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h1-desk-fixed-logo']['width']: $nz_h1_desk_logo_w;
		$nz_h1_desk_fixed_logo_h               = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-fixed-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h1-desk-fixed-logo']['height'] : $nz_h1_desk_logo_h;
		
		$nz_h1_stucked                   = (isset($GLOBALS['focuson_ninzio']['h1-stucked']) && $GLOBALS['focuson_ninzio']['h1-stucked'] == 1) ? "true" : "false";
		$nz_h1_header_top                = (isset($GLOBALS['focuson_ninzio']['h1-header-top']) && $GLOBALS['focuson_ninzio']['h1-header-top'] == 1) ? "true" : "false";
		$nz_h1_header_top_social_links   = (isset($GLOBALS['focuson_ninzio']['h1-header-top-social-links']) && $GLOBALS['focuson_ninzio']['h1-header-top-social-links'] == 1) ? "true" : "false";
		$nz_h1_desk_search               = (isset($GLOBALS['focuson_ninzio']['h1-desk-search']) && $GLOBALS['focuson_ninzio']['h1-desk-search'] == 1) ? "true" : "false";
		$nz_h1_desk_shop_cart            = (isset($GLOBALS['focuson_ninzio']['h1-desk-shop-cart']) && $GLOBALS['focuson_ninzio']['h1-desk-shop-cart'] == 1) ? "true" : "false";
		$nz_h1_desk_icons_version        = (isset($GLOBALS['focuson_ninzio']['h1-desk-icons-version']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-icons-version'])) ? $GLOBALS['focuson_ninzio']['h1-desk-icons-version'] : "dark";
		$nz_h1_desk_menu_effect          = (isset($GLOBALS['focuson_ninzio']['h1-desk-menu-effect']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-menu-effect'])) ? $GLOBALS['focuson_ninzio']['h1-desk-menu-effect'] : "underline";
		$nz_h1_fixed                     = (isset($GLOBALS['focuson_ninzio']['h1-fixed']) && $GLOBALS['focuson_ninzio']['h1-fixed'] == 1) ? "true" : "false";
		$nz_h1_desk_fixed_icons_version  = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-icons-version']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-fixed-icons-version'])) ? $GLOBALS['focuson_ninzio']['h1-desk-fixed-icons-version'] : $nz_h1_desk_icons_version;
		$nz_h1_desk_submenu_effect       = (isset($GLOBALS['focuson_ninzio']['h1-desk-submenu-effect']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-submenu-effect'])) ? $GLOBALS['focuson_ninzio']['h1-desk-submenu-effect'] : "ghost";

	// VERSION 2 OPTIONS
		
		$nz_h2_desk_logo                 = (isset($GLOBALS['focuson_ninzio']['h2-desk-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-logo']['url'])) ? esc_url($GLOBALS['focuson_ninzio']['h2-desk-logo']['url']) : "";
		if (isset($GLOBALS['focuson_ninzio']['h2-desk-logo-retina']['url']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-logo-retina']['url'])) 
		{$nz_h2_desk_logo = esc_url($GLOBALS['focuson_ninzio']['h2-desk-logo-retina']['url']);}
		$nz_h2_desk_logo_w               = (isset($GLOBALS['focuson_ninzio']['h2-desk-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h2-desk-logo']['width']: "";
		$nz_h2_desk_logo_h               = (isset($GLOBALS['focuson_ninzio']['h2-desk-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h2-desk-logo']['height'] : "";
		
		$nz_h2_stucked                   = (isset($GLOBALS['focuson_ninzio']['h2-stucked']) && $GLOBALS['focuson_ninzio']['h2-stucked'] == 1) ? "true" : "false";
		$nz_h2_header_top_social_links   = (isset($GLOBALS['focuson_ninzio']['h2-header-top-social-links']) && $GLOBALS['focuson_ninzio']['h2-header-top-social-links'] == 1) ? "true" : "false";
		$nz_h2_desk_search               = (isset($GLOBALS['focuson_ninzio']['h2-desk-search']) && $GLOBALS['focuson_ninzio']['h2-desk-search'] == 1) ? "true" : "false";
		$nz_h2_desk_shop_cart            = (isset($GLOBALS['focuson_ninzio']['h2-desk-shop-cart']) && $GLOBALS['focuson_ninzio']['h2-desk-shop-cart'] == 1) ? "true" : "false";
		$nz_h2_desk_icons_version        = (isset($GLOBALS['focuson_ninzio']['h2-desk-icons-version']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-icons-version'])) ? $GLOBALS['focuson_ninzio']['h2-desk-icons-version'] : "dark";
		$nz_h2_desk_menu_effect          = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-effect']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-menu-effect'])) ? $GLOBALS['focuson_ninzio']['h2-desk-menu-effect'] : "underline";
		$nz_h2_fixed                     = (isset($GLOBALS['focuson_ninzio']['h2-fixed']) && $GLOBALS['focuson_ninzio']['h2-fixed'] == 1) ? "true" : "false";
		$nz_h2_desk_submenu_effect       = (isset($GLOBALS['focuson_ninzio']['h2-desk-submenu-effect']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-submenu-effect'])) ? $GLOBALS['focuson_ninzio']['h2-desk-submenu-effect'] : "ghost";

	// VERSION 3 OPTIONS
		
		$nz_h3_desk_logo                 = (isset($GLOBALS['focuson_ninzio']['h3-desk-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-logo']['url'])) ? esc_url($GLOBALS['focuson_ninzio']['h3-desk-logo']['url']) : "";
		if (isset($GLOBALS['focuson_ninzio']['h3-desk-logo-retina']['url']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-logo-retina']['url'])) 
		{$nz_h3_desk_logo = esc_url($GLOBALS['focuson_ninzio']['h3-desk-logo-retina']['url']);}
		$nz_h3_desk_logo_w               = (isset($GLOBALS['focuson_ninzio']['h3-desk-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h3-desk-logo']['width']: "";
		$nz_h3_desk_logo_h               = (isset($GLOBALS['focuson_ninzio']['h3-desk-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h3-desk-logo']['height'] : "";
		
		$nz_h3_desk_fixed_logo                 = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo']['url'])) ? esc_url($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo']['url']) : $nz_h3_desk_logo;
		if (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo-retina']['url']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo-retina']['url'])) 
		{$nz_h3_desk_fixed_logo = esc_url($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo-retina']['url']);}
		$nz_h3_desk_fixed_logo_w               = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h3-desk-fixed-logo']['width']: $nz_h3_desk_logo_w;
		$nz_h3_desk_fixed_logo_h               = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo']['url']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-fixed-logo']['url'])) ? $GLOBALS['focuson_ninzio']['h3-desk-fixed-logo']['height'] : $nz_h3_desk_logo_h;
		
		$nz_h3_header_social_links       = (isset($GLOBALS['focuson_ninzio']['h3-header-social-links']) && $GLOBALS['focuson_ninzio']['h3-header-social-links'] == 1) ? "true" : "false";
		$nz_h3_desk_search               = (isset($GLOBALS['focuson_ninzio']['h3-desk-search']) && $GLOBALS['focuson_ninzio']['h3-desk-search'] == 1) ? "true" : "false";
		$nz_h3_desk_shop_cart            = (isset($GLOBALS['focuson_ninzio']['h3-desk-shop-cart']) && $GLOBALS['focuson_ninzio']['h3-desk-shop-cart'] == 1) ? "true" : "false";
		$nz_h3_desk_icons_version        = (isset($GLOBALS['focuson_ninzio']['h3-desk-icons-version']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-icons-version'])) ? $GLOBALS['focuson_ninzio']['h3-desk-icons-version'] : "dark";
		$nz_h3_desk_menu_effect          = (isset($GLOBALS['focuson_ninzio']['h3-desk-menu-effect']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-menu-effect'])) ? $GLOBALS['focuson_ninzio']['h3-desk-menu-effect'] : "underline";
		$nz_h3_fixed                     = (isset($GLOBALS['focuson_ninzio']['h3-fixed']) && $GLOBALS['focuson_ninzio']['h3-fixed'] == 1) ? "true" : "false";
		$nz_h3_desk_fixed_icons_version  = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-icons-version']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-fixed-icons-version'])) ? $GLOBALS['focuson_ninzio']['h3-desk-fixed-icons-version'] : $nz_h3_desk_icons_version;
		$nz_h3_desk_submenu_effect       = (isset($GLOBALS['focuson_ninzio']['h3-desk-submenu-effect']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-submenu-effect'])) ? $GLOBALS['focuson_ninzio']['h3-desk-submenu-effect'] : "ghost";

	$desk_class  = "header desk ".$nz_header_version;


	if (is_page()) {

		$values = get_post_custom( get_the_ID() );
		if (isset($values['one_page'][0]) && $values['one_page'][0] == "true") {
			$desk_class  = "header desk ".$nz_header_version." one-page-".$nz_one_page_navigation;
		}

	}


	if ($nz_header_version == "version1") {
		$desk_class .=" stuck-".$nz_h1_stucked;
		$desk_class .=" top-".$nz_h1_header_top;
		$desk_class .=" sl-".$nz_h1_header_top_social_links;
		$desk_class .=" search-".$nz_h1_desk_search;
		$desk_class .=" cart-".$nz_h1_desk_shop_cart;
		$desk_class .=" iversion-".$nz_h1_desk_icons_version;
		$desk_class .=" effect-".$nz_h1_desk_menu_effect;
		$desk_class .=" subeffect-".$nz_h1_desk_submenu_effect;
		$desk_class .=" fixed-".$nz_h1_fixed;
		$desk_class .=" fiversion-".$nz_h1_desk_fixed_icons_version;
	} elseif ($nz_header_version == "version2") {
		$desk_class .=" stuck-".$nz_h2_stucked;
		$desk_class .=" sl-".$nz_h2_header_top_social_links;
		$desk_class .=" search-".$nz_h2_desk_search;
		$desk_class .=" cart-".$nz_h2_desk_shop_cart;
		$desk_class .=" iversion-".$nz_h2_desk_icons_version;
		$desk_class .=" effect-".$nz_h2_desk_menu_effect;
		$desk_class .=" subeffect-".$nz_h2_desk_submenu_effect;
		$desk_class .=" fixed-".$nz_h2_fixed;
	} else {
		$desk_class .=" sl-".$nz_h3_header_social_links;
		$desk_class .=" search-".$nz_h3_desk_search;
		$desk_class .=" cart-".$nz_h3_desk_shop_cart;
		$desk_class .=" iversion-".$nz_h3_desk_icons_version;
		$desk_class .=" effect-".$nz_h3_desk_menu_effect;
		$desk_class .=" subeffect-".$nz_h3_desk_submenu_effect;
		$desk_class .=" fixed-".$nz_h3_fixed;
		$desk_class .=" fiversion-".$nz_h3_desk_fixed_icons_version;
	}

	$mobarg = array( 
		'theme_location' => 'header-menu', 
		'depth'          => 3, 
		'container'      => false, 
		'menu_id'        => 'mob-header-menu',
		'link_before'    => '<span class="mi"></span><span class="txt">',
		'link_after'     => '</span><span class="di icon-arrow-down9"></span>'
	);

	$arg = array( 
		'theme_location' => 'header-menu', 
		'depth'          => 3, 
		'container'      => false, 
		'menu_id'        => 'header-menu',
		'link_before'    => '<span class="mi"></span><span class="txt">',
		'link_after'     => '</span>',
		'walker'         => new nz_scm_walker
	);

	$arg_top = array( 
		'theme_location' => 'header-top-menu', 
		'depth'          => 2, 
		'container'      => false, 
		'menu_id'        => 'header-top-menu',
		'link_before'    => '<span class="mi"></span><span class="txt">',
		'link_after'     => '</span>'
	);

?>