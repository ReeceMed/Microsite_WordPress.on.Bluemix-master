<?php get_header(); ?>
<?php
	
	focuson_ninzio_global_variables();

	$nz_shop_layout = (isset($GLOBALS['focuson_ninzio']['shop-layout']) && !empty($GLOBALS['focuson_ninzio']['shop-layout'])) ? $GLOBALS['focuson_ninzio']['shop-layout'] : "medium";

    $styles    = "";
    $styles_fp = "";

    $styles_title       = "";
	$styles_breadcrumbs = "";

	$nz_rh_version    = (isset($GLOBALS['focuson_ninzio']['rh-version']) && !empty($GLOBALS['focuson_ninzio']['rh-version'])) ? $GLOBALS['focuson_ninzio']['rh-version'] : 'version1'; 

	$nz_shop_sidebar        = ($GLOBALS['focuson_ninzio']['shop-sidebar']) ? $GLOBALS['focuson_ninzio']['shop-sidebar'] : "none";
	$nz_shop_sidebar_single = ($GLOBALS['focuson_ninzio']['shop-sidebar-single']) ? $GLOBALS['focuson_ninzio']['shop-sidebar-single'] : "none";
	$nz_shop_animation      = ($GLOBALS['focuson_ninzio']['shop-animation'] && $GLOBALS['focuson_ninzio']['shop-animation'] == 1) ? "true" : "false";
	$nz_shop_rp             = ($GLOBALS['focuson_ninzio']['shop-rp'] && $GLOBALS['focuson_ninzio']['shop-rp'] == 1) ? "true" : "false";
	$nz_shop_rpn            = ($GLOBALS['focuson_ninzio']['shop-rpn']) ? $GLOBALS['focuson_ninzio']['shop-rpn'] : 3;
	
	if ($nz_shop_sidebar == "left" || $nz_shop_sidebar == "right") {
		$nz_shop_width = "false";
	}

	$nz_text_color          = (isset( $GLOBALS['focuson_ninzio']['shop_rh_text_color']) && !empty($GLOBALS['focuson_ninzio']['shop_rh_text_color'])) ? $GLOBALS['focuson_ninzio']["shop_rh_text_color"] : "";
    $nz_back_color          = (isset( $GLOBALS['focuson_ninzio']['shop_rh_back']['background-color']) && !empty($GLOBALS['focuson_ninzio']['shop_rh_back']['background-color'])) ? $GLOBALS['focuson_ninzio']['shop_rh_back']['background-color'] : "";
    $nz_back_img            = (isset( $GLOBALS['focuson_ninzio']['shop_rh_back']['background-image']) && !empty($GLOBALS['focuson_ninzio']['shop_rh_back']['background-image'])) ? $GLOBALS['focuson_ninzio']['shop_rh_back']['background-image'] : "";
    
    $nz_text_back_color     = (isset( $GLOBALS['focuson_ninzio']['shop_rh_text_back_color']['color']) && !empty($GLOBALS['focuson_ninzio']['shop_rh_text_back_color']['color'])) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']["shop_rh_text_back_color"]['color'],$GLOBALS['focuson_ninzio']["shop_rh_text_back_color"]['alpha']) : "#333333";

    $nz_breadcrumbs_icon         = (isset( $GLOBALS['focuson_ninzio']['shop_breadcrumbs_icon']) && !empty($GLOBALS['focuson_ninzio']['shop_breadcrumbs_icon'])) ? $GLOBALS['focuson_ninzio']["shop_breadcrumbs_icon"] : "dark";
    $nz_breadcrumbs_back_color   = (isset( $GLOBALS['focuson_ninzio']['shop_breadcrumbs_back_color']['color']) && !empty($GLOBALS['focuson_ninzio']['shop_breadcrumbs_back_color']['color'])) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']["shop_breadcrumbs_back_color"]['color'],$GLOBALS['focuson_ninzio']["shop_breadcrumbs_back_color"]['alpha']) : "#ffffff";
    $nz_breadcrumbs_text_color   = (isset( $GLOBALS['focuson_ninzio']['shop_breadcrumbs_text_color']) && !empty($GLOBALS['focuson_ninzio']['shop_breadcrumbs_text_color'])) ? $GLOBALS['focuson_ninzio']["shop_breadcrumbs_text_color"] : "#777777";
    
    $nz_back_img_repeat     = (isset( $GLOBALS['focuson_ninzio']['shop_rh_back']['background-repeat']) && !empty($GLOBALS['focuson_ninzio']['shop_rh_back']['background-repeat'])) ? $GLOBALS['focuson_ninzio']['shop_rh_back']['background-repeat'] : "no-repeat";
    $nz_back_img_position   = (isset( $GLOBALS['focuson_ninzio']['shop_rh_back']['background-position']) && !empty($GLOBALS['focuson_ninzio']['shop_rh_back']['background-position'])) ? $GLOBALS['focuson_ninzio']['shop_rh_back']['background-position'] : "left top";
    $nz_back_img_attachment = (isset( $GLOBALS['focuson_ninzio']['shop_rh_back']['background-attachment']) && !empty($GLOBALS['focuson_ninzio']['shop_rh_back']['background-attachment'])) ? $GLOBALS['focuson_ninzio']['shop_rh_back']['background-attachment'] : "scroll";
    $nz_back_img_size       = (isset( $GLOBALS['focuson_ninzio']['shop_rh_back']['background-size']) && !empty($GLOBALS['focuson_ninzio']['shop_rh_back']['background-size'])) ? $GLOBALS['focuson_ninzio']['shop_rh_back']['background-size'] : "auto";
    $nz_parallax            = (isset( $GLOBALS['focuson_ninzio']['shop_parallax']) && !empty($GLOBALS['focuson_ninzio']['shop_parallax'])) ? $GLOBALS['focuson_ninzio']["shop_parallax"] : "false";

    if (!empty($nz_back_color)) {$styles .= 'background-color:'.$nz_back_color.';';}
    if (!empty($nz_text_color)) {$styles .= 'color:'.$nz_text_color.';';}
	if (!empty($nz_back_img)) {

		if ($nz_parallax != "true" && $nz_back_img_attachment != "fixed") {
			$styles .= 'background-image:url('.$nz_back_img.');';
    		$styles .= 'background-repeat:'.$nz_back_img_repeat.';';
    		$styles .= 'background-position:'.$nz_back_img_position.';';
    		if ($nz_back_img_size == "cover") {$styles .= '-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;';}
		}

		if ($nz_parallax == "true" || $nz_back_img_attachment == "fixed") {

	    	$nz_back_img_repeat     = "no-repeat";
			$nz_back_img_position   = "center top";
			$nz_back_img_size       = "cover";

			$styles_fp .= 'background-image:url('.$nz_back_img.');';
			$styles_fp .= 'background-repeat:'.$nz_back_img_repeat.';';
			$styles_fp .= 'background-position:'.$nz_back_img_position.';';
	    }

		if ($nz_parallax == "true") {$nz_back_img_attachment = "scroll";}

	}

	if (!empty($nz_breadcrumbs_text_color)) {
		$styles_breadcrumbs .= 'color:'.$nz_breadcrumbs_text_color.';';
	}

	if ($nz_rh_version == 'version2') {
		
		if (!empty($nz_text_back_color)) {
			$styles_title .= 'background-color:'.$nz_text_back_color.';';
			$styles_title .= 'padding:10px 25px;';
		}
	
		if (!empty($nz_breadcrumbs_back_color)) {
			$styles_breadcrumbs .= 'background-color:'.$nz_breadcrumbs_back_color.';';
			$styles_breadcrumbs .= 'padding:5px 25px;';
		}
		
	}


