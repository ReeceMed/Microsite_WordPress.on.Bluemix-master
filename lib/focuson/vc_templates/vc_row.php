<?php

	extract(shortcode_atts(array(
		'full_width'            => 'false',
		'autoheight'            => 'false',
		'background_color'      => '',
		'background_image'      => '',
		'background_repeat'     => 'no-repeat',
		'background_position'   => 'left top',
		'background_attachment' => 'scroll',
		'img_animate'           => 'false',
		'animation_dir'         => 'horizontal',
		'animation_speed'       => '35000',
		'video_poster'          => '',
		'overlay_color'         => '',
		'overlay_pattern'       => '',
		'padding_top'           => '20',
		'padding_bottom'        => '20',
		'padding_left'          => '0',
		'padding_right'         => '0',
		'parallax'              => 'false',
		'el_class'              => '',
		'id'                    => '',
		'video'                 => 'false',
		'webm_video'            => '',
		'mp4_video'             => '',
		'ogv_video'             => ''
	), $atts));
	
	$output          = '';
	$styles          = '';
	$parallax_styles = '';
	$fixed_styles    = '';
	$overlay_styles  = '';
	$data_img_width  = "";
	$data_img_height = "";

	if ($img_animate == 'true') {
		$parallax = 'false';
		$background_attachment = "scroll";
	}

	if(!isset($animation_speed) || empty($animation_speed)) {
		$animation_speed = '35000';
	}

	if(isset($overlay_color) && !empty($overlay_color)) {
		$overlay_styles .= 'background-color:'.$overlay_color.';';
	}

	if(isset($overlay_pattern) && !empty($overlay_pattern)) {
		$overlay_attributes = wp_get_attachment_image_src($overlay_pattern, 'full');
		$overlay_pattern =  $overlay_attributes[0];
		$overlay_styles .= 'background-image:url('.$overlay_pattern.');';
	}

	if(isset($background_color) && !empty($background_color)) {
		$styles .= 'background-color:'.$background_color.';';
	}

	if(isset($background_image) && !empty($background_image)) {

		if(empty($background_repeat)) {$background_repeat = "no-repeat";}
		if(empty($background_position)){$background_position = "50% 50%";}
		if(empty($background_attachment)) {$background_attachment = "scroll";}

		if ($parallax == "true" || $background_attachment == "fixed") {
			$background_repeat = "no-repeat";
			$background_position = "center top";
		}

		if ($parallax == "true") {$background_attachment = "scroll";}

		$image_attributes = wp_get_attachment_image_src($background_image, 'full');
		$background_image = $image_attributes[0];

		$data_img_width = 'data-img-width="'.$image_attributes[1].'"';
		$data_img_height = 'data-img-height="'.$image_attributes[2].'"';

		if ($parallax == "true"){
			$parallax_styles .= "-webkit-background-size: cover; -moz-background-size: cover; background-size: cover;";
			$parallax_styles .= 'background-image:url('.$background_image.');background-repeat:'.$background_repeat.';background-position:'.$background_position.';background-attachment:'.$background_attachment.';';
		} else {
			if ($background_attachment == "fixed") {
				$fixed_styles .= "-webkit-background-size: cover; -moz-background-size: cover; background-size: cover;";
				$fixed_styles .= 'background-image:url('.$background_image.');background-repeat:'.$background_repeat.';background-position:'.$background_position.';';
			} else {				
				if ($background_repeat == "no-repeat") {$styles .= "-webkit-background-size: cover; -moz-background-size: cover; background-size: cover;";}
				$styles .= 'background-image:url('.$background_image.');background-repeat:'.$background_repeat.';background-position:'.$background_position.';background-attachment:'.$background_attachment.';';
			}
			
		}

	}

	if(isset($padding_top) && !empty($padding_top)) {
		$styles .= 'padding-top:'.$padding_top.'px;';
	}
	if(isset($padding_bottom) && !empty($padding_bottom)) {
		$styles .= 'padding-bottom:'.$padding_bottom.'px;';
	}

	if(isset($padding_left) && !empty($padding_left)) {
		$styles .= 'padding-left:'.$padding_left.'px;';
	}
	if(isset($padding_right) && !empty($padding_right)) {
		$styles .= 'padding-right:'.$padding_right.'px;';
	}

	if (isset($id) && !empty($id)) {
		$id = 'id="'.$id.'"';
	}

	$output .= '<div '.$id.' class="nz-section '.sanitize_html_class($animation_dir).' autoheight-'.sanitize_html_class($autoheight).' animate-'.sanitize_html_class($img_animate).' full-width-'.sanitize_html_class($full_width).' '.sanitize_html_class($el_class).'" '.$data_img_width.' '.$data_img_height.' data-animation-speed="'.absint($animation_speed).'" data-parallax="'.esc_attr($parallax).'" style="'.esc_attr($styles).'">';
		
		if ($video == "true") {

			if(isset($video_poster) && !empty($video_poster)) {
				$video_attributes = wp_get_attachment_image_src($video_poster, 'full');
				$video_poster =  $video_attributes[0];
				$output .= '<div class="nz-video-poster" style="background-image:url('.$video_poster.');">&nbsp;</div>';
			}

			$output .= '<div class="nz-video-overlay" style="'.esc_attr($overlay_styles).'">&nbsp;</div>';
			$output .= '<video class="nz-section-back-video" autoplay preload="auto" loop="loop" muted="muted" poster="'.FOCUSON_NINZIO_IMAGES.'/transparent.png">';
				if ($mp4_video){
			    	$output .= '<source type="video/mp4" src="'.esc_url($mp4_video).'"/>';
				}
			    if ($webm_video){
			    	$output .= '<source type="video/webm" src="'.esc_url($webm_video).'"/>';
			    }
			    if ($ogv_video){
			    	$output .= '<source type="video/ogg" src="'.esc_url($ogv_video).'"/>';
			    }
			$output .= '</video>';
		}

		if ($parallax == 'true') {
			$output .= '<div style="'.esc_attr($parallax_styles).'" class="parallax-container"></div>';
		}

		if ($background_attachment == 'fixed') {
			$output .= '<div style="'.esc_attr($fixed_styles).'" class="fixed-container"></div>';
		}

		if ($full_width == "true") {
			$output .= '<div class="nz-row">'.do_shortcode($content).'</div>';
		} else {
			$output .= '<div class="container"><div class="nz-row">'.do_shortcode($content).'</div></div>';
		}
		
		
	$output .= '</div>';
	echo $output;
?>