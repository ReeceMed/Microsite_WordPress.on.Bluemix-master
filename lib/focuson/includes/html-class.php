<?php

$blank_class = "";
$post_class  = "";
$shop_class  = "";

if (class_exists('Woocommerce')){
	if (is_cart() || is_checkout()) {$shop_class = "shoping-cart";}
	if (is_account_page()) {$shop_class .= "woo-account";}
}
if (is_page()) {
	$values      = get_post_custom( get_the_ID() );
	$blank       = (isset( $values['blank'][0]) && !empty($values['blank'][0])) ? $values["blank"][0] : 'false';
	$blank_class = "blank-".$blank;
}

if (is_home() || is_author() || is_archive() || is_day() || is_tag() || is_category() || is_month() || is_day() || is_year()) {
	$post_class = "nz-blog";
}

if (is_archive() && 'project' == get_post_type( $post )) {
	$post_class = "nz-port";
}
if (function_exists('is_woocommerce')) {
	if (is_woocommerce()) {
		$post_class = "nz-shop";
	}
}

?>