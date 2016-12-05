<?php

/*  CLEAR EXTRA TAGS FROM SHORTCODES
/*===================*/

	add_filter("the_content", "ninzio_addons_the_content_filter");
	function ninzio_addons_the_content_filter($content) {
	 
		$block = join("|",array("nz_table","nz_columns","nz_dropcap","nz_highlight","nz_popup","nz_il","nz_btn","nz_fw","nz_sep","nz_icons","nz_gap","nz_youtube","nz_vimeo","nz_you","nz_vim","nz_colorbox"));
	 
		$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
			
		$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	 
		return $rep;
	 
	}

/*  TINYMCE CONFIG
/*===================*/

	function ninzio_addons_tinyMCE_more_buttons($buttons) {

		$buttons[] = 'fontselect';
		$buttons[] = 'fontsizeselect';
		$buttons[] = 'styleselect';
		return $buttons;

	}
	add_filter("mce_buttons_2", "ninzio_addons_tinyMCE_more_buttons");

	if ( ! function_exists( 'ninzio_addons_font_size' ) ) {
	    function ninzio_addons_font_size( $initArray ){
	        $initArray['fontsize_formats'] = "12px 13px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px";
	        return $initArray;
	    }
	}
	add_filter( 'tiny_mce_before_init', 'ninzio_addons_font_size' );

	function ninzio_addons_styles_dropdown( $settings ) {

		$items = array();

		for ($i=16; $i < 101; $i = $i + 2) { 
			array_push($items, array('title'  => $i.'px','inline' => 'span','styles' => array('lineHeight' => $i.'px')));
		};

		$new_styles = array(
			array(
				'title'	=> esc_html__( 'Line height', 'ninzio-addons' ),
				'items'	=> $items
			),
		);

		$settings['style_formats_merge'] = true;
		$settings['style_formats'] = json_encode( $new_styles );
		return $settings;

	}
	add_filter( 'tiny_mce_before_init', 'ninzio_addons_styles_dropdown' );

/*  COLUMNS
/*===================*/

	function nz_col( $atts, $content = null ) {

		extract(shortcode_atts(
			array(
				'width' => '3'
			), $atts)
		);

		$output = "";
		$output .= '<div class="col col'.(12/$width).' col-animate-false">';
			$output .='<div class="col-inner">'.do_shortcode($content).'</div>';
		$output .= '</div>';

		return $output;  		
	}

	add_shortcode('nz_col', 'nz_col');

	function nz_row( $atts, $content = null ) {
		$output = '<div class="nz-row">'.do_shortcode($content).'</div>';
		return $output;
	}

	add_shortcode('nz_row', 'nz_row');

/*  COLORBOX
/*===================*/

	function nz_colorbox( $atts, $content = null ) {

		extract(shortcode_atts(array(
	        'border_radius'    => '',
	        'border_width'     => '',
	        'background_color' => '',
	        'border_color'     => '',
	        'color'            => '',
	        'padding'          => '20px 20px 20px 20px',
	        'width'            => '',
	    ), $atts));


	    $style = "";
	    $output = "";

	    static $id_counter = 1;

	    if(empty($width)){
	    	$style .= 'width:100%;';
	    } else {
	    	$style .= 'width:'.absint($width).'px;';
	    }

	    if(!is_numeric($border_radius) || $border_radius < 0 ){$border_radius = "0";}
	    if(!is_numeric($border_width) || $border_width < 0 ){$border_width = "";}

	    if (isset($padding) && !empty($padding)) {
	    	$style .= "padding:".$padding.";";
	    }

	    if (isset($border_radius) && !empty($border_radius)) {
	    	$style .= "border-radius:".absint($border_radius)."px;";
	    }

	    if (isset($border_width) && !empty($border_width)){
	    	$style .= "border-width:".absint($border_width)."px; border-style:solid;";
	    }

	    if (isset($border_color) && !empty($border_color)){
	    	$style .= "border-color:".$border_color.";";
	    }

	    if (isset($background_color) && !empty($background_color)){
	    	$style .= "background-color:".$background_color.";";
	    }

	    if (isset($color) && !empty($color)){
	    	$style .= "color:".$color.";";
	    }

	   $output = '<div data-id="nz-colorbox-'.$id_counter.'" class="nz-colorbox nz-clearfix" style="'.esc_attr($style).'">'.do_shortcode($content).'</div>';

	   $id_counter++;

	   return $output;

	}
	add_shortcode('nz_colorbox', 'nz_colorbox');

/*  HIGHLIGHT
/*===================*/

	function nz_highlight( $atts, $content = null ) {

		extract(shortcode_atts(
			array(
				'color' => ''
			), $atts)
		);

		if (isset($color) && !empty($color)) {
			$color='style="background-color:'.esc_attr($color).';"';
		}

		$output = '<span class="nz-highlight" '.$color.'>'.do_shortcode($content).'</span>';

		return $output;  		
	}

	add_shortcode('nz_highlight', 'nz_highlight');

/*  DROPCAP
/*===================*/

	function nz_dropcap( $atts, $content = null ) {

		extract(shortcode_atts(
			array(
				'type' => 'empty',
				'color' => ''
			), $atts)
		);

		if (isset($color) && !empty($color)) {
			switch ($type) {
				case 'empty':
					$color = 'style="color:'.$color.';"';
					break;
				case 'full':
					$color = 'style="background-color:'.$color.';"';
					break;
			}
		}
			
		$output = '<span class="nz-dropcap '.esc_attr($type).'" '.$color.'>'.do_shortcode($content).'</span>';

		return $output;  		
	}

	add_shortcode('nz_dropcap', 'nz_dropcap');

/*  ICON LIST
/*===================*/
	
	function nz_icon_list_fun($atts, $content = null, $tag) {

		extract(shortcode_atts(
			array(
				'icon' 		       => 'icon-checkmark',
				'icon_color'       => '',
				'background_color' => '',
				'type'             => ''
			), $atts)
		);

		$styles = '';
		$output = '';

		if(isset($icon_color) && !empty($icon_color)){
			$styles .='color:'.$icon_color.';';
		}

		if(isset($background_color) && !empty($background_color) && ($type == "none")){
			$type = 'square';
		}

		if(isset($background_color) && !empty($background_color) && isset($type) && !empty($type)){
			$styles .='background-color:'.$background_color.';';
		}

		switch( $tag ) {
	        case "nz_icon_list":
	            $output .= '<ul class="nz-i-list '.sanitize_html_class($type).'">';
					$split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);
					foreach($split as $haystack) {
			            $output .= '<li><div><span class="icon '.sanitize_html_class($icon).'" style="'.esc_attr($styles).'"></span></div><div>' . $haystack . '</div></li>';
			        }
			    $output .= '</ul>';
	            break;
	        case "nz_il":
	            $content = str_replace('<ul>', '<ul class="nz-i-list '.sanitize_html_class($type).'">', do_shortcode($content));
				$content = str_replace('<li>', '<li><div><span class="icon '.sanitize_html_class($icon).'" style="'.esc_attr($styles).'"></span></div><div>', do_shortcode($content));
				$content = str_replace('</li>', '</div></li>', do_shortcode($content));
				$output = $content;
	            break;
	    }
	
		return $output;

	}

	add_shortcode( 'nz_icon_list', 'nz_icon_list_fun' );
	add_shortcode( 'nz_il', 'nz_icon_list_fun' );

/*  SINGLE IMAGE UPLOAD
/*===================*/

	function nz_single_image($atts, $content = null){
		extract( shortcode_atts( array(
			'image'          => '',
			'img_size'       => 'thumbnail',
			'img_link_large' => 'false',
			'img_link'       => '',
			'link'           => '',
			'alignment'      => 'none',
			'el_class'       => '',
		), $atts ) );

		$link_to = "";
		$output  = "";


		$img = wp_get_attachment_image_src($image,$img_size);

		if ($img[3] == false) {$img_size = "full";}
		$img_size = strtolower($img_size);

		if ( $img == NULL ) $img = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';

		if ( $img_link_large == 'true' ) {
			$link_to = wp_get_attachment_image_src($image,'full');
			$link_to = $link_to[0];
		} else if ( strlen($link) > 0 ) {
			$link_to = $link;
		}

		

		$before_img = '';
		$after_img  = '';
		$thumb_img  = get_post($image);

		if (!empty($thumb_img->post_excerpt)) {
			$before_img = '<figure class="wp-caption aligncenter">';
			$after_img = '<figcaption class="wp-caption-text">'.$thumb_img->post_excerpt.'</figcaption></figure>';
		}

		$img_output = $before_img.'<img class="align'.$alignment.' size-'.$img_size.' wp-image-'.$image.' '.$el_class.'" src="'.$img[0].'" alt="'.$image.'" width="'.$img[1].'" height="'.$img[2].'">'.$after_img;
		$image_string = (!empty( $link_to )) ? '<a class="nz-single-image" href="' . $link_to . '"'. '>' . $img_output . '</a>' : $img_output;
		$output .= $image_string;
		return $output;
	}
	add_shortcode('nz_single_image','nz_single_image');

