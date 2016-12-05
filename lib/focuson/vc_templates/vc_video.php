<?php

	extract(shortcode_atts(array(
		'video_poster' => '',
		'webm_video'   => '',
		'mp4_video'    => '',
		'ogv_video'    => '',
		'el_class'     => '',
		'height'       => '',
		'width'        => '',
		'autoplay'     => 'off',
		'loop'         => 'off',
	), $atts));

	$output = "";

	$output .= '<div class="'.sanitize_html_class($el_class).'">';
		$output .= do_shortcode('[video mp4="'.esc_url($mp4_video).'" ogv="'.esc_url($ogv_video).'" webm="'.esc_url($webm_video).'" poster="'.esc_url($video_poster).'" loop="'.$loop.'" autoplay="'.$autoplay.'" width="'.$width.'" height="'.$height.'"]');
	$output .=  '</div>';
	echo $output;
	
?>