?>
<?php if (isset($GLOBALS['focuson_ninzio']['header-version']) && $GLOBALS['focuson_ninzio']['header-version'] == "version3"): ?>
    <?php include(get_template_directory().'/includes/header/header-3.php'); ?>
<?php endif; ?>
<header class="rich-header shop-header <?php echo $nz_rh_version; ?> icon-<?php echo $nz_breadcrumbs_icon; ?>" data-parallax="<?php echo $nz_parallax; ?>" style="<?php echo $styles; ?>">
    <?php if ($nz_parallax == "true"): ?>
		<div class="parallax-container" style="<?php echo $styles_fp; ?>">&nbsp;</div>
	<?php endif ?>
	<?php if ($nz_back_img_attachment == "fixed"): ?>
		<div class="fixed-container" style="<?php echo $styles_fp; ?>">&nbsp;</div>
	<?php endif ?>
    <div class="container">
    	<?php if ($nz_rh_version == "version2"): ?>
			<div class="rh-content">
				<?php if (isset($GLOBALS['focuson_ninzio']['shop-title']) && !empty($GLOBALS['focuson_ninzio']['shop-title'])): ?>
					<h1 style="<?php echo $styles_title; ?>"><?php echo esc_attr($GLOBALS['focuson_ninzio']['shop-title']); ?></h1>				
				<?php endif ?>
				<div class="rh-separator">&nbsp;</div>
				<div style="<?php echo $styles_breadcrumbs; ?>" class="nz-breadcrumbs nz-clearfix"><?php focuson_ninzio_breadcrumbs(); ?></div>
			</div>
		<?php else: ?>
			<?php if (isset($GLOBALS['focuson_ninzio']['shop-title']) && !empty($GLOBALS['focuson_ninzio']['shop-title'])): ?>
				<h1 style="<?php echo $styles_title; ?>"><?php echo esc_attr($GLOBALS['focuson_ninzio']['shop-title']); ?></h1>				
			<?php endif ?>
			<div style="<?php echo $styles_breadcrumbs; ?>" class="nz-breadcrumbs nz-clearfix"><?php focuson_ninzio_breadcrumbs(); ?></div>
		<?php endif ?>
    </div>
