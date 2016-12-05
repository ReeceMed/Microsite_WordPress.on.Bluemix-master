<?php

	extract(shortcode_atts(array(
		'width'   => '1/1',
		'offset'  => '',
		'animate' => 'false',
		'effect'  => 'fade',
		'margin_b' => 'true',
		'text_align' => 'left',
		'border_width' => '',
		'border_color' => '',
		'color'       => '',
		'back_color' => '',
		'extra_class'=> '',
		'pl'=> '0',
		'pr'=> '0',
		'pt'=> '0',
		'pb'=> '0'
	), $atts));

	$output = "";
	$styles = "";
	$col_styles = "";

	$class = $width;
	$class = focuson_ninzio_column_convert($class);
	$width = wpb_translateColumnWidthToSpan( $width );
	$width = vc_column_offset_class_merge( $offset, $width );


	if ($margin_b == "false") {
		$margin_b = 'data-margin="false"';
	} else {
		$margin_b = "";
	}

	if (isset($pl) && !empty($pl)) {$styles .= 'padding-left:'.absint($pl).'px;';}
	if (isset($pr) && !empty($pr)) {$styles .= 'padding-right:'.absint($pr).'px;';}
	if (isset($pt) && !empty($pt)) {$styles .= 'padding-top:'.absint($pt).'px;';}
	if (isset($pb) && !empty($pb)) {$styles .= 'padding-bottom:'.absint($pb).'px;';}

	if (isset($color) && !empty($color)) {
		$styles .= 'color:'.$color.';';
	}

	if (isset($back_color) && !empty($back_color)) {
		$col_styles .= 'background-color:'.$back_color.';';
	}

	if (isset($border_width) && !empty($border_width)) {
		if (isset($border_color) && !empty($border_color)) {
			$col_styles .= 'box-shadow: inset 0 0 0 '.absint($border_width).'px '.$border_color.';';
		}
	}

	$output .= '<div class="col '.$width.' '.$class.' '.sanitize_html_class($extra_class).' col-animate-'.sanitize_html_class($animate).'" style="'.$col_styles.'" data-effect="'.sanitize_html_class($effect).'" data-align="'.esc_attr($text_align).'" '.$margin_b.'>';
		$output .='<div class="col-inner" style="'.$styles.'">'.do_shortcode($content).'</div>';
	$output .= '</div>';
	echo $output;
	
?>