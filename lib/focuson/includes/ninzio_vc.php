<?php

	vc_disable_frontend();

	vc_remove_param("vc_icon", "css_animation");

	vc_remove_param("vc_column", "css");
	vc_remove_param("vc_column", "el_class");
	vc_remove_param("vc_column", "font_color");

	vc_remove_param("vc_column_text", "css_animation");
	vc_remove_param("vc_column_text", "css");

	vc_remove_param("vc_row", "css");
	vc_remove_param("vc_row", "gap");
	vc_remove_param("vc_row", "columns_placement");
	vc_remove_param("vc_row", "equal_height");
	vc_remove_param("vc_row", "font_color");
	vc_remove_param("vc_row", "el_id");
	vc_remove_param("vc_row", "parallax");
	vc_remove_param("vc_row", "parallax_image");
	vc_remove_param("vc_row", "full_height");
	vc_remove_param("vc_row", "content_placement");
	vc_remove_param("vc_row", "video_bg");
	vc_remove_param("vc_row", "video_bg_url");
	vc_remove_param("vc_row", "video_bg_parallax");
	vc_remove_param("vc_row", "parallax_speed_video");

	vc_remove_param("vc_video", "title");
	vc_remove_param("vc_video", "css");
	vc_remove_param("vc_video", "link");
	vc_remove_param("vc_video", "el_width");
	vc_remove_param("vc_video", "el_aspect");
	vc_remove_param("vc_video", "align");

	/*  COLUMNS            (EXISTING)
	/*-------------------------------*/

		vc_add_param('vc_column', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Extra class name",
			"param_name" => "extra_class",
			"value"      => "",
			"description"=> "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
		));

		vc_add_param('vc_column', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Animate",
			"param_name" => "animate",
			"value"      => array(
				"False"  => 'false',
				"True"   => 'true'
			)
		));

		vc_add_param('vc_column', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Effect",
			"param_name" => "effect",
			"value"      => array(
				"Fade"        => 'fade',
				"Fade-left"   => 'fade-left',
				"Fade-right"  => 'fade-right',
				"Fade-bottom" => 'fade-bottom',
				"Fade-top"    => 'fade-top',
				"Scale"       => 'scale',
				"Scale down"  => 'scale-down',
				"Flip"        =>"flip"
			),
			"dependency" => Array('element' => "animate", 'value' => 'true')
		));

		vc_add_param('vc_column', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Margin bottom",
			"param_name" => "margin_b",
			"value"      => array(
				"true"   => 'true',
				"false"  => 'false',
			)
		));

		vc_add_param('vc_column', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Text align",
			"param_name" => "text_align",
			"value"      => array(
				"left"    => 'left',
				"right"   => 'right',
				"center"  => 'center',
			)
		));

		vc_add_param('vc_column', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding left in px (only integer value, without any string)",
			"param_name" => "pl",
			"value"      => "0"
		));

		vc_add_param('vc_column', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding right in px (only integer value, without any string)",
			"param_name" => "pr",
			"value"      => "0"
		));

		vc_add_param('vc_column', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding top in px (only integer value, without any string)",
			"param_name" => "pt",
			"value"      => "0"
		));

		vc_add_param('vc_column', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding bottom in px (only integer value, without any string)",
			"param_name" => "pb",
			"value"      => "0"
		));

		vc_add_param('vc_column', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Background color",
			"param_name" => "back_color",
			"value"      => ""
		));

		vc_add_param('vc_column', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Border width in px (only integer value, without any string)",
			"param_name" => "border_width",
			"value"      => "0"
		));

		vc_add_param('vc_column', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Border color",
			"param_name" => "border_color",
			"value"      => ""
		));

		vc_add_param('vc_column', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Color",
			"param_name" => "color",
			"value"      => ""
		));

	/*  COLUMN TEXT        (EXISTING)
	/*-------------------------------*/

		vc_add_param('vc_column_text', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Background color",
			"param_name" => "back_color",
			"value"      => ""
		));

		vc_add_param('vc_column_text', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Color",
			"param_name" => "color",
			"value"      => ""
		));

		vc_add_param('vc_column_text', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding left in px (only integer value, without any string)",
			"param_name" => "pl",
			"value"      => "0"
		));

		vc_add_param('vc_column_text', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding right in px (only integer value, without any string)",
			"param_name" => "pr",
			"value"      => "0"
		));

		vc_add_param('vc_column_text', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding top in px (only integer value, without any string)",
			"param_name" => "pt",
			"value"      => "0"
		));

		vc_add_param('vc_column_text', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding bottom in px (only integer value, without any string)",
			"param_name" => "pb",
			"value"      => "0"
		));

	/*  ROW                (EXISTING)
	/*-------------------------------*/

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "ID",
			"param_name" => "id",
			"value"      => ""
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Autoheight",
			"param_name" => "autoheight",
			"value"      => array(
				"False"  => 'false',
				"True"   => 'true'
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Full width",
			"param_name" => "full_width",
			"value"      => array(
				"False"  => 'false',
				"True"   => 'true'
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Background color",
			"param_name" => "background_color",
			"value"      => ""
		));

		vc_add_param('vc_row', array(
			"type"       => "attach_image",
			"class"      => "",
			"heading"    => "Background image",
			"param_name" => "background_image",
			"value"      => ""
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Animate background image",
			"param_name" => "img_animate",
			"value"      => array(
				"false"  => 'false',
				"true"   => 'true'
			),
			"dependency" => Array('element' => "background_image",'not_empty' => true)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Animation direction",
			"param_name" => "animation_dir",
			"value"      => array(
				"horizontal"  => 'horizontal',
				"vertical"   => 'vertical'
			),
			"dependency" => Array('element' => "img_animate",'value' => 'true')
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Animation speed in ms",
			"param_name" => "animation_speed",
			"value"      => '35000',
			"dependency" => Array('element' => "img_animate",'value' => 'true')
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Background repeat",
			"param_name" => "background_repeat",
			"value"      => array(
				"no-repeat" => 'no-repeat',
				"repeat-x"  => 'repeat-x',
				"repeat-y"  => 'repeat-y',
				"repeat"    => 'repeat',
			),
			"dependency" => Array('element' => "background_image",'not_empty' => true)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Background position",
			"param_name" => "background_position",
			"value"      => array(
				"left top"      => 'left top',
				"left bottom"   => 'left bottom',
				"left center"   => 'left center',
				"right top"     => 'right top',
				"right bottom"  => 'right bottom',
				"right center"  => 'right center',
				"center center" => 'Center center',
			),
			"dependency" => Array('element' => "background_image",'not_empty' => true)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Background attachment",
			"param_name" => "background_attachment",
			"value"      => array(
				"scroll" => 'scroll',
				"fixed"  => 'fixed'
			),
			"dependency" => Array('element' => "background_image",'not_empty' => true)
		));


		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding left (only integer value, without any string)",
			"param_name" => "padding_left",
			"value"      => "0"
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding right (only integer value, without any string)",
			"param_name" => "padding_right",
			"value"      => "0"
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding top (only integer value, without any string)",
			"param_name" => "padding_top",
			"value"      => "20"
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding bottom (only integer value, without any string)",
			"param_name" => "padding_bottom",
			"value"      => "20"
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Parallax",
			"param_name" => "parallax",
			"value"      => array(
				"false"  => 'false',
				"true"   => 'true'
			),
			"dependency" => Array('element' => "background_image",'not_empty' => true)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Video background",
			"param_name" => "video",
			"value"      => array(
				"false"  => 'false',
				"true"   => 'true'
			),
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Enter WEBM video file link here:",
			"param_name" => "webm_video",
			"value"      => "",
			"dependency" => Array('element' => "video",'value' => 'true')
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Enter MP4 video file link here:",
			"param_name" => "mp4_video",
			"value"      => "",
			"dependency" => Array('element' => "video",'value' => 'true')
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Enter OGV video file link here:",
			"param_name" => "ogv_video",
			"value"      => "",
			"dependency" => Array('element' => "video",'value' => 'true')
		));

		vc_add_param('vc_row', array(
			"type"       => "attach_image",
			"class"      => "",
			"heading"    => "Video poster (for mobile devices)",
			"param_name" => "video_poster",
			"value"      => "",
			"dependency" => Array('element' => "video",'value' => 'true')
		));

		vc_add_param('vc_row', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Video overlay color",
			"param_name" => "overlay_color",
			"value"      => "",
			"dependency" => Array('element' => "video",'value' => 'true')
		));

		vc_add_param('vc_row', array(
			"type"       => "attach_image",
			"class"      => "",
			"heading"    => "Video overlay pattern",
			"param_name" => "overlay_pattern",
			"value"      => "",
			"dependency" => Array('element' => "video",'value' => 'true')
		));

	/*  VIDEO              (EXISTING)
	/*-------------------------------*/

		vc_add_param('vc_video', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Enter WEBM video file link here:",
			"param_name" => "webm_video",
			"value"      => ""
		));

		vc_add_param('vc_video', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Enter MP4 video file link here:",
			"param_name" => "mp4_video",
			"value"      => ""
		));

		vc_add_param('vc_video', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Enter OGV video file link here:",
			"param_name" => "ogv_video",
			"value"      => ""
		));

		vc_add_param('vc_video', array(
			"type"       => "attach_image",
			"class"      => "",
			"heading"    => "Video poster (for mobile devices)",
			"param_name" => "video_poster",
			"value"      => ""
		));

		vc_add_param('vc_video', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Autoplay",
			"param_name" => "autoplay",
			"value"      => array(
				"off"  => 'off',
				"on"   => 'on'
			)
		));

		vc_add_param('vc_video', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Loop",
			"param_name" => "loop",
			"value"      => array(
				"off"  => 'off',
				"on"   => 'on'
			)
		));

		vc_add_param('vc_video', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Width",
			"param_name" => "width",
			"value"      => ""
		));

		vc_add_param('vc_video', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Height",
			"param_name" => "height",
			"value"      => ""
		));

	if (defined( 'NINZIO_ADDONS' ) && file_exists( get_template_directory() . '/plugins/ninzio-addons.zip' ) ) {
		add_action( 'init', 'focuson_ninzio_integrateVC');
	    function focuson_ninzio_integrateVC() {

	    	/*  BUTTONS              (CONTENT)
			/*-------------------------------*/

		    	vc_map(array(
		    		'name'                    => "Button",
		    		'base'                    => "nz_btn",
		    		'class'                   => 'nz-button',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-button',
		    		'js_view'                 => '',
		    		'description'             => 'Use this element to insert buttons',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Text",
							"param_name" => "text",
							"value"      => "Text"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Link",
							"param_name" => "link",
							"value"      => "#"
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Link target",
							"param_name" => "target",
							"value"      => array(
								"self"  => '_self',
								"blank" => '_blank'
							)
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "width 100%",
							"param_name" => "full_width",
							"value"      => array(
								"False"  => 'false',
								"True"   => 'true'
							)
						),
						array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Icon name",
							"param_name"  => "icon",
							"value"       => "",
							'description' => "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animate icon",
							"param_name" => "animate",
							"value"      => array(
								"false"  => 'false',
								"true" => 'true'
							),
							"dependency" => Array('element' => "icon",'not_empty' => true)
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animation type",
							"param_name" => "animation_type",
							"value"      => array(
								"ghost"  => 'ghost',
								"reverse"=> 'reverse'
							),
							"dependency" => Array('element' => "animate", 'value' => 'true')
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Color",
							"param_name" => "color",
							"value"      => array(
								"default"     => 'default',
								"blue"        => 'blue',
								"turquoise"   => 'turquoise',
								"pink"        => 'pink',
								"violet"      => 'violet',
								"peacoc"      => 'peacoc',
								"chino"       => 'chino',
								"mulled wine" => 'mulled_wine',
								"vista blue"  => 'vista_blue',
								"black"       => 'black',
								"grey"        => 'grey',
								"orange"      => 'orange',
								"sky"         => 'sky',
								"green"       => 'green',
								"yellow"      => 'yellow',
								"sandy brown" => 'sandy_brown',
								"purple"      => 'purple',
								"white"       => 'white'
							)
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Size",
							"param_name" => "size",
							"value"      => array(
								"small"  => 'small',
								"medium" => 'medium',
								"large"  => 'large'
							)
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Shape",
							"param_name" => "shape",
							"value"      => array(
								"square"  => 'square',
								"rounded" => 'rounded',
								"round"   => 'round'
							)
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Type",
							"param_name" => "type",
							"value"      => array(
								"normal" => 'normal',
								"ghost"  => 'ghost',
								"3d"     => '3d'
							)
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Hover effect (only if icon animation is off)",
							"param_name" => "hover_normal",
							"value"      => array(
								"fill"     => 'fill',
								"opacity"  => 'opacity'
							),
							"dependency" => Array('element' => "type", 'value' => 'normal')
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Hover effect (only if icon animation is off)",
							"param_name" => "hover_ghost",
							"value"      => array(
								"fill"     => 'fill',
								"drop"     => 'drop',
								"side"     => 'side',
								"scene"    => 'scene',
								"screen"   => 'screen'
							),
							"dependency" => Array('element' => "type", 'value' => 'ghost')
						),
						array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Extra class name",
							"param_name"  => "el_class",
							"value"       => "",
							'description' => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
						),
		    		)
		    	));
			
			/*  GAP                  (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Gap",
		    		'base'                    => "nz_gap",
		    		'class'                   => 'nz-gap',
		    		'show_settings_on_create' => false,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-gap',
		    		'js_view'                 => '',
		    		'description'             => 'Insert gap',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Gep size (only integer value, without any string)",
							"param_name" => "height",
							"value"      => "25"
						)
		    		)
		    	));

		    /*  SEPARATOR            (CONTENT)
			/*-------------------------------*/

		    	vc_map(array(
					'name'                    => "Separator",
					'base'                    => "nz_sep",
					'class'                   => 'nz-sep',
					'show_settings_on_create' => false,
					'category'                => esc_html__("Ninzio",'focuson'),
					'icon'                    => 'icon-separator',
					'description'             => 'Use this element to separate content',
					'js_view'                 => '',
					'params'                  => array(
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Type",
							"param_name" => "type",
							"value"      => array(
								"solid"  => 'solid',
								"dotted" => 'dotted',
								"dashed" => 'dashed',
							)
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Color",
							"param_name" => "color",
							"value"      => "#e0e0e0"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Gap from top (only integer value, without any string)",
							"param_name" => "top",
							"value"      => "20"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Gap from bottom (only integer value, without any string)",
							"param_name" => "bottom",
							"value"      => "20"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Width (only integer value, without any string, if you want 100% leave blank)",
							"param_name" => "width",
							"value"      => ""
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Height (only integer value, without any string, if you want 1px leave blank)",
							"param_name" => "height",
							"value"      => ""
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Align",
							"param_name" => "align",
							"value"      => array(
								"left"  => 'left',
								"right" => 'right',
								"center" => 'center',
							)
						),
					)
				));
			
			/*  SOCIAL LINKS         (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Social links",
		    		'base'                    => "nz_sl",
		    		'class'                   => 'nz-sl',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-social-links',
		    		'js_view'                 => '',
		    		'description'             => 'Insert social links',
		    		'params'                  => array(
		    			array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Links target",
							"param_name" => "target",
							"value"      => array(
								"self"  => '_self',
								"blank" => '_blank'
							)
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Links alignment",
							"param_name" => "align",
							"value"      => array(
								"left"   => 'left',
								"right"  => 'right',
								"center" => 'center',
							)
						)
		    		)
		    	));

				$social_links_array = array(
		    		'rss',
					'facebook',
					'twitter',
					'googleplus',
					'youtube',
					'vimeo',
					'linkedin',
					'pinterest',
					'flickr',
					'instagram',
					'skype',
					'apple',
					'dribbble',
					'android',
					'behance',
					'email'
				);

				foreach ($social_links_array as $social) {
					vc_add_param("nz_sl", array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => ucfirst($social)." link",
						"param_name" => $social,
						"value"      => ""
					));
				}

			/*  ICONS                (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Icon",
		    		'base'                    => "nz_icons",
		    		'class'                   => 'nz-icons',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-icons',
		    		'description'             => 'Insert icomoon icons',
		    		'js_view'                 => '',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Icon name",
							"param_name" => 'icon',
							"value"      => "icon-happy",
							'description'=> "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Icon type",
							"param_name" => "type",
							"value"      => array(
								"none"   => 'none',
								"circle" => 'circle',
								"square" => 'square'
							)
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Icon size",
							"param_name" => "size",
							"value"      => array(
								"small"  => 'small',
								"medium" => 'medium',
								"large"  => 'large'
							)
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon color",
							"param_name" => "icon_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon background color",
							"param_name" => "background_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon border color",
							"param_name" => "border_color",
							"value"      => ""
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animate",
							"param_name" => "animate",
							"value"      => array(
								"false"  => 'false',
								"true"   => 'true'
							)
						),
		    		)
		    	));	

		    /*  ICON SEPARATOR       (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Icon separator",
		    		'base'                    => "nz_icon_separator",
		    		'class'                   => 'nz-icon-separator',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-icon-separator',
		    		'description'             => 'Insert icon separator',
		    		'js_view'                 => '',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Icon name",
							"param_name" => 'icon',
							"value"      => "icon-happy",
							'description'=> "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon color",
							"param_name" => "icon_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon border color",
							"param_name" => "border_color",
							"value"      => ""
						)
		    		)
		    	));	
			
			/*  ICON LIST            (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Icon list",
		    		'base'                    => "nz_icon_list",
		    		'class'                   => 'nz-icon-list',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-icon-list',
		    		'description'             => 'Insert icon list',
		    		'js_view'                 => '',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Icon name",
							"param_name" => 'icon',
							"value"      => "icon-checkmark",
							'description'=> "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Icon type",
							"param_name" => "type",
							"value"      => array(
								"none"   => 'none',
								"circle" => 'circle',
								"square" => 'square'
							)
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon color",
							"param_name" => "icon_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon background color",
							"param_name" => "background_color",
							"value"      => ""
						),
						array(
							"type"       => "textarea",
							"heading"    => "List items",
							"param_name" => "content",
							"value"      => '',
							'description' => 'Use line break (press Enter) to separate between items',
						),
		    		)
		    	));	

			/*  SINGLE IMAGE         (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Single Image",
		    		'base'                    => "nz_single_image",
		    		'class'                   => 'nz-single-image',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-single-image',
		    		'js_view'                 => '',
		    		'description'             => 'Insert single image',
		    		'params'                  => array(
		    			array(
							"type"       => "attach_image",
							"class"      => "",
							"heading"    => "Upload image",
							"param_name" => "image",
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Link to large image",
							"param_name" => "img_link_large",
							"value"      => array(
								"false"  => 'false',
								"true"  => 'true'
							)
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Link",
							"param_name" => 'link',
							"value"      => ""
						),
		    			array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Image size",
							"param_name" => "img_size",
							"value"      => array(
								"thumbnail"              => 'thumbnail',
								"medium"                 => 'medium',
								"large"                  => 'large',
								"full size"              => 'full',
								"ninzio-half"            => 'Focuson-Ninzio-Half',
								"ninzio-one-third"       => 'Focuson-Ninzio-One-Third',
								"ninzio-three-quarters"  => 'Focuson-Ninzio-Three-Quarters',
								"ninzio-whole"           => 'Focuson-Ninzio-Whole'
							)
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Image alignment",
							"param_name" => "alignment",
							"value"      => array(
								"none"   => 'none',
								"left"   => 'left',
								"right"  => 'right',
								"center" => 'center'
							)
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Class",
							"param_name" => 'el_class',
							"value"      => ""
						)
		    		)
		    	));
			
			/*  GALLERY              (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Gallery",
		    		'base'                    => "nz_vc_gallery",
		    		'class'                   => 'nz-vc-gallery',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-gallery',
		    		'js_view'                 => '',
		    		'description'             => 'Insert image gallery',
		    		'params'                  => array(
		    			array(
							"type"       => "attach_images",
							"class"      => "",
							"heading"    => "Upload images",
							"param_name" => "images",
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Link to full image?",
							"param_name" => "link_full",
							"value"      => array(
								"false" => 'false',
								"true"  => 'true'
							)
						),
						array(
							"type"       => "dropdown",
							"heading"    => "Version",
							"param_name" => "version",
							"value"      => array("grid"=>"grid","carousel"=>"carousel")
						),
		    			array(
							"type"       => "dropdown",
							"heading"    => "Autoplay",
							"param_name" => "autoplay",
							"value"      => array("false"=>"false","true"=>"true"),
							"dependency" => Array('element' => "version",'value' => 'carousel')
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Image size",
							"param_name" => "img_size",
							"value"      => array(
								"thumbnail"              => 'thumbnail',
								"medium"                 => 'medium',
								"ninzio-uni"             => 'Focuson-Ninzio-Half',
								"ninzio-half"            => 'Focuson-Ninzio-Half',
								"ninzio-one-third"       => 'Focuson-Ninzio-One-Third',
							),
							"dependency" => Array('element' => "version",'value' => 'grid')
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Image size",
							"param_name" => "img_size_carousel",
							"value"      => array(
								"medium"                 => 'medium',
								"ninzio-uni"             => 'Focuson-Ninzio-Half',
								"ninzio-half"            => 'Focuson-Ninzio-Half',
								"ninzio-one-third"       => 'Focuson-Ninzio-One-Third',
							),
							"dependency" => Array('element' => "version",'value' => 'carousel')
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array(
								"1" => '1',
								"2" => '2',
								"3" => '3',
								"4" => '4',
								"5" => '5',
								"6" => '6',
								"7" => '7',
								"8" => '8',
								"9" => '9'
							),
							"dependency" => Array('element' => "version",'value' => 'grid')
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Columns",
							"param_name" => "columns_carousel",
							"value"      => array(
								"1" => '1',
								"2" => '2',
								"3" => '3',
								"4" => '4',
								"5" => '5',
								"6" => '6'
							),
							"dependency" => Array('element' => "version",'value' => 'carousel')
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animation",
							"param_name" => "animate",
							"value"      => array(
								"none" => 'none',
								"fade"  => 'fade',
								"scale"  => 'scale'
							)
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Class",
							"param_name" => 'el_class',
							"value"      => ""
						)
		    		)
		    	));

			/*  YOUTUBE              (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Youtube",
		    		'base'                    => "nz_youtube",
		    		'class'                   => 'nz-youtube',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-youtube',
		    		'description'             => 'Insert youtube videos',
		    		'js_view'                 => '',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Video ID",
							"param_name" => "id",
							"value"      => "KDOLHClNTOI",
							"description" => "For example https://www.youtube.com/watch?v=KDOLHClNTOI (Use video id after watch?v=)"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Width optional (only integer value, without any string)",
							"param_name" => "width",
							"value"      => ""
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Modal",
							"param_name" => "modal",
							"value"      => array("false"=>"false","true"=>"true")
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Video title",
							"param_name" => "title",
							"value"      => "",
							"dependency" => Array('element' => "modal", 'value' => 'true')
						),
						array(
							"type"       => "attach_image",
							"class"      => "",
							"heading"    => "Upload modal image",
							"param_name" => "img",
							"value"      => "",
							"dependency" => Array('element' => "modal", 'value' => 'true')
						)
		    		)
		    	));

		    /*  VIMEO                (CONTENT) 
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Vimeo",
		    		'base'                    => "nz_vimeo",
		    		'class'                   => 'nz-vimeo',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-vimeo',
		    		'description'             => 'Insert vimeo videos',
		    		'js_view'                 => '',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Video ID",
							"param_name" => "id",
							"value"      => "5121526",
							"description" => "For example http://vimeo.com/5121526 (Use video id after last /)"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Width optional (only integer value, without any string)",
							"param_name" => "width",
							"value"      => ""
						),array(
		    				"type"       => "dropdown",
							"heading"    => "Modal",
							"param_name" => "modal",
							"value"      => array("false"=>"false","true"=>"true")
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Width optional (only integer value, without any string)",
							"param_name" => "width",
							"value"      => ""
						),
						array(
							"type"       => "attach_image",
							"class"      => "",
							"heading"    => "Upload modal image",
							"param_name" => "img",
							"value"      => "",
							"dependency" => Array('element' => "modal", 'value' => 'true')
						)
		    		)
		    	));
	   
			/*  SOUNDCLOUD           (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Soundcloud",
		    		'base'                    => "nz_soundcloud",
		    		'class'                   => 'nz-soundcloud',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-soundcloud',
		    		'js_view'                 => '',
		    		'description'             => 'Insert soundcloud audio',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Url",
							"param_name" => "url",
							"value"      => "https://api.soundcloud.com/tracks/151325062",
							"description" => "For example https://api.soundcloud.com/tracks/151325062"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Width (optional)",
							"param_name" => "width",
							"value"      => "100%"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Height (optional)",
							"param_name" => "height",
							"value"      => "166"
						)
		    		)
		    	));

			/*  RECENT TWEETS        (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Recent tweets",
		    		'base'                    => "nz_tweets",
		    		'class'                   => 'nz-tweets',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-tweets',
		    		'js_view'                 => '',
		    		'description'             => 'Insert recent tweets',
		    		'params'                  => array(
		    			array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Text color",
							"param_name" => "color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon color",
							"param_name" => "icon_color",
							"value"      => ""
						),
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Twitter user ID",
							"param_name" => "user_id",
							"value"      => "tutsplus",
							"description" => "Make sure you have configured recent tweets shortcode options from theme options >> social"
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Number of tweets",
							"param_name" => "number",
							"value"      => array(
								"1" => '1',
								"2" => '2',
								"3" => '3',
								"4" => '4',
								"5" => '5',
								"6" => '6',
								"7" => '7',
								"8" => '8',
								"9" => '9',
								"10" => '10'
							)
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Autoplay",
							"param_name" => "autoplay",
							"value"      => array("false"=>"false","true"=>"true")
						),
		    		)
		    	));

			/*  MAILCHIMP            (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Mailchimp",
		    		'base'                    => "nz_mailchimp",
		    		'class'                   => 'nz-mailchimp',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-mailchimp',
		    		'js_view'                 => '',
		    		'description'             => 'Insert mailchimp subscribe form',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Action",
							"param_name" => "action",
							"value"      => ""
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Name",
							"param_name" => "name",
							"value"      => ""
						),
						array(
		    				"type"       => "textarea_html",
		    				"class"      => "",
							"heading"    => "Description",
							"param_name" => "content",
							"value"      => '',
						)
		    		)
		    	));

			/*  TABS                 (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Tabs",
		    		'base'                    => "nz_tabs",
		    		"as_parent"               => array('only' => 'nz_tab'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-tabs',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		'icon'                    => 'icon-tabs',
		    		"js_view"                 => 'VcColumnView',
		    		'description'             => 'Insert tabs',
		    		'params'                  => array(
		    			array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Type",
							"param_name" => "type",
							"value"      => array(
								"horizontal" => 'horizontal',
								"vertical"   => 'vertical'
							),
							"dependency" => Array('element' => "full", 'value' => 'false')
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Full tabs",
							"param_name" => "full",
							"value"      => array(
								"false" => 'false',
								"true"  => 'true'
							)
						),
						array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Extra class name",
							"param_name"  => "el_class",
							"value"       => "",
							'description' => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
						)
		    		)
		    	));

				vc_map(array(
		    		'name'                    => "Tab",
		    		'base'                    => "nz_tab",
		    		"as_child"                => array('only' => 'nz_tabs'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
		    				"type"       => "textfield",
							"heading"    => "Title",
							"param_name" => "title",
							"value"      => 'Title goes here'
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Icon name",
							"param_name" => 'icon',
							"value"      => "",
							'description'=> "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
						array(
		    				"type"       => "textarea_html",
							"heading"    => "Content",
							"param_name" => "content",
							"value"      => 'Tab content goes here',
						)
		    		)
		    	));

		    /*  ACCORDION            (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Accordion",
		    		'base'                    => "nz_accordion",
		    		"as_parent"               => array('only' => 'nz_toggle'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-accordion',
		    		'show_settings_on_create' => false,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		'icon'                    => 'icon-accordion',
		    		"js_view"                 => 'VcColumnView',
		    		'description'             => 'Insert accordion',
		    		'params'                  => array(
		    			array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Collapsible",
							"param_name" => "collapsible",
							"value"      => array(
								"false" => 'false',
								"true"  => 'true'
							)
						),
						array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Extra class name",
							"param_name"  => "el_class",
							"value"       => "",
							'description' => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
						)
		    		)
		    	));

				vc_map(array(
		    		'name'                    => "Toggle",
		    		'base'                    => "nz_toggle",
		    		"as_child"                => array('only' => 'nz_accordion'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Open",
							"param_name" => "open",
							"value"      => array(
								"false" => 'false',
								"true"  => 'true'
							)
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Title",
							"param_name" => "title",
							"value"      => 'Title goes here'
						),
						array(
		    				"type"       => "textarea_html",
							"heading"    => "Content",
							"param_name" => "content",
							"value"      => 'Toggle content goes here',
						)
		    		)
		    	));
			
			/*  TAGLINE              (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Tagline",
		    		'base'                    => "nz_tagline",
		    		'class'                   => 'nz-tagline',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-tagline',
		    		'js_view'                 => '',
		    		'description'             => 'Insert colorfull call to action promo',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Title",
							"param_name" => "title",
							"value"      => "Super call to action title goes here"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Tagline icon",
							"param_name" => 'icon',
							"value"      => "",
							'description'=> "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Tagline text color",
							"param_name" => "color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Background color",
							"param_name" => "background_color",
							"value"      => ""
						),
						array(
							"type"       => "attach_image",
							"class"      => "",
							"heading"    => "Upload background image",
							"param_name" => "background_image",
							"value"      => ""
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Button color",
							"param_name" => "button_color",
							"value"      => array(
								"white"       => 'white',
								"default"     => 'default',
								"blue"        => 'blue',
								"turquoise"   => 'turquoise',
								"pink"        => 'pink',
								"violet"      => 'violet',
								"peacoc"      => 'peacoc',
								"chino"       => 'chino',
								"mulled wine" => 'mulled_wine',
								"vista blue"  => 'vista_blue',
								"black"       => 'black',
								"grey"        => 'grey',
								"orange"      => 'orange',
								"sky"         => 'sky',
								"green"       => 'green',
								"yellow"      => 'yellow',
								"sandy brown" => 'sandy_brown',
								"purple"      => 'purple',
							)
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Button link",
							"param_name" => "link",
							"value"      => ""
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Button text",
							"param_name" => "text",
							"value"      => "Click here"
						)
					)
				));
			
			/*  TIMER                (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Timer",
		    		'base'                    => "nz_timer",
		    		'class'                   => 'nz-timer',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-timer',
		    		'js_view'                 => '',
		    		'description'             => 'Insert colorfull timer',
		    		'params'                  => array(
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "End date to count to",
							"param_name" => "enddate",
							"value"      => "",
							'description' => 'Use format : June 7, 2025 15:03:25',
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Days label",
							"param_name" => "days",
							"value"      => "Days"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Hours label",
							"param_name" => "hours",
							"value"      => "Hours"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Minutes label",
							"param_name" => "minutes",
							"value"      => "Minutes"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Seconds label",
							"param_name" => "seconds",
							"value"      => "Seconds"
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Text color",
							"param_name" => "text_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Value color",
							"param_name" => "value_color",
							"value"      => ""
						)
		    		)
		    	));

			/*  ALERT                (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Alert message",
		    		'base'                    => "nz_alert",
		    		'class'                   => 'nz-alert',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-alert',
		    		'js_view'                 => '',
		    		'description'             => 'Insert different UI messages',
		    		'params'                  => array(
		    			array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Message type",
							"param_name" => "type",
							"value"      => array(
								"note"        => 'note',
								"success"     => 'success',
								"warning"     => 'warning',
								"error"       => 'error',
								"information" => 'information'
							)
						),
						array(
							"type"       => "textarea",
							"class"      => "",
							"param_name" => "content",
							"value"      => 'Alert message content goes here'
						)
		    		)
		    	));
	    
			/*  GOOGLE MAP           (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Google map",
		    		'base'                    => "nz_gmap",
		    		'class'                   => 'nz-gmap',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-gmap',
		    		'js_view'                 => '',
		    		'description'             => 'Insert google map',
		    		'params'                  => array(
		    			array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "X coordinate",
							"param_name"  => "x_coords",
							"value"       => "53.339381",
							'description' => 'Use latitude coordinate',
						),
		    			array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Y coordinate",
							"param_name"  => "y_coords",
							"value"       => "-6.260405",
							'description' => 'Use longitude coordinate',
						),
		    			array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Google map zoom level (from 1 to 19 only integer value, without any string)",
							"param_name" => "zoom",
							"value"      => "18"
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Type",
							"param_name" => "type",
							"value"      => array(
								"roadmap"    => 'roadmap',
								"satellite"  => 'satellite',
								"hybrid"     => 'hybrid',
								"terrain"    => 'terrain',
								"grey"       => 'grey',
								"black"      => 'black',
								"routexl"    => 'routexl'
							)
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Width",
							"param_name" => "width",
							"value"      => "100%"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Height",
							"param_name" => "height",
							"value"      => "480px"
						),
						array(
							"type"       => "attach_image",
							"class"      => "",
							"heading"    => "Upload custom marker",
							"param_name" => "marker",
							"value"      => ""
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Animate marker",
							"param_name" => "animate",
							"value"      => array("false"=>"false","true"=>"true")
						)
		    		)
		    	));
			
			/*  ICON-PROGRESS-BAR    (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Icon progress",
		    		'base'                    => "nz_icon_progress",
		    		'class'                   => 'nz-icon-progress',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-icon-progress',
		    		'js_view'                 => '',
		    		'description'             => 'Insert icon-based animated infographics',
		    		'params'                  => array(
		    			array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Icon name",
							"param_name"  => "icon",
							"value"       => "icon-star3",
							'description' => "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Inactive icons color",
							"param_name" => "inactive_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Active icons color",
							"param_name" => "active_color",
							"value"      => ""
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Number of icons total",
							"param_name" => "number",
							"value"      => "10"
						),
						array(
							"type"       => "textfield",
							"class"      => "",
							"heading"    => "Number of icons to animate (active icons)",
							"param_name" => "active",
							"value"      => "7"
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Align",
							"param_name" => "align",
							"value"      => array(
								"left"   => 'left',
								"right"  => 'right',
								"center" => 'center'
							)
						)
		    		)
		    	));
			
			/*  RECENT POSTS         (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Recent posts",
		    		'base'                    => "nz_rposts",
		    		'class'                   => 'nz-rposts',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-recent-posts',
		    		'js_view'                 => '',
		    		'description'             => 'Insert recent posts',
		    		'params'                  => array(
		    			array(
		    				"type"       => "textfield",
							"heading"    => "Number of posts",
							"param_name" => "posts_number",
							"value"      => '3'
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Categories (enter comma separated categories IDs if you want to show certain categories)",
							"param_name" => "cat",
							"value"      => ''
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("1"=>"1","2"=>"2","3"=>"3")
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Animate",
							"param_name" => "animate",
							"value"      => array("false"=>"false","true"=>"true")
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Autoplay",
							"param_name" => "autoplay",
							"value"      => array("false"=>"false","true"=>"true")
						)
		    		)
		    	));

		    /*  RECENT PROJECTS       (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Recent projects",
		    		'base'                    => "nz_rprojects",
		    		'class'                   => 'nz-rprojects',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-recent-projects',
		    		'js_view'                 => '',
		    		'description'             => 'Insert recent projects',
		    		'params'                  => array(
		    			array(
		    				"type"       => "textfield",
							"heading"    => "Number of projects",
							"param_name" => "posts_number",
							"value"      => '3'
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Animate",
							"param_name" => "animate",
							"value"      => array("false"=>"false","true"=>"true")
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Categories (enter comma separated categories IDs if you want to show certain categories)",
							"param_name" => "cat",
							"value"      => ''
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Layout",
							"param_name" => "layout",
							"value"      => array(
								"small-standard"     => "small-standard",
								"medium-standard"    => "medium-standard",
								"large-standard"     => "large-standard",
								"small-image"        => "small-image",
								"medium-image"       => "medium-image",
								"large-image"        => "large-image",
								"small-image-nogap"  => "small-image-nogap",
								"medium-image-nogap" => "medium-image-nogap"
							)
						),
		    		)
		    	));

			/*  RECENT PRODUCTS      (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Recent products",
		    		'base'                    => "nz_rproducts",
		    		'class'                   => 'nz-rproducts',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-recent-products',
		    		'js_view'                 => '',
		    		'description'             => 'Insert recent products',
		    		'params'                  => array(
		    			array(
		    				"type"       => "textfield",
							"heading"    => "Number of products",
							"param_name" => "posts_number",
							"value"      => '3',
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4"),
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Categories (enter comma separated categories IDs if you want to show certain categories)",
							"param_name" => "cat",
							"value"      => '',
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Product ID (enter comma separated product IDs if you want to show certain products)",
							"param_name" => "pr",
							"value"      => '',
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Animate",
							"param_name" => "animate",
							"value"      => array("false"=>"false","true"=>"true"),
						)
		    		)
		    	));

			/*  PROGRESS-BAR         (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Progress",
		    		'base'                    => "nz_progress",
		    		"as_parent"               => array('only' => 'nz_line'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-progress',
		    		'show_settings_on_create' => false,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		"js_view"                 => 'VcColumnView',
		    		'icon'                    => 'icon-progress',
		    		'description'             => 'Insert animated progress bars'
		    	));

				vc_map(array(
		    		'name'                    => "Line",
		    		'base'                    => "nz_line",
		    		"as_child"                => array('only' => 'nz_progress'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
		    				"type"       => "textfield",
							"heading"    => "Percentage (only integer value, without any string)",
							"param_name" => "percentage",
							"value"      => '70'
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Bar color",
							"param_name" => "bar_color",
							"value"      => ""
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Title",
							"param_name" => "title",
							"value"      => 'Title'
						)
		    		)
		    	));

			/*  PROGRESS-CIRCLE      (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Circle progress",
		    		'base'                    => "nz_circle_progress",
		    		"as_parent"               => array('only' => 'nz_circle'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-circle-progress',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		"js_view"                 => 'VcColumnView',
		    		'icon'                    => 'icon-circle-progress',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Align",
							"param_name" => "align",
							"value"      => array("left"=>"left","right"=>"right","center"=>"center")
						),
		    		),
		    		'description'             => 'Insert animated circle progresses'
		    	));

				vc_map(array(
		    		'name'                    => "Circle bar",
		    		'base'                    => "nz_circle",
		    		"as_child"                => array('only' => 'nz_circle_progress'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Icon",
							"param_name"  => "icon",
							"value"       => "",
							'description'=> "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
		    			array(
		    				"type"       => "textfield",
							"heading"    => "Percentage (only integer value, without any string)",
							"param_name" => "percentage",
							"value"      => '70'
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Bar color",
							"param_name" => "bar_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Track color",
							"param_name" => "track_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Color",
							"param_name" => "color",
							"value"      => ""
						),
						array(
		    				"type"       => "textarea_html",
							"heading"    => "Count content",
							"param_name" => "content",
							"value"      => '<h3>Count title goes here</h3><p>Counter content goes here</p>',
						)
		    		)
		    	));

			/*  COUNTER              (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Counter",
		    		'base'                    => "nz_counter",
		    		"as_parent"               => array('only' => 'nz_count'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-counter',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		"js_view"                 => 'VcColumnView',
		    		'icon'                    => 'icon-counter',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4")
						)
		    		),
		    		'description'             => 'Count anything with animated counters'

		    	));

				vc_map(array(
		    		'name'                    => "Count",
		    		'base'                    => "nz_count",
		    		"as_child"                => array('only' => 'nz_counter'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Icon",
							"param_name"  => "icon",
							"value"       => "",
							'description'=> "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
		    			array(
		    				"type"       => "textfield",
							"heading"    => "Value (only integer value, without any string)",
							"param_name" => "value",
							"value"      => '70'
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon color",
							"param_name" => "icon_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Text color",
							"param_name" => "text_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Value color",
							"param_name" => "value_color",
							"value"      => ""
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Count title",
							"param_name" => "title",
							"value"      => 'Title goes here',
						)
						
		    		)
		    	));

			/*  CONTENTBOX           (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Content boxes",
		    		'base'                    => "nz_content_box",
		    		"as_parent"               => array('only' => 'nz_box'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-content-box',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		"js_view"                 => 'VcColumnView',
		    		'icon'                    => 'icon-content-box',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4")
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animation",
							"param_name" => "animate",
							"value"      => array(
								"none" => 'none',
								"fade"  => 'fade',
								"scale"  => 'scale'
							)
						)
		    		),
		    		'description'             => 'Insert icon-based boxes with columns'
		    	));

				vc_map(array(
		    		'name'                    => "Box",
		    		'base'                    => "nz_box",
		    		"as_child"                => array('only' => 'nz_content_box'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Box link",
							"param_name"  => "link",
							"value"       => ""
						),
						array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Icon",
							"param_name"  => "icon",
							"value"       => "",
							'description'=> "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon color",
							"param_name" => "icon_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon background color",
							"param_name" => "icon_back_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon border color",
							"param_name" => "icon_border_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon hover color",
							"param_name" => "icon_hover_color",
							"value"      => ""
						),
						array(
		    				"type"       => "textarea_html",
							"heading"    => "Box content",
							"param_name" => "content",
							"value"      => '<h3>Box title goes here</h3><p>Box content goes here</p>',
						)
		    		)
		    	));
			
			/*  SLIDER BANNER        (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Slider banner",
		    		'base'                    => "nz_slider_banner",
		    		"as_parent"               => array('only' => 'nz_banner'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-slider-banner',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		"js_view"                 => 'VcColumnView',
		    		'icon'                    => 'icon-slider-banner',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("2"=>"2","3"=>"3","4"=>"4")
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Icon color",
							"param_name" => "icon_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Border color",
							"param_name" => "border_color",
							"value"      => ""
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Background color",
							"param_name" => "background_color",
							"value"      => ""
						),
						array(
							"type"       => "attach_image",
							"class"      => "",
							"heading"    => "Background image",
							"param_name" => "background_image",
							"value"      => ""
						),
		    		),
		    		'description'             => 'Insert icon-based boxes with columns'
		    	));

				vc_map(array(
		    		'name'                    => "Banner",
		    		'base'                    => "nz_banner",
		    		"as_child"                => array('only' => 'nz_slider_banner'),
		    		"content_element"         => true,
		    		'params'                  => array(
						array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => "Icon",
							"param_name"  => "icon",
							"value"       => "",
							'description'=> "Enter icon name (icon list can be found in icomoon folder, see help)"
						),
						array(
		    				"type"       => "textarea_html",
							"heading"    => "Banner content",
							"param_name" => "content",
							"value"      => '<h3>Banner title goes here</h3><p>Banner content goes here</p>',
						)
		    		)
		    	));

			/*  TESTIMONIALS         (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Testimonials",
		    		'base'                    => "nz_testimonials",
		    		"as_parent"               => array('only' => 'nz_testimonial'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-testimonials',
		    		'show_settings_on_create' => true,
		    		"js_view"                 => 'VcColumnView',
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		'icon'                    => 'icon-testimonials',
		    		'description'             => 'Add testimonials carousel with this element',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("1"=>"1","2"=>"2")
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Autoplay",
							"param_name" => "autoplay",
							"value"      => array("false"=>"false","true"=>"true")
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animation",
							"param_name" => "animate",
							"value"      => array(
								"none" => 'none',
								"fade"  => 'fade',
								"scale"  => 'scale'
							)
						)
		    		)
		    	));

				vc_map(array(
		    		'name'                    => "Testimonial",
		    		'base'                    => "nz_testimonial",
		    		"as_child"                => array('only' => 'nz_testimonials'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
							"type"       => "attach_image",
							"class"      => "",
							"heading"    => "Upload person image",
							"param_name" => "img",
							"value"      => ""
						),
		    			array(
		    				"type"       => "textfield",
							"heading"    => "Person name",
							"param_name" => "name",
							"value"      => 'Person Name'
						),
						array(
							"type"        => "textfield",
							"heading"     => "Title",
							"param_name"  => "title",
							"value"       => "Title"
						),
						array(
							"type"       => "textarea",
							"param_name" => "content",
							"value"      => 'Testimonial goes here'
						)
		    		)
		    	));

			/*  CLIENT               (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Clients",
		    		'base'                    => "nz_cl",
		    		"as_parent"               => array('only' => 'nz_c'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-clients',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		"js_view"                 => 'VcColumnView',
		    		'icon'                    => 'icon-clients',
		    		'description'             => 'Add clients carousel',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6")
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Autoplay",
							"param_name" => "autoplay",
							"value"      => array("false"=>"false","true"=>"true")
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animation",
							"param_name" => "animate",
							"value"      => array(
								"none" => 'none',
								"fade"  => 'fade',
								"scale"  => 'scale'
							)
						)
		    		)
		    	));

				vc_map(array(
		    		'name'                    => "Client",
		    		'base'                    => "nz_c",
		    		"as_child"                => array('only' => 'nz_cl'),
		    		"content_element"         => true,
		    		'params'                  => array(
						array(
							"type"        => "attach_image",
							"class"       => "",
							"heading"     => "Client image",
							"param_name"  => "img",
							"value"       => ""
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Name",
							"param_name" => "name",
							"value"      => 'Enter client name here'
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Link",
							"param_name" => "link",
							"value"      => 'Enter client link here'
						)
						
		    		)
		    	));

			/*  PERSONS              (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Persons",
		    		'base'                    => "nz_persons",
		    		"as_parent"               => array('only' => 'nz_person'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-persons',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		"js_view"                 => 'VcColumnView',
		    		'icon'                    => 'icon-persons',
		    		'description'             => 'Add persons',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4")
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animation",
							"param_name" => "animate",
							"value"      => array(
								"none" => 'none',
								"fade"  => 'fade',
								"scale"  => 'scale'
							)
						)
		    		)
		    	));

				vc_map(array(
		    		'name'                    => "Person",
		    		'base'                    => "nz_person",
		    		"as_child"                => array('only' => 'persons'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
							"type"        => "attach_image",
							"heading"     => "Person image",
							"param_name"  => "img",
							"value"       => ""
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Name",
							"param_name" => "name",
							"value"      => 'Person name'
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Title",
							"param_name" => "title",
							"value"      => 'Person title/position'
						),
						array(
		    				"type"       => "textarea",
							"heading"    => "Bio",
							"param_name" => "bio",
							"value"      => ''
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Link",
							"param_name" => "link",
							"value"      => ''
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Twitter link",
							"param_name" => "twitter",
							"value"      => ''
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Facebook link",
							"param_name" => "facebook",
							"value"      => ''
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Linkedin link",
							"param_name" => "linkedin",
							"value"      => ''
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Google+ link",
							"param_name" => "googleplus",
							"value"      => ''
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Email link",
							"param_name" => "envelope",
							"value"      => ''
						)
		    		)
		    	));
		
			/*  MEDIA SLIDER         (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Media slider",
		    		'base'                    => "nz_media_slider",
		    		"as_parent"               => array('only' => 'nz_media_slide'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-media-slider',
		    		'show_settings_on_create' => false,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		'icon'                    => 'icon-media-slider',
		    		"js_view"                 => 'VcColumnView',
		    		'description'             => 'Insert video/image slider',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Effect",
							"param_name" => "effect",
							"value"      => array("fade"=>"fade","slide"=>"slide")
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Bullets",
							"param_name" => "bul",
							"value"      => array("true"=>"true","false"=>"false")
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Navigation",
							"param_name" => "nav",
							"value"      => array("true"=>"true","false"=>"false")
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Autoplay",
							"param_name" => "autoplay",
							"value"      => array("true"=>"true","false"=>"false")
						)
		    		)
		    	));

				vc_map(array(
		    		'name'                    => "Slide",
		    		'base'                    => "nz_media_slide",
		    		"as_child"                => array('only' => 'nz_media_slider'),
		    		"content_element"         => true,
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Type",
							"param_name" => "type",
							"value"      => array("youtube"=>"youtube","vimeo"=>"vimeo","img"=>"img")
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Youtube/Vimeo Id",
							"param_name" => "id",
							"value"      => '',
							"dependency" => Array('element' => "type", 'value' => array('youtube','vimeo'))
						),
						array(
							"type"       => "attach_image",
							"heading"    => "Image",
							"param_name" => "src",
							"dependency" => Array('element' => "type", 'value' => 'img')
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Image description",
							"param_name" => "description",
							"value"      => '',
							"dependency" => Array('element' => "type", 'value' => 'img')
						)
		    		)
		    	));
			
			/*  POPUP MESSAGE        (CONTENT)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Popup message",
		    		'base'                    => "nz_popup",
		    		'class'                   => 'nz-popup',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'icon'                    => 'icon-popup',
		    		'js_view'                 => '',
		    		'description'             => 'Insert popup message',
		    		'params'                  => array(
						array(
		    				"type"       => "textfield",
							"heading"    => "Message",
							"param_name" => "message",
							"value"      => 'Your popup message goes here',
						),
						array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Color",
							"param_name" => "color",
							"value"      => "#333333"
						)
		    		)
		    	));	
		
			/*  PRICING TABLE      (CONTAINER)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Pricing table",
		    		'base'                    => "nz_pricing_table",
		    		"as_parent"               => array('only' => 'nz_column'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-pricing-table',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		'icon'                    => 'icon-pricing-table',
		    		"js_view"                 => 'VcColumnView',
		    		'description'             => 'Add pricing table',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("3"=>"3","4"=>"4")
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animation",
							"param_name" => "animate",
							"value"      => array(
								"none" => 'none',
								"fade"  => 'fade',
								"scale"  => 'scale'
							)
						)
		    		)
		    	));

				vc_map(array(
		    		'name'                    => "Column",
		    		'base'                    => "nz_column",
		    		"as_child"                => array('only' => 'nz_pricing_table'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
		    				"type"       => "dropdown",
							"heading"    => "Highlight",
							"param_name" => "high",
							"value"      => array("false"=>"false","true"=>"true")
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Highlight label",
							"param_name" => "hlabel",
							"value"      => '',
							"dependency" => Array('element' => "high", 'value' => 'true')
						),
		    			array(
							"type"       => "colorpicker",
							"class"      => "",
							"heading"    => "Color",
							"param_name" => "color",
							"value"      => ""
						),
		    			array(
		    				"type"       => "textfield",
							"heading"    => "Title",
							"param_name" => "title",
							"value"      => 'Column title'
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Price",
							"param_name" => "price",
							"value"      => '$ 29.99'
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Tariff",
							"param_name" => "tariff",
							"value"      => '/m'
						),
		    			array(
							"type"       => "textarea",
							"heading"    => "Rows",
							"param_name" => "content",
							"value"      => '',
							'description' => 'Use line break (press Enter) to separate between items',
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Button link",
							"param_name" => "link",
							"value"      => '#'
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Button text",
							"param_name" => "button_text",
							"value"      => 'Submit now'
						)
		    		)
		    	));

			/*  CAROUSEL           (CONTAINER)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Carousel",
		    		'base'                    => "nz_carousel",
		    		"as_parent"               => array('only' => 'nz_item'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-carousel',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		'icon'                    => 'icon-carousel',
		    		"js_view"                 => 'VcColumnView',
		    		'description'             => 'Carousel anythig (image/text/video)',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Columns",
							"param_name" => "columns",
							"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6")
						),
						array(
		    				"type"       => "dropdown",
							"heading"    => "Autoplay",
							"param_name" => "autoplay",
							"value"      => array("false"=>"false","true"=>"true")
						),
						array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => "Animation",
							"param_name" => "animate",
							"value"      => array(
								"none" => 'none',
								"fade"  => 'fade',
								"scale"  => 'scale'
							)
						)
		    		)
		    	));

				vc_map(array(
		    		'name'                    => "Item",
		    		'base'                    => "nz_item",
		    		"as_child"                => array('only' => 'nz_carousel'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
							"type"       => "textarea_html",
							"param_name" => "content",
							"value"      => 'Carousel content goes here'
						)
		    		)
		    	));

		    /*  SLICK              (CONTAINER)
			/*-------------------------------*/

				vc_map(array(
		    		'name'                    => "Slick Carousel",
		    		'base'                    => "nz_slick_carousel",
		    		"as_parent"               => array('only' => 'nz_slick_item'),
		    		"content_element"         => true,
		    		'class'                   => 'nz-slick-carousel',
		    		'show_settings_on_create' => true,
		    		'category'                => esc_html__("Ninzio",'focuson'),
		    		'is_container'            => true,
		    		'icon'                    => 'icon-slick-carousel',
		    		"js_view"                 => 'VcColumnView',
		    		'description'             => 'Carousel anythig (image/text/video)',
		    		'params'                  => array(
						array(
		    				"type"       => "dropdown",
							"heading"    => "Autoplay",
							"param_name" => "autoplay",
							"value"      => array("false"=>"false","true"=>"true")
						),
						array(
		    				"type"       => "textfield",
							"heading"    => "Autoplay speed in ms",
							"param_name" => "autoplay_speed",
							"value"      => '3000'
						),
		    		)
		    	));

				vc_map(array(
		    		'name'                    => "Item",
		    		'base'                    => "nz_slick_item",
		    		"as_child"                => array('only' => 'nz_slick_carousel'),
		    		"content_element"         => true,
		    		'params'                  => array(
		    			array(
							"type"       => "textarea_html",
							"param_name" => "content",
							"value"      => 'Carousel content goes here'
						)
		    		)
		    	));

	    }

	    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		    class WPBakeryShortCode_nz_Carousel extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Progress extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Circle_Progress extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Counter extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Timeline extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Content_Box extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Content_Box_2 extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Slider_Banner extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Testimonials extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Cl extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Persons extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Media_Slider extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Pricing_Table extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Slick_Carousel extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Tabs extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Tabs_Img extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Process extends WPBakeryShortCodesContainer {}
		    class WPBakeryShortCode_nz_Accordion extends WPBakeryShortCodesContainer {}
		}

		if ( class_exists( 'WPBakeryShortCode' ) ) {
		    class WPBakeryShortCode_nz_Item extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Line extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Circle extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Count extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Event extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Box extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Box_2 extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Banner extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Testimonial extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_C extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Person extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Media_Slide extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Column extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Slick_Item extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Tab extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Tab_Img extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Step extends WPBakeryShortCode {}
		    class WPBakeryShortCode_nz_Toggle extends WPBakeryShortCode {}
		}
	}

?>