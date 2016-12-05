<?php

	add_action('widgets_init', 'focuson_ninzio_register_flickr_widget');
	function focuson_ninzio_register_flickr_widget(){
		register_widget( 'Focuson_Ninzio_WP_Widget_Photos_From_Flickr' );
	}

	class  Focuson_Ninzio_WP_Widget_Photos_From_Flickr extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'photos_from_flickr',
				esc_html__('* Photos from flickr', 'focuson'),
				array( 'description' => esc_html__('Display photos from flickr', 'focuson'))
			);
		}

		public function widget( $args, $instance ) {

			extract($args);

			$title         = apply_filters( 'widget_title', $instance['title'] );
			$flickr_id     = isset($instance['flickr_id']) ? esc_attr($instance['flickr_id']) : "";
			$photos_number = (isset($instance['photos_number']) && is_numeric($instance['photos_number'])) ? esc_attr($instance['photos_number']) : "6";
			
			$output = "";

			echo $before_widget;
			
				if ( ! empty( $title ) ){echo $before_title . $title . $after_title;}
			
				$output .='<div class="photos_from_flickr nz-clearfix">';
					$output .='<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$photos_number.'&display=latest&size=s&layout=x&source=user&user='.$flickr_id.'"></script>';
				$output .='</div>';

			echo $output;

			echo $after_widget;
		}

	 	public function form( $instance ) {

	 		$defaults = array(
	 			'title'         => esc_html__('Photos from flickr', 'focuson'),
	 			'photos_number' => '6',
	 			'flickr_id'     => '',
	 		);

	 		$instance = wp_parse_args((array) $instance, $defaults);

			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>"><?php echo esc_html__( 'Flickr Username:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" type="text" value="<?php echo $instance['flickr_id']; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'photos_number' ); ?>"><?php echo esc_html__( 'Number of photos to show:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'photos_number' ); ?>" name="<?php echo $this->get_field_name( 'photos_number' ); ?>" type="text" value="<?php echo $instance['photos_number']; ?>" size="3" />
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title']         = strip_tags( $new_instance['title'] );
			$instance['photos_number'] = strip_tags( $new_instance['photos_number'] );
			$instance['flickr_id']     = strip_tags( $new_instance['flickr_id'] );
			return $instance;
		}
	}

?>