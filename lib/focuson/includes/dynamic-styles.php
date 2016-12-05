
<?php

focuson_ninzio_global_variables();

/*	STYLING OPTIONS
/*-------------------------*/

	$GLOBALS['focuson_ninzio']['main-color'] = (isset($GLOBALS['focuson_ninzio']['main-color']) && !empty($GLOBALS['focuson_ninzio']['main-color'])) ? $GLOBALS['focuson_ninzio']['main-color'] : '#8cc443';

	$nz_site_back_col   = (isset($GLOBALS['focuson_ninzio']['site-background']['background-color']) && $GLOBALS['focuson_ninzio']['site-background']['background-color']) ? $GLOBALS['focuson_ninzio']['site-background']['background-color'] : "#ffffff";
	$nz_site_back_img   = (isset($GLOBALS['focuson_ninzio']['site-background']['background-image']) && $GLOBALS['focuson_ninzio']['site-background']['background-image']) ? esc_url($GLOBALS['focuson_ninzio']['site-background']['background-image']) : "";
	$nz_site_back_r     = (isset($GLOBALS['focuson_ninzio']['site-background']['background-repeat']) && $GLOBALS['focuson_ninzio']['site-background']['background-repeat']) ? $GLOBALS['focuson_ninzio']['site-background']['background-repeat'] : "no-repeat";
	$nz_site_back_s     = (isset($GLOBALS['focuson_ninzio']['site-background']['background-size']) && $GLOBALS['focuson_ninzio']['site-background']['background-size']) ? $GLOBALS['focuson_ninzio']['site-background']['background-size'] : "inherit";
	$nz_site_back_a     = (isset($GLOBALS['focuson_ninzio']['site-background']['background-attachment']) && $GLOBALS['focuson_ninzio']['site-background']['background-attachment']) ? $GLOBALS['focuson_ninzio']['site-background']['background-attachment'] : "inherit";
	$nz_site_back_p     = (isset($GLOBALS['focuson_ninzio']['site-background']['background-position']) && $GLOBALS['focuson_ninzio']['site-background']['background-position']) ? $GLOBALS['focuson_ninzio']['site-background']['background-position'] : "left top";

/*	TYPOGRAPHY
/*-------------------------*/

	$nz_main_font_size          = (isset($GLOBALS['focuson_ninzio']['main-typo']['font-size']) && $GLOBALS['focuson_ninzio']['main-typo']['font-size']) ? $GLOBALS['focuson_ninzio']['main-typo']['font-size'] : "13px";
	$nz_main_line_height        = (isset($GLOBALS['focuson_ninzio']['main-typo']['line-height']) && $GLOBALS['focuson_ninzio']['main-typo']['line-height']) ? $GLOBALS['focuson_ninzio']['main-typo']['line-height'] : "22px";
	$nz_main_font_family        = (isset($GLOBALS['focuson_ninzio']['main-typo']['font-family']) && $GLOBALS['focuson_ninzio']['main-typo']['font-family']) ? $GLOBALS['focuson_ninzio']['main-typo']['font-family'] : "Arial, Helvetica, sans-serif";
	$nz_headings_font_family    = (isset($GLOBALS['focuson_ninzio']['headings-typo']['font-family']) && $GLOBALS['focuson_ninzio']['headings-typo']['font-family']) ? $GLOBALS['focuson_ninzio']['headings-typo']['font-family'] : $nz_main_font_family;
	$nz_headings_text_transform = (isset($GLOBALS['focuson_ninzio']['headings-typo']['text-transform']) && $GLOBALS['focuson_ninzio']['headings-typo']['text-transform']) ? $GLOBALS['focuson_ninzio']['headings-typo']['text-transform'] : "none";
	$nz_h1_font_size            = (isset($GLOBALS['focuson_ninzio']['h1-typo']['font-size']) && $GLOBALS['focuson_ninzio']['h1-typo']['font-size']) ? $GLOBALS['focuson_ninzio']['h1-typo']['font-size'] : "28px";
	$nz_h1_line_height          = (isset($GLOBALS['focuson_ninzio']['h1-typo']['line-height']) && $GLOBALS['focuson_ninzio']['h1-typo']['line-height']) ? $GLOBALS['focuson_ninzio']['h1-typo']['line-height'] : "34px";
	$nz_h2_font_size            = (isset($GLOBALS['focuson_ninzio']['h2-typo']['font-size']) && $GLOBALS['focuson_ninzio']['h2-typo']['font-size']) ? $GLOBALS['focuson_ninzio']['h2-typo']['font-size'] : "26px";
	$nz_h2_line_height          = (isset($GLOBALS['focuson_ninzio']['h2-typo']['line-height']) && $GLOBALS['focuson_ninzio']['h2-typo']['line-height']) ? $GLOBALS['focuson_ninzio']['h2-typo']['line-height'] : "32px";
	$nz_h3_font_size            = (isset($GLOBALS['focuson_ninzio']['h3-typo']['font-size']) && $GLOBALS['focuson_ninzio']['h3-typo']['font-size']) ? $GLOBALS['focuson_ninzio']['h3-typo']['font-size'] : "24px";
	$nz_h3_line_height          = (isset($GLOBALS['focuson_ninzio']['h3-typo']['line-height']) && $GLOBALS['focuson_ninzio']['h3-typo']['line-height']) ? $GLOBALS['focuson_ninzio']['h3-typo']['line-height'] : "30px";
	$nz_h4_font_size            = (isset($GLOBALS['focuson_ninzio']['h4-typo']['font-size']) && $GLOBALS['focuson_ninzio']['h4-typo']['font-size']) ? $GLOBALS['focuson_ninzio']['h4-typo']['font-size'] : "22px";
	$nz_h4_line_height          = (isset($GLOBALS['focuson_ninzio']['h4-typo']['line-height']) && $GLOBALS['focuson_ninzio']['h4-typo']['line-height']) ? $GLOBALS['focuson_ninzio']['h4-typo']['line-height'] : "28px";
	$nz_h5_font_size            = (isset($GLOBALS['focuson_ninzio']['h5-typo']['font-size']) && $GLOBALS['focuson_ninzio']['h5-typo']['font-size']) ? $GLOBALS['focuson_ninzio']['h5-typo']['font-size'] : "20px";
	$nz_h5_line_height          = (isset($GLOBALS['focuson_ninzio']['h5-typo']['line-height']) && $GLOBALS['focuson_ninzio']['h5-typo']['line-height']) ? $GLOBALS['focuson_ninzio']['h5-typo']['line-height'] : "26px";
	$nz_h6_font_size            = (isset($GLOBALS['focuson_ninzio']['h6-typo']['font-size']) && $GLOBALS['focuson_ninzio']['h6-typo']['font-size']) ? $GLOBALS['focuson_ninzio']['h6-typo']['font-size'] : "18px";
	$nz_h6_line_height          = (isset($GLOBALS['focuson_ninzio']['h6-typo']['line-height']) && $GLOBALS['focuson_ninzio']['h6-typo']['line-height']) ? $GLOBALS['focuson_ninzio']['h6-typo']['line-height'] : "24px";