/*  NINZIO GALLERY
/*===================*/

	function nz_vc_gallery($atts, $content = null){
		extract( shortcode_atts( array(
			'img_size'            => 'thumbnail',
			'images'              => '',
			'link_full'           => 'false',
			'animate'             => 'none',
			'columns'             => '3',
			'el_class'            => '',
			'columns_carousel'    => '',
			'version'             => 'grid',
			'autoplay'            => '',
			'img_size_carousel'   => ''
		), $atts ) );

		$gal_images = "";
		$output = "";

		if (isset($images) && !empty($images)) {
			$images = explode( ',', $images );
			$i = - 1;

			if ($version == "carousel") {
				$columns = $columns_carousel;
				$img_size = $img_size_carousel;
			}

			foreach ( $images as $attach_id ) {
				$i ++;
				if ( $attach_id > 0 ) {
					$img = wp_get_attachment_image_src($attach_id,$img_size);
					$link = wp_get_attachment_image_src($attach_id,'full');

					$thumb_img = get_post( $attach_id );

					$before_img = '';
					$after_img  = '';

					if (!empty($thumb_img->post_excerpt)) {
						$before_img = '<figure class="wp-caption aligncenter">';
						$after_img = '<figcaption class="wp-caption-text">'.$thumb_img->post_excerpt.'</figcaption></figure>';
					}

					if ($link_full == "true") {
						$gal_images .= '<div class="gallery-item animate-item">'.$before_img.'<div class="ninzio-overlay" ><a data-lightbox-gallery="gallery1" class="nz-overlay-before projects-link" href="'.$link[0].'"></a></div><img alt="'.$thumb_img->post_excerpt.'" src="'.$img[0].'" width="'.$img[1].'" height="'.$img[2].'" />'.$after_img.'</div>';
					} else {
						$gal_images .= '<div class="gallery-item animate-item">'.$before_img.'<img src="'.$img[0].'" width="'.$img[1].'" height="'.$img[2].'" />'.$after_img.'</div>';
					}
				}

			}

			if ($link_full == "true") {
				$el_class .= " link-full";
			}

			$output .= '<div class="nz-gallery nz-clearfix '.sanitize_html_class($version).' '.sanitize_html_class($el_class).' animate-'.sanitize_html_class($animate).'" data-columns="'.absint($columns).'" data-autoplay="'.$autoplay.'">'.$gal_images.'</div>';
			return $output;
		}
	}
	add_shortcode('nz_vc_gallery','nz_vc_gallery');

/*  GALLERY SHORTCODE
/*===================*/
	
	remove_shortcode('gallery', 'gallery_shortcode');
	add_shortcode('gallery', 'nz_gallery');

	function nz_gallery($attr) {

		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attr['ids'] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attr['orderby'] ) )
				$attr['orderby'] = 'post__in';
			$attr['include'] = $attr['ids'];
		}

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post ? $post->ID : 0,
			'itemtag'    => 'div',
			'icontag'    => 'div',
			'captiontag' => 'div',
			'columns'    => 3,
			'size'       => 'thumbnail',
			'include'    => '',
			'exclude'    => '',
			'link'       => ''
		), $attr, 'gallery'));
		
		$columns = intval($columns);

		$id = intval($id);
		if ( 'RAND' == $order )
			$orderby = 'none';

		if ( !empty($include) ) {
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty($exclude) ) {
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if ( empty($attachments) )
			return '';

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			return $output;
		}

		$selector = "nz-gallery-{$instance}";
		
		$size_class = sanitize_html_class( $size );

		$output = "<div id='$selector' class='nz-gallery galleryid-{$id} grid gallery-size-{$size_class} nz-clearfix' data-columns='".$columns."''>";

			foreach ( $attachments as $id => $attachment ) {

				$image_output    = wp_get_attachment_image_src( $id, $size, false);
				$img_full        = wp_get_attachment_image_src( $id, 'full', false);

				$before_img = '';
				$after_img  = '';

				if (!empty($attachment->post_excerpt)) {
					$before_img = '<figure class="wp-caption aligncenter">';
					$after_img = '<figcaption class="wp-caption-text">'.$attachment->post_excerpt.'</figcaption></figure>';
				}

				if ( ! empty( $link ) && 'file' === $link ){
					$image_output = $before_img.'<div class="ninzio-overlay" ><a data-lightbox-gallery="gallery2" class="nz-overlay-before projects-link" href="'.$img_full[0].'"></a></div><img alt="'.$attachment->post_excerpt.'" src="'.$image_output[0].'" width="'.$image_output[1].'" height="'.$image_output[2].'">'.$after_img;
				}
				elseif ( ! empty( $link ) && 'none' === $link ){
					$image_output = $before_img.'<img src="'.$image_output[0].'" width="'.$image_output[1].'" height="'.$image_output[2].'" alt="'.$attachment->post_excerpt.'">'.$after_img;
				}
				else {
					$image_output = wp_get_attachment_link( $id, $size, true, false );
				}

				$output .= "<div class='gallery-item'>";
					$output .= $image_output;
				$output .= "</div>";
			}

		$output .= "</div>";

		return $output;
	}

/*  BUTTONS SHORTCODE
/*===================*/

	function nz_btn($atts, $content = null) {

		extract(shortcode_atts(array(
			'text'                  => 'Text',
			'link'                  => 'http://ninzio.com',
			'full_width'            => 'false',
			'target'                => '_self',
			'icon'                  => '',
			'animate'               => 'false',
			'animation_type'        => 'ghost',
			'color'                 => 'default',
			'size'                  => 'small',
			'shape'                 => 'square',
			'type'                  => 'normal',
			'hover_normal'          => 'fill',
			'hover_ghost'           => 'fill',
			'el_class'              => ''
		), $atts));

		$output = "";
		$class  = "button-".sanitize_html_class($type);
		$class  .= " ".sanitize_html_class($color);
		$class  .= " full-".sanitize_html_class($full_width);
		$class  .= " ".sanitize_html_class($size);
		$class  .= " ".sanitize_html_class($shape);
		if (isset($icon) && !empty($icon)) {
			$class  .= " icon-true";
		}
		$class  .= " animate-".sanitize_html_class($animate);
		$class  .= " anim-type-".sanitize_html_class($animation_type);

		switch ($type) {
			case 'normal':
				$class  .= " hover-".sanitize_html_class($hover_normal);
				break;
			case 'ghost':
				$class  .= " hover-".sanitize_html_class($hover_ghost);
				break;
		}

		if (isset($el_class) && !empty($el_class)) {$class  .= " ".sanitize_html_class($el_class);}

		$output .= '<a class="button '.$class.'" href="'.esc_url($link).'" target="'.esc_attr($target).'">';
			
			if ($animation_type == 'ghost' && $animate == "true") {
				$output .= '<span class="txt">'.esc_html($text).'</span>';
				if (isset($icon) && !empty($icon)) {$output .= '<span class="btn-icon '.sanitize_html_class($icon).'"></span>';}
			} else {
				if (isset($icon) && !empty($icon)) {$output .= '<span class="btn-icon '.sanitize_html_class($icon).'"></span>';}
				$output .= '<span class="txt">'.esc_html($text).'</span>';
			}

			
		$output .= '</a>';
		return $output;
	}

	add_shortcode('nz_btn', 'nz_btn');

/*  GAP SHORTCODE
/*===================*/

	function nz_gap( $atts, $content = null ) {
	   extract(shortcode_atts(array('height' => '25'), $atts));
	   return "<div class='gap nz-clearfix' style='height:".absint($height)."px'>&nbsp;</div>";
	}
	add_shortcode('nz_gap', 'nz_gap');

/*  SEPARATOR SHORTCODE
/*===================*/
	
	function nz_sep($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'top'    => '20',
				'bottom' => '20',
				'type'   => 'solid',
				'color'  => '#eeeeee',
				'align'  => 'left',
				'width'  => '',
				'height' => ''
			), $atts)
		);

		$styles = "";

		if (isset($color) && !empty($color)) {
			$styles .= 'border-bottom-color:'.$color.';';
		}

		if (isset($width) && !empty($width)) {
			$styles .= 'width:'.absint($width).'px;';
		} else {
			$styles .= 'width:100%;';
		}

		if (isset($height) && !empty($height)) {
			$styles .= 'border-bottom-width:'.absint($height).'px;';
		}

		if (isset($type) && !empty($type)) {
			$styles .= 'border-bottom-style:'.$type.';';
		}

		if (isset($top) && !empty($top)) {
			$styles .= 'margin-top:'.absint($top).'px;';
		}

		if (isset($bottom) && !empty($bottom)) {
			$styles .= 'margin-bottom:'.absint($bottom).'px;';
		}

		$output = '<div class="sep-wrap '.sanitize_html_class($align).' nz-clearfix"><div class="nz-separator '.sanitize_html_class($type).'" style="'.esc_attr($styles).'">&nbsp;</div></div>';
		return $output;
	}
	add_shortcode('nz_sep', 'nz_sep');

/*  SOCIAL LINKS SHORTCODE
/*===================*/
	
	function nz_sl($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'target' => '_self',
				'align'  => 'left',
			), $atts)
		);

		$output     = "";


		$output .= '<div class="nz-sl social-links nz-clearfix '.sanitize_html_class($align).'">';
		
		foreach($atts as $social => $href) {
			if($href && $social != 'target' && $social != 'align' && $social != 'link_color' && $social != 'link_back_color') {
				if ($social == "email") {
					$output .='<a class="icon-envelope" href="'.esc_attr($href).'" target="'.esc_attr($target).'" ></a>';
				} elseif ($social == "skype") {
					$output .='<a class="icon-skype" href="'.esc_attr($href).'" target="'.esc_attr($target).'" ></a>';
				} else {
					$output .='<a class="icon-'.$social.'" href="'.esc_url($href).'" target="'.esc_attr($target).'" ></a>';
				}
			}
		}

		$output .= '</div>';

		return $output;
	}
	add_shortcode('nz_sl', 'nz_sl');

/*  ICONS SHORTCODE
/*===================*/
	
	function nz_icons($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'type'             => 'none',
				'size'             => 'small',
				'icon'             => 'icon-happy',
				'icon_color'       => '',
				'border_color'     => '',
				'background_color' => '',
				'animate'          => 'false'
			), $atts)
		);

		$output = '';
		$styles = '';

		if (!empty($icon_color)) {$styles .= 'color:'.$icon_color.';';}
		if (!empty($background_color)) {$styles .= 'background-color:'.$background_color.';';}
		if(empty($type)) {$type="square";}
		if(empty($border_color)){$border_color = $background_color;}
		if(!empty($border_color) && !empty($type)) {$styles .= 'border-color:'.$border_color.';';}

		$output .= '<span class="nz-icon '.sanitize_html_class($type).' '.sanitize_html_class($size).' '.sanitize_html_class($icon).' animate-'.sanitize_html_class($animate).'" style="'.esc_attr($styles).'"></span>';
		return $output;
	}
	add_shortcode('nz_icons', 'nz_icons');

