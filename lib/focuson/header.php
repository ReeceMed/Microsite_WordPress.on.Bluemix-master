<?php 
	focuson_ninzio_global_variables();
	include(get_template_directory().'/includes/html-class.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js ie6 oldie <?php echo $shop_class; ?> <?php echo $blank_class; ?> <?php echo $post_class; ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie <?php echo $shop_class; ?> <?php echo $blank_class; ?> <?php echo $post_class; ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie <?php echo $shop_class; ?> <?php echo $blank_class; ?> <?php echo $post_class; ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]><html class="no-js ie9 oldie <?php echo $shop_class; ?> <?php echo $blank_class; ?> <?php echo $post_class; ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js <?php echo $shop_class; ?> <?php echo $blank_class; ?> <?php echo $post_class; ?>" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<!-- META TAGS -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- LINK TAGS -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<?php include(get_template_directory().'/includes/dynamic-styles.php'); ?>
	<?php include(get_template_directory().'/includes/header/header-opt.php'); ?>
</head>
<body <?php body_class(); ?>>
<!-- general wrap start -->
<div id="gen-wrap">
	<!-- wrap start -->
	<div id="wrap" class="nz-<?php echo $nz_layout; ?>">

		<?php if (isset($GLOBALS['focuson_ninzio']['header-version']) && $GLOBALS['focuson_ninzio']['header-version'] == "version2"): ?>
			<?php include(get_template_directory().'/includes/header/header-2.php'); ?>
			<div class="page-content-wrap">
			<?php if (is_page()): ?>
				<?php get_template_part( '/includes/page/content-page-header' ); ?>
			<?php endif ?>
		<?php elseif (isset($GLOBALS['focuson_ninzio']['header-version']) && $GLOBALS['focuson_ninzio']['header-version'] == "version3"): ?>
			<div class="page-content-wrap">
			<?php if (is_page()): ?>
				<?php get_template_part( '/includes/page/content-page-header-v2' ); ?>
			<?php endif ?>
		<?php else: ?>
			<?php include(get_template_directory().'/includes/header/header-1.php'); ?>
			<div class="page-content-wrap">
			<?php if (is_page()): ?>
				<?php get_template_part( '/includes/page/content-page-header' ); ?>
			<?php endif ?>
		<?php endif ?>
		