/*	HEADER
/*-------------------------*/

	// VERSION 1

	$nz_h1_header_top_back_color         = (isset($GLOBALS['focuson_ninzio']['h1-header-top-back-color']['color']) && $GLOBALS['focuson_ninzio']['h1-header-top-back-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h1-header-top-back-color']['color'],$GLOBALS['focuson_ninzio']['h1-header-top-back-color']['alpha']) : "#87c03f";
	$nz_h1_header_top_border_color       = (isset($GLOBALS['focuson_ninzio']['h1-header-top-border-color']['color']) && $GLOBALS['focuson_ninzio']['h1-header-top-border-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h1-header-top-border-color']['color'],$GLOBALS['focuson_ninzio']['h1-header-top-border-color']['alpha']) : "";
	$nz_h1_header_top_menu_color         = (isset($GLOBALS['focuson_ninzio']['h1-header-top-menu-color']) && !empty($GLOBALS['focuson_ninzio']['h1-header-top-menu-color'])) ? $GLOBALS['focuson_ninzio']['h1-header-top-menu-color'] : '#ffffff';
	$nz_h1_header_top_social_links_color = (isset($GLOBALS['focuson_ninzio']['h1-header-top-social-links-color']) && !empty($GLOBALS['focuson_ninzio']['h1-header-top-social-links-color'])) ? $GLOBALS['focuson_ninzio']['h1-header-top-social-links-color'] : '#ffffff';
	$nz_h1_top_button_text_color         = (isset($GLOBALS['focuson_ninzio']['h1-top-button-text-color']) && !empty($GLOBALS['focuson_ninzio']['h1-top-button-text-color'])) ? $GLOBALS['focuson_ninzio']['h1-top-button-text-color'] : '#999999';
	$nz_h1_top_button_back_color         = (isset($GLOBALS['focuson_ninzio']['h1-top-button-back-color']) && !empty($GLOBALS['focuson_ninzio']['h1-top-button-back-color'])) ? $GLOBALS['focuson_ninzio']['h1-top-button-back-color'] : '#ffffff';

	$nz_h1_desk_back_color               = (isset($GLOBALS['focuson_ninzio']['h1-desk-back-color']['color']) && $GLOBALS['focuson_ninzio']['h1-desk-back-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h1-desk-back-color']['color'],$GLOBALS['focuson_ninzio']['h1-desk-back-color']['alpha']) : "#ffffff";
	$nz_h1_desk_border_color             = (isset($GLOBALS['focuson_ninzio']['h1-desk-border-color']['color']) && $GLOBALS['focuson_ninzio']['h1-desk-border-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h1-desk-border-color']['color'],$GLOBALS['focuson_ninzio']['h1-desk-border-color']['alpha']) : "";
	$nz_h1_desk_menu_effect_color        = (isset($GLOBALS['focuson_ninzio']['h1-desk-menu-effect-color']['color']) && $GLOBALS['focuson_ninzio']['h1-desk-menu-effect-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h1-desk-menu-effect-color']['color'],$GLOBALS['focuson_ninzio']['h1-desk-menu-effect-color']['alpha']) : "#87c03f";
	$nz_h1_desk_menu_color_reg           = (isset($GLOBALS['focuson_ninzio']['h1-desk-menu-color']['regular']) && $GLOBALS['focuson_ninzio']['h1-desk-menu-color']['regular']) ? $GLOBALS['focuson_ninzio']['h1-desk-menu-color']['regular'] : "#999999";
	$nz_h1_desk_menu_color_hov           = (isset($GLOBALS['focuson_ninzio']['h1-desk-menu-color']['hover']) && $GLOBALS['focuson_ninzio']['h1-desk-menu-color']['hover']) ? $GLOBALS['focuson_ninzio']['h1-desk-menu-color']['hover'] : "#999999";
	$nz_h1_desk_submenu_back_color       = (isset($GLOBALS['focuson_ninzio']['h1-desk-submenu-back-color']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-submenu-back-color'])) ? $GLOBALS['focuson_ninzio']['h1-desk-submenu-back-color'] : '#292929';
	$nz_h1_desk_submenu_color_reg        = (isset($GLOBALS['focuson_ninzio']['h1-desk-submenu-color']['regular']) && $GLOBALS['focuson_ninzio']['h1-desk-submenu-color']['regular']) ? $GLOBALS['focuson_ninzio']['h1-desk-submenu-color']['regular'] : "#999999";
	$nz_h1_desk_submenu_color_hov        = (isset($GLOBALS['focuson_ninzio']['h1-desk-submenu-color']['hover']) && $GLOBALS['focuson_ninzio']['h1-desk-submenu-color']['hover']) ? $GLOBALS['focuson_ninzio']['h1-desk-submenu-color']['hover'] : "#ffffff";

	$nz_h1_desk_menu_m                   = (isset($GLOBALS['focuson_ninzio']['h1-desk-menu-m']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-menu-m'])) ? $GLOBALS['focuson_ninzio']['h1-desk-menu-m'] : '0';
	$nz_h1_desk_ls_w    	             = (isset($GLOBALS['focuson_ninzio']['h1-desk-lw']['width']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-lw']['width'])) ? $GLOBALS['focuson_ninzio']['h1-desk-lw']['width'] : "149px"; 
	$nz_h1_desk_menu_font_weight         = (isset($GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['font-weight']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['font-weight'])) ? $GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['font-weight'] : "normal";
	$nz_h1_desk_menu_font_size           = (isset($GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['font-size']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['font-size'])) ? $GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['font-size'] : "14px";
	$nz_h1_desk_menu_font_family         = (isset($GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['font-family']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['font-family'])) ? $GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['font-family'] : "Arial, Helvetica, sans-serif";
	$nz_h1_desk_menu_text_transform      = (isset($GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['text-transform']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['text-transform'])) ? $GLOBALS['focuson_ninzio']['h1-desk-menu-typo']['text-transform'] : "none";
	$nz_h1_desk_submenu_font_size        = (isset($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['font-size']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['font-size'])) ? $GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['font-size'] : "14px";
	$nz_h1_desk_submenu_font_weight      = (isset($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['font-weight']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['font-weight'])) ? $GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['font-weight'] : "400";
	$nz_h1_desk_submenu_line_height      = (isset($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['line-height']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['line-height'])) ? $GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['line-height'] : "24px";
	$nz_h1_desk_submenu_font_family      = (isset($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['font-family']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['font-family'])) ? $GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['font-family'] : "Arial, Helvetica, sans-serif";
	$nz_h1_desk_submenu_text_transform   = (isset($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['text-transform']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['text-transform'])) ? $GLOBALS['focuson_ninzio']['h1-desk-submenu-typo']['text-transform'] : "none";
	$nz_h1_desk_megamenu_text_transform  = (isset($GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['text-transform']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['text-transform'])) ? $GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['text-transform'] : $nz_h1_desk_menu_text_transform;
	$nz_h1_desk_megamenu_font_weight     = (isset($GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['font-weight']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['font-weight'])) ? $GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['font-weight'] : $nz_h1_desk_menu_font_weight;
	$nz_h1_desk_megamenu_font_size       = (isset($GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['font-size']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['font-size'])) ? $GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['font-size'] : $nz_h1_desk_menu_font_size;
	$nz_h1_desk_megamenu_color           = (isset($GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['color']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['color'])) ? $GLOBALS['focuson_ninzio']['h1-desk-megamenu-top-typo']['color'] : "#ffffff";

	$nz_h1_desk_cart_bubble_back_color   = (isset($GLOBALS['focuson_ninzio']['h1-desk-cart-bubble-back-color']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-cart-bubble-back-color'])) ? $GLOBALS['focuson_ninzio']['h1-desk-cart-bubble-back-color'] : '#8cc443';
	$nz_h1_desk_cart_bubble_text_color   = (isset($GLOBALS['focuson_ninzio']['h1-desk-cart-bubble-text-color']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-cart-bubble-text-color'])) ? $GLOBALS['focuson_ninzio']['h1-desk-cart-bubble-text-color'] : '#ffffff';

	$nz_h1_desk_cart_buttons_back_color   = (isset($GLOBALS['focuson_ninzio']['h1-desk-cart-buttons-back-color']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-cart-buttons-back-color'])) ? $GLOBALS['focuson_ninzio']['h1-desk-cart-buttons-back-color'] : '#8cc443';
	$nz_h1_desk_cart_buttons_text_color   = (isset($GLOBALS['focuson_ninzio']['h1-desk-cart-buttons-text-color']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-cart-buttons-text-color'])) ? $GLOBALS['focuson_ninzio']['h1-desk-cart-buttons-text-color'] : '#ffffff';

	$nz_h1_desk_fixed_back_color         = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-back-color']['color']) && $GLOBALS['focuson_ninzio']['h1-desk-fixed-back-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h1-desk-fixed-back-color']['color'],$GLOBALS['focuson_ninzio']['h1-desk-fixed-back-color']['alpha']) : $nz_h1_desk_back_color;
	$nz_h1_desk_fixed_menu_effect_color  = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-effect-color']['color']) && $GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-effect-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-effect-color']['color'],$GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-effect-color']['alpha']) : $nz_h1_desk_menu_effect_color;
	$nz_h1_desk_fixed_menu_color_reg     = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-color']['regular']) && $GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-color']['regular']) ? $GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-color']['regular'] : $nz_h1_desk_menu_color_reg;
	$nz_h1_desk_fixed_menu_color_hov     = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-color']['hover']) && $GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-color']['hover']) ? $GLOBALS['focuson_ninzio']['h1-desk-fixed-menu-color']['hover'] : $nz_h1_desk_menu_color_hov;

	$nz_h1_desk_fixed_cart_bubble_back_color   = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-cart-bubble-back-color']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-fixed-cart-bubble-back-color'])) ? $GLOBALS['focuson_ninzio']['h1-desk-fixed-cart-bubble-back-color'] : $nz_h1_desk_cart_bubble_back_color;
	$nz_h1_desk_fixed_cart_bubble_text_color   = (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-cart-bubble-text-color']) && !empty($GLOBALS['focuson_ninzio']['h1-desk-fixed-cart-bubble-text-color'])) ? $GLOBALS['focuson_ninzio']['h1-desk-fixed-cart-bubble-text-color'] : $nz_h1_desk_cart_bubble_text_color;

	// VERSION 2

	$nz_h2_header_top_menu_color         = (isset($GLOBALS['focuson_ninzio']['h2-header-top-menu-color']) && !empty($GLOBALS['focuson_ninzio']['h2-header-top-menu-color'])) ? $GLOBALS['focuson_ninzio']['h2-header-top-menu-color'] : '#ffffff';
	$nz_h2_header_top_social_links_color = (isset($GLOBALS['focuson_ninzio']['h2-header-top-social-links-color']) && !empty($GLOBALS['focuson_ninzio']['h2-header-top-social-links-color'])) ? $GLOBALS['focuson_ninzio']['h2-header-top-social-links-color'] : '#ffffff';
	$nz_h2_top_button_text_color         = (isset($GLOBALS['focuson_ninzio']['h2-top-button-text-color']) && !empty($GLOBALS['focuson_ninzio']['h2-top-button-text-color'])) ? $GLOBALS['focuson_ninzio']['h2-top-button-text-color'] : '#999999';
	$nz_h2_top_button_back_color         = (isset($GLOBALS['focuson_ninzio']['h2-top-button-back-color']) && !empty($GLOBALS['focuson_ninzio']['h2-top-button-back-color'])) ? $GLOBALS['focuson_ninzio']['h2-top-button-back-color'] : '#ffffff';

	$nz_h2_desk_back_color               = (isset($GLOBALS['focuson_ninzio']['h2-desk-back-color']['color']) && $GLOBALS['focuson_ninzio']['h2-desk-back-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h2-desk-back-color']['color'],$GLOBALS['focuson_ninzio']['h2-desk-back-color']['alpha']) : "#ffffff";
	$nz_h2_desk_border_color             = (isset($GLOBALS['focuson_ninzio']['h2-desk-border-color']['color']) && $GLOBALS['focuson_ninzio']['h2-desk-border-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h2-desk-border-color']['color'],$GLOBALS['focuson_ninzio']['h2-desk-border-color']['alpha']) : "";
	$nz_h2_desk_menu_effect_color        = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-effect-color']['color']) && $GLOBALS['focuson_ninzio']['h2-desk-menu-effect-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h2-desk-menu-effect-color']['color'],$GLOBALS['focuson_ninzio']['h2-desk-menu-effect-color']['alpha']) : "#87c03f";
	$nz_h2_desk_menu_back_color          = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-back-color']['color']) && $GLOBALS['focuson_ninzio']['h2-desk-menu-back-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h2-desk-menu-back-color']['color'],$GLOBALS['focuson_ninzio']['h2-desk-menu-back-color']['alpha']) : "#444444";
	$nz_h2_desk_menu_color_reg           = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-color']['regular']) && $GLOBALS['focuson_ninzio']['h2-desk-menu-color']['regular']) ? $GLOBALS['focuson_ninzio']['h2-desk-menu-color']['regular'] : "#ffffff";
	$nz_h2_desk_menu_color_hov           = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-color']['hover']) && $GLOBALS['focuson_ninzio']['h2-desk-menu-color']['hover']) ? $GLOBALS['focuson_ninzio']['h2-desk-menu-color']['hover'] : "#ffffff";
	$nz_h2_desk_submenu_back_color       = (isset($GLOBALS['focuson_ninzio']['h2-desk-submenu-back-color']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-submenu-back-color'])) ? $GLOBALS['focuson_ninzio']['h2-desk-submenu-back-color'] : '#292929';
	$nz_h2_desk_submenu_color_reg        = (isset($GLOBALS['focuson_ninzio']['h2-desk-submenu-color']['regular']) && $GLOBALS['focuson_ninzio']['h2-desk-submenu-color']['regular']) ? $GLOBALS['focuson_ninzio']['h2-desk-submenu-color']['regular'] : "#999999";
	$nz_h2_desk_submenu_color_hov        = (isset($GLOBALS['focuson_ninzio']['h2-desk-submenu-color']['hover']) && $GLOBALS['focuson_ninzio']['h2-desk-submenu-color']['hover']) ? $GLOBALS['focuson_ninzio']['h2-desk-submenu-color']['hover'] : "#ffffff";

	$nz_h2_desk_menu_m                   = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-m']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-menu-m'])) ? $GLOBALS['focuson_ninzio']['h2-desk-menu-m'] : '0';
	$nz_h2_desk_ls_w    	             = (isset($GLOBALS['focuson_ninzio']['h2-desk-lw']['width']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-lw']['width'])) ? $GLOBALS['focuson_ninzio']['h2-desk-lw']['width'] : "149px"; 
	$nz_h2_desk_menu_font_weight         = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['font-weight']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['font-weight'])) ? $GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['font-weight'] : "normal";
	$nz_h2_desk_menu_font_size           = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['font-size']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['font-size'])) ? $GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['font-size'] : "14px";
	$nz_h2_desk_menu_font_family         = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['font-family']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['font-family'])) ? $GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['font-family'] : "Arial, Helvetica, sans-serif";
	$nz_h2_desk_menu_text_transform      = (isset($GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['text-transform']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['text-transform'])) ? $GLOBALS['focuson_ninzio']['h2-desk-menu-typo']['text-transform'] : "none";
	$nz_h2_desk_submenu_font_size        = (isset($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['font-size']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['font-size'])) ? $GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['font-size'] : "14px";
	$nz_h2_desk_submenu_font_weight      = (isset($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['font-weight']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['font-weight'])) ? $GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['font-weight'] : "400";
	$nz_h2_desk_submenu_line_height      = (isset($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['line-height']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['line-height'])) ? $GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['line-height'] : "24px";
	$nz_h2_desk_submenu_font_family      = (isset($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['font-family']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['font-family'])) ? $GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['font-family'] : "Arial, Helvetica, sans-serif";
	$nz_h2_desk_submenu_text_transform   = (isset($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['text-transform']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['text-transform'])) ? $GLOBALS['focuson_ninzio']['h2-desk-submenu-typo']['text-transform'] : "none";
	$nz_h2_desk_megamenu_text_transform  = (isset($GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['text-transform']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['text-transform'])) ? $GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['text-transform'] : $nz_h2_desk_menu_text_transform;
	$nz_h2_desk_megamenu_font_weight     = (isset($GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['font-weight']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['font-weight'])) ? $GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['font-weight'] : $nz_h2_desk_menu_font_weight;
	$nz_h2_desk_megamenu_font_size       = (isset($GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['font-size']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['font-size'])) ? $GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['font-size'] : $nz_h2_desk_menu_font_size;
	$nz_h2_desk_megamenu_color           = (isset($GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['color']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['color'])) ? $GLOBALS['focuson_ninzio']['h2-desk-megamenu-top-typo']['color'] : "#ffffff";

	$nz_h2_desk_cart_bubble_back_color   = (isset($GLOBALS['focuson_ninzio']['h2-desk-cart-bubble-back-color']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-cart-bubble-back-color'])) ? $GLOBALS['focuson_ninzio']['h2-desk-cart-bubble-back-color'] : '#8cc443';
	$nz_h2_desk_cart_bubble_text_color   = (isset($GLOBALS['focuson_ninzio']['h2-desk-cart-bubble-text-color']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-cart-bubble-text-color'])) ? $GLOBALS['focuson_ninzio']['h2-desk-cart-bubble-text-color'] : '#ffffff';

	$nz_h2_desk_cart_buttons_back_color   = (isset($GLOBALS['focuson_ninzio']['h2-desk-cart-buttons-back-color']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-cart-buttons-back-color'])) ? $GLOBALS['focuson_ninzio']['h2-desk-cart-buttons-back-color'] : '#8cc443';
	$nz_h2_desk_cart_buttons_text_color   = (isset($GLOBALS['focuson_ninzio']['h2-desk-cart-buttons-text-color']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-cart-buttons-text-color'])) ? $GLOBALS['focuson_ninzio']['h2-desk-cart-buttons-text-color'] : '#ffffff';
	$nz_h2_desk_cart_search_border_color  = (isset($GLOBALS['focuson_ninzio']['h2-desk-cart-search-border-color']['color']) && $GLOBALS['focuson_ninzio']['h2-desk-cart-search-border-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h2-desk-cart-search-border-color']['color'],$GLOBALS['focuson_ninzio']['h2-desk-cart-search-border-color']['alpha']) : "#eeeeee";

	$nz_h2_desk_fixed_menu_back_color    = (isset($GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-back-color']['color']) && $GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-back-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-back-color']['color'],$GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-back-color']['alpha']) : $nz_h2_desk_menu_back_color;
	$nz_h2_desk_fixed_menu_effect_color  = (isset($GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-effect-color']['color']) && $GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-effect-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-effect-color']['color'],$GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-effect-color']['alpha']) : $nz_h2_desk_menu_effect_color;
	$nz_h2_desk_fixed_menu_color_reg     = (isset($GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-color']['regular']) && $GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-color']['regular']) ? $GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-color']['regular'] : $nz_h2_desk_menu_color_reg;
	$nz_h2_desk_fixed_menu_color_hov     = (isset($GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-color']['hover']) && $GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-color']['hover']) ? $GLOBALS['focuson_ninzio']['h2-desk-fixed-menu-color']['hover'] : $nz_h2_desk_menu_color_hov;

	// VERSION 3

	$nz_h3_header_social_links_color     = (isset($GLOBALS['focuson_ninzio']['h3-header-social-links-color']) && !empty($GLOBALS['focuson_ninzio']['h3-header-social-links-color'])) ? $GLOBALS['focuson_ninzio']['h3-header-social-links-color'] : '#999999';
	$nz_h3_desk_back_color               = (isset($GLOBALS['focuson_ninzio']['h3-desk-back-color']['color']) && $GLOBALS['focuson_ninzio']['h3-desk-back-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h3-desk-back-color']['color'],$GLOBALS['focuson_ninzio']['h3-desk-back-color']['alpha']) : "#ffffff";
	$nz_h3_desk_menu_effect_color        = (isset($GLOBALS['focuson_ninzio']['h3-desk-menu-effect-color']['color']) && $GLOBALS['focuson_ninzio']['h3-desk-menu-effect-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h3-desk-menu-effect-color']['color'],$GLOBALS['focuson_ninzio']['h3-desk-menu-effect-color']['alpha']) : "#87c03f";
	$nz_h3_desk_menu_color_reg           = (isset($GLOBALS['focuson_ninzio']['h3-desk-menu-color']['regular']) && $GLOBALS['focuson_ninzio']['h3-desk-menu-color']['regular']) ? $GLOBALS['focuson_ninzio']['h3-desk-menu-color']['regular'] : "#999999";
	$nz_h3_desk_menu_color_hov           = (isset($GLOBALS['focuson_ninzio']['h3-desk-menu-color']['hover']) && $GLOBALS['focuson_ninzio']['h3-desk-menu-color']['hover']) ? $GLOBALS['focuson_ninzio']['h3-desk-menu-color']['hover'] : "#999999";
	$nz_h3_desk_submenu_back_color       = (isset($GLOBALS['focuson_ninzio']['h3-desk-submenu-back-color']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-submenu-back-color'])) ? $GLOBALS['focuson_ninzio']['h3-desk-submenu-back-color'] : '#292929';
	$nz_h3_desk_submenu_color_reg        = (isset($GLOBALS['focuson_ninzio']['h3-desk-submenu-color']['regular']) && $GLOBALS['focuson_ninzio']['h3-desk-submenu-color']['regular']) ? $GLOBALS['focuson_ninzio']['h3-desk-submenu-color']['regular'] : "#999999";
	$nz_h3_desk_submenu_color_hov        = (isset($GLOBALS['focuson_ninzio']['h3-desk-submenu-color']['hover']) && $GLOBALS['focuson_ninzio']['h3-desk-submenu-color']['hover']) ? $GLOBALS['focuson_ninzio']['h3-desk-submenu-color']['hover'] : "#ffffff";

	$nz_h3_desk_menu_m                   = (isset($GLOBALS['focuson_ninzio']['h3-desk-menu-m']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-menu-m'])) ? $GLOBALS['focuson_ninzio']['h3-desk-menu-m'] : '0';
	$nz_h3_desk_ls_w    	             = (isset($GLOBALS['focuson_ninzio']['h3-desk-lw']['width']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-lw']['width'])) ? $GLOBALS['focuson_ninzio']['h3-desk-lw']['width'] : "149px"; 
	$nz_h3_desk_menu_font_weight         = (isset($GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['font-weight']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['font-weight'])) ? $GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['font-weight'] : "normal";
	$nz_h3_desk_menu_font_size           = (isset($GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['font-size']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['font-size'])) ? $GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['font-size'] : "14px";
	$nz_h3_desk_menu_font_family         = (isset($GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['font-family']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['font-family'])) ? $GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['font-family'] : "Arial, Helvetica, sans-serif";
	$nz_h3_desk_menu_text_transform      = (isset($GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['text-transform']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['text-transform'])) ? $GLOBALS['focuson_ninzio']['h3-desk-menu-typo']['text-transform'] : "none";
	$nz_h3_desk_submenu_font_size        = (isset($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['font-size']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['font-size'])) ? $GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['font-size'] : "14px";
	$nz_h3_desk_submenu_font_weight      = (isset($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['font-weight']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['font-weight'])) ? $GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['font-weight'] : "400";
	$nz_h3_desk_submenu_line_height      = (isset($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['line-height']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['line-height'])) ? $GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['line-height'] : "24px";
	$nz_h3_desk_submenu_font_family      = (isset($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['font-family']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['font-family'])) ? $GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['font-family'] : "Arial, Helvetica, sans-serif";
	$nz_h3_desk_submenu_text_transform   = (isset($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['text-transform']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['text-transform'])) ? $GLOBALS['focuson_ninzio']['h3-desk-submenu-typo']['text-transform'] : "none";
	$nz_h3_desk_megamenu_text_transform  = (isset($GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['text-transform']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['text-transform'])) ? $GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['text-transform'] : $nz_h3_desk_menu_text_transform;
	$nz_h3_desk_megamenu_font_weight     = (isset($GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['font-weight']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['font-weight'])) ? $GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['font-weight'] : $nz_h3_desk_menu_font_weight;
	$nz_h3_desk_megamenu_font_size       = (isset($GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['font-size']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['font-size'])) ? $GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['font-size'] : $nz_h3_desk_menu_font_size;
	$nz_h3_desk_megamenu_color           = (isset($GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['color']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['color'])) ? $GLOBALS['focuson_ninzio']['h3-desk-megamenu-top-typo']['color'] : "#ffffff";

	$nz_h3_desk_cart_bubble_back_color   = (isset($GLOBALS['focuson_ninzio']['h3-desk-cart-bubble-back-color']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-cart-bubble-back-color'])) ? $GLOBALS['focuson_ninzio']['h3-desk-cart-bubble-back-color'] : '#8cc443';
	$nz_h3_desk_cart_bubble_text_color   = (isset($GLOBALS['focuson_ninzio']['h3-desk-cart-bubble-text-color']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-cart-bubble-text-color'])) ? $GLOBALS['focuson_ninzio']['h3-desk-cart-bubble-text-color'] : '#ffffff';

	$nz_h3_desk_cart_buttons_back_color   = (isset($GLOBALS['focuson_ninzio']['h3-desk-cart-buttons-back-color']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-cart-buttons-back-color'])) ? $GLOBALS['focuson_ninzio']['h3-desk-cart-buttons-back-color'] : '#8cc443';
	$nz_h3_desk_cart_buttons_text_color   = (isset($GLOBALS['focuson_ninzio']['h3-desk-cart-buttons-text-color']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-cart-buttons-text-color'])) ? $GLOBALS['focuson_ninzio']['h3-desk-cart-buttons-text-color'] : '#ffffff';

	$nz_h3_header_fixed_social_links_color = (isset($GLOBALS['focuson_ninzio']['h3-header-fixed-social-links-color']) && !empty($GLOBALS['focuson_ninzio']['h3-header-fixed-social-links-color'])) ? $GLOBALS['focuson_ninzio']['h3-header-fixed-social-links-color'] : $nz_h3_header_social_links_color;
	$nz_h3_desk_fixed_back_color           = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-back-color']['color']) && $GLOBALS['focuson_ninzio']['h3-desk-fixed-back-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h3-desk-fixed-back-color']['color'],$GLOBALS['focuson_ninzio']['h3-desk-fixed-back-color']['alpha']) : $nz_h3_desk_back_color;
	$nz_h3_desk_fixed_menu_effect_color    = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-effect-color']['color']) && $GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-effect-color']['color']) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-effect-color']['color'],$GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-effect-color']['alpha']) : $nz_h3_desk_menu_effect_color;
	$nz_h3_desk_fixed_menu_color_reg       = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-color']['regular']) && $GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-color']['regular']) ? $GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-color']['regular'] : $nz_h3_desk_menu_color_reg;
	$nz_h3_desk_fixed_menu_color_hov       = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-color']['hover']) && $GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-color']['hover']) ? $GLOBALS['focuson_ninzio']['h3-desk-fixed-menu-color']['hover'] : $nz_h3_desk_menu_color_hov;

	$nz_h3_desk_fixed_cart_bubble_back_color   = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-cart-bubble-back-color']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-fixed-cart-bubble-back-color'])) ? $GLOBALS['focuson_ninzio']['h3-desk-fixed-cart-bubble-back-color'] : $nz_h3_desk_cart_bubble_back_color;
	$nz_h3_desk_fixed_cart_bubble_text_color   = (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-cart-bubble-text-color']) && !empty($GLOBALS['focuson_ninzio']['h3-desk-fixed-cart-bubble-text-color'])) ? $GLOBALS['focuson_ninzio']['h3-desk-fixed-cart-bubble-text-color'] : $nz_h3_desk_cart_bubble_text_color;
?>

<style>

<?php 
	if(isset($GLOBALS['focuson_ninzio']['font-custom-css']) && !empty($GLOBALS['focuson_ninzio']['font-custom-css'])){echo esc_html($GLOBALS['focuson_ninzio']['font-custom-css']);}
	if(isset($GLOBALS['focuson_ninzio']['custom-css']) && !empty($GLOBALS['focuson_ninzio']['custom-css'])){echo $GLOBALS['focuson_ninzio']['custom-css'];}
?>

/*  TYPOGRAPHY
/*-------------------------*/
	
	body,input,pre,code,kbd,samp,dt{
		font-size: <?php echo $nz_main_font_size; ?>;
		line-height: <?php echo $nz_main_line_height; ?>;
		font-family:<?php echo $nz_main_font_family; ?>;
	}

	.widget_tag_cloud .tagcloud a,
	.widget_product_tag_cloud .tagcloud a,
	.rich-header .subtitile,
	.desk .header-top-menu ul li > a .txt,
	.nz-breadcrumbs > * {
		font-family:<?php echo $nz_main_font_family; ?> !important;
	}

	h1,h2,h3,h4,h5,h6 {
		font-family:<?php echo $nz_headings_font_family; ?>;
		text-transform: <?php echo $nz_headings_text_transform; ?>;
	}

	h1 {font-size: <?php echo $nz_h1_font_size; ?>; line-height: <?php echo $nz_h1_line_height; ?>;}
	h2 {font-size: <?php echo $nz_h2_font_size; ?>; line-height: <?php echo $nz_h2_line_height; ?>;}
	h3 {font-size: <?php echo $nz_h3_font_size; ?>; line-height: <?php echo $nz_h3_line_height; ?>;}
	h4 {font-size: <?php echo $nz_h4_font_size; ?>; line-height: <?php echo $nz_h4_line_height; ?>;}
	h5 {font-size: <?php echo $nz_h5_font_size; ?>; line-height: <?php echo $nz_h5_line_height; ?>;}
	h6 {font-size: <?php echo $nz_h6_font_size; ?>; line-height: <?php echo $nz_h6_line_height; ?>;}

	.ls a,
	.mob-menu li a,
	#nz-content .search input[type="text"],
	.mob-header-content .header-top-menu li a
	{font-family:<?php echo $nz_headings_font_family; ?>;}

	textarea,select,button,.button,
	.widget_product_categories ul li a,
	.widget_nz_recent_entries .post-date,
	input[type="month"],input[type="number"],
	input[type="submit"],input[type="button"],
	input[type="date"],input[type="datetime"],
	input[type="password"],input[type="search"],
	input[type="datetime-local"],input[type="email"],
	input[type="tel"],input[type="text"],input[type="time"],
	input[type="url"],input[type="week"],input[type="reset"]{
		font-family:<?php echo $nz_headings_font_family; ?> !important;
		font-size: <?php echo $nz_main_font_size; ?>;
	}

	.button .txt {
		font-family:<?php echo $nz_headings_font_family; ?>;
	}

	.widget_pages ul li a,
	.widget_archive ul li a,
	.widget_nav_menu ul li a,
	.widget_meta ul li a,
	.widget_categories ul li a,
	.nz-timer,
	.count-value,
	.event-value,
	.event-title,
	.nz-testimonials .name,
	.nz-persons .person .name,
	.nz-pricing-table > .column .title,
	.nz-pricing-table .price,
	.nz-tagline-2 .container > .tagline-title,
	.tabset .tab,
	.vc_tta-tabs-list .vc_tta-tab a,
	.toggle-title .toggle-title-header,
	.ninzio-navigation,
	.woocommerce-pagination,
	.ninzio-filter .filter,
	.single-details .nz-i-list a,
	.nz-table th,
	.comment-meta .comment-author cite,
	.wp-caption .wp-caption-text,
	.nz-tagline .tagline-title,
	.woocommerce .product .onsale,
	.woocommerce .product .added_to_cart,
	.woocommerce-tabs .tabs > li,
	.woocommerce .single-product-summary .amount,
	.reset_variations,
	.footer-menu > ul > li > a,
	.share-label,
	.comment-meta .replay a,
	.project-details ul li,
	.woocommerce-tabs .commentlist .comment-text .meta,
	a.edit,
	a.view,
	#nz-content .widget_icl_lang_sel_widget,
	.nz-progress .progress-percent,
	.nz-progress .progress-title,
	.nz-content-box-2 .box-title span,
	.footer-info,
	.product .price,
	.related-products-title h3,
	.post .post-more,
	.ninzio-nav-single > *,
	.events .post-more,
	.error404-big,
	.box-more,
	.count-title,
	.nz-pricing-table .hlabel,
	.post-date-custom > span:first-child {
		font-family:<?php echo $nz_headings_font_family; ?>;
	}

/*  BACKGROUND
/*-------------------------*/

	html,
	#gen-wrap {
		background-color:<?php echo $nz_site_back_col; ?>;
		<?php if(!empty($nz_site_back_img)): ?>
			background-image:url(<?php echo $nz_site_back_img; ?>);
			background-repeat:<?php echo $nz_site_back_r; ?>;
			background-attachment: <?php echo $nz_site_back_a; ?>;
			-webkit-background-size: <?php echo $nz_site_back_s; ?>;
			-moz-background-size: <?php echo $nz_site_back_s; ?>;
			background-size: <?php echo $nz_site_back_s; ?>;
			background-position:<?php echo $nz_site_back_p; ?>;
		<?php endif; ?>
	}

/*  COLOR
/*-------------------------*/
	
	::-moz-selection {
		background-color:<?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
		color: #ffffff;
	}

	::selection {
		background-color:<?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
		color: #ffffff;
	}

	.sidebar a:not(.button):not(.ui-slider-handle) {
		color:<?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
	}

	.mob-menu li a:hover,
	.mob-menu .current-menu-item > a,
	.mob-menu .current-menu-parent > a,
	.mob-menu .current-menu-ancestor > a,
	.mob-menu ul li > a:hover > .di,
	.mob-menu .current-menu-item > a > .di,
	.mob-menu .current-menu-parent > a > .di,
	.mob-menu .current-menu-ancestor > a > .di,
	.mob-header-content .header-top-menu li a:hover,
	.mob-header-content .header-top-menu .current-menu-item > a,
	.mob-header-content .header-top-menu .current-menu-parent > a,
	.mob-header-content .header-top-menu .current-menu-ancestor > a,
	.mob-header-content .header-top-menu ul li > a:hover > .di,
	.mob-header-content .header-top-menu .current-menu-item > a > .di,
	.mob-header-content .header-top-menu .current-menu-parent > a > .di,
	.mob-header-content .header-top-menu .current-menu-ancestor > a > .di,
	.widget_product_search form:hover:after,
	.widget_categories ul li a:hover,
	.widget_meta ul li a:hover,
	.widget_pages ul li a:hover,
	.widget_archive ul li a:hover,
	.widget_product_categories ul li a:hover,
	.widget_nav_menu ul li a:hover,
	.widget_nav_menu ul li:hover > a > span.toggle,
	.widget_product_categories ul li:hover > a > span.toggle,
	.widget_calendar td a,
	.widget_rss a:hover,
	.widget_nz_recent_entries a:hover,
	.widget_recent_comments a:hover,
	.widget_recent_entries a:hover,
	.widget_twitter ul li a,
	.search-r .post-title a,
	.project-category a:hover,
	.project-details a:hover,
	.nz-related-portfolio .project-details a:hover,
	.single-details .nz-i-list a:hover,
	.blog-post .post .post-title:hover > a,
	.nz-recent-posts .post .post-title:hover > a,
	.blog-post .post .post-meta a:hover,
	.nz-recent-posts .post .post-meta a:hover,
	.blog-post .post .post-meta a:hover i,
	.nz-recent-posts .post .post-meta a:hover i,
	.woocommerce .product .price,
	.widget_shopping_cart .cart_list > li > a:hover, 
	.widget_products .product_list_widget > li > a:hover, 
	.widget_recently_viewed_products .product_list_widget > li > a:hover, 
	.widget_recent_reviews .product_list_widget > li > a:hover, 
	.widget_top_rated_products .product_list_widget > li > a:hover,
	.single-post-content a:not(.button),
	.footer-info .get-location .icon-location3,
	.nz-breadcrumbs a:hover,
	.ninzio-filter .filter:hover,
	.post .post-more,
	.post .post-category a:hover,
	.events .events-category a:hover,
	.events .events-title a:hover,
	.error404-big,
	.nz-content-box-2 a:hover .box-title h3,
	.single .projects-head .projects-navigation > a:hover,
	.widget_twitter ul li:before,
	.nz-breadcrumbs > *:before,
	.post-comments a:hover,
	.post-likes .jm-post-like:hover,
	.ninzio-filter .filter.active,
	.ninzio-filter .filter:after,
	.woocommerce-tabs .commentlist .comment-text .meta,
	.woocommerce-tabs .tabs > li.active a,
	.tabset .tab.active,
	.vc_tta-tabs-list .vc_tta-tab.vc_active a,
	.vc_tta-panel.vc_active .vc_tta-panel-title a {
		color: <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?> !important;
	}

	#nz-content a:not(.button),
	#nz-content a:not(.button):visited,
	.post-comments-area a,
	.woo-cart .widget_shopping_cart .cart_list > li > a:hover,
	.woocommerce .single-product-summary .product_meta a,
	.widget_shopping_cart .cart_list > li > a:hover,
	.widget_products .product_list_widget > li > a:hover,
	.widget_recently_viewed_products .product_list_widget > li > a:hover,
	.widget_recent_reviews .product_list_widget > li > a:hover,
	.widget_top_rated_products .product_list_widget > li > a:hover,
	.reset_variations:hover,
	.count-icon,
	.event-icon,
	.nz-testimonials .name,
	.post-comments-area .comments-title,
	.comment-meta .replay a,
	.comment-meta .comment-author cite {
		color: <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
	}

	#nz-content a:not(.button):hover,
	#nz-content a:not(.button):visited:hover,
	.post-comments-area a:hover,
	.woocommerce .single-product-summary .product_meta a:hover {
		color: <?php echo focuson_ninzio_hex_to_rgb_shade($GLOBALS['focuson_ninzio']['main-color'],50); ?>;
	}

	.widget_nav_menu li:after,
	.widget_product_categories li:after,
	.flex-control-paging li a.flex-active,
	.flex-direction-nav a:hover,
	.ninzio-slider-bullets span:hover,
	.ninzio-slider-bullets span.current-bullet,
	.ninzio-navigation li a:hover,
	.ninzio-navigation li span.current,
	.woocommerce-pagination li a:hover,
	.woocommerce-pagination li span.current,
	.owl-controls .owl-buttons div:hover,
	.widget_price_filter .ui-slider .ui-slider-range,
	.woocommerce .product:hover .category-details,
	.nz-persons .person .title:after,
	.post .post-date:after,
	.project-details ul li:before,
	#mc-embedded-subscribe + span,
	.tab-img-tabset .tab-img:after,
	.toggle-title.active .arrow:after,
	.toggle-title.active .arrow:before,
	.nz-pricing-table > .column .pricing:before,
	.widget_title:before,
	#nz-content .nz-single-image:before,
	.post .post-category:after,
	.post .post-category:before,
	.widget_twitter .follow,
	.nz-content-box-2 .box-title h3:after,
	.nz-content-box-2 .box-title h3:before,
	.nz-persons .person .title:after,
	.nz-persons .person .title:before,
	.mob-menu-toggle2:hover,
	#top,
	.footer .social-links a:hover,
	.widget_categories ul li a:before,
	.widget_pages ul li a:before,
	.widget_archive ul li a:before,
	.widget_meta ul li a:before,
	.widget_calendar td#today,
	.single .project-details ul li:after,
	.woocommerce .product .onsale,
	#nz-content .nz-persons .social-links a:hover,
	.cart-toggle span,
	.post-date-custom,
	.standard .loop .post .post-more:hover,
	.standard .loop .blog-post .format-quote .post-body .format-wrapper,
	.standard .loop .blog-post .format-status .post-body .format-wrapper,
	.standard .loop .blog-post .format-link .post-body .format-wrapper,
	.standard .loop .blog-post .format-aside .post-body .format-wrapper,
	.loop .small-standard .projects .nz-overlay-before,
	.loop .medium-standard .projects .nz-overlay-before,
	.loop .large-standard .projects .nz-overlay-before,
	.nz-recent-projects.small-standard .projects .nz-overlay-before,
	.nz-recent-projects.medium-standard .projects .nz-overlay-before,
	.nz-recent-projects.large-standard .projects .nz-overlay-before {
		background-color: <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?> !important;
	}

	.ninzio-navigation li a:hover,
	.ninzio-navigation li span.current,
	.woocommerce-pagination li a:hover,
	.woocommerce-pagination li span.current,
	.owl-controls .owl-buttons div:hover {
	    border-bottom-color: <?php echo focuson_ninzio_hex_to_rgb_shade($GLOBALS['focuson_ninzio']['main-color'],20); ?>;
	    box-shadow: 0 2px <?php echo focuson_ninzio_hex_to_rgb_shade($GLOBALS['focuson_ninzio']['main-color'],5); ?>;
	}

	.nz-pricing-table > .column .title:after {
		border-bottom: 3em solid <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
	}

	.nz-pricing-table > .column .pricing {
		border-bottom: 3px solid <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
	}

	.owl-controls .owl-page.active {
		box-shadow: inset 0 0 0 2px <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
	}

	.shop-loader:before,
	.nz-loader {
		border-top: 1px solid <?php echo focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['main-color'],0.1); ?>;
		border-right: 1px solid <?php echo focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['main-color'],0.1); ?>;
		border-bottom: 1px solid <?php echo focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['main-color'],0.1); ?>;
		border-left: 1px solid <?php echo focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['main-color'],0.5); ?>;
	}

	.widget_price_filter .ui-slider .ui-slider-handle {
		border-color: <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
	}

	.single-details .nz-i-list span.icon {
		box-shadow: inset 0 0 0 20px <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
	}

	button,
	input[type="reset"],
	input[type="submit"],
	input[type="button"],
	.single-details .project-link,
	.woocommerce .single-product-summary .button,
	.widget_price_filter .price_slider_amount .button,
	.wc-proceed-to-checkout a,
	.woocommerce-message .button.wc-forward,
	.single_add_to_cart_button,
	.widget_shopping_cart p.buttons > a,
	a.edit,
	a.view,
	.nz-overlay-before, 
	#nz-content .nz-single-image:before {
		background-color: <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
	}

	.widget_recent_projects .ninzio-overlay,
	.loop .projects .ninzio-overlay,
	.nz-recent-projects .projects .ninzio-overlay,
	.nz-related-projects .projects .ninzio-overlay {
		background-color: <?php echo focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']['main-color'],0.9); ?>;
	}

	.woocommerce .product .single-product-summary .button,
	.woocommerce .product .single-product-summary .added_to_cart,
	.woocommerce .product .single-product-summary .product_type_external {
		background-color: <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?> !important;
	}

	.woocommerce .product .single-product-summary .button:hover ,
	.woocommerce .product .single-product-summary .added_to_cart:hover ,
	.woocommerce .product .single-product-summary .product_type_external:hover {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($GLOBALS['focuson_ninzio']['main-color'],20); ?> !important;
	}

	button:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	input[type="button"]:hover,
	.single-details .project-link:hover,
	.woocommerce .single-product-summary .button:hover,
	.widget_price_filter .price_slider_amount .button:hover,
	.wc-proceed-to-checkout a:hover,
	.woocommerce-message .button.wc-forward:hover,
	.single_add_to_cart_button:hover,
	.widget_shopping_cart p.buttons > a:hover,
	a.edit:hover,
	a.view:hover{
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($GLOBALS['focuson_ninzio']['main-color'],20); ?>;
	}

	.default.button-normal{background-color: <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>}
	.default.button-ghost {box-shadow:inset 0 0 0 2px <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;color:<?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;}
	.default.button-3d {background-color:<?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;box-shadow: 0 4px <?php echo focuson_ninzio_hex_to_rgb_shade($GLOBALS['focuson_ninzio']['main-color'],50); ?>;}

	.default.animate-false.button-3d:hover {box-shadow: 0 2px <?php echo focuson_ninzio_hex_to_rgb_shade($GLOBALS['focuson_ninzio']['main-color'],50); ?>;}
	.default.animate-false.button-normal.hover-fill:hover{background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($GLOBALS['focuson_ninzio']['main-color'],20); ?>;}
	
	.default.button-ghost.hover-fill:hover,
	.default.button-ghost.hover-drop:after,
	.default.button-ghost.hover-side:after,
	.default.button-ghost.hover-scene:after,
	.default.button-ghost.hover-screen:after
	{background-color: <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;}

	#mc-embedded-subscribe:hover + span {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($GLOBALS['focuson_ninzio']['main-color'],50); ?> !important;
	}

/*  HEADER
/*-------------------------*/

	.version1 .header-top {
		background-color: <?php echo $nz_h1_header_top_back_color; ?>;
	}

	<?php if(!empty($nz_h1_header_top_border_color)): ?>
		.version1 .header-top {
			border-bottom:1px solid <?php echo $nz_h1_header_top_border_color; ?>;
		}
	<?php endif;?>

	.version1 .header-top .header-top-menu ul li a,
	.version1 .header-top .header-top-menu > ul > li:not(:last-child):after {
	    color: <?php echo $nz_h1_header_top_menu_color; ?>;
	}

	.version1 .header-top .header-top-menu > ul > li > a > .txt:after, 
	.version1 .header-top .header-top-menu > ul > li.menu-item-language > a:after {
	    background-color: <?php echo $nz_h1_header_top_menu_color; ?>;;
	}

	.version1 .header-top .top-button {
	    color: <?php echo $nz_h1_top_button_text_color; ?>;
	    background-color: <?php echo $nz_h1_top_button_back_color; ?>;
	}

	.version1 .header-top .header-top-social-links a {
	    color: <?php echo $nz_h1_header_top_social_links_color; ?> !important;
	}

	.version1 .header-top .header-top-menu ul li ul.submenu-languages,
	.version1 .desk-menu > ul > li ul.submenu-languages
	{width: <?php echo $nz_h1_desk_ls_w ; ?>;}

	.version1 .header-body {
	    background-color: <?php echo $nz_h1_desk_back_color; ?>;
	    <?php if(!empty($nz_h1_desk_border_color)): ?>
			border-bottom:1px solid <?php echo $nz_h1_desk_border_color; ?>;
		<?php endif;?>
	}

	.version1 .desk-menu > ul > li {
		margin-left: <?php echo $nz_h1_desk_menu_m; ?>px !important;
	}

	.version1:not(.active) .logo-title {
		color: <?php echo $nz_h1_desk_menu_color_reg; ?>;
	}

	.version1 .desk-menu > ul > li > a {
	    color: <?php echo $nz_h1_desk_menu_color_reg; ?>;
		text-transform: <?php echo $nz_h1_desk_menu_text_transform; ?>;
		font-weight: <?php echo $nz_h1_desk_menu_font_weight; ?>;
		font-size: <?php echo $nz_h1_desk_menu_font_size; ?>;
		font-family: <?php echo $nz_h1_desk_menu_font_family; ?>;
	}

	.version1 .desk-menu > ul > li:hover > a,
	.version1 .desk-menu > ul > li.one-page-active > a,
	.version1:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version1:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version1:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
	    color: <?php echo $nz_h1_desk_menu_color_hov; ?>;
	}

	.version1 .desk-menu .sub-menu,
	.version1 .header-top .header-top-menu ul li ul,
	.version1 .search,
	.version1 .woo-cart {
		background-color: <?php echo $nz_h1_desk_submenu_back_color; ?>;
	}

	.version1 .desk-menu .sub-menu .sub-menu {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h1_desk_submenu_back_color,20); ?>;
	}

	.version1 .desk-menu .sub-menu li > a {
	    color: <?php echo $nz_h1_desk_submenu_color_reg; ?>;
		text-transform: <?php echo $nz_h1_desk_submenu_text_transform; ?>;
		font-weight: <?php echo $nz_h1_desk_submenu_font_weight; ?>;
		font-size: <?php echo $nz_h1_desk_submenu_font_size; ?>;
		line-height: <?php echo $nz_h1_desk_submenu_line_height; ?>;
		font-family: <?php echo $nz_h1_desk_submenu_font_family; ?>;
	}

	.version1 .header-top .header-top-menu ul li ul li a {
	    color: <?php echo $nz_h1_desk_submenu_color_reg; ?>;
	}

	.version1 .desk-menu .sub-menu li:hover > a,
	.version1 .header-top .header-top-menu ul li ul li:hover > a {
	    color: <?php echo $nz_h1_desk_submenu_color_hov; ?>;
	}
	
	.version1 .desk-menu [data-mm="true"] > .sub-menu > li > a {
		text-transform: <?php echo $nz_h1_desk_megamenu_text_transform; ?>;
		font-weight: <?php echo $nz_h1_desk_megamenu_font_weight; ?>;
		font-size: <?php echo $nz_h1_desk_megamenu_font_size; ?>;
		color: <?php echo $nz_h1_desk_megamenu_color; ?> !important;
	}

	.version1 .search-true.cart-false .search-toggle:after,
	.version1 .cart-true .desk-cart-wrap:after {
		background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h1_desk_menu_color_reg,0.2); ?>;
	}

	.version1 .search-toggle,
	.version1 .desk-cart-wrap {
	    box-shadow: inset 0 0 0 2px <?php echo focuson_ninzio_hex_to_rgba($nz_h1_desk_menu_color_reg,0.4); ?>;
	}

	.version1 .search input[type="text"],
	.version1 .woo-cart {
	    color: <?php echo $nz_h1_desk_submenu_color_reg; ?>;
	}

	.version1 .desk-cart-toggle span {
	    color: <?php echo $nz_h1_desk_cart_bubble_text_color; ?>;
		background-color: <?php echo $nz_h1_desk_cart_bubble_back_color; ?>;
	}

	.version1 .woo-cart .widget_shopping_cart .cart_list li {
		border-bottom: 1px solid <?php echo focuson_ninzio_hex_to_rgba($nz_h1_desk_submenu_color_reg,0.2); ?>;
	}

	.version1 .woo-cart .widget_shopping_cart .cart_list li .remove {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h1_desk_submenu_back_color,20); ?>;
	}

	.version1 .woo-cart .widget_shopping_cart .cart_list li .remove:hover {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h1_desk_submenu_back_color,30); ?> !important;
	}

	.version1 .woo-cart .widget_shopping_cart .cart_list li img {
	    background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h1_desk_submenu_color_reg,0.1); ?>;
	}

	.version1 .woo-cart .widget_shopping_cart .cart_list li:hover img {
	    background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h1_desk_submenu_color_reg,0.2); ?>;
	}

	.version1 .woo-cart .widget_shopping_cart p.buttons > a {
		color: <?php echo $nz_h1_desk_cart_buttons_text_color; ?>;
		background-color: <?php echo $nz_h1_desk_cart_buttons_back_color; ?>;	
	}

	.version1 .woo-cart .widget_shopping_cart p.buttons > a:hover {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h1_desk_cart_buttons_back_color,20); ?>;	
	}

	/*EFFECTS*/
	.version1.effect-underline .desk-menu > ul > li > a:after,
	.version1.effect-overline .desk-menu > ul > li > a:after,
	.version1.effect-fill .desk-menu > ul > li:hover > a,
	.version1.effect-fill .desk-menu > ul > li.one-page-active > a,
	.version1.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version1.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version1.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		background-color: <?php echo $nz_h1_desk_menu_effect_color; ?>
	}

	.version1.effect-outline .desk-menu > ul > li:hover > a,
	.version1.effect-outline .desk-menu > ul > li.one-page-active > a,
	.version1.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version1.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version1.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		box-shadow: inset 0 0 0 2px <?php echo $nz_h1_desk_menu_effect_color; ?>;
	}

	/*FIXED*/

	.version1.fixed-true.active .logo-title {
		color: <?php echo $nz_h1_desk_fixed_menu_color_reg; ?>;
	}
	.version1.fixed-true.active .header-body {
	    background-color: <?php echo $nz_h1_desk_fixed_back_color; ?>;
	}
	.version1.fixed-true.active .desk-menu > ul > li > a {
	    color: <?php echo $nz_h1_desk_fixed_menu_color_reg; ?>;
	}

	.version1.fixed-true.active .desk-menu > ul > li:hover > a,
	.version1.fixed-true.active .desk-menu > ul > li.one-page-active > a,
	.version1.fixed-true.active:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version1.fixed-true.active:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version1.fixed-true.active:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
	    color: <?php echo $nz_h1_desk_fixed_menu_color_hov; ?>;
	}

	.version1.fixed-true.active .search-true.cart-false .search-toggle:after,
	.version1.fixed-true.active .cart-true .desk-cart-wrap:after {
		background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h1_desk_fixed_menu_color_reg,0.2); ?>;
	}

	<?php if (isset($GLOBALS['focuson_ninzio']['h1-desk-fixed-icons-version']) && $GLOBALS['focuson_ninzio']['h1-desk-fixed-icons-version'] == 'light'): ?>
		.version1.fixed-true.active .search-toggle,
		.version1.fixed-true.active .desk-cart-wrap {
		    box-shadow: inset 0 0 0 2px <?php echo focuson_ninzio_hex_to_rgba($nz_h1_desk_fixed_menu_color_reg,0.4); ?>;
		}
	<?php else: ?>
		.version1.fixed-true.active .search-toggle,
		.version1.fixed-true.active .desk-cart-wrap {
		    box-shadow: inset 0 0 0 2px <?php echo focuson_ninzio_hex_to_rgba($nz_h1_desk_fixed_menu_color_reg,0.2); ?>;
		}
	<?php endif ?>

	

	.version1.fixed-true.active .desk-cart-toggle span {
	    color: <?php echo $nz_h1_desk_fixed_cart_bubble_text_color; ?>;
		background-color: <?php echo $nz_h1_desk_fixed_cart_bubble_back_color; ?>;
	}

	.version1.fixed-true.active.effect-outline .desk-menu > ul > li:hover > a,
	.version1.fixed-true.active.effect-outline .desk-menu > ul > li.one-page-active > a,
	.version1.fixed-true.active.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version1.fixed-true.active.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version1.fixed-true.active.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		box-shadow: inset 0 0 0 2px <?php echo $nz_h1_desk_fixed_menu_effect_color; ?>;
	}

	.version1.fixed-true.active.effect-underline .desk-menu > ul > li > a:after,
	.version1.fixed-true.active.effect-overline .desk-menu > ul > li > a:after,
	.version1.fixed-true.active.effect-fill .desk-menu > ul > li:hover > a,
	.version1.fixed-true.active.effect-fill .desk-menu > ul > li.one-page-active > a,
	.version1.fixed-true.active.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version1.fixed-true.active.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version1.fixed-true.active.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		background-color: <?php echo $nz_h1_desk_fixed_menu_effect_color; ?>;
	}

	.version2 .header-top .header-top-menu ul li a,
	.version2 .header-top .header-top-menu > ul > li:not(:last-child):after {
	    color: <?php echo $nz_h2_header_top_menu_color; ?>;
	}

	.version2 .header-top .header-top-menu > ul > li > a > .txt:after, 
	.version2 .header-top .header-top-menu > ul > li.menu-item-language > a:after {
	    background-color: <?php echo $nz_h2_header_top_menu_color; ?>;;
	}

	.version2 .header-top .top-button {
	    color: <?php echo $nz_h2_top_button_text_color; ?>;
	    background-color: <?php echo $nz_h2_top_button_back_color; ?>;
	}

	.version2 .header-top .header-top-social-links a {
	    color: <?php echo $nz_h2_header_top_social_links_color; ?> !important;
	}

	.version2 .header-top .header-top-menu ul li ul.submenu-languages,
	.version2 .desk-menu > ul > li ul.submenu-languages
	{width: <?php echo $nz_h2_desk_ls_w ; ?>;}

	.version2 .header-body {
	    background-color: <?php echo $nz_h2_desk_back_color; ?>;
	}

	.version2 .header-menu {
	    background-color: <?php echo $nz_h2_desk_menu_back_color; ?>;
	    <?php if(!empty($nz_h2_desk_border_color)): ?>
			border-top:1px solid <?php echo $nz_h2_desk_border_color; ?>;
		<?php endif;?>
	}

	.version2 .desk-menu > ul > li {
		margin-right: <?php echo $nz_h2_desk_menu_m; ?>px !important;
	}

	.version2:not(.active) .logo-title {
		color: <?php echo $nz_h2_desk_menu_color_reg; ?>;
	}

	.version2 .desk-menu > ul > li > a {
	    color: <?php echo $nz_h2_desk_menu_color_reg; ?>;
		text-transform: <?php echo $nz_h2_desk_menu_text_transform; ?>;
		font-weight: <?php echo $nz_h2_desk_menu_font_weight; ?>;
		font-size: <?php echo $nz_h2_desk_menu_font_size; ?>;
		font-family: <?php echo $nz_h2_desk_menu_font_family; ?>;
	}

	.version2 .desk-menu > ul > li:hover > a,
	.version2 .desk-menu > ul > li.one-page-active > a,
	.version2:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version2:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version2:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
	    color: <?php echo $nz_h2_desk_menu_color_hov; ?>;
	}

	.version2 .desk-menu .sub-menu,
	.version2 .header-top .header-top-menu ul li ul,
	.version2 .search,
	.version2 .woo-cart {
		background-color: <?php echo $nz_h2_desk_submenu_back_color; ?>;
	}

	.version2 .desk-menu .sub-menu .sub-menu {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h2_desk_submenu_back_color,20); ?>;
	}

	.version2 .desk-menu .sub-menu li > a {
	    color: <?php echo $nz_h2_desk_submenu_color_reg; ?>;
		text-transform: <?php echo $nz_h2_desk_submenu_text_transform; ?>;
		font-weight: <?php echo $nz_h2_desk_submenu_font_weight; ?>;
		font-size: <?php echo $nz_h2_desk_submenu_font_size; ?>;
		line-height: <?php echo $nz_h2_desk_submenu_line_height; ?>;
		font-family: <?php echo $nz_h2_desk_submenu_font_family; ?>;
	}

	.version2 .header-top .header-top-menu ul li ul li a {
	    color: <?php echo $nz_h2_desk_submenu_color_reg; ?>;
	}

	.version2 .desk-menu .sub-menu li:hover > a,
	.version2 .header-top .header-top-menu ul li ul li:hover > a {
	    color: <?php echo $nz_h2_desk_submenu_color_hov; ?>;
	}
	
	.version2 .desk-menu [data-mm="true"] > .sub-menu > li > a {
		text-transform: <?php echo $nz_h2_desk_megamenu_text_transform; ?>;
		font-weight: <?php echo $nz_h2_desk_megamenu_font_weight; ?>;
		font-size: <?php echo $nz_h2_desk_megamenu_font_size; ?>;
		color: <?php echo $nz_h2_desk_megamenu_color; ?> !important;
	}

	.version2 .search-true.cart-false .search-toggle:after,
	.version2 .cart-true .desk-cart-wrap:after {
		background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h2_desk_menu_color_reg,0.2); ?>;
	}

	.version2 .search-toggle,
	.version2 .desk-cart-wrap {
	    box-shadow: inset 0 0 0 2px <?php echo $nz_h2_desk_cart_search_border_color; ?>;
	}

	.version2 .search input[type="text"],
	.version2 .woo-cart {
	    color: <?php echo $nz_h2_desk_submenu_color_reg; ?>;
	}

	.version2 .desk-cart-toggle span {
	    color: <?php echo $nz_h2_desk_cart_bubble_text_color; ?>;
		background-color: <?php echo $nz_h2_desk_cart_bubble_back_color; ?>;
	}

	.version2 .woo-cart .widget_shopping_cart .cart_list li {
		border-bottom: 1px solid <?php echo focuson_ninzio_hex_to_rgba($nz_h2_desk_submenu_color_reg,0.2); ?>;
	}

	.version2 .woo-cart .widget_shopping_cart .cart_list li .remove {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h2_desk_submenu_back_color,20); ?>;
	}

	.version2 .woo-cart .widget_shopping_cart .cart_list li .remove:hover {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h2_desk_submenu_back_color,30); ?> !important;
	}

	.version2 .woo-cart .widget_shopping_cart .cart_list li img {
	    background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h2_desk_submenu_color_reg,0.1); ?>;
	}

	.version2 .woo-cart .widget_shopping_cart .cart_list li:hover img {
	    background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h2_desk_submenu_color_reg,0.2); ?>;
	}

	.version2 .woo-cart .widget_shopping_cart p.buttons > a {
		color: <?php echo $nz_h2_desk_cart_buttons_text_color; ?>;
		background-color: <?php echo $nz_h2_desk_cart_buttons_back_color; ?>;	
	}

	.version2 .woo-cart .widget_shopping_cart p.buttons > a:hover {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h2_desk_cart_buttons_back_color,20); ?>;	
	}

	/*EFFECTS*/
	.version2.effect-underline .desk-menu > ul > li > a:after,
	.version2.effect-overline .desk-menu > ul > li > a:after,
	.version2.effect-fill .desk-menu > ul > li:hover > a,
	.version2.effect-fill .desk-menu > ul > li.one-page-active > a,
	.version2.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version2.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version2.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		background-color: <?php echo $nz_h2_desk_menu_effect_color; ?>
	}

	.version2.effect-outline .desk-menu > ul > li:hover > a,
	.version2.effect-outline .desk-menu > ul > li.one-page-active > a,
	.version2.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version2.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version2.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		box-shadow: inset 0 0 0 2px <?php echo $nz_h2_desk_menu_effect_color; ?>;
	}

	/*FIXED*/
	.version2.fixed-true.active .header-menu {
	    background-color: <?php echo $nz_h2_desk_fixed_menu_back_color; ?>;
	}

	.version2.fixed-true.active .desk-menu > ul > li > a {
	    color: <?php echo $nz_h2_desk_fixed_menu_color_reg; ?>;
	}

	.version2.fixed-true.active .desk-menu > ul > li:hover > a,
	.version2.fixed-true.active .desk-menu > ul > li.one-page-active > a,
	.version2.fixed-true.active:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version2.fixed-true.active:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version2.fixed-true.active:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
	    color: <?php echo $nz_h2_desk_fixed_menu_color_hov; ?>;
	}

	.version2.fixed-true.active.effect-outline .desk-menu > ul > li:hover > a,
	.version2.fixed-true.active.effect-outline .desk-menu > ul > li.one-page-active > a,
	.version2.fixed-true.active.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version2.fixed-true.active.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version2.fixed-true.active.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		box-shadow: inset 0 0 0 2px <?php echo $nz_h2_desk_fixed_menu_effect_color; ?>;
	}

	.version2.fixed-true.active.effect-underline .desk-menu > ul > li > a:after,
	.version2.fixed-true.active.effect-overline .desk-menu > ul > li > a:after,
	.version2.fixed-true.active.effect-fill .desk-menu > ul > li:hover > a,
	.version2.fixed-true.active.effect-fill .desk-menu > ul > li.one-page-active > a,
	.version2.fixed-true.active.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version2.fixed-true.active.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version2.fixed-true.active.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		background-color: <?php echo $nz_h2_desk_fixed_menu_effect_color; ?>;
	}

	/*VERSION 3*/
	.version3 .header-social-links a {
	    color: <?php echo $nz_h3_header_social_links_color; ?> !important;
	}

	.version3 .desk-menu > ul > li ul.submenu-languages
	{width: <?php echo $nz_h3_desk_ls_w ; ?>;}

	.version3 .header-body {
	    background-color: <?php echo $nz_h3_desk_back_color; ?>;
	}

	.version3 .desk-menu > ul > li {
		margin-left: <?php echo $nz_h3_desk_menu_m; ?>px !important;
	}

	.version3:not(.active) .logo-title {
		color: <?php echo $nz_h3_desk_menu_color_reg; ?>;
	}

	.version3 .desk-menu > ul > li > a {
	    color: <?php echo $nz_h3_desk_menu_color_reg; ?>;
		text-transform: <?php echo $nz_h3_desk_menu_text_transform; ?>;
		font-weight: <?php echo $nz_h3_desk_menu_font_weight; ?>;
		font-size: <?php echo $nz_h3_desk_menu_font_size; ?>;
		font-family: <?php echo $nz_h3_desk_menu_font_family; ?>;
	}

	.version3 .desk-menu > ul > li:hover > a,
	.version3 .desk-menu > ul > li.one-page-active > a,
	.version3:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version3:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version3:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
	    color: <?php echo $nz_h3_desk_menu_color_hov; ?>;
	}

	.version3 .desk-menu .sub-menu,
	.version3 .header-top .header-top-menu ul li ul,
	.version3 .search,
	.version3 .woo-cart {
		background-color: <?php echo $nz_h3_desk_submenu_back_color; ?>;
	}

	.version3 .desk-menu .sub-menu .sub-menu {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h3_desk_submenu_back_color,20); ?>;
	}

	.version3 .desk-menu .sub-menu li > a {
	    color: <?php echo $nz_h3_desk_submenu_color_reg; ?>;
		text-transform: <?php echo $nz_h3_desk_submenu_text_transform; ?>;
		font-weight: <?php echo $nz_h3_desk_submenu_font_weight; ?>;
		font-size: <?php echo $nz_h3_desk_submenu_font_size; ?>;
		line-height: <?php echo $nz_h3_desk_submenu_line_height; ?>;
		font-family: <?php echo $nz_h3_desk_submenu_font_family; ?>;
	}

	.version3 .desk-menu .sub-menu li:hover > a {
	    color: <?php echo $nz_h3_desk_submenu_color_hov; ?>;
	}
	
	.version3 .desk-menu [data-mm="true"] > .sub-menu > li > a {
		text-transform: <?php echo $nz_h3_desk_megamenu_text_transform; ?>;
		font-weight: <?php echo $nz_h3_desk_megamenu_font_weight; ?>;
		font-size: <?php echo $nz_h3_desk_megamenu_font_size; ?>;
		color: <?php echo $nz_h3_desk_megamenu_color; ?> !important;
	}

	.version3 .search-true.cart-false .search-toggle:after,
	.version3 .cart-true .desk-cart-wrap:after {
		background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h3_desk_menu_color_reg,0.2); ?>;
	}

	.version3 .search-toggle,
	.version3 .desk-cart-wrap {
	    box-shadow: inset 0 0 0 2px <?php echo focuson_ninzio_hex_to_rgba($nz_h3_desk_menu_color_reg,0.4); ?>;
	}

	.version3 .search input[type="text"],
	.version3 .woo-cart {
	    color: <?php echo $nz_h3_desk_submenu_color_reg; ?>;
	}

	.version3 .desk-cart-toggle span {
	    color: <?php echo $nz_h3_desk_cart_bubble_text_color; ?>;
		background-color: <?php echo $nz_h3_desk_cart_bubble_back_color; ?>;
	}

	.version3 .woo-cart .widget_shopping_cart .cart_list li {
		border-bottom: 1px solid <?php echo focuson_ninzio_hex_to_rgba($nz_h3_desk_submenu_color_reg,0.2); ?>;
	}

	.version3 .woo-cart .widget_shopping_cart .cart_list li .remove {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h3_desk_submenu_back_color,20); ?>;
	}

	.version3 .woo-cart .widget_shopping_cart .cart_list li .remove:hover {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h3_desk_submenu_back_color,30); ?> !important;
	}

	.version3 .woo-cart .widget_shopping_cart .cart_list li img {
	    background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h3_desk_submenu_color_reg,0.1); ?>;
	}

	.version3 .woo-cart .widget_shopping_cart .cart_list li:hover img {
	    background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h3_desk_submenu_color_reg,0.2); ?>;
	}

	.version3 .woo-cart .widget_shopping_cart p.buttons > a {
		color: <?php echo $nz_h3_desk_cart_buttons_text_color; ?>;
		background-color: <?php echo $nz_h3_desk_cart_buttons_back_color; ?>;	
	}

	.version3 .woo-cart .widget_shopping_cart p.buttons > a:hover {
		background-color: <?php echo focuson_ninzio_hex_to_rgb_shade($nz_h3_desk_cart_buttons_back_color,20); ?>;	
	}

	/*EFFECTS*/
	.version3.effect-underline .desk-menu > ul > li > a:after,
	.version3.effect-overline .desk-menu > ul > li > a:after,
	.version3.effect-fill .desk-menu > ul > li:hover > a,
	.version3.effect-fill .desk-menu > ul > li.one-page-active > a,
	.version3.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version3.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version3.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		background-color: <?php echo $nz_h3_desk_menu_effect_color; ?>
	}

	.version3.effect-outline .desk-menu > ul > li:hover > a,
	.version3.effect-outline .desk-menu > ul > li.one-page-active > a,
	.version3.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version3.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version3.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		box-shadow: inset 0 0 0 2px <?php echo $nz_h3_desk_menu_effect_color; ?>;
	}

	/*FIXED*/
	.version3.fixed-true.active .header-social-links a {
	    color: <?php echo $nz_h3_header_fixed_social_links_color; ?> !important;
	}

	.version3.fixed-true.active .logo-title {
		color: <?php echo $nz_h3_desk_fixed_menu_color_reg; ?>;
	}
	.version3.fixed-true.active .header-body {
	    background-color: <?php echo $nz_h3_desk_fixed_back_color; ?>;
	}
	.version3.fixed-true.active .desk-menu > ul > li > a {
	    color: <?php echo $nz_h3_desk_fixed_menu_color_reg; ?>;
	}

	.version3.fixed-true.active .desk-menu > ul > li:hover > a,
	.version3.fixed-true.active .desk-menu > ul > li.one-page-active > a,
	.version3.fixed-true.active:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version3.fixed-true.active:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version3.fixed-true.active:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
	    color: <?php echo $nz_h3_desk_fixed_menu_color_hov; ?>;
	}

	.version3.fixed-true.active .search-true.cart-false .search-toggle:after,
	.version3.fixed-true.active .cart-true .desk-cart-wrap:after {
		background-color: <?php echo focuson_ninzio_hex_to_rgba($nz_h3_desk_fixed_menu_color_reg,0.2); ?>;
	}

	<?php if (isset($GLOBALS['focuson_ninzio']['h3-desk-fixed-icons-version']) && $GLOBALS['focuson_ninzio']['h3-desk-fixed-icons-version'] == 'light'): ?>
		.version3.fixed-true.active .search-toggle,
		.version3.fixed-true.active .desk-cart-wrap {
		    box-shadow: inset 0 0 0 2px <?php echo focuson_ninzio_hex_to_rgba($nz_h3_desk_fixed_menu_color_reg,0.4); ?>;
		}
	<?php else: ?>
		.version3.fixed-true.active .search-toggle,
		.version3.fixed-true.active .desk-cart-wrap {
		    box-shadow: inset 0 0 0 2px <?php echo focuson_ninzio_hex_to_rgba($nz_h3_desk_fixed_menu_color_reg,0.2); ?>;
		}
	<?php endif ?>

	.version3.fixed-true.active .desk-cart-toggle span {
	    color: <?php echo $nz_h3_desk_fixed_cart_bubble_text_color; ?>;
		background-color: <?php echo $nz_h3_desk_fixed_cart_bubble_back_color; ?>;
	}

	.version3.fixed-true.active.effect-outline .desk-menu > ul > li:hover > a,
	.version3.fixed-true.active.effect-outline .desk-menu > ul > li.one-page-active > a,
	.version3.fixed-true.active.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version3.fixed-true.active.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version3.fixed-true.active.effect-outline:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		box-shadow: inset 0 0 0 2px <?php echo $nz_h3_desk_fixed_menu_effect_color; ?>;
	}

	.version3.fixed-true.active.effect-underline .desk-menu > ul > li > a:after,
	.version3.fixed-true.active.effect-overline .desk-menu > ul > li > a:after,
	.version3.fixed-true.active.effect-fill .desk-menu > ul > li:hover > a,
	.version3.fixed-true.active.effect-fill .desk-menu > ul > li.one-page-active > a,
	.version3.fixed-true.active.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-item > a,
	.version3.fixed-true.active.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-parent > a,
	.version3.fixed-true.active.effect-fill:not(.one-page-top) .desk-menu > ul > li.current-menu-ancestor > a {
		background-color: <?php echo $nz_h3_desk_fixed_menu_effect_color; ?>;
	}

	.one-page-bullets a[href*="#"]:hover,
	.one-page-bullets .one-page-active a[href*="#"] {
		box-shadow:inset 0 0 0 10px <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?>;
	}

	.desk-menu > ul > li > a > .txt .label:before {
		border-color: <?php echo $GLOBALS['focuson_ninzio']['main-color']; ?> transparent transparent transparent;
	}

</style>