/*  ICON SEPARATOR SHORTCODE
/*===================*/
	
	function nz_icon_separator($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon'             => 'icon-happy',
				'border_color'     => '',
				'icon_color'       => ''
			), $atts)
		);

		$output = '';
		$styles = '';

		if (!empty($icon_color))   {$icon_color = 'color:'.$icon_color.';';}
		if (!empty($border_color)) {$border_color = 'background-color:'.$border_color.';';}

		$output .= '<div class="nz-icon-separator">';
			$output .= '<span class="nz-separator-left nz-clearfix">';
				$output .= '<span style="'.esc_attr($border_color).'"></span>';
				$output .= '<span style="'.esc_attr($border_color).'"></span>';
			$output .= '</span>';
			$output .= '<span class="icon '.sanitize_html_class($icon).'" style="'.esc_attr($icon_color).'"></span>';
			$output .= '<span class="nz-separator-right nz-clearfix">';
				$output .= '<span style="'.esc_attr($border_color).'"></span>';
				$output .= '<span style="'.esc_attr($border_color).'"></span>';
			$output .= '</span>';
		$output .= '</div>';
		return $output;
	}
	add_shortcode('nz_icon_separator', 'nz_icon_separator');

/*  VIDEO EMBEDS
/*===================*/
	
	function nz_emb( $atts, $content = null, $tag ) {

	    extract( 
	    	shortcode_atts(
    		array(
    			'id' 	=> '',
    			'width' => '',
    			'modal' => "false",
    			'title' => '',
    			'img'   =>''
    		), $atts)
	    );

	    switch( $tag ) {
	        case "nz_youtube":
	            $src = 'http://www.youtube-nocookie.com/embed/';
	            break;
	        case "nz_vimeo":
	            $src = 'http://player.vimeo.com/video/';
	            break;
	    }

	    $style          ="";
	    $img_attributes ="";

	    if (!empty($width)) {$style = 'max-width:'.absint($width).'px;';}

	    $output ="";

	    if(isset($id) && !empty($id)){
	    	if ($modal == "true") {
	    		
	    		if(isset($img) && !empty($img)) {
					$img_attributes = wp_get_attachment_image_src($img, 'full');
				}

	    		switch( $tag ) {
			        case "nz_youtube":
	    				$output .= '<a class="video-modal" href="https://www.youtube.com/watch?v='.$id.'">';
	    					$output .= '<div class="ninzio-overlay"><div class="ninzio-overlay-content"><div class="video-icon"></div><h3 class="video-title">'.$title.'</h3></div></div>';
	    					$output .= '<img width="'.$img_attributes[1].'" height="'.$img_attributes[2].'" src="'.$img_attributes[0].'">';
	    				$output .= '</a>';
			            break;
			        case "nz_vimeo":
			            $output .= '<a class="video-modal" href="http://vimeo.com/'.$id.'">';
	    					$output .= '<div class="ninzio-overlay"><div class="ninzio-overlay-content"><div class="video-icon"></div><h3 class="video-title">'.$title.'</h3></div></div>';
			            	$output .= '<img width="'.$img_attributes[1].'" height="'.$img_attributes[2].'" src="'.$img_attributes[0].'">';
			            $output .= '</a>';
			            break;
			    }

	    	} else {
	    		$output .='<div class="video-embed" style="'.esc_attr($style).'">';
			    	$output .='<div class="flex-mod">';
			    		$output .= '<iframe frameborder="0" allowfullscreen src="'.$src.esc_attr($id).'" class="iframevideo"></iframe>';
			    	$output .='</div>';
			    $output .='</div>';
	    	}
	    }

	    return $output;
	}
	add_shortcode( 'nz_youtube', 'nz_emb' );
	add_shortcode( 'nz_vimeo', 'nz_emb' );


	function nz_emb_slider( $atts, $content = null, $tag ) {

	    extract( 
	    	shortcode_atts(
    		array(
    			'id' 	=> '',
    			'width' => ''
    		), $atts)
	    );

	    switch( $tag ) {
	        case "nz_you":
	            $src = 'http://www.youtube-nocookie.com/embed/';
	            break;
	        case "nz_vim":
	            $src = 'http://player.vimeo.com/video/';
	            break;
	    }

	    $height="";

	    if (!empty($width)) {$height = round(absint($width)*0.5625,0);}

	    $output ="";

	    if(isset($id) && !empty($id)){
	    	$output .='<div class="video-embed">';
		    	$output .= '<iframe width="'.absint($width).'" height="'.$height.'" src="'.$src.esc_attr($id).'" class="iframevideo"></iframe>';
		    $output .='</div>';
	    }

	    return $output;
	}
	add_shortcode( 'nz_you', 'nz_emb_slider' );
	add_shortcode( 'nz_vim', 'nz_emb_slider' );

/*  SOUNDCLOUD
/*===================*/
	
	function nz_soundcloud($atts) {

		extract( 
		 	shortcode_atts(
			array(
				'url'    => '',
				'width'  => '100%',
				'height' => '166'
			), $atts)
		);

		global $focuson_ninzio;
		$output = "";

		$params = 'color='.substr($GLOBALS['focuson_ninzio']['main-color'], -6).'&auto_play=false&show_artwork=true';

		if(empty($width)) {$width = "100%";} else {absint($width);}

		if(empty($height) || !is_numeric($height)) {$height = "166";}

		if(isset($url) && !empty($url)){
			$output .= '<div class="soundcloud"><iframe width="'.$width.'" height="'.absint($height).'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.esc_url($url).'&amp;'.$params.'"></iframe></div>';
		}
	    
		return $output;
	}

	add_shortcode('nz_soundcloud', 'nz_soundcloud');

/*  TWEETS
/*===================*/
	
	function nz_tweets($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'user_id'  => 'tutsplus',
				'number'   => '3',
				'color'    => '',
				'icon_color' => '',
				'autoplay' => 'false'
			), $atts)
		);

		$output = '';
		$styles = '';
		static $id_counter = 1;

		global $focuson_ninzio;

		$consumer_key        = ($GLOBALS['focuson_ninzio']['tweets-consumer-key']) ? esc_attr($GLOBALS['focuson_ninzio']['tweets-consumer-key']) : "";
		$consumer_secret     = ($GLOBALS['focuson_ninzio']['tweets-consumer-secret']) ? esc_attr($GLOBALS['focuson_ninzio']['tweets-consumer-secret']) : "";
		$access_token        = ($GLOBALS['focuson_ninzio']['tweets-access-token']) ? esc_attr($GLOBALS['focuson_ninzio']['tweets-access-token']) : "";
		$access_token_secret = ($GLOBALS['focuson_ninzio']['tweets-access-token-secret']) ? esc_attr($GLOBALS['focuson_ninzio']['tweets-access-token-secret']) : "";

		if (isset($color) && !empty($color)) {
			$styles .= '#nz-tweets-'.$id_counter.' {color:'.$color.';}#nz-tweets-'.$id_counter.' .owl-controls .owl-page {background-color: '.$color.';}';
		}

		if (isset($icon_color) && !empty($icon_color)) {
			$styles .= '#nz-tweets-'.$id_counter.':before {color:'.$icon_color.';}';
		} else {
			$styles .= '#nz-tweets-'.$id_counter.':before {color:'.$GLOBALS['focuson_ninzio']['main-color'].';}';
		}

		if (!empty($consumer_key) && !empty($consumer_secret) && !empty($access_token) && !empty($access_token_secret)) {

			$args = array(
				'before_widget' => '<div id="nz-tweets-'.$id_counter.'" class="nz-tweets" data-autoplay="'.$autoplay.'"><style>'.$styles.'</style>',
				'after_widget'  => '</div>'
			);

			$instance = array(
				'title'               => '',
				'consumer_key'        => $consumer_key,
				'consumer_secret'     => $consumer_secret,
				'access_token'        => $access_token,
				'access_token_secret' => $access_token_secret,
				'twitter_id'          => $user_id,
				'count'               => absint($number)
			);

			$output .= ninzio_addons_get_the_widget( 'Ninzio_Addons_WP_Widget_Twitter', $instance,$args);

		}

		$id_counter++;

		return $output;
	}

	add_shortcode('nz_tweets', 'nz_tweets');

/*  MAILCHIMP SIGNUP
/*===================*/
	
	function nz_mailchimp($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'action'      => '',
				'name'        => ''
			), $atts)
		);

		$output = "";

		if (isset($action) && !empty($action) && isset($name) && !empty($name)) {

			$args = array(
				'before_widget' => '<div class="nz-mailchimp widget_mailchimp">',
				'after_widget'  => '</div>'
			);


			$instance = array(
				'title'       => '',
				'subtitle'    => '',
				'action'      => $action,
	 			'name'        => $name,
	 			'description' => $content
			);

			$output .= ninzio_addons_get_the_widget( 'Focuson_Ninzio_WP_Widget_Mailchimp', $instance,$args);

		}

		return $output;
		
	}

	add_shortcode('nz_mailchimp', 'nz_mailchimp');

