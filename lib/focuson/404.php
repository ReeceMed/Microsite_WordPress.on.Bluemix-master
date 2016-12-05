<?php 
    focuson_ninzio_global_variables();

    $styles    = "";
    $styles_fp = "";

    $styles_title       = "";
    $styles_breadcrumbs = "";

    $nz_rh_version          = (isset( $GLOBALS['focuson_ninzio']['rh-version']) && !empty($GLOBALS['focuson_ninzio']['rh-version'])) ? $GLOBALS['focuson_ninzio']['rh-version'] : 'version1'; 
    $nz_text_color          = (isset( $GLOBALS['focuson_ninzio']['tech_rh_text_color']) && !empty($GLOBALS['focuson_ninzio']['tech_rh_text_color'])) ? $GLOBALS['focuson_ninzio']["tech_rh_text_color"] : "";
    $nz_back_color          = (isset( $GLOBALS['focuson_ninzio']['tech_rh_back']['background-color']) && !empty($GLOBALS['focuson_ninzio']['tech_rh_back']['background-color'])) ? $GLOBALS['focuson_ninzio']['tech_rh_back']['background-color'] : "";
    $nz_back_img            = (isset( $GLOBALS['focuson_ninzio']['tech_rh_back']['background-image']) && !empty($GLOBALS['focuson_ninzio']['tech_rh_back']['background-image'])) ? $GLOBALS['focuson_ninzio']['tech_rh_back']['background-image'] : "";
    
    $nz_text_back_color     = (isset( $GLOBALS['focuson_ninzio']['tech_rh_text_back_color']['color']) && !empty($GLOBALS['focuson_ninzio']['tech_rh_text_back_color']['color'])) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']["tech_rh_text_back_color"]['color'],$GLOBALS['focuson_ninzio']["tech_rh_text_back_color"]['alpha']) : "#333333";

    $nz_breadcrumbs_icon         = (isset( $GLOBALS['focuson_ninzio']['tech_breadcrumbs_icon']) && !empty($GLOBALS['focuson_ninzio']['tech_breadcrumbs_icon'])) ? $GLOBALS['focuson_ninzio']["tech_breadcrumbs_icon"] : "dark";
    $nz_breadcrumbs_back_color   = (isset( $GLOBALS['focuson_ninzio']['tech_breadcrumbs_back_color']['color']) && !empty($GLOBALS['focuson_ninzio']['tech_breadcrumbs_back_color']['color'])) ? focuson_ninzio_hex_to_rgba($GLOBALS['focuson_ninzio']["tech_breadcrumbs_back_color"]['color'],$GLOBALS['focuson_ninzio']["tech_breadcrumbs_back_color"]['alpha']) : "#ffffff";
    $nz_breadcrumbs_text_color   = (isset( $GLOBALS['focuson_ninzio']['tech_breadcrumbs_text_color']) && !empty($GLOBALS['focuson_ninzio']['tech_breadcrumbs_text_color'])) ? $GLOBALS['focuson_ninzio']["tech_breadcrumbs_text_color"] : "#777777";
    
    $nz_back_img_repeat     = (isset( $GLOBALS['focuson_ninzio']['tech_rh_back']['background-repeat']) && !empty($GLOBALS['focuson_ninzio']['tech_rh_back']['background-repeat'])) ? $GLOBALS['focuson_ninzio']['tech_rh_back']['background-repeat'] : "no-repeat";
    $nz_back_img_position   = (isset( $GLOBALS['focuson_ninzio']['tech_rh_back']['background-position']) && !empty($GLOBALS['focuson_ninzio']['tech_rh_back']['background-position'])) ? $GLOBALS['focuson_ninzio']['tech_rh_back']['background-position'] : "left top";
    $nz_back_img_attachment = (isset( $GLOBALS['focuson_ninzio']['tech_rh_back']['background-attachment']) && !empty($GLOBALS['focuson_ninzio']['tech_rh_back']['background-attachment'])) ? $GLOBALS['focuson_ninzio']['tech_rh_back']['background-attachment'] : "scroll";
    $nz_back_img_size       = (isset( $GLOBALS['focuson_ninzio']['tech_rh_back']['background-size']) && !empty($GLOBALS['focuson_ninzio']['tech_rh_back']['background-size'])) ? $GLOBALS['focuson_ninzio']['tech_rh_back']['background-size'] : "auto";
    $nz_parallax            = (isset( $GLOBALS['focuson_ninzio']['tech_parallax']) && !empty($GLOBALS['focuson_ninzio']['tech_parallax'])) ? $GLOBALS['focuson_ninzio']["tech_parallax"] : "false";

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
<?php get_header(); ?>
<header class="rich-header tech-header <?php echo $nz_rh_version; ?> icon-<?php echo $nz_breadcrumbs_icon; ?>" data-parallax="<?php echo $nz_parallax; ?>" style="<?php echo $styles; ?>">
    <?php if ($nz_parallax == "true"): ?>
        <div class="parallax-container" style="<?php echo $styles_fp; ?>">&nbsp;</div>
    <?php endif ?>
    <?php if ($nz_back_img_attachment == "fixed"): ?>
        <div class="fixed-container" style="<?php echo $styles_fp; ?>">&nbsp;</div>
    <?php endif ?>
	<div class="container nz-clearfix">
        <?php if ($nz_rh_version == "version2"): ?>
            <div class="rh-content">
                <h1 style="<?php echo $styles_title; ?>"><?php echo esc_html__('404 Error Page', 'focuson'); ?></h1>                
                <div class="rh-separator">&nbsp;</div>
                <div style="<?php echo $styles_breadcrumbs; ?>" class="nz-breadcrumbs nz-clearfix"><?php focuson_ninzio_breadcrumbs(); ?></div>
            </div>
        <?php else: ?>
            <h1 style="<?php echo $styles_title; ?>"><?php echo esc_html__('404 Error Page', 'focuson'); ?></h1>                
            <div style="<?php echo $styles_breadcrumbs; ?>" class="nz-breadcrumbs nz-clearfix"><?php focuson_ninzio_breadcrumbs(); ?></div>
        <?php endif ?>
	</div>
</header>
<div id="nz-content" class='content nz-clearfix padding-true'>
	<div class='container'>
		<div class="error404-wrap">
			<div class="error404-big">404</div>
			<h3 class="error404-title"><?php echo esc_html__("Page not found", 'focuson'); ?></h3>
			<a class="button button-normal grey full-false medium square animate-false anim-type-ghost hover-fill" href="<?php echo esc_url(home_url('/')); ?>" target="_self"><span class="txt"><?php echo esc_html__('Goto homepage', 'focuson'); ?></span></a>
		</div>
	</div>
</div>
<!-- container end -->
<?php get_footer(); ?>