</header>
<div class="shop-layout-wrap <?php echo $nz_shop_layout; ?> nopadding-<?php echo $nz_shop_rp; ?>" id="nz-target">
	<?php if(is_shop() || is_product_category() || is_product_tag()): ?>
		<div class="loop">
			<div class="container">
				<section class="content lazy shop-layout animation-<?php echo $nz_shop_animation; ?> nz-clearfix">
					<?php if($nz_shop_sidebar == "left"): ?>

						<aside class="sidebar">
							<?php get_sidebar('shop'); ?>
						</aside>

						<section class="main-content right">
							<?php woocommerce_content(); ?>
						</section>

					<?php elseif ($nz_shop_sidebar == "right"): ?>

						<section class="main-content left">
							<?php woocommerce_content(); ?>
						</section>

						<aside class="sidebar">
							<?php get_sidebar('shop'); ?>
						</aside>

					<?php else: ?>
						<?php woocommerce_content(); ?>
					<?php endif; ?>
				</section>
				
			</div>
		</div>
	<?php endif; ?>
	<?php if (is_product()): ?>
		<section class='content nz-clearfix' data-rp="<?php echo $nz_shop_rp; ?>" data-rpn="<?php echo $nz_shop_rpn; ?>">
			<div class="container">

				<?php if($nz_shop_sidebar_single == "left"): ?>
					<aside class="sidebar">
						<?php get_sidebar('shop-single'); ?>
					</aside>
					<section class="main-content right">
						<?php woocommerce_content(); ?>
						<?php get_template_part( '/includes/woocommerce/woocommerce_content_related_products' ); ?>
						<div class="nz-clearfix">&nbsp;</div>
						<?php get_template_part( '/includes/woocommerce-related-products' ); ?>
					</section>
				<?php elseif ($nz_shop_sidebar_single == "right"): ?>
					<section class="main-content left">
						<?php woocommerce_content(); ?>
						<?php get_template_part( '/includes/woocommerce/woocommerce_content_related_products' ); ?>
						<div class="nz-clearfix">&nbsp;</div>
						<?php get_template_part( '/includes/woocommerce-related-products' ); ?>
					</section>
					<aside class="sidebar">
						<?php get_sidebar('shop-single'); ?>
					</aside>
				<?php else: ?>
					<?php woocommerce_content(); ?>
					<div class="nz-clearfix">&nbsp;</div>
					<?php get_template_part( '/includes/woocommerce-related-products' ); ?>
				<?php endif; ?>

			</div>
		</section>
	<?php endif ?>
</div>
<?php get_footer(); ?>