/*  TAGLINE
/*===================*/
	
	function nz_tagline($atts, $content = null) {

		extract(shortcode_atts(array(
			'title'                 => 'Super call to action title goes here',
			'color'                 => '',
			'button_color'          => 'white',
			'link'                  => '',
			'icon'                  => '',
			'text'                  => 'Click here',
			'background_color'      => '',
			'background_image'      => ''
		), $atts));
		
		$output             = '';
		$styles             = '';
		$title_styles       = '';
		$icon_styles        = '';
		static $id_counter  = 1;

		if(isset($color) && !empty($color)) {
			$title_styles .= 'color:'.$color.' !important;';
			$icon_styles .= 'color:'.$color.';';
		}

		if(isset($background_color) && !empty($background_color)) {
			$styles       .= 'background-color:'.$background_color.';';
		}

		if (isset($background_image) && !empty($background_image)) {
			$image_attributes = wp_get_attachment_image_src($background_image, 'full');
			$background_image = $image_attributes[0];
			$styles       .= 'background-image:url('.$background_image.');';
		}

		$output .= '<div id="nz-tagline-'.$id_counter.'" style="'.$styles.'" class="nz-tagline">';
			$output .= '<div class="container nz-clearfix">';
				if (isset($icon) && !empty($icon)) {
					$output .= '<span style="'.$icon_styles.'" class="tagline-icon '.$icon.'"></span>';
				}
				if (isset($title) && !empty($title)) {
					$output .= '<span class="tagline-title" style='.esc_attr($title_styles).'>'.esc_html($title).'</span>';
				}
				if (isset($link) && !empty($link)) {
					$output .= '<a class="button button-normal full-false medium square animate-false anim-type-ghost hover-fill '.$button_color.' icon-false" href="'.$link.'" target="_self"><span class="txt">'.esc_html($text).'</span></a>';
				}
			$output .= '</div>';
		$output .= '</div>';

		$id_counter++;

		return $output;

	}

	add_shortcode('nz_tagline', 'nz_tagline');

/*  POPUP
/*===================*/
	
	function nz_popup($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'color' => '#333333',
				'message' => 'Your popup message goes here'
			), $atts)
		);

		$output = '<span class="nz-popup icon-plus" data-tipso="'.strip_tags($message).'" style="background-color:'.esc_attr($color).';"><span style="border-color:'.esc_attr($color).';" class="nz-popup-border"></span></span>';

		return $output;
	}

	add_shortcode('nz_popup', 'nz_popup');

/*  SLIDER
/*===================*/
	
	function nz_media_slider($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'effect' => 'fade',
				'bul' => 'true',
				'nav' => 'true',
				'autoplay' => 'true'
			), $atts)
		);

		$output = '<div data-effect="'.esc_attr($effect).'" data-bullets="'.esc_attr($bul).'" data-autoplay="'.esc_attr($autoplay).'" data-navigation="'.esc_attr($nav).'" class="lazy nz-media-slider">';
			$output .= '<ul class="slides">';
				$output .= do_shortcode($content);
			$output .= '</ul>';
		$output .= '</div>';

		return $output;
	}
	add_shortcode('nz_media_slider', 'nz_media_slider');

	function nz_media_slide($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'type'        => 'youtube',
				'id'          => '',
				'src'         => '',
				'description' => ''
			), $atts)
		);

		if(isset($src) && !empty($src) && empty($id)){
			$type = "img";
		}

		$output = '';

		$output .= '<li>';
			switch ($type) {
				case 'youtube':

					if (isset($id) && !empty($id)) {
						$output .='<div class="video-embed">';
					    	$output .='<div class="flex-mod">';
					    		$output .= '<iframe src="https://www.youtube.com/embed/'.esc_attr($id).'" frameborder="0" allowfullscreen class="iframevideo" title="'.esc_attr($description).'"></iframe>';
					    	$output .='</div>';
					    $output .='</div>';
					}
					
					break;
				case 'vimeo':

					if (isset($id) && !empty($id)) {
						$output .='<div class="video-embed">';
					    	$output .='<div class="flex-mod">';
					    		$output .= '<iframe src="http://player.vimeo.com/video/'.esc_attr($id).'" frameborder="0" allowfullscreen class="iframevideo" title="'.esc_attr($description).'"></iframe>';
					    	$output .='</div>';
					    $output .='</div>';
					}

					break;
				case 'img':
					if (isset($src) && !empty($src)) {
						$image_attributes = wp_get_attachment_image_src($src, 'full');
						$src = $image_attributes[0];
						$output .='<img src="'.esc_url($src).'" alt="'.esc_attr($description).'">';
					}
					break;
			}
		$output .= '</li>';
		return $output;
	}
	add_shortcode('nz_media_slide', 'nz_media_slide');

/*  TIMER
/*===================*/
	
	function nz_timer($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'enddate'      => '',
				'days'         => 'Days',
				'hours'        => 'Hours',
				'minutes'      => 'Minutes',
				'seconds'      => 'Seconds',
				'value_color'  => '',
				'text_color'   => ''
			), $atts)
		);

		static $id_counter = 1;

		$output = "";
		$text_color2 = "";

		if (isset($enddate) && !empty($enddate)) {
			$enddate = 'data-enddate="'.$enddate.'"';
		}

		if (isset($days) && !empty($days)) {
			$days = esc_attr($days);
		}

		if (isset($hours) && !empty($hours)) {
			$hours = esc_attr($hours);
		}

		if (isset($minutes) && !empty($minutes)) {
			$minutes = esc_attr($minutes);
		}

		if (isset($seconds) && !empty($seconds)) {
			$seconds = esc_attr($seconds);
		}

		if (isset($text_color) && !empty($text_color)) {
			$text_color = 'style="color:'.$text_color.';"';
		}

		if (isset($value_color) && !empty($value_color)) {
			$value_color = 'style="color:'.$value_color.';"';
		}

		$output .='<div id="nz-timer-'.$id_counter.'" class="nz-timer nz-clearfix" '.$enddate.'>';
			$output .='<ul>';
			  $output .='<li><div '.$text_color2.' class="timer-wrap"><span class="days" '.$value_color.'>00</span><p class="days_text" '.$text_color.'>'.$days.'</p></div></li>';
				$output .='<li><div '.$text_color2.' class="timer-wrap"><span class="hours" '.$value_color.'>00</span><p class="hours_text" '.$text_color.'>'.$hours.'</p></div></li>';
				$output .='<li><div '.$text_color2.' class="timer-wrap"><span class="minutes" '.$value_color.'>00</span><p class="minutes_text" '.$text_color.'>'.$minutes.'</p></div></li>';
				$output .='<li><div '.$text_color2.' class="timer-wrap"><span class="seconds" '.$value_color.'>00</span><p class="seconds_text" '.$text_color.'>'.$seconds.'</p></div></li>';
			$output .='</ul>';
		$output .='</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('nz_timer', 'nz_timer');

/*  ALERT MESSAGE
/*===================*/
	
	function nz_alert($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'type' => 'note'
			), $atts)
		);

		$output = '';

		$output .= '<div class="alert '.sanitize_html_class($type).'">';
			$output .= '<div class="alert-message">'.strip_tags($content).'</div>';
			$output .= '<span class="close-alert">X</span>';
		$output .= '</div>';

		return $output;
	}

	add_shortcode('nz_alert', 'nz_alert');

/*  GOOGLE MAP
/*===================*/
	
	function nz_gmap($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'zoom'    => '18',
				'x_coords'=> '53.339381',
				'y_coords'=> '-6.260405',
				'type'    => 'roadmap',
				'width'   => '100%',
				'height'  => '480px',
				'marker'  => '',
				'animate' => 'false'
			), $atts)
		);

		static $id = 1;
		$output ='';

		if(empty($width)) {$width = "100%";}
		if(empty($height)) {$height = "480px";}
		if(empty($zoom) || !is_numeric($zoom) || $zoom < 0){$zoom = "18";}

		if (!isset($marker) || empty($marker)) {
			$marker = PRIMETRANS_IMAGES.'/google_map_marker.png';
		} else {
			$marker_ats = wp_get_attachment_image_src($marker, 'full');
			$marker     =  $marker_ats[0];
		}

		$output .= '<div class="map" id="gmap-'.$id.'" data-animate="'.esc_attr($animate).'"  data-x="'.esc_attr($x_coords).'" data-y="'.esc_attr($y_coords).'" data-type="'.esc_attr($type).'" data-zoom="'.absint($zoom).'" data-marker="'.$marker.'" style="width:'.$width.';height:'.$height.';"></div>';

		$id++;

		return $output;

	}
	add_shortcode('nz_gmap', 'nz_gmap');

/*  ICON-PROGRESS-BAR
/*===================*/
	
	function nz_icon_progress($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon'           => 'icon-star3',
				'inactive_color' => '',
				'active_color'   => '',
				'active'         => '7',
				'number'         => '10',
				'align'          => 'left'
			), $atts)
		);

		global $focuson_ninzio;

		$output     = '';
		$data_color = '';
		$styles     = '';

		static $id_counter = 1;

		if(!is_numeric($number) || $number < 0){$number = "";}
		if(!is_numeric($active) || $active < 0){$active = "";}
		if($active > $number){$active = $number;}

		if(isset($inactive_color) && !empty($inactive_color)) {
			$styles .= 'color:'.$inactive_color.';';
		}

		if(isset($active_color) && !empty($active_color)) {
			$data_color = $active_color;
		} else {
			$data_color = $GLOBALS['focuson_ninzio']['main-color'];
		}

		if((isset($icon) && !empty($icon)) && (isset($active) && !empty($active))) {
			$output .= '<div id="nz-icon-progress-'.$id_counter.'" class="nz-icon-progress '.sanitize_html_class($align).'" data-color="'.$data_color.'" data-active="'.$active.'">';
			if(isset($inactive_color) && !empty($inactive_color)) {$output .= '<style>#nz-icon-progress-'.$id_counter.' span {color:'.$inactive_color.';}</style>';}
			if(isset($number) && !empty($number)){
				for ($i=0; $i < $number; $i++) { 
					$output .= '<span class="icon '.sanitize_html_class($icon).'"></span>';
				}
			}
			$output .= '</div>';
		}

		$id_counter++;

		return $output;
	}
	add_shortcode('nz_icon_progress', 'nz_icon_progress');

