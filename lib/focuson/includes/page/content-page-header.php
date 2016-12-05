<?php
	
	focuson_ninzio_global_variables();

	$nz_rh_version    = (isset($GLOBALS['focuson_ninzio']['rh-version']) && !empty($GLOBALS['focuson_ninzio']['rh-version'])) ? $GLOBALS['focuson_ninzio']['rh-version'] : 'version1'; 

	$values           = get_post_custom( get_the_ID() );
	$nz_slider_status = "false";
	$nz_rev_slider    = (isset($values["rev_slider"][0])) ? $values["rev_slider"][0] : "";

	$styles             = "";
	$styles_fp          = "";

	$styles_title       = "";
	$styles_breadcrumbs = "";

	$nz_text_color          = (isset( $values['rh_text_color'][0]) && !empty($values['rh_text_color'][0])) ? $values["rh_text_color"][0] : "";
    $nz_back_color          = (isset( $values['rh_back_color'][0]) && !empty($values['rh_back_color'][0])) ? $values["rh_back_color"][0] : "";
    $nz_back_img            = (isset( $values['rh_back_img'][0]) && !empty($values['rh_back_img'][0])) ? $values["rh_back_img"][0] : "";
    
    $nz_text_back_color     = (isset( $values['rh_text_back_color'][0]) && !empty($values['rh_text_back_color'][0])) ? $values["rh_text_back_color"][0] : "#333333";
    $nz_text_back_opacity   = (isset( $values['rh_text_back_opacity'][0]) && !empty($values['rh_text_back_opacity'][0])) ? $values["rh_text_back_opacity"][0] : "1.0";

    $nz_breadcrumbs_icon         = (isset( $values['breadcrumbs_icon'][0]) && !empty($values['breadcrumbs_icon'][0])) ? $values["breadcrumbs_icon"][0] : "dark";
    $nz_breadcrumbs_back_color   = (isset( $values['breadcrumbs_back_color'][0]) && !empty($values['breadcrumbs_back_color'][0])) ? $values["breadcrumbs_back_color"][0] : "#ffffff";
    $nz_breadcrumbs_text_color   = (isset( $values['breadcrumbs_text_color'][0]) && !empty($values['breadcrumbs_text_color'][0])) ? $values["breadcrumbs_text_color"][0] : "#777777";
    $nz_breadcrumbs_back_opacity = (isset( $values['breadcrumbs_back_opacity'][0]) && !empty($values['breadcrumbs_back_opacity'][0])) ? $values["breadcrumbs_back_opacity"][0] : "1.0";
    
    $nz_back_img_repeat     = (isset( $values['rh_back_img_repeat'][0]) && !empty($values['rh_back_img_repeat'][0])) ? $values["rh_back_img_repeat"][0] : "no-repeat";
    $nz_back_img_position   = (isset( $values['rh_back_img_position'][0]) && !empty($values['rh_back_img_position'][0])) ? $values["rh_back_img_position"][0] : "left top";
    $nz_back_img_attachment = (isset( $values['rh_back_img_attachment'][0]) && !empty($values['rh_back_img_attachment'][0])) ? $values["rh_back_img_attachment"][0] : "scroll";
    $nz_back_img_size       = (isset( $values['rh_back_img_size'][0]) && !empty($values['rh_back_img_size'][0])) ? $values["rh_back_img_size"][0] : "auto";
    $nz_parallax            = (isset( $values['parallax'][0]) && !empty($values['parallax'][0])) ? $values["parallax"][0] : "false";

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
		if (!empty($nz_text_back_opacity)) {
			if (!empty($nz_text_back_color)) {
				$styles_title .= 'background-color:'.focuson_ninzio_hex_to_rgba($nz_text_back_color,$nz_text_back_opacity).';';
				$styles_title .= 'padding:10px 25px;';
			}
		} else {
			if (!empty($nz_text_back_color)) {
				$styles_title .= 'background-color:'.$nz_text_back_color.';';
				$styles_title .= 'padding:10px 25px;';
			}
		}

		if (!empty($nz_breadcrumbs_back_opacity)) {
			if (!empty($nz_breadcrumbs_text_color)) {
				$styles_breadcrumbs .= 'background-color:'.focuson_ninzio_hex_to_rgba($nz_breadcrumbs_back_color,$nz_breadcrumbs_back_opacity).';';
				$styles_breadcrumbs .= 'padding:5px 25px;';
			}
		} else {
			if (!empty($nz_breadcrumbs_back_color)) {
				$styles_breadcrumbs .= 'background-color:'.$nz_breadcrumbs_back_color.';';
				$styles_breadcrumbs .= 'padding:5px 25px;';
			}
		}
		
	}
?>
<?php if(shortcode_exists("rev_slider") && !empty($nz_rev_slider)): ?>
	<?php echo(do_shortcode('[rev_slider '.$nz_rev_slider.']')); ?>
<?php else: ?>
	<header class="rich-header page-header <?php echo $nz_rh_version; ?> icon-<?php echo $nz_breadcrumbs_icon; ?>" data-parallax="<?php echo $nz_parallax; ?>" style="<?php echo $styles; ?>">
		<?php if ($nz_parallax == "true"): ?>
			<div class="parallax-container" style="<?php echo $styles_fp; ?>">&nbsp;</div>
		<?php endif ?>
		<?php if ($nz_back_img_attachment == "fixed"): ?>
			<div class="fixed-container" style="<?php echo $styles_fp; ?>">&nbsp;</div>
		<?php endif ?>
		<div class="container nz-clearfix">

			<?php if ($nz_rh_version == "version2"): ?>
				<div class="rh-content">
					<h1 style="<?php echo $styles_title; ?>"><?php echo get_the_title(); ?></h1>				
					<div class="rh-separator">&nbsp;</div>
					<div style="<?php echo $styles_breadcrumbs; ?>" class="nz-breadcrumbs nz-clearfix"><?php focuson_ninzio_breadcrumbs(); ?></div>
				</div>
			<?php else: ?>
				<h1 style="<?php echo $styles_title; ?>"><?php echo get_the_title(); ?></h1>				
				<div style="<?php echo $styles_breadcrumbs; ?>" class="nz-breadcrumbs nz-clearfix"><?php focuson_ninzio_breadcrumbs(); ?></div>	
			<?php endif ?>

		</div>
	</header>
<?php endif ?>