/*  PROGRESS-BAR
/*===================*/
	
	function nz_line($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'percentage'  => '70',
				'bar_color'   => '',
				'title'       => ''
			), $atts)
		);

		$output = '';
		$styles = '';

		if(!is_numeric($percentage) || $percentage < 0){$percentage = "";} 
		elseif ($percentage > 100) {$percentage = "100";}

		if(isset($bar_color) && !empty($bar_color)) {$bar_color = 'background-color:'.$bar_color.';';}

		if(isset($title)){
			$output .= '<div class="bar">';
				$output .= '<div class="bar-text">';
				$output .= '<span class="progress-title" style="'.$styles.'">'.esc_attr($title).'</span>';
				$output .= '<span class="progress-percent" style="'.$styles.'">'.absint($percentage).'</span>';
				$output .= '</div>';
				$output .= '<div class="bar-line"><div style="'.$bar_color.'" class="nz-line" data-percentage="'.absint($percentage).'"></div></div>';
			$output .= '</div>';
		}
		return $output;
	}

	add_shortcode('nz_line', 'nz_line');

	function nz_progress($atts, $content = null) {
		static $id_counter = 1;
		$output = '<div id="nz-progress-'.$id_counter.'" class="nz-progress nz-clearfix">'.do_shortcode($content).'</div>';
		$id_counter++;
		return $output;
	}
	add_shortcode('nz_progress', 'nz_progress');

/*  PROGRESS-CIRCLE
/*===================*/
	
	function nz_circle($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'percentage'  => '70',
				'icon'        => '',
				'bar_color'   => '',
				'track_color' => '',
				'color'       => '',
			), $atts)
		);

		global $focuson_ninzio;

		$output = '';
		$color_styles = '';
		$data_attr = '';

		if(!is_numeric($percentage) || $percentage < 0){$percentage = "";} 
		elseif ($percentage > 100) {$percentage = "100";}


		if(isset($bar_color) && !empty($bar_color)) {
			$data_attr .= 'data-bar="'.$bar_color.'"';
		} else {
			$data_attr .= ' data-bar="'.$GLOBALS['focuson_ninzio']['main-color'].'"';
		}

		if(isset($track_color) && !empty($track_color)) {
			$data_attr .= ' data-track="'.$track_color.'"';
		}

		if(isset($color) && !empty($color)) {
			$color_styles .= 'style="color:'.$color.';"';
		}

		$output .= '<div class="nz-circle">';

			$output .= '<div class="circle" '.$data_attr.' data-percent="'.absint($percentage).'">';
				$output .= '<span class="title icon '.esc_attr($icon).'" '.$color_styles.'></span>';
			$output .= '</div>';

			$output .= '<div class="circle-data">';
				$output .= do_shortcode($content);
			$output .= '</div>';

		$output .= '</div>';
		return $output;
	}

	add_shortcode('nz_circle', 'nz_circle');


	function nz_circle_progress($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'align'    => 'left'
			), $atts)
		);

		$output = "";
		static $id_counter = 1;
		$output = '<div id="nz-circle-progress-'.$id_counter.'" class="nz-circle-progress nz-clearfix '.sanitize_html_class($align).'">'.do_shortcode($content).'</div>';
		$id_counter++;
		return $output;
	}

	add_shortcode('nz_circle_progress', 'nz_circle_progress');

/*  COUNTER
/*===================*/
	
	function nz_count($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'value' => '70',
				'icon'  => '',
				'title' => 'Title goes here', 
				'icon_color'  => '',
				'value_color' => '',
				'text_color'  => '' 
			), $atts)
		);

		$output = '';
		$styles  = '';
		static $id_counter = 1;

		if(!is_numeric($value) || $value < 0){$value = "";}

        $output .= '<div class="nz-count" id="nz-count-'.$id_counter.'">';
        	$output .= '<div class="nz-count-wrap nz-clearfix">';
        		if (isset($value) && !empty($value)) {
					if (isset($value_color) && !empty($value_color)) {
        				$value_color = 'style="color:'.$value_color.';"';
        			}
					$output .= '<span class="count-value" '.$value_color.'>'.absint($value).'</span>';
				}
				if (isset($icon) && !empty($icon)) {
        			if (isset($icon_color) && !empty($icon_color)) {
        				$icon_color = 'style="color:'.$icon_color.';"';
        			}
        			$output .= '<span class="count-icon '.$icon.'" '.$icon_color.'></span>';
        		}
        		if (isset($title) && !empty($title)) {
					if (isset($text_color) && !empty($text_color)) {
        				$text_color = 'style="color:'.$text_color.';"';
        			}
					$output .= '<span class="count-title" '.$text_color.'>'.esc_attr($title).'</span>';
				}
				$output .= '<style>'.$styles.'</style>';
			$output .= '</div>';
        $output .= '</div>';

		$id_counter++;
		return $output;
	}

	add_shortcode('nz_count', 'nz_count');

	function nz_counter($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'columns' => '1'
			), $atts)
		);

		static $id_counter = 1;
		$output = '<div id="nz-counter-'.$id_counter.'" class="nz-counter nz-clearfix" data-columns="'.$columns.'">'.do_shortcode($content).'</div>';
		$id_counter++;

		return $output;
	}

	add_shortcode('nz_counter', 'nz_counter');

/*  CONTENT BOXES
/*===================*/
	
	function nz_content_box($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'columns' => '1',
				'animate' => 'none',
			), $atts)
		);

		$data_animate = 'false';

		if ($animate != "none") {
			$data_animate = 'true';
		}

		static $id_counter = 1;
		$output = '<div class="nz-content-box nz-clearfix animate-'.sanitize_html_class($animate).'" data-columns="'.esc_attr($columns).'" data-animate="'.$data_animate.'">'.do_shortcode($content).'</div>';
		$id_counter++;
		return $output;
	}

	add_shortcode('nz_content_box', 'nz_content_box');

	function nz_box($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon'       	          => '',
				'icon_color' 	          => '',
				'icon_back_color' 	      => '',
				'icon_border_color' 	  => '',
				'icon_hover_color'        => '',
				'link'                    => ''
			), $atts)
		);

		$output     = '';
		static $id_counter = 1;

		$link_before = "";
		$link_after  = "";
		$extra_class = "";

		if(isset($icon_back_color) && !empty($icon_back_color)){
			$extra_class .= ' back_active';
		}
		if(isset($icon_border_color) && !empty($icon_border_color)){
			$extra_class .= ' bord_active';
		}

		$output .= '<div id="nz-box-'.$id_counter.'" class=" '.$extra_class.' nz-box animate-item">';
			$output .= '<div class="nz-box-wrap">';
				$output .= '<style>';
					if(isset($icon_color) && !empty($icon_color)){
						$output .= '#nz-box-'.$id_counter.' .box-icon {color:'.$icon_color.';}';
					}
					if(isset($icon_back_color) && !empty($icon_back_color)){
						$output .= '#nz-box-'.$id_counter.' .box-icon-wrap {background-color:'.$icon_back_color.';}';
					}
					if(isset($icon_border_color) && !empty($icon_border_color)){
						$output .= '#nz-box-'.$id_counter.' .box-icon-wrap {box-shadow:inset 0 0 0 1px '.$icon_border_color.';}';
					}
					if (isset($icon_hover_color) && !empty($icon_hover_color)) {
						$output .= '#nz-box-'.$id_counter.':hover .box-icon {color:'.$icon_hover_color.' !important;}';
					}
				$output .= '</style>';
				if(isset($icon) && !empty($icon)){
					$output .= '<div class="box-icon-wrap"><div class="box-icon '.sanitize_html_class($icon).'"></div></div>';
				}
				$output .= '<div class="box-data">';
					$output .= do_shortcode($content);
					if (isset($link) && !empty($link)) {
						$output .='<a class="box-more" href="'.esc_url($link).'">'.esc_html__('Read more', 'ninzio-addons').'<span class="icon-arrow-right2"></span></a>';
					}
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('nz_box', 'nz_box');

/*  SLIDER BANNER
/*===================*/
	
	function nz_slider_banner($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'columns'          => '2',
				'background_color' => '',
				'background_image' => '',
				'icon_color'       => '',
				'border_color'     => ''
			), $atts)
		);

		static $id_counter = 1;
		$styles = "";
		$output = "";

		$output .= '<div id="nz-slider-banner-'.$id_counter.'" style="'.$styles.'" class="nz-slider-banner nz-clearfix" data-columns="'.esc_attr($columns).'">';
			$output .= '<style>';

				if(isset($background_color) && !empty($background_color)) {
					$output .= '#nz-slider-banner-'.$id_counter.' {background-color:'.$background_color.';}';
				}
				if(isset($background_image) && !empty($background_image)) {

					$image_attributes = wp_get_attachment_image_src($background_image, 'full');
					$background_image = $image_attributes[0];

					$output .= '#nz-slider-banner-'.$id_counter.' {background-image:url('.$background_image.');-webkit-background-size: cover; -moz-background-size: cover; background-size: cover; background-position:center center; background-repeat:no-repeat;}';

				}

				if(isset($icon_color) && !empty($icon_color)){
					$output .= '#nz-slider-banner-'.$id_counter.' .banner-icon {color:'.$icon_color.';}';
				}

				if(isset($border_color) && !empty($border_color)){
					$output .= '#nz-slider-banner-'.$id_counter.' .nz-banner {border:1px solid '.$border_color.';}';
				}
			$output .= '</style>';
			$output .= '<div class="inner-wrap">'.do_shortcode($content).'</div>';
		$output .= '</div>';

		$id_counter++;
		return $output;
	}

	add_shortcode('nz_slider_banner', 'nz_slider_banner');

	function nz_banner($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon' => ''
			), $atts)
		);

		$output     = '';
		static $id_counter = 1;

		$output .= '<div id="nz-banner-'.$id_counter.'" class="nz-banner">';
			if(isset($icon) && !empty($icon)){
				$output .= '<div class="banner-icon '.sanitize_html_class($icon).'"></div>';
			}
			$output .= '<div class="banner-data">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('nz_banner', 'nz_banner');

/*  TESTIMONIALS
/*===================*/
	
	function nz_testimonials($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'columns'  => '1',
				'autoplay' => 'false',
				'animate'  => 'none'
			), $atts)
		);

		static $id_counter = 1;

		$output = "";
		$output .= '<div id="nz-testimonials-'.$id_counter.'" data-columns="'.absint($columns).'" data-autoplay="'.esc_attr($autoplay).'" class="'.sanitize_html_class($animate).' nz-testimonials nz-carousel lazy">';
			$output .= do_shortcode($content);
		$output .= '</div>';

		$id_counter++;

		return $output;
	}
	add_shortcode('nz_testimonials', 'nz_testimonials');

	function nz_testimonial($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'img'      => '',
				'name'     => '',
				'title'  => ''
			), $atts)
		);

		$output = '';

		if (isset($img) && !empty($img)) {
			$img_ats = wp_get_attachment_image_src($img, 'full');
			$img     =  $img_ats[0];
		}

		$output .= '<div class="testimonial nz-clearfix">';

			$output .= '<div class="text">'.esc_html(strip_tags($content)).'</div>';

			$output .= '<div class="nz-clearfix test-info">';

				if (isset($img) && !empty($img)) {
					$output .= '<img src="'.esc_url($img).'" alt="'.esc_attr($name).'" />';
				}

				$output .= '<div class="test-data">';
					if (isset($name) && !empty($name)) {$output .= '<span class="name">'.esc_html($name).'</span>';}
					if (isset($title) && !empty($title)) {$output .= '<span class="title">'.esc_html($title).'</span>';}
				$output .= '</div>';

			$output .= '</div>';

		$output .= '</div>';

		return $output;
	}
	add_shortcode('nz_testimonial', 'nz_testimonial');

/*  TABS
/*===================*/

	function nz_tabs($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'type'     => 'horizontal',
				'full'     => 'false',
				'el_class' => ''
			), $atts)
		);

		$output = "";

		static $id_counter = 1;
		$output .= '<div class="nz-tabs ' . sanitize_html_class($el_class) . ' '.sanitize_html_class($type).' full-'.sanitize_html_class($full).'">';
			$output .= wpb_js_remove_wpautop( $content );
		$output .= '</div> ';
		return $output;
	}
	add_shortcode('nz_tabs', 'nz_tabs');

	function nz_tab($atts, $content = null) {
		extract(shortcode_atts(array('title'    => '','icon'    => ''), $atts));
		$output = "";

		if (isset($icon) && !empty($icon)) {
			$icon = '<span class="'.$icon.'"></span>';
		}

		$output .= '<div data-target="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'" class="tab">'.$icon.$title.'</div>';
		$output .= '<div id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'" class="tab-content">';
			$output .= ($content=='' || $content==' ') ? esc_html__("Empty tab. Edit page to add content here.", 'ninzio-addons') : wpb_js_remove_wpautop($content);
		$output .= "\n\t\t\t" . '</div> ';
		return $output;
	}
	add_shortcode('nz_tab', 'nz_tab');

/*  ACCORDION
/*===================*/

	function nz_accordion($atts, $content = null) {
		extract(shortcode_atts(array(
		    'el_class' => '',
		    'collapsible' => 'false'
		), $atts));

		$output = '';

		$output .= '<div class="nz-accordion '.sanitize_html_class($el_class).'" data-collapsible='.esc_attr($collapsible).'>';
			$output .= wpb_js_remove_wpautop($content);
		$output .= '</div> ';

		return $output;
	}
	add_shortcode('nz_accordion', 'nz_accordion');

	function nz_toggle($atts, $content = null) {

		extract(shortcode_atts(array(
			'title' => '',
			'open'  => 'false'
		), $atts));

		$output = '';

		if($open == 'true'){
			$open = "active";
		}

		$output .= '<div class="'.sanitize_html_class($open).' toggle-title nz-clearfix">';
			$output .= '<span class="toggle-title-header"><span>'.$title.'</span></span><span class="arrow"></span>';
		$output .= '</div> ';
		$output .= '<div id="'.sanitize_title($title).'" class="toggle-content nz-clearfix">';
		    $output .= wpb_js_remove_wpautop($content);
		$output .= '</div>';

		return $output;
	}
	add_shortcode('nz_toggle', 'nz_toggle');

/*  CLIENTS
/*===================*/
	
	function nz_cl($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'columns'  => '6',
				'autoplay' => 'false',
				'animate'  => 'none',
			), $atts)
		);

		$output = "";

		$data_animate = 'false';

		if ($animate != "none") {
			$data_animate = 'true';
		}	

		static $id_counter = 1;
		$output .= '<div id="nz-clients-'.$id_counter.'" class="lazy nz-clients nz-carousel animate-'.sanitize_html_class($animate).'" data-columns="'.absint($columns).'" data-animate="'.$data_animate.'" data-autoplay="'.esc_attr($autoplay).'">';
			$output .= do_shortcode($content);
		$output .= '</div>';
		$id_counter++;
		return $output;
	}
	add_shortcode('nz_cl', 'nz_cl');

	function nz_c($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'img'   => '',
				'name' 	=> 'Enter client name here',
				'link' 	=> 'Enter client link here'
			), $atts)
		);

		$output = '';

		$before_link = "";
		$after_link  = "";

		if (isset($link) && !empty($link)) {
			$before_link = '<a href="'.esc_url($link).'" target="_blank">';
			$after_link  = '</a>';
		}

		if (isset($img) && !empty($img)) {

			$img_ats = wp_get_attachment_image_src($img, 'full');
			$img     =  $img_ats[0];

			$output .= '<div class="client animate-item">';
				$output .= '<div class="client-inner">';
					$output.= $before_link;
						if (isset($name) && !empty($name)) {
							$name = 'alt="'.esc_attr($name).'"';
						}
						$output.= '<img src="'.esc_url($img).'" '.$name.' >';
					$output.= $after_link;
				$output .= '</div>';
			$output .= '</div>';

		}
		return $output;
	}
	add_shortcode('nz_c', 'nz_c');

/*  PERSONS
/*===================*/

	function nz_persons($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'columns'  => '1',
				'animate'  => 'none'
			), $atts)
		);

		$data_animate = 'false';

		if ($animate != "none") {
			$data_animate = 'true';
		}

		$output = "";

		static $id_counter = 1;

		$output .= '<div id="nz-persons-'.$id_counter.'" class="nz-persons nz-carousel nz-clearfix animate-'.sanitize_html_class($animate).'" data-animate="'.$data_animate.'" data-columns="'.absint($columns).'">';
			$output .= do_shortcode($content);
		$output .= '</div>';

		$id_counter++;

		return $output;
	}
	add_shortcode('nz_persons', 'nz_persons');


	function nz_person($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'img'          => '',
				'link'         => '',
				'name'         => 'Person name',
				'title'        => 'Person title/position',
				'bio'          => '',
				'twitter'      => '',
				'facebook'     => '',
				'linkedin'     => '',
				'googleplus'   => '',
				'envelope'     => ''
			), $atts)
		);

		$output  = '';
		$classes = '';
		$link_before = "";
		$link_after  = "";

		if (empty($twitter) && empty($facebook) && empty($linkedin) && empty($googleplus) && empty($envelope)) {
			$classes = "no-social";
		}

		if (isset($img) && !empty($img)) {

			$img_ats = wp_get_attachment_image_src($img, 'full');
			$img     =  $img_ats[0];

			$output .= '<div class="animate-item person '.$classes.'">';
				$output .='<div class="img">';
					$output .='<img src="'.esc_url($img).'" alt="'.esc_attr($name).'" /><div class="ninzio-overlay">';
					$output .= '<div class="social-links">';
						foreach($atts as $social => $href) {
							if($href && $social != 'img' && $social != 'name' && $social != 'title' && $social != 'link' && $social != 'bio') {
								$output .='<a class="icon-'.sanitize_html_class($social).'" href="'.$href.'" title="'.esc_attr($social).'"></a>';
							}
						}
					$output .= '</div>';
				$output .='</div></div>';
				$output .= '<div class="person-body">';
					$output .='<div class="person-meta">';
						if(isset($name) && !empty($name)){
							$output .= '<a href="'.esc_html($link).'">';
								$output .= '<div class="name">'.esc_html($name).'</div>';
							$output .= '</a>';
						}
						if(isset($title) && !empty($title)){
							$output .= '<div class="title">'.esc_html($title).'</div>';
						}
						if(isset($bio) && !empty($bio)){
							$output .= '<div class="bio">'.esc_html($bio).'</div>';
						}
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

		}

		return $output;
	}
	add_shortcode('nz_person', 'nz_person');

/*  SLIDER
/*===================*/
	
	function nz_media($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'effect'   => 'fade',
				'bul'      => 'false',
				'nav'      => 'true',
				'autoplay' => 'false'
			), $atts)
		);

		$output = '<div class="nz-media-slider lazy flexslider" data-effect="'.esc_attr($effect).'">';
			$output .= '<ul class="slides">';
				$output .= do_shortcode($content);
			$output .= '</ul>';
		$output .= '</div>';

		return $output;
	}
	add_shortcode('nz_media', 'nz_media');

	function nz_slide($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'type'        => '',
				'id'          => '',
				'src'         => '',
				'description' => ''
			), $atts)
		);

		$output = '';

		$output .= '<li>';
			switch ($type) {
				case 'youtube':

					if (isset($id) && !empty($id)) {
						$output .='<div class="video-embed">';
					    	$output .='<div class="flex-mod">';
					    		$output .= '<iframe src="http://www.youtube-nocookie.com/embed/'.esc_attr($id).'" class="iframevideo" title="'.esc_attr($description).'"></iframe>';
					    	$output .='</div>';
					    $output .='</div>';
					}
					break;
				case 'vimeo':

					if (isset($id) && !empty($id)) {
						$output .='<div class="video-embed">';
					    	$output .='<div class="flex-mod">';
					    		$output .= '<iframe src="http://player.vimeo.com/video/'.esc_attr($id).'" class="iframevideo" title="'.esc_attr($description).'"></iframe>';
					    	$output .='</div>';
					    $output .='</div>';
					} 
					break;
				case 'img':
					if (isset($src) && !empty($src)) {
						$image_attributes = wp_get_attachment_image_src($src, 'full');
						$src = $image_attributes[0];
						$output .='<img src="'.esc_url($src).'" alt="'.esc_attr($description).'">';
					}
					break;
			}
		$output .= '</li>';
		return $output;
	}
	add_shortcode('nz_slide', 'nz_slide');

/*  PRICING TABLE
/*===================*/
	
	function nz_pricing_table($atts, $content = null, $tag) {

		extract(shortcode_atts(
			array(
				'columns' => '3',
				'animate' => 'none'
			), $atts)
		);

		$output = '';

		$data_animate = 'false';

		if ($animate != "none") {
			$data_animate = 'true';
		}	

		static $id_counter = 1;

		$output .= '<div id="nz-pricing-table-'.$id_counter.'" class="nz-pricing-table nz-clearfix animate-'.sanitize_html_class($animate).'" data-animate="'.$data_animate.'" data-columns="'.absint($columns).'">';
			$output .= do_shortcode($content);
		$output .= '</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('nz_pricing_table', 'nz_pricing_table');

	function nz_column($atts, $content = null) {

		global $focuson_ninzio;

		extract(shortcode_atts(
			array(
				'high'        => 'false',
				'hlabel'      => '',
				'color'   	  => $GLOBALS['focuson_ninzio']['main-color'],
				'price'       => '$ 29.99',
				'tariff'      => '/m',
				'title'       => 'Column title',
				'button_text' => 'Submit now',
				'link'        => '',
			), $atts)
		);

		$output = '';
		$styles = "";
		static $id_counter = 1;

		if (isset($color) && !empty($color)) {
			$styles.= '#nz-column-'.$id_counter.' .price {color:'.$color.';}';
			$styles.= '#nz-column-'.$id_counter.' .title:after {border-bottom: 3em solid '.$color.';}';
			$styles.= '#nz-column-'.$id_counter.' .pricing {border-bottom: 3px solid '.$color.';}';
			$styles.= '#nz-column-'.$id_counter.'.highlight-true .title:after {border-bottom: 3em solid '.focuson_ninzio_hex_to_rgb_shade($color,20).';}';
			$styles.= '#nz-column-'.$id_counter.'.highlight-true .pricing {background-color:'.$color.';}';
			
			$styles.= '#nz-column-'.$id_counter.'.highlight-true .button {
				background: '.$color.';
				background: -moz-linear-gradient(top,  '.$color.' 0%, '.focuson_ninzio_hex_to_rgb_shade($color,20).' 100%);
				background: -webkit-linear-gradient(top,  '.$color.' 0%,'.focuson_ninzio_hex_to_rgb_shade($color,20).' 100%);
				background: linear-gradient(to bottom,  '.$color.' 0%,'.focuson_ninzio_hex_to_rgb_shade($color,20).' 100%);
			}';

			$styles.= '#nz-column-'.$id_counter.'.highlight-true .button:hover {
				background: '.$color.';
				background: -moz-linear-gradient(top,  '.$color.' 0%, '.focuson_ninzio_hex_to_rgb_shade($color,30).' 100%);
				background: -webkit-linear-gradient(top,  '.$color.' 0%,'.focuson_ninzio_hex_to_rgb_shade($color,30).' 100%);
				background: linear-gradient(to bottom,  '.$color.' 0%,'.focuson_ninzio_hex_to_rgb_shade($color,30).' 100%);
			}';

			$styles.= '#nz-column-'.$id_counter.'.highlight-true .hlabel {color:'.focuson_ninzio_hex_to_rgb_shade($color,50).';}';
		}

		$output .='<div id="nz-column-'.$id_counter.'" class="animate-item column highlight-'.sanitize_html_class($high).'">';
			$output .='<div class="column-inner">';

				$output .='<div class="pricing">';
					if (isset($title) && !empty($title)) {
						$output .='<div class="title">'.esc_html($title).'</div>';
					}
					if (isset($price) && !empty($price)) {
						$output .='<div class="price">'.esc_html($price).'</div>';
					}
					if (isset($tariff) && !empty($tariff)) {
						$output .='<div class="tariff">'.esc_html($tariff).'</div>';
					}
					if (isset($hlabel) && !empty($hlabel)) {
						$output .='<div class="hlabel">'.esc_html($hlabel).'</div>';
						$styles.= '#nz-column-'.$id_counter.'.highlight-true .pricing {padding-bottom:8px;}';
					}
					$output .= '<style>';
						$output .= $styles;
					$output .= '</style>';
				$output .='</div>';

				if (isset($content) && !empty($content)) {
					$output .='<div class="c-body">';
						$split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);
						foreach($split as $haystack) {
			                $output .= '<div class="c-row"><span class="icon-checkmark3"></span> ' . $haystack . '</div>';
			            }
		            $output .='</div>';
				}

				if (isset($link) && !empty($link)) {

					$output .='<div class="c-foot">';
						$output .='<a href="'.esc_url($link).'" data-color="'.$color.'" class="animate-false medium button square button-normal hover-fill grey">'.esc_html($button_text).'</a>';
					$output .='</div>';
				}

			$output .='</div>';
		$output .='</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('nz_column', 'nz_column');

/*  CAROUSEL
/*===================*/
	
	function nz_carousel($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'columns'  => '1',
				'autoplay' => 'false',
				'animate' => 'none'
			), $atts)
		);

		static $id_counter = 1;

		$data_animate = 'false';

		if ($animate != "none") {
			$data_animate = 'true';
		}	

		$output = "";
		$output .= '<div id="nz-carousel-'.$id_counter.'" class="lazy nz-carousel animate-'.sanitize_html_class($animate).'" data-autoplay="'.esc_attr($autoplay).'" data-columns="'.absint($columns).'" data-animate="'.$data_animate.'">'.do_shortcode($content).'</div>';

		$id_counter++;

		return $output;
	}
	add_shortcode('nz_carousel', 'nz_carousel');

	function nz_item($atts, $content = null) {
		return '<div class="item animate-item nz-clearfix">'.do_shortcode($content).'</div>';
	}
	add_shortcode('nz_item', 'nz_item');

/*  SLICK CAROUSEL
/*===================*/
	
	function nz_slick_carousel($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'autoplay'       => 'false',
				'autoplay_speed' => '3000'
			), $atts)
		);

		static $id_counter = 1;

		$output = "";
		$output .= '<div id="nz-slick-carousel-'.$id_counter.'" class="lazy nz-clearfix nz-slick-carousel" data-autoplayspeed="'.esc_attr($autoplay_speed).'" data-autoplay="'.esc_attr($autoplay).'">'.do_shortcode($content).'</div>';

		$id_counter++;

		return $output;
	}
	add_shortcode('nz_slick_carousel', 'nz_slick_carousel');

	function nz_slick_item($atts, $content = null) {
		return '<div class="nz-slick-item nz-clearfix">'.do_shortcode($content).'</div>';
	}
	add_shortcode('nz_slick_item', 'nz_slick_item');

/*  RECENT POSTS
/*===================*/

	function nz_rposts($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'columns'          => '1',
				'posts_number'     => '3',
				'cat'              => '',
				'animate'          => 'false',
				'autoplay'          => 'false'
			), $atts)
		);

		global $post, $focuson_ninzio;
		$output = "";

		if(!is_numeric($posts_number) || !isset($posts_number) || empty($posts_number) || $posts_number < 0) {
			$posts_number = 3;
		}

		static $id_counter = 1;

		$recent_posts = new WP_Query(array( 'orderby' => 'date', 'posts_per_page' => absint($posts_number), 'cat' => $cat,'post_status' => 'publish','ignore_sticky_posts' => true));
			if($recent_posts->have_posts()){

				$output .= '<div id="nz-recent-posts-'.$id_counter.'" data-animate="'.esc_attr($animate).'" data-autoplay="'.esc_attr($autoplay).'" data-columns="'.absint($columns).'" class="lazy nz-recent-posts nz-carousel nz-clearfix">';
						
					while($recent_posts->have_posts()) : $recent_posts->the_post();

						$output .= '<div class="post item format-'.get_post_format().' nz-clearfix" data-grid="ninzio_01">';

							$values      = get_post_custom( $post->ID );
							$nz_link_url = isset($values["link_url"][0]) ? $values["link_url"][0] : "";


							$output .= focuson_ninzio_thumbnail('Focuson-Ninzio-Half', $post->ID);


							$output .= '<div class="post-body">';

								if (is_sticky($post->ID)){
								    $output .= '<span class="sticky-ind"></span>';
								}
								
								$output .= '<div class="post-body-in">';
									if ( '' != get_the_title() ){
										if (has_post_format('link')){
											$output .= '<h3 class="post-title">';
												$output .= '<a href="'.esc_url($nz_link_url).'" title="'.esc_html__("Go to", 'ninzio-addons').' '.$nz_link_url.'" target="_blank">';
													$output .= get_the_title();
												$output .= '</a>';
											$output .= '</h3>';
										} else {
											$output .= '<h3 class="post-title">';
												$output .= '<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'ninzio-addons').' '.get_the_title().'" rel="bookmark">';
													$output .= get_the_title();
												$output .= '</a>';
											$output .= '</h3>';
										}
									}
									$output .= '<div class="postmeta">';
										$output .= '<div class="post-date-full">'.get_the_date().'</div>';
										if ('' != get_the_category_list()) {
											$output .= '<div class="post-category">'.get_the_category_list(esc_html__( ', ', 'ninzio-addons' )).'</div>';
										}
									$output .= '</div>';	
									if ('' != get_the_excerpt()) {
										$output .= '<div class="post-excerpt">'.ninzio_addons_excerpt(135).'</div>';
									}
									$output .= '<a class="post-more" href="'.get_permalink().'">'.esc_html__('Read more', 'ninzio-addons').'<span class="icon-uniE91B icon"></span><span class="screen-reader-text">'.get_the_title().'</span></a>';
								$output .= '</div>';								
							
							$output .= '</div>';

						$output .= '</div>';
							
					endwhile;
					wp_reset_postdata();

				$output .= '</div>';

				$id_counter++;

				return $output;

			} else {
				return ninzio_addons_not_found('post');
			}
	}

	add_shortcode('nz_rposts', 'nz_rposts');

/*  RECENT PROJECTS
/*===================*/

	function nz_rprojects($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'posts_number' => '3',
				'animate'      => 'false',
				'cat'          => '',
				'layout'       => 'small-standard'
			), $atts)
		);

		global $post;

		$output        = "";
		$size          = 'Focuson-Ninzio-Half';
		static $id_counter = 1;

		if(!is_numeric($posts_number) || !isset($posts_number) || empty($posts_number) || $posts_number < 0) {
			$posts_number = 3;
		}

		if (isset($cat) && !empty($cat)) {

			$recent_query_opt = array( 
				'orderby'            => 'date', 
				'post_type'          => 'projects', 
				'posts_per_page'     => $posts_number,
				'tax_query'          => array(
					array(
						'taxonomy' => 'projects-category',
						'field'    => 'id',
						'terms'    => explode(',',$cat),
						'operator' => 'IN'
					)
				)
			);

		} else {

			$recent_query_opt = array( 
				'orderby'            => 'date', 
				'post_type'          => 'projects', 
				'posts_per_page'     => $posts_number
			);

		}
		
		$recent_projects = new WP_Query($recent_query_opt);

			if($recent_projects->have_posts()){

					$output .= '<div id="nz-recent-projects-'.$id_counter.'" data-animate="'.esc_attr($animate).'" class="lazy '.$layout.' nz-clearfix nz-recent-projects">';

						$output .= '<div class="recent-projects-wrap nz-clearfix">';
							while($recent_projects->have_posts()) : $recent_projects->the_post();
								$output .= '<div class="projects mix nz-clearfix" data-grid="ninzio_01">';

									if ($layout == "small-standard" || $layout == "medium-standard" || $layout == "large-standard") {
										if (has_post_thumbnail()){
										    $output .= '<div class="nz-thumbnail">';
										        $output .= get_the_post_thumbnail( $post->ID, "Focuson-Ninzio-Half" );
										        $output .='<div class="ninzio-overlay">';
									            	$output .='<a class="nz-overlay-before" data-lightbox-gallery="gallery3" href="'.get_permalink().'"></a>';
									            $output .='</div>';
										    $output .= '</div>';
										}
										$output .= '<div class="project-details">';
											if ( '' != get_the_title() ){
												$output .='<h4 class="project-title">';
													$output .='<a href="'.get_permalink().'">'.get_the_title().'</a>';
												$output .='</h4>';
											}
											if('' != get_the_term_list($post->ID, 'projects-category')){
												$output .='<div class="projects-category">';
													$output .=get_the_term_list( $post->ID, 'projects-category', '', ', ', '' );
												$output .='</div>';
											}
										 $output .= '</div>';
									} else {
										if (has_post_thumbnail()){
										    $output .= '<div class="nz-thumbnail">';
										        $output .= get_the_post_thumbnail( $post->ID, "Focuson-Ninzio-Half" );
										        $output .='<div class="ninzio-overlay">';
									            	$output .='<a class="nz-overlay-before" data-lightbox-gallery="gallery3" href="'.get_permalink().'"></a>';
									            	if ( '' != get_the_title() ){
														$output .='<h4 class="project-title">';
															$output .='<a href="'.get_permalink().'">'.get_the_title().'</a>';
														$output .='</h4>';
													}
													if('' != get_the_term_list($post->ID, 'projects-category')){
														$output .='<div class="projects-category">';
															$output .=get_the_term_list( $post->ID, 'projects-category', '', ', ', '' );
														$output .='</div>';
													}
									            $output .='</div>';
										    $output .= '</div>';
										}
									}
								$output .='</div>';
							endwhile;
						$output .='</div>';
						wp_reset_postdata();

					$output .= '</div>';

				$id_counter++;

				return $output;

			} else {
				return ninzio_addons_not_found('projects');
			}
	}

	add_shortcode('nz_rprojects', 'nz_rprojects');

/*  RECENT PRODUCTS
/*===================*/

	function nz_rproducts($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'posts_number'     => '3',
				'cat'              => '',
				'pr'               => '',
				'animate'          => 'false',
				'columns'          => '1'
			), $atts)
		);

		global $post;

		$output           = "";
		static $id_counter = 1;

		if (class_exists('Woocommerce')){

			if(!is_numeric($posts_number) || !isset($posts_number) || empty($posts_number) || $posts_number < 0) {
				$posts_number = 3;
			}

			if (isset($cat) && !empty($cat)) {

				if (isset($pr) && !empty($pr)) {
					$recent_query_opt = array( 
						'orderby'            => 'date', 
						'post_type'          => 'product', 
						'posts_per_page'     => $posts_number,
						'post__in'           => explode(',',$pr),
						'tax_query'          => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'id',
								'terms'    => explode(',',$cat),
								'operator' => 'IN'
							)
						)
					);
				} else {
					$recent_query_opt = array( 
						'orderby'            => 'date', 
						'post_type'          => 'product', 
						'posts_per_page'     => $posts_number,
						'tax_query'          => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'id',
								'terms'    => explode(',',$cat),
								'operator' => 'IN'
							)
						)
					);
				}

			} else {

				if (isset($pr) && !empty($pr)) {

					$recent_query_opt = array( 
						'orderby'            => 'date', 
						'post_type'          => 'product', 
						'posts_per_page'     => $posts_number,
						'post__in'           => explode(',',$pr)
					);

				} else {

					$recent_query_opt = array( 
						'orderby'            => 'date', 
						'post_type'          => 'product', 
						'posts_per_page'     => $posts_number
					);

				}
				
			}

			$recent_products = new WP_Query($recent_query_opt);

			if($recent_products->have_posts()){

					$output .= '<div id="nz-recent-products-'.$id_counter.'" data-animate="'.esc_attr($animate).'" data-columns="'.esc_attr($columns).'" class="lazy woocommerce nz-recent-products nz-clearfix">';
							
						$output .= '<ul class="nz-product-posts products">';
							while($recent_products->have_posts()) : $recent_products->the_post();

								$output .= '<li class="mix product nz-clearfix" data-grid="ninzio_01">';
									global $product;
									if ( $product->is_on_sale() ){
			                                $sale_price = get_post_meta( $product->id, '_price', true);
			                                $regular_price = get_post_meta( $product->id, '_regular_price', true);

			                                if (empty($regular_price)){ //then this is a variable product
			                                    $available_variations = $product->get_available_variations();
			                                    $variation_id=$available_variations[0]['variation_id'];
			                                    $variation= new WC_Product_Variation( $variation_id );
			                                    $regular_price = $variation ->regular_price;
			                                    $sale_price = $variation ->sale_price;
			                                }
			                                $sale = ceil(( ($regular_price - $sale_price) / $regular_price ) * 100);
			                            if ( !empty( $regular_price ) && !empty( $sale_price ) && $regular_price > $sale_price ) {
			                                $output .= apply_filters( 'woocommerce_sale_flash', '<span class="product-status onsale">-' . $sale . '%</span>', $post, $product );
			                            }
			                        }
									$output .= '<div class="nz-thumbnail">';
										$output .= '<a href="'.get_permalink().'">';
										$output .= woocommerce_get_product_thumbnail();
											if (class_exists('MultiPostThumbnails')) {
												if (MultiPostThumbnails::has_post_thumbnail('product', 'feature-image-2')) {
													$thumb_2 = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post->ID);
													$output .= '<img class="hover-img" src="'.$thumb_2.'" alt="'.get_the_title().'">';
												}
									        }
										$output .= '</a>';
									$output .= '</div>';
									$output .= '<div class="product-details">';

										global $focuson_ninzio;

										$output .= '<div class="product-title nz-clearfix">';
											$output .= '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
											if ( $price_html = $product->get_price_html() ){
												$output .= '<span class="price">'.$price_html.'</span>';
											}
										$output .= '</div>';
										$output .= '<div class="cart-wrap nz-clearfix">';
						            		$output .= '<div class="shop-loader">&nbsp;</div>';
											$extra_class = (get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes") ? 'ajax_add_to_cart' : '';
				                        	$output .= sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s '.$extra_class.' product_type_%s">%s</a>',
												esc_url( $product->add_to_cart_url() ),
												esc_attr( $product->id ),
												esc_attr( $product->get_sku() ),
												esc_attr( isset( $quantity ) ? $quantity : 1 ),
												$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
												esc_attr( $product->product_type ),
												esc_html( $product->add_to_cart_text() )
											);
					                    $output .= '</div>';
									$output .= '</div>';
								$output .= '</li>';

							endwhile;
							wp_reset_postdata();
						$output .= '</ul>';

					$output .= '</div>';

				$id_counter++;

				return $output;

			} else {
				return ninzio_addons_not_found('products');
			}

		} else {
			$output .= esc_html__('Please activate Woocommerce plugin', 'ninzio-addons');
		}
	}

	add_shortcode('nz_rproducts', 'nz_rproducts');

/*  TINYMCE ADD SHORTCODES TO CLASSIC VIEW
/*===================*/

	add_action('admin_head', 'ninzio_addons_add_tinymce_button');

	function ninzio_addons_register_tinymce_plugins($buttons) {  
		array_push(
			$buttons,
			'nz_table',
			'nz_col',
			'nz_dropcap',
			'nz_il',
			'nz_sep',
			'nz_highlight',
			'nz_popup',
			'nz_btn',
			'nz_icons',
			'nz_gap',
			'nz_youtube',
			'nz_vimeo'
		);  
		return $buttons;  
	}

	function ninzio_addons_add_tinymce_plugins($plugin_array) {
	   $plugin_array['nz_table']     = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_col']       = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_row']       = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_dropcap']   = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_popup']     = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_il']        = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_btn']       = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_sep']       = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_icons']     = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_gap']       = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_fw']        = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_youtube']   = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_vimeo']     = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_you']       = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_vim']       = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_colorbox']  = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['nz_highlight'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   return $plugin_array;
	}

	function ninzio_addons_add_tinymce_button() { 
		if(!current_user_can('edit_posts') && !current_user_can('edit_pages') ) {return;}
		if (get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", "ninzio_addons_add_tinymce_plugins");
			add_filter('mce_buttons', 'ninzio_addons_register_tinymce_plugins');
		}
	}

?>